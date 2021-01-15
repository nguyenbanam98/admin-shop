<?php

namespace App\Http\Controllers;

use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    private $shipping;
    public function __construct(Shipping $shipping)
    {
        $this->shipping = $shipping;

    }
    public function checkout()
    {
        $contents = Cart::content();


        return view('fontend.page.products.checkout', compact('contents'));
    }

    public function save(Request $request)
    {
        $this->saveCheckout($request);

        return redirect()->back();
    }

    public function saveCheckout($request, int $id = null)
    {

        return $this->shipping->updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'email' => $request->email,
                'customer_id' => Auth::guard('shops')->id(),
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'notes' => $request->notes,
            ]
        );
    }
}
