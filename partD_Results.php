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

require_once('db_pdo.php');

try {
  $pdo = new PDO($dsn, DB_USER, DB_PW);
  
  // all errors will throw exceptions
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //////////////////////////// QUERY START ////////////////////////////

  ///////////////////// GET THE USER DATA START /////////////////////

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

  ///////////////////// GET THE USER DATA END /////////////////////

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

  // ... then, if the user has specified a region, add the regionName
  // as an AND clause ...

  if (isset($nameWine) && $nameWine != "All") {
    $query .= " AND wine_name LIKE :nameWine";
  }

  if (isset($nameWinery) && $nameWinery != "All") {
    $query .= " AND winery_name LIKE :nameWinery";
  }

  if (isset($region) && $region != 1) {
    $query .= " AND winery.region_id LIKE :region";
  }

  if (isset($grapeVariety) && $grapeVariety != "All") {
    $query .= " AND grape_variety.variety_id LIKE :grapeVariety";
  }

  if (isset($yearLow, $yearMax) && $yearLow != "All" && $yearMax != "All") {
    $query .= "   AND wine.year >= :yearLow AND wine.year <= :yearMax ";
  }

  if (isset($costMin) && $costMin != "") {
    $query .= " AND inventory.cost >= :costMin";
  }

  if (isset($costMax) && $costMax != "") {
    $query .= " AND inventory.cost <= :costMax";
  }

  if (isset($costMin, $costMax) && $costMin != "" && $costMax != "") {
    $query .= " AND inventory.cost >= :costMin AND inventory.cost <= :costMax ";
  }

  if (isset($minStock) && $minStock != "") {
    $query .= " AND on_hand >= :minStock";
  }

  if (isset($minOrder) && $minOrder != "") {
    $query .= " AND qty >= :minOrder";
  }

  // ... and then complete the query.
  $query .= " GROUP BY wine_id, variety ORDER BY wine_id";

  $statement = $pdo->prepare($query);

  //////////////////////////// QUERY END ////////////////////////////

  //////////////////////////BINDING START//////////////////////////

  if (isset($nameWine) && $nameWine != "All") {
      $statement -> bindParam(':nameWine', $nameWine);
  }

  if (isset($nameWinery) && $nameWinery != "All") {
      $statement -> bindParam(':nameWinery', $nameWinery);
  }

  if (isset($region) && $region != 1) {
      $statement -> bindParam(':region', $region);
  }

  if (isset($grapeVariety) && $grapeVariety != "All") {
      $statement -> bindParam(':grapeVariety', $grapeVariety);
  }

  if (isset($yearLow, $yearMax) && $yearLow != "All" && $yearMax != "All") {
      $statement -> bindParam(':yearLow', $yearLow);
      $statement -> bindParam(':yearMax', $yearMax);
  }

  if (isset($costMin) && $costMin != "") {
      $statement -> bindParam(':costMin', $costMin);
  }

  if (isset($costMax) && $costMax != "") {
      $statement -> bindParam(':costMax', $costMax);
  }

  if (isset($costMin, $costMax) && $costMin != "" && $costMax != "") {
      $statement -> bindParam(':costMin', $costMin);
      $statement -> bindParam(':costMax', $costMax);
  }

  if (isset($minStock) && $minStock != "") {
      $statement -> bindParam (':minStock', $minStock);
  }

  if (isset($minOrder) && $minOrder != "") {
      $statement -> bindParam(':minOrder', $minOrder);
  }
  //////////////////////////BINDING END//////////////////////////

  

  //////////////////////////EXECUTE START/////////////////////

  $statement->execute();

  //////////////////////////EXECUTE END///////////////////////

  require_once ("MiniTemplator.class.php");
        $t = new MiniTemplator;
        $t->readTemplateFromFile ("partD_Template.htm");

  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    
    $t->setVariable ("Wine_ID","{$row["wine_id"]}");
      $t->setVariable ("Wine_Name","{$row["wine_name"]}");
      $t->setVariable ("Grape_Variety","{$row["variety"]}");
      $t->setVariable ("Year","{$row["year"]}");
      $t->setVariable ("Winery_Name","{$row["winery_name"]}");
      $t->setVariable ("Region","{$row["region_name"]}");
      $t->setVariable ("Cost_per_Bottle","{$row["cost"]}");
      $t->setVariable ("Stock_On_Hand","{$row["on_hand"]}");
      $t->setVariable ("Sum_Sold_Quantity","{$row["qty"]}");
      $t->setVariable ("Sum_Sold_Items","{$row["SUM(items.price)"]}");

      $t->addBlock ("block1");

  } // end while loop body
  $t->generateOutput();

  // close the connection by destroying the object
  $pdo = null;
} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}

?>

</body>
<footer></footer>
</html>
