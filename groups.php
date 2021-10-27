<html>
	<head>
		<title>Groups</title>
		<meta name="theme-color" content="#f1fafe">
		<?php require_once("includes/_faviconLinks.php"); ?>
		<link rel="stylesheet" type='text/css' href='styles/css/styles.css' />
		
		<style>
		</style>
	</head>

<body>
	

<article>

<h1>Groups</h1>


<p>You can assign multiple groups to each name on your list, 
	so "Alex" can be assigned to <strong>Reading Group 1</strong> <em>and</em> <strong>Walks Home</strong> <em>and</em> <strong>Orange Table</strong>.</p>
	
<p>The groups you create here are <strong>available for every list</strong> in your account.</p>


<ul class='reset groupsList' id='groupsList'>
	<li>
		<div class='handle'>drag<br />to sort</div>
		<h2>Orange Table</h2>
		<div><button class='button red ghosted'>Delete</button></div>
	</li>
	<li>
		<div class='handle'>drag<br />to sort</div>
		<h2>Green Table</h2>
		<div><button class='button red ghosted'>Delete</button></div>
	</li>
	<li>
		<div class='handle'>drag<br />to sort</div>
		<h2>Reading Group 1</h2>
		<div><button class='button red ghosted'>Delete</button></div>
	</li>
	<li>
		<div class='handle'>drag<br />to sort</div>
		<h2>Reading Group 2</h2>
		<div><button class='button red ghosted'>Delete</button></div>
	</li>
	<li>
		<div class='handle'>drag<br />to sort</div>
		<h2>Reading Group 3</h2>
		<div><button class='button red ghosted'>Delete</button></div>
	</li>
	<li>
		<div class='handle'>drag<br />to sort</div>
		<h2>Math Level 1</h2>
		<div><button class='button red ghosted'>Delete</button></div>
	</li>
	<li>
		<div class='handle'>drag<br />to sort</div>
		<h2>Math Level 2</h2>
		<div><button class='button red ghosted'>Delete</button></div>
	</li>
	<li>
		<div class='handle'>drag<br />to sort</div>
		<h2>Boys</h2>
		<div><button class='button red ghosted'>Delete</button></div>
	</li>
	<li>
		<div class='handle'>drag<br />to sort</div>
		<h2>Girls</h2>
		<div><button class='button red ghosted'>Delete</button></div>
	</li>
</ul>

<form action="groups.php" class='addGroup' onSubmit='return false;'>
	<fieldset>
		<legend>Add a Group:</legend>
		<div class='inputGroup'>
			<input type='text' name='addGroup' id='addGroup' placeholder='Group Name' required />
			<label for='addGroup'>Group Name</label>
		</div>
	</fieldset>
	<p>You can create 13 more groups</p>
	<div class='buttonRow'>
		<input type='submit' value='Add' class='button green' onClick="addNewGroup();" />
		<button class='button red ghosted'>Cancel</button>
	</div>
</form>

<p>You can <strong>create up to 20 groups</strong>.  Here are some ideas to get you started:</p>

<ul>
	<li>Reading Group 1</li>
	<li>Reading Group 2</li>
	<li>Reading Group 3</li>
</ul>
<ul>
	<li>Travel: Bus</li>
	<li>Travel: Parent</li>
	<li>Travel: Walk</li>
</ul>
<ul>
	<li>Red Table</li>
	<li>Blue Table</li>
</ul>

<p>
	<button class='button green large' onClick="goTo('edit.php');">Finished Editing Groups</button>
</p>


</article>

<script src='./scripts/js/basicFunctions-min.js'></script>

</body>
</html>