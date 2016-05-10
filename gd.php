<?php 
session_start();

header('content-type:image/png');

$img = imagecreatetruecolor(100, 30);
$bgcolor = imagecolorallocate($img, 225, 225, 225);
imagefill($img, 0, 0, $bgcolor);

// 存储验证字符
$yzm = '';

// 图片上添加4个随机数
for ($i=0; $i <4 ; $i++) { 
    $fontsize = 8;
    $fontcolor = imagecolorallocate($img, mt_rand(0,120), mt_rand(0,120), mt_rand(0,120));

    // $content = mt_rand(0,9);
    $data = "abcdefghijklmsnopqrstuvwxy23456789";
    $content = substr($data, mt_rand(0,strlen($data)-1),1);

    $yzm .= $content; 

    $x = $i*100/4+mt_rand(5,10);
    $y = mt_rand(5,10);

    imagestring($img, $fontsize, $x, $y, $content, $fontcolor);

}

// session 存储
$_SESSION['yzm'] = $yzm;

// 图片上添加干扰点和线
for ($i=0; $i < 200; $i++) { 
    $pointcolor = imagecolorallocate($img, mt_rand(50,200), mt_rand(50,200), mt_rand(50,200));
    imagesetpixel($img, mt_rand(1,99), mt_rand(1,29), $pointcolor);
}

for ($i=0; $i < 3; $i++) { 
    $linecolor = imagecolorallocate($img, mt_rand(80,200), mt_rand(80,200), mt_rand(80,200));
    imageline($img, mt_rand(1,99), mt_rand(1,29),mt_rand(1,99), mt_rand(1,29), $linecolor);
}

imagepng($img);

// end
imagedestroy($img);