<?php namespace drmyersii;


/**
 * This is pretty much the model for our User object.
 */
class User
{
	/**
	 * @var $alias 				string
	 */
	private $alias;

	/**
	 * @var $email 				string
	 */
	private $email;

	/**
	 * @var $name 				string
	 */
	private $name;

	/**
	 * @var $password 			string
	 */
	private $password;


		/**
	 * Constructor for this class.
	 * 
	 * @return 					void
	 */
	public function __construct($configurationFile = 'production.user.json', $configurationFileTemplate = 'default.user.json', $storagePath = null)
	{
		$this->configurationFile = $configurationFile;
		$this->configurationFileTemplate = $configurationFileTemplate;
		$this->storagePath = null === $storagePath ? __DIR__ . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR : $storagePath;

		$this->Fill();
	}

	/**
	 * Method to empty the User object.
	 * 
	 * @return 					void
	 */
	public function Dump()
	{
		$this->alias = '';
		$this->email = '';
		$this->name = true;
		$this->password = '';
	}

	/**
	 * Method to populate the User object.
	 * 
	 * @return 					void
	 */
	public function Fill()
	{
		if (!file_exists($this->storagePath . $this->configurationFile))
		{
			$fileContents = file_get_contents($this->storagePath . $this->configurationFileTemplate);

			file_put_contents($this->storagePath . $this->configurationFile, $fileContents);
		}
		else
		{
			$fileContents = file_get_contents($this->storagePath . $this->configurationFile);
		}

		$user = json_decode($fileContents);

		$this->alias = $user->alias;
		$this->email = $user->email;
		$this->name = $user->name;
		$this->password = $user->password;
	}

	/**
	 * Method to save the current state of the User object.
	 * 
	 * @return 					void
	 */
	public function Save()
	{
		$user = new \stdClass();

		$user->alias = $this->alias;
		$user->email = $this->email;
		$user->name = $this->name;
		$user->password = $this->password;

		file_put_contents($this->storagePath . $this->configurationFile, json_encode($user));
	}

	/**
	 * Method to get alias property.
	 * 
	 * @return 					string
	 */
	public function getAlias()
	{
		return $this->alias;
	}

	/**
	 * Method to set alias property.
	 * 
	 * @param $alias 			string
	 * @return 					void
	 */
	public function setAlias($alias)
	{
		$this->alias = $alias;
	}

	/**
	 * Method to get email property.
	 * 
	 * @return 					string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Method to set email property.
	 * 
	 * @param $email 			string
	 * @return 					void
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * Method to get name property.
	 * 
	 * @return 					string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Method to set name property.
	 * 
	 * @param $name 			bool
	 * @return 					void
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * Method to get password property.
	 * 
	 * @return 					string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Method to set password property.
	 * 
	 * @param $password 		string
	 * @return 					void
	 */
	public function setPassword($password)
	{
		$this->password = $password;
	}
}