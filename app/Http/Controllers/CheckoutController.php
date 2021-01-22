<?php

namespace App\Http\Controllers;

use App\Order;
use App\Shipping;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    private $transaction;
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;

    }
    public function checkout()
    {
        $contents = Cart::content();
          
        $transaction = get_data_user('shops', 'transaction');

        return view('fontend.page.products.checkout', compact('contents', 'transaction'));
    }

 

    public function save(Request $request)
    {

        if($request->selector == 'on') {

            DB::beginTransaction();


            $transaction = $this->saveCheckout($request);

            $contents = Cart::content();

            foreach ($contents as $value) {
                Order::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $value->id,
                    'sale' => $value->options->sale,
                    'qty' => $value->qty,
                    'price' => $value->price,
                ]);

                DB::table('products')->where('id', $value->id)->increment('pay');
            }

            Cart::destroy();

            DB::commit();


            return redirect()->back()->with('success','Bạn đã thanh toán thành công');
            
        }

        DB::rollBack();

        return redirect()->back()->with('err','Bạn chưa nhấn cho phép');


    }

    public function saveCheckout($request, int $id = null)
    {

        return $this->transaction->updateOrCreate(
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
                'type' => $request->type,
                'total_money' => str_replace(',', '', Cart::total())
            ]
        );
    }

    public function order(Request $request)
    {
        
    }
}
