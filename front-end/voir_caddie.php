<?php


?>

<?php
    $page = "voir_caddie";
    include (URL_PAGE."header.php") 
?>

        <main>
            <div class="livres">

                <div class="card">
                    <a href="<?=URL_CONTROLLER2 ?>delCdeController.php" class="cancel-btn" >Cancel</a>
                    <div class="row">
                        <h4>List Books</h4>
                        <P><?= count($livres); ?> Book<?= count($livres)>1? 's': ''?></P>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>REF</th>
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Prices</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tab = array_count_values(explode(",", $cookie));
                            foreach ($livres as $livre) {

                                echo "<tr class='ligne' >";
                                echo "<td> " . $livre['REF'] . "</td>";
                                echo "<td> " . $livre['titre']."</td>";
                                echo "<td> x(" . $tab[$livre['codeLivre']] . ")</td>";
                                echo "<td>". $livre['pu'] * $tab[$livre['codeLivre']]." frcs</td>";
                                echo "</tr>";
                                $montant += $livre['pu'] * $tab[$livre['codeLivre']];
                                $listeproduits .= ',' . $livre['REF'];
                            }

                            $listeproduits[0] = ' ';
                            $montant += 1000; //frais de livraison
                            echo "<tr class='ligne' ><td class='total'>Montant + Frais (1000) </td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td class='total'>$montant frcs </td>";
                            echo "</tr>";
                            
                            ?>
                        </tbody>
                    </table>

                    <div class="table_footer">
                    <button class="previous" id="previous">Previous</button>
                    <div id="pagination" ></div>
                    <button class="next" id="next">Next</button>
                  </div>
                </div>
            </div>

            <div class="register">
                <div class="card">
                    <h1>Register book<?= count($livres)>1? 's': ''?></h1>
                    <form action="<?= URL_CONTROLLER2?>enreg_cdeController.php" method="post">
                        <input type="hidden" name="montant" value="<?= $montant; ?>" />
                        <input type="hidden" name="listesproduits" value="<?= $listeproduits; ?>" />

                        <div>
                            <label for="name">Name :</label>
                            <input type="text" name="nom" id="name"  value="<?= isset($tab_profil)? $tab_profil['nom'] : "" ?>" placeholder="name">
                        </div>
                        <div>
                            <label for="adresse">Adress :</label>
                            <input type="" name="adresse" id="adresse" value="<?= isset($tab_profil)? $tab_profil['adresse'] : "" ?>" placeholder="Adresse">
                        </div>
                        <input type="submit" name="submit" value="Enregister la commande">
                    </form>
                </div>
                            
            </div>
        </main>

<?php include(URL_PAGE."footer.php") ?>
