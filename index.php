<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>About Me</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <?php
        $fp = fopen("files/input", "r");
        $name = fgets($fp, 999);
        $img_file = fgets($fp, 999);
    ?>
    <body>
        <header>
            <h1><?php echo $name; ?></h1>
            <img src="<?php echo $img_file; ?>" alt="Image of Author" />
        </header>
        <main>
           <?php
                while (!feof($fp)) {
                    echo '<section>';
                    echo '<h2>'.fgets($fp, 999).'</h2>';
                    $content = fgets($fp, 999);
                    if (preg_match('/^list [\d]+$/', $content)) {
                        $num_items = explode(' ', $content)[1];
                        echo '<ul>';
                        for($i = 0; $i < $num_items; $i++) {
                            $class_name = fgets($fp);
                            $class_link = fgets($fp);
                            echo '<li><a href="'.$class_link.'">'.$class_name.'</a></li>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<p>'.$content.'</p>';
                    }
                    echo '</section>';
                }
                fclose($fp);
           ?>
        </main>
        <footer>&copy; Fall 2020</footer>
    </body>
</html>
