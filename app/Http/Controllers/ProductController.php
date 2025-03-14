<?php
namespace  App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductType;

class ProductController extends Controller{
    public function list(){
        try {
            $products = Product::all();
            
            return view('product.list', compact('products'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function form(){
        $productTypes = ProductType::orderBy('name','asc')->get();
      return view('product.form', compact('productTypes'));

    }
    public function save(Request $request){
        try {
            Product::create($request->all());

            return redirect('/product/list');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function edit($id){
        try {
           $product = Product::find($id);
           $productTypes = ProductType::orderBy('name','asc')->get();

        
           return view('product.form', compact('product','productTypes'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update (Request $request, $id){
        try {
            $product = Product::find($id);
            $product->update($request->all());

            return redirect('/product/list');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
    
    public function remove ($id){
        try {
            $product = Product::find($id);
            $product->delete();
            return redirect('/product/list');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
   public function search(Request $request){
     $keyword = $request->keyword;
     if (strlen($keyword) > 0) {
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
     }else{
        $products = Product::all();
        }
     return view('product.list', compact('products','keyword'));
   }

   public function productTypeList(){
    $productTypes = ProductType::orderBy('name', 'asc',)->get();
    return view('product.product-type-list', compact('productTypes'));
   }
   public function listByproductType($productTypeId){
    $productType = ProductType::orderBy('name', 'asc')->find($productTypeId);

    return view('product.list-by-product-type', compact('productType'));
   }
}
?>