<?php

session_start();

/*ako je vec logiran*//*NAPRAVITI LOG OUT INAČE JE UVIJEK LOGIRAN*/
/*if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}*/

/*spajanje na bazu*/
require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] === "POST") {

    if(empty(trim($_POST["username"]))) {
        $username_err = "Upišite korisničko ime.";
    } else {
        $username = trim($_POST["username"]);
    }

    if(empty(trim($_POST["password"]))) {
        $password_err = "Upišite lozinku.";
    } else {
        $password = trim($_POST["password"]);
    }

    /*ako username i password nisu prazni*/
    if(empty($username_err) && empty($password_err)) {
        $sql = "SELECT id, username, password FROM akreditacije WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = $username;

            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                /*ako je 1 username postoji*/
                if(mysqli_stmt_num_rows($stmt) === 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                    if(mysqli_stmt_fetch($stmt)) {

                        /*ako odg password*/
                        if(password_verify($password, $hashed_password)) {
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            /*tu ide file od pocetne stranice di su igre*/
                            header("location: welcome.php");
                        } else {
                            $password_err = "Netočna lozinka.";
                        }
                    }
                } else {
                    $username_err = "Korisničko ime ne postoji.";
                }
            } else {
                echo "Došlo je do pogreške! Probajte kasnije!";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Prijava</title> <!-- naslov -->
	<link rel="stylesheet" href="prijava-css.css"> <!-- spoj s css-om -->
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" /> <!-- hrvatska slova -->
	<script src="prijava-java.js"></script> <!-- java -->
  </head>

  <body>
	<div id="red" class="red">
		<div class="stupac">
			<div class="stupac-lijevo">
				<img id="slika" class ="slika" src="prijava-slika.jpeg">
			</div>
		<div class="stupac">
			<div class="stupac-desno">
				<div id="forma" class="forma">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<div class="avatar-a">
							<img src="casino-avatar.png" alt="Avatar" class="avatar">
						</div>

						<div class="container">
							<label for="uname"><b>Korisničko ime</b></label>
                            <input type="text" placeholder="Upiši korisničko ime" name="username"></input>
                            <span class="help-block"><?php echo $username_err; ?></span>

							<label for="psw"><b>Lozinka</b></label>
                            <input type="password" placeholder="Upiši svoju lozinku" name="password" ></input>
                            <span class="help-block"><?php echo $password_err; ?></span>
	
							<button type="submit">Prijava</button>
						</div>

						<div class="container">
							<button type="button" id="odustani" class="odustani" onClick="location.href='index.html'">Odustani</button>
							<button type="button" id="zaboravljena-lozinka" class="zaboravljena-lozinka" onClick="location.href='zaboravljena-lozinka.php'">Zaboravljena lozinka?</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
  </body>

</html>
