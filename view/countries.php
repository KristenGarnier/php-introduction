<!-- ~/php/tp1/view/cities.php -->
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;
            charset=utf-8" />
    </head>
    <title>All Countries</title>
    <body>
    <h1>All Countries</h1>
    <table>
        <?php foreach ($params['countries'] as $country) :  // on utilise params car toutes les informations sont contenues dans cette variable?>
        <tr>
            <td><a href="/country.php?name=<?= $country; ?>"><?=
            $country; ?></a></td>
        </tr>
        
        <?php endforeach; ?>
    </table>
    </body>
</html>