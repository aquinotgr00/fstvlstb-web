<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:account');
    }

    public function index()
    {
        $products = Product::get();
        return view('frontend-page.store', compact('products'));
    }

    public function thankYou()
    {
        return view('frontend-page.thank-you');
    }

    public function checkout(Request $request)
    {
        $items = json_decode($request->items);
        return view('frontend-page.checkout', compact('items'));
    }

    public function checkoutStore(Request $request)
    {
        dd($request->all());
        return view('frontend-page.checkout');
    }

    public function midtransNotif(Request $request)
    {
        $id = substr($request['order_id'], -6);
        if ($request['transaction_status'] == 'settlement') {
            \App\Transaction::findOrFail($id)->update([
                'status' => 'paid',
                'payment_bank' => $request['payment_type']
            ]);
        }

        return 200;
    }

    public function confirmPayment($token)
    {
        $record = \App\PaymentProof::where('token', $token)->first();
        $account = \Auth::guard('account')->user();
        if ($record == null || $record->account_id !== $account->id) {
            return abort(404);
        }
        return view('frontend-page.confirm-payment', compact('record'));
    }
}
