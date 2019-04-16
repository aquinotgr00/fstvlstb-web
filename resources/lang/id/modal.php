<?php

return [
    'register' => [
        'heading' => 'PENDAFTARAN',
        'have_account' => 'Jika sudah punya NIF, silahkan <a href="#" data-toggle="modal" data-target="#modal-masuk" data-dismiss="modal">Masuk</a>',
        'columns' => [
            'name' => 'Nama Lengkap',
            'photo' => 'Foto Wajah',
            'email' => 'E-mail',
            'phone' => 'Nomor Telepon',
            'address' => 'Alamat Lengkap Untuk Pengiriman',
            'gender' => 'Kelamin',
            'born_date' => 'Tanggal Lahir',
            'month' => 'Bulan',
            'year' => 'Tahun',
            'password' => 'Kata Sandi',
            're_password' => 'Pastikan Lagi Kata Sandi',
            'gas' => 'GAS!'
        ],
    ],
    'login' => [
        'heading' => 'MASUK',
        'need_account' => 'Jika belum punya NIF, silakan ke bagian <a href="#" data-toggle="modal" data-target="#modal-daftar" data-dismiss="modal">Pendaftaran</a>',
        'columns' => [
            'email' => 'NIF/E-mail',
            'password' => 'Kata Sandi',
            'forgot_password' => '<a href="#" data-toggle="modal" data-target="#modal-reset" data-dismiss="modal">Lupa</a> Kata Sandi',
            'gas' => 'GAS!'
        ],
    ],
    'reset' => [
        'heading' => 'RESET',
        'columns' => [
            'email' => 'E-mail',
            'gas' => 'GAS!',
        ],
    ],
    'succeed' => [
        'heading' => 'SELAMAT',
        'top_detail' => 'Kamu sudah terdaftar di FSTVLST, <br /> NIF (Nomor Induk Festivalist)-mu adalah:',
        'bot_detail' => 'Ini adalah nomor saktimu, <br /> Untuk segala urusan administratif dengan FSTVLST.',
        'dont_forget' => 'Simpan, jangan lupakan.',
        'share' => 'Bagikan dan ceritakan dengan bertanggungtanya.',
        'success' => 'SUKSES',
        'check_email' => 'Silahkan Cek Email untuk reset password.',
    ],
    'error' => [
        'hold_on' => 'SEBENTAR SEBENTAR',
        'too_many_attempt' => 'Kamu sudah 3 kali salah memasukkan kata sandi.',
        'button' => 'BAIKLAH',
    ],
];