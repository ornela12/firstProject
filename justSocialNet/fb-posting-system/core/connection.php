<?php
 try {
    $pdo = new PDO('mysql:host=localhost;dbname=posting-system', 'root', '');
     
} catch (PDOException $e) {
    print "Connection Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
