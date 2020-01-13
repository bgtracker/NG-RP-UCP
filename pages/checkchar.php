<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();

if($_SESSION['playeradmin'] < 2) {
    header('Location: index.php');
}

if(!empty($_POST['cname'])) {
$query = $con->prepare("SELECT * from `accounts` WHERE `Username` = ?");
$query->execute(array($_POST['cname']));
if($query->rowCount() > 0)
{
$rData = $query->fetch();
}
$account = $rData['id'];

//logging
$admin = $_SESSION['playername'];
$player = $rData['Username'];
$query2 =  $con->prepare("INSERT INTO `ucp_logs` (log, admin, against) VALUES ('Account check initiated', '".$admin."','".$player."')");
$query2->execute();
//echo "<b><span style='color:red'>Player warned successfully!</span></b>";
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
                                <div class="col-lg-12">
                                    <div>
                                     
                                        
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <img src="../bigskins/<?php echo $rData['Model']; ?>.png" style="height:300px;">
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                            Name: <b><?php echo $rData['Username']; ?></b>
                                                            <hr />
                                                            Hand Money: <b>$<?php echo number_format($rData['Money']); ?></b>
                                                            <hr />
                                                            Bank Money: <b>$<?php echo number_format($rData['Bank']); ?></b>
                                                            <hr />
                                                            Total Money: <b>$<?php echo number_format($rData['Bank'] + $rData['Money']); ?></b>
                                                            <hr />
                                                            Phone Number: <b><?php if($rData['PhoneNr'] != 0) echo $rData['PhoneNr']; 
                                                            else echo "None"; ?></b>
                                                            <hr />
                                                            Level: <b><?php echo number_format($rData['Level']); ?></b>
                                                            <hr />
                                                            Respect Points: <b><?php echo number_format($rData['Respect']); ?></b>
                                                            <hr />
                                                            Age: <b><?php echo number_format($rData['Age']); ?></b>
                                                            <hr />
                                                            Health: <div class="progress progress-striped active"><div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $rData['phealthbar']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rData['pHealth']; ?>%"></div></div>
                                                            <hr />
                                                            Armour: <div class="progress progress-striped active"><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo $rData['parmourbar']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rData['pArmor']; ?>%"></div></div>
                                                            <hr />
                                                            Email: <b>

                                                            <?php 
                                                            //Here we check if the player has had their email in the database
                                                            if(!empty($rData['Email'])) {
                                                                echo $rData['Email'];
                                                            } else {
                                                                echo "Email not set!";
                                                            }
                                                            ?></b>

                                                            <hr />
                                                            VIP Level: <b>
                                                            <?php 
                                                            //Here we check for every donate rank ID and assign a name according to the value represented in the database
                                                            if($rData['DonateRank'] == 1) {
                                                                echo "Bronze";
                                                            } else if($rData['DonateRank'] == 2) {
                                                                echo "Silver";
                                                            } else if($rData['DonateRank'] == 3) {
                                                                echo "Gold";
                                                            } else if($rData['DonateRank'] == 4) {
                                                                echo "Platinum";
                                                            } else if($rData['DonateRank'] == 5) {
                                                                echo "Moderator";
                                                            } else if($rData['DonateRank'] == 0) {
                                                                echo "None";
                                                            }

                                                            ?>
                                                
                                                            </b>
                                                            <hr />
                                                            Faction: 
                                                            <?php 
                                                            //Here we check for every factions' ID and assign a name according to the value represented in the database
                                                            if($rData['Member'] == 1) {
                                                                echo "<b>Los Angeles Police Department</b>";
                                                            } else if($rData['Member'] == 2) {
                                                                echo "<b>Federal Bureau of Investigation</b>";
                                                            } else if($rData['Member'] == 3) {
                                                                echo "<b>San Francisco Police Department</b>";
                                                            } else if($rData['Member'] == 4) {
                                                                echo "<b>Los Angeles Fire Department</b>";
                                                            } else if($rData['Member'] == 5) {
                                                                echo "<b>Judicial System</b>";
                                                            } else if($rData['Member'] == 6) {
                                                                echo "<b>Government</b>";
                                                            } else if($rData['Member'] == 7) {
                                                                echo "<b>Los Angeles State Police</b>";
                                                            } else if($rData['Member'] == 8) {
                                                                echo "<b>Hitman Agency</b>";
                                                            } else if($rData['Member'] == 9) {
                                                                echo "<b>United States News</b>";
                                                            } else if($rData['Member'] == 10) {
                                                                echo "<b>Taxi Company</b>";
                                                            } else if($rData['Member'] == 11) {
                                                                echo "<b>Los Angeles National Guard</b>";
                                                            } else if($rData['Member'] == 12) {
                                                                echo "<b>Mexico</b>";
                                                            } else if($rData['Member'] == 13) {
                                                                echo "<b>N.O.O.S.E.</b>";
                                                            } else if($rData['Member'] == 16) {
                                                                echo "<b>S.H.A.F.T.</b>";
                                                            } else if($rData['Member'] == 0) {
                                                                echo "<b>None</b>";
                                                            }

                                                            ?>
                                                            <hr />
                                                            Materials: <b><?php echo number_format($rData['Materials']); ?></b> / Pot: <b><?php echo number_format($rData['Pot']); ?></b> / Crack: <b><?php echo number_format($rData['Pot']); ?></b><br/>Methylamine: <b><?php echo number_format($rData['Methylamine']); ?></b> / Acid: <b><?php echo number_format($rData['Acid']); ?></b> / Meth: <b><?php echo number_format($rData['Meth']); ?></b>
                                                            <hr />
                                                            You've commited <b><?php echo number_format($rData['Crimes']);?></b> crimes in the United States.<br/>
                                                            You've been arrested <b><?php echo number_format($rData['Arrested']);?></b> times in the United States.
                                                            <hr />
                                                            <?php 

                                                            if(!empty($rData['PrisonedBy'])) {
                                                                echo "<span style='color:red'>You've been prisnoed by: <b>".$rData['PrisonedBy']."</b> for <b>".$rData['PrisonReason']."</b>!</span>";
                                                            } else {
                                                                echo "<span style='color:green'><b>You are not currently in the OOC prison!</b></span>";
                                                            }

                                                            ?>
                                                            <hr />
                                                            <?php
                                                            if($rData['CDALic'] == 1) {
                                                                $rData['CDALic'] = "<b><span style='color:green'>☑</span></b>";
                                                            } else {
                                                                $rData['CDALic'] = "<b><span style='color:red'>☒</span></b>";
                                                            }

                                                            if($rData['CarLic'] == 1) {
                                                                $rData['CarLic'] = "<b><span style='color:green'>☑</span></b>";
                                                            } else {
                                                                $rData['CarLic'] = "<b><span style='color:red'>☒</span></b>";
                                                            }

                                                            if($rData['FlyLic'] == 1) {
                                                                $rData['FlyLic'] = "<b><span style='color:green'>☑</span></b>";
                                                            } else {
                                                                $rData['FlyLic'] = "<b><span style='color:red'>☒</span></b>";
                                                            }

                                                            if($rData['GunLic'] == 1) {
                                                                $rData['GunLic'] = "<b><span style='color:green'>☑</span></b>";
                                                            } else {
                                                                $rData['GunLic'] = "<b><span style='color:red'>☒</span></b>";
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
                                                                <td><?php echo $rData['CDALic']; ?></td>
                                                                <td><?php echo $rData['CarLic']; ?></td>
                                                                <td><?php echo $rData['FlyLic']; ?></td>
                                                                <td><?php echo $rData['GunLic']; ?></td>
                                                              </tr>
                                                            </table>
                                                            <hr />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



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
