<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo base_url(); ?>mui/css/mui.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>mui/extra/mui-colors.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>other/muiexstyle.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo base_url(); ?>mui/js/mui.js"></script>
		<script src="<?php echo base_url(); ?>other/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url(); ?>other/muiexscript.js"></script>
		<script src="<?php echo base_url(); ?>other/rekammedis.js"></script>
		<script>
			function hitungdosis(){
				var teg = document.getElementById("tegangan").value
				var mAs = document.getElementById("mAs").value
				var bsf = document.getElementById("BSF").value
				var dap = document.getElementById("DAP").value
				
				document.getElementById("INAK").value = Number(teg) + Number(mAs);
				document.getElementById("Outr").value = Number(mAs) + Number(bsf);
				document.getElementById("ESAK").value = Number(bsf) + Number(dap);
			}
		</script>
	</head>
	<body>
		<div id="sidedrawer" class="mui--no-user-select">
			<div id="sidedrawer-brand" class="mui--appbar-line-height">
				<span class="mui--text-title">
					<img src="<?php echo base_url(); ?>image/logo.png" align="center" height="80px">
				</span>
			</div>
			<div class="mui-divider">
			</div>
			<ul>
				<a href="#">
					<li>
						<strong>Profil</strong>
					</li>
				</a>
				<a href="#">
					<li onclick="formdosis()">
						<strong>Hitung Dosis</strong>
					</li>
				</a>
				<a href="#">
					<li>
						<strong>Pengaturan</strong>
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
		  <div class="mui-appbar mui--appbar-line-height">
			<div class="mui-container-fluid mui--bg-color-teal-600">
			  <a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer">☰</a>
			  <a class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer">☰</a>
			  <span class="mui--text-title mui--visible-xs-inline-block mui--visible-sm-inline-block">Rekam Medis</span>
			</div>
		  </div>
		</header>
		<div id="content-wrapper">
		  <div class="mui--appbar-height"></div>
		  <div class="mui-container-fluid mui--bg-color-white">
			<br>
			<h1>Rekam Medis</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sollicitudin volutpat molestie. Nullam id tempor nulla. Aenean sit amet urna et elit pharetra consequat. Aliquam fringilla tortor vitae lectus tempor, tempor bibendum nunc elementum. Etiam ultrices tristique diam, vitae sodales metus bibendum id. Suspendisse blandit ligula eu fringilla pretium. Mauris dictum gravida tortor eu lacinia. Donec purus purus, ornare sit amet consectetur sed, dictum sit amet ex. Vivamus sit amet imperdiet tellus. Quisque ultrices risus a massa laoreet, vitae tempus sem congue. Maecenas nec eros ut lectus vehicula rutrum. Donec consequat tincidunt arcu non faucibus. Duis elementum, ante venenatis lacinia cursus, turpis massa congue magna, sed dapibus felis nibh sed tellus. Nam consectetur non nibh vitae sodales. Pellentesque malesuada dolor nec mi volutpat, eget vehicula eros ultrices.</p>
			<p>Aenean vehicula tortor a tellus porttitor, id elementum est tincidunt. Etiam varius odio tortor. Praesent vel pulvinar sapien. Praesent ac sodales sem. Phasellus id ultrices massa. Sed id erat sit amet magna accumsan vulputate eu at quam. Etiam feugiat semper imperdiet. Sed a sem vitae massa condimentum vestibulum. In vehicula, quam vel aliquet aliquam, enim elit placerat libero, at pretium nisi lorem in ex. Vestibulum lorem augue, semper a efficitur in, dictum vitae libero. Donec velit est, sollicitudin a volutpat quis, iaculis sit amet metus. Nulla at ante nec dolor euismod mattis cursus eu nisl.</p>
			<p>Quisque interdum facilisis consectetur. Nam eu purus purus. Curabitur in ligula quam. Nam euismod ligula eu tellus pellentesque laoreet. Aliquam erat volutpat. Curabitur eu bibendum velit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc efficitur lorem sit amet quam porta pharetra. Cras ultricies pellentesque eros sit amet semper.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sollicitudin volutpat molestie. Nullam id tempor nulla. Aenean sit amet urna et elit pharetra consequat. Aliquam fringilla tortor vitae lectus tempor, tempor bibendum nunc elementum. Etiam ultrices tristique diam, vitae sodales metus bibendum id. Suspendisse blandit ligula eu fringilla pretium. Mauris dictum gravida tortor eu lacinia. Donec purus purus, ornare sit amet consectetur sed, dictum sit amet ex. Vivamus sit amet imperdiet tellus. Quisque ultrices risus a massa laoreet, vitae tempus sem congue. Maecenas nec eros ut lectus vehicula rutrum. Donec consequat tincidunt arcu non faucibus. Duis elementum, ante venenatis lacinia cursus, turpis massa congue magna, sed dapibus felis nibh sed tellus. Nam consectetur non nibh vitae sodales. Pellentesque malesuada dolor nec mi volutpat, eget vehicula eros ultrices.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sollicitudin volutpat molestie. Nullam id tempor nulla. Aenean sit amet urna et elit pharetra consequat. Aliquam fringilla tortor vitae lectus tempor, tempor bibendum nunc elementum. Etiam ultrices tristique diam, vitae sodales metus bibendum id. Suspendisse blandit ligula eu fringilla pretium. Mauris dictum gravida tortor eu lacinia. Donec purus purus, ornare sit amet consectetur sed, dictum sit amet ex. Vivamus sit amet imperdiet tellus. Quisque ultrices risus a massa laoreet, vitae tempus sem congue. Maecenas nec eros ut lectus vehicula rutrum. Donec consequat tincidunt arcu non faucibus. Duis elementum, ante venenatis lacinia cursus, turpis massa congue magna, sed dapibus felis nibh sed tellus. Nam consectetur non nibh vitae sodales. Pellentesque malesuada dolor nec mi volutpat, eget vehicula eros ultrices.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sollicitudin volutpat molestie. Nullam id tempor nulla. Aenean sit amet urna et elit pharetra consequat. Aliquam fringilla tortor vitae lectus tempor, tempor bibendum nunc elementum. Etiam ultrices tristique diam, vitae sodales metus bibendum id. Suspendisse blandit ligula eu fringilla pretium. Mauris dictum gravida tortor eu lacinia. Donec purus purus, ornare sit amet consectetur sed, dictum sit amet ex. Vivamus sit amet imperdiet tellus. Quisque ultrices risus a massa laoreet, vitae tempus sem congue. Maecenas nec eros ut lectus vehicula rutrum. Donec consequat tincidunt arcu non faucibus. Duis elementum, ante venenatis lacinia cursus, turpis massa congue magna, sed dapibus felis nibh sed tellus. Nam consectetur non nibh vitae sodales. Pellentesque malesuada dolor nec mi volutpat, eget vehicula eros ultrices.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sollicitudin volutpat molestie. Nullam id tempor nulla. Aenean sit amet urna et elit pharetra consequat. Aliquam fringilla tortor vitae lectus tempor, tempor bibendum nunc elementum. Etiam ultrices tristique diam, vitae sodales metus bibendum id. Suspendisse blandit ligula eu fringilla pretium. Mauris dictum gravida tortor eu lacinia. Donec purus purus, ornare sit amet consectetur sed, dictum sit amet ex. Vivamus sit amet imperdiet tellus. Quisque ultrices risus a massa laoreet, vitae tempus sem congue. Maecenas nec eros ut lectus vehicula rutrum. Donec consequat tincidunt arcu non faucibus. Duis elementum, ante venenatis lacinia cursus, turpis massa congue magna, sed dapibus felis nibh sed tellus. Nam consectetur non nibh vitae sodales. Pellentesque malesuada dolor nec mi volutpat, eget vehicula eros ultrices.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sollicitudin volutpat molestie. Nullam id tempor nulla. Aenean sit amet urna et elit pharetra consequat. Aliquam fringilla tortor vitae lectus tempor, tempor bibendum nunc elementum. Etiam ultrices tristique diam, vitae sodales metus bibendum id. Suspendisse blandit ligula eu fringilla pretium. Mauris dictum gravida tortor eu lacinia. Donec purus purus, ornare sit amet consectetur sed, dictum sit amet ex. Vivamus sit amet imperdiet tellus. Quisque ultrices risus a massa laoreet, vitae tempus sem congue. Maecenas nec eros ut lectus vehicula rutrum. Donec consequat tincidunt arcu non faucibus. Duis elementum, ante venenatis lacinia cursus, turpis massa congue magna, sed dapibus felis nibh sed tellus. Nam consectetur non nibh vitae sodales. Pellentesque malesuada dolor nec mi volutpat, eget vehicula eros ultrices.</p>
		  </div>
		</div>
		<footer id="footer" class="mui--bg-color-teal-600">
		  <div class="mui-container-fluid">
			<br>
			Made with ♥ by <a href="https://www.muicss.com">MUI</a>
		  </div>
		</footer>
	</body>
</html>
