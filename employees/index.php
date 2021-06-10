<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET,POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    // Conecta a la base de datos  con usuario, contraseña y nombre de la BD
    $servidor = "localhost"; $usuario = "root"; $contrasenia = "admin"; $nombreBaseDatos = "employees";
    $conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);


    // Consulta datos y recepciona una clave para consultar dichos datos con dicha clave
    if (isset($_GET["consultar"])){
        $sqlEmployees = mysqli_query($conexionBD,"SELECT * FROM employees WHERE id_employee=".$_GET["consultar"]);
        if(mysqli_num_rows($sqlEmployees) > 0){
            $employees = mysqli_fetch_all($sqlEmployees, MYSQLI_ASSOC);
            echo json_encode($employees);
            exit();
        }
        else{  echo json_encode(["success"=>0]); }
    }
    //borrar pero se le debe de enviar una clave ( para borrado )
    if (isset($_GET["borrar"])){
        $sqlEmployees = mysqli_query($conexionBD,"DELETE FROM employees WHERE id_employee=".$_GET["borrar"]);
        if($sqlEmployees){
            echo json_encode(["success"=>1]);
            exit();
        }
        else{  echo json_encode(["success"=>0]); }
    }
    //Inserta un nuevo registro y recepciona en método post los datos de name y email
    if(isset($_GET["insertar"])){
        $data = json_decode(file_get_contents("php://input"));
        $name=$data->name;
        $email=$data->email;
        $sqlEmployees = mysqli_query($conexionBD,"INSERT INTO employees(name, email) VALUES('$name','$email') ");
        echo json_encode(["success"=>1]);
        exit();
    }
    // Actualiza datos pero recepciona datos de name, email y una clave para realizar la actualización
    if(isset($_GET["actualizar"])){
        
        $data = json_decode(file_get_contents("php://input"));

        $id_employee=$data->id_employee;
        $name=$data->name;
        $email=$data->email;
        
        $sqlEmployees = mysqli_query($conexionBD,"UPDATE employees SET name='$name',email='$email' WHERE id_employee='$id_employee'");
        echo json_encode(["success"=>1]);
        exit();
    }
    // Consulta todos los registros de la tabla employees
    $sqlEmployees = mysqli_query($conexionBD,"SELECT * FROM employees ");
    if(mysqli_num_rows($sqlEmployees) > 0){
        $employees = mysqli_fetch_all($sqlEmployees,MYSQLI_ASSOC);
        echo json_encode($employees);
    }
    else{ 
        echo json_encode([["success"=>0]]); 
    }
?>