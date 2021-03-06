<?php
session_start();
@$nom = $_POST["nom"];
@$prenom = $_POST["prenom"];
@$login = $_POST["login"];
@$pass = $_POST["pass"];
@$repass = $_POST["repass"];
@$submit = $_POST["submit"];
$erreur = "";
if (isset($submit)) {
    if (empty($nom)) $erreur = "Nom laissé vide!";
    elseif (empty($prenom)) $erreur = "Prénom laissé vide!";
    elseif (empty($prenom)) $erreur = "Prénom laissé vide!";
    elseif (empty($login)) $erreur = "Login laissé vide!";
    elseif (empty($pass)) $erreur = "Mot de passe laissé vide!";
    elseif ($pass != $repass) $erreur = "Mots de passe non identiques!";
    else {
        include("Database/connectDB.php");
        $sel = $connectDB->prepare("select id from members where login=? limit 1");
        $sel->execute(array($login));
        $tab = $sel->fetchAll();
        if (count($tab) > 0)
            $erreur = "Login existe déjà!";
        else {
            $ins = $connectDB->prepare("insert into members(nom,prenom,login,pass) values(?,?,?,?)");
            if ($ins->execute(array($nom, $prenom, $login, md5($pass))))
                header("location:index.php");
        }
    }
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
            margin: 5%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
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

        h1 {
            margin-bottom: 3%;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .erreur {
            color: #CC0000;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Inscription</h1>
    <div class="erreur"><?php echo $erreur ?></div>
    <form name="fo" method="post" action="">
        <input type="text" name="nom" placeholder="Nom" value="<?php echo $nom ?>" /><br />
        <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $prenom ?>" /><br />
        <input type="text" name="login" placeholder="Login" value="<?php echo $login ?>" /><br />
        <input type="password" name="pass" placeholder="Mot de passe" /><br />
        <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />
        <input class="btn_login" type="submit" name="submit" value="S'authentifier" />
    </form>
</body>

</html>