<?php 
    include_once "header.php"
?>
<div class="registerbody">
    <div class="registercontainer">
        <form action="crud.php?edit&id=<?php echo $_GET['id'];?>" method="POST" class="col-md-12">
            <p >RE-INSERT GUEST DETAILS AGAIN</p>
            <input type="text" class="form-control" name="name" placeholder="Full Name">
            <input type="text" class="form-control" name="address" placeholder="Address">
            <input type="text" class="form-control" name="number" placeholder="Phone Number">
            <input type="text" class="form-control" name="email" placeholder="E-mail">
            <button type="submit" name="submit" class="btn btn-info btn-block">Edit</button>

            
            <div class="viewtable">
                <a href="table.php" class="btn">
                View Table
                </a>
            </div>
        </form>
        
        
    </div>
    <?php 
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        
        if(strpos($fullUrl, "edit=empty")){
            echo "<div class='modalwarning'>
                <p class='errorwarning bg-danger'>No field can be left empty</p>
            </div>";
        }elseif(strpos($fullUrl, "edit=char")){
            echo "<div class='modalwarning'>
                <p class='errorwarning bg-danger'>Invalid Character
            </div></p>";
        }elseif(strpos($fullUrl, "edit=email")){
            echo "<div class='modalwarning'>
                <p class='errorwarning bg-danger'>Invalid E-mail
            </div></p>";
        }elseif(strpos($fullUrl, "edit=success")){
            header("Location: table.php");
        }
    ?>
    
</div>

<?php 
    include_once "footer.php"
?>