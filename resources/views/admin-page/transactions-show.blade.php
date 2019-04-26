@extends('index')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="row">
        <div class="col-lg-8">
            <h2 class="title-1 m-b-25">Transaction: INV-{{ date("d-m-Y", strtotime($transaction->created_at)) }}-{{ sprintf("%06d", $transaction->id) }} </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            Link Token: <a href="/confirm-payment/{{ $transaction->paymentProof->token }}">{{ $transaction->paymentProof->token }}</a>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection