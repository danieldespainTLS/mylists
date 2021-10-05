<!DOCTYPE html>

<html>
	<head>
		<title>Tables Style Guide</title>
		
		<meta name='viewport' content='width=device-width'>
		
		<link rel='stylesheet' type='text/css' href='/styles/css/styles.css' />

		<style type='text/css'>
			article, .article {
				margin: 1rem;
				text-align: left;
			}
		</style>
		
		<script type='text/javascript'>
		</script>
		
	</head>


<body>

<article class='article'>
	<h1>Tables</h1>
	
	<p>Tables should be consistently styled across the site.  Use of the CSS class <strong><code>listing</code></strong> accomplishes this goal.</p>
	
	<h2>Including the tableListing stylesheet</h2>
	
	<figure>
		<figcaption>Include the tableListing stylesheet:</figcaption>
		<code><pre>&lt;link rel='stylesheet' type='text/css' href='/styles/css/tableListing.css' /&gt;</pre></code>
	</figure>
	
	
	
	<hr />
	
	<h2>Removing a row from a table <code style='color: blue;'>(javascript)</code></h2>
	
	<figure>
		<figcaption>Call this javascript to remove a row from a table</figcaption>
		<code><pre>var listTable	= document.getElementById('somethingTable');
var listRow		= document.getElementById('prefix_' + myIdentifier);
var r			= listRow.rowIndex;
listTable.deleteRow(r);</pre></code>
	</figure>
	
	
	
	
	<hr />
	<p>Standard table with <code>&lt;thead&gt;</code>, <code>&lt;tbody&gt;</code> and <code>&lt;tfoot&gt;</code> sections.</p>
	
	<p>Alignment comes from classes <code>tdl</code>, <code>tdc</code>, and <code>tdr</code>.</p>
	
	<p>Vertical alignment comes from classes <code>top</code>, <code>middle</code>, and <code>bottom</code>.  
	Default vertical alignment is middle (determined by browser).</p>
	
	<table border='1' cellpadding='0' cellspacing='0' class='listing' style='margin: 1em 0;'>
		<thead class='sticky'>
			<tr>
				<th colspan='4' class='tdc'>Standard Table with 3 Columns & colspans</th>
			</tr>
			<tr>
				<th class='tdl'><a href='#'>Column</a></th>
				<th class='thl'>tdl</th>
				<th class='thc'>tdc</th>
				<th class='thr'>tdr</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Table Data</td>
				<td class='tdl'>Left Align</td>
				<td class='tdc'>Center Align</td>
				<td class='tdr'>Right Align</td>
			</tr>
			<tr>
				<td>Column 1</td>
				<td class='tdl'>Left</td>
				<td class='tdc'>Center</td>
				<td class='tdr'>Right</td>
			</tr>
			<tr>
				<td>First Column</td>
				<td class='tdl'>Information</td>
				<td class='tdc'>Data</td>
				<td class='tdr'>3.14</td>
			</tr>
			<tr>
				<td><br /><span style='white-space: nowrap;'>vertical-alignment</span><br />classes<br />&nbsp;</td>
				<td class='tdl top'>top</td>
				<td class='tdc middle'>middle</td>
				<td class='tdr bottom'>bottom</td>
			</tr>
			<tr>
				<td>Last Row</td>
				<td class='tdl'>2</td>
				<td class='tdc'>Entry</td>
				<td class='tdr'>.14</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td>Pre Sum</td>
				<td class='tdl'>Pre Sum</td>
				<td class='tdc'>Pre Sum</td>
				<td class='tdr'>Pre Sum</td>
			</tr>
			<tr>
				<td colspan='2' class='tdl'>Sum</td>
				<td colspan='2' class='tdr'>Sum</td>
			</tr>
		</tfoot>
	</table>
	
	
	
	
	
	<hr />
	
	<p>Multiple <code>&lt;tbody&gt;</code> sections.</p>
	
	<p>Notice that the zebra striping resets with each new <code>&lt;tbody&gt;</code> section.  
	This is a function of the browser, and can't be solved with CSS.</p>
	
	<table border='1' cellpadding='0' cellspacing='0' class='listing' style='margin: 1em 0;'>
		<thead>
			<tr>
				<th colspan='4' class='tdc'>Table with Multiple Body Sections</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class='tdl'>Left Column</td>
				<td class='tdl'>Column number 2</td>
				<td class='tdc'>Column 3</td>
				<td class='tdr'>143.62</td>
			</tr>
			<tr>
				<td class='tdl'>Column 1</td>
				<td class='tdl'>Column 2</td>
				<td class='tdc'>Data</td>
				<td class='tdr'>2,684.12</td>
			</tr>
			<tr>
				<td class='tdl'>Uno</td>
				<td class='tdl'>Two</td>
				<td class='tdc'>Three</td>
				<td class='tdr'>721.53</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th class='tdl'>One Column</th>
				<td class='tdl'>Second Column</td>
				<td class='tdc'>Center</td>
				<td class='tdr'>3.14</td>
			</tr>
			<tr>
				<th class='tdl'>Last Row</th>
				<td class='tdl'>2</td>
				<td class='tdc'>Entry</td>
				<td class='tdr'>.14</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th class='tdl'>Any Column</th>
				<td class='tdl'>Next Column</td>
				<td class='tdc'>In the middle</td>
				<td class='tdr'>4.15</td>
			</tr>
			<tr>
				<th class='tdl'>Final Row</th>
				<td class='tdl'>4</td>
				<td class='tdc'>Output</td>
				<td class='tdr'>11, 29, 1</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td class='tdl'>Sum</td>
				<td class='tdl'>Sum</td>
				<td class='tdc'>Sum</td>
				<td class='tdr'>Sum</td>
			</tr>
		</tfoot>
	</table>
	
	
	
	
	
	<hr />
	
	<p>Add the class <code>wideGutter</code> to make gutters wider (useful for tight columns with numbers next to each other</p>
	
	<table width='75%' border='0' cellpadding='0' cellspacing='0' class='listing wideGutter' style='margin: 1em 0;'>
		<thead>
			<tr>
				<th colspan='4'>Wide Gutters</th>
			</tr>
			<tr>
				<th class='thl'><a href='#'>Style</a></th>
				<th class='thc'>OH</th>
				<th class='thr'>OO</th>
				<th class='thr'>YTD</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>2135</td>
				<td class='tdc'>20</td>
				<td class='tdr'>0</td>
				<td class='tdr'>24</td>
			</tr>
			<tr>
				<td>2136</td>
				<td class='tdc'>13</td>
				<td class='tdr'>16</td>
				<td class='tdr'>11</td>
			</tr>
			<tr>
				<td>2137</td>
				<td class='tdc'>12</td>
				<td class='tdr'>12</td>
				<td class='tdr'>24</td>
			</tr>
			<tr>
				<td>2138</td>
				<td class='tdc'>29</td>
				<td class='tdr'>10</td>
				<td class='tdr'>38</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td class='tdl'></td>
				<td class='tdc'>14</td>
				<td class='tdr'>29</td>
				<td class='tdr'>19</td>
			</tr>
		</tfoot>
	</table>
	
	<p>By comparison, here is the same table without the <code>wideGutter</code> class.</p>
	
	<table width='75%' border='0' cellpadding='0' cellspacing='0' class='listing' style='margin: 1em 0;'>
		<thead>
			<tr>
				<th colspan='4'>Wide Gutters</th>
			</tr>
			<tr>
				<th class='thl'><a href='#'>Style</a></th>
				<th class='thc'>OH</th>
				<th class='thr'>OO</th>
				<th class='thr'>YTD</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>2135</td>
				<td class='tdc'>20</td>
				<td class='tdr'>0</td>
				<td class='tdr'>24</td>
			</tr>
			<tr>
				<td>2136</td>
				<td class='tdc'>13</td>
				<td class='tdr'>16</td>
				<td class='tdr'>11</td>
			</tr>
			<tr>
				<td>2137</td>
				<td class='tdc'>12</td>
				<td class='tdr'>12</td>
				<td class='tdr'>24</td>
			</tr>
			<tr>
				<td>2138</td>
				<td class='tdc'>29</td>
				<td class='tdr'>10</td>
				<td class='tdr'>38</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td class='tdl'></td>
				<td class='tdc'>14</td>
				<td class='tdr'>29</td>
				<td class='tdr'>19</td>
			</tr>
		</tfoot>
	</table>
	
	
	
	
	
	<hr />
	
	<p>Vertical padding can be achieved by applying the <code>padded</code> class to any <code>&lt;tr&gt;</code> element.</p>
	
	<blockquote>
		<p>The <code>padded</code> class is best used in combination with <code>bodyGroupHead</code> and <code>bodyGroupFoot</code> classes described below.</p>
	</blockquote>
	
	<div class='clearFloat'></div>
	
	<table width='75%' border='0' cellpadding='0' cellspacing='0' class='listing' style='margin: 1em 0;'>
		<thead>
			<tr>
				<th colspan='4'>Padded (vertically)</th>
			</tr>
		</thead>
		<tbody>
			<tr class='padded'>
				<td colspan='4'>Puppets</td>
			</tr>
			<tr>
				<td>T-Rex</td>
				<td class='tdc'>20</td>
				<td class='tdr'>0</td>
				<td class='tdr'>24</td>
			</tr>
			<tr>
				<td>Hedge Hog <a href='#' class='changeLink' style='color: green;'>&plus;</a> <a href='#' class='changeLink' style='color: red;'>&ndash;</a></td>
				<td class='tdc'>13</td>
				<td class='tdr'>16</td>
				<td class='tdr'>11</td>
			</tr>
			<tr>
				<td>Dogcatcher <a href='#' class='changeLink' style='color: green;'>&plus;</a> <a href='#' class='changeLink' style='color: red;'>&ndash;</a></td>
				<td class='tdc'>12</td>
				<td class='tdr'>12</td>
				<td class='tdr'>24</td>
			</tr>
			<tr class='padded'>
				<td colspan='4'>Games</td>
			</tr>
			<tr>
				<td>Tac-Dex <a href='#' class='changeLink' style='color: green;'>&plus;</a> <a href='#' class='changeLink' style='color: red;'>&ndash;</a></td>
				<td class='tdc'>29</td>
				<td class='tdr'>10</td>
				<td class='tdr'>38</td>
			</tr>
			<tr>
				<td>Ratuki <a href='#' class='changeLink' style='color: green;'>&plus;</a> <a href='#' class='changeLink' style='color: red;'>&ndash;</a></td>
				<td class='tdc'>29</td>
				<td class='tdr'>10</td>
				<td class='tdr'>38</td>
			</tr>
		</tbody>
		<tfoot>
			<tr class='padded'>
				<td class='tdl'></td>
				<td class='tdc'></td>
				<td class='tdr'>Total:</td>
				<td class='tdr'>19</td>
			</tr>
		</tfoot>
	</table>
	
	
	
	
	
	<hr />
	
	<p>This table has a full grid between cells by applying the <code>grid</code> class to the <code>&lt;table&gt;</code> element.</p>
	
	<p>Standard rowspans, colspans, and notes are also demonstrated.</p>
	
	<p>Apply the <code>notes</code> class to the <code>&lt;tr&gt;</code> element.  
	notes rows must be inside <code>&lt;tbody&gt;</code> (not inside <code>&lt;tfoot&gt;</code>)</p></p>
	
	<table class='listing grid' style='margin-bottom: 1em;'>
		<thead>
			<tr>
				<th colspan='2' class='tdc'>Properties</th>
				<th rowspan='2' class='tdc'>Style</th>
				<th rowspan='2' class='tdr'>Price</th>
			</tr>
			<tr>
				<th class='tdl'>Old</th>
				<th class='tdl'>New</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class='tdl'>Regular</td>
				<td class='tdl'>Rows</td>
				<td class='tdc'>Default Zebra Stripes</td>
				<td class='tdr'>12.99</td>
			</tr>
			<tr>
				<td class='tdl'>Regular</td>
				<td class='tdl'>Rows</td>
				<td class='tdc'>Default Zebra Stripes</td>
				<td class='tdr'>12.99</td>
			</tr>
			<tr>
				<td class='tdl'>Regular</td>
				<td class='tdl'>Rows</td>
				<td class='tdc'>Default Zebra Stripes</td>
				<td class='tdr'>12.99</td>
			</tr>
			<tr class='notes'>
				<td colspan='4'>Nested as a row within the tbody along with content rows:<br />Some fun notes!</td>
			</tr>
		</tbody>
		<tbody>
			<tr class='notes'>
				<td colspan='4'>Unique tbody: Here are some notes related to this table of data.<br />Oh joy!</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan='2' class='tdl'></td>
				<td class='tdc'>Assorted</td>
				<td class='tdr'>$123.45</td>
			</tr>
		</tfoot>
	</table>	
	
	
	
	
	
	<hr />
	
	<p>Borders can be manually removed as desired.</p>
	
	<ul>
		<li>Generally, column borders are applied to the right of each <code>&lt;td&gt;</code>.</li>
		<li>Generally, row borders are applied to the top of each <code>&lt;tr&gt;</code>.</li>
	</ul>
	
	<p>Apply the following classes as needed:</p>
	
	<ul>
		<li><code>borderLeft</code></li>
		<li><code>borderRight</code></li>
		<li><code>noBorderLeft</code></li>
		<li><code>noBorderRight</code></li>
		<li><code>noBorderTop</code></li>
	</ul>
	
	<blockquote>
		<p>There is not a <code>borderTop</code> class because it is always present on rows without a specific class.  
		Remove the top border <strong>from the row</strong> if desired.</p>
	</blockquote>
	<div class='clearFloat'></div>
	
	<table class='listing grid wideGutter' style='margin-bottom: 1em;'>
		<thead>
			<tr>
				<th colspan='2' class='tdc'>Properties</th>
				<th rowspan='2' class='tdc'>Style</th>
				<th rowspan='2' class='tdr'>Price</th>
			</tr>
			<tr class='nobordertop'>
				<th class='tdl'>Old</th>
				<th class='tdl'>New</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class='tdl noBorderRight'>Regular</td>
				<td class='tdl noBorderRight'>Rows</td>
				<td class='tdc noBorderRight'>Default Zebra Stripes</td>
				<td class='tdr'>12.99</td>
			</tr>
			<tr>
				<td class='tdl noBorderRight'>Regular</td>
				<td class='tdl noBorderRight'>Rows</td>
				<td class='tdc noBorderRight'>Default Zebra Stripes</td>
				<td class='tdr'>12.99</td>
			</tr>
			<tr>
				<td class='tdl'>Regular</td>
				<td class='tdl'>Rows</td>
				<td class='tdc'>Default Zebra Stripes</td>
				<td class='tdr'>12.99</td>
			</tr>
			<tr>
				<td class='tdl'>Regular</td>
				<td class='tdl'>Rows</td>
				<td class='tdc'>Default Zebra Stripes</td>
				<td class='tdr'>12.99</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan='2' class='tdl noBorderRight'></td>
				<td class='tdc'>Assorted</td>
				<td class='tdr'>$123.45</td>
			</tr>
		</tfoot>
	</table>
	
	
	<p>Borders can be added manually too.  
	<em>The border above "old" and "new" was not added.  It is a foundational CSS setting in <code>tableListing.css</code> applied to all rows.</em></p>
	
	<table class='listing wideGutter' style='margin-bottom: 1em;'>
		<thead>
			<tr>
				<th colspan='2' class='tdc'>Properties</th>
				<th rowspan='2' class='tdc borderLeft'>Style</th>
				<th rowspan='2' class='tdr'>Price</th>
			</tr>
			<tr>
				<th class='tdl'>Old</th>
				<th class='tdl'>New</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class='tdl'>Regular</td>
				<td class='tdl'>Rows</td>
				<td class='tdc borderLeft borderRight'>Default Zebra Stripes</td>
				<td class='tdr'>12.99</td>
			</tr>
			<tr>
				<td class='tdl'>Regular</td>
				<td class='tdl'>Rows</td>
				<td class='tdc borderLeft borderRight'>Default Zebra Stripes</td>
				<td class='tdr'>12.99</td>
			</tr>
			<tr>
				<td class='tdl'>Regular</td>
				<td class='tdl'>Rows</td>
				<td class='tdc borderLeft borderRight'>Default Zebra Stripes</td>
				<td class='tdr'>12.99</td>
			</tr>
			<tr>
				<td class='tdl'>Regular</td>
				<td class='tdl'>Rows</td>
				<td class='tdc borderLeft borderRight'>Default Zebra Stripes</td>
				<td class='tdr'>12.99</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan='2' class='tdl'></td>
				<td class='tdc borderRight'>Assorted</td>
				<td class='tdr'>$123.45</td>
			</tr>
		</tfoot>
	</table>
	
	
	
	
	
	<hr />
	
	<p>Zebra stripe classes are:</p>
	
	<ul>
		<li>default: no class declaration (pale green)</li>
		<li><code>noRow</code> (pink)</li>
		<li><code>voidRow</code> (faded grey)</li>
		<li><code>yesRow</code> (green)</li>
		<li><code>partialRow</code> (amber)</li>
		<li><code>overRow</code> (purple)</li>
		<li><code>disableHighlight</code> (default pale green, with no highlight)</li>
	</ul>
	
	<p>Apply the desired class to the <code>&lt;tr&gt;</code> element.</p>
	
	<p>On default zebra stripe rows, highlighting can be disabled by applying the class <code>disableHighlight</code> to the <code>&lt;tr&gt;</code> element.  
	Highlighting can not be disabled on colored rows.</p>
	
	<h2><a href='tablesZebra.php'>See all zebra stripes</a></h2>
	
	<table class='listing grid wideGutter' style='margin-bottom: 1em;'>
		<thead class='sticky'>
			<tr>
				<th colspan='2' class='tdc'>Properties</th>
				<th class='tdc'>Style</th>
				<th class='tdr'>Price</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class='tdl'>Regular</td>
				<td class='tdl'>Rows</td>
				<td class='tdc'>Default Zebra Stripes</td>
				<td class='tdr'>12.99</td>
			</tr>
			<tr>
				<td class='tdl'>Regular</td>
				<td class='tdl'>Rows</td>
				<td class='tdc'>Default Zebra Stripes</td>
				<td class='tdr'>12.99</td>
			</tr>
			<tr class='noRow'>
				<td class='tdl'>noRow</td>
				<td class='tdl'>Rows</td>
				<td class='tdc'>Pink Zebra Stripes & Red Text</td>
				<td class='tdr'>-9.99</td>
			</tr>
			<tr class='noRow'>
				<td class='tdl'>noRow</td>
				<td class='tdl'>Rows</td>
				<td class='tdc'>Pink Zebra Stripes & Red Text</td>
				<td class='tdr'>-3.49</td>
			</tr>
			<tr class='voidRow'>
				<td class='tdl'>voidRow</td>
				<td class='tdl'>Rows</td>
				<td class='tdc'>Faded grey</td>
				<td class='tdr'>0</td>
			</tr>
			<tr class='voidRow'>
				<td class='tdl'>voidRow</td>
				<td class='tdl'>Rows</td>
				<td class='tdc'>Faded grey</td>
				<td class='tdr'>0</td>
			</tr>
			<tr class='overRow'>
				<td class='tdl'>Violet Rows</td>
				<td class='tdl'>Violet Zebra Stripes</td>
				<td class='tdc'>Violet Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr class='overRow'>
				<td class='tdl'>Violet Rows</td>
				<td class='tdl'>Violet Zebra Stripes</td>
				<td class='tdc'>Violet Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr class='overRow'>
				<td class='tdl'>Violet Rows</td>
				<td class='tdl'>Violet Zebra Stripes</td>
				<td class='tdc'>Violet Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr class='overRow'>
				<td class='tdl'>Violet Rows</td>
				<td class='tdl'>Violet Zebra Stripes</td>
				<td class='tdc'>Violet Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr>
				<td class='tdl'>Regular Rows</td>
				<td class='tdl'>Compare to Regular</td>
				<td class='tdc'>Nothing special</td>
				<td class='tdr'>79.99</td>
			</tr>
			<tr class='yesRow'>
				<td class='tdl'>Green Rows</td>
				<td class='tdl'>Green Zebra Stripes</td>
				<td class='tdc'>Green Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr class='yesRow'>
				<td class='tdl'>Green Rows</td>
				<td class='tdl'>Green Zebra Stripes</td>
				<td class='tdc'>Green Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr class='yesRow'>
				<td class='tdl'>Green Rows</td>
				<td class='tdl'>Green Zebra Stripes</td>
				<td class='tdc'>Green Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr class='yesRow'>
				<td class='tdl'>Green Rows</td>
				<td class='tdl'>Green Zebra Stripes</td>
				<td class='tdc'>Green Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr>
				<td class='tdl'>Regular Rows</td>
				<td class='tdl'>Compare to Regular</td>
				<td class='tdc'>Nothing special</td>
				<td class='tdr'>79.99</td>
			</tr>
			<tr class='partialRow'>
				<td class='tdl'>Amber Rows</td>
				<td class='tdl'>Amber Zebra Stripes</td>
				<td class='tdc'>Amber Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr class='partialRow'>
				<td class='tdl'>Amber Rows</td>
				<td class='tdl'>Amber Zebra Stripes</td>
				<td class='tdc'>Amber Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr class='partialRow'>
				<td class='tdl'>Amber Rows</td>
				<td class='tdl'>Amber Zebra Stripes</td>
				<td class='tdc'>Amber Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr class='partialRow'>
				<td class='tdl'>Amber Rows</td>
				<td class='tdl'>Amber Zebra Stripes</td>
				<td class='tdc'>Amber Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr>
				<td class='tdl'>Regular Rows</td>
				<td class='tdl'>Compare to Regular</td>
				<td class='tdc'>Nothing special</td>
				<td class='tdr'>79.99</td>
			</tr>
			<tr class='noRow'>
				<td class='tdl'>Pink Rows</td>
				<td class='tdl'>Pink Zebra Stripes</td>
				<td class='tdc'>Pink Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr class='noRow'>
				<td class='tdl'>Pink Rows</td>
				<td class='tdl'>Pink Zebra Stripes</td>
				<td class='tdc'>Pink Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr class='noRow'>
				<td class='tdl'>Pink Rows</td>
				<td class='tdl'>Pink Zebra Stripes</td>
				<td class='tdc'>Pink Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr class='noRow'>
				<td class='tdl'>Pink Rows</td>
				<td class='tdl'>Pink Zebra Stripes</td>
				<td class='tdc'>Pink Row special highlight</td>
				<td class='tdr'>3.50</td>
			</tr>
			<tr>
				<td class='tdl'>Regular Rows</td>
				<td class='tdl'>Compare to Regular</td>
				<td class='tdc'>Nothing special</td>
				<td class='tdr'>79.99</td>
			</tr>
			<tr class='disableHighlight'>
				<td class='tdl'>Disabled Highlight</td>
				<td class='tdl'>Hover</td>
				<td class='tdc'>has no effect</td>
				<td class='tdr'>1.00</td>
			</tr>
			<tr class='disableHighlight'>
				<td class='tdl'>Disabled Highlight</td>
				<td class='tdl'>Hover</td>
				<td class='tdc'>has no effect</td>
				<td class='tdr'>1.00</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan='2' class='tdl noBorderRight'></td>
				<td class='tdc'>Assorted</td>
				<td class='tdr'>$123.45</td>
			</tr>
		</tfoot>
	</table>	
	
	
	
	
	
	<hr />
	
	<p>This table has faux head and foot <strong>rows</strong> for each <code>&lt;tbody&gt;</code> group.  
	In this example, there is a <code>&lt;tbody&gt;</code> section for each school.</p>
	
	<figure>
		<figcaption>Create faux head and footer rows within <code>&lt;tbody&gt;</code></figcaption>
		<code><pre>&lt;tbody&gt;
	&lt;tr class='bodyGroupHead'&gt;
		&lt;td colspan='5'&gt;Mountain School&lt;/td&gt;
	&lt;/tr&gt;
	...
	&lt;tr class='bodyGroupFoot'&gt;
		&lt;td colspan='5'&gt;Total Due&lt;/td&gt;
	&lt;/tr&gt;
&lt;/tbody&gt;</pre></code>
	</figure>
	
	<p>Additionally, each row has faux head <code>&lt;th&gt;</code> and foot <code>&lt;class='rfoot'&gt;</code> <strong>columns</strong>.  
	In this example, the date is highlighted as a row heading, and the balance is highlighted as a row footer.</p>
	
	<figure>
		<figcaption>Create a faux head column with <code>&lt;th&gt;</code> <em>(instead of <code>&lt;td&gt;</code>)</em><br />
		Or assign class <strong>rhead</strong> to a td <code>&lt;td class='rhead'&gt;</code></figcaption>
		<figcaption>Create a faux footer column with <code>&lt;td class='rfoot'&gt;</code></figcaption>
		<code><pre>&lt;tr&gt;
	&lt;th&gt;faux heading column&lt;/th&gt;
	&lt;td&gt;normal&lt;/td&gt;
	&lt;td&gt;normal&lt;/td&gt;
	&lt;td class='rfoot'&gt;faux foot column&lt;/td&gt;
&lt;/tr&gt;</pre></code>
	</figure>
	
	<div class='clearFloat'></div>
	
	<p>* Highlighting has been disabled on the first row to show that <code>disableHighlight</code> works with faux head and foot columns.</p>
	
	<p>Padding has been applied to <code>bodyGroupHead</code> and <code>bodyGroupFoot</code> rows in this example.</p>
	
	<table class='listing' style='margin: 1em 0;'>
		<thead>
			<tr>
				<th>Date</th>
				<th class='tdc'>CU #</th>
				<th class='tdc'>Invoice</th>
				<th class='tdr'>Amount</th>
				<th class='tdr'>Balance</th>
			</tr>
		</thead>
		<tbody>
			<tr class='bodyGroupHead padded'>
				<td colspan='5'>The PEAK School</td>
			</tr>
			<tr class='disableHighlight'>
				<th class='tdr'>* 1-Oct-2013</th>
				<td class='tdc'>1</td>
				<td class='tdc'>100</td>
				<td class='tdr'>12.34</td>
				<td class='tdr rfoot'>12.34</td>
			</tr>
			<tr>
				<th class='tdr'>16-Oct-2013</th>
				<td class='tdc'>2</td>
				<td class='tdc'>300</td>
				<td class='tdr'>135.79</td>
				<td class='tdr rfoot'>148.79</td>
			</tr>
			<tr>
				<th class='tdr'>18-Oct-2013</th>
				<td class='tdc'>3</td>
				<td class='tdc'>400</td>
				<td class='tdr'>246.80</td>
				<td class='tdr rfoot'>394.93</td>
			</tr>
			<tr class='bodyGroupFoot padded'>
				<td colspan='5' class='tdr'><strong>$394.93</strong></td>
			</tr>
		</tbody>
		<tbody>
			<tr class='bodyGroupHead padded'>
				<td colspan='5'>Mountain School</td>
			</tr>
			<tr>
				<th class='tdr'>2-Oct-2013</th>
				<td class='tdc'>7</td>
				<td class='tdc'>200</td>
				<td class='tdr'>864.20</td>
				<td class='tdr rfoot'>864.20</td>
			</tr>
			<tr>
				<th class='tdr'>31-Oct-2013</th>
				<td class='tdc'>7</td>
				<td class='tdc'>600</td>
				<td class='tdr'>456.78</td>
				<td class='tdr rfoot'>1,320.98</td>
			</tr>
			<tr class='bodyGroupFoot padded'>
				<td colspan='4'></td>
				<td class='tdr'><strong>$1,320.98</strong></td>
			</tr>
		</tbody>
		<tbody>
		<tr>
				<td class='rhead tdr'>15-Apr-2021</td>
				<td class='tdc'>- rfoot</td>
				<td class='tdc'>700</td>
				<td class='tdc'>9.12</td>
				<td class='tdr rfoot'>3,210.89</td>
			</tr>
			<tr>
				<td class='rhead tdr'>20-Mar-2021</td>
				<td class='tdc'>- rfoot</td>
				<td class='tdc'>700</td>
				<td class='tdc'>9.12</td>
				<td class='tdr rfoot'>3,210.89</td>
			</tr>
			<tr>
				<td class='rhead tdr'>29-Nov-2021</td>
				<td class='tdc'>- rfoot</td>
				<td class='tdc'>700</td>
				<td class='tdc'>9.12</td>
				<td class='tdr rfoot'>3,210.89</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan='5' class='tdr'><strong>$1,715.91</strong></td>
			</tr>
		</tfoot>
	</table>
	
	
	
	
	
	<hr />
	
	<p class='redText'>A note about rowspans and row highlighting:</p>
	
	<p>Row highlighting works with rowspans; however, each rowspan group must be separated into a distinct <code>&lt;tbody&gt;</code> section.  
	In this example, notice how the first section works properly, 
	but the last section incorrectly triggers the rowspan highlight when the last row (without any rowspans) is hovered.</p>

	<table width='75%' border='0' cellpadding='0' cellspacing='0' class='listing wideGutter' style='margin: 1em 0;'>
		<thead>
			<tr>
				<th colspan='4'>A Table with 4 Columns</th>
			</tr>
			<tr>
				<th class='thl'><a href='#'>L Column 1</a></th>
				<th class='thc'>C Column 2</th>
				<th class='thr'>R Column 3</th>
				<th class='thr'>R Column 4</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td rowspan='3' class='borderRight'><a href=''>Left Value</a></td>
				<td class='tdc'><a href='#'>Center Value</a></td>
				<td class='tdr'>Random Value</td>
				<td class='tdr'>Right Value</td>
			</tr>
			<tr>
				<td class='tdc'>Center Value</td>
				<td class='tdr'>Random Value</td>
				<td class='tdr'>Right Value</td>
			</tr>
			<tr>
				<td class='tdc'>Center Value</td>
				<td class='tdr'>Random Value</td>
				<td class='tdr'>Right Value</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td>Left Value</td>
				<td class='tdc'>Center Value</td>
				<td class='tdr'>Random Value</td>
				<td class='tdr'>Right Value</td>
			</tr>
			<tr>
				<td>Left Value</td>
				<td class='tdc'>Center Value</td>
				<td class='tdr'>Random Value</td>
				<td class='tdr'>Right Value</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td rowspan='2' class='borderRight'>Left Value</td>
				<td class='tdc'>Center Value</td>
				<td class='tdr'>Random Value</td>
				<td rowspan='3' class='tdr borderLeft'>Right Value</td>
			</tr>
			<tr>
				<td class='tdc'>Center Value</td>
				<td class='tdr'>Random Value</td>
			</tr>
			<tr>
				<td class='tdl borderRight'>Should have</td>
				<td class='tdc'>closed tbody</td>
				<td class='tdr borderLeft'>after this row</td>
			</tr>
			<tr>
				<td class='tdl'>foobar</td>
				<td class='tdc'>triggers</td>
				<td class='tdr'>rowspan</td>
				<td class='tdr'>highlights</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td class='tdl'>Pre Sum</td>
				<td class='tdc'>Pre Sum</td>
				<td class='tdr'>Pre Sum</td>
				<td class='tdr'>Pre Sum</td>
			</tr>
			<tr>
				<td class='tdl'>Sum</td>
				<td class='tdc'>Sum</td>
				<td class='tdr'>Sum</td>
				<td class='tdr'>Sum</td>
			</tr>
		</tfoot>
	</table>
	
	
	
	
	
	<hr />
	
	<p>Row Highlighting is not printed, and it is only supported within <code>&lt;tbody&gt;</code>.</p>
</body>
</html>
