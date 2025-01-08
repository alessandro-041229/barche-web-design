<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>elimina
</title>
</head>

<body>
    <?php
    include "connessione.php";
    $pwd=$_POST['idBarca'];
    $pwc=$_POST['data_prenotazioneFIN'];

    $sql= "UPDATE Barca
           SET data_prenotazioneFIN= '$pwc'
           WHERE idBrano= $pwd";

               $stmt= $db->prepare($sql);
               $stmt-> execute();
               echo $sql;
    echo "<h1>data aggiornata</h1>";
    ?>
<a href="login.php">
<label>torna alla pagina di visualizzazione BARCHE</label>