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
		
		<!-- hitung dosis -->
		<script>
		  function formdosis() {
			// initialize modal element
			var modalEl = document.createElement('div');
			modalEl.setAttribute("id", "formdosis");
			modalEl.style.width = '50%';
			//modalEl.style.height = '50%';
			modalEl.style.margin = '100px auto';
			modalEl.style.backgroundColor = '#fff';
			
			//the truth
			//<div class="mui-textfield">
			//<input name="password" type="password">
			//<label>Password :</label>
			//</div>
			//container
			var container = document.createElement('div');
			container.setAttribute("class","mui-container");
			
			//tegangan
			var div1 = document.createElement('div');
			div1.setAttribute("class", "mui-textfield");
			var lab1 = document.createElement('label');
			lab1.innerHTML = "Tegangan :";
			var invar1 = document.createElement('input');
			invar1.setAttribute("id", "tegangan");
			invar1.setAttribute("type", "text");
			div1.appendChild(invar1);
			div1.appendChild(lab1);
			
			//mAs
			var div2 = document.createElement('div');
			div2.setAttribute("class", "mui-textfield");
			var lab2 = document.createElement('label');
			lab2.innerHTML = "Arus Waktu (mAs) :";
			var invar2 = document.createElement('input');
			invar2.setAttribute("id", "mAs");
			invar2.setAttribute("type", "text");
			div2.appendChild(invar2);
			div2.appendChild(lab2);
			
			//BSF
			var div3 = document.createElement('div');
			div3.setAttribute("class", "mui-textfield");
			var lab3 = document.createElement('label');
			lab3.innerHTML = "BSF :";
			var invar3 = document.createElement('input');
			invar3.setAttribute("id", "BSF");
			invar3.setAttribute("type", "text");
			div3.appendChild(invar3);
			div3.appendChild(lab3);
			
			//DAP
			var div4 = document.createElement('div');
			div4.setAttribute("class", "mui-textfield");
			var lab4 = document.createElement('label');
			lab4.innerHTML = "DAP :";
			var invar4 = document.createElement('input');
			invar4.setAttribute("id", "DAP");
			invar4.setAttribute("type", "text");
			div4.appendChild(invar4);
			div4.appendChild(lab4);
			
			//INAK
			var div5 = document.createElement('div');
			div5.setAttribute("class", "mui-textfield");
			var lab5 = document.createElement('label');
			lab5.innerHTML = "INAK :";
			var invar5 = document.createElement('input');
			invar5.setAttribute("id", "INAK");
			invar5.setAttribute("type", "text");
			div5.appendChild(invar5);
			div5.appendChild(lab5);
			
			//Output radiasi
			var div6 = document.createElement('div');
			div6.setAttribute("class", "mui-textfield");
			var lab6 = document.createElement('label');
			lab6.innerHTML = "Output Radiasi :";
			var invar6 = document.createElement('input');
			invar6.setAttribute("id", "Outr");
			invar6.setAttribute("type", "text");
			div6.appendChild(invar6);
			div6.appendChild(lab6);
			
			//ESAK
			var div7 = document.createElement('div');
			div7.setAttribute("class", "mui-textfield");
			var lab7 = document.createElement('label');
			lab7.innerHTML = "ESAK :";
			var invar7 = document.createElement('input');
			invar7.setAttribute("id", "ESAK");
			invar7.setAttribute("type", "text");
			div7.appendChild(invar7);
			div7.appendChild(lab7);
			
			//tombol hitung
			var divbutton = document.createElement('div');
			divbutton.setAttribute("align", "center");
			var hittungbutton = document.createElement('button');
			hittungbutton.setAttribute("class", "mui-btn mui-btn--raised");
			hittungbutton.setAttribute("onclick", "hitungdosis()");
			hittungbutton.innerHTML = "Hitung";
			divbutton.appendChild(hittungbutton);
			
			container.appendChild(div1);
			container.appendChild(div2);
			container.appendChild(div3);
			container.appendChild(div4);
			container.appendChild(divbutton);
			container.appendChild(div5);
			container.appendChild(div6);
			container.appendChild(div7);
			modalEl.appendChild(container);

			// show modal
			mui.overlay('on', modalEl);
		  }
		</script>
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
		<div id="sidedrawer" class="mui--no-user-select mui--bg-color-white-alpha-12">
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
