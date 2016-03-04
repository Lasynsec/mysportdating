<?php

/**
* Le premier fichier à être executé.
* Fichier chargé d'enregistrer les autoload puis de lancer l'application.
*/
const DEFAULT_APP = 'Frontend'; // l'application par defaut

// Si l'application n'est pas valide, on va charger l'application par défaut qui se chargera de générer une erreur 404
if(!isset($_GET['app']) || !file_exists(__DIR__.'/../App/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;

// On commence par inclure la classe nous permettant d'enregistrer nos autoload
require __DIR__.'/../lib/MYFram/SplClassLoader.php';

// On va ensuite enregistrer les autoloads correspondant à chaque vendor (OCFram, App, Model, etc.)
$OCFramLoader = new SplClassLoader('MYFram', __DIR__.'/../lib');
$OCFramLoader->register();

$appLoader = new SplClassLoader('App', __DIR__.'/..');
$appLoader->register();

$modelLoader = new SplClassLoader('Model', __DIR__.'/../lib/vendors');
$modelLoader->register();

$entityLoader = new SplClassLoader('Entity', __DIR__.'/../lib/vendors');
$entityLoader->register();

$formBuilderLoader = new SplClassLoader('FormBuilder', __DIR__.'/../lib/vendors');
$formBuilderLoader->register();


// Il ne nous suffit plus qu'à déduire le nom de la classe et à l'instancier exemple: "App\Frontend\FrontendApplication"
$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';

//var_dump($appClass);

//est en faite : $app = new FrontendApplication;
$app = new $appClass;

$app->run();