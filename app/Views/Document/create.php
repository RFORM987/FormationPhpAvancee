<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nouveau document</title>
    <meta name="description" content="Test de comparaison de couleurs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
</head>
<body>

<h2>Création du Document</h2>

<form action="<?=  site_url('document/save') ?>" method="post">
    <?= csrf_field() ?>

    <label>Title :</label><br>
    <input type="text" name="title" >
    <br><br>

    <label>Abstract :</label><br>
    <input type="text" name="abstract" >
    <br><br>

    <label>Content :</label><br>
    <input type="textarea" name="content" >
    <br><br>

    <button type="submit">Envoyer</button>

</form>


</body>