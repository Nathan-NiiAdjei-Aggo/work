<!DOCTYPE html>
<html>
<head>
  <title>Registration system(My Sql and Php)</title>
  <style>
    table {
    border-collapse: collapse;
    width: 90%;
    color: #5f5f5f;
    font-family: 'Times New Roman', Times, serif;
    font-size: 15px;
    text-align: left;
    }
    .header {
    width: 86.8%;
    margin: 50px auto 0px;
    color: white;
    background:  #A020F0;
    text-align: center;
    border: 1px solid #B0C4DE;
    border-bottom: none;
    border-radius: 10px 10px 0px 0px;
    padding: 20px;
    }
    th {
    background-color:  #A020F0;
    color: white;
    margin: 10px; 
    padding: 5px;
    text-align: left;
    }
    .btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #A020F0;
    border: none;
    border-radius: 5px;
    }
    tr:nth-child(even) {background-color: #f2f2f2}
  </style>
</head>
<body>
  <div class="header">
  <centre><img src=".jpg" width = "220px"  height = "70px"></img></centre>
  <br></br>
  	<h2>Unattended Calls</h2>
  </div>
  <br></br>
  <centre>
  <form method="post">
    <table>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Complaints</th>
        <th>Status</th>
        <th class="table-head">
          <label> Select </label>
        </th>
  </tr>
  <?php
  
  $db = mysqli_connect('localhost', 'root', '', 'registration');

  // Check connection
  if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);}
  $sql = "SELECT ID, Firstname, Lastname, Complaints, Status FROM calls  WHERE Status='New'";
  $result = $db->query($sql);
  $i = 0;
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        ?>
        
        <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['Firstname']; ?></td>
        <td><?php echo $row['Lastname']; ?></td>
        <td><?php echo $row['Complaints']; ?></td>
        <td><?php echo $row['Status']; ?></td>
        <!-- <td><select name="datafield">
            <option value="0">...</option>
            <option value="1">First Name</option>   
            <option value="2">Last Name</option>
            <?php
            ?>
        </select><input type="submit" name="submit"/></td> -->
        <td><input type="checkbox" value="<?php echo $row['ID']; ?>" name="ID[]" id="ferranMessage" type="checkbox" class="delete_checkbox"></td>
        </tr>
        
    <?php
    }
        echo "</table>";
  }
  else { echo "0 result"; }


  ?>
  </table>
  <br></br>
  <center><button type="submit" class="btn" name="query_user">Accept checked call(s)</button></center>
  </form>
  </center>
  <?php
            
      if (isset($_POST['query_user'])){
                
          foreach ($_POST['ID'] as $id):
        
              $sq=mysqli_query($db,"select * from calls where ID='$id'");
              $srow=mysqli_fetch_array($sq);

                
                    
              $sql = mysqli_query($db, "update calls set status='Pending' where ID='$id'");
          endforeach;
              
      }
  ?>
  <br></br>
  <a href ="selection.php"><center><button type="submit" class="btn" name="query_user">Back</button></center></a>

</body>
</html>