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
                                    <?php
                                    if($_SESSION['playeradmin'] >= 2) {
                                        echo '<div><a href="ban.php" type="button" class="btn btn-primary">Ban Account</a></div><hr/>';
                                        echo '<div><a href="fine.php" type="button" class="btn btn-primary">Fine Account</a></div><hr/>';
                                        echo '<div><a href="warn.php" type="button" class="btn btn-primary">Warn Account</a></div><hr/>';
                                        echo '<div><a href="flag.php" type="button" class="btn btn-primary">Flag Account</a></div><hr/>';
                                    }
                                    ?>
                                    <?php
                                    if($_SESSION['playeradmin'] >= 3) {
                                        echo '<div><a href="checkaccount.php" type="button" class="btn btn-primary">Check Account</a></div><hr/>';
                                        echo '<div><a href="unban.php" type="button" class="btn btn-primary">Unban Account</a></div><hr/>';
                                    }
                                    ?>
                                	<?php
                                    if($_SESSION['playeradmin'] >= 4) {
                                        echo '<div><a href="fban.php" type="button" class="btn btn-primary">Faction ban Account</a></div><hr/>';
                                        echo '<div><a href="gban.php" type="button" class="btn btn-primary">Gang Ban</a></div><hr/>';
                                        echo '<div><a href="gunban.php" type="button" class="btn btn-primary">Gang Unban</a></div><hr/>';
                                    }
                                    ?>
                                    <?php
                                    if($_SESSION['playeradmin'] >= 1337) {
                                        echo '<div><a href="givevip.php" type="button" class="btn btn-primary">Give VIP</a></div><hr/>';
                                        echo '<div><a href="promoted.php" type="button" class="btn btn-primary">Promote an admin</a></div><hr/>';
                                        echo '<div><a href="logs.php" type="button" class="btn btn-primary">UCP Admin Logs</a></div><hr/>';
                                    }
                                    ?>
                                    <?php
                                    if($_SESSION['playeradmin'] >= 1338) {
                                        echo '<div><a href="fireadmin.php" type="button" class="btn btn-primary">Fire an admin</a></div><hr/>';
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
