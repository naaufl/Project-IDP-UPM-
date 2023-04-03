<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['add']))
{   
$IDNumber=$_POST['inputIDNumber'];
$Breed=$_POST['inputBreed'];
$Birthday=$_POST['inputBirthday'];
$MotherID=$_POST['inputMotherID'];
$FatherID=$_POST['inputFatherID'];
$Height=$_POST['inputHeight'];
$Weight=$_POST['inputWeight'];
$sql="INSERT INTO  livestockdetails(IDNumber,Breed,Birthday,MotherID,FatherID,Height,Weight) VALUES(:IDNumber,:Breed,:Birthday,:MotherID,:FatherID,:Height,:Weight)";
$query = $dbh->prepare($sql);
$query->bindParam(':IDNumber',$IDNumber,PDO::PARAM_STR);
$query->bindParam(':Breed',$Breed,PDO::PARAM_STR);
$query->bindParam(':Birthday',$Birthday,PDO::PARAM_STR);
$query->bindParam(':MotherID',$MotherID,PDO::PARAM_STR);
$query->bindParam(':FatherID',$FatherID,PDO::PARAM_STR);
$query->bindParam(':Height',$Height,PDO::PARAM_STR);
$query->bindParam(':Weight',$Weight,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('The Data successfully added.') </script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
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
                            New Livestock Detail 
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container mt-4">
   
    

        <hr class="mt-0 mb-4" />
        <div class="row">
            <div class="col-xl-8">
                <!-- Livestock Detail-->
                <div class="card mb-4">
                    <div class="card-header">Livestock Details</div>
                        <div class="card-body">
                        <form name="add" method="post" >
                            <div class="form-row">
                            
                            <!-- Form Group (username)-->
                            
                            <div class="form-group col-md-6">
                                <label class="mb-2" for="inputIDNumber">ID Number :</label>
                                <input class="form-control"  name="inputIDNumber" type="text" placeholder="Example: 103"  />
                            </div>

                            <div class="form-group col-md-6">
                                <label class="mb-2" for="inputBreed">Breed :</label>
                                <input class="form-control" name="inputBreed" type="text" placeholder="Example: Johor-Kedah" />
                            </div>
                            <!-- Form Row-->
                            
                                <!-- Form Group (first name)-->
                                <div class="form-group col-md-6">
                                    <label class="mb-2" for="inputBirthday">Date of Birth :</label>
                                <input class="form-control"  name="inputBirthday" type="text"  placeholder="Example:  Day/Months/Year" />
                                    
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="form-group col-md-6">
                                    <label class="mb-2" for="inputGender">Gender :</label>
                                <input class="form-control"  name="inputGender" type="text"  placeholder="Example: Male" />
                                </div>
                            
                            
                                <!-- Form Group (organization name)-->
                                <div class="form-group col-md-6">
                                    <label class="mb-2" for="inputMotherID">Mother ID :</label>
                                    <input class="form-control"  name="inputMotherID" type="text" placeholder="Example: 135" />
                                </div>

                                 <!-- Form Group (organization name)-->
                                <div class="form-group col-md-6">
                                    <label class="mb-2" for="inputFatherID"> Father ID :</label>
                                    <input class="form-control"  name="inputFatherID" type="text"  placeholder="Example: 135" />
                                </div>
                              
                                <div class="form-group col-md-6">
                                    <label class="mb-2" for="inputHeight">Height :</label>
                                    <input class="form-control"  name="inputHeight" type="text"  placeholder="Example: 135 cm" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mb-2" for="inputWeight">Weight :</label>
                                    <input class="form-control"  name="inputWeight" type="text"  placeholder="Example: 154 kg" />
                                </div>
                            </div> 
                            
                         </div>
                    </div>
                
                        <div class="card mb-4">
                            <div class="card-header">Livestock Medical Treatment</div>
                                 <div class="card-body">
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="inputDateMedical">Date :</label>
                                        <input class="form-control"  id="inputDateMedical" type="text"  placeholder="Example: Day/Months/Year" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="inputTreatment">Treatment :</label>
                                        <input class="form-control"  id="inputTreatment" type="text"  placeholder="Example: Fever" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="inputNotes">Notes :</label>
                                        <input class="form-control"  id="inputNotes" type="text"  placeholder="Example: Required extra milk" />
                                    </div>
                                  
                                </div>
                                    <button type="submit" name="add" class="btn btn-success" id="submit"> Add </button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</body>
</html>