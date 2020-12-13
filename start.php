<?php

function autoload($className){
    if(file_exists("./src/{$className}.php")){
        require "./src/{$className}.php";
    }
}
spl_autoload_register("autoload");

$pdo = new PDO(
    'mysql:host=localhost;dbname=shop',
    'root',
    ''
);

$res = $pdo->query("SELECT * FROM `products`");
foreach ($res AS $row){
    var_dump($row);
}

header("Location: public/index.php/index")

?>