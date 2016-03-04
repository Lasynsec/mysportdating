<table CELLPADDING="10" CELLSPACING="10"  width="500">
	<td>
		<table >
			<tr>
				<th>List of sports</th>
			</tr>
		<?php
		  foreach ($listeSports as $sport) {
		  	echo'<tr>';
			echo '<td>'.$sport['design'].'</td>';
			echo'</tr>';
		  }
		?>
		</table>
	</td>
	<td>
		<h4>Existing Members, Login here</h4>
		<form action="" method="post">
		<p><input type="text" value="Enter your address email" >
			<input type="submit" value="Log in"/>
		</p>
	</form>
	</td>
</table>