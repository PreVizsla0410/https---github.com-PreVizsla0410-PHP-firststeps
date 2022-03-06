<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <title>PHP Projekt</title>
    <style>
        body {
            margin: 0;
            font-family: 'Gowun Dodum', sans-serif;
            background-color: grey;
        }
        .footer {
            padding: 100px;
            text-align: center;
            background-color: blue;
            color: white;
            margin-top: 300px;
        }
        .main {
            display: flex;
        }
        .menu {
            width: 20%;
            background-color: red;
            margin-right: 32px;
            padding-top: 150px;
            height: 100vh;
        }
        .menu a {
            display: block;
            text-decoration: none;
            color: white;
            padding: 8px;
            display: flex;
            align-items: center;
        }
        .menu a:hover {
            background-color: white;
            opacity: 0.1;
        }
        .menu img {
            margin-right: 8px;
        }
        .content {
            width: 80%;
            margin-top: 150px;
            background-color: white;
            border-radius: 8px;
            padding: 16px;
            box-shadow: 2px 2px 2px black;
        }
        .menubar {
            background-color: white;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 80px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
            padding-left: 50px;
            display: flex;
            justify-content: space-between;
        }
        .avatar {
            border-radius: 100%;
            background-color: yellowgreen;
            padding: 16px;
            width: 16px;
            height: 16px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 8px;
        }
        </style>
</head>
<body>
    <div class="menubar">
        <h1>My contact book</h1>
        <div class="avatar">Richard Szigethy</div>
    </div>
<div class="main">
<div class="menu">

<a href="index.php?page=start"><img src="img/home.svg">Start</a> 
<a href="index.php?page=contacts"><img src="img/book.svg">Kontakte</a>
<a href="index.php?page=addcontact"><img src="img/add.svg">Kontakt hinzufügen</a>
<a href="index.php?page=legal"><img src="img/legal.svg">Impressum</a>

</div>
<div class="content">

<?php
     $headline = 'Herzlich willkommen';
     $contacts = [];

    if (isset($_POST['name']) && isset($_POST['phone'])) {
                echo 'Kontakt <b>' . $_POST['name'] . '</b> wurde hinzugefügt';
                $newContact = [
                    'name' => $_POST['name'],
                    'phone' => $_POST['phone']
                ];
                array_push($contacts, $newContact);
                file_put_contents('contacts.txt', json_encode($contacts)); 
    }
    /*Mit dem Code werden die Eingaben in gespeichert und in einer Json Datei erstellt; Push ist dabei gleich und file_put_contents ist neu, json enccode brauchen wir um den Kontakt in JSON zu übersetzen*/

    if ($_GET["page"] == "contacts") {
        $headline = 'Deine Kontakte';
    }

    if ($_GET['page'] == 'addcontact') {
        $headline = 'Kontakt hinzufügen';
    }

    if ($_GET['page'] == 'legal') {
        $headline = 'Impressum';
    }
    echo '<h1> ' . $headline . '</h1>';

if ($_GET['page'] == 'contacts') {
    echo "
        <p>Auf dieser Seite hast du einen Überblick über deine <b>Kontakte</b></p>
    ";
} else if ($_GET['page'] == 'legal') {
    echo 'Hier kommt das Impressum hin';
} else if ($_GET['page'] == 'addcontact') {
                echo "
                    <div>
                        Auf dieser Seite kannst du einen weiteren Kontakt hinzufügen
                    </div>
                    <form action='?page=contacts' method='POST'>
                        <div>
                            <input placeholder='Name eingeben' name='name'>
                        </div>
                        <div>
                            <input placeholder='Telefonnummer eingeben' name='phone'> 
                        </div>
                        <button type='Submit'>Absenden</button>
                    </form>
                ";
            } else {
                echo 'Du bist auf der Startseite!';
            }
?>
</div>
</div>
<div class="footer">
<p>Mein erstes PHP Projekt</p>
</div>
</div>
<!--mit diesem Code rufen wir eine dynamische Seite auf, mit der wir die aktuelle Seite anzeigen lassen können-->
</body>
</html>