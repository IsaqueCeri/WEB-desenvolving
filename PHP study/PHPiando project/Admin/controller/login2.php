<?php
include_once '../config/db.php';

$response = [];
$errors = [];
//$erro = '';
//$erro .= empty($_POST['email']) ? 'Informe o email.' : '';
//$erro .= empty($_POST['senha']) ? 'Informe a senha.' : '';

//$erro = [] ;
//empty($_POST['email']) ? $erro[] = 'informe o email.' : '';
//empty($_POST['password']) ? $erro[] = 'informe a senha.' : '';

try {
    
    if(empty($_POST['email'])){
        $errors[] = 'Informe o email';

    }

    if(empty($_POST['password'])){
        $errors[] = 'Informe a senha';
    }

    if (!empty($errors)) {
        throw new Exception(message: json_encode($errors));
    }  
        $select = "SELECT * FROM users where email = ? LIMIT 1";
        $stmt = $db->prepare(query: $select);
        $stmt -> bind_param("s", $_POST["email"]);
        $stmt -> execute();
        $result = $stmt->get_result();

    if($result ->num_rows == 0){
        throw new Exception(message: json_encode("O email não existe"));
    }
    
    $user = $result->fetch_object();

    if(!password_verify($_POST['password'],  hash: $user -> password)){
        throw new Exception(message: json_encode("A senha está incorreta"));
    }

    $_SESSION['userLogged'] = true;
    $_SESSION['userName'] = $user -> name;
    $_SESSION['userId'] = $user -> id;

    $response = [
        'status' => true,
    ];

} catch (Exception $ex) {
    $response = [
        'status'=> false,
        'mensagem'=> json_decode($ex->getMessage()),
    ];
}

//if(count(value: $erro) == 0){
//sem erros
//}else{
    
//}
echo json_encode($response);

//$error = TRUE; //possui erro
//$_SESSION['userLogged'] = "Isaque";
//
//if($error) {
//   header("Location: ../login.php?error=Dados incorretos");
//}else{
//    header("Location: ../index.php");
//}