<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();

if($_SESSION['Leader'] != $_SESSION['Member']) {
    header('Location: index.php');
}

if($_SESSION['Member'] == 1) {
    $ftext = "Los Angeles Police Department";
} else if($_SESSION['Member'] == 2) {
    $ftext = "Federal Bureau of Investigation";
} else if($_SESSION['Member'] == 3) {
    $ftext = "San Francisco Police Department";
} else if($_SESSION['Member'] == 4) {
    $ftext = "Los Angeles Fire Department";
} else if($_SESSION['Member'] == 5) {
    $ftext = "Judicial System";
} else if($_SESSION['Member'] == 6) {
    $ftext = "The Government";
} else if($_SESSION['Member'] == 7) {
    $ftext = "Los Angeles State Police";
} else if($_SESSION['Member'] == 8) {
    $ftext = "Hitman Agency";
} else if($_SESSION['Member'] == 9) {
    $ftext = "United States News";
} else if($_SESSION['Member'] == 10) {
    $ftext = "Taxi Company";
} else if($_SESSION['Member'] == 11) {
    $ftext = "Los Angeles National Guard";
} else if($_SESSION['Member'] == 12) {
    $ftext = "Mexico";
} else if($_SESSION['Member'] == 13) {
    $ftext = "N.O.O.S.E.";
} else if($_SESSION['Member'] == 16) {
    $ftext = "S.H.A.F.T.";
}

?>

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Kick a member from the <?php echo $ftext; ?>
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
                                            <label>Name</label>
                                            <input type="text" id="cname" name="cname" class="form-control" placeholder="Username">
                                        </div>
                                        <button type="submit" class="btn btn-default">Kick</button>

                                        <p><i>NB: Use the name of the player like this: First_Last</i></p>
                                        </form>
                                        <?php
                                        if(!empty($_POST['cname'])) {
                                            $query = $con->prepare("SELECT * from `accounts` WHERE `Username` = ?");
                                            $query->execute(array($_POST['cname']));
                                            if($query->rowCount() > 0)
                                            {
                                                $rData = $query->fetch();
                                            }

                                            if($rData['Leader'] == $_SESSION['Member']) {
                                                echo "<b><span style='color:red'>You cannot perform this action on another leader!</span></b>";
                                                echo '<div><a href="promotefm.php" type="button" class="btn btn-primary">Go Back</a></div><hr/>';
                                                die();
                                            }

                                            if($rData['Member'] != $_SESSION['Member']) {
                                                echo "<b><span style='color:red'>You cannot perform this action on a member of a different faction!</span></b>";
                                                echo '<div><a href="promotefm.php" type="button" class="btn btn-primary">Go Back</a></div><hr/>';
                                                die();
                                            }

                                            if($rData['Online'] == 1) {
                                                echo "<b><span style='color:red'>You cannot perform this action while the player is online!</span></b>";
                                                echo '<div><a href="promotefm.php" type="button" class="btn btn-primary">Go Back</a></div><hr/>';
                                                die();
                                            }

                                            $account = $rData['Username'];

                                            $query1 = $con->prepare("UPDATE `accounts` SET Member=0, Rank=0, Model=299 WHERE `Username` = '".$account."'");
                                            $query1->execute();
                                            var_dump($query1);

                                            echo "<b><span style='color:green'>You've successfully kicked ".$account." from the ".$ftext."!</span></b>";
                                            echo '<div><a href="fmembers.php" type="button" class="btn btn-primary">Go Back</a></div><hr/>';
                                        } else {
                                            echo "<b><span style='color:red'>All fields are required!</span></b>";
                                        }
                                        ?>
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
