
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
			
			theLi.appendChild(theStrong);
			theLi.appendChild(theCaption);
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
