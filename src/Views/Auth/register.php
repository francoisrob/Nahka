<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	//check if email is valid
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = 'Please enter a valid email.';
	}
	//check if email is already in use
	$db = new \App\Models\Database();
	$db->query('SELECT * FROM users WHERE email = :email');
	$db->bind(':email', $email);
	$result = $db->single();
	if ($result) {
		$error = 'Email already in use.';
	}
	if (empty($name) || empty($email) || empty($password)) {
		$error = 'Please fill in all fields.';
	}
	if (!isset($error)) {
		$hashed_password = password_hash($password, '2y');

		$db = new \App\Models\Database();
		$db->query('INSERT INTO users (name, surname, email, password) VALUES (:name, :surname, :email, :password)');
		$db->bind(':name', $name);
		$db->bind(':surname', $surname);
		$db->bind(':email', $email);
		$db->bind(':password', $hashed_password);
		$db->execute();

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
				<p class="error">
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