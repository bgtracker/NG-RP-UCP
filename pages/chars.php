<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();
$_SESSION['last_action'] = time();
?>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            My Characters
                        </h1>
                    </div>
                </div>

			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
									<?php
									$loggedinID = $_SESSION['uID'];
									$query = $con->prepare("SELECT * from `accounts` where `id` = '$loggedinID'");
									$query->execute();

									while($gData = $query->fetch())
									{	
										?>
										<br />
										<img src="../skins/Skin_<?php echo $gData['Model']; ?>.png"></a>
										<a href="char.php?id=<?php echo $gData['id']; ?>"><?php echo $gData['Username']; ?></a>
										<br />
										
										<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

<?php
include 'includes/footer.php'; 
?>
