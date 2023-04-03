<?php
session_start();

include('includes/config.php');

if($_SESSION['login']!=''){
    $_SESSION['login']='';
    }
    if(isset($_POST['login']))
    {
    $IDNumber=$_POST['inputIDNumber'];
    $sql ="SELECT IDNumber FROM livestockdetails WHERE IDNumber=:IDNumber";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':IDNumber', $IDNumber, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0)
    {
        foreach ($results as $result)
        { 
            
            $_SESSION['inputIDNumber']=$result->IDNumber;
            $_SESSION['login']=$_POST['inputIDNumber'];
            echo "<script type='text/javascript'> document.location ='LivestockProfile.php'; </script>";
            } 
    }
        else 
        {
            echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";
            
            }
        }
       
?>


<!DOCTYPE html>

<html lang="en">
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
    <!-- Header/Dashboard-->
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
    
        
    <div class="container-fluid">
        <div class="card mt-n10">
            <div class="card-header">Input ID</div>
            <div class="card-body">
            <form role="form" method="post">
                <div class="form-group">
                    <input class="form-control" name="inputIDNumber" type="text" placeholder="Example: 103" />
                </div>

                <button type="submit" name="login" class="btn btn-primary" type="button"> Enter </button>  
                </form>
            </div>
        </div>
    </div>

     
    
</body>
</html>

