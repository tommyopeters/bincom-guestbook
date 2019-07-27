<?php 
    include_once "header.php"
?>

<div class="registerbody">
    <div class="registercontainer">
        <form action="registernew.php" method="POST" class="col-md-12">
            <input type="text" class="form-control" name="name" placeholder="Full Name">
            <input type="text" class="form-control" name="address" placeholder="Address">
            <input type="text" class="form-control" name="number" placeholder="Phone Number">
            <input type="text" class="form-control" name="email" placeholder="E-mail">
            <button type="submit" name="submit" class="btn btn-info btn-block">Register</button>

            
            <div class="viewtable">
                <a href="table.php" class="btn">
                View Table
                </a>
            </div>
        </form>
        
        
    </div>
    <?php 
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        
        if(strpos($fullUrl, "register=empty")){
            echo "<div class='modalwarning'>
                <p class='errorwarning bg-danger'>No field can be left empty</p>
            </div>";
        }elseif(strpos($fullUrl, "register=char")){
            echo "<div class='modalwarning'>
                <p class='errorwarning bg-danger'>Invalid Character
            </div></p>";
        }elseif(strpos($fullUrl, "register=email")){
            echo "<div class='modalwarning'>
                <p class='errorwarning bg-danger'>Invalid E-mail
            </div></p>";
        }elseif(strpos($fullUrl, "register=num")){
            echo "<div class='modalwarning'>
                <p class='errorwarning bg-danger'>Invalid Phone Number
            </div></p>";
        }elseif(strpos($fullUrl, "register=success")){
            header("Location: table.php");
        }
    ?>
    
</div>

<?php 
    include_once "footer.php"
?>