<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Transaction;

use GuzzleHttp\Client;

use App\Mail\InvoiceMail;

use App\Jobs\SendInvoiceMail;
use Illuminate\Support\Facades\Mail;

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
        // return $request->all(); // debugging
        // TODO: add validation
        // $request->validate([
        //     'subdistrict_id' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required',
        //     'amount' => 'required',
        //     'name' => 'required',
        // ]);
        
        // create the transaction
        $transaction = Transaction::create($request->except(['items']));
        
        // create payment proof token if the payment method is direct_bank_transfer
        if ($transaction->payment_method == 'direct_bank_transfer') {
            \App\PaymentProof::create([
                'transaction_id' => $transaction->id,
                'account_id' => $transaction->account_id,
                'token' => str_random(16)
            ]);
        }

        // new array for courier fee to add in item details in invoice
        $newArr = [
            '9' => [
                'id' => 'ongkir1',
                'name' => $request->courier_name,
                'quantity' => '1',
                'price' => $transaction->courier_fee,
                'subtotal' => $transaction->courier_fee
            ]
        ];

        // get the account associated with the transaction
        $account = $transaction->account;
        $customer_name = explode(" ", $account->name);

        // create invoice for midtrans
        $invoice = [
            "transaction_details" =>[
                "order_id"=> date("Y-m-d", strtotime($transaction->created_at)) .'-'. sprintf("%06d", $transaction->id),
                "gross_amount"=>$request->amount+$request->courier_fee
            ],
            "customer_details"=>[
                "first_name"=>$customer_name[0],
                "last_name"=>$customer_name[1]??'',
                "email"=>$account->email,
                "phone"=>$account->phone,
                "billing_address"=>$account->address,
                "shipping_address"=>$request->address
            ],
            "item_details"=> array_merge($request->items, $newArr)
        ];

        // store the order items
        if (!is_null($request->items)) {
            foreach ($request->items as $key => $item) {
                $item['transaction_id'] = $transaction->id;
                \App\Order::create($item);
            }
        }

        // create json response
        $response = [
            'status' => 'success',
            'data' => $invoice
        ];

        // SendInvoiceMail::dispatch($transaction);
        Mail::to($transaction->account->email)->send(new InvoiceMail($transaction));
        return $response;
    }


    public function charge(Request $request) {
        $api_url = config('services.midtrans.isProduction') ? 'https://app.midtrans.com/snap/v1/transactions' : 'https://app.sandbox.midtrans.com/snap/v1/transactions';
        $server_key = config('services.midtrans.serverKey');

        $client = new Client();
        $response = $client->post(
            $api_url,
            [
                'headers'=>[
                    'Content-Type'=>'application/json',
                    'Accept'=>'application/json',
                    'Authorization'=>'Basic ' . base64_encode($server_key . ':')
                ],
                'json'=>json_decode($request->getContent())
            ]);
            
        return $response->getBody();
    }
}
