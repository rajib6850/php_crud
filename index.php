<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>


    <?php  
        require_once 'config.php';
        $sql = "SELECT * FROM students INNER JOIN class ON students.class = class.id ORDER BY sid";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        if($row > 0){
            
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Batch</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['sid'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['Address'] ?></td>
                <td><?= $row['class_name'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td>
                    <a href='edit.php?id=<?= $row['sid'] ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?= $row['sid'] ?>'>Delete</a>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

    <?php mysqli_close($conn); }else {echo "No Data Found..!";}
     ?>




</div>
</div>
</body>
</html>
