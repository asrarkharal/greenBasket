<?php
   /*this config file,settting start session, so it has to come before include layout/header.php
   *config file also has require dbconnect.php , so no need to require dbcoonnect again here
   */
     require('../../src/config.php');

// Update user
  $msg = '';
  $error  = '';

  if (isset($_GET['updated'])) {
      $msg = '<div class="alert alert-success">Your profile is updated.</div>';  
  };
  if(isset($_POST['updateBtn'])){
    $first_name             =trim($_POST['first_name']);
    $last_name              =trim($_POST['last_name']);
    $street                 =trim($_POST['street']);
    $postal_code            =trim($_POST['postal_code']);
    $city                   =trim($_POST['city']);
    $country                =trim($_POST['country']);
    $phone                 =trim($_POST['phone']);
    $email                 =trim($_POST['email']);
    $userId                 = $_POST['id'];
    $password        = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

  
        if (empty($first_name)) {
            $error .= "<li>the first name must not be empty</li>";
        } 
        if (empty($last_name)) {
            $error .= "<liyour last name must not be empty</li>";
        } 
        if (empty($street)) {
            $error .= "<li>your street address must not be empty</li>";
        } 
        if (empty($postal_code)) {
            $error .= "<li>your postal code must not be empty</li>";
        } 
        if(!is_numeric($postal_code)){
            $error .= "<li>The postal code is allow only number</li>";
        }
        if (empty($city)) {
            $error .= "<li>your city address must not be empty</li>";
        }
        if (empty($country)) {
            $error .= "<li>your country address must not be empty</li>";
        }  
        if (empty($phone)) {
            $error .= "<li>your phone number must not be empty</li>";
        } 
        if(!is_numeric($phone)){
            $error .= "<li>The phone field is allow only number</li>";
        }
    
        // if(empty($password)){
        //     $error .= "<li>Password is required</li>";
        // }
        if(!empty($password) && strlen($password)<6){
            $error .= "<li>Password has to be at least 6 characters</li>";
        }
        if($confirmPassword !== $password) {
            $error .= "<li>You have to confirm the same password </li>";
        }
        if (empty($email)) {
            $error .= "<li>your e-mail must not be empty</li>";
        } 
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error .= "<li>Not valid e-mail </li>";
        }
        if($error){
            $msg .= "<ul class='alert alert-warning'>{$error}</ul>";
        }  
        else {
            if(empty($error)) {
                $msg = '<div class="alert alert-success">Your profile is updated.</div>';  
            }
                $userData = [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'street'    => $street,
                    'postal_code'    => $postal_code,
                    'city'    => $city,
                    'country'    => $country,
                    'phone'    => $phone,
                    'email'    => $email,
                    'password' => $password,
                    'id'       => $userId,
                ];
                //$result = updateUser($userData);
                $result = $userDbHandler->updateUser($userData);
                 
                if ($result) {
                    $msg = '<div class="alert alert-success">Your profile is updated.</div>';  
                } else {
                    $msg = '<div class="error_msg">Your profile is not updated.Please try again later!</div>';
                }

 
                // try {
                //   $query = "
                //   UPDATE users SET 
                //   first_name= :first_name, 
                //   last_name=:last_name, 
                //   street=:street, 
                //   postal_code=:postal_code, 
                //   city=:city,
                //   country=:country,
                //   phone=:phone,
                //   email=:email,
                //   password=:password 

                //   WHERE id = :id;
                // ";        
                //     $stmt = $dbconnect->prepare($query);
                //     $stmt->bindValue(':first_name', $first_name);
                //     $stmt->bindValue(':last_name', $last_name);
                //     $stmt->bindValue(':street', $street);
                //     $stmt->bindValue(':postal_code', $postal_code);
                //     $stmt->bindValue(':city', $city);
                //     $stmt->bindValue(':country', $country);
                //     $stmt->bindValue(':phone', $phone);
                //     $stmt->bindValue(':email', $email);
                //     $stmt->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
                //     $stmt->bindValue(':id', $userId);
                //     $user = $stmt->fetch();
                //     $stmt->execute();
                //     } catch (\PDOException $e) {
                //         throw new \PDOException($e->getMessage(), (int) $e->getCode());
                //     };
            }           
};
  

    // Delete user
if (isset($_POST['deleteUserBtn'])) {
    //deleteUserById ($_GET['id']);
    $userDbHandler->deleteUserById ($_GET['id']);
    redirect('../logout.php?deletedAccount'); 
  }

  // Fetch user by ID
if (isset($_SESSION['id'])) { 
    $userId= $_SESSION['id'];
    // $user= fetchUserById($userId);
    $user= $userDbHandler->fetchUserById($userId);

 
    //     try {
    //     $query = 
    //         "SELECT * FROM users 
    //           WHERE id = :id;
    //         ";
    //     // $stmt = $dbconnect->query($query);
    //      $stmt = $dbconnect->prepare($query);
    //       $stmt->bindValue(':id', $userId);
    //       $stmt->execute();
    //      $user = $stmt->fetch();
    //      } catch (\PDOException $e) {
    //         throw new \PDOException($e->getMessage(), (int) $e->getCode());
    //   }
    };
   /***this include layout/header.php have to come after CRUD***/   
include('layout/header.php');
?>


    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="../img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My profile</h2>
                        <div class="breadcrumb__option">
                            <a href="../index.php">Home</a>
                            <span>My profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- My profile Section Begin -->
        <div class="container">
            <div class="contact-form spad">
                    <div class="col-lg-8">                   
                        <h4>Please have a look if your information is correct!</h4>          
                    </div>
 
		<!-- MAIN -->
		<div>
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="img/user-medium.png" class="img-circle" >
										<h3 class="name"><?=htmlentities($user['first_name'])?> <?=htmlentities($user['last_name'])?></h3>
 									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div  >
									<div class="profile-info">
										<h4 class="heading">Basic Info</h4>
										<ul class="list-unstyled list-justify">
                                        <li> <?=$msg?> </li>
                                            <li>Birthdate <span>01 Jan, 2000</span></li>
                                            <li>Name <span><?=htmlentities($user['first_name'])?></span></li> 
                                            <li>Last name <span><?=htmlentities($user['last_name'])?></span></li>
                                            <li>Address <span><?=htmlentities($user['street'])?>, <?=htmlentities($user['postal_code'])?>, <?=htmlentities($user['city'])?>, <?=htmlentities($user['country'])?></span></li>
											<li>Mobile <span><?=htmlentities($user['phone'])?></span></li>
											<li>Email <span><?=htmlentities($user['email'])?></span></li>
											<li>Be member since <span><?=htmlentities($user['register_date'])?></span></li>
                                        </ul>
									</div>
		 
									<div class="profile-info">
                                        <h4 class="heading">About</h4>
										<p> I've been always thinking for sustainable environtment. 
                                        Good that I can help the planet reduce junk , while I choose shopping my grocery with The Green-Basket </p>
									</div>
									<div class="text-center">
                                         <!-- Delete button -->
                                      <!--   <button type="button" class="btn-danger"></buuton>-->
                                       <div class="text-center"> 
                                        <form  method="POST" action="#" >
                                        <input type="hidden" name="userId" value="<?=$user['id']?>">
                                        <input type="hidden" name="_method" value="DELETE"> 
                                        <!-- <button type="submit" class="btn-danger" onclick="if (!confirm('Do you want to delete your account?')) { return false }"><span>Delete</span></button> -->
                                        <input onclick="return myConfirm();" type="submit" name="deleteUserBtn" class="btn btn-danger" value="Delete">

                                        <!-- <input type="submit" onclick="return myConfirm();" class="btn-danger" name="deleteUserBtn" value="Delete"> -->
                                        </form> 
                                      </div> 

                                        <!-- Button update modal -->
                                        <button type="button" class="btn btn-primary btn-sm" 
                                        data-toggle="modal" data-target="#exampleModal" 
                                        data-first_name="<?=htmlentities($user['first_name'])?>" 
                                        data-last_name="<?=htmlentities($user['last_name'])?>" 
                                        data-street="<?=htmlentities($user['street'])?>" 
                                        data-city="<?=htmlentities($user['city'])?>" 
                                        data-postal_code="<?=htmlentities($user['postal_code'])?>" 
                                        data-country="<?=htmlentities($user['country'])?>" 
                                        data-phone="<?=htmlentities($user['phone'])?>" 
                                        data-email="<?=htmlentities($user['email'])?>" 
                                        data-id="<?=htmlentities($user['id'])?>"
                                        > UPDATE 
                                        </button>   
                                    
                                    </div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<h4 class="heading">Oan's history purchase</h4>
 
 							<!-- RECENT PURCHASES -->
                             <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Recent Purchases</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Order No.</th>											 
												<th>Amount</th>
												<th>Date &amp; Time</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><a href="#">763648</a></td>
												<td>SEK122</td>
												<td>Oct 21, 2016</td>
												<td><span class="label label-success">COMPLETED</span></td>
											</tr>
											<tr>
												<td><a href="#">763649</a></td>
												<td>SEK62</td>
												<td>Oct 21, 2016</td>
												<td><span class="label label-warning">PENDING</span></td>
											</tr>
											<tr>
												<td><a href="#">763650</a></td>
												<td>SEK34</td>
												<td>Oct 18, 2016</td>
												<td><span class="label label-danger">FAILED</span></td>
											</tr>
											<tr>
												<td><a href="#">763651</a></td>
												<td>SEK186</td>
												<td>Oct 17, 2016</td>
												<td><span class="label label-success">SUCCESS</span></td>
											</tr>
											<tr>
												<td><a href="#">763652</a></td>
												<td>SEK362</td>
												<td>Oct 16, 2016</td>
												<td><span class="label label-success">SUCCESS</span></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
										<div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Purchases</a></div>
									</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		
	</div>
	 






 

 

    <!-- Start Modal to update the Blog -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">  
        <div class="modal-body">
            <div class="form-group">
                <label   class="col-form-label">First name:</label>
                <input type="text" class="form-control" name="first_name"  >                
                <input type="hidden"  name="id">
            </div>
            <div class="form-group">
                <label  class="col-form-label">Last name:</label>
                <input type="hidden" name="id">
                <input type="text" class="form-control" name="last_name"  >                
             </div>
            <div class="form-group">
                <label  class="col-form-label">Address:</label>
                <input type="text" class="form-control" name="street"   >
                <input type="hidden" name="id">
            </div>
            <div class="form-group">
                <label  class="col-form-label">City:</label>
                <input type="text" class="form-control" name="city"   >
                <input type="hidden" name="id">
            </div>
            <div class="form-group">
                <label  class="col-form-label">Postal Code:</label>
                <input type="text" class="form-control" name="postal_code"   >
                <input type="hidden" name="id">
            </div>
            <div class="form-group">
                <label  class="col-form-label">Country:</label>
                <input type="text" class="form-control" name="country"   >
                <input type="hidden" name="id">
            </div>
            <div class="form-group">
                <label  class="col-form-label">Phone:</label>
                <input type="text" class="form-control" name="phone"   >
                <input type="hidden" name="id">
            </div>
            <div class="form-group">
                <label  class="col-form-label">E-mail:</label>
                <input type="text" class="form-control" name="email"   >
                <input type="hidden" name="id">
            </div>
            <div class="form-group">
                <label  class="col-form-label">New password:</label>
                <input type="password" class="form-control" name="password"   >
                <input type="hidden" name="id">
            </div>
            <div class="form-group">
                <label  class="col-form-label">Confirm new password:</label>
                <input type="password" class="form-control" name="confirmPassword"   >
                <input type="hidden" name="id">
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-success" value="Save changes" name="updateBtn"> 
        </div> 
     </form>
    </div>
  </div>
</div>
 <!-- Footer -->
<?php include('layout/footer.php');?>