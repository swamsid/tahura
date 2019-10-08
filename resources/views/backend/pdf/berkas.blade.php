<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:2px 3px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:0;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-xeyn{font-weight:bold;font-size:12px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-2c25{font-weight:bold;font-size:12px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-puex{font-size:12px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:center}
.tg .tg-lj5e{font-size:12px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-rv8m{font-size:12px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:center}
.tg .tg-vlyc{font-size:12px;font-family:"Times New Roman", Times, serif !important;;border-color:inherit;text-align:left;vertical-align:top}
.list tr td{padding: 0px !important;}
</style>
<table class="tg" style="undefined;table-layout: fixed; width: 720px">
<colgroup>
<col style="width: 150px">
<col style="width: 210px">
<col style="width: 210px">
<col style="width: 150px">
</colgroup>
  <tr>
    <th class="tg-lj5e" rowspan="5"><img style="height: 100px" src="{{ asset('public/backend/img/LogoJawaTimur.png') }}"></th>
    <th class="tg-puex" colspan="2" style="font-weight: bold">PEMERINTAH PROVINSI JAWA TIMUR</th>
    <th class="tg-lj5e" rowspan="5">
      <img src="data:image/png;base64, {{ base64_encode($qrcode) }}" width="100">
    </th>
  </tr>
  <tr>
    <td class="tg-puex" colspan="2" style="font-weight: bold">DINAS KEHUTANAN</td>
  </tr>
  <tr>
    <td class="tg-puex" colspan="2" style="font-weight: bold">UPT TAMAN HUTAN RAYA (TAHURA) RADEN SOERJO</td>
  </tr>
  <tr>
    <td class="tg-rv8m" colspan="2">Alamat : JL. Simpang Panji Suroso Kav. 144 Telp. / Fax. 0341 – 483254</td>
  </tr>
  <tr>
    <td class="tg-puex" colspan="2" style="font-weight: bold">MALANG</td>
  </tr>
  <tr>
    <td class="tg-lj5e" colspan="4"><hr></td>
  </tr>
  <tr>
    <td style="padding: 10px 0" class="tg-xeyn" colspan="4">SURAT IJIN KHUSUS PENDAKIAN GUNUNG DI KAWASAN TAHURA R. SOERJO</td>
  </tr>
  <tr>
    <td class="tg-lj5e" colspan="4">Nomor Registrasi : {{ $data->pd_nomor }} Tanggal {{ date('d/m/Y', strtotime($data->pd_tanggal_registrasi)) }}</td>
  </tr>
  <tr>
    <td style="padding-bottom: 10px" class="tg-lj5e" colspan="4">Nomor Karcis : .......................s/d...........................</td>
  </tr>
  <tr>
    <td style="width: 10px" class="tg-vlyc" colspan="4">Berdasarkan : 
    	<span style="padding-left: 25px"> 1. Pasal 31 Undang-Undang Nomor 5 Tahun 1990 tentang Konservasi Sumber Daya Alam Hayati dan Ekosistemnya;</span>
    </td>
  </tr>
  <tr>
    <td style="padding-left: 100px; padding-bottom: 5px" class="tg-vlyc" colspan="4">2. Peraturan Daerah Provinsi Jawa Timur Nomor 2 Tahun 2013 tentang Pengelolaan Taman Hutan Raya R. SOERJO.</td>
  </tr>
  <tr>
    <td style="padding-bottom: 5px" class="tg-vlyc" colspan="4">Memberikan ijin kepada :</td>
  </tr>
  <tr>
    <td colspan="4">
    	<table class="list">
    		<tr>
    			<td class="tg-2c25" width="70px">Nama Lengkap (Ketua) </td>
          <td width="10px">:</td>
    			<td class="tg-vlyc" style="width: 300px">{{ $data->pd_nama_ketua }}</td>
        </tr>
        <tr>
			    <td class="tg-2c25">Nomor Identitas </td>
          <td>:</td>
			    <td class="tg-vlyc">{{ $data->pd_no_ktp }}</td>
    		</tr>
    		<tr>
			    <td class="tg-2c25">Tempat Tanggal Lahir </td>
          <td>:</td>
			    <td class="tg-vlyc">{{ $data->pd_tempat_lahir }}, {{ date('d/m/Y', strtotime($data->pd_tgl_lahir)) }}</td>
        </tr>
        <tr>
			    <td class="tg-2c25">Kebangsaan </td>
          <td>:</td>
			    <td class="tg-vlyc" style="padding-right: 20px;">{{ $data->pd_kewarganegaraan }}</td>
			  </tr>
			  <tr>
			    <td class="tg-2c25">Alamat Lengkap </td>
          <td>:</td>
			    <td class="tg-vlyc">{{ $data->pd_alamat }}, {{ $data->kelurahan }}, {{ $data->kecamatan }}, {{ $data->kabupaten }}, {{ $data->provinsi }} </td>
        </tr>
        <tr>
			    <td class="tg-2c25">Personel (beserta ketua)  </td>
          <td>:</td>
			    <td class="tg-vlyc">{{ count($data->anggota) + 1 }} Orang</td>
			  </tr>
    	</table>
	</td>
  </tr>
  
  <?php
    $diff   = abs(strtotime($data->pd_tgl_naik) - strtotime($data->pd_tgl_turun));
    $years  = floor($diff / (365*60*60*24)); 
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
    $days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
  ?>
  
  <tr>
    <td style="padding: 5px 3px" class="tg-vlyc" colspan="4">Memasuki Kawasan Tahura R. SOERJO untuk melakukan pendakian Gunung Arjuna-Welirang mulai tanggal {{ date('d/m/Y', strtotime($data->pd_tgl_naik)) }} s/d {{ date('d/m/Y', strtotime($data->pd_tgl_turun)) }} selama <?php echo $days; ?>  hari, dengan ketentuan sebagai berikut :</td>
  </tr>
  
  <tr>
    <td colspan="4"> 
    	<table class="list">
    		<tr>
    			<td class="tg-vlyc">1.</td>
    			<td class="tg-vlyc">Pendaki usia kurang dari 17 tahun harus menyerahkan surat ijin dari orangtua/wali dilampiri fotocopy KTP orangtua/wali;</td>
    		</tr>
    		<tr>
    			<td class="tg-vlyc">2.</td>
    			<td class="tg-vlyc">Pendaki (Ketua dan Anggota) wajib menyerahkan kartu identitas / fotocopy identitas (KTP/SIM/KTM/Kartu Pelajar) yang masih berlaku kepada Petugas di Pos Ijin Pendakian;</td>
    		</tr>
    		<tr>
    			<td class="tg-vlyc">3.</td>
    			<td class="tg-vlyc">Pendaki wajib mengisi daftar/list perlengkapan yang dibawa sebagaimana blanko isian terlampir;</td>
    		</tr>
    		<tr>
    			<td class="tg-vlyc">4.</td>
    			<td class="tg-vlyc">Mematuhi dan membayar Retribusi Masuk Kawasan Tahura R. SOERJO dan Asuransi sejumlah personil sesuai peraturan perundangundangan yang berlaku dan pastikan Bukti Retribusi/Karcis adalah Karcis Resmi yang dikeluarkan oleh UPT Tahura R. SOERJO dan Karcis Asuransi oleh PT. JASA RAHARJA sesuai dengan jumlah personil serta menyimpan bukti retribusi tersebut;</td>
    		</tr>
    		<tr>
    			<td class="tg-vlyc">5.</td>
    			<td class="tg-vlyc">Pada saat melakukan pendakian agar berjalan secara berkelompok, tidak memisahkan diri dari kelompok/ rombongan; berjalan sesuai jalur yang telah ditetapkan dan dilarang untuk membuat/memotong jalur;</td>
    		</tr>
    		<tr>
    			<td class="tg-vlyc">6.</td>
    			<td class="tg-vlyc">Dilarang melakukan tindakan yang mengakibatkan kerusakan flora/fauna, melakukan coretan-coretan/ vandalisme pada benda-benda, pohon, bebatuan dan atau bangunan di dalam kawasan;</td>
    		</tr>
    		<tr>
    			<td class="tg-vlyc">7.</td>
    			<td class="tg-vlyc">Dilarang memaksakan diri untuk melanjutkan perjalanan jika situasi dan kondisi tidak memungkinkan (kesehatan, cuaca, keamanan dll);</td>
    		</tr>
    		<tr>
    			<td class="tg-vlyc">8.</td>
    			<td class="tg-vlyc">Dilarang melanggar norma-norma susila, nilai-nilai adat-istiadat masyarakat setempat;</td>
    		</tr>
    		<tr>
    			<td class="tg-vlyc">9.</td>
    			<td class="tg-vlyc">Dilarang membawa, menggunakan minuman keras dan obat-obatan terlarang (narkoba);</td>
    		</tr>
    		<tr>
    			<td class="tg-vlyc">10.</td>
    			<td class="tg-vlyc">Dilarang membuang sampah sembarangan dan bawalah sampah anda turun kembali (bungkus/kaleng bekas makanan, botol/kaleng bekas minuman dan sejenisnya) serta wajib menjaga kebersihan dan keamanan kawasan;</td>
    		</tr>
    		<tr>
    			<td class="tg-vlyc">11.</td>
    			<td class="tg-vlyc">Menjaga keselamatan kelompok dan sesama pengunjung/pendaki;</td>
    		</tr>
    		<tr>
    			<td class="tg-vlyc">12.</td>
    			<td class="tg-vlyc">Turut berpartisipasi dalam upaya Pencegahan, Pengendalian dan Penanggulangan Bencana Alam, dan memastikan bahwa tempat yang ditinggalkan tidak terdapat api/bara api;</td>
    		</tr>
    		<tr>
    			<td class="tg-vlyc">13.</td>
    			<td class="tg-vlyc">Segala bentuk pelanggaran yang menyalahi peraturan akan dikenakan Sanksi sesuai peraturan perundang-undangan yang berlaku.</td>
    		</tr>
    	</table>
    </td>
  </tr>
  
  <tr>
    <td style="padding: 5px 0 5px 3px" class="tg-vlyc" colspan="4">Demikian Surat Ijin ini diberikan untuk dilaksanakan dan dipatuhi dengan penuh tanggung jawab</td>
  </tr>
  <tr>
    <td style="padding-bottom: 40px" class="tg-lj5e" colspan="2"><span style="font-weight:bold">Penerima/Pemegang Surat Ijin</span></td>
    <td class="tg-lj5e" colspan="2"><span style="font-weight:bold">Petugas Pos Pendakian .................</span></td>
  </tr>
  <tr>
    <td class="tg-lj5e" colspan="2"></td>
    <td class="tg-lj5e" colspan="2"></td>
  </tr>
  <tr>
    <td class="tg-lj5e" colspan="2">..........................</td>
    <td class="tg-lj5e" colspan="2">.............................</td>
  </tr>
  <tr>
    <td class="tg-lj5e" colspan="2"></td>
    <td class="tg-lj5e" colspan="2">NIP. </td>
  </tr>
  <tr>
    <td class="tg-xeyn" colspan="4">Mengetahui</td>
  </tr>
  <tr>
    <td style="padding-bottom: 40px" class="tg-xeyn" colspan="4">KEPALA RESORT .................</td>
  </tr>
  <tr>
    <td class="tg-lj5e" colspan="4"></td>
  </tr>
  <tr>
    <td class="tg-lj5e" colspan="4">...............................................</td>
  </tr>
  <tr>
    <td class="tg-lj5e" colspan="4">NIP.</td>
  </tr>
</table>

<table class="tg" style="margin-top: 40px;">
	<tr>
		<td class="tg-2c25">Lampiran</td>
		<td class="tg-2c25">:</td>
		<td class="tg-2c25" style="width: 550px">Surat Ijin Khusus Pendakian Gunung Di Kawasan Tahura R. SOERJO</td>
		<td rowspan="4" style="vertical-align: top"><!-- barcode --></td>
	</tr>
	<tr>
		<td class="tg-2c25">No. Registrasi</td>
		<td class="tg-2c25">:</td>
		<td class="tg-2c25">{{ $data->pd_nomor }}</td>
	</tr>
</table>

<h5 style="margin: 10px 0;">I. DAFTAR NAMA PENDAKI</h5>
<style type="text/css">
	.ta  {border-collapse:collapse;border-spacing:0;}
	.ta td{font-family:Arial, sans-serif;font-size:12px;padding:5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
	.ta th{font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding: 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
	.ta .tg-hgcj{font-weight:bold;text-align:center}
	.ta .tg-0lax{text-align:left;vertical-align:top}
</style>
<table class="ta">
  <tr>
    <th class="tg-hgcj" style="width: 20px">No</th>
    <th class="tg-hgcj" style="width: 200px">Nama</th>
    <th class="tg-hgcj" style="width: 100px">No. Telepon</th>
    <th class="tg-hgcj" style="width: 130px">Kewarganegaraan</th>
    <th class="tg-hgcj" style="width: 50px">L/P</th>
    <th class="tg-hgcj" style="width: 130px">Keterangan Kesehatan</th>
  </tr>
  <tr>
    <td class="tg-0lax">1.</td>
    <td class="tg-0lax">{{ $data->pd_nama_ketua }}</td>
    <td class="tg-0lax">{{ $data->pd_no_hp }}</td>
    <td class="tg-0lax">{{ ($data->pd_kewarganegaraan == 'WNI') ? 'Warga Negara Indonesia' : 'Warga Negara Asing' }}</td>
    <td class="tg-0lax">{{ ($data->pd_jenis_kelamin == 'L') ? 'Laki-laki' : 'Perempuan' }}</td>
    <td class="tg-0lax"></td>
  </tr>

  <?php $no = 2; ?>
  @foreach($data->anggota as $key => $anggota)
  	<tr>
	    <td class="tg-0lax">{{ $no }}. </td>
	    <td class="tg-0lax">{{ $anggota->ap_nama }}</td>
	    <td class="tg-0lax">{{ $anggota->ap_no_ktp }}</td>
      <td class="tg-0lax">{{ ($anggota->ap_kewarganegaraan == 'WNI') ? 'Warga Negara Indonesia' : 'Warga Negara Asing' }}</td>
	    <td class="tg-0lax">{{ ($anggota->ap_kelamin == 'L') ? 'Laki-laki' : 'Perempuan' }}</td>
	    <td class="tg-0lax"></td>
  	</tr>
  	<?php $no++; ?>
  @endforeach
</table>

<h5 style="margin-bottom: 5px">II. NAMA, ALAMAT DAN NOMOR TELEPON YANG DAPAT DIHUBUNGI DALAM KEADAAN DARURAT</h5>
<table class="ta">
  <tr>
    <th class="tg-hgcj" style="width: 20px">No</th>
    <th class="tg-hgcj" style="width: 280px">Nama</th>
    <th class="tg-hgcj" style="width: 80px">No. Telepon</th>
    <th class="tg-hgcj" style="width: 190px">Alamat</th>
    <th class="tg-hgcj" style="width: 80px">Hubungan</th>
  </tr>
  @foreach($data->kontak as $key => $kontak)
  	<tr>
	    <td class="tg-0lax">{{ $key+1 }}. </td>
	    <td class="tg-0lax">{{ $kontak->kd_nama }}</td>
	    <td class="tg-0lax">{{ $kontak->kd_no_telp }}</td>
	    <td class="tg-0lax">{{ $kontak->kd_email }}</td>
	    <td class="tg-0lax">{{ $kontak->kd_hubungan }}</td>
	</tr>
  @endforeach
</table>

<h5 style="margin-bottom: 5px">III. DAFTAR PERLENGKAPAN DAN LOGISTIK YANG DIBAWA</h5>
<table width="100%">
	<tr>
		<td>
			<table class="ta">
				<tr>
				    <th class="tg-hgcj" style="width: 200px">Peralatan Standar</th>
				    <th class="tg-hgcj" style="width: 100px">Jumlah</th>
				</tr>
				<tr>
					<td class="tg-0lax">Tenda</td>
					<td class="tg-0lax" style="text-align: center;">{{ $data->peralatan->pr_tenda }}</td>
				</tr>
				<tr>
				    <td class="tg-0lax">Sleeping Bag / Kantong Tidur</td>
				    <td class="tg-0lax" style="text-align: center;">{{ $data->peralatan->pr_sleeping_bag }}</td>
				</tr>
				<tr>
				    <td class="tg-0lax">Peralatan Masak</td>
				    <td class="tg-0lax" style="text-align: center;">{{ $data->peralatan->pr_peralatan_masak }}</td>
				</tr>
				<tr>
				    <td class="tg-0lax">Bahan Bakar</td>
				    <td class="tg-0lax" style="text-align: center;">{{ $data->peralatan->pr_bahan_bakar }}</td>
				</tr>
				<tr>
				    <td class="tg-0lax">Ponco / Jas Hujan</td>
				    <td class="tg-0lax" style="text-align: center;">{{ $data->peralatan->pr_ponco }}</td>
				</tr>
				<tr>
				    <td class="tg-0lax">Senter / Alat Penerangan</td>
				    <td class="tg-0lax" style="text-align: center;">{{ $data->peralatan->pr_senter }}</td>
				</tr>
				<tr>
				    <td class="tg-0lax">Obat - Obatan dan P3K</td>
				    <td class="tg-0lax" style="text-align: center;">{{ $data->peralatan->pr_obat }}</td>
				</tr>
				<tr>
				    <td class="tg-0lax">Matras / Alas Tidur</td>
				    <td class="tg-0lax" style="text-align: center;">{{ $data->peralatan->pr_matras }}</td>
				</tr>
				<tr>
				    <td class="tg-0lax">Kantong Sampah</td>
				    <td class="tg-0lax" style="text-align: center;">{{ $data->peralatan->pr_kantong_sampah }}</td>
				</tr>
				<tr>
				    <td class="tg-0lax">Jaket</td>
				    <td class="tg-0lax" style="text-align: center;">{{ $data->peralatan->pr_jaket }}</td>
				</tr>		
			</table>
		</td>

		<td style="vertical-align: top;">
			<table class="ta">
				<tr>
				    <th class="tg-hgcj" style="width: 200px">Makanan</th>
				    <th class="tg-hgcj" style="width: 100px">Jumlah</th>
				</tr>
					
				@foreach($data->logistik as $key => $logistik)
				  	<tr>
						<td class="tg-0lax">{{ $logistik->lg_nama }}</td>
						<td class="tg-0lax">{{ $logistik->lg_jumlah }}</td>
					</tr>
				@endforeach
			</table>
		</td>
	</tr>
</table>

<style type="text/css">
.tb  {border-collapse:collapse;border-spacing:0;}
.tb td{font-family:Arial, sans-serif;font-size:12px;padding:0;border-style:solid;border-width:0;overflow:hidden;word-break:normal;border-color:black;}
.tb th{font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:0;border-style:solid;border-width:0;overflow:hidden;word-break:normal;border-color:black;}
.tb .tg-s6z2{text-align:center}
.tb .tg-baqh{text-align:center;vertical-align:top}
.tb .tg-hgcj{font-weight:bold;text-align:center}
</style>
<table class="tb" style="undefined;table-layout: fixed; width: 720px; margin-top: 40px ">
<colgroup>
<col style="width: 360px">
<col style="width: 360px">
</colgroup>
  <tr>
    <th class="tg-hgcj">Telah dicek oleh :</th>
    <th class="tg-hgcj">Tanggal {{ date('d/m/Y', strtotime($data->pd_tgl_naik))  }}</th>
  </tr>
  <tr>
    <td class="tg-baqh" style="padding-bottom: 60px">Petugas Pos Pendakian</td>
    <td class="tg-baqh">Penerima/Pemegang Surat Izin</td>
  </tr>
  <tr>
    <td class="tg-s6z2"></td>
    <td class="tg-s6z2"></td>
  </tr>
  <tr>
    <td class="tg-baqh">..............</td>
    <td class="tg-baqh">...............</td>
  </tr>
</table>
			
<table class="list tg" style="margin-top: 50px">
	<tr>
		<td colspan="2" class="tg-vlyc">Catatan:</td>
	</tr>
	<tr>
		<td class="tg-vlyc">1. </td>
		<td class="tg-vlyc">Pendaki usia kurang dari 17 tahun harus menyerahkan surat ijin dari orangtua/wali</td>
	</tr>
	<tr>
		<td class="tg-vlyc">2. </td>
		<td class="tg-vlyc">Pendaki wajib melaporkan diri saat naik dan ketika turun di pos pendakian resmi Tahura Raden Soerjo</td>
	</tr>
	<tr>
		<td class="tg-vlyc">3. </td>
		<td class="tg-vlyc">Membawa dan menyerahkan kembali sampah yg di hasilkan ke pos penjagaan</td>
	</tr>
	<tr>
		<td class="tg-vlyc">4. </td>
		<td class="tg-vlyc">Wajib membawa tanda pengenal asli</td>
	</tr>
	<tr>
		<td class="tg-vlyc">5. </td>
		<td class="tg-vlyc">Wajib membawa surat keterangan kesehatan</td>
	</tr>
</table>