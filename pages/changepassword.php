<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();

if(!isset($_SESSION['playername']))
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../pages/logout.php">';    
	exit;	
}



?>
                
			<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Change Password
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
                                            <label>New Password</label>
                                            <input type="password" id="pass" name="pass" class="form-control" placeholder="Charge">
                                        </div>
                                        <button type="submit" class="btn btn-default">Change Password</button>

                                        <p><i>NB: No further checks are done, if you've managed to reach this page, pressing Change Password will update it for you!</i></p>
                                        </form>
                                        <?php
                                        if(isset($_POST['pass'])) {

                                            $user = $_SESSION['playername'];
                                            $password = strtoupper(hash("whirlpool", $_POST['pass']));

                                            $query2 = $con->prepare("UPDATE `accounts` SET `Key`='".$password."' WHERE `id` = ".$_SESSION['uID']."");
                                            $query2->execute();
                                            //var_dump($query2);

                                            echo "<b><span style='color:green'>Password successfully! Click <a href='logout.php'>HERE</a> to proceed.</span></b>";
                                        }
                                        ?>
                                        <div><a href="index.php" type="button" class="btn btn-primary">Home</a></div><hr/>
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
