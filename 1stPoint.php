<html>
<head>
<style>
	a.lol{text-decoration: none;}
</style>
</head>
    <body>
		<form action=""/>
			<table border="0">
				<tr>	
					<td>
						<label><input type="radio" name="search" value="titleChosen" checked/> Search film by title</label>
					</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<label><input type="radio" name="search" value="descChosen"/> Search film by description</label>
					</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td>
						<input size="35" name="keyword"/>
					</td><br><br>
					<td align="center">
						<input type="submit" name="sub" value="Start"/>
					</td>
				</tr>
				<tr>
					<td>
					</td><br><br>
					<td align="center">
						<input type="submit" name="main" value="<<< Back To Main Menu"/>
					</td>
				</tr>
			</table>
			<br><br><br>
		</form>
		
    <?php
		if(isset($_GET['main'])){
			header('Location:main_menu.php');
			exit;
		}	
		if(!empty($_GET['sub'])){
			$keyword = $_GET['keyword'];
			$getSearch = $_GET['search'];
			if(!empty( $_GET['search'] == 'titleChosen'))
				$query = "SELECT * FROM film where title like '$keyword%';";
			else $query="SELECT * FROM film WHERE description like '%$keyword%';";
			
			include 'wait.php';
			
			if(mysqli_num_rows($result)==0){
				echo 'No such rows matched';
				return;
			}
			$link1="1stPoint.php?search=$getSearch&keyword=$keyword&sub=Start";
			echo '<a href="3rdPoint.php?query='.$query.'&link1='.$link1.'">PAGINATION</a><br><br>';//echo $query;
			echo '<table border="1">';
			echo '<tr bgcolor="purple"><td>FILM_ID</td><td>TITLE</td><td>DESCRIPTION</td>';
			echo '<td><a class="lol" href="4thPoint.php?showMe=true"/>FAVORITES</a></td></tr>';
			while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				echo "<tr bgcolor='cyan'><td>".$line['film_id']."</td><td>".$line['title']."</td><td>".$line['description']."</td>";
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
