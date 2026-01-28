<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier :<?= $doc->getTitle() ?></title>
    <meta name="description" content="Test de comparaison de couleurs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
</head>
<body>

<h2>Edition du document</h2>

<form action="<?=  site_url('document/save') ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="id" value="<?= $doc->getId() ?>">

    <label>Title :</label><br>
    <input type="text" name="title" value="<?= $doc->getTitle() ?>">
    <br><br>

    <label>Abstract :</label><br>
    <input type="text" name="abstract" value="<?= $doc->getAbstract() ?>">
    <br><br>

    <label>Content :</label><br>
    <input type="textarea" name="content" value="<?= $doc->getContent() ?>">
    <br><br>

    <label>Access :</label><br>
    <select name="access" selected="<?= $doc->getAccess() ?>">
    <option value="Internal">Internal</option>
    <option value="Restricted">Restricted</option>
    <option value="Public">Public</option>
    </select>
    <br><br>

    <h4>Type : <?= $doc->getType() ?></h4>
    <br><br>

    <button type="submit">Envoyer</button>

</form>


</body>