<?php
namespace Entity;

use \MYFram\Entity;

class Athletessports extends Entity
{
	protected $id_athletes;
	protected $id_sport;
	protected $skill_level;

	const IDATHLETES_INVALIDE = 1;
	const IDSPORT_INVALIDE = 1;
	const SKILLLEVEL_INVALIDE = 1;

	// setter
	public function setDesign($design)
	{
        if(!is_string($design) || empty($design))
		{
			$this->erreurs[] = self::DESIGN_INVALIDE;
		}

		$this->design = $design;
	}

	//getters
	public function design(){ return $this->design;}
}