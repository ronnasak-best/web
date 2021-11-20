<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Category;
use App\Products;
use Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categoty=Category::where('parent_id',0)->pluck('name','id');
      return view('backend.products.create',compact('categoty'));
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
        //'p_name'=>'required|max:255|unique:products,p_name',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $formInput=$request->all();
        if($request->file('image')){
          $image=$request->file('image');
            if($image->isValid()){
              $filename  = time() . '.' . $image->getClientOriginalExtension();
			        $path = public_path('products/' . $filename);
			        Image::make($image->getRealPath())->save($path);

              //$filename = $image->getClientOriginalName();
            //  $path=public_path('products/',$filename);
            //  Image::make($image)->resize(300,300)->save($path);
            //  $image->resize(300,300)->save($path,$filename);
              $formInput['image']=$filename;
                  }
        }
        $p_code = Products::get()->toArray();
        foreach ($p_code as $key) {
          if($formInput['p_code']==$key['p_code']){
            return redirect()->route('products.create')->with('message','please key code product again');
          }
        }
        Products::create($formInput);
      return redirect()->route('products.index')->with('message','Added Success!');
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
      $pro = Products::find($id);
      $plucked=Category::where('parent_id',0)->pluck('name','id');
      $cate_levels=['0'=>'Main Category']+$plucked->all();
      //dd($cat);
      return view('backend.products.edit',compact('pro','id','cate_levels'));
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
      $pro = Products::find($id);
      $pro->p_name = $request->get('p_name');
      $pro->categories_id = $request->get('categories_id');

      $p_code = Products::get()->toArray();
      foreach ($p_code as $key) {
        if($request->p_code==$key['p_code']){
          return back()->with('message','please key code product again');
        }
      }
      $pro->p_code = $request->get('p_code');
      $pro->p_color = $request->get('p_color');
      $pro->description = $request->get('description');
      $pro->price = $request->get('price');
      $pro->save();
      return redirect()->route('products.index')->with('message','Added Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Products::find($id)->delete();
      return redirect()->route('products.index')->with('success','Post deleted successfully');
    }
}
