<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;
use App\ProductionBatch;

use DataTables;
use Image;
use App\Mail\OrderPaidMail;
use Illuminate\Support\Facades\Mail;
use Excel;
use DB;

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
            ->addColumn('action', function ($data) {
                return '<a target="_blank" href="/admin/transactions/item/'.$data->id.'" class="btn btn-xs btn-info">View</a> 
                    <a href="#" onclick="openModalEdit('. $data->id .')" class="btn btn-xs btn-primary" data-id="'.$data->id.'" data-toggle="modal" data-target="#modal-transaction-edit">Edit</a>';
            })
            ->editColumn('id', '{!! sprintf("%06d", $id)!!}')
            ->editColumn('name', function ($data) {
                return $data->account->name;
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 'unpaid') {
                    return 'pending';
                }
                return $data->status;
            })
            ->editColumn('product', function ($data) {
                $orders = [];
                foreach ($data->orders as $i=>$value) {
                    $name = $value->product->name;
                    if ($value->size !== null) {
                        $name = $value->product->name.' ('.$value->size.')';
                    }
                    $orders[] = $name;
                }
                return "<pre>".implode(", \n", $orders)."</pre>";
            })
            ->editColumn('amount', function ($data) {
                return $data->amount+$data->courier_fee;
            })
            ->editColumn('created_at', '{!! date("d-m-Y", strtotime($created_at))!!}')
            ->rawColumns(['product', 'action'])
            // ->make(true);
            ->toJson();
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

    public function getById($id)
    {
        $transaction = $this->transactions->findOrFail($id);
        return $transaction;
    }

    public function exportToExcel(Request $request)
    {

        $data = $this->transactions->with('orders')->whereBetween('transactions.created_at', [$request->start_date, $request->end_date])
                ->leftjoin('subdistricts','subdistricts.id','=','transactions.subdistrict_id')
                ->leftjoin('cities','cities.id','=','subdistricts.city_id')
                ->leftjoin('provinces','provinces.id','=','cities.province_id')
                ->leftjoin('accounts','accounts.id','=','transactions.account_id')
                ->select('transactions.id as id',
                    'transactions.created_at as transaction_created',
                    'transactions.updated_at as transaction_updated',
                    'transactions.account_id as nif',
                    'accounts.name',
                    'accounts.email',
                    'accounts.phone',
                    'transactions.address as address',
                    'subdistricts.name as subdistrict',
                    'cities.name as city',
                    'provinces.name as province',
                    'transactions.postal_code',
                    'transactions.status',
                    'transactions.payment_method',
                    'transactions.payment_bank',
                    'transactions.courier_name',
                    'transactions.courier_fee',
                    'transactions.tracking_number as tracking_note',
                    'transactions.amount'
                    )
                ->get()->toArray();
    foreach ($data as $key => $item) {
        $orderString = '';
        foreach ($item['orders'] as $order) {
            $productName = \App\Product::find($order['product_id'])->name;
            $orderString .= $productName. ' ('. $order['size']. '*'. $order['quantity'] . '), ';
        }
        $data[$key]['orders'] = $orderString;
    }
    if (count($data) == 0) {
            return redirect()->back()->with('alert', 'No Data found!');
        }
        $fileName = $request->start_date.'-'.$request->end_date.'-FSTVLST-Data-Orders';
        return Excel::create($fileName, function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('xlsx');
        
    }

    public function update(Request $request, $id)
    {
        $transaction = $this->transactions->findOrFail($id);
        $transaction->update($request->all());
        if ($transaction->status !== 'unpaid' && $transaction->tracking_number != null) {
            if ( isset($request->tracking_number) ) {
                Mail::to($transaction->account->email)->send(new OrderPaidMail($transaction));
                $transaction->update(['status' => 'shipped']);
            }
        }
        return redirect()->back();
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
