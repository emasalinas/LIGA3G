<?
session_start(); //cada vez que usamos sesiones tenemos que inicializarla como primera linea del programa.
if($_POST["usuario"]=="" or $_POST["contrasena"]=="") //Si el usuario o la contrasena estan vacias
 {
$_SESSION["error"]= "El usuario o la contrase&ntilde;a est&aacute; vac&iacute;a";
//redireccionamos al index
header("location:index.php");
}
else{ //si el usuario o la contrasena tiene datos
		include("conexion.php");//Llamamos a los parámetros de conexión a la base
 		$sql=mysql_query("select * from usuarios where alias ='$_POST[usuario]'");
		if($rs=mysql_fetch_array($sql))
		 {
		 if($rs["contrasena"]==$_POST["contrasena"]) 
		 {
		  $_SESSION["exito"]= "Bienvenido, $rs[nombre] $rs[apellido].";
		  $_SESSION["id_usuario"]= $rs[alias];
		  $_SESSION["error"]="";
		  //BEGIN LIGA3G
		  $_SESSION["idequipo"]= $rs[idequipo];
		  $sql2=mysql_query("select * from equipos where idequipo ='$_SESSION[idequipo]'");
		  			if($rs2=mysql_fetch_array($sql2))
					{
					 $_SESSION["equipo"]= $rs2[nombre];
					}			
						
		  //END LIGA3G
		  header("location:registro.php");
		  }
		else
			{
	     $_SESSION["error"]= "La contrase&ntilde;a es inv&aacute;lida";
			 header("location:index.php");
		 	}
		 }
	 else	
	 	{
	     $_SESSION["error"]= "Usuario Inexistente";
			 header("location:index.php");
		 	} 
			
}

?>