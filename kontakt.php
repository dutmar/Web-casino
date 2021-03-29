<html>

  <head>
    <title>Pravila</title> <!-- naslov -->
	<link rel="stylesheet" href="kontakt-css.css"> <!-- spoj s css-om -->
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" /> <!-- hrvatska slova -->
	<script>
			function goBack() { <!-- povratak korak unazad -->
			window.history.back();
			}
	</script>
  </head>

  <body>
  
  <?php 
     function prikazi_obrazac($email="",$message="",$subject="") {  
	?>
		<div class="povratak">
			<button type="button" id="glavni-ekran" class="glavni-ekran" onclick="goBack()">Povratak</button>
		</div>
		<div class="kontakt">
		<p class="kontakt">
			<h3>Kontakt</h3>
				<div class="container">
					<form action="/action_page.php" method="post">
						<label for="ime">Vaš email:</label>
						<input type=text name=email size=30 value="<?php print($email); ?>"> <br>

						<label for="prezime">Predmet:</label>
						<input type=text name=subject size=30 value="<?php print($subject); ?>"><br>

						<label for="poruka">Vaša poruka:</label>
						<textarea rows=10 cols=50 name=message><?php print($message); ?></textarea>

						<input type="submit" value="Pošalji">
						</form>
			</div>
		</div>
		
	<?php } 


	if (!isset($_POST['email']) or !isset($_POST['message']) or !isset($_POST['subject'])) {
		prikazi_obrazac();
	} else {
	if (empty($_POST['message'])) {
		print("Poruka je prazno! Upišite  tekst i ponovno pošaljite.");
		prikazi_obrazac($_POST['email'], $_POST['message'], $_POST['subject']);
	} else {
    if (empty($_POST['email'])) {
		$email="anonymous";
    }
    
	if (empty($_POST['subject'])) {
		$subject="prazan subject";
    }

    $sent = mail("dutmar@riteh.hr", $_POST['subject'], $_POST['message'], "From: " . $_POST['email']);

    if ($sent) {
		print("<H1>Hvala na poruci.</H1>");
    } else {
		print("<p>Poslužitelj nije u mogućnosti poslati vaš e-mail.");
    }
  }
}
?>

  </body>

</html>
