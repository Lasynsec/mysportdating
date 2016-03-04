<?php
namespace App\Frontend\Modules\Addressbook;

use \MYFram\BackController;  // On recupère la classe BackController;
use \MYFram\HTTPRequest;     // On recupère la classe HTTPRequest;

/**
* Le controleur qui gère l'action
*/
class AddressbookController extends BackController
{
	public function executeIndex(HTTPRequest $request)
	{
		// On recupère le manager de l'entité.
		$manager = $this->managers->getManagerOf('Sports');

        $listeSports = $manager->getList();

        // On ajoute la variable $listeNews à la vue.
        $this->page->addVar('listeSports', $listeSports);
	}

	public function executeRegistercontact(HTTPRequest $request)
	{

	}

	public function executeResearchcontact(HTTPRequest $request)
	{
		// On recupère le manager de l'entité.
	    $manager = $this->managers->getManagerOf('Athletes');

	    $listeAthletes = $manager->getList();
	    $listCities = $manager->getList($city);

	    // On ajoute la variable $listeNews à la vue.
        $this->page->addVar('listeAthletes', $listeAthletes);

        $this->page->addVar('listCities', $listCities);
	}
}