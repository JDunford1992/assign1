<html>
<head>
  <title>Winestore Results Page</title>
	<style>
	table,th,td
	{
		border:1px solid green;
	}
	</style>
</head>

<body>

	<?php

  function showerror() {
     die("Error " . mysql_errno() . " : " . mysql_error());
  }

  require 'db.php';

  // Show all wines in a region in a <table>
  function displayWinesList($connection, $query, $nameWine) {
    // Run the query on the server
    if (!($result = @ mysql_query ($query, $connection))) {
      showerror();
    }

    // Find out how many rows are available
    $rowsFound = @ mysql_num_rows($result);

    // If the query has results ...
    if ($rowsFound > 0) {
      // ... print out a header
      print "Wines of $nameWine<br>";

      // and start a <table>.
      print "\n<table>\n<tr>" .
          "\n\t<th>Wine ID</th>" .
          "\n\t<th>Wine Name</th>" .
          "\n\t<th>Grape Variety</th>" .
          "\n\t<th>Year</th>" .
          "\n\t<th>Winery Name</th>" .
          "\n\t<th>Region</th>" .
          "\n\t<th>Cost per Bottle</th>" .
          "\n\t<th>Stock On Hand</th>" .
          "\n\t<th>Sum Sold Quantity</th>" .
          "\n\t<th>Sum Sold Items</th>\n</tr>";

      // Fetch each of the query rows
      while ($row = @ mysql_fetch_array($result)) {
        // Print one row of results
        print "\n<tr>\n\t<td>{$row["wine_id"]}</td>" .
            "\n\t<td>{$row["wine_name"]}</td>" .
            "\n\t<td>{$row["variety"]}</td>" .
            "\n\t<td>{$row["year"]}</td>" .
            "\n\t<td>{$row["winery_name"]}</td>" .
            "\n\t<td>{$row["region_name"]}</td>" .
            "\n\t<td>{$row["cost"]}</td>" .
            "\n\t<td>{$row["on_hand"]}</td>" .
            "\n\t<td>{$row["qty"]}</td>" .
            "\n\t<td>{$row["SUM(items.price)"]}</td>\n</tr>";
      } // end while loop body

      // Finish the <table>
      print "\n</table>";
    } // end if $rowsFound body

    // Report how many rows were found
    print "{$rowsFound} records found matching your criteria<br>";
  } // end of function

  // Connect to the MySQL server
  if (!($connection = @ mysql_connect(DB_HOST, DB_USER, DB_PW))) {
    die("Could not connect");
  }

  // get the user data
  $nameWine = $_GET['nameWine'];
  $nameWinery = $_GET['nameWinery'];
  $region = $_GET['region'];
  $grapeVariety = $_GET['grapeVariety'];
  $yearLow = $_GET['yearLow'];
  $yearMax = $_GET['yearMax'];
  $costMin = $_GET['costMin'];
  $costMax = $_GET['costMax'];
  $minStock = $_GET['minStock'];
  $minOrder = $_GET['minOrder'];

  if (!mysql_select_db(DB_NAME, $connection)) {
    showerror();
  }

  // Start a query ...
  $query = "SELECT wine.wine_id, wine.wine_name, grape_variety.variety, wine.year, 
  winery.winery_name, region.region_name, inventory.cost, inventory.on_hand, items.qty, SUM(items.price)
  FROM winery, wine, wine_variety, region, inventory, grape_variety, items
  WHERE winery.winery_id = wine.winery_id
  AND winery.region_id = region.region_id
  AND wine.wine_id = inventory.wine_id
  AND wine.wine_id = items.wine_id
  AND wine.wine_id = wine_variety.wine_id
  AND inventory.wine_id = wine_variety.wine_id
  AND grape_variety.variety_id = wine_variety.variety_id";

  // YEAR AND CLAUSE
  // COST AND CLAUSE

  // ADD MORE AND CLAUSES HERE TO CONNECT THE TABLES TOGETHER TO MAKE IT RUN FASTER

  // ... then, if the user has specified a region, add the regionName
  // as an AND clause ...

  if (isset($nameWine) && $nameWine != "All") {
    $query .= " AND wine_name = '{$nameWine}'";
  }

  if (isset($nameWinery) && $nameWinery != "All") {
    $query .= " AND winery_name = '{$nameWinery}'";
  }

  if (isset($region) && $region != 1) {
    $query .= " AND winery.region_id = '{$region}'";
  }

  if (isset($grapeVariety) && $grapeVariety != "All") {
    $query .= " AND grape_variety.variety_id = '{$grapeVariety}'";
  }

  if (isset($yearLow, $yearMax) && $yearLow != "All" && $yearMax != "All") {
    $query .= "   AND wine.year >= '{$yearLow}' AND wine.year <= '{$yearMax}' ";
  }

  if (isset($costMin) && $costMin != "") {
    $query .= " AND inventory.cost >= '{$costMin}'";
  }

  if (isset($costMax) && $costMax != "") {
    $query .= " AND inventory.cost <= '{$costMax}'";
  }

  if (isset($costMin, $costMax) && $costMin != "" && $costMax != "") {
    $query .= " AND inventory.cost >='{$costMin}' AND inventory.cost <= '{$costMax}' ";
  }

  if (isset($minStock) && $minStock != "") {
    $query .= " AND on_hand >= '{$minStock}'";
  }

  if (isset($minOrder) && $minOrder != "") {
    $query .= " AND qty >= '{$minOrder}'";
  }

  // ... and then complete the query.
  $query .= " GROUP BY wine_id, variety ORDER BY wine_id";

  // run the query and show the results
  displayWinesList($connection, $query, $nameWine);
?>

</body>
<footer></footer>
</html>
