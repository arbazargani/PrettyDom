<?php
    $cover = $matches[1][1];
    copy ($cover, 'src/cover.jpg');

    $temp_image = imagecreatefromjpeg('src/cover.jpg');
    $final_image = imagecrop($temp_image, ['x' => 0, 'y' => 0, 'width' => 480, 'height' => 240]);
    if ($final_image !== FALSE) {
        imagepng($final_image, 'src/cover-240-480.jpg');
        imagedestroy($final_image);
    }
    imagedestroy($temp_image);