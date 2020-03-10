<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once 'include/header.php';
    include_once 'include/mysql.class.php';
    include_once 'include/function.php';
    
    $db = new Database();
    session_start();// Starting Session
    // Storing Session
    if(isset($_SESSION['login_user'])){
        $user_check=$_SESSION['login_user'];
        // SQL Query To Fetch Complete Information Of User
       // $sql="select * from wine.user where email='$user_check'";
        
        $result = $db->get_all_data("user", "email='$user_check'");
        $user = $result->fetch_assoc();
        $login_session =$user['email'];

    }
?>

<?php if(isset($_SESSION['login_user'])): ?>
  <?php
      $result = $db->get_all_data("company_info");
      $info = $result->fetch_assoc();
  ?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?page=lot"><img src="../dist/img/32x35avelogo.png" alt="AVE"></a><a class="navbar-brand-name"><?php echo $info["company_name"]. " " . $info["bond_number"]?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $user['email']; ?><i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?page=profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="?page=settings"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <?php
                include 'include/nav.php';
                $page = "lot";
                if(isset($_GET['page'])){
                    $page = $_GET["page"];
                }
                include $page.'.php';
            ?>
    </div>
    <!-- /#wrapper -->
<?php else: ?>
    <?php include('login.php'); ?>
<?php endif; ?>
<?php
include 'include/footer.php';
?>
