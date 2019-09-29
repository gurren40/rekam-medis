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
		<p style="display:hidden;" id="key"><?php echo $key; ?></p>
		<p style="display:hidden;" id="baseurl"><?php echo base_url(); ?></p>
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
		  <div class="mui-appbar">
			<div class="mui-container-fluid mui--bg-color-teal-500 mui--appbar-line-height">
			  <a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer">☰</a>
			  <a class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer">☰</a>
			  <a id="thetitle" class="appbar-brand" style="font-size: 1.25rem;color: #fff;">Daftar Rekam Medis</a>
			</div>
		  </div>
		</header>
		<div id="content-wrapper">
		  <div class="mui--appbar-height"></div>
		  <div id="rmlistEl" class="mui-container" <?php if ($isadmin == 1) echo 'style="display:none;"'; ?>>
			<p id="rmstatus"></p>
			<?php if ($isadmin == 1) echo '<button onclick="displayuserlist()">Back</button>'; ?>
			<ul id="rmlist"></ul>
		  </div>
		  <div id="userlistEl" class="mui-container" <?php if ($isadmin == 0) echo 'style="display:none;"'; ?>>
			<ul id="userlist"></ul>
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
			var thekey = document.getElementById("key").innerHTML;
			document.addEventListener('readystatechange', event => {
				if(event.target.readyState === "complete"){
					loadDoc("<?php echo base_url(); ?>RekamMedisAPI/getAll",loadRmlist,thekey);
				}
			});
		</script>
	</body>
</html>
