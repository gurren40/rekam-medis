<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Rekam Medis</title>

	<style type="text/css">
	</style>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "mui/css/mui.css">
	<script type = 'text/javascript' src = "mui/js/mui.js"></script>
</head>
<body>
	<div class="mui-container">
		<form class="mui-form" target="User/authkey">
			<br>
			<div align="center">
				<img src="image/logo.png" align="center" width="27%" height="27%">
			</div>
			<h1 align="center">Selamat Datang di Aplikasi Rekam Medis</h1>
			<div class="mui-textfield">
				<input type="text" pattern="[0-9]+">
				<label>NIK :</label>
			</div>
			<div class="mui-textfield">
				<input type="password">
				<label>Password :</label>
			</div>
			<div align="center">
				<button type="submit" class="mui-btn mui-btn--raised">Login</button>
			</div>
		</form>
	</div>
</body>
</html>
