<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>visualizza sconto
</title>
<table id="data" class="table table-bordered table-striped">
<thead>
<tr align="center">
              <th width="3%">ID</th>
              <th width="3%">nome</th>
              <th width="3%">colore</th>
              
              <th width="3%">prenota</th>
              <th width="3%">data inizio </th>
              <th width="3%">data fine</th>
              
              
              
              
              <th width="3%"></th>
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
}

?>


<body>
    <?php
    
    include "connessione.php";
    if($_SESSION["tipo"]== 'admin'){
        header("Location: ./admin.php");
             
    
     
    }if($_SESSION["tipo"]== 'user' ){
    
    $sql ="SELECT Barca.nome,Barca.colore,idBarca
    FROM Barca";
    $stmt= $db->prepare($sql);
    $stmt-> execute();


    while($row= $stmt -> fetch(PDO::FETCH_BOTH)){
        echo "<tr>";
        echo "<td>$row[idBarca]";
        echo "<td>$row[nome]";
        echo "<td>$row[colore]";//stampo informazioni barche 

        $barca= $row['idBarca'];
        echo "<td>prenota:<form action='./prenotazione.php' method='POST'>
        <input type='hidden' value='$barca' name='idBarca' id='idBarca'>
        <input type='submit' value='prenota'><br><br>
        </form> <br> <br>";//form che conduce alla pagina prenotazione dove si visualizzera poi le prenotazioni 
        
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

                echo "<td>prenota:<form action='./prenota.php' method='POST'>
                <input type='hidden' value='$barca' name='idBarca' id='idBarca'>
                <td>data inizio:<input type='text' value='data' name='data' id='data'>
                <td>data fine:<input type='text' value='datafin' name='datafin' id='datafin'>
                <input type='submit' value='prenota'><br><br>
                </form> <br> <br>";
            }else{
                echo "<td>prenotato";
            }
            
        }
                        codice commentato perche non necessario*/
       
    
    }
    
 echo "</tr>";



    
}
    




     





        
    ?>
     <br><a href="index.html">
    <label>TORNA ALLA HOME</label>

    <style>
    body {background-image: url('mare.jpg');}
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}th, td {
  background-color: white;
}
html{
    background-image: url('mare.jpg');
}
    </style>

    </style>
