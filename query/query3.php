<!DOCTYPE html>
<head>
    <title>query1</title>
</head>
<body>
<?php
echo 	"Trovare i nomi dei velisti che non hanno prenotato la barca numero [parametro numero barca]";

include "connessione.php";

$idBarca=$_POST['idBarca'];
$sql = "SELECT num_tessera,nomeSc
FROM Socio JOIN Prenotazione USING(num_tessera)
WHERE  num_tessera NOT IN(SELECT num_tessera
                          FROM Prenotazione
                          WHERE idBarca=$idBarca)";
echo $sql;
$stmt= $db->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    echo "<br>$row[num_tessera] ";
    echo "<br>$row[nomeSc] ";
   
    
   
}

    ?>    
    

</body>
</html>