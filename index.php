<?php
include_once("templates/header.php");

$list = $userDaomsq->findAll();

?>

<div class="container">
    <?php if (isset($printMsg) && $printMsg != '') : ?>
        <p id="msg"><?= $printMsg ?></p>
    <?php endif; ?>
    <h1 id="main-title">Minha Agenda</h1>
    <?php if (count($list) > 0) : ?>
        <table class="table" id="contacts-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome:</th>
                    <th scope="col">Email:</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $item) : ?>
                    <tr>
                        <td scope='row' class="col-id"><?= $item->getID() ?></td>
                        <td scope='row'><?= $item->getName()?></td>
                        <td scope='row'><?= $item->getEmail() ?></td>
                        <td>
                        <td class="actions">
                            <a href="<?= $BASE_URL ?>show.php?id=<?=$item->getID() ?>"><i class="fas fa-eye check-icon"></i></a>
                            <a href="<?= $BASE_URL ?>edit.php?id=<?=$item->getID() ?>"><i class="far fa-edit edit-icon"></i></a>
                            <form class="delete-form" action="<?= $BASE_URL ?>delete.php?id">
                                <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="id" value="<?=$item->getID() ?>">
                                <button type="submit"><i class="fas fa-times delete-icon"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    <?php else : ?>
        <p id="empty-list-text">Ainda não há contatos na sua agenda, <a href="<?= $BASE_URL ?>create.php">clique aqui para adicionar</a>.</p>
    <?php endif; ?>

</div>


<?php
include_once("templates/footer.php")
?>