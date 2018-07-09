<?php
require 'config.php';


if(isset($_POST['register'])) {
    $errMsg = '';

    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password =$_POST['password'];
    //$password = md5($password);
    $username = $_POST['username'];
    $stmt='';
    if($fullname == '')
        $errMsg = 'Enter your first_name';
    if($username == '')
        $errMsg = 'Enter your last_name';
    if($password == '')
        $errMsg = 'Enter  your password';
    if($secretpin == '')
        $errMsg = 'Enter your username';

    if($errMsg == ''){
        try {

            $stmt->prepare("INSERT INTO users (first_name,last_name,username,password) VALUES (:first_name, :last_name,:username,:password)");
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);


            $stmt->execute();



            header('Location: register.php?action=joined');
            exit;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'Registration successfull.'

    header(location:index.php);

}
?><html>
<head><title>Register</title></head>
<style>
    html, body {
        margin: 1px;
        border: 0;
    }
</style>
<body>
<div align="center">
    <div style=" border: solid 1px #006D9C; " align="left">
        <?php
        if(isset($errMsg)){
            echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
        ?>
        <div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b>Register</b></div>
        <div style="margin: 15px">
            <form action="" method="post">
                <input type="text" name="first_name" placeholder="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name'] ?>" autocomplete="off" class="box"/><br /><br />
                <input type="text" name="last_name" placeholder="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name'] ?>" autocomplete="off" class="box"/><br /><br />
                <input type="text" name="username" placeholder="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" class="box" /><br/><br />
                <input type="text" name="password" placeholder="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" class="box"/><br /><br />
                <input type="submit" name='register' value="Register" class='submit'/><br />
            </form>
        </div>
    </div>
</div>
</body>
</html>