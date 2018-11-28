<?php
// The function will create the image.
create_image();
// print out the html code necessary to display the newly created image.
// We have added to the end of the image a "?" and a value -date("U")- which will allow us to avoid to show images
 // in the cache of the browse.
print "<img src=image.png?".date("U").">";
//Lektion 1
function create_image()
{
  // "@" is used before imagecreate() to avoid displaying errors (just in case).
  $im =@imagecreate(2000,2000) or die("Cannot Initialize new GD image stream");
  $background_color =imagecolorallocate($im, 255, 255, 0); //yellow
//Lektion 2
 // imagecolorallocate($im, 255, 255, 0):
  $red= imagecolorallocate($im,255,0,0); //red
  $blue= imagecolorallocate($im,0,0,255); //blue
  // imageline ($im,  X1, Y1, X2, Y2, $color);
  imageline($im, 50, 1950, 1950, 50, $red);
  imageline($im, 50, 50, 1950, 1950,$blue);
//Lektion 3
  $cl1= imagecolorallocate($im, 120, 0, 120);
  $cl2= imagecolorallocate($im, 100, 100, 0);
  // imagerectangle ($im,  X1, Y1, X2, Y2, $color);
  imagerectangle($im, 500, 50, 1400, 500, $cl1);
  // imagefilledectangle ($im,  X1, Y1, X2, Y2, $color);
  imagefilledrectangle($im, 500, 50, 1400, 400, $cl2);
//Lektion 4
  $green= imagecolorallocate($im, 0, 255, 0);
  $cl3= imagecolorallocate($im, 0, 255, 255);
  // imageellipse($im, X, Y, width, height, $color);
  imageellipse($im, 800, 200, 200, 200, $green);
  // imagefilledellipse($im, X, Y, width, height,$color);
  imagefilledellipse($im, 1100, 200, 200, 200, $cl3);
//Lektion 5
 $cl4= imagecolorallocate($im, 255, 191, 0);
 $cl5= imagecolorallocate($im, 255, 77, 255);
  // imagearc ( $im, X, Y, width, height, arc start, arc end, $color)
 imagearc($im, 0, 0, 400, 600, 0, 90, $cl4);
 imagearc($im, 950, 0, 200, 200, 0, 180, $cl4);
 imagearc($im, 500, 500, 400, 600, 0, 270, $cl4);
 imagearc($im, 1700, 500, 100, 100, 0, 360, $cl4);
 // imagefilledarc ( $im, X, Y, width, height, arc start, arc end, $color, flag )
 imagefilledarc($im, 990, 970, 400, 600, 220, 320, $cl5, IMG_ARC_PIE);
 imagefilledarc($im, 0, 1500, 400, 600, 90, 180, $cl5, IMG_ARC_PIE);
 imagefilledarc($im, 2000, 1500, 400, 600, 90, 270, $cl5, IMG_ARC_PIE);
imagefilledarc($im, 20, 15, 400, 600, 90, 270, $cl5, IMG_ARC_PIE);
 // imagefilledarc($im, 1700, 1000, 600, 100, 0, 360, $cl5, IMG_ARC_PIE);
 //Lektion 6
 $cl6= imagecolorallocate($im, 179, 179, 255);
 $cl7= imagecolorallocate($im, 198, 255, 179);
 // imagestring ($im, size, X,  Y, text, $red);
 imagestring($im, 20, 50, 500, "Hello !", $cl6);
 imagestring($im, 30, 50, 900, "Bonjour!", $cl6);
 imagestring($im, 40, 50, 1300,"LOL!", $cl6);
 imagestring($im, 50, 50, 1700,"Rer!", $cl6);
// imagestringup ( resource $image , int $font , int $x , int $y , string $string , int $color )
 imagestringup($im, 50, 1400, 1500,"HELLO!", $cl7);
 // imagepng ( resource $image [, string $filename [, int $quality [, int $filters ]]] )
  imagepng($im,"image.png");
  // imagedestroy() frees any memory associated with image image.
  //lässt frei
  imagedestroy($im);
} ?>
