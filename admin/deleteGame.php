<?php 
    $id = $_GET['id'];
    include "config.php";

    $sql = "DELETE FROM gametable WHERE gameID = $id"; 

    if ($con->query($sql) === TRUE) {
        header('Location: addGame.php');
        exit;
    } else {
       echo "<script>alert('Cannot dele this Game');
       window.location.href='addGame.php';</script>";
    }
?>