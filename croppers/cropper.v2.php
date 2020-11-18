<?php
    $cover = $matches[1][1];
    copy ($cover, 'src/cover.jpg');

    $temp_image = imagecreatefromjpeg('src/cover.jpg');

    $image_info = getimagesize('src/cover.jpg');
    $image_width = $image_info[0];
    $image_height = $image_info[1];

    $final_image = imagecrop($temp_image, ['x' => $image_width/2, 'y' => $image_height/4, 'width' => 480, 'height' => 240]);
    if ($final_image !== FALSE) {
        imagepng($final_image, 'src/cover-240-480.jpg');
        imagedestroy($final_image);
    }
    imagedestroy($temp_image);