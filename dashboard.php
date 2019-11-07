<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

require 'koneksi.php';

$getCategory = isset($_GET['cat']) ? $_GET['cat'] : NULL;

$result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[id]'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];


$query = "SELECT * FROM categories";
$hasil = mysqli_query($conn, $query);

$dateToday = date('Y-m-d');
$datetimeTomorrow = new DateTime('tomorrow');
$dateTomorrow = $datetimeTomorrow->format('Y-m-d H:i:s');

$user_id = $_SESSION['id'];

if ($getCategory == NULL) {
    $resultTodoListToday = mysqli_query($conn, "SELECT * FROM todo_list WHERE assign = '$dateToday' AND user_id = $user_id");
    $resultTodoListTomorrow = mysqli_query($conn, "SELECT * FROM todo_list WHERE assign = '$dateTomorrow' AND user_id = $user_id");
    $resultTodoListUpcoming= mysqli_query($conn, "SELECT * FROM todo_list WHERE assign > '$dateTomorrow' AND user_id = $user_id");

}
else {  
    $resultTodoListToday = mysqli_query($conn, "SELECT todo_list.*, categories.* FROM todo_list INNER JOIN categories ON todo_list.category_id = categories.id WHERE categories.id = '$getCategory' AND assign = '$dateToday' AND user_id = $user_id");
    $resultTodoListTomorrow = mysqli_query($conn, "SELECT todo_list.*, categories.* FROM todo_list INNER JOIN categories ON todo_list.category_id = categories.id WHERE categories.id = '$getCategory' AND assign = '$dateTomorrow' AND user_id = $user_id");
    $resultTodoListUpcoming = mysqli_query($conn, "SELECT todo_list.*, categories.* FROM todo_list INNER JOIN categories ON todo_list.category_id = categories.id WHERE categories.id = '$getCategory' AND assign > '$dateTomorrow' AND user_id = $user_id");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/uikit.min.css">
    <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
</head>
<body  class="uk-animation-fade"> 
    <div class="uk-container">
         <div class=" uk-container uk-navbar-left ">

         <h1 class="uk-navbar-item uk-logo"><?= $name;?></h1>
         <div class="uk-navbar-right">

         <nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav uk-background-default">
            <li>
                <a href="#" uk-icon="icon: user; ratio: 3;"></a>
                <div class="uk-navbar-dropdown uk-navbar-dropdown-width-2">
                    <div class="uk-navbar-dropdown-grid uk-child-width-1-2" uk-grid>
                        <div>
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-active"><a href="">PROFILE</a></li>
                                <hr>
                                <li class="uk-active"><a href="logout.php">LOG OUT</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
        </nav>

 </div>

 </div>
 <hr>
 <br><br>
 <div class="uk-button-group">
 <button class="uk-button uk-button-primary">Category</button>
 <div class="uk-inline">
 <button class="uk-button uk-button-default" type="button"><span uk-icon="icon:  triangle-down"></span></button>
        <div uk-dropdown="mode: click; boundary: ! .uk-button-group; boundary-align: true;">
        
        <ul class="uk-nav uk-dropdown-nav">
        <?php while($data = mysqli_fetch_array($hasil)) : ?>
            <li><a href="dashboard.php?cat=<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></a></li>
        <?php endwhile;  ?>
        </ul>
        
    </div>


    <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="plus"></a>
    <div uk-dropdown="mode:click;" class="uk-background-muted">
        <ul class="uk-nav uk-dropdown-nav">
            <li class="uk-active"><a href="addcategory.php">Add Category</a></li>
            <hr>
            <li class="uk-active"><a href="addtodolist.php">Add To Do List</a></li>
           
        </ul>
    </div>
</div>
 </div>
 <br><br>
 <div style="display:flex;" >
 <div class=" uk-card-body uk-width-1-3" >
    <div class="uk-card-default uk-card uk-card-hover uk-card-body">
  
    <table class="uk-table uk-table-divider ">
    <tr>
        <h1 class="uk-nav-center">Today</h1>
    </tr>
        <hr>
    <tr>
    <?php while($data = mysqli_fetch_array($resultTodoListToday)) : ?>
        <button class="uk-button uk-button-default uk-width-1-1 uk-text-left">
            <?php
            if ($data['status'] == 2){
                echo "<span style='text-decoration:line-through;'>".$data['todo']."</span>";
            }
            else {
                echo $data['todo'];
            } 
            ?>
            <a href="update.php?id= <?= $data['id'] ?>" class="uk-icon-button uk-margin-small-right" uk-icon="check"></a><a href="delete.php?id= <?= $data['id'] ?>" class="uk-icon-button uk-margin-small-right" uk-icon="close"></a>
        </button>
        <br><br>
    <?php endwhile;  ?>

    </tr>
     
    </tbody>
</table>
</div>
    </div>
    <br>
    <div class=" uk-card-body uk-width-1-3">
    <div class="uk-card-default uk-card uk-card-hover uk-card-body">
  
    <table class="uk-table uk-table-divider ">
    <tr>
        <h1 class="uk-nav-center">Tomorrow</h1>
    </tr>
        <hr>
    <tr>
    <?php while($data = mysqli_fetch_array($resultTodoListTomorrow)) : ?>
        <button class="uk-button uk-button-default uk-width-1-1 uk-text-left">
        <?php
            if ($data['status'] == 2){
                echo "<span style='text-decoration:line-through;'>".$data['todo']."</span>";
            }
            else {
                echo $data['todo'];
            } 
            ?>
            <a href="update.php?id= <?= $data['id'] ?>" class="uk-icon-button uk-margin-small-right" uk-icon="check"></a><a href="delete.php?id= <?= $data['id'] ?>" class="uk-icon-button uk-margin-small-right" uk-icon="close"></a>
        </button>
        <br><br>
    <?php endwhile;  ?>
    </tr>
     
    </tbody>
</table>
</div>
    </div>
    <br>
    <div class=" uk-card-body uk-width-1-3">
    <div class="uk-card-default uk-card uk-card-hover uk-card-body">
  
    <table class="uk-table uk-table-divider ">
    <tr>
        <h1 class="uk-nav-center">Up Coming</h1>
    </tr>
        <hr>
    <tr>
    <?php while($data = mysqli_fetch_array($resultTodoListUpcoming)) : ?>
        <button class="uk-button uk-button-default uk-width-1-1 uk-text-left">
        <?php
            if ($data['status'] == 2){
                echo "<span style='text-decoration:line-through;'>".$data['todo']."</span>";
            }
            else {
                echo $data['todo'];
            } 
            ?>
            <a href="update.php?id= <?= $data['id'] ?>" class="uk-icon-button uk-margin-small-right" uk-icon="check"></a><a href="delete.php?id= <?= $data['id'] ?>" class="uk-icon-button uk-margin-small-right" uk-icon="close"></a>        </button>
        <br><br>
    <?php endwhile;  ?>
    </tr>
     
    </tbody>
</table>
</div>
</div>
    </div>
    <br>
   
    </div>
    </div>
    </div>
</div>

 
       
        

</body>
</html>