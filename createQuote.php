<?php
require_once 'core/init.php';
if (Input::exists()) {
	if (Token::check(Input::get('token'))) {

$quote = new Quote();

		try {
			$quote->create(array(
				'client_name' => Input::get('client_name'),
				'company' => Input::get('company'),
				'email' => Input::get('email')
			));

			Session::flash('home', 'quote created');
			Redirect::to('index.php');

		} catch(Exception $e) {
			die($e->getMessage());
		}

}
}

?>

<div class="loggedInMainContent">
	<form method="post" action="">
		<div class="field">
			<label for="client_name">Client Name</label>
			<input type="text" name="client_name" id="client_name" value="<?php echo escape(Input::get('client_name'));?>" autocomplete="off">
		</div>

		<div class="field">
			<label for="company">Company</label>
			<input type="text" name="company" id="company">
		</div>

		<div class="field">
			<label for="email">email</label>
			<input type="text" name="email" id="email">
		</div>

		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"> 
		<input type="submit" value="Register">
	</form>
</div>