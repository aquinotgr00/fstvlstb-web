<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use Image;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:account')->except(['confirmPayment', 'storeProof']);
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

    public function storeProof(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'password' => 'required',
            'image' => 'required',
        ]);

        $email = \App\Transaction::findOrFail($request->transaction_id)->account->email;
        $request->request->add(['email' => $email]);
        
        if ( \Auth::guard('account')->attempt($request->only('email', 'password')) ) {
            // handle the image
            $unique = uniqid();
            $file = $request->image;
            $destinationPath = 'proofs';
            $filePath = $destinationPath.'/'.$unique.'-'.$file->getClientOriginalName();
            $fileimage = Image::make($file)->save($destinationPath.'/'.$file->getClientOriginalName());
            $s3 = \Storage::disk('s3');
            $s3->put($filePath, $fileimage, 'public');

            // update the payment proof image and transaction status
            \App\PaymentProof::findOrFail($request->id)->update([ 'image' => $filePath, 'token' => null ]);
            \App\Transaction::findOrFail($request->transaction_id)->update([ 'status' => 'payment check' ]);
            return redirect()->route('home');
        }

        return redirect()->back();
    }

    public function confirmPayment($token)
    {
        $record = \App\PaymentProof::where('token', $token)->first();
        // $account = \Auth::guard('account')->user();
        if ($record == null) {
            return abort(404);
        }
        return view('frontend-page.confirm-payment', compact('record'));
    }
}
