<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function saveCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->quantity;

        $data['id'] = $id;
        $data['qty'] = $quantity;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['weight'] = '1';
        $data['options']['image'] = $product->feature_image_path;


        Cart::add($data);
        // Cart::destroy();

        return redirect()->to('/show-cart');

    }

    public function show()
    {
        $contents = Cart::content();
        return view('fontend.page.products.cart', compact('contents'));
    }

    public function delete($id)
    {
        Cart::remove($id);

        return response()->json([
            'code'    => 200,
            'message' => 'success'
        ], 200);
    }

    public function updateQty(Request $request, $id)
    {
        $qty = $request->quantity;
        
        Cart::update($id, $qty);

       
        return redirect()->back();

    }
}
