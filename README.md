# php<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>le nombre de page vue par les visiteurs</h2>
<?php
if(file_exists('compteur.txt'))
{
    if($id_file=fopen('compteur.txt','r')) {
        flock($id_file, 1);
        $nb = fread($id_file, 6);
        $nb++;
        flock($id_file, 3);
        fclose($id_file);
        $id_file = fopen("compteur.txt", "w");
        fwrite($id_file, $nb);
        flock($id_file, 3);
        fclose($id_file);
    }else
        echo "<h2> fichier inaccessible</h2>";
}


echo "<table border=\"1\" style=\"font-size:1.2em;\"> <tr style=\"background-color:blue;color:white;\">
<td>Voici déjà</td></tr><tr style=\"background-color:black;color:yellow;\"><td>$nb</td></tr><tr style=\"background-color:red;color;green;\"><td>nombres de vue sur le site</td></tr>
</table>";
?>

</body>
</html>
