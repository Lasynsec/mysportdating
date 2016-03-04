<?php
namespace Entity;

use \MYFram\Entity;

class Athletes extends Entity
{
	protected $firstname,
	          $lastname,
	          $email,
	          $city,
	          //$sports;

	const FIRSTNAME_INVALIDE = 1;
	const LASTNAME_INVALIDE = 2;
	const EMAIL_INVALIDE = 3;
	const CITY_INVALIDE = 4;
    
    public function __construct()
    {
    	//$this->sports = []; // on transform en array.
    }

	// setters
	public function setFirstname($firstname)
	{
		if(!is_string($firstname) || empty($firstname))
		{
			$this->erreurs[] = self::FIRSTNAME_INVALIDE;
		}

		$this->firstname = $firstname;
	}

	public function setLastname($lastname)
	{
		if(!is_string($lastname) || empty($lastname))
		{
			$this->erreurs[] = self::LASTNAME_INVALIDE;
		}

		$this->lastname = $lastname;
	}

	public function setEmail($email)
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		    $this->erreurs[] = self::EMAIL_INVALIDE;
		}

		$this->lastname = $email;
	}

	public function setCity($city)
	{
    	if(!is_string($city) || empty($city))
		{
			$this->erreurs[] = self::CITY_INVALIDE;
		}
	}

	/**
	* Add sport
	* @return Athlete
	*/
	// public function addSport(Sports $sport)
	// {
	// 	$this->sports[] = $sport;

	// 	return $this;
	// }

	// public function removeSport(Sports $sport)
	// {
	// 	/* code to remove*/
	// }
 	
 	// getters
 	public function firstname(){ return $this->firstname;}
 	public function lastname() { return $this->lastname;}
 	public function email(){ return $this->email;}
 	public function city(){ return $this->city;}
}
