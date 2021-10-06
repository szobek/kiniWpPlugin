<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
<?php
wp_enqueue_style('front');

$conn = plugin_dir_path(__DIR__).'db'.DIRECTORY_SEPARATOR.'connect.php';
$func = plugin_dir_path(__DIR__).'functions'.DIRECTORY_SEPARATOR.'Functions.php';
require_once $conn;
require_once $func;
$id=null;

$c = new Connect();
$f = new Functions();
if($_GET["crud"]==="del"&& $_GET["id"] != null ){
    $f->crudDelete($_GET["id"]);
}
if($_GET["crud"]==="mod" && $_GET["id"] != null){
    $f->crudModifyView($_GET["id"]);
}
if($_GET["crud"]==="modify"){
    echo $_GET["id"];
    $f->crudModifyFunction($_GET["id"], $_GET["content"]);
}

if($_GET["crud"]==="new"){
    $f->crudNew();
}


?>
<table class="table">
    <tbody>
    <?php foreach ($f->listUsers() as $u) : ?>
    <tr class="username">
        <td colspan="2"><?php echo $u["name"] ?></td>
    </tr>
    <?php foreach ($u["todo"] as $t) : ?>
<?php $id=$t["id"]?>
        <tr class="todo">

            <td><?php echo $t["content"];  ?></td>
            <td>
                <button onclick="location.href='<?php echo $f->url("del")."&id=".$t["id"];  ?>'">X</button>
                <button onclick="location.href='<?php echo $f->url("mod")."&id=".$t["id"];  ?>'">Módosít</button>
                <button onclick="location.href='<?php echo $f->url("new");  ?>'">Új</button>
            </td>
        </tr>
    <?php endforeach ?>
    <?php endforeach ?>

    </tbody>
    <thead></thead>
</table>

<form method="get" style="display: <?php echo $f->arr["display"]?>">
    <input type="text" name="content" value="<?php echo $f->arr["content"]?>">
    <input type="text" value="listazas" name="page" style="display: none">
    <input type="text" value="modify" name="crud" style="display: none">
    <input type="text" value="<?php echo $id ?>" name="id" style="display: none">
    <input type="submit" value="Ment">
</form>
</body>
</html>
