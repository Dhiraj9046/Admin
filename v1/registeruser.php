<?php

    require_once '../includes/dboperation.php';
    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(
            isset($_POST['username']) and 
            isset($_POST['email']) and
            isset($_POST['password']))
        
        {

            $db = new dboperation();
            if($db->createUser(
                $_POST['username'],
                $_POST['password'],
                $_POST['email']
            )) {
                $response['error'] = false;
                $response['message'] = "user registered Successfully";
            }
            else{
                $response['error'] = true;
                $response['message'] = "Some error occurred please try again";
            }

        }else{
            $response['error'] = true;
            $response['message'] = "Required fields are missing";
        }
    } else{
        $response['error'] =true;
        $resposse['message'] = "Invalid Request";
    }

    echo json_encode($response);
?>
