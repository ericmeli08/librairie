<?php 
    $page = "boutique";
    include (URL_PAGE."header.php");
    if($admin){
        if(isset($_GET['from'])){
            include(URL_PAGE."successfull.php");
        }
    }
    ?>
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
                        <P><?= count($livres); ?> Book<?= count($livres)>1 ? 's': ''?></P>
                    </div>
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th>REF</th>
                                <th>Titles</th>
                                <th>Autors</th>
                                <th>Amount</th>
                                <th>Completion</th>
                                <?= $admin ? '<th>Actions</th>':''?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                foreach ($livres as $livre) {
                                    $livre = new Livre($livre);
                                    echo "<tr class='ligne' >";
                                    echo "<td> <a href=" . $_SERVER['PHP_SELF'] . "?id=" . $livre->codeLivre . "> " . $livre->REF . "</a> </td>";
                                    echo "<td> " . $livre->titre . "</td>";
                                    echo "<td> " . $livre->auteur . "</td>";
                                    echo "<td><span> " . $livre->pu*1 . "frcs</span></td>";
                                    echo "<td class='progress' > " . $livre->stock . "<span><span class='progress-bar' ></span></span></td>";
                                    if($admin)
                                        echo "<td><a class='edit' href='".URL_CONTROLLER2."edit_bookController?id=$livre->codeLivre&from=boutiqueController.php'>Edit</a> <a class='delete'  href='".$_SERVER['PHP_SELF']."?id=$livre->codeLivre&from=boutiqueController.php'> Delete</a>  </td>";
                                    echo "</tr>";
                                }
                               
                            
                            ?>
                        </tbody>
                    </table>

                    <div class="table_footer">
                    <button class="previous" id="previous">Previous</button>
                    <div id="pagination" ></div>
                    <button class="next" id="next">Next</button>
                  </div>
                </div>
                <div class="select">
                    <div class="resume">
                        <h3>Resume</h3>
                        <br>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae atque repellat magnam sequi qui temporibus numquam similique possimus a dolor officiis molestias iusto alias voluptatem, odit aliquam fuga unde. Quos.
                            Totam beatae perspiciatis veniam ex! Laboriosam expedita placeat ut, enim maxime doloremque delectus incidunt, eveniet earum accusantium magnam porro rerum necessitatibus id nesciunt perferendis quidem vitae laudantium nam quasi quisquam?</p>
                        <br>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel quasi consectetur asperiores vero aut nobis eum saepe reiciendis fugit facilis ducimus molestiae mollitia deserunt, earum autem distinctio, officia eligendi! Culpa?
                            At corrupti labore quam dolorum eos sapiente maiores sunt nam praesentium debitis in quos alias porro beatae dolor blanditiis quia, pariatur sequi omnis rem nisi quaerat non. Mollitia, minima doloremque!</p>
                        <br>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores quo ipsa minus laudantium illo reprehenderit praesentium rem tempore quidem deleniti perferendis, voluptates blanditiis voluptatibus totam libero unde magnam itaque accusantium?
                            Fuga soluta magni iste aspernatur nesciunt velit libero voluptate unde, inventore accusantium, aut, possimus maiores saepe magnam! At, aliquid accusantium laboriosam saepe voluptatibus rerum fuga, unde quod vitae atque sit.</p>
                    </div>
                    <div class="info">
                  
                        <h2><?= $book->titre ?></h2>
                        <p>REF    : <i><?= $book->REF ?></i> </p>
                        <p>ISBN   : <i><?= nl2br($book->ISBN) ?></i> </p>
                        <p>Autor : <i><?= nl2br($book->auteur)?></i> </p>
                        <p> Stock : <i> <?= $book->stock ?></i></p>
                        <p><i>Add to cart </i></p>
                        <form action="<?=URL_CONTROLLER2?>ajout_caddieController.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="submit" class="add-panier" value="<?= $book->pu*1 ?> frcs" />
                        </form>
                    </div>
                </div>
                <?php
                    if (!empty($_COOKIE['monpanier'])) {
                        echo "<div class='panier'>";
                        $tab = explode(",", $_COOKIE['monpanier']);
                        $nblivres = sizeof($tab) - 1;
                        $s = $nblivres>1?'s':"";
                        echo"<p> Number of books in the cart : <span>".$nblivres." livre". $s ."</span></p>";       
                        echo "<form action='".URL_CONTROLLER2."voir_caddieController.php' method='post'>";
                        echo "<input type='submit'class='add-panier' value='see the order'/></form>";
                        echo"</div>";
                    }
                    ?>
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

     <?php include (URL_PAGE."footer.php") ?>
