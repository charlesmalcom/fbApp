<form class='formDefault center'>

	<h3>
		Member Sign In
	</h3>
	<p>
		If you already have an account, please enter your details below. If you don't have one yet, please <a href="<?php echo $baseUrl; ?>createAccount">sign up</a> first.
	</p>

	<label>Username</label><input type='text'><br />
	<label>Password</label><input type='password'><br />
	<label>&nbsp</label><input type='submit'>
						<input type='checkbox'> Remember Me<br />

	<label>&nbsp</label><small>Forgot Password?</small><br />
	<label>&nbsp</label><a href='<?php echo $loginUrl; ?>'><img src='assets/images/FBConnect.gif' /></a>
	

</form>
