<?php
$seveur="localhost";
$dbname="queenbeauty";
$user="root";
$pass="";
  $name=$_POST ['name'];
  $email=$_POST ['email'];
  $number=$_POST ['number'];
  $message=$_POST ['message'];
  try{
    $dbco= new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
    $dbco->setAttribute(PDO ::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION).
    $sth = $dbco ->prepare("
    INSERT INTO `inscription` (`name`, `email`, `number`, `message`) VALUES (':Nom', ':email', ':number', ':message');
    ");
    $sth-> bindParam(':Nom',$name);
    $sth-> bindParam(':email',$email);
    $sth-> bindParam(':number',$number);
    $sth-> bindParam(':message',$message);
    $sth-> execute();
    header("Location:log.html");

  }

  catch( PDOException $e){
    echo 'Erreur :'.$e->getMessage();
  }

?>