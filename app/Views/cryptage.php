<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Le cryptage et le hachage</title>
    <meta name="description" content="Un site pour apprendre php avancé">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
</head>
<body>

<h1>Un cryptage simple : le code césar!</h1>

<p>Le code césar est l'un des cryptage les plus simples, 
    il est facile à faire a la main mais ne peut pas être utilisé dans un cas réel, 
    puisque même un humain peut facilement le casser.<br>
    Il consiste à crée une clée qui est une liste des lettres de l'aplhabet mélangées
    sur laquelle on va déplacer nos lettres d'un rang.
</p>

<?php
$cesar = ['w','s','x','e','z','v','p','q','m','a','c','u','r','j','f','o','t','l','g','b','n','h','y']; 
$msg = "cesar a franchit le rubicon";
$crypted = "";
for($i =0;$i<strlen($msg);$i++){
    $lettre = substr($msg, $i,1);
    if(in_array($lettre,$cesar)){
        $j = 0;
        while(($j<sizeof($cesar))&&($cesar[$j] != $lettre)){
            //var_dump($lettre,$msg,$j,$cesar[$j]);
            //echo '<br>';
            $j++;
        }
        $crypted = $crypted.$cesar[($j+1)%(sizeof($cesar)-1)];
    }
    else{
        $crypted = $crypted.$lettre;
    }
}
?>
<div>
    <h4>Voici un exemple :</h4>
    <p>Le message : <?= $msg ?> <br><br>
    avec la clé :
    <table>
        <tr>
            <?php
            foreach ($cesar as $lettre){
                echo '<td>'.$lettre.'</td>';
            }
            ?>
        </tr>
    </table>
    <br>
    donne : <?= $crypted ?>
    <br>
    </p>
</div>


<div>
<h4>Le cryptage en php :</h4>
<?php

    $mdp = 'monmotdepassesupersecur';

    $method = 'AES-256-CBC';
    $secretKey = 'ma-cle-secrete-ultra-confidentielle';

    $key = hash('sha256', $secretKey);

    $iv = random_bytes(openssl_cipher_iv_length($method));

    $encrypted = openssl_encrypt($mdp, $method, $key, 0, $iv);

    $decrypted = openssl_decrypt($encrypted, $method, $key, 0, $iv);

    echo '
    Clé : '.$secretKey.'<br>
    Clé hachée : '.$key.'<br>
    Iv : '.$iv.'<br>
    mdp : '.$mdp.'<br>
    encrypté : '.$encrypted.'<br>
    décrypté : '.$decrypted.'<br>
    ';

    if (hash_equals($mdp,$decrypted)){echo 'Les mots de passe sont identiques.';}
?>

</div>

<div>
<h4>Le hachage en php :</h4>
<?php
    $mdp = 'monmotdepasseahacher';
    $hash = password_hash($mdp, PASSWORD_DEFAULT);
    echo 'mot de passe : '.$mdp.'<br>
    hash : '.$hash.'<br>';
    if (password_verify($mdp, $hash)){echo 'Le mot de passe correspond au hachage.';}
?>

</div>
<script>
</script>

<!-- -->

</body>
</html>