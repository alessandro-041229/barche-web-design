<!DOCTYPE html>
<html>
<head>
    <title>elimina
</title>
</head>

<body>
    <?php
    include "connessione.php";
    $nome=$_POST['nome'];
    $cognome=$_POST['cognome'];
    $eta=$_POST['eta'];
    $esperienza=$_POST['esperienza'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if($eta<18 ||$esperienza>10 || $esperienza<0){//controllo se i requisiti dell'esperienza e eta sono rispettati
        echo "eta o esperienza non valida(eta necessaria >18 ed esperienza compresa tra 0 e 10 ";
        
      }else{

      $controllonome ="SELECT username
                       FROM Socio
                       WHERE username= '$username'";
                       $check= $db->prepare($controllonome);
                       $check->execute();
                       ($row_controllo= $check -> fetch(PDO::FETCH_BOTH));
                       if($row_controllo==false){//controllo se esiste già un utente con stesso username
  echo "<h1> utente aggiunto con sucesso</h1>";
    $sql = "INSERT INTO Socio(nomeSc,cognome,eta,esperienza,tipo,username,pass)
            VALUES ('$nome','$cognome','$eta','$esperienza','user','$username',SHA('$password'));";//aggiungo utente nella tabella socio
    
    $stmt= $db->prepare($sql);
    $stmt->execute();
      }else{
        echo "username già in uso";
      }
    }
    ?>
<br><a href="registra.html">
    <label>TORNA ALLA REGISTRA</label>
    <br><a href="index.html">
    <label>TORNA ALLA HOME</label>

