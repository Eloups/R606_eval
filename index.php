<?php

require_once './vendor/autoload.php';
require_once './src/Database.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$db = new Database();
$db->initDatabase();

$texts_to_insert = ['azerty', 'abcdef', 'xyz', '123456789'];

$db->initDatabase();

foreach ($texts_to_insert as $text) {
    $db->insertText($text);
}

$data = $db->getAllTexts();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>R6.06 Maintenance applicative</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <header>
        <h1>R6.06 Maintenance applicative</h1>
        <h2 class="crimson">Evaluation</h2>
        <p class="crimson">Modifiez ce projet à l'aide des outils vus ensemble pour améliorer la maintenabilité
            de ce projet et déployez le sur le serveur mis à votre disposition</p>
        <p class="crimson">Vous êtes libre de modifier ce que vous souhaitez sur le projet, chaque amélioration
            (ou début d'amélioration) sera prise en compte dans la notation</p>
        <p class="big-message crimson">
            Pensez à inviter cdiiv sur votre projet Github</p>
    </header>

    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Text</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $text) { ?>
                <tr>
                    <td><?= $text['id'] ?></td>
                    <td><?= $text['text'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>