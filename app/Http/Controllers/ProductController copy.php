<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    public function list() {
        try {
            $products = Product::all(); // select * from products

            return view('product.list', compact('products'));
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function form() {
        return view('product.form');
    }

    public function save(Request $request) {
        try {
            Product::create($request->all());

            return redirect('/product/list');
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function edit($id) {
        try {
            $product = Product::find($id);

            return view('product.form', compact('product'));
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id) {
        try {
            $product = Product::find($id);
            $product->update($request->all());

            return redirect('/product/list');
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function remove($id) {
        try {
            $product = Product::find($id);
            $product->delete();

            return redirect('/product/list');
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function search(Request $request) {
        $keyword = $request->input('keyword');

        if (strlen($keyword) > 0) {
            $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        } else {
            $products = Product::all();
        }

        return view('product.list', compact('products', 'keyword'));
    }
}