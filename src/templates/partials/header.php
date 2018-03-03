<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Instalator systemu</title>
    <link rel="stylesheet" href="src/templates/assets/css/style.css">
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
            foreach (Helpers::getMenu() as $key => $value):
            ?>
                <li><?php ((isset($_GET['step']) && $_GET['step'] === $key) ? '<span>' . $value . '</span>' : $value); ?></li>
            <?php
            endforeach;
            ?>

            <li><?php echo (isset($_GET['step']) && $_GET['step'] == 'basic') ? '<span>Pierwszy krok</span>' : 'Pierwszy krok'; ?></li>
            <li><?php echo (isset($_GET['step']) && $_GET['step'] == 'database') ? '<span>Baza danych</span>' : 'Baza danych'; ?></li>
            <li><?php echo (isset($_GET['step']) && $_GET['step'] == 'finish') ? '<span>Krok finalny</span>' : 'Krok finalny'; ?></li>
        </ul>
    </nav>
</section>

<section class="right-side">