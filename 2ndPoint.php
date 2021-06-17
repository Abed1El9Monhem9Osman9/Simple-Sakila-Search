<html>
<head>
	<style>
		a.lol{text-decoration: none;}
	</style>
</head>
    <body>
		<a href="2ndPoint.php?categName=true">Search a film by CategName</a><br><br>
		<a href="2ndPoint.php?rental_duration=true">Search a film by Rental_duration</a><br><br>
		<a href="2ndPoint.php?rating=true">Search a film by Rating</a><br><br>	<br>
		<form action="main_menu.php"><input type="submit" name="main" value="<<< Back To Main Menu"/></form><br><br>
        <?php
		
		if(isset ($_GET['categName'])){?>
			<form action=""/>
				<h3>Search a film by CategName:</h3>
				<SELECT name="categ">
				<?php
					$query= "select distinct(name) from category";
					include 'wait.php';
					while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						echo '<option value="'.$line['name'].'">'.$line['name'].'</option>';
					}
				?>
				</SELECT>
				
				<input type="submit" name="sub" value="Start"/>
			</form>
		<?php }
		if(isset ($_GET['categ'])) {
			$categ=$_GET['categ'];
			$query = "SELECT * FROM film 
				join film_category on film_category.film_id=film.film_id 
				join category on category.category_id=film_category.category_id 
				where category.name='$categ' ;";
			include 'wait.php';
			if(mysqli_num_rows($result)==0){
				echo 'CategName not matched';
				return;
			}
			$link2="2ndPoint.php?categ=$categ&sub=Start";
			echo '<a href="3rdPoint.php?query='.$query.'&link2='.$link2.'">PAGINATION</a><br><br>';//echo $query;
			echo '<table border="1">';
			echo '<tr bgcolor="purple"><td>FILM_ID</td><td>TITLE</td><td>CATEGNAME</td>';
			echo '<td><a class="lol" href="4thPoint.php?showMe=true"/>FAVORITES</a></td></tr>';
			while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo "<tr bgcolor='cyan'><td>".$line['film_id']."</td><td>".$line['title']."</td><td>".$line['name']."</td>";
				echo '<th><a class="lol" href="4thPoint.php?add=true&film_id='.$line['film_id'].'&title='.$line['title'].'
						&desc='.$line['description'].'&rate='.$line['rating'].'">+</a></th></tr>';
			}
			echo "</table>\n";
			
			mysqli_free_result($result);
			mysqli_close($con);
		}
		
		if(isset ($_GET['rental_duration'])){?>
			<form action=""/>
				<h3>Search a film by Rental_duration:</h3>
				<SELECT name="duration">
				<?php
					$query= "select distinct(rental_duration) from film order by 1";
					include 'wait.php';
					while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						echo '<option value="'.$line['rental_duration'].'">'.$line['rental_duration'].'</option>';
					}
				?>
				</SELECT>
				<input type="submit" name="sub" value="Start"/>
			</form>
		<?php }
		if(isset ($_GET['duration'])) {
			$duration=$_GET['duration'];
			$query = "SELECT * FROM film where rental_duration='$duration' ;";
			
			include 'wait.php';
			if(mysqli_num_rows($result)==0){
				echo 'Rental_duration not matched';
				return;
			}
			$link3="2ndPoint.php?duration=$duration&sub=Start";
			echo '<a href="3rdPoint.php?query='.$query.'&link3='.$link3.'">PAGINATION</a><br><br>';//echo $query;
			echo '<table border="1">';
			echo '<tr bgcolor="purple"><td>FILM_ID</td><td>TITLE</td><td>RENTAL_DURATION</td>';
			echo '<td><a class="lol" href="4thPoint.php?showMe=true"/>FAVORITES</a></td></tr>';
			while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo "<tr bgcolor='cyan'><td>".$line['film_id']."</td><td>".$line['title']."</td><td>".$line['rental_duration']."</td>";
				echo '<th><a class="lol" href="4thPoint.php?add=true&film_id='.$line['film_id'].'&title='.$line['title'].'
						&desc='.$line['description'].'&rate='.$line['rating'].'">+</a></th></tr>';
			}

			echo "</table>\n";

			mysqli_free_result($result);
			mysqli_close($con);
		}
		
		if(isset ($_GET['rating'])){?>
			<form action=""/>
			<h3>Search a film by Rating:</h3>
			<SELECT name="rate">
				<?php
					$query= "select distinct(rating) from film order by 1";
					include 'wait.php';
					while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						echo '<option value="'.$line['rating'].'">'.$line['rating'].'</option>';
					}
				?>
				</SELECT>
			<input type="submit" name="sub" value="Start"/>
			</form>
		<?php }
		if(isset ($_GET['rate'])) {
			$rate=$_GET['rate'];
			$query = "SELECT * FROM film where rating='$rate' ;";
			include 'wait.php';
			
			if(mysqli_num_rows($result)==0){
				echo 'Rate not matched';
				return;
			}
			$link4="2ndPoint.php?rate=$rate&sub=Start";
			echo '<a href="3rdPoint.php?query='.$query.'&link4='.$link4.'">PAGINATION</a><br><br>';//echo $query;
			echo '<table border="1">';
			echo '<tr bgcolor="purple"><td>FILM_ID</td><td>TITLE</td><td>RATING</td>';
			echo '<td><a class="lol" href="4thPoint.php?showMe=true"/>FAVORITES</a></td></tr>';
			while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo "<tr bgcolor='cyan'><td>".$line['film_id']."</td><td>".$line['title']."</td><td>".$line['rating']."</td>";
				echo '<th><a class="lol" href="4thPoint.php?add=true&film_id='.$line['film_id'].'&title='.$line['title'].'
						&desc='.$line['description'].'&rate='.$line['rating'].'">+</a></th></tr>';
			}

			echo "</table>\n";

			mysqli_free_result($result);
			mysqli_close($con);
		}
	?>
    </body>
</html>
