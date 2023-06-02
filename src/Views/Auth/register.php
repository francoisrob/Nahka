<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = 'Please enter a valid email.';
	}
	$result = $user->getUserByEmail($email);
	if ($result) {
		$error = 'Email already in use.';
	}
	if (empty($name) || empty($email) || empty($password)) {
		$error = 'Please fill in all fields.';
	}
	if (!isset($error)) {
		$user->createUser($name, $surname, $email, $password);

		header('Location: login');
		exit;
	}
}
?>

<section class="content">
	<div class="auth">
		<form method="post">
			<h1>Register</h1>
			<?php if (isset($error)): ?>
				<p style="color: red;">
					<?php echo $error; ?>
				</p>
			<?php endif; ?>
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" value="<?php echo isset($name) ? $name : ''; ?>">
			<label for="surname">Surname:</label>
			<input type="text" name="surname" id="surname">
			<label for="email">Email:</label>
			<input type="email" name="email" id="email">
			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<button type="submit">Register</button>
		</form>
	</div>

</section>