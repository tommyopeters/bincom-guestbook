
<?php 
    if (isset($_POST['submit'])){
        
    echo "second    ";
        include_once 'database.php';

        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $address = mysqli_real_escape_string($connection, $_POST['address']);
        $number = mysqli_real_escape_string($connection, $_POST['number']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);

        if (empty($name)||empty($address)||empty($number)||empty($email)){
            header("Location: register.php?register=empty");
            exit();
        }else{
        //CHECK IF INPUT CHARACTERS ARE VALID 
            if(!preg_match("/[a-zA-Z_ -]/", $name)){
                header("Location: register.php?register=char");
                exit();
            } else{
                if(!filter_var($number, FILTER_SANITIZE_NUMBER_INT)){
                    header("Location: register.php?register=num");
                    exit();
                }else{
                    //CHECK IF EMAIL IS VALID
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        header("Location: register.php?register=email");
                        exit();
                    }else{
                        $sql = "INSERT INTO guestlist (name, address, number, email) VALUES ('$name', '$address', '$number', '$email');";
                        $insert_query =  mysqli_query($connection, $sql);            
                        header("Location: register.php?register=success");
                    }
                }
            }
        }

        
    }
    