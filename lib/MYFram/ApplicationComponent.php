<?php
namespace MYFram;

/**
* La classe  permet d'obtenir l'application à laquelle l'objet appartient
* La classe se charge juste de stocker , pendant la construction de l'objet, l'instance de l'application executée.
*/

abstract class ApplicationComponent
{
	/*
	* la variable contiendra l'instance de l'application( ici FrontendApplication) à executée.
	*/
	protected $app;

	/**
	* Le constructeur prend en paramètre une instance de la classe Application
	* 
	*/
	public function __construct(Application $app)
	{
		$this->app = $app; //on recupère l'application à la creation de l'instance de la classe Application soit "app".
	}

	/*
	*getters
	*/
	public function app()
	{
		return $this->app;
	}
}