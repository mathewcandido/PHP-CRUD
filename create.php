<?php
include_once("templates/header.php");
?>
<div class="container">
    <?php include_once("templates/backbtn.php"); ?>

    <h1 id="main-title">Criar contato</h1>

    <form id="create-form" action="<?= $BASE_URL ?>createaction.php" method="POST">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
            <label for="name">Nome do contato</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Digite o seu Email" required>
        </div>
        <div class="form-group">
            <label for="observations">Observações</label>
            <textarea class="form-control" id="observation" name="observation" rows="3" placeholder="Insira as observações"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

</form>


</div>

<?php
include_once("templates/footer.php")
?>