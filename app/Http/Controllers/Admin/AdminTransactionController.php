<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Traits\DeleteModelTrait;
class AdminTransactionController extends Controller
{
    use DeleteModelTrait;
    private $transaction;
    private $order;

    public function __construct(Transaction $transaction, Order $order)
    {
        $this->transaction = $transaction;
        $this->order = $order;
    }
    public function index()
    {
        $transactions = $this->transaction->paginate(10);
        return view('admin.transaction.index', compact('transactions'));
    }

    public function view($id)
    {
        $orders = Order::with('product:id,name,slug')->where('transaction_id', $id)->get();
        // dd($orders);
        return view('admin.transaction.view', compact('orders'));
    }

    public function action($action, $id)
    {
        $transaction = $this->transaction->findOrFail($id);
        if($transaction) {
            switch($action) {
                case 'receive':
                    $transaction->status = 1;
                    break;
                case 'process':
                    $transaction->status = 2;
                    break;
                case 'success':
                    $transaction->status = 3;
                    break;
                case 'cancel':
                    $transaction->status = -1;
                    break;
            }
            $transaction->save();
        }
        return redirect()->back();
    }


    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->transaction);;
    }

    public function deleteOrder($id)
    {
        $order = $this->order->findOrFail($id);

        if(isset($order)) {

            $money = $order->qty * $order->price;

            \DB::table('transactions')->where('id',$order->transaction_id)->decrement('total_money', $money);

             return $this->deleteModelTrait($id, $order);
        }

        return redirect()->back();
    }

}
