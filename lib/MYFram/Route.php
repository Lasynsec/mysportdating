<?php
namespace MYFram;

/**
* Une route, c'est une URL associée à un module et une action. 
* Créer une route signifie donc assigner un module et une action à une URL.
*/

class Route extends ApplicationComponent
{
  protected $action;
  protected $module;
  protected $url;
  protected $varsNames; // Un tableau comportant les noms des variables.
  protected $vars = []; // Un tableau clé/valeur comportant les noms/valeurs des variables.

  public function __construct($url, $module, $action, array $varsNames)
  {
    $this->setUrl($url); 			 // on assigne l'URL
    $this->setModule($module); 		 // on assigne le Module
    $this->setAction($action); 		 // on assigne L'action
    $this->setVarsNames($varsNames); // on assigne la liste des noms des variables
  }

  /**
  * On verifie si la variabble existe.
  */
  public function hasVars()
  {
    return !empty($this->varsNames);
  }

  /**
  * On verifie si l'url correspond
  * @param $url, on reçois l'url
  * @return $matches, si correspond on retourne la string sinon false;
  */
  public function match($url)
  {
    if (preg_match('`^'.$this->url.'$`', $url, $matches))
    {
      return $matches;
    }
    else
    {
      return false;
    }
  }

  /**
  * Setters
  */
  public function setAction($action)
  {
    if (is_string($action))
    {
      $this->action = $action;
    }
  }

  public function setModule($module)
  {
    if (is_string($module))
    {
      $this->module = $module;
    }
  }

  public function setUrl($url)
  {
    if (is_string($url))
    {
      $this->url = $url;
    }
  }

  public function setVarsNames(array $varsNames)
  {
    $this->varsNames = $varsNames;
  }

  public function setVars(array $vars)
  {
    $this->vars = $vars;
  }

  /**
  * Getters
  */
  public function action()
  {
    return $this->action;
  }

  public function module()
  {
    return $this->module;
  }

  public function vars()
  {
    return $this->vars;
  }

  public function varsNames()
  {
    return $this->varsNames;
  }
}