<?php

require 'config/db.php';
require 'Dao/UserDaoMysql.php';

//aqui estou estanciando e passando o pdo que é a conexão
$userDaomsq = new UserDaoMysql($pdo);

//regatando os valores digitados pelo usuário 
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$observ = filter_input(INPUT_POST, 'observation');


//validando os Obrigatórios 
if ($name && $email) {
    // Se não tiver um email igual ao já registrado ele entra 
    if ($userDaomsq->findbyEmail($email) === false) {
        $newuser = new Users();
        $newuser->setName($name);
        $newuser->setEmail($email);
        $newuser->setObservation($observ);
        $userDaomsq->add($newuser);
        header("Location: index.php");
        exit;
    }
}else{

    header("Location: create.php");
    exit;
}
