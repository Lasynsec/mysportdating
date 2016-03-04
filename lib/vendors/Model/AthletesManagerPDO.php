<?php

namespace Model;

use \Entity\Athletes;

class AthletesManagerPDO extends AthletesManager
{
	public function getList(Athletes $athletes)
    {
    	// $q = 'SELECT a.id_athletes, a.firstname, a.lastname, a.email, a.city, s.design 
    	//       FROM athletes as a
    	//       	left join athletes_sports as atsp on a.id_athletes = atsp.id_athletes
    	//        WHERE ORDER BY id DESC';
    	       
    	// $q->bindValue(':design', $sports->design(), PDO::PARAM_STR);

    	// $requete = $this->dao->query($sql);
        // $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Athletes');
        

        $sql = 'SELECT firstname, lastname, email, city 
                    FROM athletes
                WHERE city LIKE :city 
                    ORDER By id_athletes 
                DESC';

        $requete = $this->dao->prepare($sql);
        $requete->bindValue(':city', $athletes->city());
        $requete->execute();

        $listeAthletes = $requete->fetchAll();

        $requete->closeCursor();

        return $listeAthletes;
    }
}