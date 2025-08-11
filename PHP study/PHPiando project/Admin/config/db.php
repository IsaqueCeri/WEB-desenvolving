<?php
include_once 'config.php';

$db = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_SCHEMA, DB_PORT);

if ($db->connect_errno) {
echo"Erro no banco de dados: ". $db->connect_error;
exit();
}

//testes anteriores com o banco de dados.
//$senha = MD5('');
//$select = "SELECT * FROM users";
//$result = $db->query($select);
//$insert = "INSERT INTO users (name, email, password, birthday) VALUES ('deiv', 'deivo@poketreiner.com', '{$senha}', '2001-01-24')";
//$result = $db->query($insert);
//if ($result) {
  //  while($obj = $result->fetch_object()) {
  //      echo"Nome: " .$obj->name. " <br>";
  //  }
    //echo"Dados inseridos";
   // while($obj = $result->fetch_array()){
   //     echo "ID: {$obj['id']} <br>";
   //     echo "Nome: {$obj['name']} <br>";
   //     echo "Email: {$obj['email']} <br>";
   // }
//}else{
//echo "Erro no SELECT: {$db->error}";   
//}
//$db->close();
?>