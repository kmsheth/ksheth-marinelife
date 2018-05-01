<?php
include("marine_shared.php");
include("top.html");
?>

<!DOCTYPE html>
<html>

<h3>
This is a website to enhance one's understanding of the animals down below the ocean waves. Learn all about their living conditions, their appearance, and their discovery.
<br>
<br>
You will also learn about the ocean, and all of its level's names, pressures, temperatures, and its typical inhabitants.
</h3>
<br>
<h4>
Which Ocean Layer would you like to see the list of animals for?
</h4>
<img src="OceanLayers.png" alt="MarineLife" style="width:500px;height:400px;"/>
<br>
<form action="depth.php" method="get">
<input type="submit" name="command" value="The Trenches" />
<input type="submit" name="command" value="The Abyss" />
<input type="submit" name="command" value="The Midnight Zone" />
<input type="submit" name="command" value="The Twilight Zone" />
<input type="submit" name="command" value="The Sunlight Zone" />
</form>
<form action="data.php" method="get">
	<input type="submit" name="command" value="habitat" />
	<input type="submit" name="command" value="aquariums" />
	<input type="submit" name="command" value="animals" />
	<input type="submit" name="command" value="scientist" />
	<input type="submit" name="command" value="discovery" />
	<input type="submit" name="command" value="predators" />
	<input type="submit" name="command" value="ocean_layers" />
</form>
</body>
</html>
