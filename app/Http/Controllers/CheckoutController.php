<?php

namespace App\Http\Controllers;
use App\Address;
use App\Products;
use App\Orders;
use App\OrdersProduct;
use App\ProductAtrr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $addr_default = Address::where([['users_id',auth()->user()->id],['default',1]])->get();
        // $addr = Address::where([['users_id',auth()->user()->id],['default',0]])->get();
        $addr = Address::where('users_id',auth()->user()->id)->get();
        return view('frontend.checkout.checkout',compact('addr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->daterange=="")
        {
          return back()->with('message','Please select Size');
        }
        $address = Address::find($request->address);
        $total = Cart::Subtotal() *2;
        $id = IdGenerator::generate(['table' => 'orders', 'length' => 10, 'prefix' =>'WD']);
        $order = Orders::create([
                'id' => $id,
                'user_id' => auth()->user()->id ,
                'billing_name' => "$address->name $address->surname",
                'billing_address' => "$address->address $address->subdistrict $address->district $address->province $address->pincode",
                'billing_phone' => $address->mobile,
                'startDate' => $request->startdate,
                'endDate' => $request->enddate,
                'bank_name' => $address->txtBank,
                'account_name' => $address->account_name,
                'account_no' => $address->account_no,
                'billing_subtotal' => Cart::Subtotal(),
                'billing_deposit'=> Cart::Subtotal(),
                'billing_refund' =>Cart::Subtotal(),
                'billing_total' => $total,
            ]);

            // Insert into order_product table
            foreach (Cart::content() as $item) {

                $product_atrr = ProductAtrr::where('products_id',$item->id)
                                            ->where('size',$item->options->size)
                                            ->first();
                $product_atrr->stock = $product_atrr->stock - $item->qty;
                $product_atrr->save();
                OrdersProduct::create([
                    'order_id' => $id,
                    'product_id' => $item->id,                   
                    'size' => $item->options->size,
                    'quantity' => $item->qty,
                ]);
            }
        Cart::destroy();
            return redirect()->route('orders.index')->with('Thank you! Your payment has been successfully accepted!');
        

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

    }
    public function payment(Request $request)
    {
      dd($request->all());
    //     $address = Address::where('users_id', auth()->user()->id)->get();
    //     $count = count($address);
    //   //  dd($count);

    //     if($count==0)
    //     {
    //       return redirect('myaccount')->with('message','Please Add Address');
    //     }else {
    //       $id_add = $request->all();
    //       $addr =  DB::table('addresses')->where('id', $id_add['address'] )->first();
    //     //  dd($addr);
    //       return view('frontend.checkout.payment',compact('addr','id_add'));
    //     }

    }
}