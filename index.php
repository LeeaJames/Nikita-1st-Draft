<?php
require_once 'core/init.php';
if (Session::exists('home')) {
	echo '<p>' . Session::flash('home') . '</p>';
} 

$user = new User();
if(!$user->isLoggedIn()) {?>
<div class="homeMainContent">
	<div class="flip-card">
		<div class="flip-card-inner">
			<div class="flip-card-front">
				<?php include 'includes/logo.php'; ?>
			</div>
			<div class="flip-card-back">
				<h1>Hello Team</h1>
				<p>Welcome to Nikita</p>
				<p>To proceed you need to login to see information specific to you.</p>
				
				<form action="login.php" method="post">
					<div class="field">
						<label for="username">Username</label>
						<input type="text" name="username" id="username">
					</div>
					<div class="field">
						<label for="password">Password</label>
						<input type="password" name="password" id="password">
					</div>
					<div class="field">
						<label for="remember">
							<input type="checkbox" name="remember" id="remember"> Remember me
						</label>
					</div>
					<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
					<input type="submit" value="Log in">
				</form>
			</div>
		</div>
	</div>
	
</div>
<?php } else {
$user = new User();
			if($user->isLoggedIn()) {

?>
<div class="loggedInContent">
	<nav>
		<div class="logo"><a href="index.php"><?php include 'includes/logo.php'; ?></a></div>
		<p><a href="profile.php?user=<?php echo escape($user->data()->name); ?>"><?php echo escape($user->data()->name); ?></a></p>
		<p><a href="logout.php">Log Out</a></p>
	</nav>

	<?php $quote = new Quote(6); ?>

<div class="loggedInMainContent">

	<?php //echo "<pre>";var_dump($quote);echo "</pre>"; echo $quote->data[0];?>

	<div class="quotes">
		<h2>Quotes</h2>
		<div class="quoteWrapper">
			<p><?php echo $quote->data()->client_name;?> quote 1</p>
			<button>View</button>
			<button>Edit</button>
		</div>
		<div class="quoteWrapper">
			<p>quote 2</p>
			<button>View</button>
			<button>Edit</button>
		</div>
		<div class="quoteWrapper">
			<p>quote 3</p>
			<button>View</button>
			<button>Edit</button>
		</div>
		<div class="quoteWrapper">
			<p>quote 4</p>
			<button>View</button>
			<button>Edit</button>
		</div>
		<div class="quoteWrapper">
			<p>quote 5</p>
			<button>View</button>
			<button>Edit</button>
		</div>

		<a href="createQuote.php">ADD QUOTE</a>

	</div>

	<div class="jobs">
		<h2>Jobs</h2>
		<p>Job 1</p>
		<p>Job 2</p>
		<p>Job 3</p>
		<p>Job 4</p>
		<p>Job 5</p>

		<a href="createJob.php">ADD JOB</a>
	</div>

	<div class="officeManagement">
		<h2>Office</h2>
		<p>Office 1</p>
		<p>Office 2</p>
		<p>Office 3</p>
		<p>Office 4</p>
		<p>Office 5</p>
	</div>
	
	
	
</div>
</div>
<?php }} ?>