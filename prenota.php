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
    $idBarca=$_POST['idBarca'];
    $data=$_POST['data'];
    $datafin=$_POST['datafin'];
    $idCliente=$_SESSION['num_tessera'];//post presi dalla pagina prenotazione

    $datacorrente="SELECT  CURRENT_TIMESTAMP ";   //query select current date
    $datacurrent = $db->prepare($datacorrente);
    $datacurrent-> execute();
    ($row_data= $datacurrent -> fetch(PDO::FETCH_BOTH));
    $datacurr = substr($row_data["CURRENT_TIMESTAMP"], 0, 10);
    $data_dt = new DateTime($datacurr);

    if( $data>=$data_dt){//controllo se la data currente é maggiore o uguale alla data inserita
        echo "data inserita non valida";
        
    }else{
        $selectdata= "SELECT data_prenotazioneIN,data_prenotazioneFIN
        FROM Prenotazione
        WHERE $data BETWEEN data_prenotazioneIN AND 
        data_prenotazioneFIN OR $datafin BETWEEN data_prenotazioneIN AND data_prenotazioneFIN";//query che stampa row se la data inserita da input e compresa in una 
                                                                                               //bdelle combinazioni data inizio e fine
        $select = $db->prepare($selectdata);
        $select-> execute();
        ($row_check= $select -> fetch(PDO::FETCH_BOTH));
        if($row_check ==false){ //controllo se non stampa row
    $aggiungi = "INSERT INTO Prenotazione(num_tessera,idBarca,data_prenotazioneIN,data_prenotazioneFIN)
    VALUE ($idCliente,$idBarca,'$data','$datafin')";//aggiungo prenotazione

$add= $db->prepare($aggiungi);
$add->execute();

    echo "<h1> prenotazione eseguita con sucesso </h1>";
   
}else{
    echo "data non valida";
}
    }

    ?>
<a href="login.php">
    <label>TORNA alla pagina di visualizzazione barche</label>
