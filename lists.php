<html>
	<head>
		<title>My Lists</title>
		<meta name="theme-color" content="#f1fafe">
		<?php require_once("includes/_faviconLinks.php"); ?>
		<link rel="stylesheet" type='text/css' href='styles/css/styles.css' />
		
		<style>
		</style>
	</head>

<body>
	
<article>

<h1>Almost Done!</h1>
<h2>Choose the List(s) of Names to Print</h2>


<table class='listList' border='0' cellpadding='0' cellspacing='0'>
	<thead>
		<tr>
			<th>List Name</th>
			<th class='tdr'># of Names</th>
			<th class='tdc'>Edit</th>
			<th>Last Modified</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class=''>
				<div class='listName'>
					<input type='checkbox' id='list_1' />
					<label for='list_1'>2019 Class List<br /><span class='hint redText'>Expires in 216 days. <a href=''>Learn why...</a></span></label>
				</div>
			</td>
			<td class='tdr nameQty' data-label='Names'>24</td>
			<td class='tdc editList'><a href='edit.php' class='editList'>edit</a></td>
			<td class='lastModified' data-label='Last Modified'>August 21, 2019</td>
			<td class='tdc deleteList'><a href='' class='deleteList'>X</a></td>
		</tr>
		<tr>
			<td class=''>
				<div class='listName'>
					<input type='checkbox' id='list_2' />
					<label for='list_2'>2020 Class List</label>
				</div>
			</td>
			<td class='tdr nameQty' data-label='Names'>29</td>
			<td class='tdc editList'><a href='edit.php' class='editList'>edit</a></td>
			<td class='lastModified' data-label='Last Modified'>August 24, 2020</td>
			<td class='tdc deleteList'><a href='' class='deleteList'>X</a></td>
		</tr>
		<tr>
			<td class=''>
				<div class='listName'>
					<input type='checkbox' id='list_4' />
					<label for='list_4'>Parent Helpers</label>
				</div>
			</td>
			<td class='tdr nameQty' data-label='Names'>2</td>
			<td class='tdc editList'><a href='edit.php' class='editList'>edit</a></td>
			<td class='lastModified' data-label='Last Modified'>February 3, 2020</td>
			<td class='tdc deleteList'><a href='' class='deleteList'>X</a></td>
		</tr>
		<tr>
			<td class=''>
				<div class='listName'>
					<input type='checkbox' id='list_3' />
					<label for='list_3'>2021 Class List</label>
				</div>
			</td>
			<td class='tdr nameQty' data-label='Names'>23</td>
			<td class='tdc editList'><a href='edit.php' class='editList'>edit</a></td>
			<td class='lastModified' data-label='Last Modified'>August 3, 2021</td>
			<td class='tdc deleteList'><a href='' class='deleteList'>X</a></td>
		</tr>
		<tr>
			<td class=''>
				<div class='listName'>
					<input type='checkbox' id='list_5' />
					<label for='list_5'>After School Chess Club</label>
				</div>
			</td>
			<td class='tdr nameQty' data-label='Names'>12</td>
			<td class='tdc editList'><a href='edit.php' class='editList'>edit</a></td>
			<td class='lastModified' data-label='Last Modified'>March 20, 2021</td>
			<td class='tdc deleteList'><a href='' class='deleteList'>X</a></td>
		</tr>
	</tbody>
</table>
<div class='hint'>You can save 4 more lists.</div>

<p class='buttonRow'>
	<button class='button blue' onClick="goTo('import.php');">Add Another List</button>
</p>

<p class='buttonRow'>
	<button class='button green large' onClick="goTo('names.php');">Continue</button>
</p>



</article>

<script src='./scripts/js/basicFunctions-min.js'></script>

</body>
</html>