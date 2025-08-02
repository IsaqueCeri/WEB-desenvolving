<?php
//ini_set('display_errors', 0);
//error_reporting(0);

$db = new mysqli("localhost", "root","" , "project_one", "3306");

if ($db->connect_errno) {
 echo"Erro no banco de dados: ". $db->connect_error;
    exit();
 // ou echo"Erro no banco de dados: {$db->connect_error}" -- mesma coisa que acima^^
}

$select = "SELECT * FROM users";
$result = $db->query($select);

if ($result) {
    while($obj = $result->fetch_object()) {
        echo"Nome: " .$obj->name. " <br>";
    }
}else{
echo "Erro no SELECT: {$db->error}";   
}
 
$db->close();

?>