<html>
<head>
	<title>Winestore Form Input Page</title>
	<style>
	table,th,td
	{
		border:1px solid green;
	}
	</style>

	<script type="text/javascript">

	function validateForm(){

		var costMin=document.forms["myForm"]["costMin"].value;
		var costMax=document.forms["myForm"]["costMax"].value;

	    var yearLow=document.forms["myForm"]["yearLow"].value;
		var yearMax=document.forms["myForm"]["yearMax"].value;

		var minStock=document.forms["myForm"]["minStock"].value;
		var minOrder=document.forms["myForm"]["minOrder"].value;

		if (isNaN(costMin)|| isNaN(costMax)){
			alert("Min Cost & Max Cost Must Be Numeric");
			return false;
		}
		else if (isNaN(minStock) || isNaN(minOrder)){
			alert("Min Stock & Min Order Must Be Numeric");
			return false;
		}
		else if (costMin > costMax){
			alert("Min Cost Must Be Less Than Max Cost");
			return false;
		}
		else if (yearLow > yearMax){
			alert("Year MIN Must Be Less Than Year MAX");
			return false;
		}
		else if (costMin < 0){
			alert("Min Cost Must Be A Positive Number");
			return false;
		}
		else if (costMax < 0){
			alert("Max Cost Must Be A Positive Number");
			return false;
		}
		else if (minStock < 0){
			alert("Min Wine (Stock) Must Be A Positive Number");
			return false;
		}
		else if (minOrder < 0){
			alert("Min Wines (Ordered) Must Be A Positive Number");
			return false;
		}
		return true;
	}
	</script>
</head>

<body>
	<?php
	require_once('db.php');
	if(!$dbconn = mysql_connect(DB_HOST, DB_USER, DB_PW)) 
	{
		echo 'Could not connect to mysql on ' . DB_HOST . '\n';
		exit; 
	}
	if(!mysql_select_db(DB_NAME, $dbconn)) 
	{
		echo 'Could not user database ' . DB_NAME . '\n'; echo mysql_error() . '\n';
		exit;
	}
	mysql_select_db('winestore');
	?>

	<div id="main">
		<h1>Welcome to the Alpha Tool</h1>
		<p>- This is an RMIT Student Project for WDA (Sem-2 2013) -</p>

		<form name="myForm" onsubmit="return validateForm()" action= "partB_results.php" method="GET">

			<table style="border-style:solid;border-width:5px;">
				<tr> 
					<td> Name of Wine: </td>
					<td> <input id="nameWine" name="nameWine" type="text" value="All"> </td>
					<td> Name of Winery: </td>
					<td> <input id="nameWinery" name="nameWinery" type="text" value="All"> </td>
				</tr>

				<tr>
					<td> Region: </td>
					<td>
						<select id="region" name="region" value="region">							
							<?php
							$result = mysql_query("SELECT region_name, region_id FROM region ");
							while($row = mysql_fetch_array($result)) {
							?>
							<option value=<?php echo $row["region_id"]?>><?php echo $row["region_name"]?></option>;
							<?php
							}
							?>
						</select>
					</td>
					<td> Grape Variety: </td>
					<td>
						<select id="grapeVariety" name="grapeVariety" value="grape_variety">
							<option value="All">All</option>;
							<?php
							$result = mysql_query("SELECT variety, variety_id FROM grape_variety ");
							while($row = mysql_fetch_array($result)) {
							?>
							<option value=<?php echo $row["variety_id"]?>><?php echo $row["variety"]?></option>;
							<?php
							}
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td> Range of Years (MIN): </td>
					<td>
						<select id="yearLow" name="yearLow" value="yearLow">
							<option value="All">All</option>;
							<?php
							$result = mysql_query("SELECT DISTINCT year FROM wine ORDER BY `year` ASC ");
							while($row = mysql_fetch_array($result)) {
							?>
							<option value=<?php echo $row["year"]?>><?php echo $row["year"]?></option>;
							<?php
							}
							?>
						</select>
					</td>
					<td> Range of Years (MAX): </td>
					<td>
						<select id="yearMax" name="yearMax" value="yearMax">
							<option value="All">All</option>;
							<?php
							$result = mysql_query("SELECT DISTINCT year FROM wine ORDER BY `year` ASC ");
							while($row = mysql_fetch_array($result)) {
							?>
							<option value=<?php echo $row["year"]?>><?php echo $row["year"]?></option>;
							<?php
							}
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td> $ Cost Range: </td>
					<td> Min ($) = <input id="costMin" name="costMin" type="text" value="0"> </td>
					<td> Max ($) = <input id="costMax" name="costMax" type="text" value="10000"> </td>
				</tr>

				<tr>
					<td> Min Wines (Stock): </td>
					<td> <input id="minStock" name="minStock" type="text" value=""> </td>
					<td> Min Wines (Ordered): </td>
					<td> <input id="minOrder" name="minOrder" type="text" value=""> </td>
				</tr>

				<tr>
					<td> <input id="submit" name="submit" type="submit" value="Submit AND Search"> </td> 
				</tr>

			</table>
		</form>

		<h3><i>-Comments Created By Jasio Dunford</i></h3>
	</div>
</body>
<footer></footer>
</html>
