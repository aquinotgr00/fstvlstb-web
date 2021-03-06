@extends('frontend-page.main')

@section('content')
    <section id="reset-pass">
        <div class="wrapper resetbox">
            <div id="formContent">
                <div class="first">
                    <h2>KONFIRMASI PEMBAYARAN</h2>
                    <h5 style="color: red;">*Input hanya berlaku satu kali, silakan input dengan seksama.</h5>
                </div>
                <form action="{{ route('store.payment.proof') }}" enctype="multipart/form-data" id='form-proof' method="post">
                    <input type="hidden" name="id" value="{{ $record->id }}">
                    <input type="hidden" name="token_payment" value="{{ $record->token }}">
                    <input type="hidden" name="transaction_id" value="{{ $record->transaction_id }}">
                    <div class="form-group">
                        <label for="">Foto Bukti Transfer</label>
                        <div class="thumbnail thumbnail-photo thumbnail-struk">
                                @csrf
                                <img id="proof_thumbnail" src="{{asset('frontend/images/struk-atm.jpg')}}" alt="">
                                <input style="display: none;" name="image" type="file">
                                <button id="proof-image" class="btn btn-plus btn-struk" type="button"><i class="fa fa-plus"></i></button>
                        </div>
                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Kata Sandi</label>
                        <input required type="password" name="password" class="form-control" placeholder="******">
                    </div>
                    <div>
                        <button class="btn btn-danger btn-block btn-submit" type="submit">GAS!</button>
                    </div>
                </form>                
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $("#proof-image").click(function() {
            $("input[name='image']").click();
        });

        $(function () {
            $('input[name="image"]').change(function () {
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#proof_thumbnail').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });

        });
    </script>
@endsection