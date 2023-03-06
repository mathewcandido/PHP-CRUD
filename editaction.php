<?php
require 'config/db.php';
require 'Dao/UserDaoMysql.php';

//aqui estou estanciando e passando o pdo que é a conexão
$userDaomsq = new UserDaoMysql($pdo);

//regatando os valores digitados pelo usuário
$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$observ = filter_input(INPUT_POST, 'observation');
//validando 
if ($id && $name && $email) {

    $user = new Users();
    $user->setID($id);
    $user->setName($name);
    $user->setEmail($email);
    $user->setObservation($observ);
    $userDaomsq->update($user);

    header("Location: index.php");
    exit;
} else {
    header("Location: edit.php?=".$id);
    exit;
}
