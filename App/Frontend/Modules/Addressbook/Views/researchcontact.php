<form action="" method="post">
	<fieldset>
		<legend><h4>Find athletes</h4></legend>
		<table>
			<tr><td><label>Practicing sport: </label></td><td><select name="sport" id="yearmade"><option>Football</option>
				<option>Baskeball</option>
				<option>Boxing</option>
				<option>Tennis</option>
				<option>Rugby</option>
				<option>Judo</option>
			</td></tr>

			<tr><td><label>Skill level</label></td><td><select name="skill_level" id="skill_level"><option>Beginner</option>
				<option>Confirmed</option>
				<option>Pro</option>
				<option>Fan</option>
			</td></tr>

			<tr><td><label for="name">City</label></td><td> <select name="city" id="city"><option>Paris</option>
				<option>London</option>
				<option>Berlin</option>
				<option>Amsterdam</option>
				<option>Copenhagen</option>
				<option>Brussels</option>
			</td></tr>

			<tr><td><input type="submit" value="Find"></td></tr>

		</table>
	</fieldset>
</form>

<fieldset>
	<legend>List of athletes</legend>
	<table>
		<tr>
			<th>Firstname</th><th>Lastname</th><th>Email</th><th>City</th><th>Sport</th>
		</tr>
		<?php foreach ($listeAthletes as $athlete) {
			echo'<tr>';
			echo '<td>'.$athlete['firstname'].'</td>'.'<td>'.$athlete['lastname'].'</td>'.'<td>'.$athlete['email'].'</td>'.'<td>'.$athlete['city'].'</td>';
			echo'</tr>';
		}?>
	</table>
</fieldset>
