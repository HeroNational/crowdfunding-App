<?php 
    
    require("connexionBdApi.php");
    
    $value=array("status"=>"failed","message"=>"500","phone"=>"","nom"=>"","solde"=>"");

    if(isset($_GET['number']) and isset($_GET['somme']) and isset($_GET['token'])){
        if(!empty($_GET['number']) and !empty($_GET['somme']) and !empty($_GET['token'])){
            $application=$_GET['token'];
            $num=$_GET['number'];
            $som=$_GET['somme'];

            //Verification d'existence
            $sql="SELECT phone,solde,nom,id FROM utilisateur u, compte c WHERE u.phone=c.numeroClient and c.token LIKE '$application'";
            $stmt=$api->query($sql);
            $existA=false;
            while($res=$stmt->fetch()){
                $existA=true;
                $esxSomA=$res['solde'];
                $idA=$res['id'];
            }
            $stmt->Closecursor();

            
            $sql="SELECT phone,solde,nom FROM utilisateur u, compte c WHERE u.phone=c.numeroClient and u.phone LIKE '$num'";
            $stmt=$api->query($sql);
            $existU=false;
            while($res=$stmt->fetch()){
                $existU=true;
                $esxSomU=$res['solde'];
                $nomU=$res['nom'];
                $phoneU=$res['phone'];
            }
            $stmt->Closecursor();

             $sql="SELECT id FROM utilisateur u, compte c WHERE u.phone=c.numeroClient and u.phone LIKE '$num' and u.nom='$nomU'";
            $stmt=$api->query($sql);
            while($res=$stmt->fetch()){
                $id=$res['id'];
            }
            $stmt->Closecursor();
            
            //Action de financement
            if($existA and $existU){
                $som1=$esxSomU-$som;
                if($som1<=0){
                    $value=array("status"=>"failed","message"=>"Amount under demand.","phone"=>"","nom"=>"","solde"=>"");
                }else{
                    $sql="UPDATE compte set solde='$som1' WHERE id='$id'";
                    $stmt=$api->query($sql);

                    $som2=$som+$esxSomA;
                    $sql="UPDATE compte set solde='$som2' WHERE id='$idA'";
                    $api->query($sql);

                    $sql="SELECT phone,solde,nom FROM utilisateur u, compte c WHERE u.phone=c.numeroClient and u.phone LIKE '$num'";
                    $stmt=$api->query($sql);
                    $SomU=$_GET['somme'];
                    $existU=false;
                    while($res=$stmt->fetch()){
                        $existU=true;
                        $value=array("status"=>'success', "message"=>"Good","phone"=>$res['phone'],"nom"=>$res['nom'],"solde"=>$res['solde']);
                    }
                    mail(utf8_encode("user@test.com"),utf8_encode("Depôt effectué avec succès!"),utf8_encode(" Nous vous confirmons la réussite de la transaction \n\n\n Recevant: $nomU; Montant: ".number_format("$SomU","2","."," ")." XAF. Votre solde était de ".number_format("$esxSomU","2","."," ")." XAF et sera désormais de ".number_format("$som1","2","."," ")." XAF"));
                }
            }else{
                if(!$existU){
                    $value=array("status"=>"failed","message"=>"Not logged","phone"=>"","nom"=>"","solde"=>"");
                }else{
                    if(!$existA){
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