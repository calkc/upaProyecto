<?php
 require "vendor/autoload.php";

$app = new \Slim\App;

$app->get('/hello/:name',function($name){
           echo "Hello,$name";
});

require './config/db.php';


require './routes/customers.php';
require './routes/datosPaciente.php';
require './routes/visitas.php';

$app->run();
?>
