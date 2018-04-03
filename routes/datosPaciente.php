<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app ->get('/api/v1/todosPacientes', function (Request $req, Response $res){
    $sql = "SELECT * FROM datosPaciente";
    try {
        $db = new db();
        $db = $db ->connect();
        $stmt = $db->query($sql);
        $Pacientes = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return $res->withJson($Pacientes);

    } catch (PDOException $e){
        echo '{"errorr": {"text":'.$e->getMessage().'}';
    }

});


$app ->post('/api/v1/paciente/add', function(Request $req, Response $res){
    
    //$fechaNacimiento = $req -> getParam('fechaNacimiento');
    
    
    $estadoCivil = $req -> getParam('estadoCivil');
    $genero = $req -> getParam('genero');
    $calle = $req -> getParam('calle');
    $numero =$req -> getParam('numero');
    $colonia =$req -> getParam('colonia');
    $codigoPostal =$req -> getParam('codigoPostal');
    $telefono =$req -> getParam('telefono');
    $celular =$req -> getParam('celular');
    $correo =$req -> getParam('correo');
    $ocupacion =$req -> getParam('ocupacion');
    
    
    


    $sql = "INSERT INTO datosPaciente VALUES (null, SYSDATE(), :x1, :x2, :x3, :x4, :x5, :x6, :x7, :x8, :x9, :x10, SYSDATE())";
    
    try {
        $db = new db();
        $db = $db ->connect();

        $stmt = $db -> prepare($sql);

        //$stmt -> bindParam(':fechaNacimiento',$fechaNacimiento);
        $stmt -> bindParam(':x1',$estadoCivil);
        $stmt -> bindParam(':x2',$genero);
        $stmt -> bindParam(':x3',$calle);
        $stmt -> bindParam(':x4',$numero);
        $stmt -> bindParam(':x5',$colonia);
        $stmt -> bindParam(':x6',$codigoPostal);
        $stmt -> bindParam(':x7',$telefono);
        $stmt -> bindParam(':x8',$celular);
        $stmt -> bindParam(':x9',$correo);
        $stmt -> bindParam(':x10',$ocupacion);
        
        

        $stmt -> execute();
        return $res->withJson('{"notice": {"text": "Paciente agregado"}');
        
        

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }
});

