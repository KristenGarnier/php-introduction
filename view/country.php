<!-- ~/php/tp1/view/cities.php -->
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;
            charset=utf-8" />
    </head>
    <title>All cities</title>
    <body>
    <h1>All cities from <?= $params['country']; // on utilise params car toutes les informations sont contenues dans cette variable?></h1>
    <table>
        <?php foreach ($params['countries'] as $city) : ?>
        <tr>
            <td><?= $city['name']; ?></td>
        </tr>
        
        <?php endforeach; ?>
    </table>
    </body>
</html>