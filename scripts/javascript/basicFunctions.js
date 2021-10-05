if(document.readyState !== 'loading'){
	// console.warn( 'document is already ready, just execute code here' );
    addMyListFunctions();
}else{
	document.addEventListener('DOMContentLoaded', function () {
        // console.warn( 'document was not ready, place code here' );
        addMyListFunctions();
    });
}

function addMyListFunctions(){
	console.log("MyList Functions enabled now.");
	
	

}



function toggleSourceMode(mode) {
	let sourceImport = document.getElementById('sourceImport');
	let sourceCopy = document.getElementById('sourceCopy');
	
	let toggleImport = document.getElementById('toggleImport');
	let toggleCopy = document.getElementById('toggleCopy');
	
	if(mode == 'import'){
		sourceImport.classList.remove('hidden');
		sourceCopy.classList.add('hidden');
	}else{
		sourceImport.classList.add('hidden');
		sourceCopy.classList.remove('hidden');
	}
}




function updateImportFormat() {
	let hint = document.getElementById('importFormatHint');
	let formatSelect = document.getElementById('importFormat');
	let importFormat = formatSelect.value;
	
	if(importFormat == "space"){
		hint.innerHTML = "First name, a space, and then last name";
	}else{
		hint.innerHTML = "Last name, a comma, and then first name";
	}
}


function swapNames(number) {
	event.preventDefault();
	
	let firstName = document.getElementById('firstName_' + number);
	let lastName = document.getElementById('lastName_' + number);
	
	let fname = firstName.value;
	let lname = lastName.value;
	
	firstName.value = lname;
	lastName.value = fname;
	
	return false;
}


function editName(number, which) {
	let targeted = document.getElementById(which + 'Name_' + number);
	
	targeted.contentEditable = true;
}



function showSaveButton(number) {
	let targeted = document.getElementById('updateName_' + number);
	
	targeted.classList.remove('hidden');
}


function saveNameChange(number) {
	let targeted = document.getElementById('updateName_' + number);
	
	targeted.classList.add('hidden');
}


function deleteEditRow(number) {
	let targeted = document.getElementById('deleteName_' + number);

	var i = targeted.parentNode.parentNode.rowIndex;
	document.getElementById("namesListTable").deleteRow(i);

	return false;
}



function addNewName() {
	var table = document.getElementById("namesListTable");

	var row = table.insertRow(7);

	var fname = document.getElementById('addFirstName').value;
	var lname = document.getElementById('addLastName').value;

	console.log(fname + " " + lname);

	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	var cell4 = row.insertCell(3);
	var cell5 = row.insertCell(4);
	var cell6 = row.insertCell(5);

	cell1.innerHTML = "#.";
	cell2.innerHTML = "<input type='text' name='firstName_#' id='firstName_#' class='contentEditable' tabindex='200' value='" + fname + "' placeholder='Last Name' onChange=\"showSaveButton(#);\" />";
	cell3.innerHTML = "swap";
	cell4.innerHTML = "<input type='text' name='lastName_#' id='lastName_#' class='contentEditable' tabindex='200' value='" + lname + "' placeholder='Last Name' onChange=\"showSaveButton(#);\" />";
	cell5.innerHTML = "save";
	cell6.innerHTML = "<span class='redText'>X</span>";
	
	return false;
}








function changeNameOrder(){
	let listOfNames = document.getElementById('listOfNames');
	let orderSelect = document.getElementById('nameOrder');
	let chosenOrder = orderSelect.value;
	
	listOfNames.classList.remove('firstLast');

	listOfNames.classList.remove('lastCommaFirst');

	listOfNames.classList.remove('firstOnly');

	listOfNames.classList.remove('lastOnly');

	listOfNames.classList.add(chosenOrder);
}

function selectAll(){
	// store array of checkboxes
	var nameCheckboxes = document.querySelectorAll("input.nameCheckbox");
	for (var e = 0; e < nameCheckboxes.length; e++) {
		nameCheckboxes[e].checked = true;
	}
}

function deselectAll(){
	// store array of checkboxes
	var nameCheckboxes = document.querySelectorAll("input.nameCheckbox");
	for (var e = 0; e < nameCheckboxes.length; e++) {
		nameCheckboxes[e].checked = false;
	}
}



function goTo(url){
	window.location = url;
}