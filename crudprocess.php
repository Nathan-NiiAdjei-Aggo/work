<!DOCTYPE html>
<html>
<head>
  <title>Complaints Page</title>
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
  <center><img src=".jpg" ></img></center>
  <br></br>
  	<h3>Complaints Form</h3>
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
        
  </tr>

    <?php

        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $complaints = $_POST['complaints'];
        $status = $_POST['status'];

        // sumbits

        $db = mysqli_connect('localhost', 'root', '', 'registration');

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        else echo "Connected successfully<br>";
        
        
        if (isset($_POST['insert'])) {
            $sql = "INSERT INTO calls (Firstname, Lastname, Complaints, Status) VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->bind_param("ssss", $fname, $lname, $complaints, $status);
            $stmt->execute();
            echo "New records created successfully";
            $stmt->close();
        }

        else if (isset($_POST['update'])) {
            $sql = "UPDATE calls SET Firstname='$fname', Lastname='$lname', Complaints='$complaints' WHERE `calls`.`ID` = $id ";
            
            if ($db->query($sql) === TRUE) {
                echo "Record updated successfully";
            } 
            else echo "Error updating record: " . $db->error;
        }

        else if (isset($_POST['delete'])) {
            $sql = "DELETE FROM `calls` WHERE `calls`.`ID` = $id";
            if ($db->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } 
            else echo "Error deleting record: " . $db->error;
        }
        
        else if (isset($_POST['read'])) {
            $condition = "";
            if ($id != "") { 
                $condition = " WHERE ID = $id";
            }
            $sql = "SELECT * FROM calls";
            $result = $db->query($sql.$condition);
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
                    </tr>
                    
                    <?php
                    ?>

                    <?php
                }
                    echo "</table>";
            }
                else { echo "0 result"; }
            } 

            $db->close();

        ?>

    </table>
    <br></br>
    <centre><button type="submit" class="btn" name="query_user">Back</button></centre>
    </form>
    </centre>

    <?php
        if(isset($_POST['query_user'])) 
        { 
            header("Location: http://localhost/Registration/crud.php");
        }   
        ?>
        <br></br>
        
    </body>
    </html>