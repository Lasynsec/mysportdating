<?php
namespace MYFram;

trait Hydrator
{
  public function hydrate($data)
  {
    foreach ($data as $key => $value)
    {
      $method = 'set'.ucfirst($key); // on recupère tous les setters
      
      if (is_callable([$this, $method])) // si ses setters appartiennent bien à l'objet.
      {
        $this->$method($value); // On récupète la valeur de ses setters.
      }
    }
  }
}