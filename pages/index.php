<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();

$query = $con->prepare("SELECT * from `accounts`");
$query->execute();
$regcount = $query->rowCount(); 

$query1 = "SELECT SUM(ConnectedTime) from `accounts`";
foreach ($con->query($query1) as $hours) {

}

$query2 = "SELECT SUM(`Money` + `Bank`) from `accounts`";
foreach ($con->query($query2) as $cash) {

}

$query3 = "SELECT COUNT(*) FROM `accounts` WHERE `Band` = 1";
foreach ($con->query($query3) as $bans) {

}

?>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            LA:RP
                        </div>
                        <div class="panel-body">
                            

                            <div class="col-lg-3">
                                <div class="panel panel-info">
                                  <div class="panel-heading">
                                    <div class="row">
                                      <div class="col-xs-6">
                                        <i class="fa fa-address-card-o fa-5x"></i>
                                      </div>
                                        <p class="announcement-heading text-center">Total Registered</p>
                                        <p class="announcement-text text-center"><?php print("$regcount"); ?></p>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="panel panel-info">
                                  <div class="panel-heading">
                                    <div class="row">
                                      <div class="col-xs-6">
                                        <i class="fa fa-address-card-o fa-5x"></i>
                                      </div>
                                        <p class="announcement-heading text-center">Total Playing Hours</p>
                                        <p class="announcement-text text-center"><?php print("$hours[0]"); ?></p>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="panel panel-info">
                                  <div class="panel-heading">
                                    <div class="row">
                                      <div class="col-xs-6">
                                        <i class="fa fa-address-card-o fa-5x"></i>
                                      </div>
                                        <p class="announcement-heading text-center">Total Cash</p>
                                        <p class="announcement-text text-center">$<?php print("$cash[0]"); ?></p>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="panel panel-info">
                                  <div class="panel-heading">
                                    <div class="row">
                                      <div class="col-xs-6">
                                        <i class="fa fa-address-card-o fa-5x"></i>
                                      </div>
                                        <p class="announcement-heading text-center">Total  Bans</p>
                                        <p class="announcement-text text-center"><?php print("$bans[0]"); ?></p>
                                    </div>
                                  </div>
                                </div>
                            </div>


                        </div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>					
				</div>
				</div>

<?php
include 'includes/footer.php'; 
?>
