<!DOCTYPE html>
<html>

	<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <script src="js.js"></script>
        <script type="text/javascript" src="json.json"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <title>test acenseur</title>
	</head>

	<body onload="initialisation()">
		<?php	
		require_once("php.php");
		?>
		<h1>Simulation du fonctionnement d'un ascenseur</h1>
		<div id="content">
			<div id="button">
				<button OnClick="etage(0)">9</button>
				<button OnClick="etage(1)">8</button>
				<button OnClick="etage(2)">7</button>
				<button OnClick="etage(3)">6</button>
				<button OnClick="etage(4)">5</button>
				<button OnClick="etage(5)">4</button>
				<button OnClick="etage(6)">3</button>
				<button OnClick="etage(7)">2</button>
				<button OnClick="etage(8)">1</button>
				<button OnClick="etage(9)">rdc</button>
			</div>

			<div id="elevator">
				<div id="carre">
					<img id ="img" src="elevator.png">
				</div>
			</div>
		</div >
		<div id= "interface">

			<button id="goDown" onClick="goDown()">bas</button>

			<button id="goUp" onClick="goUp()">haut</button>
			<button id="boucle" onClick="lancement()">lancer</button>
		</div>

    </body>
</html>