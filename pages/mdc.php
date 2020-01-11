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
                                	<div><a href="record.php" type="button" class="btn btn-primary">Check Record</a></div><hr/>
                                    <div><a href="licenses.php" type="button" class="btn btn-primary">License Check</a></div><hr/>
                                	<div><a href="charges.php" type="button" class="btn btn-primary">Place Charges</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

<?php
include 'includes/footer.php'; 
?>
