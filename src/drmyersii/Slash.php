<?php namespace drmyersii;


/**
 * This class is my implementation of php's password hash functions. 
 */
class Slash
{
	/**
	 * This method tells you whether or not the given password matches 
	 * the given hash.
	 * 
	 * @param $password 		string
	 * @param $hash 			string
	 * @return 					bool
	 */
	public static function Compare($password, $hash)
	{
		if (password_verify($password, $hash))
			return true;
		else
			return false;
	}

	/**
	 * This method will return information on the given hash. It will 
	 * return the alorithm constant value, the algorithm name, and 
	 * the options array that was provided to the hash.
	 * 
	 * @param $hash 			string
	 * @return 					array
	 */
	public static function Info($hash)
	{

	}

	/**
	 * This method hashes, salts, and distorts the given password. It 
	 * then returns the hash as a string.
	 * 
	 * @param $password 		string
	 * @param $algorithm 		int
	 * @param $options 			array
	 * @return 					string
	 */
	public static function Mangle($password, $algorithm = PASSWORD_DEFAULT, $options = array('cost' => 10))
	{
		$hash = password_hash($password, $algorithm, $options);

		return $hash;
	}

	/**
	 * This method checks to see if a password needs rehashed.
	 * 
	 * @param $password 		string
	 * @param $algorithm 		int
	 * @param $options 			array
	 * @return 					bool
	 */
	public static function NeedsReMangled($password, $algorithm = PASSWORD_DEFAULT, $options = array('cost' => 10))
	{
		if (password_needs_rehash($password, $algorithm, $options))
			return true;
		else
			return false;
	}
}