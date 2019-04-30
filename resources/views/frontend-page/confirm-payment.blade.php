@extends('frontend-page.main')

@section('content')
    <section id="NIF">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <form action="/confirm-payment" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $record->id }}">
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
    </section>
@endsection