@extends('frontend.main')

@section('nav')
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <h1><img src="{{ asset('frontend/img/logoweb-01.png') }}" height="40px" class="imeg"></h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="#intro">Home</a></li>
		        <li><a href="#profil">Profil</a></li>
				<li><a href="#contact">Kontak</a></li>
				<li><a href="{{ Route('frontend.registrasi') }}" target="_blank">Registrasi Pendakian</a></li>
                <li><a href="{{ Route('frontend.cek_pendakian') }}" target="_blank">Cek Status Pendakian</a></li>
		        <!-- <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Example menu</a></li>
		            <li><a href="#">Example menu</a></li>
		            <li><a href="#">Example menu</a></li>
		          </ul>
		        </li> -->
		      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
@endsection

@section('content')
	<!-- Section: intro -->
    <section id="intro" class="intro">
		<div class="slogan">
			<h2>SELAMAT DATANG</h2>
			<h4>OFFICIAL WEBSITE UPT TAHURA RADEN SOERJO</h4>
		</div>
		<div class="page-scroll">
			<a href="#profil" class="btn btn-circle wow shake animated">
				<i class="fa fa-angle-double-down"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->

	<!-- Section Profil -->
	<section id="profil" class="home-section">
		<div class="container">
			<div class="row">
				<div class="col-md-5 wow bounceInUp ">
					<h2 style="font-size: 3em"><span style="font-weight: 300">Profil</span> Tahura Raden Soerjo</h2>
				</div>
				<div class="col-md-7 wow bounceInUp ">
					<p style="text-align: justify !important;">Taman Hutan Raya Raden Soerjo (disingkat Tahura Raden Soerjo) adalah sebuah kawasan taman hutan raya yang berada di dalam kompleks gunung Arjuno-Welirang-Anjasmoro. Wilayah taman hutan raya ini secara administratif termasuk ke dalam wilayah Kabupaten Mojokerto, Kabupaten Malang, Kabupaten Jombang, Kabupaten Pasuruan dan Kota Batu, Provinsi Jawa Timur, Indonesia. Rintisan penetapan Tahura Raden Soerjo diawali pada tahun 1992, yakni dengan dicanangkannya kawasan hutan raya yang meliputi Hutan Lindung Gunung Anjasmoro, Gunung Gede, Gunung Biru, Gunung Limas, serta kawasan cagar alam Arjuno-Lalijiwo.</p>
					<p style="text-align: justify !important;">Penataan batas ulang dilakukan oleh Departemen Kehutanan pada tahun 1997, di mana luas kawasan hutan raya berkembang manjadi 27.868,30 Ha, dengan rincian luas Kawasan Hutan Lindung 22.908,3 Ha, dan Kawasan Cagar Alam Arjuno-Lalijiwo (PHPA) 4.960 Ha. Saat ini Tahura Raden Soerjo dikelola oleh Unit Pelayanan Teknis di bawah Dinas Kehutanan Provinsi Jawa Timur.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Section: about -->
    <section class="home-section text-center bg-gray" style="padding-top: 50px">
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown">
						<div class="section-heading">
						<h2>PESONA WISATA</h2>
						<i class="fa fa-2x fa-angle-down"></i>

						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
        	<div class="row">
            	<ul class="ch-grid">
					<li>
						<div class="ch-item ch-img-1 wow bounceInUp ">
							<div class="ch-info">
								<a data-toggle="modal" href="#modal-form" data-target="#myModal"><h3>Pendakian Arjuno Welirang</h3></a>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-2 wow bounceInUp ">
							<div class="ch-info">
								<h3>Air Terjun Tretes</h3>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-3 wow bounceInUp ">
							<div class="ch-info">
								<h3>Air Terjun Watu Ondo</h3>
							</div>
						</div>
					</li>
				
					<li>
						<div class="ch-item ch-img-4 wow bounceInUp ">
							<div class="ch-info">
								<h3>Pemandian Air Panas Cangar</h3>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-5 wow bounceInUp ">
							<div class="ch-info">
								<h3>Akar Seribu Begaganlimo</h3>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-6 wow bounceInUp ">
							<div class="ch-info">
								<h3>Air Terjun Watu Lumpang</h3>
							</div>
						</div>
					</li>
			
					<li>
						<div class="ch-item ch-img-7 wow bounceInUp ">
							<div class="ch-info">
								<h3>Wisata Panorama Petung Sewu</h3>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-8 wow bounceInUp ">
							<div class="ch-info">
								<h3>Bumi Perkemahan Celaket</h3>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-9 wow bounceInUp ">
							<div class="ch-info">
								<h3>Pendakian Watu Jengger</h3>
							</div>
						</div>
					</li>
				</ul>
            </div>
        </div>		
	</section>
	<!-- /Section: about -->

	<!-- Kabar Tahura -->
	<section class="home-section text-center" style="padding-top: 70px">
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown">
							<div class="section-heading">
								<h2>Kabar Tahura</h2>
								<i class="fa fa-2x fa-angle-down"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 wow bounceInUp">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div class="product-imitation">
                                [ INFO ]
                            </div>
                            <div class="product-desc" style="text-align: left">
                                <span class="product-price">
                                    16/06/2019
                                </span>
                                <a href="#" class="product-name"> Perlindungan dan Pengawetan Hutan</a>
                                <div class="small m-t-xs">
                                   Perlindungan dan Pengawetan Hutan
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-3 col-sm-6 wow bounceInUp">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div class="product-imitation">
                                [ INFO ]
                            </div>
                            <div class="product-desc" style="text-align: left">
                                <span class="product-price">
                                    16/06/2019
                                </span>
                                <a href="#" class="product-name"> Pembinaan Generasi Muda</a>
                                <div class="small m-t-xs">
                                   Pembinaan Generasi Muda
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-3 col-sm-6 wow bounceInUp">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div class="product-imitation">
                                [ INFO ]
                            </div>
                            <div class="product-desc" style="text-align: left">
                                <span class="product-price">
                                    16/06/2019
                                </span>
                                <a href="#" class="product-name"> Penyuluhan Dan Pemberdayaan Masyarakat</a>
                                <div class="small m-t-xs">
                                  Penyuluhan Dan Pemberdayaan Masyarakat
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-3 col-sm-6 wow bounceInUp">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div class="product-imitation">
                                [ INFO ]
                            </div>
                            <div class="product-desc" style="text-align: left">
                                <span class="product-price">
                                    16/06/2019
                                </span>
                                <a href="#" class="product-name"> Menjadikan Hutan Sebagai Sahabat Alam</a>
                                <div class="small m-t-xs">
                                  Menjadikan Hutan Sebagai Sahabat Alam
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<a href="berita.html" class="btn btn-primary"> Tampilkan Semua</a>
			</div>
		</div>
	</section>
	<!-- /Section: Kabar Tahura -->

	<!-- Jalur Resmi -->
	<section class="home-section text-center bg-gray" style="padding-top: 70px">
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown">
							<div class="section-heading">
								<h2>Jalur Resmi Pendakian</h2>
								<i class="fa fa-2x fa-angle-down"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 wow bounceInUp">
                    <div class="ibox">
                        <div class="ibox-content product-box" style="min-height: 415px">
                            <div class="product-imitation">
                                [ INFO ]
                            </div>
                            <div class="product-desc" style="text-align: left">
                                <a data-toggle="modal" href="#modal-form" data-target="#tambaksari" class="product-name"> JALUR PENDAKIAN DARI POS TAMBAKSARI</a>
                                <div class="m-t-xs" style="font-size: 95%">
                                	Petugas Pos :
                                </div>
                                <div class="m-t-xs" style="font-size: 95%">
                                	- 0822 45814072 (NUR YUSUF EKO) <br>
                                	- 0822 44737622 (HADI CHOIRUL) 
                                </div>
                                <div class="m-t-xs" style="font-size: 95%">
                                	Frekuensi Radio 165.550
                                </div>
                                <div class="m-t text-righ">

                                    <a data-toggle="modal" href="#modal-form" data-target="#tambaksari" class="btn btn-xs btn-outline btn-primary">Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-3 col-sm-6 wow bounceInUp">
                    <div class="ibox">
                        <div class="ibox-content product-box" style="min-height: 415px">
                            <div class="product-imitation">
                                [ INFO ]
                            </div>
                            <div class="product-desc" style="text-align: left">
                                <a href="#" class="product-name">JALUR PENDAKIAN DARI POS LAWANG</a>
                                <div class="m-t-xs" style="font-size: 95%">
                                	Petugas Pos :
                                </div>
                                <div class="m-t-xs" style="font-size: 95%">
                                	- 0812 30787722 (RUDIONO) <br>
                                	- 0822 31518172(KHAIRUL ANAM) 
                                </div>
                                <div class="m-t-xs" style="font-size: 95%">
                                	Frekuensi Radio 165.550
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-3 col-sm-6 wow bounceInUp">
                    <div class="ibox">
                        <div class="ibox-content product-box" style="min-height: 415px">
                            <div class="product-imitation">
                                [ INFO ]
                            </div>
                            <div class="product-desc" style="text-align: left">
                                <a href="#" class="product-name"> JALUR PENDAKIAN DARI POS TRETES</a>
                                <div class="m-t-xs" style="font-size: 95%">
                                	Petugas Pos :
                                </div>
                                <div class="m-t-xs" style="font-size: 95%">
                                	- 0815 54432204 (M JUNAEDI) <br>
                                	- 0812 34525948 (AGUS BUDI) 
                                </div>
                                <div class="m-t-xs" style="font-size: 95%">
                                	Frekuensi Radio 165.550
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-3 col-sm-6 wow bounceInUp">
                    <div class="ibox">
                        <div class="ibox-content product-box" style="min-height: 415px">
                            <div class="product-imitation">
                                [ INFO ]
                            </div>
                            <div class="product-desc" style="text-align: left">
                                <a href="#" class="product-name"> JALUR PENDAKIAN DARI POS CANGAR</a>
                                <div class="m-t-xs" style="font-size: 95%">
                                	Petugas Pos :
                                </div>
                                <div class="m-t-xs" style="font-size: 95%">
                                	- 0822 34604229 (EKO BUDIONO) <br>
                                	- 0858 55432211 (IWAN H.)
                                </div>
                                <div class="m-t-xs" style="font-size: 95%">
                                	Frekuensi Radio 165.550
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</section>
	<!-- /Section: Jalur Resmi -->

	<!-- Section: Mitra -->
    <section class="home-section text-center bg-gray" style="padding-top: 0px">
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<div class="wow bounceInDown">
							<div class="section-heading">
								<h2>Mitra Pendakian Arjuno Welirang</h2>
								<i class="fa fa-2x fa-angle-down"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container wow bounceInUp" style="margin-top: 25px">
			<div class="row" style="padding: 0 10px">
				<div class="col-lg-10 col-lg-offset-1">
				<div class="slick_demo_2">
                    <div>
                        <div class="ibox-content">
                            <h2>ORARI</h2>
                            <p>
                                <img src="{{ asset('frontend/img/mitra/orari.jpg') }}">
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="ibox-content">
                            <h2>BASARNAS</h2>
                            <p>
                                <img src="{{ asset('frontend/img/mitra/basarnas.png') }}">
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="ibox-content">
                            <h2>BPBD Kota Malang</h2>
                            <p>
                                <img src="{{ asset('frontend/img/mitra/malang.jpg') }}">
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="ibox-content">
                            <h2>BPBD Kota Batu</h2>
                            <p>
                                <img src="{{ asset('frontend/img/mitra/batu.png') }}">
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="ibox-content">
                            <h2>BPBD Kabupaten Mojokerto</h2>
                            <p>
                                <img src="{{ asset('frontend/img/mitra/mojokerto.png') }}">
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="ibox-content">
                            <h2>BPBD Kota Jombang</h2>
                            <p>
                                <img src="{{ asset('frontend/img/mitra/jombang.jpg') }}">
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="ibox-content">
                            <h2>BPBD Kota Pasuruan</h2>
                            <p>
                                <img src="{{ asset('frontend/img/mitra/pasuruan.jpg') }}">
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="ibox-content">
                            <h2>PMI</h2>
                            <p>
                                <img src="{{ asset('frontend/img/mitra/pmi.png') }}">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
			</div>
		</div>
	</section>
	<!-- /Section: Mitra -->
	

	<!-- Section: contact -->
    <section id="contact" class="home-section text-center" style="padding-bottom: 120px">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown">
					<div class="section-heading">
					<h2>Kontak</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
		    <div class="row">
		        <div class="col-lg-8 wow bounceInUp ">
		            <div class="boxed-grey">
		                <form id="contact-form">
		                <div class="row">
		                    <div class="col-md-6">
		                        <div class="form-group">
		                            <label for="name">
		                                Nama</label>
		                            <input type="text" class="form-control" id="name" required="required" />
		                        </div>
		                        <div class="form-group">
		                            <label for="email">
		                                Alamat Email</label>
		                            <div class="input-group">
		                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
		                                </span>
		                                <input type="email" class="form-control" id="email" required="required" /></div>
		                        </div>
		                        <div class="form-group">
		                            <label for="subject">
		                                Subjek</label>
		                            <select id="subject" name="subject" class="form-control" required="required">
		                                <option value="na" selected="">Pilih</option>
		                                <option value="service">Pertanyaan</option>
		                                <option value="suggestions">Keluhan</option>
		                                <option value="product">Saran</option>
		                            </select>
		                        </div>
		                    </div>
		                    <div class="col-md-6">
		                        <div class="form-group">
		                            <label for="name">
		                                Pesan</label>
		                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"></textarea>
		                        </div>
		                    </div>
		                    <div class="col-md-12">
		                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
		                            Kirim Pesan</button>
		                    </div>
		                </div>
		                </form>
		            </div>
		        </div>
				
				<div class="col-lg-4 wow bounceInUp ">
					<div class="widget-contact">
						<h5>Alamat Kantor</h5>
						
						<address>
						  <strong>UPT Tahura Raden Soerjo</strong><br>
						  Jl. Simpang Panji Suroso Kav. 144<br>
						  Malang, Jawa Timur 65125<br>
						  <abbr title="Phone">Telp:</abbr> (0341) – 483254
						</address>

						<address>
						  <strong>Email</strong><br>
						  <a href="mailto:#">amiruzg@gmail.com</a>
						</address>	
						<address>
						  <strong>Sosial Media</strong><br>
		                       	<ul class="company-social">
		                            <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
		                            <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
		                            <li class="social-instagram"><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
		                            <li class="social-youtube"><a href="#" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
		                        </ul>	
						</address>					
					
					</div>	
				</div>
		    </div>	
		</div>
	</section>
	<!-- /Section: contact -->
@endsection

@section('modal')
	<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    	<div class="modal-dialog modal-lg modal-md modal-sm">
	    	<div class="modal-content animated bounceInRight">
	            <div class="ibox product-detail">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="product-images">
                                    <div>
                                        <div class="image-imitation">
                                            <img src="{{ asset('frontend/img/wisata/welirang.jpg') }}" style="height: 300px; width: 514px">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="image-imitation">
                                            [IMAGE 2]
                                        </div>
                                    </div>
                                    <div>
                                        <div class="image-imitation">
                                            [IMAGE 3]
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <h2 class="font-bold m-b-xs">
                                    Pendakian Arjuno Welirang
                                </h2>
                                <hr>
                                <div class="small text-muted">
                                    lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                                    <br/>
                                    <br/>
                                    lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-footer col-xs-12">
                        <span class="pull-right">
                            <i class="fa fa-clock-o"></i> 16.06.2019 10:04 pm
                        </span>
                         <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
	        </div>
	    </div>
	</div>

	<div class="modal inmodal" id="tambaksari" tabindex="-1" role="dialog" aria-hidden="true">
    	<div class="modal-dialog modal-lg modal-md modal-sm">
	    	<div class="modal-content animated bounceInRight" style="height: 595px">
	            <div class="ibox product-detail">
                    <div class="ibox-content" style="max-height: unset; padding-bottom: 10px">
                        <div class="row">
                            <div class="col-md-4 col-xs-12 tengah">
                            	<img src="{{ asset('frontend/img/tambaksari.jpg') }}" class="zoom" data-magnify-src="{{ asset('frontend/img/tambaksari.jpg') }}">
								<!-- <img class="tengah" src="{{ asset('frontend/img/tambaksari.jpeg') }}" style="height: 500px; width: auto">      -->   
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <h2 class="font-bold m-b-xs">
                                    JALUR PENDAKIAN DARI POS TAMBAKSARI
                                </h2>
                                <hr>
                                <div class="small text-muted">
                                    lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                                    <br/>
                                    <br/>
                                    lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-footer col-xs-12">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
	        </div>
	    </div>
	</div>
@endsection