<?php

namespace Model;

use \MYFram\Manager;

abstract class AthletesManager extends Manager
{

	/**
   * Méthode retournant une liste de news demandée
   * @param $debut int La première news à sélectionner
   * @param $limite int Le nombre de news à sélectionner
   * @return array La liste des news. Chaque entrée est une instance de News.
   */
  abstract public function getList(Athletes $athletes);

}