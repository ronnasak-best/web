<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Orders;
use App\OrdersProduct;
use App\Products;
use App\ProductAtrr;
class BackEndOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::all()->toArray();
        return view('backend.orders.index',compact('orders'));
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
//dd($request);
        foreach ($request->id as $key => $value) {
          $OrdersProduct = OrdersProduct::find($value);
          if($request->status[$key] == 2){
              if($request->tracking_no[$key] !='' ){
                  $OrdersProduct->tracking_no = $request->tracking_no[$key];
                  $OrdersProduct->status = 3;
              }elseif($request->tracking_no[$key] =="") {
                $OrdersProduct->status = 2;
                $OrdersProduct->tracking_no = $request->tracking_no[$key];
              }
          }elseif ($request->status[$key] == 3) {
              if($request->tracking_no[$key] =='' ){
                  $OrdersProduct->tracking_no = $request->tracking_no[$key];
                  $OrdersProduct->status = 2;
              }else {
                $OrdersProduct->tracking_no = $request->tracking_no[$key];
                $OrdersProduct->status = 3;
              }
        }
        $OrdersProduct->save();
        }



        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Orders $orderss)
    {
    //  dd($orderss);
      $orderproduct = $orderss->ordersproduct ;


        //$ordersproduct = OrdersProduct::where('order_id',$id)->first();
        //dd($orderss);
        return view('backend.orders.order_details',compact('orderproduct','orderss'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $order_product = OrdersProduct :: where('order_id',$id)->get();
      foreach ($order_product as $order_p) {
        $order_p->status = 0;
        $order_p->save();
        $product_atrr = ProductAtrr::where('products_id',$order_p->product_id)
                                    ->where('size',$order_p->size)
                                    ->first();

        $product_atrr->stock = $product_atrr->stock + $order_p->quantity;
        $product_atrr->save();
      }
      $order = Orders::find($id);
      $order->status = 0;
      $order->save();
      return back();
    }
}
