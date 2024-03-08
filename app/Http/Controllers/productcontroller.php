<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productcontroller extends Controller
{

    public function ProductUploadForm()
    {
        return view('product.create');
    }




    public function ProductUploader(Request $request)
    { {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);


            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }


            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $product->image = $imageName;
            }

            $product->save();

            return redirect()->route('products.create')->with('status', 'Product has been added successfully');
        }
    }


    public function showproduct()
    {
        $products = Product::all();
        return view('Product.view', compact('products'));
    }

    public function updateview(Product $product)
    {
        return view('Product.update', compact('product'));
    }

    public function updated(Request $request, Product $product)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);


        try {
            $product->update($validatedData);
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Failed to update product.');
        }


        return redirect()->route('products.updateview', ['product' => $product->id])->with('success', 'Product updated successfully');
    }

    public function deleteview(Product $product)
    {
        $products = Product::all();
        return view('Product.delete', compact('products'));
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.delete')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('products.delete')->with('error', 'Error deleting product: ' . $e->getMessage());
        }
    }
}
