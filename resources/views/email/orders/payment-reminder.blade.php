@component('mail::message')
@if(isset($transaction))

{{-- # payment reminder
>  Please make payment before
**{{ $transaction->payment_duedate }}** --}}

## Transfer Bank amount
### Rp {{ number_format($transaction->amount) }} ,-
You can choose the bank you have.
### BCA 
* 232-2939-12
* Pre-order System Ltd.
### BRI 
* 20032-2939-1223
* Pre-order System Ltd.
### BNI
* 23211-2939-12
* Pre-order System Ltd.

### If you have already paid you can click button below.
@component('mail::button', ['url' => url('/confirm-payment/'.$transaction->paymentProof->token)])
Konfirmasi Bukti Pembayaran
@endcomponent

@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent