<?php 
class DataBase{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $dbname = DB_NAME;

	public $link;
	public $error;

	public function __construct(){
		$this->connectDB();
	}
	private function connectDB(){/*instanciando la conexion con la BD*/
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if (!$this->link) {/*Si no existe la conexion que  me genere un mensaje de error*/
			$this->error = "Conexion fallida".$this->link->connect_error;
			return false;
		}
	}
		//Seleccionar o leer la Base de Datos
	public function select($query){
		$result = $this->link->query($query) or die ($this->link->error.__LINE__);/*__FILE__define la ruta*/
		if($result->num_rows > 0){
			return $result;
		}
		else{
			return false;
		}		
	}
	public function signIn($query, $user){
		$sign_row=$this->link->query($query) or die ($this->link->error.__LINE__); 
		if ($sign_row) {
			header("Location:../public/template.php?msg=".urlencode('Datos Correctos-Bienvenido!!!!'.$user));
			exit(); 
		}
		else{
			die("Error:(".$this->link->errno.")".$this->link-error);

		}
	}	
	public function registerUser($query){
		$sign_row = $this->link->query($query) or die ($this->error.__LINE__);
		if($sign_row){
			header("Location: ../public/listaUsuarios.php?msq=".urlencode('Datos Registrados correctamente!!!'));
			exit();
		}else{
			die("Error:(".$this->link->errno.")".$this->link-error);
		}
	}
	        //============ACTUALIZAR DATOS ===============================
	public function updateUser($query){
		$update_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if ($update_row) { 
			header("Location:../public/listaUsuarios.php?msg1=".urlencode('Los datos han sido actualizados exitosamente!!!!.'));
			exit();
		}else{
			die("Error:(".$this->link->errno.")".$this->link-error);
		}
	}

//=============================ELIMINAR DATOS =====================================
	public function deleteUser($query){
		$delete_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if ($delete_row) {
			header("Location:../public/listaUsuarios.php?msg1=".urlencode('Datos eliminados exitosamente!!!!')); 
			exit();
		}else{
			die("Error:(".$this->link->errno.")".$this->link-error);
		}
	}			
}
?>