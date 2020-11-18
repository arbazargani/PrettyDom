<?php
    $destination = 'https://www.rokna.net/%D8%A8%D8%AE%D8%B4-%D8%A8%D9%88%D8%B1%D8%B3-176/628618-%D8%A7%D8%B1%D8%B2%D8%B4-%D8%B3%D9%87%D8%A7%D9%85-%D8%B9%D8%AF%D8%A7%D9%84%D8%AA-%D8%A7%D9%85%D8%B1%D9%88%D8%B2-%D8%B3%D9%87-%D8%B4%D9%86%D8%A8%D9%87-%D8%A2%D8%A8%D8%A7%D9%86';
    $source = file_get_contents($destination);
    file_put_contents('destination.txt', $source);
    $source = file_get_contents('destination.txt');

    if(preg_match("/<title>(.+)<\/title>/i", $source, $matches)) {
        $title = $matches[1];
    } else {
        print "The page doesn't have a title tag.";
    }

    if(preg_match_all('/<img src="([^"]*)"/i' , $source, $matches)) {
        $cover = $matches[1][1];
        copy ($cover, 'cover.jpg');

        $temp_image = imagecreatefromjpeg('cover.jpg');
        $final_image = imagecrop($temp_image, ['x' => 0, 'y' => 0, 'width' => 480, 'height' => 240]);
        if ($final_image !== FALSE) {
            imagepng($final_image, 'cover-240-480.jpg');
            imagedestroy($final_image);
        }
        imagedestroy($temp_image);
    } else {
        print "The page doesn't have a image tag.";
    }

    if(preg_match_all('/<p>(.+)<\/p>/i', $source, $matches)) {
        $lead = trim(strip_tags($matches[0][0]));
    } else {
        print "The page doesn't have a image tag.";
    }



