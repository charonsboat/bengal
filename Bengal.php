<?php namespace Bengal;

use Bengal\models\Blog;
use Bengal\models\Slash;
use Bengal\models\User;


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
		$this->Blog = new Blog('default');
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

				$this->Blog->getUser()->setPassword($password);
				//$this->Blog->getUser()->Save();

				$this->Blog->setHasOwner(true);
				//$this->Blog->Save();
			}
			else
			{
				include_once($this->ServerRoot() . 'views' . DIRECTORY_SEPARATOR . 'template.php');
			}
		}
	}

	/**
	 * This Method returns the Data directory for this package.
	 * 
	 * @return 					string
	 */
	public static function DataRoot()
	{
		return __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR;
	}

	/**
	 * This Method returns the Root directory for this package.
	 * 
	 * @return 					string
	 */
	public static function ServerRoot()
	{
		return __DIR__ . DIRECTORY_SEPARATOR;
	}
}