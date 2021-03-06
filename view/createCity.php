<!-- ~/php/tp1/view/cities.php -->
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;
            charset=utf-8" />
    </head>
    <title>Create a city</title>
    <body>
    <h1>Create a city</h1>

    <?php if($error) {
        echo "
           <p style='color: red'>
            An error has occured, please retry.
           </p>
        ";
    } ?>

    <form action="/handleCreate.php" method="POST">
        <p>
            <label>Name of the city</label>
            <input type="text" name="name" value="<?php if($city) echo $city['name']; ?>">
        </p>
        <p>
            <label>Country of the city</label>
            <input type="text" name="country" value="<?php if($city) echo $city['country']; ?>">
        </p>
        <p>
            <label>Life quality of the city</label>
            <input type="text" name="life" placeholder="A, B, C... just a letter" value="<?php if($city) echo $city['life']; ?>">
        </p>

        <button type="submit">Submit</button>
    </form>
    <p>
        <a href="/recherche.php">Search cities by name</a>
    </p>

    </body>
</html>