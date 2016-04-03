<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use App\Http\Requests;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        /* $books = Products::with('images')->find(1);
         $user= Products::find(1)->images();

         dd ($books);*/
        return view('web.home');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact (){
        return view('web.contact');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function condiciones_uso (){
        return view('web.infolegal');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aviso_legal (){
        return view('web.infolegal');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cookies (){
        return view('web.infolegal');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function proteccion_datos (){
        return view('web.infolegal');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function servicios (){
        return view('web.servicios');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function projects (){
        $micro =  Albums::albumslug('micro')->with('images')->firstOrFail()->toArray();
        $cocinasybanos =  Albums::albumslug('cocinasybanos')->with('images')->firstOrFail()->toArray();
        $fachcadasymuros=  Albums::albumslug('fachcadasymuros')->with('images')->firstOrFail()->toArray();
        $imperytechos =  Albums::albumslug('imperytechos')->with('images')->firstOrFail()->toArray();
        $jardybarba =  Albums::albumslug('jardybarba')->with('images')->firstOrFail()->toArray();
        $decoytec =  Albums::albumslug('decoytec')->with('images')->firstOrFail()->toArray();
        // $images = $album->images()->lists();
        return view('web.projects')
            ->with(compact($micro))
            ->with(compact($cocinasybanos))
            ->with(compact($fachcadasymuros))
            ->with(compact($imperytechos))
            ->with(compact($jardybarba))
            ->with(compact($decoytec));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function videos (){
        return view('web.videos');
    }
}
