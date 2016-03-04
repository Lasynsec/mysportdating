<?php
namespace App\Frontend;

use \MYFram\Application;

/**
* 
*
*/
class FrontendApplication extends Application
{
	public function __construct()
	{
		parent::__construct(); // on appel le constructeur du parent soit (Application)

		$this->name = 'Frontend'; // on initialise le nom de l'application à "frontend"
	}

	/**
	* On execute le controleur
	* 
	*/
	public function run()
	{
		$controller = $this->getController(); // Obtention du contrôleur grâce à la méthode parente getController() qui executera l'action.
	    $controller->execute(); // Exécution du contrôleur.

	    $this->httpResponse->setPage($controller->page()); // on initialise la page de reponse à envoyer
	    $this->httpResponse->send(); // on envoie la reponse au client
	}
}