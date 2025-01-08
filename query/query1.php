<!DOCTYPE html>
<head>
    <title>query1</title>
</head>
<body>
<?php
echo 	"Trovare i codici dei velisti che hanno prenotato barca di colore [parametro colore barca]";

include "connessione.php";
$colore=$_POST['colore'];
$sql = "SELECT num_tessera,idBarca
        FROM Prenotazione JOIN Barca USING(idBarca)
        WHERE colore='$colore' ";
echo $sql;
$stmt= $db->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    echo "<br>$row[num_tessera] ";
    echo "<br>$row[idBarca] <br>";
    
   
}

    ?>    
    

</body>
</html>