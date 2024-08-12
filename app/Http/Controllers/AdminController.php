<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    public function listproduct(){
        $products = \App\Models\Product::all(); 
        return view('admin.product', ['products' => $products]);
    }

    public function viewProduct($productid){
        $product = Product::find($productid);
        
        return view('admin.product-details', ['product' => $product]);
    }

    public function showProductForm($id = null)
{
    $product = null;

    if ($id) {
        $product = Product::find($id); // Retrieve product by ID if editing
    }

    return view('admin.product-form', compact('product'));
}


public function storeProduct(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        'price' => 'required|numeric',
        'stock' => 'required|integer',
    ]);

    $product = new Product();

    if ($request->hasFile('image1')) {
        $file = $request->file('image1');
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('products'), $file_name);
        $validatedData['image1'] = $file_name;
    } else {
        $validatedData['image1'] = null; // Handle case where no image is uploaded
    }

    if ($request->hasFile('image2')) {
        $file2 = $request->file('image2');
        $file_name2 = time() . '_2.' . $file2->getClientOriginalExtension();
        $file2->move(public_path('products'), $file_name2);
        $validatedData['image2'] = $file_name2;
    } else {
        $validatedData['image2'] = null;
    }

    // Handle image3 upload
    if ($request->hasFile('image3')) {
        $file3 = $request->file('image3');
        $file_name3 = time() . '_3.' . $file3->getClientOriginalExtension();
        $file3->move(public_path('products'), $file_name3);
        $validatedData['image3'] = $file_name3;
    } else {
        $validatedData['image3'] = null;
    }

    $product->name = $request->name;
    $product->description = $request->description;
    $product->image1 = $validatedData['image1'];
    $product->image2 = $validatedData['image2'];
    $product->image3 = $validatedData['image3'];
    $product->stock = $request->stock;
    $product->price = $request->price;

    $product->save();
    return redirect()->route('admin.product')->with('success', 'Product added successfully.');
}

public function deleteProduct($id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect()->route('admin.product')->with('error', 'Product not found.');
    }

    // Optionally, delete the product's image file if it exists
    if ($product->image1) {
        $imagePath = public_path('products/' . $product->image1);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $product->delete();
    return redirect()->route('admin.product')->with('success', 'Product deleted successfully.');
}

public function updateProduct(Request $request, $productid)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'image1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        'price' => 'required|numeric',
        'stock' => 'required|integer',
    ]);

    // Find the existing product by its ID
    $product = Product::findOrFail($productid);

    // Update the product attributes
    $product->name = $validatedData['name'];
    $product->description = $validatedData['description'];
    $product->price = $validatedData['price'];
    $product->stock = $validatedData['stock'];

    // Handle image uploads and update file paths
    if ($request->hasFile('image1')) {
        $file = $request->file('image1');
        $file_name = time() . '_1.' . $file->getClientOriginalExtension();
        $file->move(public_path('products'), $file_name);
        $product->image1 = $file_name;
    }

    if ($request->hasFile('image2')) {
        $file = $request->file('image2');
        $file_name = time() . '_2.' . $file->getClientOriginalExtension();
        $file->move(public_path('products'), $file_name);
        $product->image2 = $file_name;
    }

    if ($request->hasFile('image3')) {
        $file = $request->file('image3');
        $file_name = time() . '_3.' . $file->getClientOriginalExtension();
        $file->move(public_path('products'), $file_name);
        $product->image3 = $file_name;
    }

    // Save the updated product to the database
    $product->save();

    // Redirect back to the product list with a success message
    return redirect()->route('admin.product.edit', $productid)->with('success', 'Product updated successfully.');
}

public function deleteImage($productid, $image)
{   
    $product = Product::find($productid);

    if ($product && in_array($image, ['image1', 'image2', 'image3'])) {
        // Delete the image from storage
        if (!empty($product->$image)) {
            File::delete(public_path('products/' . $product->$image));
        }
        // Set the image field to null in the database
        $product->$image = null;
        $product->save();
    }

    return redirect()->route('admin.product.edit', $productid)->with('success', 'Image deleted successfully.');
}

public function listOrders(Request $request)
{
    $sortBy = $request->input('sortBy', 'orderid'); // Default sort by 'orderid'
    $order = $request->input('order', 'asc'); // Default order 'asc'

    $orders = Order::orderBy($sortBy, $order)->get();

    return view('admin.orders', compact('orders', 'sortBy', 'order'));
}


}