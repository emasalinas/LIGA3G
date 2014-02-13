<? session_start();
if ($_POST[nombre1]<>"")
{
	if ($_POST[apellido1]<>"")
		{
        $_SESSION[exito]="Bienvenido, $_POST[nombre] $_POST[apellido].";
		include("conexion.php");//Llamamos a los parámetros de conexión a la base
 		$sql=mysql_query("select * from usuarios where alias ='$_POST[usuario]'");
			if($rs=mysql_fetch_array($sql))
				$_SESSION[error]="Este nombre de usuario ya existe.";
			else //Si el nombre de usuario no existe chequeo lo siguiente
			{
				if($_POST[contrasena1]==$_POST[contrasena2]and($_POST[contrasena1]<>"")and($_POST[contrasena2]<>"")) //que las contrasenas coincidan y 									que esten completas
				//guardo en la base el usuario
				{
				mysql_query("insert into jugadores (idequipo,nombre,apellido,dni,fec_nac,email)
							 values ('$_SESSION[idequipo]','$_POST[nombre1]','$_POST[apellido1]','$_POST[dni1]','$_POST[fec_nac1]')");
;
							 $_SESSION[id_usuario]=mysql_insert_id();//Devuelve el último insertado
							 header ("location:index.php");
				}
				else		
					$_SESSION[error]="Las contrase&ntilde;as ingresadas no coinciden.";		
			}
		}
	else
		$_SESSION[error]="Debe ingresar un nombre de usuario";
}

?>
<html lang="en">
	<head>
	<title>LIGA 3G - POSICIONES</title>
	<meta charset="utf-8">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<meta name="description" content="Ganar, Gustar y Golear. Liga de Fútbol 11 que se desarrolla en el Automóvil Club SN. ¡Sumá tu buena onda a la nuestra!">
	<meta name="keywords" content="Your keywords">
	<meta name="author" content="Your name">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>   
    
	<script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script>
	<script>		
		 jQuery(window).load(function() {	
		 $x = $(window).width();		
	if($x > 1024)
	{			
	jQuery("#content .row").preloader();}	
	
	jQuery(".list-blog li:last-child").addClass("last"); 
	jQuery(".list li:last-child").addClass("last"); 

	
    jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});	
  		  }); 
					
	</script>

	<!--[if lt IE 8]>
  		<div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
 	<![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!-->
	<!--<![endif]-->
	<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/docs.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
  <![endif]-->
	</head>

	<body>
<div class="spinner"></div>
<!--============================== header =================================-->
<header>
      <div class="container clearfix">
    <div class="row">
          <div class="span12">
        <div class="navbar navbar_">
              <div class="container">
            <h1 class="brand brand_"><a href="index.html"><img alt="" src="img/logo_1.png"  height="70" width="230">> </a></h1>
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
            <div class="nav-collapse nav-collapse_  collapse">
                  <ul class="nav sf-menu">
                <li><a href="index_m.html">Inicio</a></li>
                <li class="sub-menu"><a href="#">Estadíst.</a>
                   <ul>
                    <li><a href="posiciones_m.html">Posiciones</a></li>
                    <li><a href="goleadores_m.html">Goleadores</a></li>
                    <li><a href="tribunal_m.html">Tribunal</a></li>
                    <li><a href="fixture_m.html">Fixture</a></li>
                  </ul>
               </li>
                <li><a href="galeria_m.html">Galería</a></li>
                <li><a href="news_m.html">Noticias</a></li>
                <li><a href="contacto.html">Contacto</a></li>
              </ul>
                </div>
          </div>
            </div>
      </div>
        </div>
  </div>
    </header>
<div class="bg-content">       
  <!--============================== content =================================-->      
   <div id="content"><div class="ic"></div>
    <div class="container">
          <div class="row">
        <article class="span8">
         <div class="inner-1">         
          <ul class="list-blog">
		  <li>
          	<? echo $_SESSION[exito] ?><br>
			<a href="logoff.php">Cerrar sesi&oacute;n</a>
          </li>
          <li>  
            <h3>LISTA DE BUENA FE <br></h3>
            <time datetime="2012-11-09" class="date-1">Recuerda:</time>
            <div class="name-author">
            -Sólo se pueden registrar 22 jugadores.<br>
			-El capitán debe estar incluido en esta lista.<br>
            -Una vez que registras la lista podrá ser modificada hasta 1 semana antes del inicio del campeonato.<br>
            -Una vez iniciado el campeonato, si deseas inscribir otro jugador se deberá abonar el cánon previsto por la Organización.<br>
            -Cada jugador debe presentar obligatoriamente certificado médico. De lo contrario, no podrá participar del certamen.
         	</div>
            <time datetime="2012-11-09" class="date-1">Pasos:       </time>
            <div class="name-author">
            Introduce los datos necesarios de cada jugador en los campos que aparecen a continuación.<br>
            Una vez que tengas cada dato chequeado presiona el botón "Ingresar" que se encuentra al final de la lista.
            </div>
            
            <!--<a href="#" class="comments">11 comments</a> !-->
            <div class="clear"></div>
            </li>
            <div>
			<h3>EQUIPO: <strong><? echo $_SESSION[equipo] ?></strong></h3>     

            <form  name="f2" action="registro.php" method="post">
		    <font color="#FF0000"><? echo $_SESSION[error]; ?></font>
              <table cellspacing="0" cellpadding="0">
                <col width="80">
                <col width="107">
                <col width="80" span="8">
                <tr>
                  <td width="46" align="center">Nº</td>
                  <td width="145" align="center">Nombre Jugador</td>
                  <td width="51" align="center">Apellido Jugador</td>
                  <td width="46" align="center">DNI</td>
                  <td width="30" align="center">Fecha de Nacimiento</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td><input type="text" name="nombre1"></td>
                  <td><input type="text" name="apellido1"></td>
                  <td><input type="text" name="dni1"></td>
                  <td><input type="text" name="fec_nac1"></td>
		        </tr>
                <tr>
                  <td>2</td>
                  <td><input type="text" name="nombre2"></td>
                  <td><input type="text" name="apellido2"></td>
                  <td><input type="text" name="dni2"></td>
                  <td><input type="text" name="fec_nac2"></td>
		        </tr>
                <tr>
                  <td>3</td>
                  <td><input type="text" name="nombre3"></td>
                  <td><input type="text" name="apellido3"></td>
                  <td><input type="text" name="dni3"></td>
                  <td><input type="text" name="fec_nac3"></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td><input type="text" name="nombre4"></td>
                  <td><input type="text" name="apellido4"></td>
                  <td><input type="text" name="dni4"></td>
                  <td><input type="text" name="fec_nac4"></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td><input type="text" name="nombre5"></td>
                  <td><input type="text" name="apellido5"></td>
                  <td><input type="text" name="dni5"></td>
                  <td><input type="text" name="fec_nac5"></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td><input type="text" name="nombre6"></td>
                  <td><input type="text" name="apellido6"></td>
                  <td><input type="text" name="dni6"></td>
                  <td><input type="text" name="fec_nac6"></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td><input type="text" name="nombre7"></td>
                  <td><input type="text" name="apellido7"></td>
                  <td><input type="text" name="dni7"></td>
                  <td><input type="text" name="fec_nac7"></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td><input type="text" name="nombre8"></td>
                  <td><input type="text" name="apellido8"></td>
                  <td><input type="text" name="dni8"></td>
                  <td><input type="text" name="fec_nac8"></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td><input type="text" name="nombre9"></td>
                  <td><input type="text" name="apellido9"></td>
                  <td><input type="text" name="dni9"></td>
                  <td><input type="text" name="fec_nac9"></td>
                </tr>
                <tr>
                  <td>10</td>
                  <td><input type="text" name="nombre10"></td>
                  <td><input type="text" name="apellido10"></td>
                  <td><input type="text" name="dni10"></td>
                  <td><input type="text" name="fec_nac10"></td>
                </tr>
                <tr>
                  <td>11</td>
                  <td><input type="text" name="nombre11"></td>
                  <td><input type="text" name="apellido11"></td>
                  <td><input type="text" name="dni11"></td>
                  <td><input type="text" name="fec_nac11"></td>
                </tr>
                <tr>
                  <td>12</td>
                  <td><input type="text" name="nombre12"></td>
                  <td><input type="text" name="apellido12"></td>
                  <td><input type="text" name="dni12"></td>
                  <td><input type="text" name="fec_nac12"></td>
		        </tr>
                <tr>
                  <td>13</td>
                  <td><input type="text" name="nombre13"></td>
                  <td><input type="text" name="apellido13"></td>
                  <td><input type="text" name="dni13"></td>
                  <td><input type="text" name="fec_nac13"></td>
		        </tr>
                <tr>
                  <td>14</td>
                  <td><input type="text" name="nombre14"></td>
                  <td><input type="text" name="apellido14"></td>
                  <td><input type="text" name="dni14"></td>
                  <td><input type="text" name="fec_nac14"></td>
                </tr>
                <tr>
                  <td>15</td>
                  <td><input type="text" name="nombre15"></td>
                  <td><input type="text" name="apellido15"></td>
                  <td><input type="text" name="dni15"></td>
                  <td><input type="text" name="fec_nac15"></td>
                </tr>
                <tr>
                  <td>16</td>
                  <td><input type="text" name="nombre16"></td>
                  <td><input type="text" name="apellido16"></td>
                  <td><input type="text" name="dni16"></td>
                  <td><input type="text" name="fec_nac16"></td>
                </tr>
                <tr>
                  <td>17</td>
                  <td><input type="text" name="nombre17"></td>
                  <td><input type="text" name="apellido17"></td>
                  <td><input type="text" name="dni17"></td>
                  <td><input type="text" name="fec_nac17"></td>
                </tr>
                <tr>
                  <td>18</td>
                  <td><input type="text" name="nombre18"></td>
                  <td><input type="text" name="apellido18"></td>
                  <td><input type="text" name="dni18"></td>
                  <td><input type="text" name="fec_nac18"></td>
                </tr>
                <tr>
                  <td>19</td>
                  <td><input type="text" name="nombre19"></td>
                  <td><input type="text" name="apellido19"></td>
                  <td><input type="text" name="dni19"></td>
                  <td><input type="text" name="fec_nac19"></td>
                </tr>
                <tr>
                  <td>20</td>
                  <td><input type="text" name="nombre20"></td>
                  <td><input type="text" name="apellido20"></td>
                  <td><input type="text" name="dni20"></td>
                  <td><input type="text" name="fec_nac20"></td>
                </tr>
                <tr>
                  <td>21</td>
                  <td><input type="text" name="nombre21"></td>
                  <td><input type="text" name="apellido21"></td>
                  <td><input type="text" name="dni21"></td>
                  <td><input type="text" name="fec_nac21"></td>
                </tr>
                <tr>
                  <td>22</td>
                  <td><input type="text" name="nombre22"></td>
                  <td><input type="text" name="apellido2"></td>
                  <td><input type="text" name="dni22"></td>
                  <td><input type="text" name="fec_nac22"></td>
                </tr>                
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><input name="submit" type="submit" value="Ingresar"></td>
                </tr>                
                
              </table>
              
              
             </form>
              
             
            
            </div>
            <!-- 
            <li>  
            <h3>Hendrerit in vulputate velit esse molestie</h3>     
            <time datetime="2012-11-08" class="date-1">8.11.2012</time>
            <div class="name-author">by <a href="#">Admin</a></div>
            <a href="#" class="comments">9 comments</a> 
            <div class="clear"></div>            
              <img alt="" src="img/page4-img2.jpg">                               
              <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum delenit augue duis dolore te feugait nulla facilisi.</p>
              <a href="#" class="btn btn-1">Read More</a>          
            </li> !-->
                                 
          </ul>
          </div>  
        </article>
        <!--
        <article class="span4">
          <h3 class="extra">Search</h3>
          <form id="search" action="search.php" method="GET" accept-charset="utf-8" >
            <div class="clearfix">
              <input type="text" name="s" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" >
              <a href="#" onClick="document.getElementById('search').submit()" class="btn btn-1">Search</a> </div>
          </form>
          <h3>Categories</h3>
          <ul class="list extra extra1">           
            <li><a href="#">Ut wisi enim ad minim veniam</a></li>
            <li><a href="#">Quis nostrud exerci tation ullamcorper</a></li>
            <li><a href="#">Suscipit lobortis nisl ut aliquip</a></li>
            <li><a href="#">Commodo consequat</a></li>
            <li><a href="#">Duis autem vel eum iriure dolor in hendrerit</a></li>
            <li><a href="#">Vulputate velit esse molestie consequat</a></li>
            <li><a href="#">Fel illum dolore eu feugiat nulla</a></li>
            <li><a href="#">Facilisis at vero eros et accumsan iusto</a></li>
            <li><a href="#">Odio dignissim qui blandit</a></li>
            <li><a href="#">Praesent luptatum zzril delenit augue</a></li>                      
      </ul>
          <h3>Archive</h3>
         <div class="wrapper">
          <ul class="list extra2 list-pad ">
            <li><a href="#">November 2012</a></li>
            <li><a href="#">October 2012</a></li>
            <li><a href="#">September 2012</a></li>
            <li><a href="#">August 2012</a></li>
            <li><a href="#">July 2012</a></li>
            <li><a href="#">June 2012</a></li>
          </ul>
            <ul class="list extra2">
            <li><a href="#">May 2012</a></li>
            <li><a href="#">April 2012</a></li>
            <li><a href="#">March 2012</a></li>
            <li><a href="#">February 2012</a></li>
            <li><a href="#">January 2012</a></li>
            <li><a href="#">December 2011</a></li>
          </ul>
          
          </div>
        </article>
        !-->
      </div>
     </div>
  </div>
 </div>

<!--============================== footer =================================-->
<footer>
      <div class="container clearfix">
    <ul class="list-social pull-right">
           <li><a class="icon-1" href="http://www.facebook.com/Liga3G" target="_blank"></a></li>
          <!--<li><a class="icon-2" href="#"></a></li>!-->
          <li><a class="icon-3" href="http://www.twitter.com/Liga3G" target="_blank"></a></li>
          <li><a class="icon-4" href="http://www.youtube.com/liga3G" target="_blank"></a></li>
        </ul>
    <div class="privacy pull-left">Organizado por TÁNDEM. </div>
  </div>
    </footer>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>