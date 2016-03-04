<h2>Registeration</h2>

<form action="" method="post">
	<fieldset>
		<legend><h4>New Members ? Your details</h4></legend>
		<table>
			<tr><td><label for="name">Firstname:</label></td><td><input type="text"></td></tr>
			<tr><td><label for="name">Lastname:</label></td><td><input type="text"></td></tr>
			<tr><td><label for="name">City:</label></td><td><input type="text"></td></tr>
			<tr><td><label for="name">Email:</label></td><td><input type="text"></td></tr>
		</table>
	</fieldset>
	<br>
	<fieldset>
		<legend><h4>Your sport details</h4></legend>
		<table>
			<tr><td><label for="name">Practicing sport</label></td><td> <select name="sport" id="yearmade"><option>Football</option>
				                                                                                           <option>Baskeball</option>
				                                                                                           <option>Boxing</option>
				                                                                                           <option>Tennis</option>
				                                                                                           <option>Rugby</option>
				                                                                                           <option>Judo</option>
				                                                                                           </td></tr>
		    <tr><td><label>If your sport is not listed: </label></td><td><input type="text" value="add a new sport to the list"><input type="submit" value="add"></td></tr>
		    <tr><td><label>Skill level</label></td><td><select name="skill_level" id="skill_level"><option>Beginner</option>
				                                                                                   <option>Confirmed</option>
				                                                                                   <option>Pro</option>
				                                                                                   <option>Fan</option>
				                                                                                   </td></tr>
		    <tr><td><input type="submit" value="submit"></td><td><input type="reset" value="reset"></td></tr>
		</table>
	</fieldset>
</form>