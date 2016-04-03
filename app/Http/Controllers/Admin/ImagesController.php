<?php

namespace App\Http\Controllers\Admin;

use App\Models\Albums;
use App\Models\Images;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    /**
     * @param Request $request
     * @return $this
     */
    public function index()
    {
        $albums =Albums::has('images')->orderBy('title_es', 'asc')->get();
        $albums = array_pluck($albums, 'attributes.title_es', 'attributes.id'); // funcion para estrer datos y crear un array nuevo
        return view('admin.images.index')->with('albums',  $albums);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id= 0)
    {
        $albums = Albums::orderBy('title_es', 'asc')->get();
        $albums = array_pluck($albums, 'attributes.title_es', 'attributes.id'); // funcion para estrer datos y crear un array nuevo

        return view('admin.images.create')
            ->with('album_id', $id)
            ->with('albums', $albums);

    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        foreach (Input::file('images') as $image) {
            $imagename = time().$image->getClientOriginalName();
            $uploadflag = $image->move('uploads/images/',$imagename);
            $img = Image::make('uploads/images/'.$imagename);

            if ($img->height()<=$img->width()) {
                $vertical='0';
            }else{
                $vertical='1';
            }




            $img->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save('uploads/images/g_'.$imagename);
            $img->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save('uploads/images/m_'.$imagename);
            $img->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save('uploads/images/p_'.$imagename);


            if ($vertical=='1'){
                $diferencia= $img->height()-$img->width();
                $punto = $diferencia/2;
                $img->crop($img->width(), $img->width(), 0, (int)$punto);
            }else{
                $diferencia= $img->width()-$img->height();
                $punto = $diferencia/2;
                $img->crop($img->height(), $img->height(), (int)$punto,0 );
            }

            $img->resize(null, 80, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save('uploads/images/c_'.$imagename);


            $img->destroy();


            Storage::delete('uploads/images/'.$imagename);


            if ($request->get('album_id')>0){
                $max_order = Images::album($request->get('album_id'))->max('order');
                if (is_null($max_order)){
                    $max_order = 1;
                }else{
                    $max_order += 1;
                }
            }else{
                $max_order = 1;
            }

            $data = array (
                'album_id' 	=> $request->get('album_id') ,
                'imagen'    => $imagename,
                'vertical'  => $vertical,
                'order'     => $max_order
            );

            $foto =new Images();
            $foto->fill($data);
            $foto->save();
            if ($uploadflag){
                $uploadedimages[]=$imagename;
            }

        }

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>'ok',
                    'menssage'    => 'Orden actualizado'
                ]
            );
        }
       /// return Response::json(['success'=>true , 'message'=>'images uploaded', 'images'=> $uploadedimages]);

    }

    /**
     * @param Request $request
     */
    public function saveorder (Request $request)
    {
        $save_order = json_decode($request->get('save_order'), true);
        $this->RecorrerJsonArray ($save_order);

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>'ok',
                    'menssage'    => 'Orden actualizado'
                ]
            );
        }

        return redirect()->route('admin.images.index')->with('message', 'Orden actualizado');
    }



    /**
     * @param $array
     * @return bool
     */
    private function RecorrerJsonArray ($array)
    {
        for ($i=0 ; $i<count($array) ; $i++){
            $image = Images::find($array[$i]);
            $image->order =$i+1;
            $image->save();
        }
        return true;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function albumimages(Request $request)
    {
        if ($request->get('album_id') != ''){
            $images = Images::album($request->get('album_id'))->orderBy('order', 'asc')->get();
        }else {
            $images = Images::orderBy('order', 'asc')->get();
        }
        return view('admin.images.albumimages')->with('images', $images);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $image = Images::find($request->get('id'));

        Storage::delete('uploads/images/g_'.$image->imagen);
        Storage::delete('uploads/images/m_'.$image->imagen);
        Storage::delete('uploads/images/p_'.$image->imagen);

        $image->delete();

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>'ok',
                    'menssage'    => 'Imagen eleminida'
                ]
            );
        }

        return redirect()->route('admin.categories.index')->with('message','Imagen eleminida');
    }
}
