<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

require 'koneksi.php';

$result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$_SESSION[id]'");
$row = mysqli_fetch_assoc($result);

$name = $row['name'];

$query = "SELECT * FROM categories";

$hasil = mysqli_query($conn, $query);




 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/uikit.min.css">
    <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
</head>
<body class=" uk-animation-fade">
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
<form action="proccesscategory.php" method="post">
<?php while($data = mysqli_fetch_array($hasil)) : ?>


<li><a href="#"><?php echo $data['nama']; ?></a></li>


<?php endwhile;  ?>
</form>

</ul>

</div>


<a href="" class="uk-icon-button uk-margin-small-right" uk-icon="plus"></a>
<div uk-dropdown="mode:click;" class="uk-background-muted">
<ul class="uk-nav uk-dropdown-nav">
   <li class="uk-active"><a href="addcategory.php">Add Category</a></li>
   <hr>
   <li class="uk-active"><a href="#">Add To Do List</a></li>
  
</ul>
</div>
</div>
</div>
</div>

<div class=" uk-card-body uk-width-1-3 uk-align-center" >
    <div class="uk-card-default uk-card uk-card-hover uk-card-body">
  
    <table class="uk-table uk-table-divider ">
    <tr>
        <h2 class="uk-nav-center">Add Category</h2>
    </tr>
        <hr>
    <tr>
    <div class="uk-container">
    <form action="proccesscategory.php" method="post">
   <h4 class="uk-text-center uk-h4">Name Category</h4> 
    
    <input type="text" name="nama" placeholder="Enter Category...." class="uk-align-center uk-input" style="border: 1px solid black; border-radius:25px; padding:15px;">
    <input type="submit" name="submit" value="Add Category" class="uk-button uk-button-primary uk-align-center uk-input" style="border-radius:20px;">

    </form>
    </div>
    
    
    
    </tr>
     
    </tbody>
</table>
</div>
    </div>
</body>
</html>