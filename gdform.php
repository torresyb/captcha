<?php
    session_start();
    if (isset($_REQUEST['yzm'])) {
        if(strtolower($_REQUEST['yzm'])==$_SESSION['yzm']){
            echo '验证码输入正确';
        }else{
            echo '验证码输入失败';
        }
        unset($_SESSION['yzm']);
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>验证码校验</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="text" name="yzm" value="" placeholder="请输入验证码"> <img id="yzmimg" src="/phplearn/gd_china.php?r=<?php echo rand();?>" alt="">
        <a href="javascript:;" onclick="document.getElementById('yzmimg').src = '/phplearn/gd_china.php?r='+Math.random();">换一个</a>
        <input type="submit" value="提交">
    </form>

</body>
</html>