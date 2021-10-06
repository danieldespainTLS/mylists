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

<h1>Lists '2021 Boys' & '2021 Girls'</h1>

<p><a href='lists.php' class='blueLink'>Choose a different list</a></p>

<hr />

<p>Choose the names to print on the certificates</p>

<div class='buttonRow'>
	<button class='button blue' onClick="selectAll();">Select All</button>
	<button class='button red ghosted' onClick="deselectAll();">Deselect all</button>
</div>

<ul id='listOfNames' class='nameList firstLast'>
	<li class='nameRow'>
		<input type='checkbox' id='name_1' class='nameCheckbox' />
		<label class='name' for='name_1'>
			<span class='firstName'>Adam</span>
			<span class='lastName'>Anderson</span>
		</label>
		<div class='icon'>icon</div>
	</li>

	<li class='nameRow'>
		<input type='checkbox' id='name_2' class='nameCheckbox' />
		<label class='name' for='name_2'>
			<span class='firstName'>Bryan</span>
			<span class='lastName'>Bundgaard</span>
		</label>
		<div class='icon'>icon</div>
	</li>
	
	<li class='nameRow'>
		<input type='checkbox' id='name_3' class='nameCheckbox' />
		<label class='name' for='name_3'>
			<span class='firstName'>Mary Anne</span>
			<span class='lastName'>Walters</span>
		</label>
		<div class='icon'>icon</div>
	</li>

	<li class='nameRow'>
		<input type='checkbox' id='name_4' class='nameCheckbox' />
		<label class='name' for='name_4'>
			<span class='firstName'>Cher</span>
			<span class='lastName'></span>
		</label>
		<div class='icon'>icon</div>
	</li>
	
	<li class='nameRow'>
		<input type='checkbox' id='name_5' class='nameCheckbox' />
		<label class='name' for='name_5'>
			<span class='firstName'></span>
			<span class='lastName'>Houdini</span>
		</label>
		<div class='icon'>icon</div>
	</li>
	
	<li class='nameRow'>
		<input type='checkbox' id='name_6' class='nameCheckbox' />
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
	<button class='button green' onClick="goTo('buy.php');">Continue</button> 
	<button class='button blue ghosted' onClick="goTo('edit.php');">Edit These Names</button>
</p>



</article>

<script src='./scripts/js/basicFunctions-min.js'></script>

</body>
</html>