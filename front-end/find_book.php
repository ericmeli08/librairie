<?php 
    $page = "find_book";
    include(URL_PAGE."header.php");
    if($admin){
        if(isset($_GET['from'])){
            include(URL_PAGE."successfull.php");
        }
    }
?>
<div class="search">
    <div>
        <h1> Search for books </h1>
        <form action="" method="post">
            <div>
                <label for="">Choose the search field :</label><br>
                <select name="typeRech">
                    <option value="auteur"> Autor</option>
                    <option value="titre"> Title </option>
                    <option value="isbn"> ISBN</option> 
                </select>
            </div>
            <div>
                <label for="">Enter the search term :</label><br>
                <input name="termeRech" type="text">
            </div>
            <br>
            <input type="submit" name="submit"  value="Rechercher">
        </form>
    </div>
</div>
<main>
    <aside class="services">
        <div>
            <h1>DELIVERY</h1>
            <div>
                For better experience you can book a delivery to directly go your book at home or at your workplace.
                <br><br><a href="#">READ MORE</a>
            </div>
            <div>
                <img src="<?=URL_IMG?>illustrations/rocket-dark.png" alt="">
            </div>
        </div>

    </aside>
    <article class="livres">

        <div class="card">
            <div class="row">
                <h4>List Books</h4>
                <P><?= count($livres); ?> Book<?= count($livres)>1? 's': ''?></P>
            </div>
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th>REF</th>
                        <th>Autors</th>
                        <th>Titles</th>
                        <th>Amount</th>
                        <th>Completion</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            
                        foreach ($livres as $livre) {
                            $livre = new Livre($livre);
                            echo "<tr class='ligne' >";
                            echo "<td> $livre->REF </td>";
                            echo "<td> " . $livre->auteur . "</td>";
                            echo "<td> $livre->titre </td>";
                            echo "<td><span> " . $livre->pu*1 . "frcs</span></td>";
                            echo "<td class='progress' > " . $livre->stock . "<span><span class='progress-bar' ></span></span></td>";
                            echo "<td><a class='edit' href='".URL_CONTROLLER2."edit_bookController?id=$livre->codeLivre&from=find_bookController.php'>Edit</a> <a class='delete' href='".$_SERVER['PHP_SELF']."?id=$livre->codeLivre&from=find_bookController.php'> Delete</a>  </td>";
                            echo "</tr>";
                        }
                            
                    ?>
                </tbody>
            </table>

            <div class="table_footer">
                <button class="previous" id="previous">Previous</button>
                <div id="pagination"></div>
                <button class="next" id="next">Next</button>
            </div>
        </div>
    </article>
    <aside class="section-commentaires">
        <h1>users comments</h1>
        <div class="commentaires">

            <?php 
                        
                        foreach ($commentaires as $commentaire) {
                            $commentaire = new Commentaire($commentaire);
                            echo "<div class='commentaire'>";
                            echo "    <img src='".URL_IMG."icon/contacts.png' alt=''>";
                            echo "    <div class='cmt'>";
                            echo "        <h5>".  $commentaire->email  ."</h5>";
                            echo "        <span>" . $commentaire->commentaire . "</span>";
                            echo "        <span>" . $commentaire->date_create . "</span>";
                            echo "    </div>";
                            echo "</div>";
                        }
                        foreach ($commentaires as $commentaire) {
                            $commentaire = new Commentaire($commentaire);
                            echo "<div class='commentaire'>";
                            echo "    <img src='".URL_IMG."icon/contacts.png' alt=''>";
                            echo "    <div class='cmt'>";
                            echo "        <h5>". $commentaire->email  ."</h5>";
                            echo "        <span>" . $commentaire->commentaire . "</span>";
                            echo "        <span>" . $commentaire->date_create . "</span>";
                            echo "    </div>";
                            echo "</div>";
                        }
                    
                    ?>

        </div>
    </aside>
</main>

<?php include(URL_PAGE."footer.php") ?>