<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Instalator systemu</title>
    <link rel="stylesheet" href="<?=ASSETS_PATH?>css/style.css">
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
            <?php
            echo '<li>'
                 . (empty($_GET['step'])
                    ?  '<span>' . \SystemInstaller\Helpers::getMenu()['start'] . '</span>'
                    : \SystemInstaller\Helpers::getMenu()['start'])
                 . '</li>';

            foreach (\SystemInstaller\Helpers::getMenu() as $key => $value) :
                if ($key === 'start') {
                    continue;
                }

                echo '<li>'
                     . (isset($_GET['step']) && $_GET['step'] === $key
                            ? '<span>' .$value. '</span>'
                            : $value
                     )
                     . '</li>';
            endforeach;
            ?>
     </ul>
    </nav>
</section>

<section class="right-side">