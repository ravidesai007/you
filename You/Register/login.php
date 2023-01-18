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
    <div class="title">Login</div>
    <div class="content">
      <form action="/you/Register/login.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">username</span>
            <input type="text" placeholder="Enter your username" name="user_log" id="user_log" required>
          </div>  
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="pass_log" id="pass_log" required>
          </div>
        </div>
       
        <div class="button">
          <input type="submit" value="login">
        </div>
      </form>
    </div>
  </div>
  <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "you";
      $conn = mysqli_connect($servername, $username, $password, $database);
      
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      if (isset($_POST['user_log']) && isset($_POST['pass_log'])) 
      {
        function validate($data){   
           $data = trim($data);   
           $data = stripslashes($data);    
           $data = htmlspecialchars($data);
           return $data;   
        }    
        $user_log = validate($_POST['user_log']);  
        $pass_log = validate($_POST['pass_log']);  
        if (empty($user_log)) { 
            header("Location: index.php?error=User Name is required");  
            exit();   
        }else if(empty($pass_log)){
    
            header("Location: index.php?error=Password is required");
    
            exit();
    
        }else{
    
            $sql = "SELECT * FROM register WHERE user='$user_log' AND pass='$pass_log'";
    
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) === 1) {
    
                $row = mysqli_fetch_assoc($result);
    
                if ($row['user'] === $user_log && $row['pass'] === $pass_log) {
    
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong> LOGGED IN </strong></div>';
                    exit();
                }
                
            }
        }
    }
?>
</body>
</html>