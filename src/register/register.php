<?php

use PHPMailer\PHPMailer\PHPMailer;

include('../userclass.php');
include_once('../../config/conexao.php');
require('../../config/vendor/phpmailer/phpmailer/src/PHPMailer.php');
require('../../config/vendor/autoload.php');

$user = new User();
$user->login = isset($_POST['login']) ? $_POST['login'] : '';
$user->password = isset($_POST['password']) ? $_POST['password'] : '';
$user->email = isset($_POST['email']) ? $_POST['email'] : '';
$today = date("Y-m-d");

$passwordhash = password_hash($user->password, PASSWORD_BCRYPT);

$conexao = new Connect;
$connection = $conexao->connectDb();

if ($connection) {
    $sql_insert = 'INSERT INTO tb_user VALUES (null, :login, :password, :email, :today);';

    $insert = $connection->prepare($sql_insert);

    $insert->bindValue(':login', $user->login);
    $insert->bindValue(':password', $passwordhash);
    $insert->bindValue(':email', $user->email);
    $insert->bindValue(':today', $today);

    $insert->execute();

    $email = new PHPMailer();
    $email->isSMTP();
    $email->Host = 'smtp.gmail.com';
    $email->SMTPAuth = true;
    $email->SMTPSecure = 'tls';
    $email->Username = 'testapollo707@gmail.com';
    $email->Password = 'xtli bdvr qlhu pmkz';
    $email->Port = 587;

    $email->setFrom('testapollo707@gmail.com');
    $email->isHTML(true);
    $email->addReplyTo('no-reply@email.com.br');
    $email->addAddress($user->email, $user->login);
    $email->Subject = 'Novo Cadastro';
    $email->Body    = 'Teste';

    try {
        $email->send();
        echo 'enviado';
    } catch (Exception $e) {
        echo $email->ErrorInfo;
    }
}
