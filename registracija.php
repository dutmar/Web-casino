<?php

/*spajanje na bazu*/
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] === "POST") {

    /*validacija usernamea*/
    if(empty(trim($_POST["username"]))) {
        $username_err = "Upiši korisničko ime.";
    } else {
        /*query upit*/
        $sql = "SELECT id FROM akreditacije WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt)) {
                /*spremi rezultat*/
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) === 1) {
                    $username_err = "Korisničko ime već postoji.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Došlo je do pogreške! Probajte kasnije!";
            }

            mysqli_stmt_close($stmt);
        }
    }

    /*validacija passworda*/
    if(empty(trim($_POST["password"]))) {
        $paswword_err = "Upišite lozinku.";
    } elseif(strlen(trim($_POST["password"])) < 6) {
        $password_err = "Lozinka mora sadržavati najmanje 6 znakova";
    } else {
        $password = trim($_POST["password"]);
    }

    /*validacija confirm passworda*/
    if(empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Potvrdite lozinku.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        
        if(empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Lozinke se ne podudaraju.";
        }
    }

    /*ako nema errora izvrsi upit*/
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO akreditacije (username, password, balance) VALUES (?, ?, 5000)";

        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if(mysqli_stmt_execute($stmt)) {
                header("location: login.php");
            } else {
                echo "Došlo je do pogreške! Probajte kasnije!";
            }

            mysqli_stmt_close($stmt);
        }
    }

    /*ugasi vezu*/
    mysqli_close($link);
}

?>

<!DOCTYPE html>
<html>

  <head>
    <title>Registracija</title> <!-- naslov -->
	<link rel="stylesheet" href="prijava-css.css"> <!-- spoj s css-om -->
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" /> <!-- hrvatska slova -->
	<script src="prijava-java.js"></script> <!-- java -->
  </head>

  <body>
	<div class="red">
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
							<input type="text" placeholder="Upiši korisničko ime" value="<?php echo $username; ?>" name="username" class="form-control" oninvalid="this.setCustomValidity('OBAVEZNO')" oninput="setCustomValidity('')"></input>
                            <span class="help-block"><?php echo $username_err; ?></span>

							<label for="psw"><b>Lozinka</b></label>
                            <input type="password" placeholder="Upiši svoju lozinku" value="<?php echo $password; ?>" name="password" class="form-control" oninvalid="this.setCustomValidity('OBAVEZNO')" oninput="setCustomValidity('')"></input>
                            <span class="help-block"><?php echo $password_err; ?></span>

                            <label for="psw"><b>Potvrdi lozinku</b></label>
							<input type="password" placeholder="Potvrdi lozinku" value="<?php echo $confirm_password; ?>" name="confirm_password" class="form-control" oninvalid="this.setCustomValidity('OBAVEZNO')" oninput="setCustomValidity('')"></input>
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>

							<button type="submit">Registriraj se!</button>
						</div>

						<div class="container">
                            <button type="button" id="odustani" class="odustani" onClick="location.href='index.html'">Odustani</button>
                            <button type="button" id="login_butt" class="login_butt" onClick="location.href='login.php'">Logiraj se</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
  </body>

</html>
