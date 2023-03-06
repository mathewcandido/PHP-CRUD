<?php

include_once("templates/header.php");

$user = false;

$id = filter_input(INPUT_GET, 'id');
//validando se vim $id 
if ($id) {
    //findbyId primeiro faz um SELECT
    $user = $userDaomsq->findbyId($id);
}

if ($user === false) {
    header("Location: index.php");
    exit;
}

?>

<div class="container">
    <?php include_once("templates/backbtn.php"); ?>

    <h1 id="main-title">Editar contato</h1>

    <form id="create-form" action="<?= $BASE_URL ?>editaction.php" method="POST">

        <input type="hidden" name="id" value="<?= $user->getID() ?>">
        <div class="form-group">
            <label for="name">Nome do contato:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" value="<?= $user->getName() ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Digite o seu Email" value="<?= $user->getEmail() ?>" required>
        </div>
        <div class="form-group">
            <label for="observations">Observações:</label>
            <textarea class="form-control" id="observation" name="observation" rows="3" placeholder="Insira as observações"><?= $user->getObservation() ?>"</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

</form>


</div>

<?php
include_once("templates/footer.php")
?>