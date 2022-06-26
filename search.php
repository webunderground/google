<?php  
 //hashtag.php  
 if(isset($_GET["tag"]))  
 {  
      $tag = preg_replace("#[^a-zA-Z0-9_]#", '', $_GET["tag"]);  
      echo '<h1>' . $tag . '</h1>';  
      $connect = mysqli_connect("localhost", "root", "password", "search");  
      $query = "SELECT * FROM guestbook where text LIKE '%".$tag."%'";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                echo '<p>'.$row["blog_title"].'</p><hr>';
                			
           }  
      }  
      else  
      {  
           echo '<p>No Data Found</p>';  
      }  
 }  
 ?> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google Font Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <title>Final - Google Clone</title>
	<style>
	
#container{
	background-color: #F8F8FF;
    float:none;
    clear:both;
   width: 90%;
  padding: 12px 15px;
  margin: 8px 0;
 border-radius: 150px;
    border: 0px solid #ccc;
}
p {
 font: message-box;100%/200% serif;
}

</style>
	
  </head>
  <body>
    <!-- Header Starts -->
    <div class="header">
      <div class="header__left">
        <a href="add.php">Add Url</a>
        <a href="index.html">Search</a>
      </div>
      <div class="header__right">
        <a href="#">Gmail</a>
        <a href="#">Images</a>
        <span class="material-icons header__apps"> apps </span>
        <span class="material-icons"> account_circle </span>
      </div>
    </div>
    <!-- Header Ends -->

    <!-- Main Body Starts -->
    <div class="mainBody">
	
	
	 <h4>result:</h4>
 <?php 
  // Se conecta al SGBD 
  $user=$_SESSION["username"]; 
  if(!($conexion = mysql_connect("localhost", "root", "password"))) 
    die("Error: No se pudo conectar");
 $user=$_SESSION['username'] ;
  // Selecciona la base de datos 
  if(!mysql_select_db("search", $conexion)) 
    die("Error: No existe la base de datos");
 
  // Sentencia SQL: muestra todo el contenido de la tabla "books" 
  $sentencia = "SELECT * FROM guestbook where text LIKE '%".$tag."%'"; 
  // Ejecuta la sentencia SQL 
  $resultado = mysql_query($sentencia, $conexion); 
  if(!$resultado) 
    die("Error: no se pudo realizar la consulta");

 echo "";
  while($fila = mysql_fetch_assoc($resultado)) 
  { 
  
 echo"<div id='container'>";   
   
   echo"<h2>"; 
echo"<span class='material-icons'> filter_list</span> ";	     
    echo '<a href="http://'.$fila['web'].'">'.$fila['name'].'</a><br><p>';
    echo  $fila['text'] .'<br>';	 
  
     
   
	
   echo "</p></div>";
  } 
 echo "</div></div>";
  // Libera la memoria del resultado
  mysql_free_result($resultado);
  
  // Cierra la conexión con la base de datos 
  mysql_close($conexion); 
?> 