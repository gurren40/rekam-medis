
//display
function overlaybg(){
	var modalEl = document.createElement('div');
	modalEl.setAttribute("id", "formdosis");
	modalEl.setAttribute("class","mui-col-xs-12 mui-col-md-6 mui-col-md-offset-3");
	modalEl.setAttribute("style","vertical-align:middle;background-color:#fff;");
	return modalEl;
}

//form dosis
function formdosis() {
				  
	mui.overlay('off');
	
	// initialize modal element
	
	var modalEl = overlaybg();
	
	//label
	var label = document.createElement('h3');
	label.setAttribute("align","center");
	label.innerHTML = "Hitung Dosis";
	
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
	
	//tombol Keluar
	var divexit = document.createElement('div');
	divexit.setAttribute("align", "center");
	var exitbutton = document.createElement('button');
	exitbutton.setAttribute("class", "mui-btn mui-btn--raised");
	exitbutton.setAttribute("onclick", "mui.overlay('off')");
	exitbutton.innerHTML = "Kembali";
	divexit.appendChild(exitbutton);
	
	container.appendChild(label);
	container.appendChild(div1);
	container.appendChild(div2);
	container.appendChild(div3);
	container.appendChild(div4);
	container.appendChild(divbutton);
	container.appendChild(div5);
	container.appendChild(div6);
	container.appendChild(div7);
	container.appendChild(divexit);
	modalEl.appendChild(container);

	// show modal
	mui.overlay('on', modalEl);
}

//perhitungan dosis  
function hitungdosis(){
	var teg = document.getElementById("tegangan").value;
	var mAs = document.getElementById("mAs").value;
	var bsf = document.getElementById("BSF").value;
	var dap = document.getElementById("DAP").value;
	
	document.getElementById("INAK").value = Number(teg) + Number(mAs);
	document.getElementById("Outr").value = Number(mAs) + Number(bsf);
	document.getElementById("ESAK").value = Number(bsf) + Number(dap);
}

function loadDoc(url, cFunction, key){
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && (this.status == 200 || this.status == 201)){
			cFunction(this);
		}
		else{
			document.getElementById("rmstatus").innerHTML = xhttp.responseText;
		}
	}
	xhttp.open("POST",url,true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("key="+key);
}

function loadRmlist(xhttp){
	var rmlist = JSON.parse(xhttp.responseText);
	if(!Array.isArray(rmlist)){
		document.getElementById("rmstatus").innerHTML = "Status : "+rmlist["status"];
	}
	else{
		document.getElementById("rmstatus").innerHTML = "";
		document.getElementById("rmlist").innerHTML = " ";
		var rmsize = rmlist.length;
		for (i=0;i<rmsize;i++){
			var rmelement = rmlist[i];
			var theLi = document.createElement('li');
			theLi.setAttribute("id","rm"+rmelement['ID']);
			theLi.setAttribute("onclick","displayrm("+rmelement['ID']+")");
			var theStrong = document.createElement('strong');
			theStrong.innerHTML = rmelement['Nama'];
			var theCaption = document.createElement('p');
			theCaption.setAttribute("class","mui--text-dark-secondary mui--text-caption");
			theCaption.innerHTML = rmelement['datecreated'];
			var theID = document.createElement('p');
			theID.innerHTML = rmelement['ID'];
			theID.setAttribute("class", "theID");
			var theuserID = document.createElement('p');
			theuserID.innerHTML = rmelement['userID'];
			theuserID.setAttribute("class", "theuserID");
			var theNama = document.createElement('p');
			theNama.innerHTML = rmelement['Nama'];
			theNama.setAttribute("class", "theNama");
			var theTegangan = document.createElement('p');
			theTegangan.innerHTML = rmelement['Tegangan'];
			theTegangan.setAttribute("class", "theTegangan");
			var themAs = document.createElement('p');
			themAs.innerHTML = rmelement['mAs'];
			themAs.setAttribute("class", "themAs");
			var themGy = document.createElement('p');
			themGy.innerHTML = rmelement['mGy'];
			themGy.setAttribute("class", "themGy");
			var theOutputRadiasi = document.createElement('p');
			theOutputRadiasi.innerHTML = rmelement['OutputRadiasi'];
			theOutputRadiasi.setAttribute("class", "theOutputRadiasi");
			var theEsak = document.createElement('p');
			theEsak.innerHTML = rmelement['Esak'];
			theEsak.setAttribute("class", "theEsak");
			var theDAP = document.createElement('p');
			theDAP.innerHTML = rmelement['DAP'];
			theDAP.setAttribute("class", "theDAP");
			var theimageName = document.createElement('p');
			theimageName.innerHTML = rmelement['imageName'];
			theimageName.setAttribute("class", "theimageName");
			var thedatecreated = document.createElement('p');
			thedatecreated.innerHTML = rmelement['datecreated'];
			thedatecreated.setAttribute("class", "thedatecreated");
			
			theLi.appendChild(theStrong);
			theLi.appendChild(theCaption);
			theLi.appendChild(theID);
			theLi.appendChild(theuserID);
			theLi.appendChild(theNama);
			theLi.appendChild(theTegangan);
			theLi.appendChild(themAs);
			theLi.appendChild(themGy);
			theLi.appendChild(theOutputRadiasi);
			theLi.appendChild(theEsak);
			theLi.appendChild(theDAP);
			theLi.appendChild(theimageName);
			theLi.appendChild(thedatecreated);
			document.getElementById("rmlist").appendChild(theLi);
		}
	}
}

function displayuserlist(){
	document.getElementById("userlistEl").style.display = "block";
	document.getElementById("rmlistEl").style.display = "none";
}
