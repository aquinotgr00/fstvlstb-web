@extends('frontend-page.main')
@section('content') 
    <section id="boxset">
        <div class="container">
            <div class="row row-layout" style="height: 100%;">
                <div class="col-md-10 privacy-policy-p">



                        <h1 class="text-center">@lang('privacy-policy.title')</h1>
                        <br><br>
                        @lang('privacy-policy.first-section')
                        {{-- <p>
                            FSTVLST mengoperasikan situs web http://fstvlst.id (yang selanjutnya disebut sebagai "Layanan").
                        </p>

                        <p>
                            Halaman ini memberi tahu Anda tentang kebijakan kami mengenai pengumpulan, penggunaan, dan pengungkapan data pribadi saat Anda menggunakan Layanan kami dan pilihan yang telah Anda kaitkan dengan data itu.
                        </p>

                        <p>
                            Kami menggunakan data Anda untuk menyediakan dan meningkatkan Layanan. Dengan menggunakan Layanan, Anda menyetujui pengumpulan dan penggunaan informasi sesuai dengan kebijakan ini. Kecuali ditentukan lain dalam Kebijakan Privasi ini, istilah yang digunakan dalam Kebijakan Privasi ini memiliki arti yang sama seperti dalam Syarat dan Ketentuan kami, dapat diakses dari http://fstvlst.id
                        </p>


                        <h2>Pengumpulan dan Penggunaan Informasi</h2>
                        <p>
                            Kami mengumpulkan beberapa jenis informasi yang berbeda untuk berbagai keperluan untuk menyediakan dan meningkatkan Layanan kami kepada Anda.
                        </p> --}}


                        @lang('privacy-policy.second-section')
                        {{-- <h3>Jenis Data yang Dikumpulkan</h3>
                        <h4>Data pribadi</h4>
                        <p>
                            Saat menggunakan Layanan kami, kami mungkin meminta Anda untuk memberikankami informasi pengenal pribadi tertentu yang dapat digunakan untuk menghubungi atau mengidentifikasi Anda ("Data Pribadi"). Informasi yang dapat diidentifikasi secara pribadi dapat mencakup, tetapi tidak terbatas pada:
                        </p>
                        <ul style="margin-left: 3rem;">
                            <li>Alamat email</li>
                            <li>Nama depan dan nama belakang</li>
                            <li>Nomor telepon</li>
                            <li>Alamat, Negara Bagian, Provinsi, ZIP / Kode pos, Kota</li>
                            <li>Data Cookie</li>
                        </ul>

                        <h4>Data Penggunaan</h4>
                        <p>
                            Kami juga dapat mengumpulkan informasi tentang bagaimana Layanan diakses dandigunakan ("Data Penggunaan"). Data Penggunaan ini dapat mencakup informasi seperti alamat Protokol Internet komputer Anda (mis. Alamat IP), jenis browser, versibrowser, halaman Layanan kami yang Anda kunjungi, waktu dan tanggal kunjungan Anda, waktu yang dihabiskan untuk halaman-halaman itu, unik pengidentifikasi perangkat dan data diagnostik lainnya.
                        </p>

                        <h4>Pelacakan & Data Cookie</h4>
                        <p>
                            Kami menggunakan cookie dan teknologi pelacakan serupa untuk melacak aktivitas di Layanan kami dan menyimpan informasi tertentu.
                        </p>
                        <p>
                            Cookie adalah file dengan sedikit data yang dapat menyertakan pengidentifikasi unik anonim. Cookie dikirim ke browser Anda dari situs web dan disimpan di perangkat Anda. Teknologi pelacakan yang juga digunakan adalah suar, tag, dan skrip untuk mengumpulkan dan melacak informasi dan untuk meningkatkan dan menganalisis Layanan kami.
                        </p>
                        <p>
                            Anda dapat menginstruksikan browser Anda untuk menolak semua cookie atau untuk menunjukkan kapan cookie dikirim. Namun, jika Anda tidak menerima cookie,Anda mungkin tidak dapat menggunakan sebagian Layanan kami.
                            <br>
                            <br>
                            Contoh Cookie yang kami gunakan:
                        </p>
                        <ul style="margin-left: 3rem;">
                            <li>Cookie Sesi. Kami menggunakan Cookie Sesi untuk mengoperasikan Layanan kami.</li>
                            <li>Kue Pilihan. Kami menggunakan Cookie Preferensi untuk mengingat preferensi Anda dan berbagai pengaturan.</li>
                            <li>Cookie Keamanan. Kami menggunakan Cookie Keamanan untuk tujuan keamanan.</li>
                        </ul>

                        <h4>Penggunaan Data</h4>
                        <p>
                            FSTVLST menggunakan data yang dikumpulkan untuk berbagai keperluan:
                        </p>
                        <ul style="margin-left: 3rem;">
                            <li>Untuk menyediakan dan memelihara Layanan</li>
                            <li>Untuk memberitahukan Anda tentang perubahan didalam pelayanan kami• Untuk memungkinkan Anda berpartisipasi dalam fitur interaktif Layanan kami ketika Anda memilih untuk melakukannya</li>
                            <li>Untuk memberikan layanan dan dukungan pelanggan</li>
                            <li>Untuk memberikan analisis atau informasi berharga sehingga kami dapat meningkatkan Layanan</li>
                            <li>Untuk memantau penggunaan Layanan• Untuk mendeteksi, mencegah dan mengatasi masalah teknis</li>
                        </ul>

                        <h4>Transfer Data</h4>
                        <p>
                            Informasi Anda, termasuk Data Pribadi, dapat ditransfer ke - dan dipelihara di - komputer yang berlokasi di luar negara bagian, provinsi, negara atau yurisdiksi pemerintah lainnya di mana undang-undang perlindungan data mungkin berbeda dari yang ada di yurisdiksi Anda.
                        </p>
                        <p>
                            Jika Anda berada di luar Indonesia dan memilih untuk memberikan informasi kepadakami, harap perhatikan bahwa kami mentransfer data, termasuk Data Pribadi, ke Indonesia dan memprosesnya di sana.
                        </p>
                        <p>
                            Persetujuan Anda untuk Kebijakan Privasi ini diikuti dengan pengiriman informasi tersebut merupakan persetujuan Anda untuk transfer tersebut.
                        </p>
                        <p>
                            FSTVLST akan mengambil semua langkah yang wajar diperlukan untuk memastikan bahwa data Anda diperlakukan dengan aman dan sesuai dengan Kebijakan Privasi ini dan tidak ada transfer Data Pribadi Anda yang akan terjadi pada suatu organisasiatau negara kecuali jika ada kontrol yang memadai di tempat termasuk keamanan Anda data dan informasi pribadi lainnya.
                        </p> --}}


                        @lang('privacy-policy.third-section')
                        {{-- <h3>Keterbukaan Data</h3>
                        <h4>Legal Requirements</h4>
                        
                        <p>
                            FSTVLST dapat mengungkapkan Data Pribadi Anda dengan itikad baik bahwa tindakan tersebut diperlukan untuk:
                        </p>

                        <ul style="margin-left: 3rem;">
                            <li>Untuk mematuhi kewajiban hukum</li>
                            <li>Untuk melindungi dan mempertahankan hak atau properti FSTVLST</li>
                            <li>Untuk mencegah atau menyelidiki kemungkinan kesalahan sehubungan dengan Layanan</li>
                            <li>Untuk melindungi keamanan pribadi pengguna Layanan atau publik</li>
                            <li>Untuk melindungi terhadap tanggung jawab hukum</li>
                        </ul>
                        
                        <h4>Keamanan Data</h4>
                        <p>
                            Keamanan data Anda penting bagi kami, tetapi ingat bahwa tidak ada metode transmisi melalui Internet, atau metode penyimpanan elektronik yang 100% aman. Meskipun kami berusaha untuk menggunakan cara yang dapat diterima secara komersial untuk melindungi Data Pribadi Anda, kami tidak dapat menjamin keamanan mutlaknya.
                        </p>
                        
                        <h4>Penyedia jasa</h4>
                        <p>
                            Kami dapat mempekerjakan perusahaan pihak ketiga dan individu untuk memfasilitasi Layanan kami ("Penyedia Layanan"), untuk memberikan Layanan atasnama kami, untuk melakukan layanan terkait Layanan atau untuk membantu kami dalam menganalisis bagaimana Layanan kami digunakan.Pihak ketiga ini memiliki akses ke Data Pribadi Anda hanya untuk melakukan tugas-tugas ini atas nama kami dan berkewajiban untuk tidak mengungkapkan atau menggunakannya untuk tujuan lain apa pun.
                        </p>

                        <h4>Tautan ke Situs Lain</h4>
                        <p>
                            Layanan kami dapat berisi tautan ke situs lain yang tidak dioperasikan oleh kami. Jika Anda mengklik tautan pihak ketiga, Anda akan diarahkan ke situs pihak ketiga itu. Kami sangat menyarankan Anda untuk meninjau Kebijakan Privasi setiap situs yang Anda kunjungi.Kami tidak memiliki kendali atas dan tidak bertanggung jawab atas konten, kebijakan privasi, atau praktik situs atau layanan pihak ketiga mana pun.
                        </p>
                        
                        <h4>Privasi anak-anak</h4>
                        <p>
                            Layanan kami tidak membahas siapa pun yang berusia di bawah 18 ("Anak-anak").Kami tidak secara sadar mengumpulkan informasi yang dapat diidentifikasi secara pribadi dari siapa pun yang berusia di bawah 18 tahun. Jika Anda adalah orang tua atau wali dan Anda mengetahui bahwa Anak-anak Anda telah memberikan kepada kami Data Pribadi, silakan hubungi kami. Jika kami mengetahui bahwa kami telah mengumpulkan Data Pribadi dari anak-anak tanpa verifikasi izin orang tua, kami mengambil langkah-langkah untuk menghapus informasi itu dari server kami.
                        </p>
                        
                        <h4>Perubahan pada Kebijakan Privasi Ini</h4>
                        <p>
                            Kami dapat memperbarui Kebijakan Privasi kami dari waktu ke waktu. Kami akan memberi tahu Anda tentang segala perubahan dengan memposting Kebijakan Privasi baru di halaman ini.Kami akan memberi tahu Anda melalui email dan / atau pemberitahuan penting pada Layanan kami, sebelum perubahan menjadi efektif dan memperbarui "tanggal efektif" di bagian atas Kebijakan Privasi ini.Anda disarankan untuk meninjau Kebijakan Privasi ini secara berkala untuk setiap perubahan. Perubahan pada Kebijakan Privasi ini efektif ketika diposkan pada halaman ini.
                        </p>
                        
                        <h4>Hubungi kami</h4>
                        <p>
                            Jika Anda memiliki pertanyaan tentang Kebijakan Privasi ini, silakan hubungi kami:
                        </p>
                        <ul style="margin-left: 3rem;">
                            <li>Melalui email: fstvlstmngmnt@gmail.com</li>
                        </ul> --}}



                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    
@endsection