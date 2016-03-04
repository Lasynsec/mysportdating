<?php
namespace MYFram;

/**
* La classe Manager se chargera d'implémenter un constructeur qui demandera le DAO par le biais d'un paramètre.
*
*/
abstract class Manager
{
  protected $dao;
  
  public function __construct($dao)
  {
    $this->dao = $dao;
  }
}