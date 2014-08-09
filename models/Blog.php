<?php namespace Bengal\models;


/**
 * This is pretty much the model for our Blog object.
 */
class Blog
{
	/**
	 * @var $articleRoot 		string
	 */
	private $articleRoot;

	/**
	 * @var $blogRoot 			string
	 */
	private $blogRoot;

	/**
	 * @var $configurationFile 	string
	 */
	private $configurationFile;

	/**
	 * @var $configurationFileTemplate
	 *							string
	 */
	private $configurationFileTemplate;

	/**
	 * @var $dataRoot 		string
	 */
	private $dataRoot;

	/**
	 * @var $description 		string
	 */
	private $description;

	/**
	 * @var $email 				string
	 */
	private $email;

	/**
	 * @var $hasOwner 			string
	 */
	private $hasOwner;

	/**
	 * @var $theme 				string
	 */
	private $theme;

	/**
	 * @var $title 				string
	 */
	private $title;


	/**
	 * Constructor for this class.
	 * 
	 * @return 					void
	 */
	public function __construct($blogTitle)
	{
		$this->blogRoot = Bengal::ServerRoot() . 'blogs' . DIRECTORY_SEPARATOR . $blogTitle . DIRECTORY_SEPARATOR;

		$this->articleRoot = $this->blogRoot . 'articles' . DIRECTORY_SEPARATOR;
		$this->dataRoot = $this->blogRoot . 'data' . DIRECTORY_SEPARATOR;

		$this->configurationFile = $this->dataRoot . '.production.blog.json';
		$this->configurationFileTemplate = Bengal::DataRoot() . '.default.blog.json';

		$this->Fill();
	}

	/**
	 * Method to empty the Blog object.
	 * 
	 * @return 					void
	 */
	public function Dump()
	{
		$this->description = '';
		$this->email = '';
		$this->hasOwner = true;
		$this->theme = '';
		$this->title = '';
	}

	/**
	 * Method to populate the Blog object.
	 * 
	 * @return 					void
	 */
	public function Fill()
	{
		if (!file_exists($this->dataRoot . $this->configurationFile))
		{
			$fileContents = file_get_contents($this->dataRoot . $this->configurationFileTemplate);

			file_put_contents($this->dataRoot . $this->configurationFile, $fileContents);
		}
		else
		{
			$fileContents = file_get_contents($this->dataRoot . $this->configurationFile);
		}

		$blog = json_decode($fileContents);

		$this->description = $blog->description;
		$this->email = $blog->email;
		$this->hasOwner = $blog->hasOwner;
		$this->theme = $blog->theme;
		$this->title = $blog->title;
	}

	/**
	 * Method to save the current state of the Blog object.
	 * 
	 * @return 					void
	 */
	public function Save()
	{
		$blog = new \stdClass();

		$blog->description = $this->description;
		$blog->email = $this->email;
		$blog->hasOwner = $this->hasOwner;
		$blog->theme = $this->theme;
		$blog->title = $this->title;

		file_put_contents($this->dataRoot . $this->configurationFile, json_encode($blog));
	}

	/**
	 * Method to get description property.
	 * 
	 * @return 					string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Method to set description property.
	 * 
	 * @param $description 		string
	 * @return 					void
	 */
	public function setDescription($description)
	{
		$this->description = $description;
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
	 * Method to get hasOwner property.
	 * 
	 * @return 					bool
	 */
	public function getHasOwner()
	{
		return $this->hasOwner;
	}

	/**
	 * Method to set hasOwner property.
	 * 
	 * @param $hasOwner 		bool
	 * @return 					void
	 */
	public function setHasOwner($hasOwner)
	{
		$this->hasOwner = $hasOwner;
	}

	/**
	 * Method to get theme property.
	 * 
	 * @return 					string
	 */
	public function getTheme()
	{
		return $this->theme;
	}

	/**
	 * Method to set theme property.
	 * 
	 * @param $theme 			string
	 * @return 					void
	 */
	public function setTheme($theme)
	{
		$this->theme = $theme;
	}

	/**
	 * Method to get title property.
	 * 
	 * @return 					string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Method to set title property.
	 * 
	 * @param $title 			string
	 * @return 					void
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}
}