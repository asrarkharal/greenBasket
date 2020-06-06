<?php
require('../src/config.php');
//     require(SRC_PATH . 'dbconnect.php');
include('layout/header.php');
?>
<hr>
<!----DASHBOARD--->
<div class="container">

                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                           
                            <span>Admin Dashboard</span>
                        </div>
                        <ul>
                            <li><a href="admin/index.php">Manage Products</a></li>
                            <li><a href="admin/create_user.php">Manage Users</a></li>
                       
                        </ul>
</div>
</div>
<!----USERS LIST---->       
<?php

$users =$adminuserDbHandler->getAllUsers();
?>
 <br>
 
  <section>
 <h3>Users</h3>
  
 <table  class="table table-hover">
     <thead>
         <tr class= "table-success">
            
             <th scope="column">ID</th>
             <th scope="column">Name</th>
             <th scope="column">Surname</th>
             <th scope="column">E-mail</th>
             <th scope="column">Password</th>
             <th scope="column">Phone</th>
             <th scope="column">Street</th>
             <th scope="column">Postal code</th>
             <th scope="column">City</th>
             <th scope="column">Country</th>
             <th scope="column">Action</th>
             <th scope="column"></th>
             
         </tr>
       
     </thead>
     </table>
    
     <tbody>
     <?php foreach ($users as $key => $user) { ?>
         
         <table  class="table table-hover">
         <thead>
         <tr>
             <th scope="column"><?=$user['id']?></th>
             <th scope="column"><?=htmlentities($user['first_name'])?></th>
             <th scope="column"><?=htmlentities($user['last_name'])?></th>
             <th scope="column"><?=htmlentities($user['email'])?></th>
             <th scope="column"><?=htmlentities($user['password'])?></th>
             <th scope="column"><?=htmlentities($user['phone'])?></th>
             <th scope="column"><?=htmlentities($user['street'])?></th>
             <th scope="column"><?=htmlentities($user['postal_code'])?></th>
             <th scope="column"><?=htmlentities($user['city'])?></th>
             <th scope="column"><?=htmlentities($user['country'])?></th>
             <th scope="column">
             <a href="update_user.php?id=<?=$user['id']?>" class="edit"><button type="button" class="btn btn-info update" " >Update</button></a></th>
             <th scope ="column">
             <a href="delete_user.php?id=<?=$user['id']?>" class="trash"><button type="button" class="btn btn-danger remove">Delete</button></a></th>
             </tr>
         </thead>
        
     </table>
   
         <?php } ?>
     </tbody>
 </table>


 </div>
</section>



 
<!-- Footer -->
<?php include('layout/footer.php'); ?>