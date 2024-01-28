<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // All Products  
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'title' => 'Products Page',
            'products' => $products,
        ]);
    }

    // All My Products
    public function myProducts()
    {   
        $userId = auth()->user()->id;
        $products = Product::where('seller_id', $userId)->get();
        // dd($products);
        return view('products.myproducts', [
            'title' => 'My Products Page',
            'products' => $products,
        ]);
    }

    // Search Feature
    public function search(Request $request)
    {
        // return $request;
        $query = $request['search'];
        $products = Product::where('name', 'like', "%$query%")->get();
        // return $products;
        return view('products.index', [
            'title' => 'Products Page',
            'products' => $products,
            'query' => $query,
        ]);
    }

    // Category Feature
    public function category(Request $request)
    {
        $category = $request['category'];
        $products = Product::where('category_id', $category)->get();
        return view('products.index', [
            'title' =>'Products Page',
            'products' => $products,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return 1;
        return view('products.create', [
            'title' => 'Create New Product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    //  Create Product
    public function store(StoreProductRequest $request)
    {
        // return $request;
        $ValidatedData = $request->validate([
            'seller_id' => 'required|max:10|min:1|',
            'category_id' => 'required|max:5|min:1',
            'name' => 'required|min:3|max:255',
            'description' => 'required|max:2048',
            'price' => 'required',
            'image' => 'required',
        ]);

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move('ProductsImage', $fileName);


        Product::create([
            'seller_id' => $ValidatedData['seller_id'],
            'category_id' => $ValidatedData['category_id'],
            'name' => $ValidatedData['name'],
            'description' => $ValidatedData['description'],
            'price' => $ValidatedData['price'],
            'image' => $fileName,
        ]);

        Alert::success('Success', 'Product Created');
        return redirect()->intended('/myproducts');
    }

    /**
     * Display the specified resource.
     */

    //  Show Product
    public function show(Product $product)
    {
        return view('products.product', [
            'title' => 'Product Page',
            'product' => $product,
        ]);
    }

    // Show My Product
    public function showMyProduct(Product $product)
    {
        return view('products.showMyProduct', [
            'title' => 'Product Page',
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = $product->category_id;
        return view('products.edit', [
            'title' => 'Edit Product',
            'product' => $product,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // Update Product
    public function update(UpdateProductRequest $request, Product $product)
    {
        // ddd($request);
        $ValidatedData = $request->validate([
            'category_id' => 'required|max:5|min:1',
            'name' => 'required|min:3|max:255',
            'description' => 'required|max:2048',
            'price' => 'required',
            'image' => '',
        ]);
        
        $filename = $product->image;

        if ($request->hasFile('image')) {
               $file = $request->file('image') ;
               $filename = $file->getClientOriginalName();
               $file->move('ProductsImage', $filename);
        }

        $product->update([
            'category_id' => $ValidatedData['category_id'],
            'name' => $ValidatedData['name'],
            'description' => $ValidatedData['description'],
            'price' => $ValidatedData['price'],
            'image' => $filename,
        ]);

        Alert::success('Success', 'Product Updated');
        return redirect()->intended('/myproducts');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Remove Product
    public function destroy(Product $product)
    {
        // Product::destroy($product->id);
        $product->delete();

        Alert::success('Success', 'Product Deleted');
        return redirect()->intended('/myproducts');
    }
}
