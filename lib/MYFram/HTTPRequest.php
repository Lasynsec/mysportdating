<?php
namespace MYFram; //le code prends en compte le repertoire OCFram.

/**
* La classe représente la requête du client au travers d'une instance de classe. (description classe).
*/
class HTTPRequest extends ApplicationComponent
{
	/**
	* Methode permettant de d'obtenir un cookie
	* @param $key reçois la valeur du cookie
	* @throws aucune exception levées
	* @return array la valeur du cookie ou  null si aucune valeur trouvé.
	*/
	public function cookieData($key)
	{
		return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
	}

	/**
	* Methode verifiant si un cookie existe
	* @param $key reçois la valeur du cookie
	* @throws aucune exception levées
	* @return boolean true si le cookie existe.
	*/
	public function cookieExists($key)
	{
		return isset($_COOKIE[$key]);
	}

	/**
	* Methode permetant d'obtenir la valeur de la varialble GET
	* @param $key reçois la veleur de la variable GET
	* @return retourne la valeur du GET ou null si aucune valeur.
	*/
	public function getData($key)
	{
		return isset($_GET[$key]) ? $_GET[$key] : null; 
	}

	/**
	* Methode verifiant si la variable GET exists
	* @param Reçois la valeur de la variable GET
	* @return boolean true is la variable GET exists sinon false.
	*/
	public function getExists($key)
	{
		return isset($_GET[$key]);
	}

	/**
	* La methode permet d'obtenir la methode employée pour obtneir la requete  'GET', 'POST'
	* @param rien
	* @return retourne la méthode
	*/
	public function method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	/**
	* Methode permettant d'obtenir la valeur de la variable POST.
	* @param $key, reçoit la valeur de l 'array POST du formulaire
    *
    * @return la valeur de l'array POST sinon null
	*/
	public function postData($key)
	{
		return isset($_POST[$key]) ? $_POST[$key] : null;
	}

	/**
	* La methode verifie l'existence de la valeur de l'array PSOT
	* @param $key, reçoit la valeur de la variable POST
	* @return boolean true si la valeur de la variable POST exist sinon False
	*/
	public function postExists($key)
	{
		return isset($_POST[$key]);
	}

	/**
	* Obtenir l'URL entrée (utile pour que le routeur connaisse la page souhaitée).
	* @param rien
	* @return retourne la valeur de l'url
	*/
	public function requestURI()
	{
		return $_SERVER['REQUEST_URI'];
	}
}