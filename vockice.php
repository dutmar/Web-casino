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
		<title>Voćkice</title> <!-- naslov -->
		<link rel="stylesheet" href="vockice-css.css"> <!-- spoj s css-om -->
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" /> <!-- hrvatska slova -->
		<script type="text/javascript" src="slot.js"></script>
	</head>

	<body onload="pocetak()">
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

		<div onload="balance()" id="balance" class = "balance">
		<?php
			echo "Balance: ".$result['balance'];
		?>
		</div>

		<button class="stisni" onclick="start()" value="stisni" style="margin-top: 10px;">POVUCI</button>

		<div id="nagrada" class="row" style="padding-top: 2%;">
			<div id = "slot1" class="column" style="padding-top: 8%; padding-left: 8%;"></div>
			<div id = "slika1" class="column" style="padding-top: 8%; padding-left: 8%;"></div>

			<div id = "slot2" class="column" style="padding-top: 8%; "></div>
			<div id = "slika2" class="column" style="padding-top: 8%;"></div>

			<div id = "slot3" class="column" style="padding-top: 8%; padding-right: 30%;"></div>
			<div id = "slika3" class="column" style="padding-top: 8%; padding-right: 30%;"></div>

			<div id="cestitka"></div>
			<div id="sretno">SRETNO!!!</div>

			<div id="timer">1400 ms</div>
		</div>
		
		<!-- footer -->
		<div class="footer">
			<div class="inner-footer">
				<div class="logo-footer">
					<img src="logo2.png" width="100" height="70" onClick="location.href='index.html'">
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
