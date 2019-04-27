<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;
use App\ProductionBatch;

use DataTables;
use Image;

class TransactionController extends Controller
{
    protected $transactions;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Transaction $transactions)
    {
        $this->middleware('auth');
        $this->transactions = $transactions;
    }

    /**
     * Show the application dashboard of member page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin-page.transactions');
    }

    /**
     * get list data from transactions
     *
     * @return mixed
     */
    public function listData(Request $request)
    {
    	$data = $this->transactions->get();
    	return DataTables::of($data)
            ->editColumn('id', '{!! sprintf("%06d", $id)!!}')
            ->editColumn('name', function ($data) {
                return $data->account->name;
            })
            ->editColumn('product', function ($data) {
                $orders = [];
                foreach ($data->orders as $value) {
                    $name = $value->product->name;
                    if ($value->size !== null) {
                        $name = $value->product->name.' ('.$value->size.')';
                    }
                    $orders[] = $name;
                }
                return $orders;
            })
            ->editColumn('amount', function ($data) {
                return $data->amount+$data->courier_fee;
            })
            ->editColumn('created_at', '{!! date("d-m-Y", strtotime($created_at))!!}')
            ->make(true);
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

    public function storeProof(Request $request)
    {
        $request->request->add(['email' => \Auth::guard('account')->user()->email]);
        // dd($request->all());
        // $accountEmail = Auth::guard('account')->user()->email;
        if ( \Auth::guard('account')->attempt($request->only('email', 'password')) ) {
            // handle the image
            $unique = uniqid();
            $file = $request->image;
            $destinationPath = 'uploads';
            $filePath = $destinationPath.'/'.$unique.'-'.$file->getClientOriginalName();
            $fileimage = Image::make($file)->save($destinationPath.'/'.$file->getClientOriginalName());
            $s3 = \Storage::disk('s3');
            $s3->put($filePath, $fileimage, 'public');

            // update the payment proof image and transaction status
            \App\PaymentProof::findOrFail($request->id)->update([ 'image' => $filePath, 'token' => null ]);
            $this->transactions->findOrFail($request->transaction_id)->update([ 'status' => 'bank confirmation' ]);
            return redirect('/');
        }
        return redirect()->back();
    }

    public function show($id)
    {
        $transaction = $this->transactions->findOrFail($id);
        return view('admin-page.transactions-show', compact('transaction'));
    }

    public function thankYou()
    {
        return 'thank you for purchashing';
    }



    // DEPRECATED!!
    /**
     * get list data from transactions
     *
     * @return mixed
     */
    public function listPaidTransactions(Request $request)
    {
    	$data = $this->transactions->where('status', 'paid')->get();
    	return DataTables::of($data)
            ->editColumn('id', '{!! sprintf("%06d", $id)!!}')
            ->editColumn('created_at', '{!! date("d-m-Y", strtotime($created_at))!!}')
            ->make(true);
    }

    public function listDataById(Request $request)
    {
        $data = $this->transactions->where('status', $request->status)
                    ->doesntHave('production')
                    ->where('product_id', $request->id)
                    ->get();
    	return DataTables::of($data)
            ->editColumn('id', '{!! date("Y-m-d", strtotime($created_at))!!}-{!! sprintf("%06d", $id)!!}')
            ->editColumn('name', function ($data) {
                return $data->account->name;
            })
            ->editColumn('created_at', '{!! date("d-m-Y", strtotime($created_at))!!}')
            ->make(true);
    }
}
