<?php 
include 'includes/config.php';

if(isset($_SESSION['playername']))
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';   
	exit;
}

if(isset($_POST['pname']) && isset($_POST['ppass']))
{
	if(!isset($_SESSION['playername']))
	{
		$query = $con->prepare("SELECT * from `accounts` where `Username` = ? and `Key` = ?");
		$query->execute(array($_POST['pname'], strtoupper(hash("whirlpool", $_POST['ppass']))));
		if($query->rowCount() > 0)
		{
			$data = $query->fetch();
			
			$_SESSION['playername'] = $data['Username'];
			$_SESSION['playeradmin'] = $data['AdminLevel'];
			$_SESSION['Email'] = $data['Email'];
			$_SESSION['uID'] = $data['id'];
			$_SESSION['Online'] = $data['Online'];
			//FactionData
			$_SESSION['Member'] = $data['Member'];
			$_SESSION['Division'] = $data['Division'];
			$_SESSION['Leader'] = $data['Leader'];
			$_SESSION['Rank'] = $data['Rank'];
			//Licenses
			$_SESSION['CarLic'] = $data['CarLic'];
			$_SESSION['CDALic'] = $data['CDALic'];
			$_SESSION['FlyLic'] = $data['FlyLic'];
			$_SESSION['GunLic'] = $data['GunLic'];
			//Materials & Narcotics
			$_SESSION['Materials'] = $data['Materials'];
			$_SESSION['Pot'] = $data['Pot'];
			$_SESSION['Crack'] = $data['Crack'];
			$_SESSION['Methylamine'] = $data['Methylamine'];
			$_SESSION['Acid'] = $data['Acid'];
			$_SESSION['Meth'] = $data['Meth'];
			//Other
			$_SESSION['PhoneNumber'] = $data['PhoneNr'];
			$_SESSION['Radio'] = $data['Radio'];
			$_SESSION['RadioFreq'] = $data['RadioFreq'];
			$_SESSION['Accent'] = $data['Accent'];
			$_SESSION['IP'] = $data['IP'];
			$_SESSION['DonateRank'] = $data['DonateRank'];
			$_SESSION['Dice'] = $data['Dice'];
			$_SESSION['Spraycan'] = $data['Spraycan'];
			$_SESSION['Rope'] = $data['Rope'];
			//Incriminating
			$_SESSION['Crimes'] = $data['Crimes'];
			$_SESSION['Arrested'] = $data['Arrested'];
			//Admin Prison
			$_SESSION['PrisonedBy'] = $data['PrisonedBy'];
			$_SESSION['PrisonReason'] = $data['PrisonReason'];
			//Bans
			$_SESSION['Band'] = $data['Band'];
			$_SESSION['PermBand'] = $data['PermBand'];


			
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';   
			exit;
			
			
		}
		else
		{
			$err = 'Wrong username or password';
		}
	}
}
 
include 'includes/header.php';
?>
   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Login with your in-game account
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
									<form action="login.php" method="POST">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" id="pname" name="pname" class="form-control" placeholder="Username">
                                        </div>
										<div class="form-group">
                                            <label>Password</label>
                                            <input type="password" id="ppass" name="ppass" class="form-control" placeholder="Password">
                                        </div>
										<?php if(isset($err)): ?>
										<b class="help-block" style="color: red;"><?=$err?></b>
										<?php endif; ?>
										
										<button type="submit" class="btn btn-default">Login</button> | <a href="register.php" type="button" class="btn btn-default">Register</a>
									</form>
										
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	

<?php
include 'includes/footer.php'; 
?>
