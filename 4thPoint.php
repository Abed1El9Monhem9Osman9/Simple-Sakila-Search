<?php
//include 'Metier.php';
include 'init.php';
?>

<html>
    <body>

        <?php
        if (isset($_GET['add']))
            $UC = "ADD";
        if (isset($_GET['showMe']))
            $UC = "SHOWFAV";
		
        if ( $UC == "ADD") {
			foreach ($fav->list as $fv)
				if($fv->film_id == $_GET['film_id']){
					echo '['.$_GET['title'].'] already added to the wishlist';
					exit;
				}
            $fav->addFav(new favorite($_GET['film_id'], $_GET['title'], $_GET['desc'], $_GET['rate']));
			echo '['.$_GET['title'].'] has been added successfully';
        }
        if ($UC == 'SHOWFAV') {
            include 'form.php';
        }

        ?>
    </body>
</html>