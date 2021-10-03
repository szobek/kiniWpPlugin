<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>po
<?php
wp_enqueue_style('front');
$conn = plugin_dir_path(__DIR__).'db'.DIRECTORY_SEPARATOR.'connect.php';
$func = plugin_dir_path(__DIR__).'functions'.DIRECTORY_SEPARATOR.'Functions.php';
require_once $conn;
require_once $func;


$c = new Connect();
$f = new Functions();

?>
<table class="table">
    <tbody>
    <?php foreach ($f->listUsers() as $u) : ?>
    <tr class="username">
        <td><?php echo $u->display_name ?></td>
    </tr>

        <tr class="todo">
            <td><?php echo $u->content;  ?><button id="delete">X</button></td>
        </tr>
    <?php endforeach ?>

    </tbody>
    <thead></thead>
</table>
<script>
</script>
</body>
</html>
