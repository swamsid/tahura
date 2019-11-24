<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrasi Pendakian </title>

    <link href="<?php echo e(asset('public/frontend/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/plugins/iCheck/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/plugins/steps/jquery.steps.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/styleregist.css')); ?>" rel="stylesheet">
    <!-- <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet"> -->
    <link href="<?php echo e(asset('public/frontend/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')); ?>" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg" style="margin-top: 0">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header" style="padding: 15px 10px 0px 15px;">
                    <a href="<?php echo e(Route('frontend.cek_pendakian')); ?>" style="color: #aaa; font-size: 10pt;">Cek status pendakian anda disini</a>
                </div>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>SOP Pendakian</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="../index.php">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo e(Route('frontend.registrasi')); ?>">Tata Cara Pendaftaran</a>
                    </li>
                    <li class="active">
                        <strong>SOP Pendakian</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight scroll">
                <div class="col-lg-12 kotak">
                    <div class="ibox float-e-margins" >
                        <div class="ibox-title">
                            <h5 style="font-size: 18px">PENDAFTARAN PENDAKIAN</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" id="ibox-content" style="background-color: #ffffff;font-size: 14px">
                            <p>Pendaftaran pendakian di kawasan Tahura Raden Soerjo dilakukan dengan sistem pendaftaran online, dengan ketentuan sebagai berikut :</p>
                            <div class="well wells">
                                Pastikan alamat email benar karena konfirmasi pendaftaran pendakian akan dikirim ke alamat email yang anda gunakan ketika mendaftar. Apabila tidak ada pesan pemberitahuan pada kotak masuk gmail harap periksa pada kotak SPAM.
                            </div>
                            <div class="well wells">
                                Waktu pelayanan administrasi registrasi pendakian pada hari Senin s/d Jumat jam 07.00 s/d 15.30 WIB.
                            </div>
                            <div class="well wells">
                                Waktu pelayanan perizinan pendakian pada setiap pos pendakian 24/7.
                            </div>
                            <div class="well wells">
                                Pendaftaran diberlakukan bagi calon pendaki, baik nusantara maupun mancanegara;
                            </div>
                            <div class="well wells">
                                Pendaftaran dilakukan secara online;
                            </div>
                            <div class="well wells">
                                Pendaftaran dilakukan dengan mengisi formulir yang bisa diakses dari website resmi UPT Tahura Raden Soerjo : sipenerang.tahuraradensoerjo.or.id dengan mengikuti alur pendaftaran;
                            </div>
                            <div class="well wells">
                                Pendaftaran dapat dilakukan maksimal 3 (tiga) hari sebelum hari pendakian (H-3);
                            </div>
                            <div class="well wells">
                                Konfirmasi pendaftaran akan diterima calon pendaki melalui email;
                            </div>
                            <div class="well wells">
                                <strong>BARANG SIAPA MELAKUKAN TINDAK PIDANA PENIPUAN/PEMALSUAN TIDAK AKAN DIBERIKAN IZIN UNTUK MENDAKI ATAU BERPARIWISATA KE WILAYAH TAHURA RADEN SOERJO (BLACK LIST)</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 kotak">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style="font-size: 18px">TARIF DAN PEMBAYARAN KARCIS</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" id="ibox-content" style="background-color: #ffffff;font-size: 14px">
                            <p>Setiap pendaki di kawasan Tahura Raden Soerjo dikenakan tarif karcis masuk sesuai dengan ketentuan yang tercantum pada Peraturan Pemerintah RI Nomor 12 tahun 2014 tentang Jenis dan Tarif Atas Jenis Penerimaan Negara Bukan Pajak yang Berlaku Pada Kementerian Kehutanan. Bila terdapat aturan / kebijakan baru tentang tarif karcis masuk di kawasan konservasi, maka tarif karcis pendakian akan disesuaikan sebagaimana peraturan terbaru tersebut.</p>
                            <p>1. Tarif karcis masuk pendaki Wisatawan Nusantara</p>
                            <div class="well wells">
                                <strong>Rp. 11.000,- / Orang / Hari</strong> <small>(Karcis Rp. 10.000 + Asuransi Rp. 1.000)</small>
                            </div>
                            <p style="margin-top: 10px;">2. Tarif karcis masuk pendaki Wisatawan Mancanegara</p>
                            <div class="well wells">
                                 <strong>Rp. 26.000,- / Orang / Hari</strong> <small>(Karcis Rp. 25.000 + Asuransi Rp. 1.000)</small>
                            </div>
                            <p style="margin-top: 10px;">3. Pembayaran dilakukan di pos masuk pendakian resmi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 kotak">
                    <div class="ibox float-e-margins" style="margin-bottom: 15px">
                        <div class="ibox-title">
                            <h5 style="font-size: 18px">PELAKSANAAN PENDAKIAN</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" id="ibox-content" style="background-color: #ffffff;font-size: 14px">
                            <ol>
                                <li>Bukti konfirmasi melalui email harus dicetak dan dibawa untuk menjadi alat bukti masuk ke pintu masuk pendakian pos pendakian Tretes, pos pendakian Lawang, pos pendakian Tambaksari, pos pendakian Sumber Brantas dan Gunung Pundak.</li>
                                <li>Persyaratan memperoleh izin pendakian :</li>
                            </ol>
                            <div class="well wells">
                                Bukti cetak pendaftaran menjadi syarat untuk memperoleh perizinan pendakian di kawasan Tahura Raden Soerjo;
                            </div>
                            <div class="well wells">
                                Bukti identitas asli ketua (KTP/Kartu Pelajar/KTM/SIM/Pasport) wajib diserahkan kepada petugas selama masa pendakian;
                            </div>
                            <div class="well wells">
                                Pendaki usia kurang dari 17 tahun harap disertakan surat izin orang tua/wali beserta fotokopi KTP orang tua/wali.
                            </div>
                            <div class="well wells">
                                Pendaki usia kurang dari 12 tahun harap disertakan Surat Pernyataan bertanggung jawab dengan segala resiko yang timbul dari kegiatan Pendakian ini dari orang tua/wali, membawa tim medis serta pemandu dan porter sendiri.
                            </div>
                            <div class="well wells">
                                Pendaki harus dilengkapi dengan Surat Keterangan Sehat yang dikeluarkan Dokter Rumah Sakit Pemerintah/Puskesmas yang diterbitkan maksimal H - 2 sebelum izin masuk kawasan.
                            </div>
                            <div class="well wells">
                                Ketua kelompok bertanggung jawab terhadap kelengkapan administrasi, keselamatan anggota dan bertanggungjawab membawa sampah turun kembali;
                            </div>
                            <div class="well wells">
                                Proses pemeriksaan dan pencocokan barang dilakukan oleh petugas sesuai dengan isi form pendaftaran online.
                            </div>
                            <div class="well wells">
                                Semua calon pendaki wajib mengikuti pengarahan/briefing;
                            </div>
                            <ol start="3">
                                <li>Mematuhi dan membayar restribusi Masuk Kawasan Tahura Raden Soerjo dan Asuransi sejumlah personil sesuai peraturan perundang-undangan yang berlaku dan pastikan Bukti Retribusi adalah karcis resmi yang dikeluarkan oleh UPT Tahura Raden Soerjo dan karcis Asuransi oleh PT. JASARAHARJA PUTERA sesuai dengan jumlah personil serta menyimpan bukti rertibusi tersebut.</li>
                                <li>Pada saat melakukan pendakian agar berjalan secara berkelompok, tidak memisahkan diri dari kelompok/rombongan, berjalan sesuai jalur yang sudah ditetapkan dan dilarang memotong jalur atau membuat jalur baru.</li>
                                <li>Menjaga keselamatan kelompok dan sesama pengunjung/pendaki serta menjaga kebersihan dan keamanan kawasan .</li>
                                <li>Turut berpatisipasi dalam upaya Pencegahan, Pengendalian dan Penangulangan Bencana Alam dan memastikan bahwa tempat yang ditinggalkan tidak terdapat api/bara api.</li>
                                <li>Kegiatan yang bersifat massal (reboisasi, diklat, lomba, upacara, dll) atau dalam bentuk kegiatan khusus (penelitian, survey) harus melalui proses pengajuan proposal ke kantor UPT Tahura Raden Soerjo paling lambat 15 hari sebelum kegiatan dilaksanakan.</li>
                                <li>Dalam rangka pengamanan pendakian dan perlindungan keanekaragaman hayati, beberapa hal yang harus diperhatikan antara lain :</li>
                            </ol>
                            <div class="well wells">
                                Setiap pendaki harus menggunakan perlengkapan/personal use yang memenuhi standar pendakian;
                            </div>
                            <div class="well wells">
                                Pendaki harus tetap berjalan pada jalur yang telah ditentukan;
                            </div>
                            <div class="well wells">
                                Pendaki harus mematuhi rekomendasi batas aman pendakian yang diberikan;
                            </div>
                            <div class="well wells">
                                Tempat mendirikan tenda hanya di lokasi yang telah ditentukan;
                            </div>
                            <div class="well wells">
                                Pendaki dilarang membuat api dari kayu dan sampah anorganik untuk tujuan apapun;
                            </div>
                            <div class="well wells">
                                Pendaki yang turun harus melapor dan membawa kembali sampah untuk diperiksa oleh petugas di pos pendakian;
                            </div>
                            <ol start="9">
                                <li>Setiap pendaki diwajibkan untuk menggunakan :</li>
                            </ol> 
                            <div class="well wells">
                                Tenda kedap air;
                            </div>
                            <div class="well wells">
                                Ransel/carrier dengan spesifikasi kuat dan kondisi baik, nyaman untuk pendakian;
                            </div>
                            <div class="well wells">
                                Matras, kantong tidur (Sleeping bag), sarung tangan, kaos kaki, bandana/kerpus/kupluk, sepatu, dan jas hujan sesuai standar pendakian;
                            </div>
                            <div class="well wells">
                                Lampu senter, head lamp dan baterai cadangan;
                            </div>
                            <div class="well wells">
                                Perbekalan logistik, disesuaikan dengan rencana perjalanan dan jumlah anggota kelompok;
                            </div>
                            <div class="well wells">
                                Obat-obatan pribadi (alat P3K);
                            </div>
                            <div class="well wells">
                                Disarankan untuk membawa Tracking Pole dan Safety Helmet for Climbing.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 kotak" style="margin-top: 20px">
                    <div class="ibox float-e-margins" >
                        <div class="ibox-title">
                            <h5 style="font-size: 18px">LARANGAN</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" id="ibox-content" style="background-color: #ffffff;font-size: 14px">
                            <ol>
                                <li>
                                Dalam rangka mempertahankan nilai penting keanekaragaman hayati ekosistem, maka pendakian di wilayah Arjuno - Welirang harus dilaksanakan dengan memperhatikan :    
                                </li>
                            </ol>
                            <div class="well wells">
                                Dilarang membawa alat alat yang terindikasi digunakan untuk melakukan tindakan yang mengakibatkan kerusakan flora/fauna, melakukan coretan-coretan/vandalisme pada benda-benda,pohon atau bangunan didalam kawasan.
                            </div>
                            <div class="well wells">
                                Dilarang memaksakan diri untuk melanjutkan perjalanan jika kondisi dan situasi tidak memungkinkan (kesehatan, cuaca, keamanan) .
                            </div>
                            <div class="well wells">
                                Dilarang melanggar norma agama, norma asusila, norma budaya dan nilai-nilai adat istiadat masyarakat setempat.
                            </div>
                            <div class="well wells">
                                Dilarang membawa dan minum-minuman keras (beralkohol) membawa dan menggunakan obat-obat terlarang (narkoba)
                            </div>
                            <div class="well wells">
                               Dilarang membuat bangunan permanen, semi permanen dengan tujuan tertentu tanpa ada surat izin dari UPT Tahura Raden Soerjo dan mengetahui Dinas Purbakala.
                            </div>
                            <div class="well wells">
                                Dilarang Merubah bentuk asli, Merusak, Memugar, Mencuri, Memindah letak lokasi, Mengganti yang asli dengan Replika situs Purbakala di dalam kawasan Tahura Raden Soerjo.
                            </div>
                            <div class="well wells">
                                Dilarang membuang sampah sembarangan dan wajib membawa sampah anda turun kembali.
                            </div>
                            <div class="well wells">
                                Dilarang membawa senjata tajam dan senjata api yang tidak selayaknya untuk kegiatan pendakian 
                            </div>
                            <div class="well wells">
                                Dilarang Melakukan tindakan yang menagkibatkan kerusakan flora / fauna serta vandalisme 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 kotak" style="margin-top: 20px">
                    <div class="ibox float-e-margins" >
                        <div class="ibox-title">
                            <h5 style="font-size: 18px">CONTACT PERSON</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" id="ibox-content" style="background-color: #ffffff;font-size: 14px">
                            <ol>
                                <li> Admin </li>
                            </ol>
                            <div class="well wells">
                                Amiruzzuhhad Gunes - 081216640854
                            </div>
                            <div class="well wells">
                                Angga Krisnadewi - 085815536995
                            </div>
<div class="row">
    <div class="col-md-6">
                            <ol start="2">
                                <li> Pos Tretes </li>
                            </ol>
                            <div class="well wells">
                                Muhamad Junaedi - 081554432204
                            </div>
                            <div class="well wells">
                                Kasiyanto - 082244528344
                            </div>
                            <div class="well wells">
                                Mohamad Alfan - 081332303636
                            </div>
                            <div class="well wells">
                                Wahyu Rama Dhoni - 08973854949
                            </div>
    </div>
    <div class="col-md-6">
                            <ol start="3">
                                <li> Pos Tambaksari </li>
                            </ol>
                            <div class="well wells">
                                Hadi Choirul - 082244737622
                            </div>
                            <div class="well wells">
                                Nur Yusuf - 082245814672
                            </div>
                            <div class="well wells">
                                Talis - 085606589978
                            </div>
                            <div class="well wells">
                                Atim Muhammad Rosul - 085856200755
                            </div>
    </div>
    <div class="col-md-6">
                            <ol start="4">
                                <li> Pos Lawang </li>
                            </ol>
                            <div class="well wells">
                                Rudiono - 081330787722
                            </div>
                            <div class="well wells">
                                Khairul Anam - 082231518172
                            </div>
                            <div class="well wells">
                                Arif Yuwono - 081331834646
                            </div>
    </div>
    <div class="col-md-6">
                            <ol start="5">
                                <li> Pos Sumberbrantas </li>
                            </ol>
                            <div class="well wells">
                                Eko Budiono - 082234604229
                            </div>
                            <div class="well wells">
                                Dadang Suhendro - 082257496114
                            </div>
                            <div class="well wells">
                                Sudarmanto - 085336983164
                            </div>
                            <div class="well wells">
                                Gimin - 085233337074
                            </div>
                            <div class="well wells">
                                Rudi Siswanto - 081358832678
                            </div>
    </div>
</div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-12 kotak">
                    <div class="ibox-content" id="ibox-content" style="background-color: #ffffff;font-size: 14px">
                        <div class="col-sm-12" style="padding: 20px 15px">
                            <table class="tabel">
                                <tr>
                                    <td><input id="question1" name="question1" type="checkbox" value="1"> </td>
                                    <td><label> Saya telah membaca, mensetujui, dan mengikuti semua peraturan dan SOP diatas </label></td>
                                </tr>
                                <tr>
                                    <td><input id="question2" name="question2" type="checkbox" value="2"></td>
                                    <td><label> Wajib untuk dibawa : </label></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <ol> 
                                            <li> Berkas pendaftaran yang telah disetujui </li> 
                                            <li> Membawa KTP/KTM/SIM/Paspor yang masih berlaku  </li>
                                            <li> Pendaki usia kurang dari 17 tahun harus menyerahkan surat izin dari orangtua/wali </li>
                                            <li> Membawa trash bag / kantong sampah </li>
                                            <li> Surat keterangan sehat </li>
                                        </ol>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <a href="<?php echo e(Route('frontend.registrasi.form')); ?>">
                            <input class="btn btn-primary tengah next_button" type="button" value="Daftar" disabled="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo e(asset('public/frontend/js/jquery-2.1.1.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo e(asset('public/frontend/js/inspinia.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/plugins/pace/pace.min.js')); ?>"></script>

    <!-- Steps -->
    <script src="<?php echo e(asset('public/frontend/js/plugins/staps/jquery.steps.min.js')); ?>"></script>

    <!-- Jquery Validate -->
    <script src="<?php echo e(asset('public/frontend/js/plugins/validate/jquery.validate.min.js')); ?>"></script>

    <!-- Input Mask-->
    <script src="<?php echo e(asset('public/frontend/js/plugins/jasny/jasny-bootstrap.min.js')); ?>"></script>

    <!-- Data picker -->
    <script src="<?php echo e(asset('public/frontend/js/plugins/datapicker/bootstrap-datepicker.js')); ?>"></script>

    <!-- iCheck -->
    <script src="<?php echo e(asset('public/frontend/js/plugins/iCheck/icheck.min.js')); ?>"></script>

    <script>
        $(document).ready(function () {
            $("#question1, #question2").change(function () {
                if ($("#question1").is(':checked') && $("#question2").is(':checked') ) {
                    $('.next_button').attr('disabled', false);
                } else {
                    $('.next_button').attr('disabled', true);
                }
            });
        });
    </script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\project_lain\tahura\resources\views/frontend/registrasi/sop.blade.php ENDPATH**/ ?>