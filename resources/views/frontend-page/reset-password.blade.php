<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;" />
    <title>Reset Password</title>

    <!-- CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/app.css">


    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <section id="reset-pass">
        <div class="wrapper resetbox">
            <div id="formContent">
                <div class="first">
                    <h2>ATUR ULANG</h2>
                    <h2 class="nomargin">KATA SANDI</h2>
                </div>
                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="text" class="form-control" placeholder="robyyoibanget@email.com">
                </div>
                <div class="form-group">
                    <label for="">Kata Sandi Baru</label>
                    <input type="text" class="form-control" placeholder="******">
                </div>
                <div class="form-group">
                    <label for="">Ketik Ulang Kata Sandi Baru</label>
                    <input type="text" class="form-control" placeholder="******">
                </div>
                <div class="form-group">
                    <button class="btn btn-danger btn-block btn-submit" data-toggle="modal" data-target="#modal-sukses" data-dismiss="modal">UBAH KATA SANDI!</button>
                    
                </div>
                
            </div>
        </div>
    </section>
</body>
</html>