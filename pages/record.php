<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();

if($_SESSION['Member'] == 1 || $_SESSION['Member'] == 2 || $_SESSION['Member'] == 3 || $_SESSION['Member'] == 7 || $_SESSION['Member'] == 11  || $_SESSION['Member'] == 12 || $_SESSION['Member'] == 13 || $_SESSION['Member'] == 16 || $_SESSION['Member'] == 5) {
	
} else {
    header('Location: index.php');
}

?>

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Mobile Data Center
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
                                            <label>Citizen's Name</label>
                                            <input type="text" id="cname" name="cname" class="form-control" placeholder="Username">
                                        </div>
                                        <button type="submit" class="btn btn-default">Check Record</button>

                                        <p><i>NB: Use the name of the player like this: First_Last</i></p>
                                        </form>
                                        <?php
                                        if(!empty($_POST['cname'])) {
                                            $query = $con->prepare("SELECT * from `accounts` WHERE `Username` = ?");
                                            $query->execute(array($_POST['cname']));
                                            if($query->rowCount() > 0)
                                            {
                                                $rData = $query->fetch();
                                            }

                                            $query3 = "SELECT COUNT(*) FROM `mdc` WHERE `id` = ".$rData['id']."";
                                            foreach ($con->query($query3) as $crimes) {

                                            }

                                            if($rData['PhoneNr'] == 0) 
                                            {
                                                $rData['PhoneNr'] = "None";
                                            }
                                            echo "

                                            <div class='col-lg-8'>
                                                <div class='panel panel-default'>
                                                    <div class='panel-body'>
                                                        <div class='row'>
                                                            <div class='col-lg-2'>
                                                                <img src='../bigskins/".$rData['Model'].".png' style='height:300px;'><hr>
                                                            </div>
                                                            <div class='col-lg-12'>
                                                                Name: <b>" .$rData['Username']. "</b><hr>
                                                                Age: <b>" .$rData['Age']. "</b><hr>
                                                                Phone Number: <b>" .$rData['PhoneNr']. "</b><hr>
                                                                <span style='color:red'>They've committed a total number of <b>" .$crimes[0]. "</b> crimes in the U.S.</span><hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            ";
                                        } else {
                                            echo "<b><span style='color:red'>Enter the player's name! (first_last)</span></b>";
                                        }
                                        ?>
                                        <div><a href="mdc.php" type="button" class="btn btn-primary">MDC Home</a></div><hr/>
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
