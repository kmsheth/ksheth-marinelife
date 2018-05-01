<?php
	include("top.html");
	include("marine_shared.php");
	$command = $_GET["animalname"];
	$sql = "SELECT latin_name FROM animals WHERE latin_name = '" . $command . "' OR english_name = '" . $command . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$animallatin = $query->fetchAll()[0][0];
	$sql = "SELECT english_name FROM animals WHERE latin_name = '" . $command . "' OR english_name = '" . $command . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$animalenglish = $query->fetchAll()[0][0];
	$sql = "SELECT official_name FROM ocean_layers, Animals WHERE official_name = found_in AND latin_name = '" . $animallatin . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$oceanofficial = $query->fetchAll()[0][0];
	$sql = "SELECT common_name FROM ocean_layers WHERE official_name = '" . $oceanofficial . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$oceancommon = $query->fetchAll()[0][0];
	$sql = "SELECT depth_range FROM ocean_layers WHERE official_name = '" . $oceanofficial . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$oceandepthrange = $query->fetchAll()[0][0];
	$sql = "SELECT pressure FROM ocean_layers WHERE official_name = '" . $oceanofficial . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$oceanpressure = $query->fetchAll()[0][0];
	$sql = "SELECT effect FROM ocean_layers WHERE official_name = '" . $oceanofficial . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$oceaneffect = $query->fetchAll()[0][0];
	$sql = "SELECT year FROM discovery, animals WHERE latin_name = '" . $animallatin . "' AND discovery_year = year;";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$yearofdiscover = $query->fetchAll()[0][0];
	$sql = "SELECT name FROM discovery, scientist WHERE year = '" . $yearofdiscover . "' AND scientist_name = name;";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$sciencename = $query->fetchAll()[0][0];
	$sql = "SELECT gender FROM scientist WHERE name = '" . $sciencename . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$sciencegender = $query->fetchAll()[0][0];
	$sql = "SELECT concentration FROM scientist WHERE name = '" . $sciencename . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$scienceconcentration = $query->fetchAll()[0][0];
	$sql = "SELECT colour FROM animals WHERE latin_name = '" . $animallatin . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$animalcolour = $query->fetchAll()[0][0];
	$sql = "SELECT special_attr FROM animals WHERE latin_name = '" . $animallatin . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$animalspecial = $query->fetchAll()[0][0];
	$sql = "SELECT skeletal_type FROM animals WHERE latin_name = '" . $animallatin . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$animalskeleton = $query->fetchAll()[0][0];
	$sql = "SELECT DISTINCT P.latin_name FROM predators AS P, animals AS A WHERE P.prey = '" . $animallatin . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$predatorlat = $query->fetchAll();
	$sql = "SELECT loaned_to FROM animals WHERE latin_name = '" . $animallatin . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$numofrows = $query->fetchColumn();
	if ($numofrows > 0) {
	$sql = "SELECT name FROM aquariums, animals WHERE loaned_to = aqua_id AND latin_name = '" . $animallatin . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
		$aquaname = $query->fetchAll()[0][0];
	$sql = "SELECT location FROM aquariums WHERE name = '" . $aquaname . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
		$aquaaddr = $query->fetchAll()[0][0];
	$sql = "SELECT habitat_id FROM habitat, aquariums WHERE habitat_id = display_id AND name = '" . $aquaname . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
		$habitatid = $query->fetchAll()[0][0];
	$sql = "SELECT temperature FROM habitat WHERE habitat_id = '" . $habitatid . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
		$habitattemp = $query->fetchAll()[0][0];
	$sql = "SELECT volume FROM habitat WHERE habitat_id = '" . $habitatid . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
		$habitatvol = $query->fetchAll()[0][0];
	$sql = "SELECT salinity FROM habitat WHERE habitat_id = '" . $habitatid . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
		$habitatsalt = $query->fetchAll()[0][0];
	$sql = "SELECT pressure FROM habitat WHERE habitat_id = '" . $habitatid . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$habitatpressure = $query->fetchAll()[0][0];
}
	?>
	<br>
	<h2>
	The <?php print $animallatin ?> (A.k.a <?php print $animalenglish ?>)
</h2>
<br>
<h3>
	This animal is found in <?php print $oceanofficial ?>, which is more commonly known as <?php print $oceancommon ?>. This is at a depth between <?php print $oceandepthrange ?>, and at this depth it faces a pressure of <?php print $oceanpressure ?>. If a human were to suddenly appear at this depth of the ocean they would be faced with <?php print $oceaneffect ?>.
</h3>
<br>
<h3>
	It was discovered in <?php print $yearofdiscover ?> by <?php print $sciencename ?> (<?php print $sciencegender ?>), whose study of concentration (was/is) <?php print $scienceconcentration ?>.
</h3>
<br>
<h3>
	This animal is <?php print $animalcolour ?> in colour, and it is most commonly recognized for its <?php print $animalspecial ?>. It has a <?php print $animalskeleton ?> skeleton.
</h3>
<br>
<?php
if(!empty($predatorlat)) {
foreach($predatorlat as $latpredator) {
	$sql = "SELECT english_name FROM predators WHERE latin_name = '" . $latpredator["latin_name"] . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$predatoreng = $query->fetchAll()[0][0];
	$sql = "SELECT ferocity FROM predators WHERE latin_name = '" . $latpredator["latin_name"] . "';";
	$query = $db->prepare($sql); //prepares the query
	$query->execute();           //runs the query
	$predferocity = $query->fetchAll()[0][0];
	?>
<h3>
A predator that this animal faces is the <?php print $latpredator["latin_name"] ?>, otherwise known as the <?php print $predatoreng ?>. This predator's ferocity would most probably be rated as:
<br>
	<?php
	if ($predferocity == "1") {
		?>
		<img src="uni1.jpg" alt="MarineLife"/>
		<?php
	}
	elseif ($predferocity == "2") {
		?>
		<img src="uni2.jpg" alt="MarineLife"/>
		<?php
	}
	elseif ($predferocity == "3") {
		?>
		<img src="uni3.jpg" alt="MarineLife"/>
		<?php
		}
	else {
		?>
		<img src="uni4.jpg" alt="MarineLife"/>
		<?php
	}
}
}
?>
<h3>
<br>
<?php
if (!empty($aquaname)) {
	?>
	<h3>
		This animal is currently on loan to the <?php print $aquaname ?>, at <?php print $aquaaddr ?>. It can be found in Display <?php print $habitatid ?>, which is kept at a temperature of <?php print $habitattemp ?>, has a volume of <?php print $habitatvol ?>, a salinity of <?php print $habitatsalt ?>, and a pressure of <?php print $habitatpressure ?>.
	</h3>
	<?php
}
?>
