<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Documents</title>
    <meta name="description" content="Test de comparaison de couleurs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
</head>
<body>

<h2>Liste des documents :</h2>

<a href="<?=  site_url('document/create') ?>">New document</a>
<?php
    if(!empty($message)){
?>
    <h3><?= $message ?></h3>
<?php } ?>
<table border="1">
    <thead>
        <tr>
        <th scope="col">Title</th>
        <th scope="col">Abstract</th>
        <th scope="col">Access</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if(isset($docs)){
    foreach($docs as $doc){ ?>
        <tr>
            <td><?= $doc->getTitle() ?></td>
            <td><?= esc($doc->getAbstract(), 'raw') ?></td>
            <td><?= $doc->getAccess() ?></td>
            <td><a href="<?=  site_url('document/display/'.$doc->getId()) ?>">Display</a></td>
            <td><a href="<?=  site_url('document/edit/'.$doc->getId()) ?>">Edit</a></td>
            <td><form action="<?=  site_url('document/delete') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= $doc->getId() ?>">
                <button type="submit">Delete</button>
            </form></td>
        </tr>
    <?php }
    }?>
    </tbody>
</table>

</body>