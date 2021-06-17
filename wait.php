<html>
    <body>
        <?php
        $host = '127.0.0.1:3308';
        $user = 'root';
        $password = '';
        $dbname = 'sakila';

        $con = mysqli_connect($host, $user, $password, $dbname);

        if (mysqli_connect_errno())
            die('Echec de connexion MySQL: ' . mysqli_connect_error());
		
        $result = mysqli_query($con, $query);
        if (!$result)
            die('Échec de la requête ' . $query);
		
        ?>
    </body>
</html>