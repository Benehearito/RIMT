<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AcountController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $user = auth()->user();
        $roles = User::getRolesForSelectPiker();
        return view('acount.edit')
            ->with(compact('user'))
            ->with(compact('roles'));
    }


    public function update(Requests\AcountDataRequest $request)
    {
        try {

            $user = auth()->user();
            $user->name = $request->get('name');
            $user->lastname = $request->get('lastname');
            $user->dni = $request->get('dni');
            $user->telephone = $request->get('telephone');
            $user->name = $request->get('name');
            $user->save();

            return redirect()->route('acount.index')
                ->with('message', 'Información actualizada');

        }catch (QueryException $e){
            return redirect()->route('acount.index')
                ->with('alert', 'No se pudo actualizar la información');
        }

    }
}
