<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\ProductCategory;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::all();
        if($productCategories->count() > 0){
            return $productCategories;
        }else{
            return array("message" => "There are no available 'Product Categories'.");
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
                'slug' => 'required|unique:product_categories'
            ]);
            $createdProductCategory = ProductCategory::create([
                'name' => request('name'),
                'slug' => request('slug')
            ]);
            return $createdProductCategory;
        } catch (\Exception $e) {
            return array("message" => "The requested 'Product Category' name was already taken.", "error" => $e->getMessage());
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
        $productCategory = ProductCategory::find($id);
        if($productCategory) {
            return $productCategory;
        }else{
            return array("message" => "The requested 'Product Category' was not found.");
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
            $productCategory = ProductCategory::find($id);

            $request['slug']=Str::slug($request['name'],'-');
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:product_categories,slug,' . $id
            ]);
            $productCategory->update($request->all());
            return $productCategory;
        } catch (\Exception $e) {
            return array("message" => "It was not possible to edit the requested 'Product Category'.", "error" => $e->getMessage());
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
       $productCategory = ProductCategory::find($id);
        if(!is_null($productCategory) && $productCategory->products()->count()){
            return json_encode(array("message" => 'A categoria ainda tem produtos associados.Por favor remova-os primeiro.'), JSON_UNESCAPED_UNICODE);
        }else{
            if(ProductCategory::destroy($id)) {
                return array("message" => "Requested 'Product Category' removed.");
            }else{
                return array("message" => "Requested 'Product Category' not found.");
            }
        }
    }
}
