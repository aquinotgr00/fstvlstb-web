@extends('index')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="row">
        <div class="col-lg-8">
            <h2 class="title-1 m-b-25">Transaction: INV-{{ date("d-m-Y", strtotime($transaction->created_at)) }}-{{ sprintf("%06d", $transaction->id) }} </h2>
        </div>
    </div>
    @if (isset($transaction->paymentProof->token))
        <div class="row">
            <div class="col-lg-12">
                Link Token: <a href="/confirm-payment/{{ $transaction->paymentProof->token }}">{{ $transaction->paymentProof->token }}</a>
            </div>
        </div>
    @endif
    <div class="row mt-4">
        <div class="col-md-4">
            <h4>Account Information</h4>
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>: {{ $transaction->account->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: {{ $transaction->account->email }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>: {{ $transaction->account->phone }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>: {{ $transaction->account->address }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-4">
            <h4>Detail Orders</h4>
            <table class="table">
                <tr>
                    <td>Shipping Address</td>
                    <td>: {{ $transaction->address }}</td>
                </tr>
                <tr>
                    <td>Subdistrict</td>
                    <td>: {{ $transaction->fullAddress }}</td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td>: {{ $transaction->quantity }} Items - {{ $transaction->amount }}</td>
                </tr>
                <tr>
                    <td>Courier Detail</td>
                    <td>: {{ $transaction->courier_name }} - Rp. {{ $transaction->courier_fee }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-4">
            Others
            <table class="table">
                <tr>
                    <td>Status</td>
                    <td>: {{ $transaction->status }}</td>
                </tr>
                <tr>
                    <td>Tracking Number</td>
                    <form action="{{ route('admin.transaction.update', $transaction->id) }}" method="post">@csrf
                    <td>:
                        <input type="text" name="tracking_number" value="{{ $transaction->tracking_number }}" required>
                        <input type="submit" value="">
                    </td>
                    </form>
                </tr>
                @if ( isset($transaction->paymentProof->image) )
                    <tr>
                        <td>Payment Proof</td>
                        <td>: <img src="{{ Storage::disk('s3')->url($transaction->paymentProof->image) }}" alt="payment_proof"></td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
    <div class="row mt-5">
        <h4>Items</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Others</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction->orders as $order)
                    <tr>
                        <td>{{ $order->product_id }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->subtotal }}</td>
                        <td>{{ $order->size }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END MAIN CONTENT-->
@endsection