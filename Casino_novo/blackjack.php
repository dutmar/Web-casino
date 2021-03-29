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
		<title>BlackJack</title> <!-- naslov -->
		<link rel="stylesheet" href="blackjack-css.css"> <!-- spoj s css-om -->
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" /> <!-- hrvatska slova -->
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
					<a href="kontakt.html"><li>Kontakt</li></a>
					<a href="logout.php"><li>Odlogiraj se</li></a>
				</ul>
			</div>
		</div>

		<div class = "balance">
			<?php
			echo "Balance: ".$result['balance'];
			?>
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
