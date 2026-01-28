<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Affichage :<?= $doc->getTitle() ?></title>
    <meta name="description" content="Test de comparaison de couleurs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
</head>
<body>


<h2>Document :</h2>

<div>
    <h4>Title : <?= $doc->getTitle() ?></h4>
    <br><br>

    <h4>Abstract : <?= $doc->getAbstract() ?></h4>
    <br><br>

    <h4>Content : </h4><p><?= $doc->getContent() ?></p>
    <br><br>

    <h4>Access : <?= $doc->getAccess() ?></h4>
    <br><br>

    <h4>Type : <?= $doc->getType() ?></h4>
    <br><br>

    <a href="<?=  site_url('document/edit/'.$doc->getId()) ?>">Edit</a>

</div>

</body>