<?php include 'header.php'; 

    
    require_once "config.php";

    $sql = "SELECT * FROM class";
    $result = mysqli_query($conn, $sql);


?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="POST">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <div class="form-group">
            <label>Batch</label>
            <select name="batch">
                <option value="" selected disabled>Select Class</option>
                <?php 

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="'.$row['id'].'">'. $row['class_name'] .'</option>';
                    }
                 ?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <input class="submit" type="submit" value="Save" name="save" />
    </form>
</div>
</div>
</body>
</html>
