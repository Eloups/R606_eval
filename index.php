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
</head>

<body>
    <header>
        <h1>R6.06 Maintenance applicative</h1>
        <h2 style="color: crimson">Evaluation</h2>
        <p style="color: crimson">Modifiez ce projet à l'aide des outils vus ensemble pour améliorer la maintenabilité
            de ce projet et déployez le sur le serveur mis à votre disposition</p>
        <p style="color: crimson">Vous êtes libre de modifier ce que vous souhaitez sur le projet, chaque amélioration
            (ou début d'amélioration) sera prise en compte dans la notation</p>
        <p style="color: crimson; font-weight: bold; border: solid 2px crimson; padding: 5px; width: fit-content;">
            Pensez à inviter cdiiv sur votre projet Github</p>
    </header>

    <table>
        <thead style="font-weight: bold;">
            <tr>
                <td style="border: solid black 1px">Id</td>
                <td style="border: solid black 1px">Text</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $text) { ?>
                <tr>
                    <td style="border: solid black 1px"><?= $text['id'] ?></td>
                    <td style="border: solid black 1px"><?= $text['text'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>