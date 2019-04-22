<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Transaction;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        // return $request;
        // $request->validate([
        //     'subdistrict_id' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required',
        //     'amount' => 'required',
        //     'name' => 'required',
        // ]);
        $quantity   = 0;
        $amount     = 0;
        // $pre_order_id = '';
        
        if (!is_null($request->items)) {
            $customer_name = explode(" ", $request->name);
            foreach ($request->items as $item) {
                $quantity += $item['quantity'];
                $amount += $item['subtotal'];
            }
        }

        $transaction = Transaction::create(
            array_merge(
                $request->except(['items']),
                [
                    'quantity' => ($quantity > 0)? $quantity: $request->quantity,
                    'amount' => ($amount > 0)? $amount : $request->amount,
                    // 'pre_order_id' => $request->pre_order_id
                ]
            )
        );

        $invoice = [
            "transaction_details" =>[
                "order_id"=>$transaction->id,
                "gross_amount"=>$amount
            ],
            "customer_details"=>[
                "first_name"=>$customer_name[0],
                "last_name"=>$customer_name[1]??'',
                "email"=>$request->email,
                "phone"=>$request->phone,
                "billing_address"=>$request->address,
                "shipping_address"=>$request->address
            ],
            "item_details"=>$request->items
        ];

        // store the order items
        
        if (!is_null($request->items)) {
            foreach ($request->items as $key => $item) {
                // if (!isset($item['model'])) {
                //     $item['model']=' ';
                // }
                \App\Order::create(array_merge($item, ['transaction_id' => $transaction->id]));
            }
        }

        return $invoice;
        // SendPaymentReminder::dispatch($transaction)
        // ->delay(now()->addMinutes(10));
        // return new TransactionResource($transaction);
    }
}
