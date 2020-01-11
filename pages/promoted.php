<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();

if($_SESSION['playeradmin'] < 1337) {
    header('Location: index.php');
}


?>

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Admin Panel
                        </h1>
                    </div>
                </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                     
                                        <form method="POST" action="">
                                            <div class="form-group">
                                            <label>Account Name</label>
                                            <input type="text" id="cname" name="cname" class="form-control" placeholder="Username">
                                            <label>Admin Level</label>
                                            <input type="text" id="reason" name="reason" class="form-control" placeholder="Level(2/3/4/1337)">
                                        </div>
                                        <button type="submit" class="btn btn-default">POWER UP!</button>

                                        <p><i>NB: Use the name of the player like this: First_Last</i></p>
                                        </form>
                                        <?php
                                        if(isset($_POST['cname'])) {
                                            $query = $con->prepare("SELECT * from `accounts` WHERE `Username` = ?");
                                            $query->execute(array($_POST['cname']));
                                            if($query->rowCount() > 0)
                                            {
                                                $rData = $query->fetch();
                                            }

                                            if($_POST['reason'] == 0 || $_POST['reason'] == 1) {
                                                echo "<b><span style='color:red'>You cannot fire an admin from this page!</span></b>";
                                                echo '<div><a href="admin.php" type="button" class="btn btn-primary">ACP Home</a></div><hr/>';
                                                die();
                                            }

                                            $query1 = $con->prepare("UPDATE `accounts` SET AdminLevel='".$_POST['reason']."' WHERE `id` = ".$rData['id']."");
                                            $query1->execute();
                                            //var_dump($query1);

                                            //logging
                                            $admin = $_SESSION['playername'];
                                            $player = $rData['Username'];
                                            $reason = $_POST['reason'];
                                            $query2 =  $con->prepare("INSERT INTO `ucp_logs` (log, admin, against) VALUES ('Admin level promotion: ".$reason."', '".$admin."','".$player."')");
                                            $query2->execute();

                                            echo "<b><span style='color:red'>Player's admin level has been adjusted! Do not forget to post in their personnel file!</span></b>";
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php
include 'includes/footer.php'; 
?>
