<html>
    <body>
        <?php

        $filmID = $_GET['filmID'];
        $query = "SELECT * FROM film where film_id=" . $filmID . ";";
		include 'wait.php';
		
		$line = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo "<h2>Film: " . $line['title']  . '</h2>';
		?>
        <table border="1"><tr bgcolor="purple">
		<td> Film ID</td><td> Film Title</td><td>Description</td><td>release_year</td><td>lang_id</td>
		<td>rental_duration</td><td>rental_rate</td><td>length</td><td>replacement_cost</td>
		<td>rating</td><td>special_features</td><td>last_update</td></tr>
		<?php 
            echo "<tr bgcolor='cyan'><td>".$line['film_id']."</td><td>".$line['title']."</td><td>".$line['description']."</td>";
            echo "<td>".$line['release_year']."</td><td>".$line['language_id']."</td>";
			echo "<td>".$line['rental_duration']."</td><td>".$line['rental_rate']."</td><td>".$line['length']."</td>";
			echo "<td>".$line['replacement_cost']."</td><td>".$line['rating']."</td><td>".$line['special_features']."</td>";
			echo "<td>".$line['last_update']."</td></tr>";
			echo "</table>\n";

        mysqli_free_result($result);
        mysqli_close($con);
		
		if(isset($_GET['link5'])){
			$link5 = $_GET['link5'];
			$query = $_GET['query'];
			echo '<br><br><br><br>';
			for($j = 1; $j < 5; $j++)
				if(isset($_GET['link'.$j], $_GET['keyword']))
					echo'<a href="'.$link5.'&query='.$query.'&link'.$j.'='.$_GET['link'.$j].'&keyword='.$_GET['keyword'].'"><== backToMenu</a>';
		}
        ?>
    </body>
</html>
