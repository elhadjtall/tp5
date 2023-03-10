<?php
session_start();
$bdd= new PDO('mysql:host=localhost; dbname=tp5; charset=utf8;', 'root', '');
if(isset($_POST['submit'])){
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['password'])){
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = sha1($_POST['password']);

    $insertUser = $bdd->prepare('INSERT INTO user(nom, prenom, email, password) VALUES(?, ?, ?, ?)');
    $insertUser->execute(array($nom, $prenom, $email, $password));

    // $recupUser = $bdd->prepare('SELECT * FROM user WHERE nom=?, prenom=?, email=?, password=?');
    // $recupUser->execute(array($nom, $prenom, $email, $password));
    // if($recupUser->rowCount() >0){
    // $_SESSION['nom'] = $nom;
    // $_SESSION['prenom'] = $prenom;
    // $_SESSION['email'] = $email;
    // $_SESSION['password'] = $password;
    // $_SESSION['id'] = $recupUser->fetch()['id'];
    // }
    // echo $_SESSION['id'];
    
    }else{
        echo "Veillez remplir les champs !";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form action="" method="POST">
        <p><input type="text"     name="nom"      placeholder="nom"></p>
        <p><input type="text"     name="prenom"   placeholder="prenom"></p>
        <p><input type="email"    name="email"    placeholder="prenom"></p>
        <p><input type="password" name="password" placeholder="mot de passe"></p>
        <p><input type="submit"   name="submit"   value="inscription"></p>
    </form>
</body>
</html>