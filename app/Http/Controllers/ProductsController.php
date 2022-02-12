<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        if($product->count() > 0){
            return $product;
        }else{
            return array("message" => "There are no available 'Products'.");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request['slug']=Str::slug($request['name'],'-');
            $validate = $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:products',
                'stock' => 'required',
                'price' => 'required',
                'category_id' => 'required|exists:product_categories,id'
            ]);
            $createdProduct = Product::create($request->all());
            return $createdProduct;
        } catch (\Exception $e) {
            return array("message" => "The requested 'Product' name was already taken.", "error" => $e->getMessage());
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
        $product = Product::find($id);
        if($product) {
            return $product;
        }else{
            return array("message" => "The requested 'Product' was not found.");
        }
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
        try {
            $product = Product::find($id);

            $request['slug']=Str::slug($request['name'],'-');
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:products,slug,' . $id,
                'stock' => 'required',
                'price' => 'required',
                'category_id' => 'required|exists:product_categories,id'
            ]);
            $product->update($request->all());
            return $product;
        } catch (\Exception $e) {
            return array("message" => "It was not possible to edit the requested 'Product'.", "error" => $e->getMessage());
        }
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
        if(Product::destroy($id)) {
            return array("message" => "Requested 'Product' removed.");
        }else{
            return array("message" => "Requested 'Product' not found.");
        }
    }
}
