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
                                            <label>Citizen's Name</label>
                                            <input type="text" id="cname" name="cname" class="form-control" placeholder="Username">
                                        </div>
                                        <button type="submit" class="btn btn-default">Check Licenses</button>

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

                                            echo "

                                            <div class='col-lg-8'>
                                                <div class='panel panel-default'>
                                                    <div class='panel-body'>
                                                        <div class='row'>
                                                            <div class='col-lg-2'>
                                                                <img src='../bigskins/".$rData['Model'].".png' style='height:300px;'><hr>
                                                            </div>
                                                            <div class='col-lg-12'>
                                                                Name: <b>" .$rData['Username']. "</b><hr>
                                                                Age: <b>" .$rData['Age']. "</b><hr>
                                                            <table style='width:100%'>
                                                              <tr>
                                                                <th>CDA License</th>
                                                                <th>Car License</th>
                                                                <th>Fly License</th>
                                                                <th>Gun License</th>
                                                              </tr>
                                                              <tr>
                                                                <td> ".$rData['CDALic']." </td>
                                                                <td> ".$rData['CarLic']." </td>
                                                                <td> ".$rData['FlyLic']." </td>
                                                                <td> ".$rData['GunLic']." </td>
                                                              </tr>
                                                            </table>
                                                            <hr />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            ";
                                        } else {
                                            echo "<b><span style='color:red'>Please enter a name!</span></b>";
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
