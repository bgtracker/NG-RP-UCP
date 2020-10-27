<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();
$_SESSION['last_action'] = time();

if($_SESSION['playeradmin'] < 2) {
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
                                            <label>Reason</label>
                                            <input type="text" id="warning" name="warning" class="form-control" placeholder="Reason">
                                        </div>
                                        <button type="submit" class="btn btn-default">Warn Account</button>

                                        <p><i>NB: Use the name of the player like this: First_Last</i></p>
                                        </form>
                                        <?php
                                        if(!empty($_POST['cname']) && !empty($_POST['warning'])) {
                                            $query = $con->prepare("SELECT * from `accounts` WHERE `Username` = ?");
                                            $query->execute(array($_POST['cname']));
                                            if($query->rowCount() > 0)
                                            {
                                                $rData = $query->fetch();
                                            }

                                            if($rData['AdminLevel'] >= 2) {
                                                echo "<b><span style='color:red'>You cannot perform this action on an admin!</span></b>";
                                                echo '<div><a href="admin.php" type="button" class="btn btn-primary">ACP Home</a></div><hr/>';
                                                die();
                                            }

                                            if($rData['Online'] == 1) {
                                                echo "<b><span style='color:red'>You cannot perform this action while the player is online!</span></b>";
                                                echo '<div><a href="admin.php" type="button" class="btn btn-primary">ACP Home</a></div><hr/>';
                                                die();
                                            }
                                            
                                            $account = $rData['id'];
                                            $warnings = $rData['Warnings']+1;

                                            $query1 = $con->prepare("UPDATE `accounts` SET Warnings='".$warnings."' WHERE `id` = ".$account."");
                                            $query1->execute();
                                            //var_dump($query1);

                                            //logging
                                            $admin = $_SESSION['playername'];
                                            $player = $rData['Username'];
                                            $reason = $_POST['warning'];
                                            $query2 =  $con->prepare("INSERT INTO `ucp_logs` (log, admin, against) VALUES ('Warn: ".$reason."', '".$admin."','".$player."')");
                                            $query2->execute();

                                            echo "<b><span style='color:red'>Player warned successfully!</span></b>";
                                        } else {
                                            echo "<b><span style='color:red'>All fields are required!</span></b>";
                                        }
                                        ?>
                                        <div><a href="admin.php" type="button" class="btn btn-primary">ACP Home</a></div><hr/>
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
