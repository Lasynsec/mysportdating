<?php
namespace MYFram;

/**
*	Execute les applications.
*/
abstract class Application
{
	/*
	* La variable httRequest contiendra l'instance de la classe HTTPRequest la requete du client;
	*/
	protected $httpRequest;

	/*
	* La variable HTTPReponse contiendra l'instance de la classe HTTPReponse la reponse au client.;
	*/
	protected $httpResponse;

	/*
	* La variable name contiendra le nom de l'application.
	*/
	protected $name;

	/**
	* La variable qui stockera l'utilisateur
	*
	*/
	protected $user;

	/**
	* La variable qui contiendra la configuration du module de new
	*
	*/
	protected $config;

	public function __construct()
	{	 
		//var_dump($this);

		 $this->httpRequest = new HTTPRequest($this); 		// on instancie la  classe lib/MYFram/HTTPRequest avec en parametre une instance de FrontendApplication
  		 $this->httpResponse = new HTTPResponse($this); 	// on instancie la classe lib/MYFram/HTTPResponse avec en parametre une instance de FrontendApplication
  		 $this->user = new User($this); 					// on instancie la classe lib/MYFram/User avec en parametre une instance de FrontendApplication
         // $this->config = new Config($this);				// on instancie la classe lib/MYFram/Config avec en parametre une instance de FrontendApplication

    	// la nom sera vide.Chaque application (qui héritera donc de cette classe) sera chargée de spécifier son nom en initialisant cet attribu
    	$this->name = '';   	
	}  					

	/**
	* Donne le controleur correspondant à l'URL.
	* @return on retourne une instance de NewsController
	*/
	public function getController()
  	{
	    $router = new Router($this); // on instancie un routeur on oublie pas l'objet en argument "$app = new FrontendApplication".

	    $xml = new \DOMDocument; // on instancie un objet XML
	    $xml->load(__DIR__.'/../../App/'.$this->name.'/Config/routes.xml'); //on charge la route

	    $routes = $xml->getElementsByTagName('route'); // on recupère tous les balises route et les stock dans une variable routes = [];.

	    // On parcourt les routes du fichier XML.
	    foreach ($routes as $route)
	    {
	      $vars = []; // on cree un array vide

	      // On regarde si l'attribut vars existe dans une route.
	      if($route->hasAttribute('vars')) //si oui
	      {
	        $vars = explode(',', $route->getAttribute('vars')); // On recupère uniquement les valeurs de l'attribut vars ds chaque route et les stocks dans un array.

	        //var_dump($vars);
	      }

	      // On ajoute un objet route avec pour argument l'attribut url, module et action  à l'objet $router.
	      $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
	    }

	    try
	    {
	      // On récupère l'URL en cours exemple: /news-1.html
	      $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
	    }
	    catch (\RuntimeException $e)
	    {
	      if($e->getCode() == Router::NO_ROUTE)
	      {
	        // Si aucune route ne correspond, c'est que la page demandée n'existe pas.
	        $this->httpResponse->redirect404(); // on appel la méthode redirect404 de la classe httpResponse
	      }
	    }

	    // On ajoute les attribut vars au $_GET: array(2) { ["app"]=> string(8) "Frontend" ["id"]=> string(1) "1" } .
	    $_GET = array_merge($_GET, $matchedRoute->vars());

	    // On instancie le contrôleur: "App\Frontend\Modules\News\NewsController" 
	    $controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';

	    // on instancie NewsController avec en paramètre (instance de FrontendApplication, module news, action shows) et le retourne.
	    return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
  	}

	/**
	* Toutes les classe filles implementerons cette méthode.
	* @param rien
	* @return rien
	*/ 
	abstract public function run();

	/*
	* getter
	*/
	public function httpRequest()
	{
		return $this->httpRequest;
	}

	public function httpResponse()
	{
		return $this->httpResponse;
	}

	public function name()
	{
		return $this->name;
	}

	public function user()
	{
		return $this->user;
	}

	public function config()
	{
		return $this->config;
	}

}