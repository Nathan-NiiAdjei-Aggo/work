<!DOCTYPE html>
<html lang="en">
<head>
    <title>Complaints Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <center><img src="electronix1.jpeg"></img></center>
        <center><h3>Complaints Form</h3></center>
    </div>
    
<form method="POST" action="crudprocess.php">

        <div class="input-group">
            <label>ID</label>
            <input type="text" name="id">
        </div>
        <div class="input-group">
            <label>Firstname</label>
            <input type="text" name="firstname">
        </div>
        <div class="input-group">
            <label>Lastname</label>
            <input type="text" name="lastname">
        </div>
        <div class="input-group">
            <label>Complaints</label>
            <input type="text" name="complaints">
        </div>
        <div class="input-group">
            <label>Status</label>
            <input type="text" name="status">
        </div>
        
        
        <button type="submit" class="btn" name="insert" value="Insert">Insert</button>
        
      
        <button type="submit" class="btn" name="update" value="Update">Update</button>
        
     
        <button type="submit" class="btn" name="delete" value="Delete">Delete</button>
        
        
        <button type="submit" class="btn" name="read" value="Read">Read</button>
      
       
</form>
</center>

</body>
</html>