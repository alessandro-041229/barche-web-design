<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>visualizza prenotazioni
</title>
<table id="data" class="table table-bordered table-striped">
<thead>
<tr align="center">
              <th width="3%">num_tessera</th>
              <th width="3%">idBarca</th>
              <th width="3%">data_prenIN</th>
              <th width="3%">data_prenFIN</th>
              <th width="3%">disponibilita</th>
              
              
              
              
            
            </tr>
</thead>
</head>



<body>
    <?php
    
    include "connessione.php";
   
     $barca=$_POST["idBarca"];
    echo $barca;
    
    $sql ="SELECT data_prenotazioneIN,data_prenotazioneFIN,idBarca,num_tessera
    FROM Prenotazione
    WHERE idBarca=$barca";//selezino dati prenotazioni in base all'id della barca 
    echo $sql;
    $stmt= $db->prepare($sql);
    $stmt-> execute();


    while($row= $stmt -> fetch(PDO::FETCH_BOTH)){
                echo "<tr>";
                echo "<td>$row[num_tessera]";
        echo "<td>$row[idBarca]";
        echo "<td>$row[data_prenotazioneIN]";
        echo "<td>$row[data_prenotazioneFIN]";//stampo prenotazioni
        $datacorrente="SELECT  CURRENT_TIMESTAMP ";   //query select current date
        $datacurrent = $db->prepare($datacorrente);
        $datacurrent-> execute();
        ($row_data= $datacurrent -> fetch(PDO::FETCH_BOTH));
        $data = substr($row_data["CURRENT_TIMESTAMP"], 0, 10);
        $data_dt = new DateTime($data);
        $data_pi = new DateTime($row['data_prenotazioneIN']);
            $data_pf = new DateTime($row['data_prenotazioneFIN']);
        if($data >=$data_pi && $data <=$data_pf){//controllo se la data currente è uguale o compresa nei giorni di una prenotazione
            echo "<td>prenotato";
        }else{
            echo "<td>non ancora giorno di prenotazione";
        }
            
            
            }
            
            
        
    
    
    
 echo "</tr>";


 echo "<br>prenota:<form action='./prenota.php' method='POST'>
 <input type='hidden' value='$barca' name='idBarca' id='idBarca'>
 <br>data inizio:<input type='text' value='data' name='data' id='data'>
 <br>data fine:<input type='text' value='datafin' name='datafin' id='datafin'>
 <input type='submit' value='prenota'><br><br>
 </form> <br> <br>";


    

     /*
        $select ="SELECT data_prenotazioneIN,data_prenotazioneFIN
        FROM Barca join Prenotazione USING(idBarca)";
        $seleziona= $db->prepare($select);
        $seleziona-> execute();
        while($row= $seleziona -> fetch(PDO::FETCH_BOTH));
        
        if($row== false){
            $controllo="SELECT num_tessera,idBarca
                FROM Prenotazione
                WHERE num_tessera=$_SESSION[num_tessera] AND idBarca= $barca";
            $eseguicontrollo = $db->prepare($controllo);
            $eseguicontrollo-> execute();
            ($row_controllo= $eseguicontrollo -> fetch(PDO::FETCH_BOTH));
            if($row_controllo==false){
            */
?>
</body>
<br><a href='login.php'>
 <label>pagina per visualizazione barche</label>
 <br><br><a href='index.html'>
 <label>home</label>

     



    <style>
    body {background-color: orange ;}
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}th, td {
  background-color: white;
}

    </style>