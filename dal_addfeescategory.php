<?php
include_once 'database.php';
include_once 'feescategory.php';

$database = new Database();
$db = $database->getConnection();

$fees = new FeesCategory($db);
$msg="";
 
    try{
    	if (empty($_POST["param_feescategoryname"])) {
            $msg = " Fees Category Name is required ";
        }
        else
        {
             $fees->fees_categoryname=$_POST["param_feescategoryname"];    
        }
    	if(empty($msg))
        {


        if($fees->create()){
            $msg="Success";
        }
    // if unable to create , tell the user
    else{
         $msg= "Unable";
        }
         echo json_encode($msg);
    }
    else
    {
    	 echo json_encode($msg);
    }
    }
    catch(Exception $ex)
    {
        $msg=$ex.errorMessage();
    }
    finally{
        //echo $msg;
    }
 
?>
