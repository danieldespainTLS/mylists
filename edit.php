<html>
	<head>
		<title>Edit List XYZ</title>
		<meta name="theme-color" content="#f1fafe">
		<?php require_once("includes/_faviconLinks.php"); ?>
		<link rel="stylesheet" type='text/css' href='styles/css/styles.css' />
		
		<style>
		</style>
	</head>

<body>
	
<article>

<h1>Edit List '2021 Class'</h1>
<p><strong>Edit the names</strong> by clicking on the first or last name.  You can also <strong>add</strong> names to or <strong>delete</strong> names from the list.</p>



<form action='edit.php' onSubmit="return false;">
	<table id='namesListTable' class='namesList' border='0' cellpadding='0' cellspacing='0'>
		<thead>
			<tr>
				<th class='tdr'></th>
				<th class='tdl'>First Name</th>
				<th class='tdc hint'>swap</th>
				<th class='tdl'>Last Name</th>
				<th class='tdl'>
					Groups
					<select name="selectByGroup" id="selectByGroup" onChange="selectNamesByGroup();">
						<option value="">Select Names in Group...</option>
						<option value="1">Orange Table</option>
						<option value="2">Green Table</option>
						<option value="3">Reading Group 1</option>
						<option value="4">Reading Group 2</option>
						<option value="5">Reading Group 3</option>
						<option value="8">Math Level 1</option>
						<option value="9">Math Level 2</option>
						<option value="6">Boys</option>
						<option value="7">Girls</option>
					</select>
					<a href="groups.php" class='hint'>Create Groups</a>
				</th>
				<th class='tdr hint'>ajax</th>
				<th class='tdc'>Delete</th>
			</tr>
		</thead>
		<tbody>
		<tr>
				<td class='tdr'>1.</td>
				<td><input type='text' name='firstName_1' id='firstName_1' class='contentEditable' tabindex='1' value='Adam' placeholder='First Name' onChange="showSaveButton(1);" /></td>
				<td class='tdc'>
					<a href='#' onClick="swapNames(1);"><img src='https://supplyRun.teachingstuff.com/images/swap.svg' width='14' height='14' /></a>
				</td>
				<td><input type='text' name='lastName_1' id='lastName_1' class='contentEditable' tabindex='2' value='Anderson' placeholder='Last Name' onChange="showSaveButton(1);" /></td>
				<td>
					<label class='groupsContainer' for='groupName_1'>
						<input type='checkbox' class='groupCheckbox' name='groupName_1' id='groupName_1' data-assigned-groups="2,4,6" onClick="toggleManageGroups();" />
						<ul class='reset groups' id='groups_1'>
							<li>Green Table</li>
							<li>Reading Group 2</li>
							<li>Boys</li>
						</ul>
						<button class='button blue tiny ghosted' onClick="openNameGroupEditor(1);">Edit</button>
					</label>
				</td>
				<td><button id='updateName_1' class='updateName hidden' onClick="saveNameChange(1);">save</button></td>
				<td class='tdc deleteName'><a href='#' id='deleteName_1' class='deleteName' onClick="deleteEditRow(1);">X</a></td>
			</tr>
			<tr>
				<td class='tdr'>2.</td>
				<td><input type='text' id='firstName_2' class='contentEditable' tabindex='3' value='Bryan' placeholder='First Name' onChange="showSaveButton(2);" /></td>
				<td class='tdc'>
					<a href='#' onClick="swapNames(2);"><img src='https://supplyRun.teachingstuff.com/images/swap.svg' width='14' height='14' /></a>
				</td>
				<td><input type='text' id='lastName_2' class='contentEditable' tabindex='4' value='Bundgaard' placeholder='Last Name' onChange="showSaveButton(2);" /></td>
				<td>
					<label class='groupsContainer' for='groupName_2'>
						<input type='checkbox' class='groupCheckbox' name='groupName_2' id='groupName_2' data-assigned-groups="1,4,6" onClick="toggleManageGroups();" />
						<ul class='reset groups' id='groups_2'>
							<li>Orange Table</li>
							<li>Reading Group 2</li>
							<li>Boys</li>
						</ul>
						<button class='button blue tiny ghosted' onClick="openNameGroupEditor(1);">Edit</button>
					</label>
				</td>
				<td><button id='updateName_2' class='updateName hidden' onClick="saveNameChange(2);">save</button></td>
				<td class='tdc deleteName'><a href='#' id='deleteName_2' class='deleteName' onClick="deleteEditRow(2);">X</a></td>
			</tr>
			<tr>
				<td class='tdr'>3.</td>
				<td><input type='text' id='firstName_3' class='contentEditable' tabindex='5' value='Mary' placeholder='First Name' onChange="showSaveButton(3);" /></td>
				<td class='tdc'>
					<a href='#' onClick="swapNames(3);"><img src='https://supplyRun.teachingstuff.com/images/swap.svg' width='14' height='14' /></a>
				</td>
				<td><input type='text' id='lastName_3' class='contentEditable' tabindex='6' value='Anne Walters' placeholder='Last Name' onChange="showSaveButton(3);" /></td>
				<td>
					<label class='groupsContainer' for='groupName_3'>
						<input type='checkbox' class='groupCheckbox' name='groupName_3' id='groupName_3' data-assigned-groups="1,7" onClick="toggleManageGroups();" />
						<ul class='reset groups' id='groups_3'>
							<li>Orange Table</li>
							<li>Girls</li>
						</ul>
						<button class='button blue tiny ghosted' onClick="openNameGroupEditor(1);">Edit</button>
					</label>
				</td>
				<td><button id='updateName_3' class='updateName hidden' onClick="saveNameChange(3);">save</button></td>
				<td class='tdc deleteName'><a href='#' id='deleteName_3' class='deleteName' onClick="deleteEditRow(3);">X</a></td>
			</tr>
			<tr>
				<td class='tdr'>4.</td>
				<td><input type='text' id='firstName_4' class='contentEditable' tabindex='7' value='Cher' placeholder='First Name' onChange="showSaveButton(4);" /></td>
				<td class='tdc'>
					<a href='#' onClick="swapNames(4);"><img src='https://supplyRun.teachingstuff.com/images/swap.svg' width='14' height='14' /></a>
				</td>
				<td><input type='text' id='lastName_4' class='contentEditable' tabindex='8' value='' placeholder='Last Name' onChange="showSaveButton(4);" /></td>
				<td>
					<label class='groupsContainer' for='groupName_4'>
						<input type='checkbox' class='groupCheckbox' name='groupName_4' id='groupName_4' data-assigned-groups="2,3,7" onClick="toggleManageGroups();" />
						<ul class='reset groups' id='groups_4'>
							<li>Green Table</li>
							<li>Reading Group 1</li>
							<li>Girls</li>
						</ul>
						<button class='button blue tiny ghosted' onClick="openNameGroupEditor(1);">Edit</button>
					</label>
				</td>
				<td><button id='updateName_4' class='updateName hidden' onClick="saveNameChange(4);">save</button></td>
				<td class='tdc deleteName'><a href='#' id='deleteName_4' class='deleteName' onClick="deleteEditRow(4);">X</a></td>
			</tr>
			<tr>
				<td class='tdr'>5.</td>
				<td><input type='text' id='firstName_5' class='contentEditable' tabindex='9' value='' placeholder='First Name' onChange="showSaveButton(5);" /></td>
				<td class='tdc'>
					<a href='#' onClick="swapNames(5);"><img src='https://supplyRun.teachingstuff.com/images/swap.svg' width='14' height='14' /></a>
				</td>
				<td><input type='text' id='lastName_5' class='contentEditable' tabindex='10' value='Houdini' placeholder='Last Name' onChange="showSaveButton(5);" /></td>
				<td>
					<label class='groupsContainer' for='groupName_5'>
						<input type='checkbox' class='groupCheckbox' name='groupName_5' id='groupName_5' data-assigned-groups="2,4,6" onClick="toggleManageGroups();" />
						<ul class='reset groups' id='groups_5'>
							<li>Green Table</li>
							<li>Reading Group 2</li>
							<li>Boys</li>
						</ul>
						<button class='button blue tiny ghosted' onClick="openNameGroupEditor(1);">Edit</button>
					</label>
				</td>
				<td><button id='updateName_5' class='updateName hidden' onClick="saveNameChange(5);">save</button></td>
				<td class='tdc deleteName'><a href='#' id='deleteName_5' class='deleteName' onClick="deleteEditRow(5);">X</a></td>
			</tr>
			<tr>
				<td class='tdr'>6.</td>
				<td><input type='text' id='firstName_6' class='contentEditable' tabindex='11' value='' placeholder='First Name' onChange="showSaveButton(6);" /></td>
				<td class='tdc'>
					<a href='#' onClick="swapNames(6);"><img src='https://supplyRun.teachingstuff.com/images/swap.svg' width='14' height='14' /></a>
				</td>
				<td><input type='text' id='lastName_6' class='contentEditable' tabindex='12' value='' placeholder='Last Name' onChange="showSaveButton(6);" /></td>
				<td>
					<label class='groupsContainer' for='groupName_6'>
						<input type='checkbox' class='groupCheckbox' name='groupName_6' id='groupName_6' data-assigned-groups="" onClick="toggleManageGroups();" />
						<ul class='reset groups' id='groups_6'>
						</ul>
						<button class='button blue tiny ghosted' onClick="openNameGroupEditor(1);">Edit</button>
					</label>
				</td>
				<td><button id='updateName_6' class='updateName hidden' onClick="saveNameChange(6);">save</button></td>
				<td class='tdc deleteName'><a href='#' id='deleteName_6' class='deleteName' onClick="deleteEditRow(6);">X</a></td>
			</tr>
			<tr>
				<td class='tdr'>7.</td>
				<td><input type='text' id='firstName_7' class='contentEditable' tabindex='13' value='Moon Mountain' placeholder='First Name' onChange="showSaveButton(7);" /></td>
				<td class='tdc'>
					<a href='#' onClick="swapNames(7);"><img src='https://supplyRun.teachingstuff.com/images/swap.svg' width='14' height='14' /></a>
				</td>
				<td><input type='text' id='lastName_7' class='contentEditable' tabindex='14' value='Room 19' placeholder='Last Name' onChange="showSaveButton(7);" /></td>
				<td>
					<label class='groupsContainer' for='groupName_7'>
						<input type='checkbox' class='groupCheckbox' name='groupName_7' id='groupName_7' data-assigned-groups="" onClick="toggleManageGroups();" />
						<ul class='reset groups' id='groups_7'>
						</ul>
						<button class='button blue tiny ghosted' onClick="openNameGroupEditor(1);">Edit</button>
					</label>
				</td>
				<td><button id='updateName_7' class='updateName hidden' onClick="saveNameChange(7);">save</button></td>
				<td class='tdc deleteName'><a href='#' id='deleteName_7' class='deleteName' onClick="deleteEditRow(7);">X</a></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td></td>
				<td colspan='3'>7 Names</td>
				<td>
					<div>Manage Groups</div>
					<div class='hint'>Select names to assign or remove a group</div>
					<div class='buttonRow hidden' id='manageGroups'>
						<select name="groupSelector" id="groupSelector">
							<option value="">Group...</option>
							<option value="1">Orange Table</option>
							<option value="2">Green Table</option>
							<option value="3">Reading Group 1</option>
							<option value="4">Reading Group 2</option>
							<option value="5">Reading Group 3</option>
							<option value="8">Math Level 1</option>
							<option value="9">Math Level 2</option>
							<option value="6">Boys</option>
							<option value="7">Girls</option>
						</select>
						<button class='button blue tiny' onClick="assignGroupToSelected();">Add</button>
						<button class='button red ghosted' onClick="removeGroupFromSelected();">Remove</button>
					</div>
					<div style='margin: 8px 0;'><a href='groups.php'>Edit Groups</a></div>
				</td>
				<td></td>
				<td class='tdc'><button class='button red ghosted'>Delete All</button></td>
			</tr>
		</tfoot>
	</table>
	<div class='instructions'>Click on any name to edit it.</div>
</form>

<form action='edit.php' id='groupsAssignedEditor' class='groupsAssignedEditor' onSubmit="return false;">
	<h1>Bryan Bundgaard</h1>
	<ul class='reset'>
		<li>
			<input type="checkbox" name='orange_table' id='orange_table' checked />
			<label for="orange_table">Orange Table</label>
		</li>
		<li>
			<input type="checkbox" name='green_table' id='green_table' />
			<label for="green_table">Green Table</label>
		</li>
		<li>
			<input type="checkbox" name='reading_group_1' id='reading_group_1' />
			<label for="reading_group_1">Reading Group 1</label>
		</li>
		<li>
			<input type="checkbox" name='reading_group_2' id='reading_group_2' checked />
			<label for="reading_group_2">Reading Group 2</label>
		</li>
		<li>
			<input type="checkbox" name='reading_group_3' id='reading_group_3' />
			<label for="reading_group_3">Reading Group 3</label>
		</li>
		<li>
			<input type="checkbox" name='boys' id='boys' checked />
			<label for="boys">Boys</label>
		</li>
		<li>
			<input type="checkbox" name='girls' id='girls' />
			<label for="girls">Girls</label>
		</li>
	</ul>

	<div class='buttonRow'>
		<input type='submit' class='button blue' value='Update' onClick="updateNameGroups();" />
		<button class='button red ghosted' onClick="cancelNameGroups();">Cancel</button>
	</div>
	<div>
		<a href="groups.php">Edit Groups</a>
	</div>
</form>



<p>
	<button class='button green large' onClick="goTo('lists.php');">Finished Editing List</button>
</p>


<form action='edit.php' id='addName' class='addName' onSubmit="return false;">
	<fieldset>
		<legend>Add a Name:</legend>
		<div class='inputGroup'>
			<input type='text' name='addFirstName' id='addFirstName' placeholder='First Name' required />
			<label for='addFirstName'>First name</label>
		</div>
		<div>
			<img src='https://supplyRun.teachingstuff.com/images/swap.svg' width='14' height='14' />
		</div>
		<div class='inputGroup'>
			<input type='text' name='addLastName' id='addLastName' placeholder='Last Name' required />
			<label for='addLastName'>Last name</label>
		</div>
	</fieldset>
	<div class='buttonRow'>
		<input type='submit' value='Add' class='button green' onClick="addNewName();" />
		<button class='button red ghosted'>Cancel</button>
	</div>
</form>



<input type='button' value='Delete List' class='button red' />



</article>

<script src='./scripts/js/basicFunctions-min.js'></script>

</body>
</html>