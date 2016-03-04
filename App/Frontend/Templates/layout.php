<!DOCTYPE html>
<html>
<head>
  <title>
    <?= isset($title) ? $title : 'My sport dating' ?>
  </title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="/css/Envision.css" type="text/css" />
</head>
<body>
  <div id="wrap">
    <header>
      <h1><a href="/">Sport Dating</a></h1>
    </header>
    <nav>
      <ul>
        <li><a href="/">Home</a></li>
          <?php /*if($user->isAuthenticated())*/  // on verifie l'autentification de l'instance de User.
          { ?>
            <li><a href="/registercontact">Register</a></li>
            <li><a href="/researchcontact">Find athletes</a></li>
          <?php 
        } ?>
      </ul>
    </nav>
    <div id="content-wrap">
      <section id="main">
        <?php /*if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; */ ?>
        <?= $content ?>
      </section>
    </div>
    <footer>
      
    </footer>
  </div>
</body>
</html>