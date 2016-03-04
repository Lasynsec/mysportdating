<?php
namespace Entity;

use \MYFram\Entity;

class Sport extends Entity
{
	protected $design;
	protected $athletes;

	const DESIGN_INVALIDE = 1;

	public function __construct()
	{
		$this->athletes = [];
	}

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