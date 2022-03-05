<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Projekt</title>
    <style>
        .footer {
            padding: 100px;
            text-align: center;
            background-color: blue;
            color: white;
            margin-top: 300px;

        }
        </style>
</head>
<body>

<div>

<a href="index.php?page=start">Start</a> |
<a href="index.php?page=contacts">Kontakte</a>|
<a href="index.php?page=legal">Impressum</a>

</div>
<?php
    $headline = 'Herzlich Wilkommen';

    if ($_GET['page'] == 'contacts') {
        $headline = 'Deine Kontakte';
    }
    if ($_GET['page'] == 'legal') {
        $headline = 'Impressum';
    }
    echo '<h1> ' . $headline . '</h1>';

if ($_GET['page'] == 'contacts') {
    echo '<p> Auf dieser Seite hast du eine Übersicht über deine Kontakte </p>';
} else if ($_GET['page'] == 'legal') {
    echo 'Hier kommt das Impressum hin';
}


else {
    echo 'Du bist gerade auf der Start-Seite!';
}
?>
<div class="footer">
<p>Mein erstes PHP Projekt</p>
</div>
   
<!--mit diesem Code rufen wir eine dynamische Seite auf, mit der wir die aktuelle Seite anzeigen lassen können-->
</body>
</html>