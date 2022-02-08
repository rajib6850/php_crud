<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>


<?php 


    if(isset($_POST['showbtn'])){
        $id = $_POST['sid'];
        require_once 'config.php';
        $sql = "SELECT * FROM students WHERE sid = '$id'";
        $result = mysqli_query($conn, $sql);

        if($row = mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_assoc($result);
 ?>
    <form class="post-form" action="updatedata.php" method="POST">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid"  value="<?= $data['sid'] ?>" />
            <input type="text" name="sname" value="<?= $data['name'] ?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?= $data['Address'] ?>" />
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
            <input type="text" name="sphone" value="<?= $data['phone'] ?>" />
        </div>
        <input name="update" class="submit" type="submit" value="Update"  />
    </form>

<?php }else{
    if(isset($_POST['showbtn'])){
        echo '<p class="alert" style="padding:20px; background-color:rgba(255, 0, 0, 0.3);">Data Not Found..!</p>';
    }else{
        echo "Click Show Button For Show Student";
    }}
} ?>
</div>
</div>
</body>
</html>
