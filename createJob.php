<?php
require_once 'core/init.php';
if (Input::exists()) {
	if (Token::check(Input::get('token'))) {

$quote = new Jobs();

		try {
			$quote->create(array(
				'company' => Input::get('company'),
				'name' => Input::get('name'),
				'assigned' => Input::get('assigned')
			));

			Session::flash('home', 'job created');
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
			<label for="company">Company Name</label>
			<input type="text" name="company" id="company" value="<?php echo escape(Input::get('company'));?>" autocomplete="off">
		</div>

		<div class="field">
			<label for="name">Name</label>
			<input type="text" name="name" id="name">
		</div>

		<div class="field">
			<label for="assigned">Assigned</label>
			<input type="text" name="assigned" id="assigned">
		</div>

		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"> 
		<input type="submit" value="Register">
	</form>
</div>