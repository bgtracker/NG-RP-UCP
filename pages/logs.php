<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();
$_SESSION['last_action'] = time();

if($_SESSION['playeradmin'] < 1338) {
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
                                    <hr/>
                                    <div><a href="admin.php" type="button" class="btn btn-primary">ACP Home</a> <a href="clearlog.php" type="button" class="btn btn-primary">Clear Log</a></div>
                                    <div><i><span style="color:red">NB: Pushing the CLEAR LOG button deletes all entries from the log!</span></i></div>
                                    <hr/>
                                    <?php
                                        $sql = 'SELECT log, admin, against, date FROM `ucp_logs` ORDER BY id';
                                        $q = $con->query($sql);
                                        $q->setFetchMode(PDO::FETCH_ASSOC);
                                    ?>
                                    <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Info</th>
                                            <th>Admin</th>
                                            <th>Against</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $q->fetch()): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['log']) ?></td>
                                                <td><?php echo htmlspecialchars($row['admin']); ?></td>
                                                <td><?php echo htmlspecialchars($row['against']); ?></td>
                                                <td><?php echo htmlspecialchars($row['date']); ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

<?php
include 'includes/footer.php'; 
?>
