<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>PHP curd</title>
</head>
<body>
<?php require_once 'process.php'; ?>

<?php
    if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
</div>
    <?php endif; ?>

<div class="container">
<?php include 'connet.php'; 
    $sql= "SELECT * FROM data";
    $result = $conn->query($sql) or die(mysqli-error); 
    //pre_r($result->fetch_assoc());
?>
<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
<?php
    while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td>
                <a href="index.php?edit=<?php echo $row['id']; ?>"
                   class="btn btn-info">Edit</a>
                <a href="process.php?delete=<?php echo $row['id']; ?>"
                   class="btn btn-danger">Delete</a>
            </td>
        </tr>
<?php endwhile; ?>
    </table>
</div>
<?php
    function pre_r($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
?>
    <div class="row justify-content-center">
    <form action="process.php" method="POST">
        <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your name">
        </div>
        <div class="form-group">
        <label>Location</label>
        <input type="text" name="location" class="form-control" value="<?php echo $location; ?>" placeholder="Enter your loaction">
        </div>
        <div class="form-group">
        <?php
        if($update == true):
        ?>
        <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else: ?>
        <button type="submit" class="btn btn-primary" name="save">SAVE</button>
        <?php endif; ?>
        </div>
    </form>
    </div>
    </div>
</body>
</html>