<?php
$signinsubmit=filter_input(INPUT_POST,'btnSignIn');
if($signinsubmit){
    $username=filter_input(INPUT_POST,'txtUsername');
    $password=filter_input(INPUT_POST,'txtPassword');
    $result=login($username,$password);
    if($result!=null&&$result['Username']==$username){
        $_SESSION['my_session']=true;
        $_SESSION["session_user"]=$result['Nama'];
        $_SESSION["session_id"]=$result['NIK'];
        $_SESSION["session_role"]=$result['Role'];
        header("location:index.php");
    }else{
        echo '<div class="bg-error">Invalid username or password</div>';

    }
}
//<h1 class="h3 mb-3 font-weight-normal" align="center">Login Form</h1>
?>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: url("https://www.vippng.com/png/detail/361-3612977_website-background-png-tech-background-image-for-website.png");
            height: 100vh;
            background-repeat: no-repeat;
            background-position: center;
            background-color: snow;
        }
        h1{
            font-family: "Eras Bold ITC";
        }
        .login {
            width: 360px;
            margin: 50px auto;
            font-family: Cambria, "Hoefler Text","Liberation Serif",Times,"Times New Roman, serif";
            border-radius: 10px;
            border: 2px solid #ccc;
            padding: 10px 40px 25px;
            margin-top: 70px;
            box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.5);

        }
        input[type=text], input[type=password]{
            width: 99%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            padding-left: 5px;
            font-size: 16px;
            font-family: Cambria, "Hoefler Text","Liberation Serif",Times,"Times New Roman, serif";
        }
        input[type=submit]{
            width:100%;
            background-color: darkseagreen;
            color: #ffffff;
            border:2px solid darkseagreen;
            padding:10px;
            font-size: 20px;
            cursor:pointer;
            border-radius:5px;
            margin-bottom: 15px;
        }
    </style>

<body>
<br/>

<div class="login">

    <form action="" method="post" class="form-sign-in" style="text-align:center;">
        <input type="text" id="txtUsername" name="txtUsername"  placeholder="Username" class="form-control" required>
        <input type="password" id="txtPassword" name="txtPassword"  placeholder="Password" class="form-control" required>
        <br/>
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Login" name="btnSignIn">
    </form>
</div>
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLJ_mwVvtrpUEF2rsGuAv5w2ZpVZOUSbDuBg&usqp=CAU">

</body>
