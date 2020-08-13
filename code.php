<?php
session_start();
getCode(4,50,20);

function getCode($num,$w,$h){
   header("Content-type: image/PNG");
   $code="";
   for($i=0;$i<$num;++$i)
   {
    	$code .= rand(0,9);
   }
  $_SESSION['code']=$code;

	$im = imagecreate($w, $h);
	$blue = imagecolorallocate($im, 200, 200, 255);
	$black = imagecolorallocate($im, 0, 0, 0);
	$bgcolor = imagecolorallocate($im, 100, 100, 100);
	$ablue = imagecolorallocate($im, 0, 0, 225);
	imagefill($im, 0, 0, $bgcolor);
	imagerectangle($im, 1, 1, $w-1, $h-1, $black);

	$style = array($blue,$blue,$blue,$blue,$blue,$black,$black,$black,$black,$black,$black,$black);
	imagesetstyle($im, $style);
	$y1 = rand(0, $h);
    $y2 = rand(0, $h);
    $y3 = rand(0, $h);
    $y4 = rand(0, $h);

    imageline($im, 0, $y1, $w, $y3, IMG_COLOR_STYLED);
    imageline($im, 0, $y2, $w, $y4, IMG_COLOR_STYLED);

    for ($i = 0; $i < 60; $i++) {
        imagesetpixel($im, rand(0, $w), rand(0, $h), $blue);
    }

    $x = rand(2, 6);
    for ($i = 0; $i < $num; $i++) {
        $y = rand(2, 6);
        imagestring($im, 5, $x, $y, substr($code, $i, 1), $blue);
        $x += rand(7, 12);
    }

	imagepng($im);
	imagedestroy($im);
}