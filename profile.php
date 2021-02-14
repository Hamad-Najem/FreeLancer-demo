<?php
include('header.php');
include('config.php');
if(isset($_POST['submit']))
{
    $usName = $_POST['username'];
    $usPass = $_POST['password'];
    $rpass = $_POST['rpassword'];
    $email = $_POST['email'];
    $lang = $_POST['lang'];
    $userRole = $_POST['userRole'];


    $errors = array();

    if(empty($usName))
    {
        $errors[] = "username field is required.";
    }
    
    if(empty($usPass))
    {
        $errors[] = "password field is required."; 
    }
    if((strstr( $usPass, '*' ) || strstr( $usPass, '$' ) || strstr( $usPass, '&' ) )  != true)
    {
        $errors[] = "please use any special charater ex: *-$-&  in your password";
    }

    if($usPass != $rpass)
    {
        $errors[] = 'password and confirm does not match';
    }


for($i=0 ; $i < count($errors) ; $i++)
{
    echo "<li>" . $errors[$i] . "</li>";
}

if ($userRole == 1)
{
    $addFreelancer = "
    INSERT INTO `freelancers`(`id`, `user_name`, `password`, `email`, `lang`)
    VALUES (NULL,'$usName','$usPass','$email','$lang')";
    mysqli_query($connection,$addFreelancer);
}
else{
    $addUser = "
    INSERT INTO `users`(`id`, `user_name`, `password`, `email`) 
    VALUES (NULL,'$usName','$usPass','$email')";
    mysqli_query($connection,$addUser);
    

}
}

?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.php">Start Bootstrap</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li> <?php include('search.php'); ?></li>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                         <li>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>


<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="" method="post">
    <div class="container">
      <h1 style="color:black">Sign Up</h1>
      <br>
      <input type="text" name="username" value = "<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" class="form-control" placeholder="UserName">
      <input type = "password" name="password"  class="form-control" placeholder="Password">
      <input type = "password" name="rpassword"  class="form-control" placeholder="Retype Password">
      <input type = "text" name ="email"  class="form-control" placeholder="Email">
      <input type = "text" name ="lang"  class="form-control" placeholder="language Or Framework">

      <select name="userRole" class="form-control">

    <option>Select User Type</option>
    <option value = "1">Freelancer</option>
    <option value = "2">User</option>
    </select>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <button type="submit" name="submit" class="signupbtn">Sign Up</button>

    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


                         </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Start Bootstrap</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Graphic Artist - Web Designer - Illustrator</p>
            </div>
        </header>


        <table id="users" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
        <th>Id</th>
        <th>Freelancer name</th>
        <th>Email</th>
        <th>Language or Framework</th>
        </tr>
    </thead>
    
<?php
//Search
require ('config.php');
if(isset($_GET['id'])){

    $id = $_GET['id'];
    
    $sql = "SELECT * FROM freelancers
     WHERE id = $id ";

     $result = mysqli_query($connection,$sql);

     if(mysqli_num_rows($result) > 0){
        while($users = mysqli_fetch_array($result)){ ?>
        <tbody>
        <tr>
            <td align='center'><?= $users[0] ?></td>
            <td align='center'><?= $users[1] ?></td>
            <td align='center'><?= $users[3] ?></td>
            <td align='center'><?= $users[4] ?></td>
         </tr>
         <?php
        } }else{ ?>
      <tr>
      <td align='center' ><?php echo "Not found" ;?></td>
      </tr>
      <?php
      
        }
        ?>
        <?php
            
        }
        
        ?>
        
 
        </tbody>
   </table>

<?php
include('footer.php');
?>