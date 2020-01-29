<?php
		if($user->hasPermission('admin')) {
			echo 'You are an admin';
		} else {
		echo '<p class="homePageText">You need to <a href="login.php">login</a> or <a href="register.php">register</a></p>';
	}?>

	<?php //	'username' => 'jim',
//	'password' => 'newpassword',
//	'salt' => 'salt'
//));
//$user = DB::getInstance()->delete('users', array('username', '=', 'jim' ));
// $user = DB::getInstance()->get('users', array('username', '=', 'Lee' ));
// if(!$user->count()) {
// 	echo 'No User';
// } else {
// 	echo $user->first()->username;
// }?>

	<ul>
		<li><a href="update.php">Update Details</a></li>
		<li><a href="changepassword.php">Update Password</a></li>
	</ul>