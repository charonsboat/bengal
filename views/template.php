<!doctype html>
<html>
<head>
	<title><?php echo ('Blog Title Goes Here'); ?></title>

	<style>
		body
		{
			background-color: #eee;
			font-family: sans-serif;
			margin: 0;
		}

		header
		{
			background-color: #dd6600;
			box-shadow: 0 2px 2px 0 rgba(221, 102, 0, 0.1), 0 1px 0 0 rgba(221, 102, 0, 0.1);
			color: #fff;
			overflow: auto;
			text-align: center;
		}

		header .runner
		{
			height: 1rem;
		}

		main
		{
			background-color: #fff;
			box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.1), 0 1px 0 0 rgba(0, 0, 0, 0.1);
			min-height: 30rem;
			overflow: auto;
		}

		main form
		{
			margin: 3rem auto;
			max-width: 20rem;
			width: 100%;
		}

		footer
		{
			padding: 1rem;
			text-align: center;
		}

		h1
		{
			background-color: #121212;
			box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.1), 0 1px 0 0 rgba(0, 0, 0, 0.1);
			font-weight: normal;
			letter-spacing: 2px;
			margin: 0;
			padding: 1.75rem 0;
		}

		label
		{
			font-size: 75%;
			margin-left: 0.25rem;
		}

		input
		{
			border: 1px solid #aeaeae;
			border-radius: 2px;
			box-sizing: border-box;
			margin-bottom: 0.5rem;
			padding: 0.5rem;
			width: 100%;
		}

		input[type="submit"]
		{
			background-color: #dd6600;
			border-color: #dd6600;
			box-shadow: 0 2px 2px 0 rgba(221, 102, 0, 0.1), 0 1px 0 0 rgba(221, 102, 0, 0.1);
			color: #fff;
			cursor: pointer;
			margin-top: 1.25rem;
		}

		p
		{
			margin: 0;
		}

		a
		{
			color: #dd6600;
			font-weight: bold;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<header>
		<h1>Welcome to Bengal</h1>
		<div class="runner"></div>
	</header>
	<main>
		<form action="" method="post">
			<label for="password">Password</label><br>
			<input type="password" name="password" placeholder="password"><br>
			<label for="password_verify">Confirm Password</label><br>
			<input type="password" name="password_verify" placeholder="confirm password"><br>
			<input type="submit" value="submit">
		</form>
	</main>
	<footer>
		<p>Currently being built by <a href="https://davidmyers.us">David Myers</a></p>
	</footer>
</body>
</html>