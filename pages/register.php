<?php 
include 'includes/config.php';

if(isset($_SESSION['playername']))
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';   
	exit;
}
 
include 'includes/header.php';
?>
   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Register your in-game account!
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
									<form action="register.php" method="POST">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" id="pname" name="pname" class="form-control" placeholder="Username(first_last)">
                                        </div>
										<div class="form-group">
                                            <label>Password</label>
                                            <input type="password" id="ppass" name="ppass" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="text" id="age" name="age" class="form-control" placeholder="18 - 90">
                                        </div>
                                        <div class="form-group">
                                            <label>Sex</label>
                                            <select id="sex" name="sex">
                                            	<option value="1">Male</option>
                                            	<option value="2">Female</option>
                                            </select>
                                        </div>
										<button type="submit" class="btn btn-default">Create my account!</button>
									</form>
									<hr/><div>Registering an account through the UCP, automatically gives you 1 month of Bronze VIP & a free phone number!</div>
										<?php
										if(isset($_POST['pname']) && isset($_POST['ppass']) && isset($_POST['email']))
										{
											$query1 = $con->prepare("SELECT * FROM `accounts` WHERE Username = '".$_POST['pname']."' ");
											$query1->execute();
											//$query1->rowCount();
											//var_dump($query1);
											$rows = $query1->rowCount();
											//echo $rows;
											if($rows > 0) {
												echo "<b><span style='color:red'>Username is already taken!</span></b>";
												} else {
													$date = new DateTime();
                                            		$date2 = $date->getTimestamp()+2592000*1;
                                            		$randomphone = rand(999,999999);

                                            		$age = $_POST['age'];
                                            		$sex = $_POST['sex'];
													$name = $_POST['pname'];
													$pass = strtoupper(hash("whirlpool", $_POST['ppass']));
													$email = $_POST['email'];
													/*$date = new DateTime();
												    $date2 = $date->getTimestamp()+2592000*1;*/

													$query = $con->prepare("INSERT INTO accounts (`Username`, `Key`, `Tutorial`, `Email`, `Money`, `Bank`, `DonateRank`, `VIPExpire`, `Phonebook`, `PhoneNr`, `Age`, `Sex`, `Registered`, `SPos_x`, `SPos_y`, `SPos_z`, `SPos_r`) VALUES ('".$name."', '".$pass."', '1', '".$email."', '15000', '15000', '1', '".$date2."', '1', '".$randomphone."', '".$age."', '".$sex."', '1', '1714.6782', '-1882.5239', '13.5666', '356.7476') ");
													//var_dump($query);
													$query->execute();

													//header('Location: login.php');
													echo "<b><span style='color:green'>Account created! Click <a href='login.php'>HERE</a> to login!</span></b>";
												}
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
