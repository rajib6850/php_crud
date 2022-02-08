<?php include 'header.php'; 


  
    if(isset($_GET['id'])){    
        $id = $_GET['id'];
        require_once "config.php";

        $sql = "SELECT * FROM students INNER JOIN class ON students.class = class.id WHERE sid = '$id' ORDER BY sid";
        $result = mysqli_query( $conn, $sql);
        $row = mysqli_num_rows($result);
    }else{
        header('location:index.php');
    }


  

?>

<div id="main-content">
    <h2>Update Record</h2>

  <?php if($row > 0) { 

    $data = mysqli_fetch_assoc($result);
  ?>    



    <form class="post-form" action="updatedata.php" method="post">
      <div class="form-group">
          <label>Name</label>
          <input type="hidden" name="sid" value="<?= $data['sid'] ?>"/>
          <input type="text" name="sname" value="<?= $data['name'] ?>"/>
      </div>
      <div class="form-group">
          <label>Address</label>
          <input type="text" name="saddress" value="<?= $data['Address'] ?>"/>
      </div>
      <div class="form-group">
          <label>Class</label>
          <select name="batch">

              <?php 

                $sql = "SELECT * FROM class";

                $classes = mysqli_query($conn, $sql);
                while ($batch = mysqli_fetch_assoc($classes)) {

                    if($batch['id'] === $data['class']){
                      $select = "selected";
                    }else{
                      $select = "";
                    }

                    echo ' <option '.$select.' value="'.$batch['id'].'">'.$batch['class_name'].'</option>';
                }

               ?>

          </select>
      </div>
      <div class="form-group">
          <label>Phone</label>
          <input type="text" name="sphone" value="<?= $data['phone'] ?>"/>
      </div>
      <input name="update" class="submit" type="submit" value="Update"/>
    </form>


  <?php }else {  ?>

    <p class="alert" style="padding:20px; background-color:rgba(255, 0, 0, 0.3);">Data Not Found..!</p>
    
  <?php } ?>
</div>
</div>
</body>
</html>
