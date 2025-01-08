<!DOCTYPE html>
<head>
    <title>query1</title>
</head>
<body>
<?php
echo 	"Trovare i codici delle barche che siano state prenotate da qualche
velista con esperienza pari almeno a [parametro esperienza velista] 
che abbia meno di [parametro anni velista] ";

include "connessione.php";
$anni=$_POST['anni'];
$esperienza=$_POST['esperienza'];
$sql = "SELECT nomeSc,idBarca
        FROM Socio JOIN Prenotazione USING(num_tessera)
        WHERE eta<$anni AND esperienza>=$esperienza ";
echo $sql;
$stmt= $db->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    echo "<br>$row[nomeSc] ";
   
    
   
}

    ?>    
    

</body>
</html>