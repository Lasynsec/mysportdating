<?php
namespace MYFram;

abstract class Entity implements \ArrayAccess
{

  use Hydrator; // on appel la méthode hydrator

  protected $erreurs = [],
            $id;

  public function __construct(array $donnees = [])
  {
    if(!empty($donnees))
    {
      $this->hydrate($donnees); //On hydrate les données
    }
  }
  
  /**
  * verifie si l'id n'existe pas déja
  */
  public function isNew()
  {
    return empty($this->id);
  }

  /**
  * Getters
  */
  public function erreurs()
  {
    return $this->erreurs;
  }

  public function id()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = (int) $id;
  }

  /**
  * On recupère la variable
  * @param $var, la variable à verifie.
  */
  public function offsetGet($var)
  {
    if (isset($this->$var) && is_callable([$this, $var]))
    {
      return $this->$var();
    }
  }

  /**
  * On assigne la valeur à la variable 
  * @param $var, la variable.
  * @param $value, la valeur de la variable
  */
  public function offsetSet($var, $value)
  {
    $method = 'set'.ucfirst($var);

    if (isset($this->$var) && is_callable([$this, $method]))
    {
      $this->$method($value);
    }
  }

  /**
  * On verifie l'existence de la variable
  * @param $var, on reçois le paramètre
  * @return un bool 
  */
  public function offsetExists($var)
  {
    return isset($this->$var) && is_callable([$this, $var]);
  }

  public function offsetUnset($var)
  {
    throw new \Exception('Impossible de supprimer une quelconque valeur');
  }
}