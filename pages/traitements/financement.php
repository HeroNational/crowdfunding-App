<?php 
    session_start();
    $number=utf8_encode($_POST['number']);
    $montant=utf8_encode($_POST['montant']);
    $url="http://localhost/serve/Crowdfunding/api/api_rest.php?number=$number&somme=$montant";
    
    $api = @json_decode(file_get_contents($url));
    if(isset($api->status)){
        $value=array();
        if($api->status=="success"){
            $value=array("status"=>$api->status,"nom"=>$api->nom);
        }else{
            $value=array("status"=>$api->status,"message"=>$api->message);
        }
    }else{
        $value=array("status"=>"failed","message"=>"FAil to call the Payment API.");
    }

    header("content-type: application/json");
    echo json_encode($value);
?>