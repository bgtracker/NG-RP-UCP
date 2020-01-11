<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();

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
                                            <label>Prison Reason</label>
                                            <input type="text" id="preason" name="preason" class="form-control" placeholder="Reason">
                                            <label>Prison Time</label>
                                            <input type="text" id="ptime" name="ptime" class="form-control" placeholder="Time(minutes)">
                                        </div>
                                        <button type="submit" class="btn btn-default">Prison Account</button>

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

                                            if($rData['AdminLevel'] >= 2) {
                                                echo "<b><span style='color:red'>You cannot perform this action on an admin!</span></b>";
                                                echo '<div><a href="admin.php" type="button" class="btn btn-primary">ACP Home</a></div><hr/>';
                                                die();
                                            }

                                            $admin = $_SESSION['playername'];
                                            $account = $rData['id'];
                                            $reason = $_POST['preason'];
                                            $time = $_POST['ptime']*60;

                                            $query1 = $con->prepare("UPDATE `accounts` SET PrisonedBy='".$admin."', PrisonReason='".$reason."', JailTime='".$time."', WantedLevel='0' WHERE `id` = ".$account."");
                                            $query1->execute();
                                            //var_dump($query1);

                                            //logging
                                            $admin = $_SESSION['playername'];
                                            $player = $rData['Username'];
                                            $reason = $_POST['preason'];
                                            $query2 =  $con->prepare("INSERT INTO `ucp_logs` (log, admin, against) VALUES ('Prison: ".$reason."', '".$admin."','".$player."')");
                                            $query2->execute();

                                            echo "<b><span style='color:red'>Player prisoned successfully!</span></b>";
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
