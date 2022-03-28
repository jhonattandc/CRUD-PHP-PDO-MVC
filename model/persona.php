<?php

class Persona{

    private $pdo;

    public $idpersona;
    public $nombre;
    public $apellido;
    public $correo;
    public $telefono;
    public $fechan;

    public function __CONSTRUCT(){
        try{
            $this -> pdo = Conexion::StartUp();
        }catch ( exception $e){
            die($e -> getmessage());
        }
    }
    
    public function registro($valores) {
        $persona = new Persona();
		$persona->nombre = $valores->Nombre;
		$persona->apellido = $valores->Apellido;
		$persona->correo = $valores->Correo;
		$persona->telefono = $valores->Telefono;
		$persona->fechan = $valores->FechaN;
		return $persona;
	} 

    public function Listar(){
        try{
            $result = array();

            $stm = $this -> pdo -> prepare("SELECT * FROM persona");
            $stm -> execute();

            return $stm -> fetchAll(PDO::FETCH_OBJ);
        }catch( exception $e ){
            die($e -> getmessage());
        }
    }

    public function Obtener($idpersona){
		try {
			$stm = $this -> pdo -> prepare("SELECT * FROM persona WHERE ID = ?");      
			$stm -> execute(array($idpersona));

			return $stm -> fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

    public function Eliminar($idpersona){
		try {
			$stm = $this -> pdo -> prepare("DELETE FROM persona WHERE ID = ?");			          
			$stm->execute(array($idpersona));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

    public function Actualizar($data){
		try {
			$sql = "UPDATE persona SET Nombre = ?, Apellido = ?, Correo = ?, Telefono = ?, FechaN = ? WHERE Id = ?";

			$this -> pdo -> prepare($sql) ->execute(array($data->nombre, $data->apellido, $data->correo, $data->telefono, $data->fechan, $data->ID));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function Registrar(Persona $data){
		try {
		$sql = "INSERT INTO persona (Nombre,Apellido,Correo,Telefono,FechaN) VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)->execute(array($data->nombre, $data->apellido, $data->correo, $data->telefono, $data->fechan));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}


?>