<?php
    function SetMaxLength($string, $max_length, $etc_dots = false) {
        return ($etc_dots) ? substr($string, 0, $max_length-4) . ' ...' : substr($string, 0, $max_length);
    }
    function CentrizedCrop($temp_image, $cropWidth = 480, $cropHeight = 240) {
        $width  = imagesx($temp_image);
        $height = imagesy($temp_image);
        $centreX = round($width / 2);
        $centreY = round($height / 2);

        $cropWidth  = $cropWidth;
        $cropHeight = $cropHeight;
        $cropWidthHalf  = round($cropWidth / 2); // could hard-code this but I'm keeping it flexible
        $cropHeightHalf = round($cropHeight / 2);

        $x1 = max(0, $centreX - $cropWidthHalf);
        $y1 = max(0, $centreY - $cropHeightHalf);

        $x2 = min($width, $centreX + $cropWidthHalf);
        $y2 = min($height, $centreY + $cropHeightHalf);

        $final_image = imagecrop($temp_image, ['x' => $x1, 'y' => $y1, 'width' => $x2, 'height' => $y2]);
        if ($final_image !== FALSE) {
            imagepng($final_image, 'src/cover-480-240.jpg');
            imagedestroy($final_image);
        }
        imagedestroy($temp_image);
    }