<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Transaction;

use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;

class TransactionController extends Controller
{
    public function __construct()
    {
        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function store(Request $request)
    {
        // return $request->all();
        // $request->validate([
        //     'subdistrict_id' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required',
        //     'amount' => 'required',
        //     'name' => 'required',
        // ]);
        // $quantity   = 0;
        // $amount     = 0;
        // $pre_order_id = '';
        
        // if (!is_null($request->items)) {
        // $customer_name = explode(" ", $request->name);
        //      foreach ($request->items as $item) {
        //         $quantity += $item['quantity'];
        //         $amount += $item['subtotal'];
        //     }
        // }

        // $transaction = Transaction::create(
        //     array_merge(
        //         $request->except(['items']),
        //         [
        //             // 'quantity' => $request->item->quantity,
        //             // 'amount' => $request->item->subtotal,
        //             // 'pre_order_id' => $request->pre_order_id
        //         ]
        //     )
        // );
        
        $transaction = Transaction::create($request->except(['items']));
        
        // create payment proof token
        \App\PaymentProof::create([
            'transaction_id' => $transaction->id,
            'account_id' => $transaction->account_id,
            'token' => str_random(16)
        ]);

        // $invoice = [
        //     "transaction_details" =>[
        //         "order_id"=> date("Y-m-d", strtotime($transaction->created_at)) .'-'. sprintf("%06d", $transaction->id),
        //         "gross_amount"=>$request->amount
        //     ],
        //     "customer_details"=>[
        //         "first_name"=>$customer_name[0],
        //         "last_name"=>$customer_name[1]??'',
        //         "email"=>$request->email,
        //         "phone"=>$request->phone,
        //         "billing_address"=>$request->address,
        //         "shipping_address"=>$request->address
        //     ],
        //     "item_details"=>$request->item
        // ];

        // store the order item
        
        // dd( $request->items );
        if (!is_null($request->items)) {
            foreach ($request->items as $key => $item) {
                $item['transaction_id'] = $transaction->id;
                // dd($item['product_id']);
                \App\Order::create($item);
                // if (!isset($item['model'])) {
                //     $item['model']=' ';
                // }
            }
        }

        return redirect('/');

        // $snapToken = Veritrans_Snap::getSnapToken($invoice);

        // Beri response snap token
        // $this->response['snap_token'] = $snapToken;
        
        // return $invoice;
        // SendPaymentReminder::dispatch($transaction)
        // ->delay(now()->addMinutes(10));
        // return new TransactionResource($transaction);
    }
}
