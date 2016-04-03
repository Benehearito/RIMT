<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{

    /**
     * UsersController constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $find_name=$request->get('name');
        $find_role=$request->get('role');

        if ( $find_name!='' && $find_role!='')
        {
            $users = User::name($find_name)->role($find_role)->paginate();
        }elseif ($find_name!='') {
            $users = User::name($find_name)->paginate();
        }elseif ($find_role!='') {
            $users = User::role($find_role)->paginate();
        }else {
            $users = User::paginate();
        }

        $roles = User::getRolesForSelectPiker();

        return view('admin.users.index')
            ->with(compact('find_name'))
            ->with(compact('find_role'))
            ->with(compact('users'))
            ->with(compact('roles'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $roles = User::getRolesForSelectPiker();

        if ($request->get('role')!=''){
            $find_role=$request->get('role');
        }else{
            $find_role='sin-rol';
        }
        return view('admin.users.create')
            ->with('roles', $roles)
            ->with('find_role', $find_role);

    }

    /**
     * @param Requests\UserCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\UserCreateRequest $request)
    {
        try {
            $user =User::create($request->all());
            if ($request->get('password')!=''){
                $user->password= Hash::make( $request->get('password'));
                $user->save();
            }
            return redirect()->route('admin.users.edit', array('id' => $user->id));
        }catch (QueryException $e){
            return redirect()->route('admin.users.index')
                ->with('alert', 'No se pudo crear el usuario');
        }
    }

    /**
     * @param Requests\UserEditRequest $request
     * @param $id
     * @return mixed
     */
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roles = User::getRolesForSelectPiker();
        $find_role=$request->get('role');
        return view('admin.users.edit')
            ->with(compact('user'))
            ->with(compact('roles'))
            ->with(compact('find_role'));

    }

    /**
     * @param Requests\UserEditRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Requests\UserEditRequest $request, $id)
    {
        try {
            $user = User::find( $id);
            $user->update($request->all());
            if ($request->get('password')!=''){
                $user->password= Hash::make( $request->get('password'));
                $user->save();
            }
            return redirect()->route('admin.users.edit', array('id' => $user->id))
                ->with('message', 'Usuario actualizado');
        }catch (QueryException $e){
            return redirect()->route('admin.users.edit', array('id' => $user->id))
                ->with('alert', 'No se pudo actualizar el usuario');
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $user_login = auth()->user();
        $user = User::find( $request->get('id'));

        if ( $user_login->id ==$request->get('id') ) {
            $result ='ko';
            $menssage = 'No puedes eliminar te a ti mismo';
        }else{
            $result ='ok';
            $user->delete();
            $menssage = $user->name.'  fue eliminado';
        }

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     => $result,
                    'id'          =>  $user->id,
                    'menssage'    =>  $menssage
                ]
            );
        }

        return redirect()->route('admin.users.index')->with('message', $menssage);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function ban(Request $request)
    {
        $user_login = auth()->user();
        $user = User::find( $request->get('id'));
        if ( $user_login->id ==$request->get('id') ) {
            $result ='ko';
            $menssage = 'No puedes bannear a tu usuario';
        }else{
            $result ='ok';

            if ($user->banned){
                $user->banned = 0;
                $menssage = $user->name.'  fue activado';
            }else{

                $user->banned = 1;
                $menssage = $user->name.'  fue banneado';
            }
            $user->save();
        }

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     => $result,
                    'id'          =>  $user->id,
                    'menssage'    =>  $menssage
                ]
            );
        }

        return redirect()->route('admin.users.index')->with('message', $menssage);
    }

}
