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
        $data['price'] = number_price($product->price, $product->sale);
        $data['weight'] = '1';
        $data['options'] = [
                'image' =>  $product->feature_image_path,
                'sale' => $product->sale,
        ];
        Cart::add($data);
        // Cart::destroy();

        return redirect()->to('/show-cart');

    }

    public function addCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->quantity;

        $data['id'] = $id;
        $data['qty'] = 1;
        $data['name'] = $product->name;
        $data['price'] = number_price($product->price, $product->sale);
        $data['weight'] = '1';
        $data['options'] = [
            'image' =>  $product->feature_image_path,
            'sale' => $product->sale,
        ];

        Cart::add($data);
        $qtyCart = Cart::content()->count();


        return response()->json([
            'code'    => 200,
            'message' => 'success',
            'count' => $qtyCart
        ], 200);

    }

    public function show()
    {
        $contents = Cart::content();

        return view('fontend.page.products.cart', compact('contents'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        Cart::remove($id);
        $contents = Cart::content();


        return view('fontend.page.products.cart_component', compact('contents'));

    }

    public function updateQty(Request $request)
    {

        $qty = $request->quantity;
        $id = $request->id;

        Cart::update($id, $qty);

        $contents = Cart::content();

        return view('fontend.page.products.cart_component', compact('contents'));

    }
}
