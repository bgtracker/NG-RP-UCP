<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();
$_SESSION['last_action'] = time();

if($_SESSION['Member'] < 1) {
    header('Location: index.php');
}
?>
<?php

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
    $ftext = "United States Army";
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
                            <?php echo $ftext; ?>
                        </h1>
                    </div>
                </div>

			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <hr/>
                                    <div><a href="index.php" type="button" class="btn btn-primary">Home</a>

                                    <?php if ($_SESSION['Leader'] == $_SESSION['Member']) {
                                        echo ' | <a href="promotefm.php" type="button" class="btn btn-primary">Adjust Member Rank</a> | <a href="kickfm.php" type="button" class="btn btn-primary">Kick Member</a>';
                                    }
                                    ?>
                                    </div>
                                    <hr/>
                                    <b>Legend: </b>
                                    <div><img src="..\assets\img\online.png" height="16" width="16"> = Player is currently online!</div>
                                    <div><img src="..\assets\img\offline.png" height="16" width="16"> = Player is currently offline!</div>
                                    <hr/>
                                    <?php
                                        $sql = 'SELECT Username, Member, Division, Rank, Leader, Online FROM `accounts` WHERE `Member`='.$_SESSION['Member'].' ORDER BY Rank';
                                        $q = $con->query($sql);
                                        $q->setFetchMode(PDO::FETCH_ASSOC);
                                    ?>
                                    <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Rank</th>
                                            <th>Division</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                        while ($row = $q->fetch()): 
                                            
                                        //LAPD RANKS
                                        if($row['Member'] == 1 && $row['Rank'] == 0) {
                                            $row['Rank'] = "Cadet";
                                        } else if($row['Member'] == 1 && $row['Rank'] == 1) {
                                            $row['Rank'] = "Officer";
                                        } else if($row['Member'] == 1 && $row['Rank'] == 2) {
                                            $row['Rank'] = "Corporal";
                                        } else if($row['Member'] == 1 && $row['Rank'] == 3) {
                                            $row['Rank'] = "Sergeant";
                                        } else if($row['Member'] == 1 && $row['Rank'] == 4) {
                                            $row['Rank'] = "Lieutenant";
                                        } else if($row['Member'] == 1 && $row['Rank'] == 5) {
                                            $row['Rank'] = "Captain";
                                        } else if($row['Member'] == 1 && $row['Rank'] == 6) {
                                            $row['Rank'] = "Chief";
                                        }
                                        //DIVISIONS
                                        if($row['Member'] == 1 && $row['Division'] == 0) {
                                            $row['Division'] = "General Duties";
                                        } else if($row['Member'] == 1 && $row['Division'] == 1) {
                                            $row['Division'] = "General Duties";
                                        } else if($row['Member'] == 1 && $row['Division'] == 2) {
                                            $row['Division'] = "Detectives Bureau";
                                        } else if($row['Member'] == 1 && $row['Division'] == 3) {
                                            $row['Division'] = "Field Training Operations";
                                        } else if($row['Member'] == 1 && $row['Division'] == 4) {
                                            $row['Division'] = "Internal Affairs";
                                        } else if($row['Member'] == 1 && $row['Division'] == 5) {
                                            $row['Division'] = "SWAT";
                                        } else if($row['Member'] == 1 && $row['Division'] == 6) {
                                            $row['Division'] = "HSIU";
                                        }

                                        //FBI RANKS
                                        if($row['Member'] == 2 && $row['Rank'] == 0) {
                                            $row['Rank'] = "Intern";
                                        } else if($row['Member'] == 2 && $row['Rank'] == 1) {
                                            $row['Rank'] = "Staff";
                                        } else if($row['Member'] == 2 && $row['Rank'] == 2) {
                                            $row['Rank'] = "Agent";
                                        } else if($row['Member'] == 2 && $row['Rank'] == 3) {
                                            $row['Rank'] = "Senior Agent";
                                        } else if($row['Member'] == 2 && $row['Rank'] == 4) {
                                            $row['Rank'] = "Special Agent";
                                        } else if($row['Member'] == 2 && $row['Rank'] == 5) {
                                            $row['Rank'] = "Assistant Director";
                                        } else if($row['Member'] == 2 && $row['Rank'] == 6) {
                                            $row['Rank'] = "Director";
                                        }
                                        //DIVISIONS
                                        if($row['Member'] == 2 && $row['Division'] == 0) {
                                            $row['Division'] = "GD";
                                        } else if($row['Member'] == 2 && $row['Division'] == 1) {
                                            $row['Division'] = "GD";
                                        } else if($row['Member'] == 2 && $row['Division'] == 2) {
                                            $row['Division'] = "GU";
                                        } else if($row['Member'] == 2 && $row['Division'] == 3) {
                                            $row['Division'] = "FAN";
                                        } else if($row['Member'] == 2 && $row['Division'] == 4) {
                                            $row['Division'] = "CID";
                                        } else if($row['Member'] == 2 && $row['Division'] == 5) {
                                            $row['Division'] = "IA";
                                        } else if($row['Member'] == 2 && $row['Division'] == 6) {
                                            $row['Division'] = "NSB";
                                        }

                                        //SFPD RANKS
                                        if($row['Member'] == 3 && $row['Rank'] == 0) {
                                            $row['Rank'] = "Cadet";
                                        } else if($row['Member'] == 3 && $row['Rank'] == 1) {
                                            $row['Rank'] = "Officer";
                                        } else if($row['Member'] == 3 && $row['Rank'] == 2) {
                                            $row['Rank'] = "Corporal";
                                        } else if($row['Member'] == 3 && $row['Rank'] == 3) {
                                            $row['Rank'] = "Sergeant";
                                        } else if($row['Member'] == 3 && $row['Rank'] == 4) {
                                            $row['Rank'] = "Lieutenant";
                                        } else if($row['Member'] == 3 && $row['Rank'] == 5) {
                                            $row['Rank'] = "Captain";
                                        } else if($row['Member'] == 3 && $row['Rank'] == 6) {
                                            $row['Rank'] = "Chief";
                                        }
                                        //DIVISIONS
                                        if($row['Member'] == 3 && $row['Division'] == 0) {
                                            $row['Division'] = "GD";
                                        } else if($row['Member'] == 3 && $row['Division'] == 1) {
                                            $row['Division'] = "HR";
                                        } else if($row['Member'] == 3 && $row['Division'] == 2) {
                                            $row['Division'] = "ERT";
                                        } else if($row['Member'] == 3 && $row['Division'] == 3) {
                                            $row['Division'] = "IA";
                                        } else if($row['Member'] == 3 && $row['Division'] == 4) {
                                            $row['Division'] = "SO";
                                        } else if($row['Member'] == 3 && $row['Division'] == 5) {
                                            $row['Division'] = "DOC";
                                        }

                                        //LAFD RANKS
                                        if($row['Member'] == 4 && $row['Rank'] == 0) {
                                            $row['Rank'] = "EMT Basic";
                                        } else if($row['Member'] == 4 && $row['Rank'] == 1) {
                                            $row['Rank'] = "EMT Intermediate";
                                        } else if($row['Member'] == 4 && $row['Rank'] == 2) {
                                            $row['Rank'] = "EMT Paramedic";
                                        } else if($row['Member'] == 4 && $row['Rank'] == 3) {
                                            $row['Rank'] = "Lieutenant";
                                        } else if($row['Member'] == 4 && $row['Rank'] == 4) {
                                            $row['Rank'] = "Captain";
                                        } else if($row['Member'] == 4 && $row['Rank'] == 5) {
                                            $row['Rank'] = "Deputy Chief";
                                        } else if($row['Member'] == 4 && $row['Rank'] == 6) {
                                            $row['Rank'] = "Chief";
                                        }
                                        //DIVISIONS
                                        if($row['Member'] == 4 && $row['Division'] == 0) {
                                            $row['Division'] = "GD";
                                        } else if($row['Member'] == 4 && $row['Division'] == 1) {
                                            $row['Division'] = "FD";
                                        } else if($row['Member'] == 4 && $row['Division'] == 2) {
                                            $row['Division'] = "Life Flight";
                                        } else if($row['Member'] == 4 && $row['Division'] == 3) {
                                            $row['Division'] = "T&R";
                                        } 

                                        //JUDICIAL RANKS
                                        if($row['Member'] == 5 && $row['Rank'] == 0) {
                                            $row['Rank'] = "Fugitive Recovery Agent";
                                        } else if($row['Member'] == 5 && $row['Rank'] == 1) {
                                            $row['Rank'] = "Clerk of Court";
                                        } else if($row['Member'] == 5 && $row['Rank'] == 2) {
                                            $row['Rank'] = "District Attorney";
                                        } else if($row['Member'] == 5 && $row['Rank'] == 3) {
                                            $row['Rank'] = "District Judge";
                                        } else if($row['Member'] == 5 && $row['Rank'] == 4) {
                                            $row['Rank'] = "Appellate Judge";
                                        } else if($row['Member'] == 5 && $row['Rank'] == 5) {
                                            $row['Rank'] = "Associate Justice";
                                        } else if($row['Member'] == 5 && $row['Rank'] == 6) {
                                            $row['Rank'] = "Chief Justice";
                                        }
                                        //DIVISIONS
                                        if($row['Member'] == 5 && $row['Division'] == 0) {
                                            $row['Division'] = "None";
                                        } 

                                        //GOVERNMENT RANKS
                                        if($row['Member'] == 6 && $row['Rank'] == 0) {
                                            $row['Rank'] = "Intern";
                                        } else if($row['Member'] == 6 && $row['Rank'] == 1) {
                                            $row['Rank'] = "Staff Member";
                                        } else if($row['Member'] == 6 && $row['Rank'] == 2) {
                                            $row['Rank'] = "G.E.T. Officer";
                                        } else if($row['Member'] == 6 && $row['Rank'] == 3) {
                                            $row['Rank'] = "Legislator";
                                        } else if($row['Member'] == 6 && $row['Rank'] == 4) {
                                            $row['Rank'] = "Government Cabinet";
                                        } else if($row['Member'] == 6 && $row['Rank'] == 5) {
                                            $row['Rank'] = "Vice President";
                                        } else if($row['Member'] == 6 && $row['Rank'] == 6) {
                                            $row['Rank'] = "President";
                                        }
                                        //DIVISIONS
                                        if($row['Member'] == 6 && $row['Division'] == 0) {
                                            $row['Division'] = "None";
                                        }

                                        //LASP RANKS
                                        if($row['Member'] == 7 && $row['Rank'] == 0) {
                                            $row['Rank'] = "Trainee";
                                        } else if($row['Member'] == 7 && $row['Rank'] == 1) {
                                            $row['Rank'] = "Deputy";
                                        } else if($row['Member'] == 7 && $row['Rank'] == 2) {
                                            $row['Rank'] = "Senior Deputy";
                                        } else if($row['Member'] == 7 && $row['Rank'] == 3) {
                                            $row['Rank'] = "Sergeant";
                                        } else if($row['Member'] == 7 && $row['Rank'] == 4) {
                                            $row['Rank'] = "Lieutenant";
                                        } else if($row['Member'] == 7 && $row['Rank'] == 5) {
                                            $row['Rank'] = "Captain";
                                        } else if($row['Member'] == 7 && $row['Rank'] == 6) {
                                            $row['Rank'] = "Sheriff";
                                        }
                                        //DIVISIONS
                                        if($row['Member'] == 7 && $row['Division'] == 0) {
                                            $row['Division'] = "Patrol";
                                        } else if($row['Member'] == 7 && $row['Division'] == 2) {
                                            $row['Division'] = "TET";
                                        } else if($row['Member'] == 7 && $row['Division'] == 3) {
                                            $row['Division'] = "SCU";
                                        } else if($row['Member'] == 7 && $row['Division'] == 4) {
                                            $row['Division'] = "SORT";
                                        } else if($row['Member'] == 7 && $row['Division'] == 5) {
                                            $row['Division'] = "FTO";
                                        }

                                        //HITMAN RANKS
                                        if($row['Member'] == 8 && $row['Rank'] == 0) {
                                            $row['Rank'] = "Freelancer";
                                        } else if($row['Member'] == 8 && $row['Rank'] == 1) {
                                            $row['Rank'] = "Freelancer";
                                        } else if($row['Member'] == 8 && $row['Rank'] == 2) {
                                            $row['Rank'] = "Marksman";
                                        } else if($row['Member'] == 8 && $row['Rank'] == 3) {
                                            $row['Rank'] = "Agent";
                                        } else if($row['Member'] == 8 && $row['Rank'] == 4) {
                                            $row['Rank'] = "Special Agent";
                                        } else if($row['Member'] == 8 && $row['Rank'] == 5) {
                                            $row['Rank'] = "Vice Director";
                                        } else if($row['Member'] == 8 && $row['Rank'] == 6) {
                                            $row['Rank'] = "Director";
                                        }
                                        //DIVISIONS
                                        if($row['Member'] == 8 && $row['Division'] == 0) {
                                            $row['Division'] = "None";
                                        }

                                        //USNEWS RANKS
                                        if($row['Member'] == 9 && $row['Rank'] == 0) {
                                            $row['Rank'] = "Intern";
                                        } else if($row['Member'] == 9 && $row['Rank'] == 1) {
                                            $row['Rank'] = "Local Reporter";
                                        } else if($row['Member'] == 9 && $row['Rank'] == 2) {
                                            $row['Rank'] = "Local Editor";
                                        } else if($row['Member'] == 9 && $row['Rank'] == 3) {
                                            $row['Rank'] = "Network Anchor";
                                        } else if($row['Member'] == 9 && $row['Rank'] == 4) {
                                            $row['Rank'] = "Network Editor";
                                        } else if($row['Member'] == 9 && $row['Rank'] == 5) {
                                            $row['Rank'] = "Asst. Network Producer";
                                        } else if($row['Member'] == 9 && $row['Rank'] == 6) {
                                            $row['Rank'] = "Network Producer";
                                        }
                                        //DIVISIONS
                                        if($row['Member'] == 9 && $row['Division'] == 0) {
                                            $row['Division'] = "GD";
                                        } else if($row['Member'] == 9 && $row['Division'] == 1) {
                                            $row['Division'] = "Security";
                                        } else if($row['Member'] == 9 && $row['Division'] == 2) {
                                            $row['Division'] = "IA";
                                        } else if($row['Member'] == 9 && $row['Division'] == 3) {
                                            $row['Division'] = "Tech Support";
                                        } else if($row['Member'] == 9 && $row['Division'] == 4) {
                                            $row['Division'] = "TnR";
                                        }

                                        //TAXI COMPANY RANKS
                                        if($row['Member'] == 10 && $row['Rank'] == 0) {
                                            $row['Rank'] = "Trainee";
                                        } else if($row['Member'] == 10 && $row['Rank'] == 1) {
                                            $row['Rank'] = "Trainee";
                                        } else if($row['Member'] == 10 && $row['Rank'] == 2) {
                                            $row['Rank'] = "Taxi Rookie";
                                        } else if($row['Member'] == 10 && $row['Rank'] == 3) {
                                            $row['Rank'] = "Cabbie";
                                        } else if($row['Member'] == 10 && $row['Rank'] == 4) {
                                            $row['Rank'] = "Dispatcher";
                                        } else if($row['Member'] == 10 && $row['Rank'] == 5) {
                                            $row['Rank'] = "Shift Supervisor";
                                        } else if($row['Member'] == 10 && $row['Rank'] == 6) {
                                            $row['Rank'] = "Taxi Co. Owner";
                                        }
                                        //DIVISIONS
                                        if($row['Member'] == 10 && $row['Division'] == 0) {
                                            $row['Division'] = "None";
                                        } else if($row['Member'] == 10 && $row['Division'] == 1) {
                                            $row['Division'] = "Internal Affairs";
                                        } else if($row['Member'] == 10 && $row['Division'] == 2) {
                                            $row['Division'] = "ATO";
                                        } else if($row['Member'] == 10 && $row['Division'] == 3) {
                                            $row['Division'] = "T&R";
                                        } 

                                        //USA RANKS
                                        if($row['Member'] == 11 && $row['Rank'] == 0) {
                                            $row['Rank'] = "Private";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 1) {
                                            $row['Rank'] = "Private First Class";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 2) {
                                            $row['Rank'] = "Specialist";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 3) {
                                            $row['Rank'] = "Corporal";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 4) {
                                            $row['Rank'] = "Sergeant";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 5) {
                                            $row['Rank'] = "Staff Sergeant";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 6) {
                                            $row['Rank'] = "Sergeant F.C.";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 7) {
                                            $row['Rank'] = "Master Sergeant";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 8) {
                                            $row['Rank'] = "First Sergeant";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 9) {
                                            $row['Rank'] = "Sergeant Major";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 10) {
                                            $row['Rank'] = "CMD Sgt. Major";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 11) {
                                            $row['Rank'] = "Sgt. Maj. of the Army";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 12) {
                                            $row['Rank'] = "Second Lieutenant";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 13) {
                                            $row['Rank'] = "First Lieutenant";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 14) {
                                            $row['Rank'] = "Captain";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 15) {
                                            $row['Rank'] = "Major";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 16) {
                                            $row['Rank'] = "Lieutenant Colonel";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 17) {
                                            $row['Rank'] = "Colonel";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 18) {
                                            $row['Rank'] = "Brigadier General";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 19) {
                                            $row['Rank'] = "Major General";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 20) {
                                            $row['Rank'] = "Lieutenant General";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 21) {
                                            $row['Rank'] = "General";
                                        } else if($row['Member'] == 11 && $row['Rank'] == 22) {
                                            $row['Rank'] = "General of the Army";
                                        }

                                        //DIVISIONS
                                        if($row['Member'] == 11 && $row['Division'] == 0) {
                                            $row['Division'] = "Enlisted";
                                        } else if($row['Member'] == 11 && $row['Division'] == 1) {
                                            $row['Division'] = "USAAF";
                                        } else if($row['Member'] == 11 && $row['Division'] == 2) {
                                            $row['Division'] = "USACIDC";
                                        } else if($row['Member'] == 11 && $row['Division'] == 3) {
                                            $row['Division'] = "VET";
                                        } else if($row['Member'] == 11 && $row['Division'] == 4) {
                                            $row['Division'] = "USN";
                                        } else if($row['Member'] == 11 && $row['Division'] == 5) {
                                            $row['Division'] = "USMA";
                                        } else if($row['Member'] == 11 && $row['Division'] == 6) {
                                            $row['Division'] = "USMC";
                                        } else if($row['Member'] == 11 && $row['Division'] == 7) {
                                            $row['Division'] == "CMD";
                                        }

                                        //MEXICO RANKS
                                        if($row['Member'] == 12 && $row['Rank'] == 0) {
                                            $row['Rank'] = "Resident";
                                        } else if($row['Member'] == 12 && $row['Rank'] == 1) {
                                            $row['Rank'] = "Citizen";
                                        } else if($row['Member'] == 12 && $row['Rank'] == 2) {
                                            $row['Rank'] = "People's Representative";
                                        } else if($row['Member'] == 12 && $row['Rank'] == 3) {
                                            $row['Rank'] = "Tribal Representative";
                                        } else if($row['Member'] == 12 && $row['Rank'] == 4) {
                                            $row['Rank'] = "Mayor";
                                        } else if($row['Member'] == 12 && $row['Rank'] == 5) {
                                            $row['Rank'] = "Rulling Council Member";
                                        } else if($row['Member'] == 12 && $row['Rank'] == 6) {
                                            $row['Rank'] = "Executive Officer of RC";
                                        }
                                        //DIVISIONS
                                        if($row['Member'] == 12 && $row['Division'] == 0) {
                                            $row['Division'] = "Civil";
                                        } else if($row['Member'] == 12 && $row['Division'] == 1) {
                                            $row['Division'] = "AF";
                                        } else if($row['Member'] == 12 && $row['Division'] == 2) {
                                            $row['Division'] = "ES";
                                        } else if($row['Member'] == 12 && $row['Division'] == 3) {
                                            $row['Division'] = "DC";
                                        } else if($row['Member'] == 12 && $row['Division'] == 4) {
                                            $row['Division'] = "TRAA";
                                        } 

                                        //END
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php 

                                                    if($row['Online'] == 1) {
                                                        echo '<img src="..\assets\img\online.png" height="16" width="16">';
                                                        echo htmlspecialchars($row['Username']);
                                                    } else {
                                                        echo '<img src="..\assets\img\offline.png" height="16" width="16">';
                                                        echo htmlspecialchars($row['Username']);
                                                    }

                                                    ?>
                                                </td>
                                                <td><?php echo htmlspecialchars($row['Rank']); ?></td>
                                                <td><?php echo htmlspecialchars($row['Division']); ?></td>
                                                </td>
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
