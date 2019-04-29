INVOICE: INV-{{ $transaction->id }}

@component('mail::button', ['url' => url('/confirm-payment/'.$transaction->paymentProof->token)])
Konfirmasi Bukti Pembayaran
@endcomponent