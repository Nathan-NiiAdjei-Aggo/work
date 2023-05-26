<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <center><img src="electronix1.jpeg" ></img></center>
  	<center><h3>Selection Form</h3></center>
  
  </div>

  <form method="post" action="selection.php">
        
        Please select an option:
        <br></br>
        <input type="radio" name="options" value="1">
  		  <label>View Pending Calls</label>
        
        <br></br> 
        <input type="radio" name="options" value="2">
        <label>Show Unattended Calls</label>
        
        <br></br> 
        <button type="submit" class="btn" name="query_user">Query</button>

  </form>
 
  <?php
    if(isset($_POST['query_user'])) 
    { 
        $proj = $_POST["options"];
        switch ($proj){
            case "1":
                header("Location: http://localhost/Registration/pending.php");
                break;
            case "2":
                header("Location: http://localhost/Registration/unattended.php");
                break;
        }
      }   
    ?>
    <br></br>
    <centre><p><a href="index.php?logout='1'" style="color: red;"><button type="submit" class="btn" name="query_user">Logout</button></a></p></centre>
   

</body>
</html>

