<?php
include_once("templates/header.php");
include_once("config/url.php");

$list = $userDaomsq->findAll();
?>
<?php foreach ($list as $item) : ?>
    <div class="container" id="view-contact-container">
        <?php include_once("templates/backbtn.php"); ?>
        <h1 id="main-title"><?= $item->getName()?></h1>
        <p class="bold">Email:</p>
        <p><?= $item->getEmail()?></p>
        <p class="bold">Observações:</p>
        <p><?= $item->getObservation()?></p>
    </div>

<?php endforeach ?>
<?php
include_once("templates/footer.php")
?>