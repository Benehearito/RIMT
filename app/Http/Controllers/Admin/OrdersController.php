<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{

    public function index(Request $request)
    {
        $find_name=$request->get('name');
        $find_status=$request->get('status');

        $orders =Orders::orderBy('updated_at', 'desc');

        if ($find_name!=''){
            $orders->name($find_name);
        }


        if ($find_status!='' && $find_status!='todos'){
            $orders->status($find_status);
        }elseif ($find_status!='todos')  {
            $orders->pending();
        }

        $orders = $orders->paginate();

        $status =Orders::getStatus();


        return view('admin.orders.index')
            ->with('find_status',  $find_status)
            ->with('find_name',  $find_name)
            ->with('status',  $status)
            ->with(compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Orders::findOrFail($id);
        $products = $order->products()->get();

        $status =Orders::getStatus();

        return view('admin.orders.edit')
            ->with('order', $order)
            ->with('products', $products)
            ->with('status', $status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
