<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'status', 'name', 'email', 'telephone',
        'name_take','email_take','telephone_take', 'island',
        'address','postcode','moreinfo', 'total','total_shipping'
    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(OrderProducts::class, 'order_id');
    }

    /**
     * @return array
     */
    static function getStatus (){
        $status = [

            'pendientebanco'   => 'Pendiente banco',
            'pago'              => 'Pago',
            'enviado'           => 'Enviado',
            'recibido'          => 'Recibido',
            'devuelto'          => 'Devuelto',
            'cancelado'         => 'Cancelado',
            'carrito'           => 'Carrito'


        ];

        return $status;
    }
    /**
     * @param $query
     * @param $name
     */
    public function  scopeStatus ($query, $name)
    {
        $name= trim($name);
        $query->where('status', 'like',$name);

    }
    /**
     * @param $query
     * @param $name
     */
    public function  scopePending ($query)
    {
        $query->whereIn('status',['pendientebanco','pago','enviado']);

    }

    /**
     * @param $query
     * @param $name
     */
    public function  scopeName ($query, $name)
    {
        $name= trim($name);
        $search = ['name'=>$name,'name_take'=>$name,'email'=>$name];
        $query->where(function ($query) use ($search)
        {
            foreach ($search as $key=> $value)
            {
                //you can use orWhere the first time, dosn't need to be ->where
                $query->orWhere($key, 'like', '%'.$value.'%');
            }
        });
    }


}
