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
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>mui/css/mui.css">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>mui/extra/mui-colors.css">
	<script type = 'text/javascript' src = "<?php echo base_url(); ?>mui/js/mui.js"></script>
</head>
<body>
	<div class="mui-container">
		<h2>There is an error occurred</h2>
		<p><?php echo $error; ?></p>
		<div align="center">
			<button onclick="location.href='<?php echo base_url(); ?>'" class="mui-btn mui-btn--raised">Home</button>
			<button onclick="location.href='<?php echo base_url(); ?>user/logout'" class="mui-btn mui-btn--raised">Logout</button>
		</div>
	</div>
</body>
</html>
