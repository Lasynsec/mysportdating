<?php
namespace MYFram;

/**
* Generer la page à afficher à la vue de l'utilisateur
*
*/
class Page extends ApplicationComponent
{
  protected $contentFile; // Le cotenue de la page à afficher
  protected $vars = [];   // les variables

  /**
  * Ajoute une variable à la page (passe des données à la vue).
  * @param $var, on reçois la variable
  * @param $value, on reçois à valeur
  */
  public function addVar($var, $value)
  {
    if (!is_string($var) || is_numeric($var) || empty($var))
    {
      throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractères non nulle');
    }

    $this->vars[$var] = $value; // on recupère la variable dans un array
  }

  /**
  * Generer la page de la vue avec le layout de l'application.
  */
  public function getGeneratedPage()
  {
    if(!file_exists($this->contentFile))
    {
      throw new \RuntimeException('La vue spécifiée n\'existe pas');
    }

    $user = $this->app->user(); //on initialise la variable user.

    extract($this->vars);

    ob_start();
      require $this->contentFile;
    $content = ob_get_clean();

    ob_start();
      require __DIR__.'/../../App/'.$this->app->name().'/Templates/layout.php';
    return ob_get_clean();
  }

  /**
  * Assigner une vue à la page
  * @param $contentFile, la page à assigner
  */
  public function setContentFile($contentFile)
  {
    if (!is_string($contentFile) || empty($contentFile))
    {
      throw new \InvalidArgumentException('La vue spécifiée est invalide');
    }

    $this->contentFile = $contentFile;
  }
}

