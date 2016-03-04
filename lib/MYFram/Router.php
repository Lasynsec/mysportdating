<?php
namespace MYFram;

/**
* Le routeur va cherche la route correspondante afin d'executer la page demandé.
* Il donne à l'application le contrôleur associé.
*/

class Router extends ApplicationComponent
{
	/**
	* Reçois les routes
	*/
	protected $routes = [];

	/**
	* Aucune route 
	*/
	const NO_ROUTE = 1;

	/**
	* On ajoute une nouvelles instances de route
	* @param reçois l'instance de la route a ajouter
	* @return 
	*/
	public function addRoute(Route $route)
	{
		if(!in_array($route, $this->routes)) // si la route n'est pas encore dans le tableau route
		{
			$this->routes[] = $route; // on stock la nouvelle route dans l'array
		}
	}

	/**
	* Renvoie la route correpondans à l'URL
	*/
	public function getRoute($url)
	{
		foreach ($this->routes as $route) // on parcours chaque element du tableau 
		{
			// si la route correspond à l'URL
			if(($varsValues = $route->match($url)) !== false)
			{
				// si elle a des variables
				if($route->hasVars())
				{
					$varsNames = $route->varsNames(); // on stock les variables
					$listVars = [];

					// On cree un nouveau tableau clé/valeur
					// (clé = nom de la varialbe, valeur = sa valeur)

					foreach ($varsValues as $key => $match) 
					{
						// La première valeur contient entièrement la chaine capturée (voir la doc sur preg_match)
						if($key !== 0)
						{
							$listVars[$varsNames[$key - 1]] = $match;
						}
					}

					// On assigne ce tableau de variable à la route
					$route->setVars($listVars);
				}
				return $route; // on retourne la valeur de la route.
			}
		}

		throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
	}
}