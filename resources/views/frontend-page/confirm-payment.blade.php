@extends('frontend-page.main')

@section('content')
    {{-- <section id="NIF">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <form action="{{ route('store.payment.proof') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $record->id }}">
                        <input type="hidden" name="token_payment" value="{{ $record->token }}">
                        <input type="hidden" name="transaction_id" value="{{ $record->transaction_id }}">
                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" class="form-control-file" name="image" id="image" placeholder="image" aria-describedby="fileImage">
                            <small id="fileImage" class="form-text text-muted">Upload bukti pembayaran disini</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="masukan kata sandimu">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
    <section id="reset-pass">
        <div class="wrapper resetbox">
            <div id="formContent">
                <div class="first">
                    <h2>KONFIRMASI PEMBAYARAN</h2>
                </div>
                <form action="{{ route('store.payment.proof') }}" enctype="multipart/form-data" id='form-proof' method="post">
                    <input type="hidden" name="id" value="{{ $record->id }}">
                    <input type="hidden" name="token_payment" value="{{ $record->token }}">
                    <input type="hidden" name="transaction_id" value="{{ $record->transaction_id }}">
                    <div class="form-group">
                        <label for="">Foto Bukti</label>
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