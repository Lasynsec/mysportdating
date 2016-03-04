<?php

namespace Model;

use \Entity\Sports;

class SportsManagerPDO extends SportsManager
{
	public function getList()
    {
    	$sql = 'SELECT id_sport, design FROM sports ORDER BY id_sport DESC';

    	$requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Sports');
    
        $listeSports = $requete->fetchAll();

        $requete->closeCursor();

        return $listeSports;
    }
}