<?php

namespace App\Http\Controllers\Admin;

use App\Models\Albums;
use App\Models\Images;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums_base =Albums::whereNull('album_id')->orWhere('album_id', '=', 0)->orderBy('order', 'asc')->get();
        $albums= array();
        foreach ($albums_base as $album) {
            $albums[$album->id]['data']=$album;
            $albums_child =  $album->children();
            if (!empty($albums_child)){
                $albums[$album->id]['children'] = $this->CargarArbolAlbums ($album);
            }
        }
        return view('admin.albums.index')->with(compact('albums'));
    }

    private function CargarArbolAlbums ($album_father){
        $albums_base =  $album_father->children()->orderBy('order', 'asc')->get();
        $albums= array();
        foreach ($albums_base as $album)
        {
            $albums[$album->id]['data']=$album;
            $albums_child =  $album->children()->orderBy('order', 'asc')->get();
            if (!empty($albums_child)){
                $albums[$album->id]['children'] = $this->CargarArbolAlbums ($album);
                // array_push($albums[$album->id]['children'],);
            }

        }
        return  $albums;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums =Albums::orderBy('title_es', 'asc')->get();
        $albums = array_pluck($albums, 'attributes.title_es', 'attributes.id'); // funcion para estrer datos y crear un array nuevo
        return view('admin.albums.create')->with('albums', $albums);
    }


    public function store(Requests\AlbumRequest $request)
    {
        try {
            $album =Albums::create($request->all());
            if ($album->album_id==0){
                $album->album_id=null;
            }
            $max_order = Albums::Byalbum($album->album_id)->max('order');;
            $album->order= $max_order+1;
            $album->save();
            return redirect()->route('admin.albums.edit', array('id' => $album->id))
                ->with('message', 'Album creada');
        }catch (QueryException $e){
            return redirect()->route('admin.albums.create')
                ->with('alert', 'No se pudo crear el album');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Albums::findOrFail($id);
        $albums =Albums::orderBy('title_es', 'asc')->get();
        $albums = array_pluck($albums, 'attributes.title_es', 'attributes.id'); // funcion para estrer datos y crear un array nuevo
        $images = Images::album($id)->orderBy('order', 'asc')->get();

        return view('admin.albums.edit')
            ->with(compact('album'))
            ->with('albums', $albums)
            ->with('images', $images);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\AlbumRequest $request, $id)
    {
        try {
            $album = Albums::find( $id);
            $album->update($request->all());
            return redirect()->route('admin.albums.edit', array('id' => $album->id))
                ->with('message', 'Album actualizada');
        }catch (QueryException $e){
            return redirect()->route('admin.albums.edit', array('id' => $album->id))
                ->with('alert', 'No se pudo actualizar el Album');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $album = Albums::find($request->get('id'));
        if ($album->album_id !=null){
            $parent =$album->parent()->get();
            $children =$album->children()->get();
            if (!empty($children)) {
                foreach ($children as $child) {
                    $child = Albums::find($child->id);
                    $child->album_id = $parent[0]['id'];
                    $child->save();
                }
            }
        }
        $album->delete();

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>'ok',
                    'menssage'    => 'album eleminido'
                ]
            );
        }

        return redirect()->route('admin.albums.index')->with('message','album eleminido');
    }

    /**
     * @param Request $request
     */
    public function saveorder (Request $request)
    {
        $save_order = json_decode($request->get('save_order'), true);
        $this->RecorrerJsonArray ($save_order[0], null);

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>'ok',
                    'menssage'    => 'Orden actualizado'
                ]
            );
        }

        return redirect()->route('admin.albums.index')->with('message', 'Orden actualizado');
    }



    /**
     * @param $array
     * @return bool
     */
    private function RecorrerJsonArray ($array,$id_padre)
    {

        foreach ($array as $indice => $valor) {
            $album = Albums::find($valor['id']);
            $album->order =$indice;
            $album->album_id =$id_padre;
            $album->save();

            if (!empty($valor['children'][0])) {
                $this->RecorrerJsonArray ($valor['children'][0],$valor['id']);

            }
        }
        return true;
    }
}
