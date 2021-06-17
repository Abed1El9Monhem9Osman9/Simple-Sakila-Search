<br>
<h2>FAVORITES</h2>

	<table border="1">
		<tr bgcolor="cyan">
		
		<?php 
		if(!empty($fav->list)){?>
			<td>ID</td>
			<td>TITLE</td>
			<td>DESCRIPTION</td>
			<td>RATING</td>
			</tr>
			<?php 
			foreach ($fav->list as $fv)
				echo '<tr><td>' . $fv->film_id . '</td><td>' . $fv->title . '</td><td>' . 
					$fv->description . '</td><td>' . $fv->rating . '</td><tr>'   ;
		}
		else echo '<h2> *U didn"t add any fav yet* </h2>';
		?>
		
	</table><br><br><br>
<form action="main_menu.php">
	<input type="submit" name="main" value="<<< Back To Main Menu"/>
	
</form>