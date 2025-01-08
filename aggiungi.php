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
    $colore=$_POST['colore'];//dati presi in post da aggiungi.html
    

    $sql = "INSERT INTO Barca(nome,colore)
            VALUES ('$nome','$colore');";//aggiungo una barca alla tabella
    echo $sql;
    $stmt= $db->prepare($sql);
    $stmt->execute();
    echo "<h1> barca aggiunta con sucesso</h1>";
    ?>
<a href="admin.php">
    <label>TORNA ALLA pagina di visualizzazione barche</label>
