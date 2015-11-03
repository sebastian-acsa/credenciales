<?php

//---  Datos de configuracion guardados en variables globales
 //Datos de configuracion se guardan en las variables funcionan para todos los programas
 //$Usuario="shadowspeal";  /*root*/
 //$Password="rasengan";
 //$Servidor="localhost"; /*localhost*/
 //$BaseDeDatos="constar";
 //Al interrumpir la ejecucion de un programa en un aborto, se deben de mostrar en un echo
 //todas las variables de configuracion incluyendo la variable programa en este codigo
 //---
 //---   $programa
 //La variable $programa debe ser definida por el programa que incluye este codigo
 //Describiendo su nombre y ubicacion por ejemplo si se le llama de nuevo_proveedor.php
 //deberá ser definida como
 //$programa="index.php en sub directorio de proveedores";
 //include ("../conectar.php"); la definición es antes de incluir este código
 //---
 //---    $DebuggingMode
 //La variable $DebuggingMode puede ser utilizada por el progama que incluye este
 //codigo para consultarla y enviar mensajes de depuración cuando la variable
 //sea TRUE
 //---
 $Usuario="usmotors_usmotor";  //Usuario para conectarse a MySql
 $Password="zapuramotor58";
 $Servidor="usmotorsmexico.com:2082"; //Nombre del servidor
 $BaseDeDatos="usmotors_SALDOINVMU"; //Nombre de la Base de datos
 $DebuggingMode = FALSE;//FALSE no muestra las acciones importantes // TRUE proporciona informacion de las acciones
//Abre una conexion
$conexion = sisBibAbreConexion();
//Funciones mysql
    function sisBibAbreConexion()
    {
     GLOBAL $Usuario;
     GLOBAL $Password;
     GLOBAL $Servidor;
     GLOBAL $BaseDeDatos;
     GLOBAL $DebuggingMode;
     GLOBAL $programa;
     $conexionBD =mysql_connect($Servidor,$Usuario,$Password)
      Or die(
      "<p>======================================================================================</p>"
    . "<p>ABORTA Modulo: sisBibAbreConexion -- Error al conectarse al servidor de Base de Datos</p>"
    . "<p> La funcion fue utilizada en el modulo (". $programa . ")</p>"
    . "<p> Codigo de error " . mysql_connect_errno(). ": " . mysql_connect_error() . "</p>"
    . "<p> Datos de conexion al servidor "
    . " </p><p>Servidor:(" . $Servidor
    . ")</p><p> Usuario:(" . $Usuario
    . ")</p><p> Password:(". $Password
    . ")</p><p> Base de Datos:(" . $BaseDeDatos
    . ")</p>"
    ."<p>======================================================================================</p>" );
    if ($DebuggingMode)
         {
     echo "<p>======================================================================================</p>"
       ."<br>Modulo: sisBibAbreConexion envia el siguiente mensaje -- Se conecto al servidor con exito</br>"
       . "<br> La funcion fue utilizada en el modulo (". $programa . ")</br>"
       . "<p> Datos de conexion al servidor "
       . " </p><p>Servidor:(" . $Servidor
       . ")</p><p> Usuario:(" . $Usuario
       . ")</p><p> Password:(". $Password
       . ")</p><p> Base de Datos:(" . $BaseDeDatos
       . ")</p>"
       ."<p>======================================================================================</p>" ;
     }
    $descriptor=mysql_select_db($BaseDeDatos,$conexionBD)
          Or die(
      "<p>======================================================================================</p>"
    . "<p>ABORTA Modulo: sisBibAbreConexion -- Error al seleccionar la Base de Datos</p>"
    . "<p> La funcion fue utilizada en el modulo (". $programa . ")</p>"
    . "<p> Codigo de error " . mysql_connect_errno(). ": " . mysql_connect_error() . "</p>"
    . "<p> Datos de conexion al servidor "
    . " </p><p>Servidor:(" . $Servidor
    . ")</p><p> Usuario:(" . $Usuario
    . ")</p><p> Password:(". $Password
    . ")</p><p> Base de Datos:(" . $BaseDeDatos
    . ")</p>"
    ."<p>======================================================================================</p>" );
    if ($DebuggingMode)
     {
     echo "<p>======================================================================================</p>"
       ."<br>Modulo: sisBibAbreConexion envia el siguiente mensaje -- Selecciono la Base De Datos con exito</br>"
       . "<br> La funcion fue utilizada en el modulo (". $programa . ")</br>"
       . "<p> Datos de conexion al servidor "
       . " </p><p>Servidor:(" . $Servidor
       . ")</p><p> Usuario:(" . $Usuario
       . ")</p><p> Password:(". $Password
       . ")</p><p> Base de Datos:(" . $BaseDeDatos
       . ")</p>"
       ."<p>======================================================================================</p>" ;
     }
    return $conexionBD;
    //Termina sisBibAbreConexion
    }
   function sisBibEjecutaSql($instruccionesSql)
   {
     GLOBAL $Usuario;
     GLOBAL $Password;
     GLOBAL $Servidor;
     GLOBAL $BaseDeDatos;
     GLOBAL $DebuggingMode;
     GLOBAL $conexion;
     GLOBAL $programa;
       $resultado = mysql_query($instruccionesSql,$conexion)
    	Or die(
           "<p>======================================================================================</p>"
           ."<p>ABORTA Modulo sisBibEjecutaSql -- Error al ejecutar SQL</p>"
           ."<p>(".$instruccionesSql.")</p>"
           . "<p> La funcion fue utilizada en el modulo (". $programa . ")</p>"
           . "<p> Codigo de error " . mysql_errno($conexion). ": " . mysql_error($conexion) . "</p>"
           . "<p> Datos de conexion al servidor "
           . " </p><p>Servidor:(" . $Servidor
           . ")</p><p> Usuario:(" . $Usuario
           . ")</p><p> Password:(".$Password
           . ")</p><p> Base de Datos:(" . $BaseDeDatos
           . ")</p>"
           ."<p>======================================================================================</p>");
       if ($DebuggingMode)
          {
          echo "<p>======================================================================================</p>"
          . "<p>Modulo sisBibEjecutaSql envia el siguiente mensaje -- </p>"
          . "<p> Se ejecuto el siguiente SQL con exito (".$instruccionesSql.")</p>"
          . "<p> La función fue utilizada en el modulo (". $programa . ")</p>"
          . "  <p> Datos de conexion al servidor "
          . " </p><p>Servidor:(" . $Servidor
          . ")</p><p> Usuario:(" . $Usuario
          . ")</p><p> Password:(". $Password
          . ")</p><p> Base de Datos:(" . $BaseDeDatos
          . ")</p>"
          ."<p>======================================================================================</p>" ;
          }
       return $resultado;
      //Termina sisBibEjecutaSql
    }
  function sisBibSelectOne($nomTabla,
  		$valorCampo,  //campo pasado por referencia
  		$valorLlave)
   {
       $instruccionesSql="SELECT * FROM " . $nomTabla . " WHERE " ;
       $nombres[]=array();
       $Llaves[]=array();
       $numLlaves=0;
       $prog="";
       GLOBAL $Usuario;
       GLOBAL $Password;
       GLOBAL $Servidor;
       GLOBAL $BaseDeDatos;
       GLOBAL $DebuggingMode;
       GLOBAL $conexion;
       GLOBAL $programa;
       sisBibCargaNombres($nomTabla,
                    &$nombres,
                    &$numLlaves,
                    &$numCampos,
                    &$Llaves);
        $condicion ="";
        $wand=" ";
        for ($i=0;$i< $numLlaves; $i++)
             {$condicion = $condicion . $wand . " ".
                          $nombres[$Llaves[$i]] .
                          " = '" . $valorLlave[$i] . "' " ;
             $wand = " AND ";}
       
        $instruccionesSql = $instruccionesSql . $condicion;
        $prog = $programa;
        $programa = "sisBibSelectOne";
        $resultado = sisBibEjecutaSql($instruccionesSql)
   	    Or die(
           "<p>======================================================================================</p>"
           ."<p>ABORTA Modulo sisBibselectOne -- Error al ejecutar SQL</p>"
           ."<p>(".$instruccionesSql.")</p>"
           . "<p> La funcion fue utilizada en el modulo (". $prog . ")</p>"
           . "<p> Codigo de error " . mysql_errno($conexion). ": " . mysql_error($conexion) . "</p>"
           . "<p> Datos de conexion al servidor "
           . " </p><p>Servidor:(" . $Servidor
           . ")</p><p> Usuario:(" . $Usuario
           . ")</p><p> Password:(".$Password
           . ")</p><p> Base de Datos:(" . $BaseDeDatos
           . ")</p>"
           ."<p>======================================================================================</p>");
       if ($DebuggingMode)
          {
          echo "<p>======================================================================================</p>"
          . "<p>Modulo sisBibselectOne envia el siguiente mensaje -- </p>"
          . "<p> Se ejecuto el siguiente SQL con exito (".$instruccionesSql.")</p>"
          . "<p> La función fue utilizada en el modulo (". $prog . ")</p>"
          . "  <p> Datos de conexion al servidor "
          . " </p><p>Servidor:(" . $Servidor
          . ")</p><p> Usuario:(" . $Usuario
          . ")</p><p> Password:(". $Password
          . ")</p><p> Base de Datos:(" . $BaseDeDatos
          . ")</p>"
          ."<p>======================================================================================</p>" ;
          }
          $programa = $prog;
          if ($row = $resultado->fetch_row())
            {for ($i=0;$i< $numCampos; $i++)
               $valorCampo[$i] = $row[$i];
             return 1;}
          else
             return 0;
     //Termina sisBibSelectOne
    }
    function sisBibSelectGroup($nomTabla,
  		$condicion,
        $valorCampo,  //Se pasa por referencia
        $numRenglones //Se pasa por referencia
         )
  {    GLOBAL $Usuario;
       GLOBAL $Password;
       GLOBAL $Servidor;
       GLOBAL $BaseDeDatos;
       GLOBAL $DebuggingMode;
       GLOBAL $conexion;
       GLOBAL $programa;
       $instruccionesSql="SELECT * FROM " .
                          $nomTabla .
                          " " .
                          $condicion ;
       $nombres[]=array();
       $Llaves[]=array();
       $numLlaves=0;
       sisBibCargaNombres($nomTabla,
                    &$nombres,
                    &$numLlaves,
                    &$numCampos,
                    &$Llaves);
        $prog = $programa;
        $programa = "sisBibSelectGroup";
        $resultado = sisBibEjecutaSql($instruccionesSql)
   	    Or die(
           "<p>======================================================================================</p>"
           ."<p>ABORTA Modulo sisBibSelectGroup -- Error al ejecutar SQL</p>"
           ."<p>(".$instruccionesSql.")</p>"
           . "<p> La funcion fue utilizada en el modulo (". $prog . ")</p>"
           . "<p> Codigo de error " . mysql_errno($conexion). ": " . mysql_error($conexion) . "</p>"
           . "<p> Datos de conexion al servidor "
           . " </p><p>Servidor:(" . $Servidor
           . ")</p><p> Usuario:(" . $Usuario
           . ")</p><p> Password:(".$Password
           . ")</p><p> Base de Datos:(" . $BaseDeDatos
           . ")</p>"
           ."<p>======================================================================================</p>");
       if ($DebuggingMode)
          {
          echo "<p>======================================================================================</p>"
          . "<p>Modulo sisBibSelectGroup envia el siguiente mensaje -- </p>"
          . "<p> Se ejecuto el siguiente SQL con exito (".$instruccionesSql.")</p>"
          . "<p> La función fue utilizada en el modulo (". $prog . ")</p>"
          . "  <p> Datos de conexion al servidor "
          . " </p><p>Servidor:(" . $Servidor
          . ")</p><p> Usuario:(" . $Usuario
          . ")</p><p> Password:(". $Password
          . ")</p><p> Base de Datos:(" . $BaseDeDatos
          . ")</p>"
          ."<p>======================================================================================</p>" ;
          }
         $programa = $prog;
         $numRenglones=0;
         while ($row = $resultado->fetch_row())
            {for ($i=0;$i< $numCampos; $i++)
               $valorCampo [$numRenglones][$i] = $row[$i];
               //echo "<br> valor del campo (".$valorCampo [$numRenglones][$i].")";
             $numRenglones++;
             }
    //Termina sisBibSelectGroup
    }

    function sisBibDelete($nomTabla,
                    $valorLlave)
     {
       GLOBAL $Usuario;
       GLOBAL $Password;
       GLOBAL $Servidor;
       GLOBAL $BaseDeDatos;
       GLOBAL $DebuggingMode;
       GLOBAL $conexion;
       GLOBAL $programa;
       $instruccionesSql="DELETE FROM " .
                          $nomTabla .
                          " WHERE " ;
       $nombres[]=array();
       $Llaves[]=array();
       $numLlaves=0;
       sisBibCargaNombres($nomTabla,
                    &$nombres,
                    &$numLlaves,
                    &$numCampos,
                    &$Llaves);
        $condicion ="";
        $wand=" ";
        for ($i=0;$i< $numLlaves; $i++)
             {$condicion = $condicion . $wand . " ".
                          $nombres[$Llaves[$i]] .
                          " = '" . $valorLlave[$i] . "' " ;
             $wand = " AND ";}

        $prog = $programa;
        $programa = "sisBibDelete";
        $instruccionesSql = $instruccionesSql . $condicion;
        $resultado = sisBibEjecutaSql($instruccionesSql)
   	    Or die(
           "<p>======================================================================================</p>"
           ."<p>ABORTA Modulo sisBibDelete -- Error al ejecutar SQL</p>"
           ."<p>(".$instruccionesSql.")</p>"
           . "<p> La funcion fue utilizada en el modulo (". $prog . ")</p>"
           . "<p> Codigo de error " . mysql_errno($conexion). ": " . mysql_error($conexion) . "</p>"
           . "<p> Datos de conexion al servidor "
           . " </p><p>Servidor:(" . $Servidor
           . ")</p><p> Usuario:(" . $Usuario
           . ")</p><p> Password:(".$Password
           . ")</p><p> Base de Datos:(" . $BaseDeDatos
           . ")</p>"
           ."<p>======================================================================================</p>" );
       $programa = $prog;
       if ($DebuggingMode)
          {
          echo "<p>======================================================================================</p>"
          . "<p>Modulo sisBibDelete envia el siguiente mensaje -- </p>"
          . "<p> Se ejecuto el siguiente SQL con exito (".$instruccionesSql.")</p>"
          . "<p> La función fue utilizada en el modulo (". $prog . ")</p>"
          . "  <p> Datos de conexion al servidor "
          . " </p><p>Servidor:(" . $Servidor
          . ")</p><p> Usuario:(" . $Usuario
          . ")</p><p> Password:(". $Password
          . ")</p><p> Base de Datos:(" . $BaseDeDatos
          . ")</p>"
          ."<p>======================================================================================</p>" ;
          }
        return $resultado;
        //Termina sisBibDelete
        }
   function sisBibUpdate($nomTabla,
		$nombreCampo,
		$valorCampo)
   {
       GLOBAL $Usuario;
       GLOBAL $Password;
       GLOBAL $Servidor;
       GLOBAL $BaseDeDatos;
       GLOBAL $DebuggingMode;
       GLOBAL $conexion;
       GLOBAL $programa;
        $i=0;
		$n = count($nombreCampo);
		$query = "UPDATE " . $nomTabla . " SET ";
		if ($n>1)
			{for ($i=0;$i<$n-1 ; $i++)
		    	{$query .= " " . trim($nombreCampo[$i]) . " = '" .
                  trim($valorCampo[$i]) . " ', ";
		    	}
            $query .= " " . trim($nombreCampo[$i]) . " = '" .
                      trim($valorCampo[$i]) . " ' ";

            }
		else
			{$query .= " " . trim($nombreCampo[0]) . " = '" .
                    trim($valorCampo[0]) . " ' ";

			 }
       $query=$query. " WHERE " ;
       $nombres[]=array();
       $Llaves[]=array();
       $numLlaves=0;
       $numCampos=0;
       sisBibCargaNombres($nomTabla,
                    &$nombres,
                    &$numLlaves,
                    &$numCampos,
                    &$Llaves);
        $condicion ="";
        $wand=" ";
        for ($i=0;$i< $numLlaves; $i++)
             {$condicion = $condicion . $wand . " ".
                          $nombres[$Llaves[$i]] .
                          " = '" . trim($valorCampo[$Llaves[$i]]) . "' " ;
             $wand = " AND ";}

        $query = $query . $condicion;
        $prog = $programa;
        $programa = "sisBibUpdate";
        $instruccionesSql = $query;
        $resultado = sisBibEjecutaSql($instruccionesSql)
   	    Or die(
           "<p>======================================================================================</p>"
           ."<p>ABORTA Modulo sisBibUpdate -- Error al ejecutar SQL</p>"
           ."<p>(".$instruccionesSql.")</p>"
           . "<p> La funcion fue utilizada en el modulo (". $prog . ")</p>"
           . "<p> Codigo de error " . mysql_errno($conexion). ": " . mysql_error($conexion) . "</p>"
           . "<p> Datos de conexion al servidor "
           . " </p><p>Servidor:(" . $Servidor
           . ")</p><p> Usuario:(" . $Usuario
           . ")</p><p> Password:(".$Password
           . ")</p><p> Base de Datos:(" . $BaseDeDatos
           . ")</p>"
           ."<p>======================================================================================</p>") ;
       $programa = $prog;
       if ($DebuggingMode)
          {
          echo "<p>======================================================================================</p>"
          . "<p>Modulo sisBibUpdate envia el siguiente mensaje -- </p>"
          . "<p> Se ejecuto el siguiente SQL con exito (".$instruccionesSql.")</p>"
          . "<p> La función fue utilizada en el modulo (". $prog . ")</p>"
          . "  <p> Datos de conexion al servidor "
          . " </p><p>Servidor:(" . $Servidor
          . ")</p><p> Usuario:(" . $Usuario
          . ")</p><p> Password:(". $Password
          . ")</p><p> Base de Datos:(" . $BaseDeDatos
          . ")</p>"
          ."<p>======================================================================================</p>" ;
          }
        return $resultado;
        //Termina el SisBibUpdate
      }
     function sisBibInsert($tabla, $nombreCampo,$valorCampo,$numCampos)
     {
       GLOBAL $Usuario;
       GLOBAL $Password;
       GLOBAL $Servidor;
       GLOBAL $BaseDeDatos;
       GLOBAL $DebuggingMode;
       GLOBAL $conexion;
       GLOBAL $programa;

    $i=0;
  	$n =$numCampos;
	if ($n<=1)
	 	return 0;
    $query = "INSERT INTO " . $tabla . " (";
    for ($i=0;$i<$n-1 ; $i++)
	   	{$query = $query." " . $nombreCampo[$i] . ", ";
	   	}
	    $query = $query." " . $nombreCampo[$n - 1] . " ) VALUES ( " ;
    for ($i=0;$i<$n-1 ; $i++)
	   	{$query = $query." '" . $valorCampo[$i] . " ', ";
	   	}
	    $query = $query." '" . $valorCampo[$n - 1] . "' )" ;
        $prog = $programa;
        $programa = "sisBibInsert";
        $instruccionesSql = $query;
        $resultado = sisBibEjecutaSql($instruccionesSql)
   	    Or die(
           "<p>======================================================================================</p>"
           ."<p>ABORTA Modulo sisBibInsert -- Error al ejecutar SQL</p>"
           ."<p>(".$instruccionesSql.")</p>"
           . "<p> La funcion fue utilizada en el modulo (". $prog . ")</p>"
           . "<p> Codigo de error " . mysql_errno($conexion). ": " . mysql_error($conexion) . "</p>"
           . "<p> Datos de conexion al servidor "
           . " </p><p>Servidor:(" . $Servidor
           . ")</p><p> Usuario:(" . $Usuario
           . ")</p><p> Password:(".$Password
           . ")</p><p> Base de Datos:(" . $BaseDeDatos
           . ")</p>"
           ."<p>======================================================================================</p>") ;
       $programa = $prog;
       if ($DebuggingMode)
          {
          echo "<p>======================================================================================</p>"
          . "<p>Modulo sisBibInsert envia el siguiente mensaje -- </p>"
          . "<p> Se ejecuto el siguiente SQL con exito (".$instruccionesSql.")</p>"
          . "<p> La función fue utilizada en el modulo (". $prog . ")</p>"
          . "  <p> Datos de conexion al servidor "
          . " </p><p>Servidor:(" . $Servidor
          . ")</p><p> Usuario:(" . $Usuario
          . ")</p><p> Password:(". $Password
          . ")</p><p> Base de Datos:(" . $BaseDeDatos
          . ")</p>"
          ."<p>======================================================================================</p>" ;
          }
        return $resultado;
        //Termina el SisBibInsert
    }
  function sisBibCargaNombres($tabla,
  $nombres,  //campo pasado por referencia
  $numLlaves, //campo pasado por referencia
  $numCampos,  //campo pasado por referencia
  $Llaves)      //campo pasado por referencia
   {
       GLOBAL $Usuario;
       GLOBAL $Password;
       GLOBAL $Servidor;
       GLOBAL $BaseDeDatos;
       GLOBAL $DebuggingMode;
       GLOBAL $conexion;
       GLOBAL $programa;
     if ($tabla=="proveedores")
         {$nombres["codproveedor"]= "codproveedor";
          $nombres["nombre"]=  "nombre";
          $nombres["RFC"]= "RFC";
          $nombres["direccion"]= "direccion";
          $nombres["codprovincia"]= "codprovincia";
          $nombres["localidad"]= "localidad";
          $nombres["codentidad"]= "codentidad";
          $nombres["cuentabancaria"]= "cuentabancaria";
          $nombres["codpostal"]= "codpostal";
          $nombres["telefono"]= "telefono";
          $nombres["movil"]= "movil";
          $nombres["email"]= "email";
          $nombres["web"]= "web";
          $nombres["borrado"]= "borrado";
          $numLlaves = 1;
          $numCampos = count($nombres);
          $Llaves[0] = 0;
          return;
       }
     elseif($tabla=="provincias")
         {$nombres["codprovincia"]= "codprovincia";
          $nombres["nombreprovincia"]=  "nombreprovincia";
          $numLlaves = 1;
          $numCampos = count($nombres);
          $Llaves[0] = 0;
       return;
       }
   else
       {
           echo "<p>======================================================================================</p>"
           ."<p>ABORTA Modulo sisBibCargaNombres -- Error al cargar los nombres de los campos</p>"
           ."<p> la tabla (".$tabla.") No esta dada de alta en la rutina sisBibCargaNombres</p>"
           . "<p> La funcion fue utilizada en el modulo (". $programa . ")</p>"
           ."<p>======================================================================================</p>" ;
           exit();
       }
}
  function sisBibCargaTiposCampos($tabla,
  $tipoCampo)      //campo pasado por referencia
   {
       GLOBAL $Usuario;
       GLOBAL $Password;
       GLOBAL $Servidor;
       GLOBAL $BaseDeDatos;
       GLOBAL $DebuggingMode;
       GLOBAL $conexion;
       GLOBAL $programa;

     //Tipos de campos permitidos
     //I.- Entero
     //F.- Numero con decimales
     //S.- Cadena de caracteres (string)
     //D.- Fecha
     //H.- Hora

     if ($tabla=="proveedores")
         {$tipoCampo["codproveedor"]= "I"; //I es entero
          $tipoCampo["nombre"]=  "S"; //S string
          $tipoCampo["RFC"]= "S"; //S string
          $tipoCampo["direccion"]= "S";  //S string
          $tipoCampo["codprovincia"]= "I";  //I es entero
          $tipoCampo["localidad"]= "S"; //S string
          $tipoCampo["codentidad"]= "I"; //I es entero
          $tipoCampo["cuentabancaria"]= "I"; //I es entero
          $tipoCampo["codpostal"]= "I"; //I es entero
          $tipoCampo["telefono"]= "S"; //S string
          $tipoCampo["movil"]= "S"; //S string
          $tipoCampo["email"]= "S"; //S string
          $tipoCampo["web"]= "S";  //S string
          $tipoCampo["borrado"]= "I"; //I es entero
          return;
       }
     elseif($tabla=="provincias")
         {$tipoCampo["codprovincia"]= "I";
          $tipoCampo["nombreprovincia"]=  "S";
        return;
       }
   else
       {
           echo "<p>======================================================================================</p>"
           ."<p>ABORTA Modulo sisBibCargaTiposCampos -- Error al cargar los tipos de campos</p>"
           ."<p> la tabla (".$tabla.") No esta dada de alta en la rutina sisBibCargaTiposCampos</p>"
           . "<p> La funcion fue utilizada en el modulo (". $programa . ")</p>"
           ."<p>======================================================================================</p>" ;
           exit();
       }
   }



  function sisBibCargaEtiquetas($tabla,
  $etiquetas,  //campo pasado por referencia
  $numCampos)  //campo pasado por referencia
  {
       GLOBAL $Usuario;
       GLOBAL $Password;
       GLOBAL $Servidor;
       GLOBAL $BaseDeDatos;
       GLOBAL $DebuggingMode;
       GLOBAL $conexion;
       GLOBAL $programa;

  if ($tabla=="proveedores")
     {$etiquetas["codproveedor"]= "Id. Prov.";
      $etiquetas["nombre"]=  "Nombre";
      $etiquetas["RFC"]= "RFC";
      $etiquetas["direccion"]= "Direccion";
      $etiquetas["codprovincia"]= "Estado";
      $etiquetas["localidad"]= "Localidad";
      $etiquetas["codentidad"]= "Banco";
      $etiquetas["cuentabancaria"]= "Cta. Bancaria";
      $etiquetas["codpostal"]= "CP";
      $etiquetas["telefono"]= "Telefono";
      $etiquetas["movil"]= "Cel.";
      $etiquetas["email"]= "Correo Elect.";
      $etiquetas["web"]= "web";
      $etiquetas["borrado"]= "borrado";
      $numCampos = count($etiquetas);
      return;
  }
  elseif($tabla=="provincias")
      {$etiquetas["codprovincia"]= "Id. Estado";
       $etiquetas["nombreprovincia"]=  "Estado";
       $numCampos = count($etiquetas);
       return;
       }
  else
       {   echo "<p>======================================================================================</p>"
           ."<p>ABORTA Modulo sisBibCargaEtiquetas -- Error al cargar las etiquetas de los campos</p>"
           ."<p> la tabla (".$tabla.") No esta dada de alta en la rutina ssisBibCargaEtiquetas</p>"
           . "<p> La funcion fue utilizada en el modulo (". $programa . ")</p>"
           ."<p>======================================================================================</p>" ;
           exit();
       }

}

