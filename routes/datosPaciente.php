<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app ->get('/modulo1/todosLosPacientes', function (Request $req, Response $res){
    
    $sql = "SELECT * FROM pacientes";

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



$app ->get('/modulo1/pacientePorId/{id}', function(Request $req, Response $res){
    $id = $req->getAttribute('id');
    $sql = "select * from pacientes WHERE idPaciente = $id";
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

$app ->delete('/modulo1/eliminarPorId/{id}', function (Request $req, Response $res){

    $id = $req->getAttribute('id');
    $sql = "DELETE FROM pacientes WHERE idPaciente = $id";

    try {
        $db = new db();
        $db = $db -> connect();
        $stmt = $db -> prepare($sql);       
        $stmt -> execute();
        echo '{"notice": {"text": "Customer delete"}';

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }

});

$app -> put('/modulo1/actualizarPacientePorId/{id}', function(Request $req, Response $res){
    
    $id = $req->getAttribute('id');

    echo  $req -> getParam('nombre');
   

    $nombre= $req -> getParam('nombre');
    $apellidos= $req -> getParam('apellidos');
    $fecha_nacimiento= $req -> getParam('fecha_nacimiento');
    $estado_civil= $req -> getParam('estado_civil');
    $genero= $req -> getParam('genero');
    $domicilio= $req -> getParam('domicilio');
    $telefono= $req -> getParam('telefono');
    $celular= $req -> getParam('celular');
    $email= $req -> getParam('email');
    $ocupacion= $req -> getParam('ocupacion');
    $fecha_registro= $req -> getParam('fecha_registro');
    $enfs_here= $req -> getParam('enfs_here');
    $ant_no_pat= $req -> getParam('ant_no_pat');
    $ant_peri= $req -> getParam('ant_peri');
    $ant_gine= $req -> getParam('ant_gine');
    $ant_pat= $req -> getParam('ant_pat');


    $sql = "UPDATE `nrm0t8gdg6uch1z6`.`pacientes` SET
    `nombre` = :x0,
    `apellidos` = :x1,
    `fecha_nacimiento` = :x2 ,
    `estado_civil` = :x3,
    `genero` = :x4,
    `domicilio` = :x5,
    `telefono` = :x6,
    `celular` = :x7,
    `email` = :x8 ,
    `ocupación` = :x9 ,
    `fecha_registro` = :x10,
    `enfs_here` = :x11,
    `ant_no_pat` = :x12,
    `ant_peri` = :x13,
    `ant_gine` = :x14,
    `ant_pat` = :x15
    WHERE `idpaciente` = $id ";

try {
    $db = new db();
    $db = $db ->connect();

    $stmt = $db -> prepare($sql);

    $stmt -> bindParam(':x0',$nombre);
    $stmt -> bindParam(':x1',$apellidos);
    $stmt -> bindParam(':x2',$fecha_nacimiento);
    $stmt -> bindParam(':x3',$estado_civil);
    $stmt -> bindParam(':x4',$genero );
    $stmt -> bindParam(':x5',$domicilio);
    $stmt -> bindParam(':x6',$telefono );
    $stmt -> bindParam(':x7',$celular);
    $stmt -> bindParam(':x8',$email);
    $stmt -> bindParam(':x9',$ocupacion );
    $stmt -> bindParam(':x10',$fecha_registro);
    $stmt -> bindParam(':x11',$enfs_here);
    $stmt -> bindParam(':x12',$ant_no_pat);
    $stmt -> bindParam(':x13',$ant_peri);
    $stmt -> bindParam(':x14',$ant_gine);
    $stmt -> bindParam(':x15',$ant_pat);
    

    $stmt -> execute();
    
    echo '{"notice": {"text": "Paciente actualizado"}';

} catch (PDOException $e){
    echo '{"error": {"text":'.$e->getMessage().'}';
}
});

$app ->post('/modulo1/agregarPaciente', function(Request $req, Response $res){
    
    //$fechaNacimiento = $req -> getParam('fechaNacimiento');
    

    $nombre = $req -> getParam('nombre');
    $apellidos = $req -> getParam('apellidos');
    $fecha_nacimiento = $req -> getParam('fecha_nacimiento');
    $estado_civil=$req -> getParam('estado_civil');
    $genero =$req -> getParam('genero');
    $domicilio =$req -> getParam('domicilio');
    $telefono =$req -> getParam('telefono');
    $celular =$req -> getParam('celular');
    $email =$req -> getParam('email');
    $ocupacion =$req -> getParam('ocupacion');
    $fecha_registro =$req -> getParam('fecha_registro');
    
    $enfs_here =$req -> getParam('enfs_here');
    $ant_no_pat =$req -> getParam('ant_no_pat');
    $ant_peri =$req -> getParam('ant_peri');
    $ant_gine =$req -> getParam('ant_gine');
    $ant_pat =$req -> getParam('ant_pat');


    $sql = "INSERT INTO `nrm0t8gdg6uch1z6`.`pacientes`
    (`idpaciente`,
    `nombre`,
    `apellidos`,
    `fecha_nacimiento`,
    `estado_civil`,
    `genero`,
    `domicilio`,
    `telefono`,
    `celular`,
    `email`,
    `ocupación`,
    `fecha_registro`,
    `enfs_here`,
    `ant_no_pat`,
    `ant_peri`,
    `ant_gine`,
    `ant_pat`)
    VALUES
    (null, :x0, :x1, :x2, :x3, :x4, :x5, :x6,
    :x7, :x8,:x9, :x10, :x11, :x12, :x13,
    :x14, :x15)";
    
    try {
        $db = new db();
        $db = $db ->connect();

        $stmt = $db -> prepare($sql);

        //$stmt -> bindParam(':fechaNacimiento',$fechaNacimiento);
        $stmt -> bindParam(':x0',$nombre);
        $stmt -> bindParam(':x1',$apellidos);
        $stmt -> bindParam(':x2',$fecha_nacimiento);
        $stmt -> bindParam(':x3',$estado_civil);
        $stmt -> bindParam(':x4',$genero );
        $stmt -> bindParam(':x5',$domicilio);
        $stmt -> bindParam(':x6',$telefono );
        $stmt -> bindParam(':x7',$celular);
        $stmt -> bindParam(':x8',$email);
        $stmt -> bindParam(':x9',$ocupacion );
        $stmt -> bindParam(':x10',$fecha_registro);
        $stmt -> bindParam(':x11',$enfs_here);
        $stmt -> bindParam(':x12',$ant_no_pat);
        $stmt -> bindParam(':x13',$ant_peri);
        $stmt -> bindParam(':x14',$ant_gine);
        $stmt -> bindParam(':x15',$ant_pat);
        
        

        $stmt -> execute();
        return $res->withJson('{"notice": {"text": "Paciente agregado"}');
        
        

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }
});

