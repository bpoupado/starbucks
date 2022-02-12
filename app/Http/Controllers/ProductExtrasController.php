<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\ProductExtra;

class ProductExtrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productExtra = ProductExtra::all();
        if($productExtra->count() > 0){
            return $productExtra;
        }else{
            return array("message" => "There are no available 'Product Extras'.");
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
                'slug' => 'required|unique:product_extras',
                'stock' => 'required',
                'price' => 'required'
            ]);
            return ProductExtra::create($request->all());
        } catch (\Exception $e) {
            return array("message" => "The requested 'Product Extra' name was already taken.", "error" => $e->getMessage());
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
        $productExtra = ProductExtra::find($id);
        if($productExtra) {
            return $productExtra;
        }else{
            return array("message" => "The requested 'Product Extra' was not found.");
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
            $productExtra = ProductExtra::find($id);

            $request['slug']=Str::slug($request['name'],'-');
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:product_extras,slug,' . $id,
                'stock' => 'required',
                'price' => 'required',
            ]);
            $productExtra->update($request->all());
            return $productExtra;
        } catch (\Exception $e) {
            return array("message" => "It was not possible to edit the requested 'Product Extra'.", "error" => $e->getMessage());
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
        $productExtra = ProductExtra::find($id);
        if(ProductExtra::destroy($id)) {
            return array("message" => "Requested 'Product Extra' removed.");
        }else{
            return array("message" => "Requested 'Product Extra' not found.");
        }
    }
}
