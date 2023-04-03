<?php
session_start();
include('includes/config.php');
error_reporting(0);

if(strlen($_SESSION['login'])==0)
    {  
    header('location:InputID.php');
    }
else
{
    if(isset($_GET['IDNumber'])){
		
		// escape sql chars

		// make sql
		$sql = "SELECT * FROM livestockdetails WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$pizza = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}
?>

<!DOCTYPE html>

<html lang="en" >
<head>
   
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>E Live</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>

    
</head>
<body>

                                   


    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="layout"></i></div>
                            Elives
                        </h1>
                        <div class="page-header-subtitle">We make collecting livestock data easy! :D</div>
                    </div>
                </div>
            </div>
        </div>
    </header> 

    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Livestock Detail 
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php

$IDNumber=$_SESSION['inputIDNumber'];
$sql="SELECT IDNumber, Breed, Birthday, Gender, MotherID, FatherID, Height, Weight from livestockdetails where IDNumber=:IDNumber ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':IDNumber', $IDNumber, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>   

                    <div class="container mt-4">
   
                    <hr class="mt-0 mb-4" />
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- Livestock Detail-->
                                <div class="card mb-4">
                                    <div class="card-header">Livestock Details</div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                
                                                <div class="form-group col-md-6">
                                                    <label class="mb-2" >ID Number :</label>
                                                    <?php echo htmlentities($result->IDNumber);?>
                                                </div>
                    
                                                <div class="form-group col-md-6">
                                                    <label class="mb-2" >Breed :</label>
                                                    <?php echo htmlentities($result->Breed);?>
                                                </div>
                                                <!-- Form Row-->
                                                
                                                    <!-- Form Group (first name)-->
                                                    <div class="form-group col-md-6">
                                                        <label class="mb-2">Date of Birth :</label>
                                                        <?php echo htmlentities($result->Birthday);?>
                                                        
                                                    </div>
                                                    <!-- Form Group (last name)-->
                                                    <div class="form-group col-md-6">
                                                        <label class="mb-2" >Gender :</label>
                                                        <?php echo htmlentities($result->Gender);?>
                                                    </div>
                                                
                                                
                                                    <!-- Form Group (organization name)-->
                                                    <div class="form-group col-md-6">
                                                        <label class="mb-2" >Mother ID :</label>
                                                        <?php echo htmlentities($result->MotherID);?>
                                                    </div>
                    
                                                     <!-- Form Group (organization name)-->
                                                    <div class="form-group col-md-6">
                                                        <label class="mb-2"> Father ID :</label>
                                                        <?php echo htmlentities($result->FatherID);?>
                                                    </div>
                                                  
                                                    <div class="form-group col-md-6">
                                                        <label class="mb-2" >Height :</label>
                                                        <?php echo htmlentities($result->Height);?> 
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="mb-2" >Weight :</label>
                                                        <?php echo htmlentities($result->Weight);?> 
                                                    </div>
                                                </div> 
                                                </form>
                                         </div>
                                    </div>
                                    <?php } }?>


                                        <div class="card mb-4">
                                            <div class="card-header">Livestock Medical Treatment</div>
                                                 <div class="card-body">
                                                   <table class='table table-bordered' width="100%" cellspacing="0">
                                                          <tr>
                                                            <th>Date</th>
                                                            <th>Treatment</th>
                                                            <th>Notes</th>
                                                          </tr>
                                                          <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                              </tr>
                                                              <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                              </tr>
                                                    </table>
                                                 </div>
                                                
                                   </div>
                                </div>
                            </div>
                        </div>
                    




</body>
</html>
<?php } ?>
