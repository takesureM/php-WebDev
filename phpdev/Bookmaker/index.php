<?php 
     //start session
     session_start();
     if (isset($_POST['name'])) {
          if (isset($_SESSION['bookmarks'])) {
               $_SESSION['bookmarks'][$_POST['name']] = $_POST['url'];
          }else{
               $_SESSION['bookmarks'] = Array($_POST['name'] => $_POST['url']);
          }
     }

     if (isset($_GET['action']) && $_GET['action'] == 'clear') {
          session_unset();
          session_destroy();
          header("Location: index.php");
     }

     if (isset($_GET['action']) && $_GET['action'] == 'delete') {
          unset($_SESSION['bookmarks'][$_GET['name']]);
          header("Location: index.php");
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://bootswatch.com/4/cyborg/bootstrap.min.css">
     <script src='https://kit.fontawesome.com/a076d05399.js'></script>
     <title>Bookmarker</title>
</head>
<body>
     <nav class="navbar navbar-expand-md navbar-dark bg-dark">
          <a class="navbar-brand" href="#">Bookmarker</a>
          <div class="collapse navbar-collapse" id="navbarsExampleDefault">
               <ul class="navbar-nav mr-auto">
                    <li><a  href="index.php">Home</span></a></li>
               </ul>
               <ul class="navbar-nav navbar-right">
                    <li><a  href="index.php?action=clear">Clear All</span></a></li>
               </ul>
          </div>
     </nav>

     <div class="container">
          <div class="row">
               <div class="col-md-7">
                    <form method="POST" action="<?php  $_SERVER['PHP_SELF'];?>">
                         <div class="form-group">
                              <label>Website Name</label>
                              <input type="text" name="name" class="form-control">
                         </div>

                         <div class="form-group">
                              <label>Website URL</label>
                              <input type="text" name="url" class="form-control">
                         </div>
                         <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
               </div>

               <div class="col-md-5">
                    <?php if(isset($_SESSION['bookmarks'])): ?>
                         <ul class="list-group">
                              <?php foreach($_SESSION['bookmarks'] as $name => $url): ?>
                              <li class="list-group-item">
                                   <a href="<?php echo $url; ?>">
                                   <?php echo $name; ?>
                                   <a href="index.php?action=delete&name=<?php echo $name;?>"> 
                                   <i class='fas fa-trash' style='float:right;color:red'></i></a></a>
                              </li>
                              <?php endforeach ?>
                         </ul>
                    <?php endif ?>
               </div>
          </div>
     </div>
</body>
</html>