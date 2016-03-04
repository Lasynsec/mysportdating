<?php
namespace MYFram; //le code prends en compte le repertoire OCFram.

/**
* La classe représente la réponse envoyée au client au travers d'une instance d'une classe.
*/

/**
    D'ajouter un cookie.

*/
class HTTPResponse extends ApplicationComponent
{
	/**
	* Contient la page
	*/
	protected $page;

	/**
	* La methode permet d' ajouter un header spécifique.
	* @param $header, le header à ajouter (en-tête HTTP).
	*/
	public function addHeader($header)
	{
		header($header);
	}

	/**
	* La methode permet de rediriger l'utilisateur.
	* @param $location, reçoit la page ou doit être rediriger l'utilisateur
	* @return rien
	*/
	public function redirect($location)
	{
		header('location: '. $location);
		exit;
	}

	/**
	* La methode permet de rediriger l'utilisateur vers une erreur 404.
	* @param rien
	* @return rien
	*/
	public function redirect404()
	{
		$this->page = new Page($this->app);
	    $this->page->setContentFile(__DIR__.'/../../Errors/404.html');
	    
	    $this->addHeader('HTTP/1.0 404 Not Found');
	    
	    $this->send();
	}

	/**
	* La methode permet D'envoyer la réponse en générant la page.
	* @param rien
	* @return rien
	*/
	public function send()
	{
		exit($this->page->getGeneratedPage());
	}

	/**
	* La methode permet D'assigner une page à la réponse.
	* @param 
	*/
	public function setPage(Page $page)
	{
		$this->page = $page;
	}

}