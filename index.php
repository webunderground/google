<?php
    require_once('general.php');
    require_once('db/db_connection.php');

    $sql = "SELECT * FROM guestbook ORDER BY insertdate DESC";
    $result = $MyDb->f_ExecuteSql($sql);
    $recordcount = $MyDb->f_GetSelectedRows(); 
    
    
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
 font-family: serif;
    border: 0px solid #ccc;
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
	 <h1>Directory</h1>
	<div id="container">
        
        
<?php while ($row = $MyDb->f_GetRecord($result)) { ?>

       
         
          <div id="container">
             <?php 
                if (strlen($row['web']) > 5) echo '<a href="http://'.$row['web'].'">'.$row['name'].'</a><br>';
                if (strlen($row['email']) > 5) echo '<a href="mailto:'.$row['email'].'">'.$row['email'].'</a>';
             ?>
           
           <div id="infodate"><?php echo $row['insertdate']; ?></div>
          
         <div id="icon"><?php echo $row['location']; ?></div>
         <div id="text"><?php echo nl2br($row['text']); ?></div><hr>
        </div>

<?php } ?>

        	
      </div>
</body>