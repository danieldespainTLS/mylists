var xmlHttp;

function showUser(str){
	xmlHttp = GetXmlHttpObject();
	
	if(xmlHttp == null){
		alert ("Browser does not support HTTP Request");
		return;
	}

	var url	= "responseXML.php";
	url		= url + "?p=" + str;
	url		= url + "&sid=" + Math.random();
	xmlHttp.onreadystatechange = stateChanged;
	xmlHttp.open("GET", url, true);
	xmlHttp.send(null);
}



function stateChanged(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		xmlDoc = xmlHttp.responseXML;
		document.getElementById("styleID").innerHTML		= xmlDoc.getElementsByTagName("styleID")[0].childNodes[0].nodeValue;
		document.getElementById("vendor").innerHTML			= xmlDoc.getElementsByTagName("vendor")[0].childNodes[0].nodeValue;
		document.getElementById("title").innerHTML			= xmlDoc.getElementsByTagName("title")[0].childNodes[0].nodeValue;
		document.getElementById("price").innerHTML			= xmlDoc.getElementsByTagName("price")[0].childNodes[0].nodeValue;
	}
}



function GetXmlHttpObject(){
	var objXMLHttp=null;
	
	if(window.XMLHttpRequest){
		objXMLHttp=new XMLHttpRequest();
	}else if(window.ActiveXObject){
		objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	return objXMLHttp;
}