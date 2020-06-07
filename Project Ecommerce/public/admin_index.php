<?php
require('../src/config.php');
//     require(SRC_PATH . 'dbconnect.php');
include('admin/layout/header.php');
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
            <div class="table-responsive">
            <table  class="table table-hover table-fixed">
            	<thead>
	            	<tr class= "table-success">
                       
	            		<th class="th-lg">ID</th>
	            		<th class="th-lg">Name</th>
                        <th class="th-lg">Surname</th>
	            		<th class="th-lg">E-mail</th>
	            		<th class="th-lg">Password</th>
                        <th class="th-lg">Phone</th>
                        <th class="th-lg">Street</th>
                        <th class="th-lg">Postal code</th>
                        <th class="th-lg">City</th>
                        <th class="th-lg">Country</th>
                        <th class="th-lg">Action</th>
                        <th class="th-lg"></th>
	            		
	            	</tr>
           	</thead>
                
                <tbody >
                
                <?php 
                foreach ($users as $row) { 
            	
                   echo'<tr class="table_row">';
                   echo'<td>' .$row['id'] .'</td>';
	               echo'<td>' .$row['first_name'] .'</td>';
	               echo'<td>' .$row['last_name'] . '</td>';
	               echo'<td>' .$row['email'] .'</td>';
                   echo'<td>' .$row['password'] .'</td>';
                   echo'<td>' .$row['phone'] .'</td>';
                   echo'<td>' .$row['street'] .'</td>';
                   echo'<td>' .$row['postal_code'] .'</td>';
                   echo'<td>' .$row['city'] .'</td>';
                   echo'<td>' .$row['country'] .'</td>';
                   echo
                        '<td><a class="btn btn-info update" 
                        href="admin/update_user.php?id='.$row['id'].'">Update</a></td>';
                   echo 
                        '<td><a class="btn btn-danger remove"
                         href="admin/delete_user.php?id='.$row['id'].'">Delete</a>';
                   echo'</tr>';
                }
                ?>
              
                </tbody>
                </table>
              
                
                    
            	
                
            </div>
        
          
    </section>



 
<!-- Footer -->
<?php include('layout/footer.php'); ?>