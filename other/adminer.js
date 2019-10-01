
function loadUserlist(xhttp){
	var userlist = JSON.parse(xhttp.responseText);
	if(!Array.isArray(userlist)){
		document.getElementById("userstatus").innerHTML = "Status : "+userlist["status"];
	}
	else{
		document.getElementById("userstatus").innerHTML = "";
		document.getElementById("userlist").innerHTML = " ";
		var ulsize = userlist.length;
		for (i=0;i<ulsize;i++){
			var ulelement = userlist[i];
			var theLi = document.createElement('li');
			theLi.setAttribute("id","ul"+ulelement['ID']);
			theLi.setAttribute("onclick","displayul("+ulelement['ID']+")");
			var theStrong = document.createElement('strong');
			theStrong.innerHTML = ulelement['Nama'];
			var theCaption = document.createElement('p');
			theCaption.setAttribute("class","mui--text-dark-secondary mui--text-caption");
			theCaption.innerHTML = ulelement['Alamat'];
			var theID = document.createElement('label');
			theID.setAttribute("style","display:none;");
			theID.innerHTML = ulelement['ID'];
			
			theLi.appendChild(theStrong);
			theLi.appendChild(theCaption);
			theLi.appendChild(theID);
			document.getElementById("userlist").appendChild(theLi);
		}
	}
}

function displayuserlist(){
	document.getElementById("userlistEl").style.display = "block";
	document.getElementById("rmlistEl").style.display = "none";
	document.getElementById("thetitle").innerHTML = "Daftar Pasien";
}

function displayul(id){
	var url = sessionStorage.getItem("baseurl") + "RekamMedisAPI/getByUser/"+id;
	loadDoc(url, loadRmlist, sessionStorage.getItem("key"));
	document.getElementById("userlistEl").style.display = "none";
	document.getElementById("rmlistEl").style.display = "block";
	document.getElementById("thetitle").innerHTML = "Daftar Rekam Medis";
}

//form rekam medis
function createRMForm() {
	mui.overlay('off');
	// initialize modal element
	var modalEl = overlaybg();
	
	//label
	var label = document.createElement('h3');
	label.setAttribute("align","center");
	label.innerHTML = "Rekam Medis Baru";
	
	//container
	var container = document.createElement('div');
	container.setAttribute("class","mui-container");
	container.setAttribute("id","createcontainer");
	
	//UserID
	var div1 = document.createElement('div');
	div1.setAttribute("class", "mui-textfield");
	var lab1 = document.createElement('label');
	lab1.innerHTML = "Pasien :";
	var invar1 = document.createElement('select');
	invar1.setAttribute("name", "userID");
	for(i=0;i<document.getElementById("userlist").getElementsByTagName('li').length;i++){
		var optionvar = document.createElement('option');
		optionvar.innerHTML = document.getElementById("userlist").getElementsByTagName('li')[i].getElementsByTagName('strong')[0].innerHTML;
		optionvar.setAttribute("value",document.getElementById("userlist").getElementsByTagName('li')[i].getElementsByTagName('label')[0].innerHTML);
		invar1.appendChild(optionvar);
	}
	div1.appendChild(invar1);
	div1.appendChild(lab1);
	
	//Nama
	var div2 = document.createElement('div');
	div2.setAttribute("class", "mui-textfield");
	var lab2 = document.createElement('label');
	lab2.innerHTML = "Nama Rekam Medis :";
	var invar2 = document.createElement('input');
	invar2.setAttribute("name", "Nama");
	invar2.setAttribute("type", "text");
	div2.appendChild(invar2);
	div2.appendChild(lab2);
	
	//Tegangan
	var div3 = document.createElement('div');
	div3.setAttribute("class", "mui-textfield");
	var lab3 = document.createElement('label');
	lab3.innerHTML = "Tegangan :";
	var invar3 = document.createElement('input');
	invar3.setAttribute("name", "Tegangan");
	invar3.setAttribute("type", "text");
	div3.appendChild(invar3);
	div3.appendChild(lab3);
	
	//mAs
	var div4 = document.createElement('div');
	div4.setAttribute("class", "mui-textfield");
	var lab4 = document.createElement('label');
	lab4.innerHTML = "mAs :";
	var invar4 = document.createElement('input');
	invar4.setAttribute("name", "mAs");
	invar4.setAttribute("type", "text");
	div4.appendChild(invar4);
	div4.appendChild(lab4);
	
	//mGy
	var div5 = document.createElement('div');
	div5.setAttribute("class", "mui-textfield");
	var lab5 = document.createElement('label');
	lab5.innerHTML = "mGy :";
	var invar5 = document.createElement('input');
	invar5.setAttribute("name", "mGy");
	invar5.setAttribute("type", "text");
	div5.appendChild(invar5);
	div5.appendChild(lab5);
	
	//OutputRadiasi
	var div6 = document.createElement('div');
	div6.setAttribute("class", "mui-textfield");
	var lab6 = document.createElement('label');
	lab6.innerHTML = "Output Radiasi :";
	var invar6 = document.createElement('input');
	invar6.setAttribute("name", "OutputRadiasi");
	invar6.setAttribute("type", "text");
	div6.appendChild(invar6);
	div6.appendChild(lab6);
	
	//Esak
	var div7 = document.createElement('div');
	div7.setAttribute("class", "mui-textfield");
	var lab7 = document.createElement('label');
	lab7.innerHTML = "Esak :";
	var invar7 = document.createElement('input');
	invar7.setAttribute("name", "Esak");
	invar7.setAttribute("type", "text");
	div7.appendChild(invar7);
	div7.appendChild(lab7);
	
	//DAP
	var div8 = document.createElement('div');
	div8.setAttribute("class", "mui-textfield");
	var lab8 = document.createElement('label');
	lab8.innerHTML = "DAP :";
	var invar8 = document.createElement('input');
	invar8.setAttribute("name", "DAP");
	invar8.setAttribute("type", "text");
	div8.appendChild(invar8);
	div8.appendChild(lab8);
	
	//imageFile
	var div9 = document.createElement('div');
	div9.setAttribute("class", "mui-textfield");
	var lab9 = document.createElement('label');
	lab9.innerHTML = "File Gambar :";
	var invar9 = document.createElement('input');
	invar9.setAttribute("name", "imageFile");
	invar9.setAttribute("id", "imageFile");
	invar9.setAttribute("type", "file");
	div9.appendChild(invar9);
	div9.appendChild(lab9);
	
	//submit
	var div10 = document.createElement('div');
	div10.setAttribute("align", "center");
	var invar10 = document.createElement('button');
	invar10.setAttribute("name", "submit");
	invar10.setAttribute("onclick", "encodeImageFileAsURL()");
	invar10.setAttribute("class", "mui-btn mui-btn--raised");
	//invar10.setAttribute("type", "submit");
	invar10.innerHTML = "Masukkan";
	div10.appendChild(invar10);
	
	//tombol Keluar
	var divexit = document.createElement('div');
	divexit.setAttribute("align", "center");
	var exitbutton = document.createElement('button');
	exitbutton.setAttribute("class", "mui-btn mui-btn--raised");
	exitbutton.setAttribute("onclick", "mui.overlay('off')");
	exitbutton.innerHTML = "Kembali";
	divexit.appendChild(exitbutton);
	
	//form
	var formEl = document.createElement('form');
	formEl.setAttribute("method","post");
	formEl.setAttribute("enctype","multipart/form-data");
	formEl.setAttribute("action",sessionStorage.getItem("baseurl") + "RekamMedis/create");
	
	container.appendChild(label);
	container.appendChild(div1);
	container.appendChild(div2);
	container.appendChild(div3);
	container.appendChild(div4);
	container.appendChild(div5);
	container.appendChild(div6);
	container.appendChild(div7);
	container.appendChild(div8);
	container.appendChild(div9);
	container.appendChild(div10);
	container.appendChild(divexit);
	modalEl.appendChild(container);

	// show modal
	mui.overlay('on', modalEl);
}

function createUserForm(){
	mui.overlay('off');
	// initialize modal element
	var modalEl = overlaybg();
	
	//label
	var label = document.createElement('h3');
	label.setAttribute("align","center");
	label.innerHTML = "Pengguna Baru";
	
	//container
	var container = document.createElement('div');
	container.setAttribute("class","mui-container");
	container.setAttribute("id","createusercontainer");
	
	//NIK
	var div2 = document.createElement('div');
	div2.setAttribute("class", "mui-textfield");
	var lab2 = document.createElement('label');
	lab2.innerHTML = "NIK :";
	var invar2 = document.createElement('input');
	invar2.setAttribute("name", "createNIK");
	invar2.setAttribute("type", "text");
	div2.appendChild(invar2);
	div2.appendChild(lab2);
	
	//Nama
	var div3 = document.createElement('div');
	div3.setAttribute("class", "mui-textfield");
	var lab3 = document.createElement('label');
	lab3.innerHTML = "Nama :";
	var invar3 = document.createElement('input');
	invar3.setAttribute("name", "createNama");
	invar3.setAttribute("type", "text");
	div3.appendChild(invar3);
	div3.appendChild(lab3);
	
	//Umur
	var div4 = document.createElement('div');
	div4.setAttribute("class", "mui-textfield");
	var lab4 = document.createElement('label');
	lab4.innerHTML = "Umur :";
	var invar4 = document.createElement('input');
	invar4.setAttribute("name", "createUmur");
	invar4.setAttribute("type", "text");
	div4.appendChild(invar4);
	div4.appendChild(lab4);
	
	//JK
	var div1 = document.createElement('div');
	div1.setAttribute("class", "mui-textfield");
	var lab1 = document.createElement('label');
	lab1.innerHTML = "Jenis Kelamin :";
	var invar1 = document.createElement('select');
	invar1.setAttribute("name", "createJK");
	var optionvar1 = document.createElement('option');
	optionvar1.innerHTML = "Laki - Laki";
	optionvar1.setAttribute("value","0");
	var optionvar2 = document.createElement('option');
	optionvar2.innerHTML = "Perempuan";
	optionvar2.setAttribute("value","1");
	invar1.appendChild(optionvar1);
	invar1.appendChild(optionvar2);
	div1.appendChild(invar1);
	div1.appendChild(lab1);
	
	//Alamat
	var div6 = document.createElement('div');
	div6.setAttribute("class", "mui-textfield");
	var lab6 = document.createElement('label');
	lab6.innerHTML = "Alamat :";
	var invar6 = document.createElement('input');
	invar6.setAttribute("name", "createAlamat");
	invar6.setAttribute("type", "text");
	div6.appendChild(invar6);
	div6.appendChild(lab6);
	
	//Password
	var div7 = document.createElement('div');
	div7.setAttribute("class", "mui-textfield");
	var lab7 = document.createElement('label');
	lab7.innerHTML = "Password :";
	var invar7 = document.createElement('input');
	invar7.setAttribute("name", "createpassword");
	invar7.setAttribute("type", "password");
	div7.appendChild(invar7);
	div7.appendChild(lab7);
	
	//Password2
	var div8 = document.createElement('div');
	div8.setAttribute("class", "mui-textfield");
	var lab8 = document.createElement('label');
	lab8.innerHTML = "Ulangi Password :";
	var invar8 = document.createElement('input');
	invar8.setAttribute("name", "createpassword");
	invar8.setAttribute("type", "password");
	div8.appendChild(invar8);
	div8.appendChild(lab8);
	
	//role
	var div9 = document.createElement('div');
	div9.setAttribute("class", "mui-checkbox");
	var lab9 = document.createElement('label');
	lab9.innerHTML = "Sebagai Admin";
	var invar9 = document.createElement('input');
	invar9.setAttribute("name", "createRole");
	invar9.setAttribute("type", "checkbox");
	div9.appendChild(invar9);
	div9.appendChild(lab9);
	
	//submit
	var div10 = document.createElement('div');
	div10.setAttribute("align", "center");
	var invar10 = document.createElement('button');
	invar10.setAttribute("name", "submit");
	invar10.setAttribute("onclick", "createNewUser()");
	invar10.setAttribute("class", "mui-btn mui-btn--raised");
	//invar10.setAttribute("type", "submit");
	invar10.innerHTML = "Masukkan";
	div10.appendChild(invar10);
	
	//tombol Keluar
	var divexit = document.createElement('div');
	divexit.setAttribute("align", "center");
	var exitbutton = document.createElement('button');
	exitbutton.setAttribute("class", "mui-btn mui-btn--raised");
	exitbutton.setAttribute("onclick", "mui.overlay('off')");
	exitbutton.innerHTML = "Kembali";
	divexit.appendChild(exitbutton);
	
	//form
	var formEl = document.createElement('form');
	formEl.setAttribute("method","post");
	formEl.setAttribute("enctype","multipart/form-data");
	formEl.setAttribute("action",sessionStorage.getItem("baseurl") + "UserAPI/create");
	
	container.appendChild(label);
	container.appendChild(div1);
	container.appendChild(div2);
	container.appendChild(div3);
	container.appendChild(div4);
	container.appendChild(div6);
	container.appendChild(div7);
	container.appendChild(div8);
	container.appendChild(div9);
	container.appendChild(div10);
	container.appendChild(divexit);
	modalEl.appendChild(container);

	// show modal
	mui.overlay('on', modalEl);
}

function createNewUser(){
	var sendNIK = document.getElementsByName("createNIK")[0].value;
	var sendNama = document.getElementsByName("createNama")[0].value;
	var sendUmur = document.getElementsByName("createUmur")[0].value;
	var sendJK = document.getElementsByName("createJK")[0].value;
	var sendAlamat = document.getElementsByName("createAlamat")[0].value;
	var sendRole = (document.getElementsByName("createRole")[0].checked) ? "1" : "0";
	var sendpassword = document.getElementsByName("createpassword")[0].value;
	var sendpassword2 = document.getElementsByName("createpassword")[1].value;
	if(sendpassword === sendpassword2){
		createNU(sendNIK,sendNama,sendUmur,sendJK,sendAlamat,sendRole,sendpassword);
	}
	else{
		document.getElementById("rmstatus").innerHTML = document.getElementById("userstatus").innerHTML = "Password tidak sesuai";
		mui.overlay('off');
	}
}

function preCreateRM(file){
	createRM(document.getElementsByName("userID")[0].value,document.getElementsByName("Nama")[0].value,
	document.getElementsByName("Tegangan")[0].value,document.getElementsByName("mAs")[0].value,
	document.getElementsByName("mGy")[0].value,document.getElementsByName("OutputRadiasi")[0].value,
	document.getElementsByName("Esak")[0].value,document.getElementsByName("DAP")[0].value,file);
}

function encodeImageFileAsURL() {
	var file = document.getElementById("imageFile").files[0];
	var reader = new FileReader();
	reader.onloadend = function() {
		preCreateRM(reader.result);
	}
	reader.readAsDataURL(file);
}

function createRM(userID,Nama,Tegangan,mAs,mGy,OutputRadiasi,Esak,DAP,file){
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && (this.status == 200 || this.status == 201)){
			var jsondata = JSON.parse(this.responseText);
			if(!Array.isArray(jsondata)){
				if(jsondata.hasOwnProperty("status")){
					document.getElementById("rmstatus").innerHTML = "Status : "+jsondata["status"];
					document.getElementById("userstatus").innerHTML = "Status : "+jsondata["status"];
				}
			}
		}
	}
      
	xhttp.open("POST",sessionStorage.getItem("baseurl") + "RekamMedisAPI/create",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var valuequery = "key="+sessionStorage.getItem("key");
	valuequery = valuequery + "&userID="+userID;
	valuequery = valuequery + "&Nama="+Nama;
	valuequery = valuequery + "&Tegangan="+Tegangan;
	valuequery = valuequery + "&mAs="+mAs;
	valuequery = valuequery + "&mGy="+mGy;
	valuequery = valuequery + "&OutputRadiasi="+OutputRadiasi;
	valuequery = valuequery + "&Esak="+Esak;
	valuequery = valuequery + "&DAP="+DAP;
	valuequery = valuequery + "&isbase64=1";
	valuequery = valuequery + "&imageFile="+file;
	xhttp.send(valuequery);
	mui.overlay('off');
}

function createNU(NIK,Nama,Umur,JK,Alamat,Role,password){
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && (this.status == 200 || this.status == 201)){
			var jsondata = JSON.parse(this.responseText);
			if(!Array.isArray(jsondata)){
				if(jsondata.hasOwnProperty("status")){
					document.getElementById("rmstatus").innerHTML = "Status : "+jsondata["status"];
					document.getElementById("userstatus").innerHTML = "Status : "+jsondata["status"];
				}
			}
		}
	}
      
	xhttp.open("POST",sessionStorage.getItem("baseurl") + "AdminAPI/create",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var valuequery = "key="+sessionStorage.getItem("key");
	valuequery = valuequery + "&NIK="+NIK;
	valuequery = valuequery + "&Nama="+Nama;
	valuequery = valuequery + "&Umur="+Umur;
	valuequery = valuequery + "&JK="+JK;
	valuequery = valuequery + "&Alamat="+Alamat;
	valuequery = valuequery + "&Role="+Role;
	valuequery = valuequery + "&password="+password;
	xhttp.send(valuequery);
	mui.overlay('off');
}
