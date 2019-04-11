<?php

namespace App\Http\Controllers;

use File;
use Auth;
use App\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->role == 'admin')
            $data = Product::all();
        else
            $data = Product::where('status', 1)->get();
        return view('products.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:192',
            'description' => 'required|string|max:1000|nullable',
            'rate' => 'required|numeric',
            'image' => 'sometimes|image'
        ]);
        $input = $request->all();
        $fileName = 'productImg.png';
        if(Input::hasFile('image'))
        {
            if(env('APP_ENV') == 'production')
                $destinationPath = '/home/citibags/public_html/storage/';
            else
                $destinationPath = public_path('storage');
            if (Input::file('image')->isValid()) {
                $extension = Input::file('image')->getClientOriginalExtension();
                $fileName = uniqid().'.'.$extension;
                Input::file('image')->move($destinationPath, $fileName);
            }
        }
        $product = new Product();
        $product->name = $input['name'];
        $product->description = $input['description'];
        $product->rate = $input['rate'];
        $product->image = $fileName;
        if($product->save())
            return redirect()->back()->with("successMsg", "Product Added Successfully!");
        else
            return redirect()->back()->withErrors("Could not add new product.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::find($id);
        if($data)
            return view("products.show")->with(['data' => $data]);
        else
            return redirect()->back()->withErrors(["The requested record could not be found."]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        return view("products.edit")->with(['data' => $data]);
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
        $request->validate([
            'name' => 'required|string|max:192',
            'description' => 'required|string|max:1000|nullable',
            'rate' => 'required|numeric',
            'image' => 'sometimes|image'
        ]);
        $input = $request->all();
        $product = Product::find($id);
        $fileName = 'productImg.png';
        if(Input::hasFile('image'))
        {
            if(env('APP_ENV') == 'production')
                $destinationPath = '/home/citibags/public_html/storage/';
            else
                $destinationPath = public_path('storage');
            if (Input::file('image')->isValid()) {
                $extension = Input::file('image')->getClientOriginalExtension();
                $fileName = uniqid().'.'.$extension;
                Input::file('image')->move($destinationPath, $fileName);
            }
            $old_file = $product->image;
            $product->image = $fileName;
            if($old_file != 'productImg.png')
                File::delete($destinationPath . $old_file);
        }
        $product->name = $input['name'];
        $product->description = $input['description'];
        $product->rate = $input['rate'];
        if($product->save())
            return redirect()->back()->with("successMsg", "Product Added Successfully!");
        else
            return redirect()->back()->withErrors("Could not add new product.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product)
        {
            $product->carts()->delete();
            $product->feedbacks()->delete();
            $product->orders()->delete();
            $product->delete();
            return redirect()->back()->with("successMsg", "Product Deleted Successfully!");            
        }
        else
            return redirect()->back()->withErrors("Could not delete product.");

    }
}
