@extends('index')

@section('css')
    <style>
        table.td-no-p tr td { padding-left: 0!important; }
    </style>
@endsection

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
            <table class="table td-no-p">
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
            <table class="table td-no-p">
                <tr>
                    <td>Shipping Address</td>
                    <td>: {{ $transaction->address }}</td>
                </tr>
                <tr>
                    <td>Subdistrict</td>
                    <td>: {{ $transaction->fullAddress }}</td>
                </tr>
                <tr>
                    <td>Courier Detail</td>
                    <td>: {{ $transaction->courier_name == 'ambil' ? 'ambil di lib' : $transaction->courier_name }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-4">
            <h4>Others</h4>
            <table class="table td-no-p">
                <tr>
                    <td>Status</td>
                    <td>: {{ $transaction->status }}</td>
                </tr>
                @if ( isset($transaction->paymentProof->image) )
                    <tr>
                        <td>Payment Proof</td>
                        <td>:
                            <a href="#" id="displayProofImg" data-toggle="modal" data-target="#proofImgModal">lihat gambar</a>
                            {{-- <img src="{{ Storage::disk('s3')->url($transaction->paymentProof->image) }}" alt="payment_proof"> --}}
                        </td>
                    </tr>
                @endif
                <tr>
                    <td>Catatan Order</td>
                    <td>:</td>
                </tr>
                <tr>
                    <form action="{{ route('admin.transaction.update', $transaction->id) }}" method="post">@csrf
                    <td colspan="2" class="text-right">
                        <textarea class="form-input" name="tracking_number" id="tracking_number" cols="20" rows="5" required>{{ $transaction->tracking_number ?: null }}</textarea>
                        {{-- <input type="text" name="tracking_number" value="{{ $transaction->tracking_number }}" required> --}}
                        <input class="btn btn-info" type="submit" value="Simpan">
                    </td>
                    </form>
                </tr>
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
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>Rp. {{ $order->price }}</td>
                        <td>Rp. {{ $order->subtotal }}</td>
                        <td>{{ $order->size }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Ongkir</td>
                    <td>Rp. {{ $transaction->courier_fee ?: '0' }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">Total</td>
                    <td>Rp. {{ $transaction->amount+$transaction->courier_fee }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="proofImgModal" tabindex="-1" role="dialog" aria-labelledby="proofImgModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="proofImgModalLabel">Gambar bukti transfer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ( isset($transaction->paymentProof->image) )
                <div class="modal-body">
                    <img src="{{ Storage::disk('s3')->url($transaction->paymentProof->image) }}" alt="proof image">
                </div>
                @endif
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection