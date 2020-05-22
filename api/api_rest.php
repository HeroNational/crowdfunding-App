<?php 
    
    require("connexionBdApi.php");
    
    if(isset($_GET['number']) and isset($_GET['somme']) and isset($_GET['token'])){
        if(!empty($_GET['number']) and !empty($_GET['somme']) and !empty($_GET['token'])){
            $application=$_GET['token'];
            $num=$_GET['number'];
            $som=$_GET['somme'];

            //Verification d'existence
            $sql="SELECT phone,solde,nom,id FROM utilisateur u, compte c WHERE u.phone=c.id and u.nom LIKE '$application'";
            $stmt=$api->query($sql);
            $existA=false;
            while($res=$stmt->fetch()){
                $existA=true;
                $esxSomA=$res['solde'];
                $idA=$res['id'];
            }
            $stmt->Closecursor();
            $sql="SELECT phone,solde,nom FROM utilisateur u, compte c WHERE u.phone=c.id and u.phone LIKE '$num'";
            $stmt=$api->query($sql);
            $exist=false;
            while($res=$stmt->fetch()){
                $exist=true;
                $esxSom=$res['solde'];
                $nom=$res['nom'];
                $phone=$res['phone'];
            }
            
            //Action de financement
            if($existA and $exist){
                $som1=$esxSom-$som;
                if($som1<=0){
                    $value=array("status"=>"failed","message"=>"Amount under demand.","phone"=>"","nom"=>"","solde"=>"");
                }else{
                    $sql="UPDATE compte set solde='$som1' WHERE id='$num'";
                    $stmt=$api->query($sql);

                    $som2=$som+$esxSomA;
                    $sql="UPDATE compte set solde='$som2' WHERE id='$idA'";
                    $api->query($sql);

                    $sql="SELECT phone,solde,nom FROM utilisateur u, compte c WHERE u.phone=c.id and u.phone LIKE '$num'";
                    $stmt=$api->query($sql);
                    $exist=false;
                    while($res=$stmt->fetch()){
                        $exist=true;
                        $value=array("status"=>'success', "message"=>"Good","phone"=>$res['phone'],"nom"=>$res['nom'],"solde"=>$res['solde']);
                    }
                }
            }else{
                if($exist){
                    $value=array("status"=>"failed","message"=>"Not logged","phone"=>"","nom"=>"","solde"=>"");
                }else{
                    if($existA){
                        $value=array("status"=>"failed","message"=>"Unknown application","phone"=>"","nom"=>"","solde"=>"");
                    }else{
                        $value=array("status"=>"failed","message"=>"Unknown application and not logged user","phone"=>"","nom"=>"","solde"=>"");
                    }
                }
            }
        }
    }else{
        $value=array("status"=>"failed","message"=>"Bad parameters","phone"=>"","nom"=>"","solde"=>"");
    }

    header("content-type: application/json");
    echo  json_encode($value);

?>