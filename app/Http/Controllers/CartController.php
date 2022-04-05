<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Collection;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('frontend.cart');
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
      $product = $request->all();
      if($product['size']=="")
      {
        return back()->with('message','Please select Size');
      }else {
        $sizeAtrr=explode("-",$product['size']);
        $product['size']=$sizeAtrr[1];
        $product = ['id' => $product['product_id'],
                  'name' => $product['product_name'],
                  'qty' => 1,
                  'price' => $product['price'],
                  'weight'=>1,
                  'options' => ['image'=>$product['product_image'],                   
                                'size'=>$product['size']
                                ]
                              ];

        Cart::add($product);       
        return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart!');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
      Cart::remove($id);

      return back()->with('success_message', 'Item has been removed!');
    }
}
