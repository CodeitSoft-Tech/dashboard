<?php
    
  include("includes/db_conn.php");

  
  $ErrorLogin = array();


 if(isset($_POST['login']))
 {
  $email    = $_POST['email'];
  $password_1 = $_POST['password_1'];

  if(empty($email) || empty($password_1))
  {
    if($email == "")
    {
      $ErrorLogin[] = "Email is required";
    }

    if($password_1 == "")
    {
      $ErrorLogin[] = "Password is required";
    }

  }

  else
  {
    $query ="SELECT * FROM `users` WHERE email = '$email'";
    $Result = $db->query($query);

    if($Result->num_rows == 1)
    {
      $password = md5($password_1);
      $MainSql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
      $MainResult = $db->query($MainSql);

      if($MainResult->num_rows == 1)
      {
        $value = $MainResult->fetch_assoc();

        $user_id = $value['user_id'];
        
        // set session
        $_SESSION['userId'] = $user_id;

        header('location:http://localhost:3000/comp_dash/index.php');

      } 

      else
      {
        $ErrorLogin[] = "Incorrect username/password combination";
      }

    }

    else
    {
      $ErrorLogin[] = "username does not exists";
    }

    
  }

  }


?>