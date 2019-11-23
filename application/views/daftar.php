<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html>
	<head>
		<title>Rekam Medis</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>image/logo.png" />
		<link href="<?php echo base_url(); ?>mui/css/mui.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>mui/extra/mui-colors.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>other/muiexstyle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>other/rekammedis.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo base_url(); ?>mui/js/mui.js"></script>
		<script src="<?php echo base_url(); ?>other/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url(); ?>other/muiexscript.js"></script>
		<script src="<?php echo base_url(); ?>other/rekammedis.js"></script>
	</head>
	<body>
		<p id="baseurl" style="display:hidden;"><?php echo base_url(); ?></p>
		<div id="sidedrawer" class="mui--no-user-select">
			<div id="sidedrawer-brand" class="mui--appbar-line-height mui--bg-color-teal-500">
				<span class="mui--text-title">
					<div align="center">
						<a href="<?php echo base_url(); ?>">
							<img src="<?php echo base_url(); ?>image/logo.png" align="center" height="66px">
						</a>
					</div>
				</span>
			</div>
			<div class="mui-divider">
			</div>
			<ul>
				<a href="#">
					<li>
						<strong>Menu</strong>
					</li>
				</a>
				<a href="#">
					<li onclick="formdosis()">
						<strong>Hitung Dosis</strong>
					</li>
				</a>
				<a href="<?php echo base_url(); ?>user/logout">
					<li>
						<strong>Keluar</strong>
					</li>
				</a>
			</ul>
		</div>
		<header id="header">
		  <div class="mui-appbar">
			<div class="mui-container-fluid mui--bg-color-teal-500 mui--appbar-line-height">
			  <a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer">☰</a>
			  <a class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer">☰</a>
			</div>
		  </div>
		</header>
		<div id="content-wrapper">
		  <div class="mui--appbar-height"></div>
		  <div class="mui-container">
			<form method="POST" action="/Daftar/simpan" class="mui-form">
				<div class="mui-row">
					<div class="mui-col-xs-12 mui-col-md-6">
					  <legend>Profil Rumah Sakit</legend>
					  <div class="mui-textfield">
						<input name="nama-institusi" type="text" placeholder="Nama Institusi" required>
					  </div>
					  <div class="mui-textfield">
						<input name="nama-sub-institusi" type="text" placeholder="Nama Sub Institusi" required>
					  </div>
					  <div class="mui-textfield">
						<input name="kode-rumah-sakit" type="text" placeholder="Kode Rumah Sakit" required>
					  </div>
					  <div class="mui-textfield">
						<input name="jenis-institusi" type="text" placeholder="Jenis Institusi" required>
					  </div>
					</div>
					<div class="mui-col-xs-12 mui-col-md-6">
					  <legend>Alamat Rumah Sakit</legend>
					  <div class="mui-textfield">
						<textarea placeholder="Alamat" name="alamat"></textarea>
					  </div>
					  <div class="mui-textfield">
						<input name="kota-kabupaten" type="text" placeholder="Kota/Kabupaten" required>
					  </div>
					  <div class="mui-textfield">
						<input name="provinsi" type="text" placeholder="Provinsi" required>
					  </div>
					  <div class="mui-textfield">
						<input name="kode-pos" type="number" placeholder="Kode Pos" required>
					  </div>
					</div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-12 mui-col-md-6">
					  <legend>Profil Radiolog</legend>
					  <div class="mui-textfield">
						<input name="gelar" type="text" placeholder="Gelar" required>
					  </div>
					  <div class="mui-textfield">
						<input name="gelar-lainnya" type="text" placeholder="Sebutkan jika 'lainnya'">
					  </div>
					  <div class="mui-textfield">
						<input name="nama-awal" type="text" placeholder="Nama Awal" required>
					  </div>
					  <div class="mui-textfield">
						<input name="nama-akhir" type="text" placeholder="Nama Akhir">
					  </div>
					</div>
					<div class="mui-col-xs-12 mui-col-md-6">
					  <legend>Kontak Radiolog</legend>
					  <div class="mui-textfield">
						<input name="telpon-kantor" type="number" placeholder="Telp. Kantor" required>
					  </div>
					  <div class="mui-textfield">
						<input name="no-hp" type="number" placeholder="No. HP" required>
					  </div>
					  <div class="mui-textfield">
						<input name="fax" type="text" placeholder="Fax" required>
					  </div>
					  <div class="mui-textfield">
						<input name="email" type="text" placeholder="Email" required>
					  </div>
					</div>
				</div>
				<div class="mui-row">
					<div class="mui-col-xs-12 mui-col-md-6">
					  <legend>Profil Akun User</legend>
					  <div class="mui-textfield">
						<input name="gelar-akun" type="text" placeholder="Gelar" required>
					  </div>
					  <div class="mui-textfield">
						<input name="gelar-lainnya-akun" type="text" placeholder="Sebutkan jika 'lainnya'">
					  </div>
					  <div class="mui-textfield">
						<input name="nama-awal-akun" type="text" placeholder="Nama Awal" required>
					  </div>
					  <div class="mui-textfield">
						<input name="nama-akhir-akun" type="text" placeholder="Nama Akhir">
					  </div>
					  <div class="mui-textfield">
						<input name="jabatan-akun" type="text" placeholder="Jabatan">
					  </div>
					</div>
					<div class="mui-col-xs-12 mui-col-md-6">
					  <legend>Kontak Akun User</legend>
					  <div class="mui-textfield">
						<input name="telpon-kantor-akun" type="number" placeholder="Telp. Kantor" required>
					  </div>
					  <div class="mui-textfield">
						<input name="no-hp-akun" type="number" placeholder="No. HP" required>
					  </div>
					  <div class="mui-textfield">
						<input name="fax-akun" type="text" placeholder="Fax" required>
					  </div>
					  <div class="mui-textfield">
						<input name="email-akun" type="text" placeholder="Email" required>
					  </div>
					</div>
				</div>
				<div class="mui-row" align="center">
					<button class="mui-btn mui-btn--raised" type="submit">Submit</button>
				</div>
			</form>
		  </div>
		</div>
		<footer id="footer" class="mui--bg-color-teal-500">
		  <div class="mui-container">
			<br>
			<div align="right">
				<img src="<?php echo base_url(); ?>image/logo.png" align="center" height="64px" class="mui--bg-color-teal-500">
			</div>
		  </div>
		</footer>
		<script>
			sessionStorage.setItem("key",document.getElementById("key").innerHTML);
			sessionStorage.setItem("baseurl",document.getElementById("baseurl").innerHTML);
			document.getElementById("key").innerHTML = "";
			document.getElementById("baseurl").innerHTML = "";
			document.addEventListener('readystatechange', event => {
				if(event.target.readyState === "complete"){
					loadDoc("<?php echo base_url(); ?>UserAPI/get",loadprofile,sessionStorage.getItem("key"));
				}
			});
		</script>
	</body>
</html>
