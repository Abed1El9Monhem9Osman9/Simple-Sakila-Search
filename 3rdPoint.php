<html>
    <body>
        <?php
			
			$query = $_GET['query'];//echo $query;
			include 'wait.php';
			
			if (!isset($_GET['pageIndex']))
				$pageIndex = 0;
			else $pageIndex = $_GET['pageIndex'];
			$indexDebut = $pageIndex * 9;
			$indexFin = $indexDebut + 8;
			
			$nbActors = mysqli_num_rows($result);
			$indexFin = min($nbActors - 1, $indexFin);
		
			mysqli_data_seek($result, $indexDebut);
			$link5="3rdPoint.php?pageIndex=$pageIndex&query=$query";
			
			echo '<table border="1"><tr bgcolor="purple"><td> Film Title</td></tr>';
			for ($i = $indexDebut; $i <= $indexFin; $i++) {
				$line = mysqli_fetch_array($result, MYSQLI_ASSOC);
				for($j = 1; $j < 5; $j++){
					if(isset($_GET['link'.$j], $_GET['keyword'])){
						echo '<tr bgcolor="cyan"><td><a href="3rdPoint2.php?filmID='.$line["film_id"].'&link5='.$link5.'&query='.$query.'&link'.$j.'='.$_GET['link'.$j].'&keyword='.$_GET['keyword'].'">';
					}
					if(isset($_GET['link'.$j])){
						echo '<tr bgcolor="cyan"><td><a href="3rdPoint2.php?filmID='.$line["film_id"].'&link5='.$link5.'&query='.$query.'&link'.$j.'='.$_GET['link'.$j].'">';
					}
				}
				echo $line['title'] . '</a></td></tr>';
			}
			echo "</table><br>";
			
			$nbPages = (int) ($nbActors / 9);
			if ($nbActors % 9 != 0)
				$nbPages++;
			echo '<br>Pages: ';
			for ($i = 0; $i < $nbPages; $i++){
				for($j = 1; $j < 5; $j++){
					if(isset($_GET['link'.$j], $_GET['keyword'])){
						echo '<a href="3rdPoint.php?pageIndex=' . $i . '&query='.$query.'&link'.$j.'='.$_GET['link'.$j].'&keyword='.$_GET['keyword'].'">' . ($i + 1) . '</a> ';
					}
					if(isset($_GET['link'.$j])){
						echo '<a href="3rdPoint.php?pageIndex=' . $i . '&query='.$query.'&link'.$j.'='.$_GET['link'.$j].'">' . ($i + 1) . '</a> ';
					}
				}
			}	
			
			mysqli_free_result($result);
			mysqli_close($con);
			
			if(isset($_GET['link1'], $_GET['keyword'])){
				$link1 = $_GET['link1'];
				$keyword = $_GET['keyword'];
				echo '<br><br><br><br>';
				echo'<a href="'.$link1.'&keyword='.$keyword.'&sub=Start"><== backToMenu</a>';
			}
			if(isset($_GET['link2'])){
				$link2 = $_GET['link2'];
				echo '<br><br><br><br>';
				echo'<a href="'.$link2.'&sub=Start"><== backToMenu</a>';
			}
			if(isset($_GET['link3'])){
				$link3 = $_GET['link3'];
				echo '<br><br><br><br>';
				echo'<a href="'.$link3.'&sub=Start"><== backToMenu</a>';
			}
			if(isset($_GET['link4'])){
				$link4 = $_GET['link4'];
				echo '<br><br><br><br>';
				echo'<a href="'.$link4.'&sub=Start"><== backToMenu</a>';
			}
        ?>
		
    </body>
</html>
