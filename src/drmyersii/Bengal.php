<?php namespace drmyersii;


class Bengal
{
	/**
	 * @var $Blog 				Blog
	 */
	private $Blog;

	/**
	 * @var $User 				User
	 */
	private $User;

	/**
	 * This is the contructor for the class. Load up configuration...
	 * 
	 * @return 					void
	 */
	public function __construct()
	{
		$this->Blog = new Blog();
		$this->User = new User();
	}

	/**
	 * This method actually initiates the blogging platform.
	 * 
	 * @return 					void
	 */
	public function Pounce()
	{
		if ($this->Blog->getHasOwner())
		{
			// Show regular blog...
			echo 'has owner';
		}
		else
		{
			if (isset($_POST['password']) && isset($_POST['password_verify']) && $_POST['password'] == $_POST['password_verify'])
			{
				$password = Slash::Mangle($_POST['password']);

				$this->User->setPassword($password);
				$this->User->Save();

				$this->Blog->setHasOwner(true);
				$this->Blog->Save();
			}
			else
			{
				// Load setup page...
				echo '
					<form action="" method="post">
						<input type="text" name="password" placeholder="password">
						<input type="text" name="password_verify" placeholder="confirm password">
						<input type="submit" value="submit">
					</form>
				';
			}
		}
	}
}