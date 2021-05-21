<?php
    //Session start
    session_start();

    //Connection to database
    require 'connection.php';
    $msg='';
    //Form on submission
    if(isset($_POST['reader']))
    {
        if($_POST['password'] == $_POST['cpassword'])
        {
           
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $dbpassword = password_hash($password, PASSWORD_BCRYPT);
            $result = $con->query("INSERT INTO login (name,email,password,role) VALUES ('$name','$email','$dbpassword','reader')");
            if(!$result) die($con->error);
            else{
                echo 'Form submitted';
                echo '<script>window.location.href="index.php";</script>';
            }
        }
        else
        {
            echo 'Invalid Values';
            echo '<script>window.location.href="index.php";</script>';
        }
    }
    else if (isset ($_POST['admin'])) {
     if($_POST['password'] == $_POST['cpassword'])
        {
           
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $dbpassword = password_hash($password, PASSWORD_BCRYPT);
            $result = $con->query("INSERT INTO login (name,email,password,role) VALUES ('$name','$email','$dbpassword','admin')");
            if(!$result) die($con->error);
            else{
                echo 'Form submitted';
                echo '<script>window.location.href="index.php";</script>';
            }
        }
        else
        {
           echo 'Invalid Values';
           echo '<script>window.location.href="index.php";</script>';
        }
}
   
    //Form on login
    if(isset($_POST['u_submit']))
    {
    

        $umail = $_POST['u_email'];
        $upass = $_POST['u_password'];

        $result= $con->query("SELECT id,name,password,role FROM login WHERE email='$umail'");
        if($result->num_rows > 0)
        {
            $data = $result->fetch_array();
           if(password_verify($upass, $data['password']))
            {
                $_SESSION['login_val'] = $data['name'];
                $_SESSION['aid']=$data['id'];
                $_SESSION['role']=$data['role'];
                $_SESSION['last_login_timestamp'] = time();
                if(isset($_SESSION['id_no']))
                {
                    echo "<script>window.location.href = 'index.php'</script>";
                   echo 'log in successful';
                }
                else{
                echo "<script>window.location.href = 'index.php'</script>";
                echo 'log in successful';
                }
            
            }
                        else
            {
                echo 'Password invalid';
                echo '<script>window.location.href="index.php";</script>';
            }
        }
        
        else
        {
            echo 'Email invalid';
        }
        
}
?>
