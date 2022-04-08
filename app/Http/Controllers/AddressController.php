<?php

namespace App\Http\Controllers;
use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=auth()->user()->id;
        //  dd($id);
        $address_default = Address::where([['users_id',$id],['default',1]])->get();
        $address = Address::where([['users_id',$id],['default',0]])->get();
        //dd($address_default);
        return view('frontend.user.myaccount',compact('address','address_default'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=auth()->user()->id;
        return view('frontend.user.add_address',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'pincode'=>'required|digits:5',
        'mobile' => 'required|digits:10',
        'account_no' => 'required|digits:10',
      ]);
      $addr=$request->all();

      $address = Address::where('users_id',$request->users_id)->get();
      $count = count($address);

      if($count==0){
        Address::create([
          'users_id' => $request->users_id,
          'name' => $request->name,
          'surname' => $request->surname,
          'address' => $request->address,
          'province' => $request->province,
          'district' => $request->district,
          'sub_district' => $request->sub_district,
          'pincode' => $request->pincode,
          'default' => 1,
          'mobile' => $request->mobile,
          'txtBank' => $request->txtBank,
          'account_name' => $request->account_name,
          'account_no' => $request->account_no
        ]);
      }else {
        Address::create([
          'users_id' => $request->users_id,
          'name' => $request->name,
          'surname' => $request->surname,
          'address' => $request->address,
          'province' => $request->province,
          'district' => $request->district,
          'sub_district' => $request->sub_district,
          'pincode' => $request->pincode,
          'default' => 0,
          'mobile' => $request->mobile,
          'txtBank' => $request->txtBank,
          'account_name' => $request->account_name,
          'account_no' => $request->account_no
        ]);
      }

      return redirect()->route('myaccount.index')->with('message','Added Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $address = Address::find($id);
      return view('frontend.user.edit_address',compact('address'));
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
          $address = Address::find($id);
          $address->name = $request->get('name');
          $address->surname = $request->get('surname');
          $address->address = $request->get('address');
          $address->province = $request->get('province');
          $address->district = $request->get('district');
          $address->sub_district = $request->get('sub_district');
          $address->pincode = $request->get('pincode');
          $address->mobile = $request->get('mobile');
          $address->txtBank = $request->get('txtBank');
          $address->account_name = $request->get('account_name');
          $address->account_no = $request->get('account_no');

          $address->save();
          return redirect()->route('myaccount.index')->with('message','Added Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Address::find($id)->delete();
      return redirect()->route('myaccount.index')->with('success','Post deleted successfully');

    }
}