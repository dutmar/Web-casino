<?php

require_once "config.php";

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

/* za balance*/
$sql = mysqli_query($link, "SELECT balance FROM akreditacije WHERE username = '".$_SESSION['username']."'");
$result = mysqli_fetch_array($sql);

?>

<html>

	<head>
		<title>Rulet</title> <!-- naslov -->
		<link rel="stylesheet" href="rulet-css.css"> <!-- spoj s css-om -->
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" /> <!-- hrvatska slova -->
		<script type="text/javascript" src="rulet.js"></script>
	</head>

	<body>
		<!-- header -->
		<div class="header">
			<div class="inner-header">
				<div class="logo">
					<img src="logo.png">
				</div>
				<ul class="navigacija">
					<a href="welcome.php"><li>Igre</li></a>
					<a href="o-nama.html"><li>O nama</li></a>
					<a href="pravila.html"><li>Pravila</li></a>
					<a href="kontakt.php"><li>Kontakt</li></a>
					<a href="logout.php"><li>Odlogiraj se</li></a>
				</ul>
			</div>
		</div>

		<div class = "balance">
		<?php
			echo "Balance: ".$result['balance'];
			?>
		</div>

		<div id="broj" style="border: 3px solid black;"></div>
		<button id="myBtn" onclick="start_rulet()">Odigraj</button>
		<button id="reset" onclick="reset()">Reset</button>

		<!--oklade-->
		<label class="radio">
			<div class="oklade">
				<div class="bets1">
					<input id="1st" type="radio" name="12">1st 12<br>
					<input id="2nd" type="radio" name="12">2nd 12<br>
					<input id="3rd" type="radio" name="12">3rd 12<br>
					<input id="crno" type="radio" name="boja">Crno<br>
					<input id="crveno" type="radio" name="boja">Crveno<br>
				</div>
				<div class="bets2">
					<input id="nula" type="radio" name="nula">Nula<br>
					<input id="par" type="radio" name="par">Par<br>
					<input id="nepar" type="radio" name="par">Nepar<br>
				</div>
			</div>
		</label>
		
		<!--Winable-->
		<div id="win"></div>
		
		<!-- footer -->
		<div class="footer">
			<div class="inner-footer">
				<div class="logo-footer">
					<img src="logo2.png" width="100" height="70" onClick="location.href='glavni-ekran.html'">
				</div>
				<div class="tekst-footer">
					<p>Copyright Casino Royale d.o.o., 2020 © Sva prava pridržana, 0.1.1637</p>
					<p>Odobrenje Ministarstva Financija Republike Hrvatske za priređivanje igara na sreću u casinima putem interneta, KLASA: 00000000000000, URBROJ: 00000000000</p>
					<p>Casino Royale d.o.o. za igre na sreću. OIB 000000000000; Vukovarska ul. 58, Rijeka; Telefon +385 0 000 00000; Telefaks +00 00 000 000</p>
				</div>	
			</div>
		</div>
	</body>

</html>
