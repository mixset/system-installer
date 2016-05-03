<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
 <head>
  <meta charset="UTF-8">
  <title>Instalator systemu</title>
  <link rel="stylesheet" href="css/style.css">
 </head>
 <body>
  <header class="header">
   <h1><a href="index.php" title="Strona główna">Witaj w instalatorze systemu</a></h1>
  </header>
  <hr class="hr-style">

  <section class="left-side">
   <h2>Nawigacja</h2>
    <nav>
     <ul>
      <li><?php echo (isset($_GET['step']) && $_GET['step'] == 'basic') ? '<span>Pierwszy krok</span>' : 'Pierwszy krok'; ?></li>
      <li><?php echo (isset($_GET['step']) && $_GET['step'] == 'database') ? '<span>Baza danych</span>' : 'Baza danych'; ?></li>
      <li><?php echo (isset($_GET['step']) && $_GET['step'] == 'finish') ? '<span>Krok finalny</span>' : 'Krok finalny'; ?></li>
     </ul>
    </nav>
  </section>

  <section class="right-side">
  <?php

  $installerFile = 'php/installer.class.php';
  $configFile = 'php/config.class.php';

  if (file_exists($installerFile) && filesize($installerFile) !== 0 && file_exists($configFile) && filesize($configFile) !== 0) {
    include $configFile;
    include $installerFile;

    try {
        // Od PHP7 można zapisać: $step = $_GET['step'] ?? 'start';
        $step = isset($_GET['step']) ? $_GET['step'] : 'start';

        $config = new Config\Config;
        $installer = new Installer\Installer($config);

        echo $installer -> route($step);
    } catch(Exception $e) {
        echo '<h2 style="text-align:center;">'.$e -> getMessage().'</h2>';
    }

  } else {
    echo '<p style="text-align:center;">'.$installerFile. ' or '.$configFile.' file not found!</p>';
  }
  ?>
  </section>
  <script src="js/core.js"></script>
 </body>
</html>