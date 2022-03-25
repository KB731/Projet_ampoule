<?php
session_start();
@$login = $_POST["login"];
@$pass = md5($_POST["pass"]);
@$submit = $_POST["submit"];
$erreur = "";
if (isset($submit)) {
    include("Database/connectDB.php");
    $sel = $connectDB->prepare("select * from members where login=? and pass=? limit 1");
    $sel->execute(array($login, $pass));
    $tab = $sel->fetchAll();
    if (count($tab) > 0) {
        $_SESSION["prenomNom"] = ucfirst(strtolower($tab[0]["prenom"])) .
            " " . strtoupper($tab[0]["nom"]);
        $_SESSION["autoriser"] = "oui";
        header("location:dashboard.php");
    } else
        $erreur = "Mauvais login ou mot de passe!";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <style>
        * {
            font-family: arial;
        }

        body {
            margin: 10%;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            background-color: #f0c300;
        }

        input {
            border: solid 1px #2222AA;
            margin-bottom: 10px;
            padding: 16px;
            outline: none;
            border-radius: 6px;
            margin: 5%;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .erreur {
            color: #CC0000;
            margin-bottom: 10px;
        }

        h1 {
            margin-bottom: 5%;
        }

        a {
            font-size: 12pt;
            color: #000000;
            text-decoration: none;
            font-weight: normal;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body onLoad="document.fo.login.focus()">
    <h1>Authentification [ <a href="register.php">Créer un compte</a> ]</h1>
    <div class="erreur"><?php echo $erreur ?></div>
    <form name="fo" method="post" action="">
        <input type="text" name="login" placeholder="Login" /><br />
        <input type="password" name="pass" placeholder="Mot de passe" /><br />
        <input type="submit" name="submit" value="S'authentifier" />
    </form>
</body>

</html>