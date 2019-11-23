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
				<a href="/Daftar">
					<li>
						<strong>Daftar</strong>
					</li>
				</a>
				<a href="/Daftar/ctscan">
					<li>
						<strong>CT Scan</strong>
					</li>
				</a>
				<a href="/Daftar/irfluoroskopi">
					<li>
						<strong>IR Fluoroskopi</strong>
					</li>
				</a>
				<a href="/Daftar/radiografiumum">
					<li>
						<strong>Radiografi Umum</strong>
					</li>
				</a>
				<a href="/Daftar/kedokterannuklirdiagnostik">
					<li>
						<strong>Kedokteran Nuklir Diagnostik</strong>
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
			<form method="POST" action="/Daftar/ctscansimpan" class="mui-form">
				<div class="mui-row">
					<div class="mui-col-xs-12 mui-col-md-6">
					  <legend>Head Info</legend>
					  <div class="mui-textfield">
						<input name="merk-sinar-x" type="text" placeholder="Merk Sinar X" required>
					  </div>
					  <div class="mui-textfield">
						<input name="tanngal-uji-dosimetri" type="date" placeholder="Tanggal Uji Dosimetri" required>
					  </div>
					  <div class="mui-textfield">
						<input name="kelompok-umur" type="text" placeholder="Kelompok Umur" required>
					  </div>
					  <div class="mui-textfield">
						<input name="tanggal-mulai" type="text" placeholder="Tanggal Mulai" required>
					  </div>
					  <div class="mui-textfield">
						<input name="lokasi-sinar-x" type="text" placeholder="Nilai Simpangan Uji Dosimetri" required>
					  </div>
					  <div class="mui-textfield">
						<input name="nilai-simpangan-uji-dosimetri" type="text" placeholder="Nilai Simpangan Uji Dosimetri" required>
					  </div>
					  <div class="mui-textfield">
						<input name="jenis-pemeriksaan" type="text" placeholder="Jenis Pemeriksaan" required>
					  </div>
					  <div class="mui-textfield">
						<input name="periode-data" type="text" placeholder="Periode Data" required>
					  </div>
					</div>
					<div class="mui-col-xs-12 mui-col-md-6">
					  <legend>Setting</legend>
					  <div class="mui-textfield">
						<input name="kv" type="text" placeholder="Kv Mode Fluoroskopi" required>
					  </div>
					  <div class="mui-textfield">
						<input name="ma" type="text" placeholder="ma Mode Fluoroskopi" required>
					  </div>
					  <div class="mui-textfield">
						<input name="fov" type="text" placeholder="FOV(cm)" required>
					  </div>
					  <div class="mui-textfield">
						<input name="kv" type="text" placeholder="Kv Mode Sine" required>
					  </div>
					  <div class="mui-textfield">
						<input name="ma" type="text" placeholder="ma/mAs Mode Sine" required>
					  </div>
					  <div class="mui-textfield">
						<input name="ms" type="text" placeholder="ms" required>
					  </div>
					  <div class="mui-textfield">
						<textarea name="keterangan" placeholder="Keterangan"></textarea>
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
