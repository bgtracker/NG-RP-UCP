<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();
$_SESSION['last_action'] = time();

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
                                            <label>Suspects's Name</label>
                                            <input type="text" id="cname" name="cname" class="form-control" placeholder="Username">
                                            <label>Crime</label>
                                            <input type="text" id="crime" name="crime" class="form-control" placeholder="Charge">
                                        </div>
                                        <button type="submit" class="btn btn-default">Charge Suspect</button>

                                        <p><i>NB: Use the name of the player like this: First_Last</i></p>
                                        </form>
                                        <?php
                                        if(!empty($_POST['cname']) && !empty($_POST['crime'])) {
                                            $query = $con->prepare("SELECT * from `accounts` WHERE `Username` = ?");
                                            $query->execute(array($_POST['cname']));
                                            if($query->rowCount() > 0)
                                            {
                                                $rData = $query->fetch();
                                            }

                                            if($rData['Online'] == 1) {
                                                echo "<b><span style='color:red'>You cannot perform this action while the player is online!</span></b>";
                                                echo '<div><a href="charges.php" type="button" class="btn btn-primary">Try again</a></div><hr/>';
                                                die();
                                            }

                                            $issuer = $_SESSION['playername'];
                                            $suspect = $rData['id'];
                                            $WL = $rData['WantedLevel']+1;

                                            $query1 = $con->prepare("INSERT INTO `mdc` (id, crime, issuer) VALUES ('".$suspect."', '".$_POST['crime']."', 'UCP:".$issuer."')");
                                            $query1->execute();

                                            $query2 = $con->prepare("UPDATE `accounts` SET WantedLevel='".$WL."' WHERE `id` = ".$rData['id']."");
                                            $query2->execute();
                                            //var_dump($query2);

                                            echo "<b><span style='color:green'>Charge placed successfully!</span></b>";
                                        } else {
                                            echo "<b><span style='color:red'>All fields are required!</span></b>";
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
