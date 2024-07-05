<html>
<head>
<title > Bibliothèque - catalogue des livres </title>
</head>
<body>
<h1>RECHERCHE D'UN LIVRE </h1>
<?php

$stypeRech=$_POST[ 'typeRech'];
$stermeRech=$_PosTltermeRechy：;
$stermeRech= trim($termeRech);
if (!$typeRech || !$termeRech)
echo 'Vous n\'avez entré aucun critère de recherche. Ressayez !.';
exit;
$stypeRech = addslashes($typeRech);
$stermeRech = addslashes($termeRech);
 $db = mysql_connect('localhost', 'moi', 'motdepasse'); 
if (!$db)
{
echo 'Erreur: echec de connexion à la base de données Essayez plutard.';
exit;
}
mysql_select_db('Biblio', $db);
$query = "select * from livres where ".$typeRech." like '%". $termeRech. "%'" ;

$result = mysqlquery ($query);
$num_results = 0;
$num_results = mysql_num_rows($result);
echo '<p>Nombre de livres trouvés :'. $num_results.'</p>';
for ($i=0; $i <$num_results; $i++) // voire boucle while $row = mysql_fetch_array($result)
$row = mysql_fetch_array($result); //obtenir chaque
echo '<p><strong >'($i+1).'Titre: ';
// ordre des livres trouvés
echo htm_specialchars(stripslashes($row['titre']));
echo '</strong ><br />Auteurr::';
echo stripslashes($row['auteur']);
echo '<br />ISBN: ';
echo stripslashes($row['isbn']);
echo '<br />Qté : ';
echo stripslashes($row['stock']);
echo '<br />Prix: ';
echo stripslashes($row['prix']);
echo '</p>';
mysql_close($db);
?>
</body >
</html>

// ==========================================================================
<html >
<head>
<title Bibliothèque - catalogue des livres </tit/e> </head>
<body >
<h1 > RECHERCHE DUN LIVRE </h1 >
<form action = "results.php" method= "post">
Choisir le champ de recherche: <br /> < select name= "typeRech"> <option value= "auteur"> Auteur</option > <option value= "titre"> Titre </option > <option value="isbn"> ISBN</option > </select>
<br />
Entrer le terme de recherche : <br />
<input name= "termeRech" type="text">
<br />
<input type= "submit" value = "Rechercher">
</form> 
</body > 
</html>





// ==========================================================================
<?php
 $bdserver="localhost";
 $bdlogin ="moi";
 $bdpwd="motdepasse";
 $bd="librairie";
 $cdes="cdes";
 $livres="livres";
 $url="http://localhost/travaux-2013/librairie";
?>


// ================================================================
<?php
include("variables.inc.php");
setcookie("monpanier",$_COOKIE['monpanier'].",".$_REQUEST['id']);
header("Location: $url/boutique.php?id=".$_REQUEST['id']);
?>


// =====================================================================
<?php
 include("variables.inc.php");
 if (!isset($_REQUEST['id'])) $id=1;
 else $id=$_REQUEST['id'];
?>
<html>
<head>
<title>Librairie - catalogue</title>
<link href="look.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class='titre'><a href='boutique.php'>Boutique <i>Librairie</i></a></div>
<table class='catalogue'>
<tr>
<td class='liste'>
<div class='tdTitre'>Nos livres</div>
<?php
$db = mysql_connect($bdserver, $bdlogin, $bdpwd);
mysql_select_db($bd);
$sql="select * from $livres";
$resultat = mysql_query($sql);
while ($livre=mysql_fetch_array($resultat))
{
print ("-> ");
print ("<a href=".$_SERVER['PHP_SELF']."?id=".$livre['codeLivre'].">".$livre['titre']."</a>");
print ("<br/>");
 }
?>
</td>
<td class='detail'>
<?php
$sql="select * from $livres where codeLivre='$id'";
$resultat=mysql_query($sql);
$produit =mysql_fetch_array($resultat);
print("<div class='tdTitre'>[ref :".$produit['REF']."]</div>");
?>
<div class='description'>
<?php
 print("ISBN: ". nl2br($produit['ISBN'])."<br/><br/>");
 print("Auteur : ". nl2br($produit['auteur'])."<br/><br/>");
 print("Stock : ".$produit['stock']."<br/><br/>");
 print("Prix : ".$produit['pu']."<br/><br/>");
 mysql_close($db);
?>
<form action="ajout_caddie.php" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>
<input type="submit" value="ajouter au panier"/>
</form>
<?php
if (isset($_COOKIE['monpanier']))
{
print("<div class='panier'>");
$tab=split("," , $_COOKIE['monpanier']);
$nblivres=sizeof($tab)-1;
print ("Dans votre panier : ".$nblivres." livre(s)<br/>");
print("<form action='voir_caddie.php' method='post'>");
print("<input type='submit' value='voir la commande'/></form>");
print("cookie : {".$_COOKIE['monpanier']."}");
print("</div>");
}
?>
</div>
</td>
</tr>
</table>
</body>
</html>

// ======================================================================
<?php
 include("variables.inc.php");
?>
<html>
<head>
<title>Librairie - validation de la commande</title>
<link href="look.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class='titre'><a href='boutique.php'>Boutique <i>Librairie</i></a></div>
<div class='caddie'>
<?php
$montant=0;
$listeproduits=" ";
$_COOKIE['monpanier'][0]=' ';
$db = mysql_connect($bdserver, $bdlogin, $bdpwd);
mysql_select_db($bd);
$sql="select * from $livres where codeLivre IN (".$_COOKIE['monpanier'].")";
$resultat = mysql_query($sql);
print("<table width='90%'>");
$tab=array_count_values(split(",",$_COOKIE['monpanier']));
while ($livre=mysql_fetch_array($resultat))
{
print("<tr><td class=='produit'>");
print("[".$livre['REF']."] ".$livre['titre']);
print("(x ".$tab[$livre['codeLivre']].")");
print("</td><td class='montant'>");
print($livre['pu']*$tab[$livre['codeLivre']]);
print("</td></td>");
$montant +=$livre['pu']*$tab[$livre['codeLivre']];
$listeproduits.=','.$livre['REF'];
}
$listeproduits[0]=' ';
$montant +=1000; //frais de livraison
print("<tr><td class='total'>Montant + Frais (1000) </td>");
print("<td class='total'>$montant </td></tr>");
print("</table>");
mysql_close($db);
?>
<form action="enreg_cde.php" method="post">
<input type="hidden" name="montant" value="<?php echo $montant; ?>"/>
<input type="hidden" name="listesproduits" value="<?php echo $listeproduits; ?>"/>
<?php
if (!empty($_COOKIE['monprofil']))
{
$tab_tmp=split(";;",$_COOKIE['monprofil']);
$i=0;
while($tab_tmp[$i])
{
list($nom,$val)=split("=",$tab_tmp[$i]);
$tab_profil[$nom]=$val;
}
}
?>
<br/><label> Nom : </label>
<input type="text" name="nom" value="<?php echo $tab_profil['nomPrenomCli']?>" />
<br/><label> Adresse : </label>
<input type="text" name="adresse" value="<?php echo $tab_profil['adresse']?>" />
<input type="submit" value="Enregistrer la commande"/>
</form>
</div>
</body>
</html>

// ======================================================================
<?php
 include("variables.inc.php");
 if(empty($_REQUEST['nom'])||empty($_REQUEST['adresse']))
 die("erreur : il y a des champs vides !");
 $db=mysql_connect($bdserver,$bdlogin,$bdpwd);
 mysql_select_db($bd);
 $date=date("Y-m-d G:i:s");
 $_COOKIE['monpanier'][0]=' ';
 $tab_livre=split(",",$_COOKIE['monpanier']);
 $i=0;
 while ($id=$tab_livre[$i])
 {
 $sql="select * from $livres where codeLivre='$id'";
 $resultat=mysql_query($sql);
 $livre=mysql_fetch_array($resultat);
 $montant +=$livre['pu'];
 $listeproduits .=','.$livre['REF'];
 $i++;
 }
 $listeproduits[0]=' ';
 $montant +=1000;
 $date =date("Y-m-d G:i:s");
 $sql = "insert into $cdes (produits, montantcde, nomPrenomCli, adressecli, dateCde) values 
('$listeproduits','montant','".$_REQUEST['nom']."','".$_REQUEST['adresse']."','$date')";
 mysql_query($sql);
 setcookie("monprofil","nom=".$_REQUEST['nom'].";;adresse=".$_REQUEST['adresse']."",time()+604800);
 mysql_close($db);
 setcookie("monpanier","",time()-3600);
 header("Location: $url/boutique.php");
?>