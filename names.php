<html>
	<head>
		<title>Names on List XYZ</title>
		<meta name="theme-color" content="#f1fafe">
		<?php require_once("includes/_faviconLinks.php"); ?>
		<link rel="stylesheet" type='text/css' href='styles/css/styles.css' />
		
		<style>
		</style>
	</head>

<body>
	

<article>

<h1>Lists '2021 Class List' & 'After School Chess Club'</h1>

<p><a href='lists.php' class='blueLink'>Choose a different list</a></p>

<hr />

<p>Choose the names to print on the certificates</p>

<div class='buttonRow'>
	<button class='button blue' onClick="selectAll();">Select All</button>
	<button class='button red ghosted' onClick="deselectAll();">Deselect all</button>
</div>

<div class='selectByGroup'>
	Select by Group: 
	<select name='selectByGroup' id='selectByGroup'>
		<option value="">Group...</option>
		<option value="1">Orange Table</option>
		<option value="2">Green Table</option>
		<option value="3">Reading Group 1</option>
		<option value="4">Reading Group 2</option>
		<option value="5">Reading Group 3</option>
		<option value="6">Boys</option>
		<option value="7">Girls</option>
	</select>
	<button class='button blue' onClick="setNamesByGroup('nameCheckbox', false);">Add to Current Selection</button>
	<button class='button blue ghosted' onClick="setNamesByGroup('nameCheckbox', true);">Replace Current Selection</button>
</div>

<ul id='listOfNames' class='nameList firstLast'>
	<li class='nameRow'>
		<input type='checkbox' id='name_1' class='nameCheckbox' data-assigned-groups="2,4,6" />
		<label class='name' for='name_1'>
			<span class='firstName'>Adam</span>
			<span class='lastName'>Anderson</span>
		</label>
		<div class='icon'>icon</div>
	</li>

	<li class='nameRow'>
		<input type='checkbox' id='name_2' class='nameCheckbox' data-assigned-groups="1,4,6" />
		<label class='name' for='name_2'>
			<span class='firstName'>Bryan</span>
			<span class='lastName'>Bundgaard</span>
		</label>
		<div class='icon'>icon</div>
	</li>
	
	<li class='nameRow'>
		<input type='checkbox' id='name_3' class='nameCheckbox' data-assigned-groups="1,7" />
		<label class='name' for='name_3'>
			<span class='firstName'>Mary Anne</span>
			<span class='lastName'>Walters</span>
		</label>
		<div class='icon'>icon</div>
	</li>

	<li class='nameRow'>
		<input type='checkbox' id='name_4' class='nameCheckbox' data-assigned-groups="2,3,7" />
		<label class='name' for='name_4'>
			<span class='firstName'>Cher</span>
			<span class='lastName'></span>
		</label>
		<div class='icon'>icon</div>
	</li>
	
	<li class='nameRow'>
		<input type='checkbox' id='name_5' class='nameCheckbox' data-assigned-groups="2,4,6" />
		<label class='name' for='name_5'>
			<span class='firstName'></span>
			<span class='lastName'>Houdini</span>
		</label>
		<div class='icon'>icon</div>
	</li>
	
	<li class='nameRow'>
		<input type='checkbox' id='name_6' class='nameCheckbox' data-assigned-groups="" />
		<label class='name' for='name_6'>
			<span class='firstName'></span>
			<span class='lastName'></span>
		</label>
		<div class='icon'>icon</div>
	</li>
</ul>

<p>
	Choose a format:

<select name="nameOrder" id="nameOrder" onChange="changeNameOrder();">
	<option value="firstLast">First Last</option>
	<option value="firstInitial">F. Last</option>
	<option value="lastInitial">First L.</option>
	<option value="lastCommaFirst">Last, First</option>
	<option value="firstOnly">First only</option>
	<option value="lastOnly">Last only</option>
</select>
</p>

<p>
	<button class='button green large' onClick="goTo('buy.php');">Continue</button> 
	<button class='button blue ghosted' onClick="goTo('edit.php');">Edit These Names</button>
</p>



</article>

<script src='./scripts/js/basicFunctions-min.js'></script>

</body>
</html>