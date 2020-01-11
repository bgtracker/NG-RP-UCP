<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();

if(!isset($_GET['id']))
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../pages/index.php">';    
	exit;	
}

//$charaID = $_GET['id'];
$sesuID = $_SESSION['uID'];

$query = $con->prepare("SELECT * from `accounts` where `id` = '$sesuID'");
$query->execute();
$gData = $query->fetch();

if($gData['id'] != $sesuID)
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../pages/logout.php">';    
	exit;	
}


?>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            <?php echo $gData['Username']; ?>
                        </h1>
                    </div>
                </div>

			<div class="row">
			    <div class="col-lg-2">
					<img src="../bigskins/<?php echo $gData['Model']; ?>.png" style="height:300px;">
				</div>
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								Hand Money: <b>$<?php echo number_format($gData['Money']); ?></b>
								<hr />
								Bank Money: <b>$<?php echo number_format($gData['Bank']); ?></b>
								<hr />
								Total Money: <b>$<?php echo number_format($gData['Bank'] + $gData['Money']); ?></b>
								<hr />
								Phone Number: <b><?php if($gData['PhoneNr'] != 0) echo $gData['PhoneNr']; 
								else echo "None"; ?></b>
								<hr />
								Level: <b><?php echo number_format($gData['Level']); ?></b>
								<hr />
								Respect Points: <b><?php echo number_format($gData['Respect']); ?></b>
								<hr />
								Age: <b><?php echo number_format($gData['Age']); ?></b>
								<hr />
								Health: <div class="progress progress-striped active"><div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $gData['phealthbar']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $gData['pHealth']; ?>%"></div></div>
								<hr />
								Armour: <div class="progress progress-striped active"><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo $gData['parmourbar']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $gData['pArmor']; ?>%"></div></div>
								<hr />
								Email: <b>

								<?php 
								//Here we check if the player has had their email in the database
								if(!empty($gData['Email'])) {
									echo $gData['Email'];
								} else {
									echo "Email not set!";
								}
								?></b>

								<hr />
								VIP Level: <b>
								<?php 
								//Here we check for every donate rank ID and assign a name according to the value represented in the database
								if($gData['DonateRank'] == 1) {
									echo "Bronze";
								} else if($gData['DonateRank'] == 2) {
									echo "Silver";
								} else if($gData['DonateRank'] == 3) {
									echo "Gold";
								} else if($gData['DonateRank'] == 4) {
									echo "Platinum";
								} else if($gData['DonateRank'] == 5) {
									echo "Moderator";
								} else if($gData['DonateRank'] == 0) {
									echo "None";
								}

								?>
					
								</b>
								<hr />
								Faction: 
								<?php 
								//Here we check for every factions' ID and assign a name according to the value represented in the database
								if($gData['Member'] == 1) {
									echo "<b>Los Angeles Police Department</b>";
								} else if($gData['Member'] == 2) {
									echo "<b>Federal Bureau of Investigation</b>";
								} else if($gData['Member'] == 3) {
									echo "<b>San Francisco Police Department</b>";
								} else if($gData['Member'] == 4) {
									echo "<b>Los Angeles Fire Department</b>";
								} else if($gData['Member'] == 5) {
									echo "<b>Judicial System</b>";
								} else if($gData['Member'] == 6) {
									echo "<b>Government</b>";
								} else if($gData['Member'] == 7) {
									echo "<b>Los Angeles State Police</b>";
								} else if($gData['Member'] == 8) {
									echo "<b>Hitman Agency</b>";
								} else if($gData['Member'] == 9) {
									echo "<b>United States News</b>";
								} else if($gData['Member'] == 10) {
									echo "<b>Taxi Company</b>";
								} else if($gData['Member'] == 11) {
									echo "<b>Los Angeles National Guard</b>";
								} else if($gData['Member'] == 12) {
									echo "<b>Mexico</b>";
								} else if($gData['Member'] == 13) {
									echo "<b>N.O.O.S.E.</b>";
								} else if($gData['Member'] == 16) {
									echo "<b>S.H.A.F.T.</b>";
								} else if($gData['Member'] == 0) {
									echo "<b>None</b>";
								}

								?>
								<hr />
								Materials: <b><?php echo number_format($gData['Materials']); ?></b> / Pot: <b><?php echo number_format($gData['Pot']); ?></b> / Crack: <b><?php echo number_format($gData['Pot']); ?></b><br/>Methylamine: <b><?php echo number_format($gData['Methylamine']); ?></b> / Acid: <b><?php echo number_format($gData['Acid']); ?></b> / Meth: <b><?php echo number_format($gData['Meth']); ?></b>
								<hr />
								You've commited <b><?php echo number_format($gData['Crimes']);?></b> crimes in the United States.<br/>
								You've been arrested <b><?php echo number_format($gData['Arrested']);?></b> times in the United States.
								<hr />
								<?php 

								if(!empty($gData['PrisonedBy'])) {
									echo "<span style='color:red'>You've been prisnoed by: <b>".$gData['PrisonedBy']."</b> for <b>".$gData['PrisonReason']."</b>!</span>";
								} else {
									echo "<span style='color:green'><b>You are not currently in the OOC prison!</b></span>";
								}

								?>
								<hr />
								<?php
								if($gData['CDALic'] == 1) {
									$gData['CDALic'] = "<b><span style='color:green'>☑</span></b>";
								} else {
									$gData['CDALic'] = "<b><span style='color:red'>☒</span></b>";
								}

								if($gData['CarLic'] == 1) {
									$gData['CarLic'] = "<b><span style='color:green'>☑</span></b>";
								} else {
									$gData['CarLic'] = "<b><span style='color:red'>☒</span></b>";
								}

								if($gData['FlyLic'] == 1) {
									$gData['FlyLic'] = "<b><span style='color:green'>☑</span></b>";
								} else {
									$gData['FlyLic'] = "<b><span style='color:red'>☒</span></b>";
								}

								if($gData['GunLic'] == 1) {
									$gData['GunLic'] = "<b><span style='color:green'>☑</span></b>";
								} else {
									$gData['GunLic'] = "<b><span style='color:red'>☒</span></b>";
								}
								?>
								License Information:<br/><br/> 
								<table style="width:100%">
								  <tr>
								    <th>CDA License</th>
								    <th>Car License</th>
								    <th>Fly License</th>
								    <th>Gun License</th>
								  </tr>
								  <tr>
								    <td><?php echo $gData['CDALic']; ?></td>
								    <td><?php echo $gData['CarLic']; ?></td>
								    <td><?php echo $gData['FlyLic']; ?></td>
								    <td><?php echo $gData['GunLic']; ?></td>
								  </tr>
								</table>
								<hr />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

<?php
include 'includes/footer.php'; 
?>
