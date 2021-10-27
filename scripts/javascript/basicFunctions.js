if(document.readyState !== 'loading'){
	// console.warn( 'document is already ready, just execute code here' );
    addMyListFunctions();
}else{
	document.addEventListener('DOMContentLoaded', function (){
        // console.warn( 'document was not ready, place code here' );
        addMyListFunctions();
    });
}

function addMyListFunctions(){
	console.log("MyList Functions enabled now.");
	
	

}



function toggleSourceMode(mode){
	let sourceImport = document.getElementById('sourceImport');
	let sourceCopy = document.getElementById('sourceCopy');
	let sourceManual = document.getElementById('sourceManual');
	
	let toggleImport = document.getElementById('toggleImport');
	let toggleCopy = document.getElementById('toggleCopy');
	let toggleManual = document.getElementById('toggleManual');
	
	if(mode == 'import'){
		sourceImport.classList.remove('hidden');
		sourceCopy.classList.add('hidden');
		sourceManual.classList.add('hidden');
	}else if(mode == 'copy'){
		sourceImport.classList.add('hidden');
		sourceCopy.classList.remove('hidden');
		sourceManual.classList.add('hidden');
	}else{
		sourceImport.classList.add('hidden');
		sourceCopy.classList.add('hidden');
		sourceManual.classList.remove('hidden');
	}
}




function updateImportFormat(){
	let hint = document.getElementById('importFormatHint');
	let formatSelect = document.getElementById('importFormat');
	let importFormat = formatSelect.value;
	
	if(importFormat == "space"){
		hint.innerHTML = "First name, a space, and then last name";
	}else{
		hint.innerHTML = "Last name, a comma, and then first name";
	}
}


function swapNames(number){
	event.preventDefault();
	
	let firstName = document.getElementById('firstName_' + number);
	let lastName = document.getElementById('lastName_' + number);
	
	let fname = firstName.value;
	let lname = lastName.value;
	
	firstName.value = lname;
	lastName.value = fname;
	
	return false;
}


function editName(number, which){
	let targeted = document.getElementById(which + 'Name_' + number);
	
	targeted.contentEditable = true;
}



function showSaveButton(number){
	let targeted = document.getElementById('updateName_' + number);
	
	targeted.classList.remove('hidden');
}


function saveNameChange(number){
	let targeted = document.getElementById('updateName_' + number);
	
	targeted.classList.add('hidden');
}


function deleteEditRow(number){
	let targeted = document.getElementById('deleteName_' + number);

	var i = targeted.parentNode.parentNode.rowIndex;
	document.getElementById("namesListTable").deleteRow(i);

	return false;
}



function addNewName(){
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
	var cell7 = row.insertCell(6);

	cell1.innerHTML = "#.";
	cell2.innerHTML = "<input type='text' name='firstName_#' id='firstName_#' class='contentEditable' tabindex='200' value='" + fname + "' placeholder='Last Name' onChange=\"showSaveButton(#);\" />";
	cell3.innerHTML = "swap";
	cell4.innerHTML = "<input type='text' name='lastName_#' id='lastName_#' class='contentEditable' tabindex='200' value='" + lname + "' placeholder='Last Name' onChange=\"showSaveButton(#);\" />";
	cell5.innerHTML = "<label for='' class='groupsContainer'><input type='checkbox' name='' id='' /><ul class='reset groups'></ul><button class='button blue tiny ghosted'>Edit</button></label>";
	cell6.innerHTML = "save";
	cell7.innerHTML = "<span class='redText'>X</span>";

	cell7.classList.add('tdc');
	
	return false;
}


function addNewGroup(){
	var groupField = document.getElementById('addGroup');
	var groupName = groupField.value;
	var list = document.getElementById('groupsList');

	var li = document.createElement("li");

	var handle = document.createElement("div");
	handle.classList.add('handle');
	// handle.appendChild(document.createTextNode("drag<br />to sort"));
	handle.innerHTML = "drag<br />to sort";
	// li.appendChild(document.createTextNode("Four"));
	li.appendChild(handle);
	
	var headline = document.createElement("h2");
	headline.appendChild(document.createTextNode(groupName));
	li.appendChild(headline);
	
	var deleteLink = document.createElement("div");
	var deleteButton = document.createElement("button");
	deleteButton.classList.add('button');
	deleteButton.classList.add('red');
	deleteButton.classList.add('ghosted');
	deleteButton.appendChild(document.createTextNode("Delete"));
	deleteLink.appendChild(deleteButton);
	li.appendChild(deleteLink);
	
	list.appendChild(li);

	groupField.value = "";

	return false;
}


function openNameGroupEditor(id){
	var editor = document.getElementById('groupsAssignedEditor');
	// var updateButton = editor.getElementById('updateNameGroups');

	editor.classList.add('show');

	return false;
}

function updateNameGroups(id){
	var editor = document.getElementById('groupsAssignedEditor');
	
	editor.classList.remove('show');

	return false;
}

function cancelNameGroups(){
	var editor = document.getElementById('groupsAssignedEditor');
	
	editor.classList.remove('show');

	return false;
}


function selectNamesByGroup(){
	var picker = document.getElementById('selectByGroup');
	var groupID = picker.value;

	var groupCheckboxes = document.querySelectorAll('input.groupCheckbox');
	for(var e = 0; e < groupCheckboxes.length; e++){
		groupCheckboxes[e].checked = false;
		
		var assignedGroups = groupCheckboxes[e].dataset.assignedGroups.split(",");
		if(assignedGroups.includes(groupID) && groupID != ""){
			groupCheckboxes[e].checked = true;
		}
	}

	toggleManageGroups();
}


function toggleManageGroups(){
	var counter = 0;

	var groupCheckboxes = document.querySelectorAll('input.groupCheckbox');
	for(var e = 0; e < groupCheckboxes.length; e++){
		if(groupCheckboxes[e].checked === true){
			counter++;
		}
	}
	
	var manageGroups = document.getElementById('manageGroups');
	if(counter > 0){
		manageGroups.classList.remove('hidden');
	}else{
		manageGroups.classList.add('hidden');
	}
}




function setNamesByGroup(className, clearExisting){
	var picker = document.getElementById('selectByGroup');
	var groupID = picker.value;

	var groupCheckboxes = document.querySelectorAll('input.' + className);
	for(var e = 0; e < groupCheckboxes.length; e++){
		if(clearExisting === true){
			groupCheckboxes[e].checked = false;
		}
		
		var assignedGroups = groupCheckboxes[e].dataset.assignedGroups.split(",");
		if(assignedGroups.includes(groupID) && groupID != ""){
			groupCheckboxes[e].checked = true;
		}
	}
}




function assignGroupToSelected(){
	var groupSelector = document.getElementById('groupSelector');
	var groupSelectorValue = groupSelector.value;
    var groupSelectorText = groupSelector.options[groupSelector.selectedIndex].text;

	if(! groupSelectorValue) return false;

	var groupLists = document.querySelectorAll('ul.groups');
	var items = null;
	var wasFound = null;
	var checkbox = null;

	for(g = 0; g < groupLists.length; g++){
		wasFound = false;
		items = groupLists[g].querySelectorAll('li');
		thisGroup = groupLists[g].id;
		thisGroup = thisGroup.toString().replace("groups_", 'groupName_');
		checkbox = document.getElementById(thisGroup);
		if(checkbox.checked !== true){
			continue;
		}
		for(i = 0; i < items.length; i++){
			console.log(thisGroup + " :: " + i + " => " + items[i].innerHTML);
			if(items[i].innerHTML == groupSelectorText){
				// really should be comparing an id (index) for the group not its textual representation
				wasFound = true
			}
		}
		if(wasFound == false){
			var newGroup = document.createElement("li");
			newGroup.appendChild(document.createTextNode(groupSelectorText));
			groupLists[g].appendChild(newGroup);
		}
	}

}



function removeGroupFromSelected(){
	var groupSelector = document.getElementById('groupSelector');
	var groupSelectorValue = groupSelector.value;
    var groupSelectorText = groupSelector.options[groupSelector.selectedIndex].text;

	if(! groupSelectorValue) return false;

	console.log("it's " + groupSelectorValue + " = " + groupSelectorText);

	var groupLists = document.querySelectorAll('ul.groups');
	var items = null;
	var checkbox = null;

	for(g = 0; g < groupLists.length; g++){
		items = groupLists[g].querySelectorAll('li');
		thisGroup = groupLists[g].id;
		thisGroup = thisGroup.toString().replace("groups_", 'groupName_');
		checkbox = document.getElementById(thisGroup);
		if(checkbox.checked !== true){
			continue;
		}
		for(i = 0; i < items.length; i++){
			console.log(thisGroup + " :: " + i + " => " + items[i].innerHTML);
			if(items[i].innerHTML == groupSelectorText){
				// really should be comparing an id (index) for the group not its textual representation
				items[i].remove();

				// update checkbox's dataset too
				chosen = document.getElementById(thisGroup).dataset.assignedGroups.split(",");
				chosen = chosen.filter(item => item !== groupSelectorValue);
				checkbox.dataset.assignedGroups = chosen.join(",");
			}
		}
	}
}








function changeNameOrder(){
	let listOfNames = document.getElementById('listOfNames');
	let orderSelect = document.getElementById('nameOrder');
	let chosenOrder = orderSelect.value;
	
	listOfNames.classList.remove('firstLast');
	listOfNames.classList.remove('lastCommaFirst');
	listOfNames.classList.remove('firstInitial');
	listOfNames.classList.remove('lastInitial');
	listOfNames.classList.remove('firstOnly');
	listOfNames.classList.remove('lastOnly');

	listOfNames.classList.add(chosenOrder);
}

function selectAll(){
	// store array of checkboxes
	var nameCheckboxes = document.querySelectorAll("input.nameCheckbox");
	for(var e = 0; e < nameCheckboxes.length; e++){
		nameCheckboxes[e].checked = true;
	}
}

function deselectAll(){
	// store array of checkboxes
	var nameCheckboxes = document.querySelectorAll("input.nameCheckbox");
	for(var e = 0; e < nameCheckboxes.length; e++){
		nameCheckboxes[e].checked = false;
	}
}



function goTo(url){
	window.location = url;
}