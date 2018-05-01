<?php
include("top.html");
	include("marine_shared.php");
	$command = $_GET["command"];
	?>
	<br>
	<h3>The animals stored in this database that can be found in <?php print $command ?> are as follows:</h3>
<?php
	$sql = "SELECT latin_name, english_name FROM animals, ocean_layers WHERE animals.found_in = ocean_layers.official_name AND ocean_layers.common_name = '" . $command . "' Limit 1000";//change this line of code to have a different query
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	print_table($query);
?>

<h3> Each layer of the ocean also has its own attributes, and for this layer of the ocean they are as follows:</h3>

<?php
	$sql = "SELECT * FROM ocean_layers WHERE common_name = '" . $command . "' Limit 1000";//change this line of code to have a different query
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	print_table($query);
?>

<form action="animals.php" method="get">
Which animal would you like to learn more about? (You can enter their latin name or their english name [It is Case-Sensitive]): <input type="text" name="animalname"> <input type="submit" value = "Submit">
</form>

<?php
	$db = null;

	function print_table($query){
		print "<table border=1>\n";
		$total = $query->columnCount();
		for($counter = 0; $counter<$total; $counter++){
			$meta = $query->getColumnMeta($counter);
			print "<th>{$meta['name']}</th>\n";
			$coln[$counter] = $meta['name'];
		}
		$rows = $query->fetchAll();
		foreach($rows as $row){
			print "<tr>\n";
			for($counter = 0; $counter<$total; $counter++){
				print "<td>{$row[$coln[$counter]]}</td>\n";
			}
			print "</tr>\n";
		}
		print "</table>\n";
	}
?>
	</body>
</html>
