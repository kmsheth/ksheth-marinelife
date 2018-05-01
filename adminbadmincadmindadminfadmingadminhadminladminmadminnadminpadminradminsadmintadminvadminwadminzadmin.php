<?php
	include("top.html");
	include("marine_shared.php");
?>
<h3>
	Hello, and welcome to the Deep Blue Sea! A Marine Life Database. I understand you are trying to insert some new animals into the records! That is a pretty easy process if you just follow these simple steps:
</h3>
<form action="sadminsuccess.php" method="get">
	<h4>
		<br>
		1. Please enter the English name of the animal you are adding to the database: <input type="text" name="engnameanimal">
		<br>
		<br>
		2. Now, please enter the Latin name of that very same animal: <input type="text" name="latnameanimal">
		<br>
		<br>
		3. Now that we have its name inputted, please insert the colour of that there animal: <input type="text" name="colouranimal">
		<br>
		<br>
		4. Any special attribute that that animal is well known for that you would like to store: <input type="text" name="animalspecattr">
		<br>
		<br>
		5. Now we need the skeletal type of the animal [Vertebrate, Invertebrate, Cartilaginous, None]: <input type="text" name="animalskelet">
		<br>
		<br>
		6. Please now enter which ocean zone that animal can be found in [Epipelagic Zone, Mesopelagic Zone, Bathypelagic Zone, Abyssopelagic Zone, Hadalpelagic Zone]: <input type="text" name="foundin">
		<br>
		<br>
		7. Now we are on to the topic of its discovery! What year was this animal first seen in: <input type="text" name="discoveryear">
		<br>
		<br>
		8. What were the first and last name of the scientist who found this animal?: <input type="text" name="scientistname">
		<br>
		<br>
		9. What was this scientist's concentration of study: <input type="text" name="scienceconc">
		<br>
		<br>
		10. Was this scientist Male [M], or Female [F]: <input type="text" name="sciencegend">
		<br>
		<br>
	</h4>
	<h3>
		These following steps are for if you want to store any predators that this animal has (maximum of 3 predators allowed)
	</h3>
	<h4>
		<br>
		1. Please enter the predator's Latin name: <input type="text" name="latpred1">
		<br>
		<br>
		2. Please enter the predator's English name: <input type="text" name="engpred1">
		<br>
		<br>
		3. On a scale of 1-4 how ferocious is this predator? <input type="text" name="ferpred1">
		<br>
		<br>
		4. Please enter the second predator's Latin name: <input type="text" name="latpred2">
		<br>
		<br>
		5. Please enter the second predator's English name: <input type="text" name="engpred2">
		<br>
		<br>
		6. On a scale of 1-4 how ferocious is the second predator? <input type="text" name="ferpred2">
		<br>
		<br>
		7. Please enter the third predator's Latin name: <input type="text" name="latpred3">
		<br>
		<br>
		8. Please enter the third predator's English name: <input type="text" name="engpred3">
		<br>
		<br>
		9. On a scale of 1-4 how ferocious is the third predator? <input type="text" name="ferpred3">
		<br>
		<br>
		<input type="submit" value = "Submit">
	</h4>
</form>



<?php
// adminbadmincadmindadminfadmingadminhadminladminmadminnadminpadminradminsadmintadminvadminwadminzadmin.php
?>
