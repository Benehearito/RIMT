<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastname','dni', 'telephone', 'email', 'password','registration_token','role',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $roles = ['cliente','comercial','admin'];

    /**
     * @return array
     */
    static function getRolesForSelectPiker (){
        $roles = [ 'cliente' =>'Cliente','comercial'=> 'Comercial' , 'admin'=> 'Admin' ];

        return $roles;
    }

    public function updateClient ($request)
    {

    }

    /**
     * @param $id
     * @return mixed
     */
    public function  findUser ($id)
    {
        //$this->user=User::findOrFail($route->getParameter('id'));
        return $this->findOrFail($id);
    }

    /**
     * @param $query
     * @param $name
     */
    public function  scopeName ($query, $name)
    {
        $name= trim($name);
        $query->where('name', 'like', '%'.$name.'%');

        //$query->where('name', $name);
    }

    /**
     * @param $query
     * @param $name
     */
    public function  scopeRole ($query, $name)
    {
        $name= trim($name);
        $query->where('role', 'like',$name);

    }





}
