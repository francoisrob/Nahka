<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (empty($email) || empty($password)) {
		$error = 'Please fill in all fields.';
	} else {
		$db = new \App\Models\Database();
		$db->query('SELECT * FROM users WHERE email = :email');
		$db->bind(':email', $email);
		$result = $db->single();

		if ($result) {
			if (password_verify($password, $result['password'])) {
				$_SESSION['user_id'] = $result['id'];
				$_SESSION['user_name'] = $result['name'];
				header('Location: ' . $routes->get('homepage')->getPath());
				exit;
			} else {
				$error = 'Invalid email or password.';
			}
		} else {
			$error = 'Invalid email or password.';
		}
	}
}
?>
<section class="content">
	<div class="auth">

		<form method="post">
			<h1>Login</h1>
			<label for="email">Email:</label>
			<input type="email" name="email" id="email">

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<?php if (isset($error)): ?>
				<p style="color: red;">
					<?php echo $error; ?>
				</p>
			<?php endif; ?>
			<button type="submit">Login</button>
		</form>
	</div>
</section>