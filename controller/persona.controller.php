<?php
require_once 'model/persona.php';

class PersonaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Persona();
    }
    
    public function Index(){
        require_once 'view/heder.php';
        require_once 'view/persona/persona.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $per = new Persona();
        
        if(isset($_REQUEST['ID'])){
            $per = $this->model->Obtener($_REQUEST['ID']);
        }
        
        require_once 'view/heder.php';
        require_once 'view/persona/persona-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $per = new Persona();
        
        $per->idpersona = $_REQUEST['ID'];
        $per->nombre = $_REQUEST['Nombre'];
        $per->apellido = $_REQUEST['Apellido'];
        $per->correo = $_REQUEST['Correo'];
        $per->telefono = $_REQUEST['Telefono'];
        $per->fechan = $_REQUEST['FechaN'];

        $per->idpersona > 0 ? $this->model->Actualizar($per) : $this->model->Registrar($per);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['ID']);
        header('Location: index.php');
    }
}