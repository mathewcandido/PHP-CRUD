<?php
require 'config/db.php';
require 'Dao/UserDaoMysql.php';

//aqui estou estanciando e passando o pdo que é a conexão
$userDaomsq = new UserDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    
    $userDaomsq->delete($id);
}
header("Location: index.php");
exit;
