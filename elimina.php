<!DOCTYPE html>
<html>
<head>
    <title>elimina
</title>
</head>

<body>
    <?php
    include "connessione.php";
    $elimina=$_POST['elimina'];//dato ottenuto da admin.php necessario per delete

    $sql = "DELETE FROM prenotazione WHERE idBarca=$elimina";//elimino le informazioni della barca prima dalla tabella che la ha come foreign key
    
    $stmt= $db->prepare($sql);
    $stmt->execute();
    $sqs = "DELETE FROM Barca WHERE idBarca=$elimina";//e poi dalla tabella barche in se stessa
    echo $sqs;
    $stmx= $db->prepare($sqs);
    $stmx->execute();
    echo "<h1> barca eliminata con sucesso</h1>";
    ?>
<a href="admin.php">
    <label>TORNA ALLA HOME</label>
