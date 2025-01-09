
<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>barche admin
</title>
<table id="data" class="table table-bordered table-striped">
<thead>
   
            <tr align="center">
              <th width="3%">ID</th>
              <th width="3%">nome</th>
              <th width="3%">colore</th>
              <th width="3%">data inizio </th>
              <th width="3%">data fine</th>
              <th width="3%">elimina</th>
              
              
          
            </tr>
            </thead>

</head>
<?php
if(isset($_POST['utente'])){
    $_SESSION["utente"] = $_POST['utente'];
}
if(isset($_POST['password'])){
    $_SESSION["password"] = $_POST['password'];
}
?>
<?php
   include "connessione.php";
$pwd= $_SESSION["utente"];
$pws= $_SESSION["password"];

$sql ="SELECT tipo, num_tessera
FROM Socio 
WHERE Socio.username='$pwd' ";
$check= $db->prepare($sql);
$check-> execute();
$row= $check -> fetch(PDO::FETCH_BOTH);
$_SESSION["num_tessera"]=$row['num_tessera'];
$_SESSION["tipo"]=$row['tipo'];
if($_SESSION["tipo"]== ""){
    header("Location: ./index.html");
    die();
}//controllo credenziali

?>

<body>
    <?php     
    
    include "connessione.php";
    $pwd=$_SESSION["utente"];
    $pwr=$_SESSION["password"];
    $sql ="SELECT Barca.nome,Barca.colore,idBarca
    FROM Barca 
   ";

    $stmt= $db->prepare($sql);
    $stmt-> execute();


    while($row= $stmt -> fetch(PDO::FETCH_BOTH)){
        $barca =$row['idBarca'];
        echo "<tr>";
        echo "<td>$barca";
        echo "<td>$row[nome]";
        echo "<td>$row[colore]";
        $select ="SELECT data_prenotazioneIN,data_prenotazioneFIN
        FROM Barca join Prenotazione USING(idBarca)";
        $seleziona= $db->prepare($select);
        $seleziona-> execute();
        while($row= $seleziona -> fetch(PDO::FETCH_BOTH));
        if($row==false){
      echo "<td>barca non prenotata";
      echo "<td>barca non prenotata";
        }else{
        echo "<td>data prenIN:<form method='POST'  action='./update.php'>
        <input type='hidden' value=' $barca' name='idBarca' id='idBarca'>
        <input type='text' value=' $row[data_prenotazioneIN]' name='data_prenotazioneIN' id='data_prenotazioneIN'></form> ";
    echo "<td>data prenfin:<form action='./update2.php' method='POST'name='modulo2' onsubmit='return controlloDataFine()'>
    <input type='hidden' value=' $barca' name='idBarca' id='idBarca'>
    <input type='text' value=' $row[data_prenotazioneFIN]' name='data_prenotazioneFIN' id='data_prenotazioneFIN'> </form>";//controllo prenotazione effettuata o no e se si visualizzazione dati di essa
    
    
        
    
    }   
    echo  "<td><br><form action='./elimina.php' method='POST'>
         <input type='hidden' value='$barca' name='elimina' id='elimina'>
         <input type='submit' value='elimina'><br><br>
         </form> <br> <br></tr>";//bottone per'elliminazione
  }

 echo  "<form action='./aggiungi.html' method='POST'>
         <input type='submit' value='aggiungi barca'>
  
         </form>";//bottone che porta a pagina per aggiunta barche
        

        echo "<br><br><br><br><a href='./query/query.html'>
        <label>visualizza query</label> 
        </a>";
        echo "</tr>";   






        
    ?>
    <br><a href="index.html">
    <label>TORNA ALLA HOME</label>
    <style>
    body {background-color: blue ;}
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}th, td {
  background-color: white;
}

    </style>
