<?php

class usuario
{
	public $id;
 	public $nombre;
  	public $apellido;
  	public $dni;
    public $usuario;
	public $password;
	public $estado;

  	public function Borrarusuario()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
			UPDATE `usuarios` SET `estado`=0 WHERE id =:id "
			);	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	}

	public static function BorrarusuarioPordni($dni)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
			UPDATE `usuarios` SET `estado`= 0 WHERE dni = :dni ");	
				$consulta->bindValue(':dni',$dni, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();

	 }
	public function Modificarusuario()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update usuarios 
				set nombre='$this->nombre',
				apellido='$this->apellido',
				dni='$this->dni'
                usuario='$this->usuario',
                password='$this->password',
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarElusuario()
	 {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre,apellido,dni,usuario,password,estado)values('$this->nombre','$this->apellido','$this->dni','$this->usuario','$this->password',1)");
		$consulta->execute();
		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

	public function ModificarusuarioParametros()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update usuarios 
				set nombre=:nombre,
				apellido=:apellido,
				dni=:dni,
                usuario=:usuario,
                password=:password
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':dni', $this->dni, PDO::PARAM_INT);
			$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
            $consulta->bindValue(':usuario', $this->usuario, PDO::PARAM_STR);
            $consulta->bindValue(':password', $this->password, PDO::PARAM_STR);
			
            return $consulta->execute();
	}

	public function InsertarelUsuarioParametros()
	 {	
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre,apellido,dni,usuario,password,estado)values(:nombre,:apellido,:dni,:usuario,:password,1)");
				
                $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':dni', $this->dni, PDO::PARAM_INT);
				$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
				$consulta->bindValue(':usuario', $this->usuario, PDO::PARAM_STR);
				$consulta->bindValue(':password', $this->password, PDO::PARAM_STR);
				$consulta->execute();		
				
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

	 public function Guardarusuario()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarusuarioParametros();
	 		}else {
	 			$this->InsertarElusuarioParametros();
	 		}

	 }


  	public static function TraerTodoLosusuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, apellido as apellido,dni as dni, usuario as usuario,password as password,estado as estado from usuarios where 1");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");		
	}

	public static function TraerUnusuario($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, nombre as nombre, apellido as apellido,dni as dni, usuario as usuario,password as password,estado as estado from usuarios where id = $id");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;				

			
	}

	public static function TraerUnusuarioDni($id,$dni) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  nombre as nombre, apellido as apellido,dni as dni, usuario as usuario,password as password,estado as estado from usuarios  WHERE id=? AND dni=?");
			$consulta->execute(array($id, $dni));
			$usuarioBuscado= $consulta->fetchObject('usuario');
      		return $usuarioBuscado;				

			
	}

	public static function TraerUnusuarioParaLogin($usuario) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from usuarios WHERE usuario=?");
			$consulta->execute(array($usuario));
			$usuarioBuscado= $consulta->fetchObject('usuario');
      		return $usuarioBuscado;				

			
	}

	public static function TraerUnusuariodniParamNombre($id,$dni) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  nombre as nombre, apellido as apellido,dni as dni, usuario as usuario,password as password,estado as estado  from usuarios  WHERE id=:id AND dni=:dni");
			$consulta->bindValue(':id', $id, PDO::PARAM_INT);
			$consulta->bindValue(':dni', $dni, PDO::PARAM_INT);
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
      		return $usuarioBuscado;				

			
	}
	
	public static function TraerUnusuariodniParamNombreArray($id,$dni) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  nombre as nombre, apellido as apellido,dni as dni, usuario as usuario,password as password,estado as estado  from usuarios  WHERE id=:id AND dni=:dni");
			$consulta->execute(array(':id'=> $id,':dni'=> $dni));
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
      		return $usuarioBuscado;				

			
	}

	public function Login($usuario,$password)
	{
		$user = usuario::TraerUnusuarioParaLogin($usuario);

		if($user->password == $password && $user !== null)
		{
			$datos = array('usuario' =>  $user->usuario,'nombre' => $user->nombre);

			$token = AutentificadorJWT::CrearToken($datos);

			echo $token;
		}
	}

	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->nombre."  ".$this->apellido."  ".$this->dni;
	}

}

?>