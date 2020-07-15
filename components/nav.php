<nav class="navbar navbar-expand-lg navbar-light bg-success mb-5">
  <a class="navbar-brand" href="index.php"><i class="fa fa-store-alt"></i>Store Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item <?php if($_SESSION['page_index']=='products') echo 'active'?>">
        <a class="nav-link" href="products.php">Products</a>
      </li>
      <li class="nav-item <?php if($_SESSION['page_index']=='category') echo 'active'?>">
        <a class="nav-link" href="category.php">Categories</a>
      </li>
      <li class="nav-item <?php if($_SESSION['page_index']=='notifications') echo 'active'?>">
        <a class="nav-link" href="notifications.php"><i class="fa fa-bell"></i>&nbsp;Notifications
        <?php
        include('connection.php');

        $noti_sql= "SELECT COUNT(id) AS count FROM `notifications` WHERE `flag`='unread'";
        $noti_result= mysqli_query($conn,$noti_sql);
        $noti_row = mysqli_fetch_assoc($noti_result);
        if($noti_row['count']!= 0)
        {
        echo " ( ".$noti_row['count']." )";
        }
        ?>
        </a>
      </li>
      <li class="nav-item dropdown <?php if($_SESSION['page_index']=='user') echo 'active'?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<?php 

  echo $_SESSION['user_name'].' ( '.$_SESSION['role'].' ) ';

 ?>
        </a>
        <div class="dropdown-menu mb-1 " aria-labelledby="navbarDropdownMenuLink">
        <?php if($_SESSION['role']=='admin')
        {
          ?>
        <a class="dropdown-item" href="add_editor.php"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Add Editor</a>
        <a class="dropdown-item" href="log.php"><i class="fa fa-history"></i>&nbsp;&nbsp;View History</a>
        <a class="dropdown-item" href="user.php"><i class="fa fa-users"></i></i>&nbsp;&nbsp;View All Editor</a>
        <a class="dropdown-item text-danger" href="erase_data.php"><i class="fa fa-trash"></i>&nbsp;&nbsp;Erase Data</a>
        <?php
        }
         ?>
         <a class="dropdown-item" href="auth/logout.php"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>