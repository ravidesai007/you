<!DOCTYPE html>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="/you/Register/index.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="name" id="name" required>
          </div>
          <div class="input-box">
            <span class="details">username</span>
            <input type="text" placeholder="Enter your username" name="user" id="user" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" name="email" id="email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="tel" placeholder="Enter your number" name="phone" id="phone" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="pass" id="pass" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="c_pass" id="c_pass" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" value="m" id="dot-1">
          <input type="radio" name="gender" value="f" id="dot-2">
          <input type="radio" name="gender" value="o" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $user = $_POST['user'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass = $_POST['pass'];
        $c_pass = $_POST['c_pass'];
        $gender = $_POST['gender'];
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "you";
      $conn = mysqli_connect($servername, $username, $password, $database);
      $s= "select * from register where user = '$user'";
      $result1 = mysqli_query($conn, $s);
      $num=mysqli_num_rows($result1);
      $p= "select * from register where phone = '$phone'";
      $result2 = mysqli_query($conn, $p);
      $num1=mysqli_num_rows($result2);
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      elseif($pass!=$c_pass){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Password dosent match </div>';
      }
      elseif($num == 1){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> USERNAME ALREADY TAKEN </div>';
      }
      elseif($num1 == 1){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> THIS NUMBER HAS ALREADY BEEN REGISTERED </div>';
      }
      else{ 
        $sql = "INSERT INTO `register` (`name`, `user`, `email`, `phone`, `pass`, `c_pass`, `gender`) VALUES ('$name', '$user', '$email', '$phone', '$pass', '$c_pass', '$gender')";
        $result = mysqli_query($conn, $sql);
       
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        
      }

    } 
?>
</body>
</html>