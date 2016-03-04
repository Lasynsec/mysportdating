<?php
namespace MYFram;

session_start();

/*
*  Enregistre les information de l'utilisateur 
*/
class User
{
   /**
  * Obtenir la valeur d'un attributs
  * @param $attr, on reçois l'attribut 
  * @return $_SESSION[$attr], on retourn la valeur de l'attribut si true
  */
  public function getAttribute($attr)
  {
    return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
  }

 /**
 * On recupère le message
 * @return $flash, On renvoie le message
 */
  public function getFlash()
  {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);

    return $flash;
  }

  /**
  * Savoir si l'utilisateur a tel message
  */
  public function hasFlash()
  {
    return isset($_SESSION['flash']);
  }

/**
* Savoir si l'utilisateur est authentifié
* @return bool, true or false
*/
  public function isAuthenticated()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
  }

  /**
  * Assigne un attribut à l'utilisateur
  * @param $attr, reçois l'attribut qui representera la cle de la session
  * @param $value, reçois la veleur qui sera assigné.
  */
  public function setAttribute($attr, $value)
  {
    $_SESSION[$attr] = $value;
  }

   /**
  * Authentifier l'utilisateur 
  * @param autentification
  */
  public function setAuthenticated($authenticated = true)
  {
    if (!is_bool($authenticated))
    {
      throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAuthenticated() doit être un boolean');
    }

    $_SESSION['auth'] = $authenticated;
  }

  /**
  * Assigner un message informatif à l'utilisateur que l'on affichera su la page
  * @pararm $value, valeur à assigner
  */
  public function setFlash($value)
  {
    $_SESSION['flash'] = $value;
  }
}