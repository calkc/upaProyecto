<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

//muestra todas las visitas
$app ->get('/modulo1/todasLasVisitas',function(Request $req, Response $res){
	$sql="select * from visitas";

	try{
		$db = new db();
		$db = $db ->connect();
		$db = $db ->query($sql);
		$db = $stmt ->fetchAll(PDO::FETCH_OBJ);
		$db = NULL;
		return $res->withJson($Pacientes);
	}catch (PDOException $e){

		echo '{"error": {"text":'.$e->getMessage().'}';
	}
});

//selecciona por el id del paciente
$app ->get('/modulo1/visitasPorPaciente/{id}', function(Request $req, Response $res){
    $id = $req->getAttribute('id');
    $sql = "select * from visitas WHERE FK_idpaciente_pacientes = $id";
    try {
        $db = new db();
        $db = $db -> connect();
        $stmt = $db -> query($sql);
        $Pacientes = $stmt -> fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return $res->withJson($Pacientes);
        

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }
});

//obtenemos los datos para insertarlos

$app ->post('/modulo1/agregarVisita/{idPaciente}', function(Request $req, Response $res){
    
    $idPaciente = $req->getAttribute('idPaciente');


    $fecha = $req -> getParam('fecha');

    $peso = (float)$req -> getParam('peso');
    $talla = (float)$req -> getParam('talla');
    $cent_cintura = (float)$req -> getParam('cent_cintura');
    $cent_cadera =(float)$req -> getParam('cent_cadera');
    
    $presion_arte =$req -> getParam('presion_arte');

    $imc = ($peso / pow(2, $talla)); 
    $icc = ($cent_cintura / $cent_cadera);

    $sistematologia =$req -> getParam('sistematologia');
    $recomendacion =$req -> getParam('recomendacion');
    $progreso =$req -> getParam('progreso');
    $comentarios_gen =$req -> getParam('comentarios_gen');

    $FK_iddieta_dietas = $req -> getParam('FK_iddieta_dietas');


//los insertamos 

$sql = "INSERT INTO visitas VALUES (null, :x0, :x1, :x2, :x3, :x4, :x5, :x6, :x9, :x10, :x11, :x12, :x13, :x14)";
    
    try {
        $db = new db();
        $db = $db ->connect();

        $stmt = $db -> prepare($sql);


        $stmt -> bindParam(':x0',$idPaciente);
        $stmt -> bindParam(':x1',$fecha);
        $stmt -> bindParam(':x2',$peso);
        $stmt -> bindParam(':x3',$talla);
        $stmt -> bindParam(':x4',$cent_cintura);
        $stmt -> bindParam(':x5',$cent_cadera);
        $stmt -> bindParam(':x6',$presion_arte);
        $stmt -> bindParam(':x7',$imc);
        $stmt -> bindParam(':x8',$icc);
        $stmt -> bindParam(':x9',$sistematologia);
        $stmt -> bindParam(':x10',$recomendacion);
        $stmt -> bindParam(':x11',$progreso);
        $stmt -> bindParam(':x12',$comentarios_gen);
        $stmt -> bindParam(':x13',$FK_iddieta_dietas);
        
        
        

        $stmt -> execute();
        return $res->withJson('{"notice": {"text": "Visita agregada"}');
        
        

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }
});