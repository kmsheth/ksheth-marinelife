<?php
	include("top.html");
	include("marine_shared.php");
	$animalengname = $_GET["engnameanimal"];
	$animallatname = $_GET["latnameanimal"];
	$animalcolours = $_GET["colouranimal"];
	$animalspecattr = $_GET["animalspecattr"];
	$animalskelet = $_GET["animalskelet"];
	$foundinzone = $_GET["foundin"];
	$yeardiscover = $_GET["discoveryear"];
	$scientist = $_GET["scientistname"];
	$concentrationscience = $_GET["scienceconc"];
	$genderscience = $_GET["sciencegend"];
	$latinpred1 = $_GET["latpred1"];
	$englishpred1 = $_GET["engpred1"];
	$ferocious1 = $_GET["ferpred1"];
	$latinpred2 = $_GET["latpred2"];
	$englishpred2 = $_GET["engpred2"];
	$ferocious2 = $_GET["ferpred2"];
	$latinpred3 = $_GET["latpred3"];
	$englishpred3 = $_GET["engpred3"];
	$ferocious3 = $_GET["ferpred3"];
	?>
	<br>
	<br>
	<h2>
		INSERTING INTO DATABASE:
	</h2>
		<br>
		<h3>
		<?php
	$sql = "INSERT INTO animals (latin_name, english_name, colour, discovery_year, special_attr, skeletal_type, found_in) VALUES ('" . $animallatname . "', '" . $animalengname . "', '" . $animalcolours . "', " . $yeardiscover . ", '" . $animalspecattr . "', '" . $animalskelet . "', '" . $foundinzone . "'); INSERT INTO scientist (name, concentration, gender) VALUES ('" . $scientist . "', '" . $concentrationscience . "', '" . $genderscience . "'); INSERT INTO discovery (species_name, scientist_name, year, skeletal_type, science_concentration) VALUES ('" . $animallatname . "', '" . $scientist . "', " . $yeardiscover . ", '" . $animalskelet . "', '" . $concentrationscience . "'); INSERT INTO predators (latin_name, english_name, prey, ferocity) VALUES ('" . $latinpred1 . "', '" . $englishpred1 . "', '" . $animallatname . "', " . $ferocious1 . "), ('" . $latinpred2 . "', '" . $englishpred2 . "', '" . $animallatname . "', " . $ferocious2 . "), ('" . $latinpred3 . "', '" . $englishpred3 . "', '" . $animallatname . "', " . $ferocious3 . ");";
	echo $sql;
	$query = $db->prepare($sql);
	$query->execute();
?>
</h3>
