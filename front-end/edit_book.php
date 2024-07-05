<?php 
    $page = "edit_book";
    include(URL_PAGE."header.php")
?>
<main>
    <div class="register">

        <div class="card">
            <h1>Update Book</h1>
            <form action="" method="post">
                <div>
                    <label for="isbn">ISBN :</label>
                    <input type="text" value="<?= $livre->ISBN ?>" name="ISBN" id="isbn">
                </div>
                <div>
                    <label for="titre">Title :</label>
                    <input type="text" value="<?= $livre->titre ?>" name="titre" id="titre">
                </div>
                <div>
                    <label for="auteur">Autor :</label>
                    <input type="text" value="<?= $livre->auteur ?>" name="auteur" id="auteur">
                </div>
                <div>
                    <label for="stock">Stock :</label>
                    <input type="number" value="<?= $livre->stock ?>" name="stock" id="stock">
                </div>
                <div>
                    <label for="pu">Unit price :</label>
                    <input type="number" step="0.01" value="<?= $livre->pu ?>" name="pu" id="pu">
                </div>
                    <input type="hidden" name="codeLivre" value="<?=$livre->codeLivre?>" >
                    <input type="hidden" name="REF" value="0">
                
                <input type="submit" name="submit" value="Update">
            </form>
        </div>
    </div>
    
</main>


<?php include(URL_PAGE."footer.php") ?>