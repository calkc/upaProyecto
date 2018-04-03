<?php
 require "vendor/autoload.php";

$app = new \Slim\App;

/*$app->get('/hello/:name',function($name){
           echo "Hello,$name";
});*/

require './config/db.php';

$app->get('/',function() use ($app){
    $values = array('wish'=>'Hello','name'=>'Manasa');

//$app->response()->header("Content-type":"application/json");
//$json_response=json_encode($values);
echo "Hola mundo";
$app->response->headers->set('Content-Type','application-json');
$app->response->setBody(json_encode($values));
$app->response->finalize();
exit();
});

require './routes/customers.php';
require './routes/datosPaciente.php';

$app->run();
?>
