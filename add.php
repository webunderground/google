<?php
    require_once('general.php');
    require_once('db/db_connection.php');
    
    if (isset($_POST['submitBtn'])) {
         $name     = (isset($_POST['name'])) ? htmlentities($_POST['name']) : '' ;
         $comment  = (isset($_POST['comment'])) ? htmlentities($_POST['comment']) : '' ;
         $location = (isset($_POST['location'])) ? htmlentities($_POST['location']) : '' ;
         $website  = (isset($_POST['website'])) ? htmlentities(str_replace('http://','',$_POST['website'])) : '' ;
         $email    = (isset($_POST['email'])) ? htmlentities($_POST['email']) : '' ;
         $actDate  = date("Y-m-d H:i:s");
         
         //Minimum name and comment length.
         if ((strlen($name) > 2) && (strlen($comment) > 5)){
             $sql = "INSERT INTO guestbook (name,text,insertdate,location,web,email) VALUES (";
             $sql .= "'".$name."','".$comment."','".$actDate."','".$location."','".$website."','".$email."')";
             $MyDb->f_ExecuteSql($sql);
         }
         
         header("Location: index.php");
    }
    else {

?>


<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google Font Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <title>GoolSearch</title>
<style>
	
#container{
    float:none;
    clear:both;
    margin: 0px auto;
    margin-bottom:20px;
	width: 500px;
    border: 0px solid #ccc;
}
textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
 border-radius: 150px;
  

}
input {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
 border-radius: 150px;
}
select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
 border-radius: 150px;
}
</style>
  </head>
  <body>
    <!-- Header Starts -->
    <div class="header">
      <div class="header__left">
        <a href="index.php">Directory</a>
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
	 <div id="container">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="gbook" id="gbook">
            <table align="center">
              <tr><th>Name:</th><td><input name="name" type="text" size="42" maxlength="15" /></td></tr>
              <tr><th>Comment:</th><td><textarea name="comment" cols=32 rows=6></textarea></td></tr>
              <tr><th>Location:</th><td><select name="location"><?php listLocations(); ?></select></tr>
              <tr><th>Website:</th><td><input name="website" type="text" size="42" /></td></tr>
              <tr><th>Email:</th><td><input name="email" type="text" size="42" /></td></tr>
              
              <tr><td colspan="2" align="center"><br/><input class="text" type="submit" name="submitBtn" value="Add Url" /></td></tr>
            </table>  
          </form>

        </div></div>
        
</body>     
<?php } ?>   