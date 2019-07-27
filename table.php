<?php 
    include_once "header.php"
?>
    <div class="tablebody">
        <div class="tablecontainer">
            <?php 
                include_once 'database.php';
            ?>

            

            <table class="table table-striped table-hover">
                <thead>
                    <tr class="bg-gradient">
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                <tbody>
                
                <?php 
                    
                    $initialquery = "SELECT * FROM guestlist";
                    $run_initialquery = mysqli_query($connection, $initialquery);
                    $row_number = mysqli_num_rows($run_initialquery);

                    $items_per_page = 9;
                    $total_pages = ceil($row_number/$items_per_page);
                    if(isset($_GET['page']) && !empty($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = 1;
                    }
                    $offset = ($page -1) * $items_per_page;

                    $query = "SELECT * FROM guestlist LIMIT $items_per_page OFFSET $offset";
                    $paginationresult = mysqli_query($connection, $query);
                    $serverhost = "http://$_SERVER[HTTP_HOST]";
                    $uri = "/bincom-guestbook/table.php";


                    while($result = mysqli_fetch_assoc($paginationresult)){
                        ?>
    
                        <form action="crud.php" method='GET'>
                            <tr id="<?php echo $result['id']; ?>" name="<?php echo $result['id']; ?>">
                                <td> <?php echo $result['name']; ?></td>
                                <td><?php echo $result['address']; ?></td>
                                <td><?php echo $result['number']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td class="edit"><i class="fas fa-pencil-alt"></i></td>
                                <td class="delete"><i class="fas fa-trash"></i></td>
                            </tr>
                        </form>
    
                    <?php 
                    } 
                     ?>
                </tbody>
            </table>

            <div class="registernew">
                <a href="register.php" class="btn">
                Register New Guest
                </a>
            </div>

            <div class="paginate">
            <ul class="pagelist">
                <?php 
                    for($i=1; $i<=$total_pages; $i++){
                        if ($i==$page) {
                            echo '<li><a class="active">'.$i.'</a></li>';
                        }else{
                            echo '<li><a href="'.$serverhost.$uri.'?page='.$i.'">' .$i.'</a></li>';
                        }
                    }
                ?>
            </ul>
        </div>       
    </div>

    <!-- EDIT MODAL -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">
                    &times;
                    </button>
                </div>
                <div class="modal-body">
                    <p id="editcontent"></p>
                </div>
                <div class="modal-footer">
                    <a href="" id=editbutton class="btn btn-default">Yes</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                    No
                    </button>
                </div>
            </div>
        </div>
    </div>   

    <!-- DELETE MODAL -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">
                    &times;
                    </button>
                </div>
                <div class="modal-body">
                    <p id="deletecontent"></p>
                </div>
                <div class="modal-footer">
                    <a href="" id=deletebutton class="btn btn-default">Yes</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                    No
                    </button>
                </div>
            </div>
        </div>
    </div>   
                
        
    </div>
<?php 
    include_once "footer.php"
?>