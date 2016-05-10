<?php 
session_start();

header('content-type:image/png');

$img = imagecreatetruecolor(200, 60);
$bgcolor = imagecolorallocate($img, 225, 225, 225);
imagefill($img, 0, 0, $bgcolor);

// 存储验证字符
$yzm = '';
// 字体
$fontface = 'Microsoft Yahei.ttf';

//字体数据库
$strdb = '托雷斯是好球员也是好男人马竞利物浦切尔西杰拉德兰帕德世界杯欧洲杯金童人生赢家';
$strdb_arr = str_split($strdb,3);

// 图片上添加4个随机数
for ($i=0; $i <4 ; $i++) { 

    $fontcolor = imagecolorallocate($img, mt_rand(0,120), mt_rand(0,120), mt_rand(0,120));

    $cn= $strdb_arr[mt_rand(0,count($strdb_arr)-1)];
    $yzm .= $cn;

    imagettftext($img, mt_rand(20,24), mt_rand(-60,60), (40*$i+20), mt_rand(30,35), $fontcolor, $fontface, $cn);

}

// session 存储
$_SESSION['yzm'] = $yzm;

// 图片上添加干扰点和线
for ($i=0; $i < 200; $i++) { 
    $pointcolor = imagecolorallocate($img, mt_rand(50,200), mt_rand(50,200), mt_rand(50,200));
    imagesetpixel($img, mt_rand(1,199), mt_rand(1,59), $pointcolor);
}

for ($i=0; $i < 3; $i++) { 
    $linecolor = imagecolorallocate($img, mt_rand(80,200), mt_rand(80,200), mt_rand(80,200));
    imageline($img, mt_rand(1,199), mt_rand(1,59),mt_rand(1,199), mt_rand(1,59), $linecolor);
}

imagepng($img);

// end
imagedestroy($img);