<html>
	<head>
		<title>Create a New List</title>
		<meta name="theme-color" content="#f1fafe">
		<?php require_once("includes/_faviconLinks.php"); ?>
		<link rel="stylesheet" type='text/css' href='styles/css/styles.css' />
		
		<style>
		</style>
	</head>

<body>

<article>
	
<h1>Create a New List</h1>
<p>Create a new list by <strong>importing a text file</strong> or by <strong>copying an existing list</strong>.</p>

<form action='edit.php' class='newList'>
	<fieldset class='listName'>
		<h2>Give Your List a Name</h2>
		<p><input type='text' name='listName' placeholder='List Name' maxlength='64' required /></p>
		<div id='listNameTaken' class='hint'>'FooBar' is already taken.  <a href='' title='Edit list FooBar'>Edit list 'FooBar'</a></div>
	</fieldset>

	<fieldset class='toggleSourceMode'>
		<input type='radio' name='sourceMode' value='import' id='sourceMode_import' class='toggle' checked />
		<label for='sourceMode_import' onClick="toggleSourceMode('import');">Import a File</label>
		<input type='radio' name='sourceMode' value='import' id='sourceMode_copy' class='toggle' />
		<label for='sourceMode_copy' onClick="toggleSourceMode('copy');">Copy a List</label>
	</fieldset>

	<fieldset id='sourceImport' class='sourceImport'>
		<h2>Import a File</h2>
		<ul>
			<li>One name per line</li>
			<li>Limit 100 names per list</li>
			<li>Names only (no other information)</li>
		</ul>
		<p><a href='sampleFile' download='sampleList' title='Download a sample file'>Download a sample file</a></p>
		<p>
			<label for='fileToUpload'>File to Upload:</label>
			<input type='file' name='fileToUpload' id='fileToUpload' data-multiple-caption="{count} files selected" /></p>
		<p>
			<label for='importFormat'>File Format: </label>
			<select name='importFormat' id='importFormat' onChange="updateImportFormat();">
				<option value='comma'>Last, First</option>
				<option value='space'>First Last</option>
			</select>
			<span id='importFormatHint' class='hint importFormatHint'>Last name, a comma, and then first name</span>
		</p>
		<p><input type='submit' value='Import File' class='button green' /></p>
	</fieldset>

	<fieldset id='sourceCopy' class='sourceCopy hidden'>
		<h2>Copy From an Existing List</h2>
		<p>
			<label for='listToCopy'>Choose a list:</label>
			<select name='listToCopy' id='listToCopy'>
				<option value='list_1'>2019 Class List (24 names)</option>
				<option value='list_2'>2020 Field Trip (21 Names)</option>
				<option value='list_3'>Parent Helpers (2 names)</option>
			</select>
		</p>
		<p><input type='submit' value='Copy Names' class='button green' /></p>
	</fieldset>
</form>

<p>
	<a href='lists.php' class='button red ghosted'>Cancel New List</a>
</p>


</article>

<script src='./scripts/js/basicFunctions-min.js'></script>

</body>
</html>