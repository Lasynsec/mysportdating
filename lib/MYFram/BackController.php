<?php
namespace MYFram;


/**
* Classe est une classe de base dont héritera chaque contrôleur
* Elle executera l'action appropriée.
* 
*/
abstract class BackController extends ApplicationComponent
{
	  protected $action = ''; // l'action à executer 
	  protected $module = ''; // modifier le module associée au controleur
	  protected $page = null; // obtenir la page associée au controleur
	  protected $view = '';   // modifier la vue associé au controleur
	  protected $managers = null; // stockera une instance de manager

	  public function __construct(Application $app, $module, $action)
	  {
	  	parent::__construct($app); // Est chargé dans un premier temps d'appeler le constructeur de son parent avec pour argument l'instance de l'objet .

	  	$this->managers = new Managers('PDO', PDOFactory::getMysqlConnexion()); // On recupère la connexion.
	  	$this->page = new Page($app); // Il créera une instance de la classe Page qu'il stockera dans l'attribut correspondant. 

	    $this->setModule($module); // On assigne la valeur au module
	    $this->setAction($action); // On assigne la valeur à l'action
	    $this->setView($action); // On assigne la valeur à la vue
	  }

	/**
	* Invoque la méthode correspondant à l'action assignée à l'objet
	* Exemple: executeShow() pour une action show();
	*/
	public function execute() 
	{
		$method = 'execute'. ucfirst($this->action); // On récupère une executeAction, exemple : "executeInsertComment"

		if(!is_callable([$this, $method])) // si la méthode execute(Action) n'existe pas dans 
		{
		  throw new \RuntimeException('L\'action "'.$this->action.'" n\'est pas définie sur ce module'); // On envoie une erreur 
		}

		$this->$method($this->app->httpRequest()); // On 
	}

	/**
	* Getter
	*/
	public function page()
	{
		return $this->page;
	}

	/**
	* Setters
	*/
	public function setModule($module)
	{
		if (!is_string($module) || empty($module))
		{
		  throw new \InvalidArgumentException('Le module doit être une chaine de caractères valide');
		}

		$this->module = $module;
	}

	public function setAction($action)
	{
		if (!is_string($action) || empty($action))
		{
		  throw new \InvalidArgumentException('L\'action doit être une chaine de caractères valide');
		}

		$this->action = $action;
	}

	/**
	* Assigne une nouvelle vue 
	* @param $view, la nouvelle vue à assigner
	* 
	*/
	public function setView($view)
	{
		if(!is_string($view) || empty($view))
		{
		  throw new \InvalidArgumentException('La vue doit être une chaine de caractères valide');
		}

		$this->view = $view;

		// On appel la nouvelle vue.
		$this->page->setContentFile(__DIR__.'/../../App/'.$this->app->name().'/Modules/'.$this->module.'/Views/'.$this->view.'.php');
	}
}