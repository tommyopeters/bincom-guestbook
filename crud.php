<?php 
    
    $crudUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo $crudUrl;
    if(strpos($crudUrl, "edit")){
        if (isset($_POST['submit'])){
        
                include_once 'database.php';
        
                $name = mysqli_real_escape_string($connection, $_POST['name']);
                $address = mysqli_real_escape_string($connection, $_POST['address']);
                $number = mysqli_real_escape_string($connection, $_POST['number']);
                $email = mysqli_real_escape_string($connection, $_POST['email']);
        
                if (empty($name)||empty($address)||empty($number)||empty($email)){
                    header("Location: edit.php?edit=empty&id=".$_GET['id']);
                    exit();
                }else{
                //CHECK IF INPUT CHARACTERS ARE VALID
                    if(!preg_match("/[a-zA-Z_ -]/", $name)){
                        header("Location: edit.php?edit=char&id=".$_GET['id']);
                        exit();
                    } else{
                        //CHECK IF EMAIL IS VALID
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            header("Location: edit.php?edit=email&id=".$_GET['id']);
                            exit();
                        }else{
                            $editid = $_GET['id'];
                            $sql = "UPDATE guestlist SET name = '$name', address = '$address', number= '$number', email = '$email' WHERE id = $editid ";
                            echo $sql;
                            $insert_query =  mysqli_query($connection, $sql);
                            if($insert_query){            
                                header("Location: edit.php?edit=success");
                            }
                        }
                    }
                }
        
                
            }
    }elseif(strpos($crudUrl, "delete")){
        include_once "database.php";
        $sql = "DELETE FROM guestlist WHERE id=".$_GET['id'];
        echo $sql;
        $insert_query =  mysqli_query($connection, $sql);
        if($insert_query){
            header("Location: table.php");
        }            
        
    }
    