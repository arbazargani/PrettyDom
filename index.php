<?php
    require_once('helpers.php');
    $destination = 'https://www.rokna.net/%D8%A8%D8%AE%D8%B4-%D8%A7%D8%AC%D8%AA%D9%85%D8%A7%D8%B9%DB%8C-95/628913-%D9%88%D8%A7%D8%AD%D8%AF%D9%87%D8%A7%DB%8C-%D8%AA%D9%88%D9%84%DB%8C%D8%AF%DB%8C-%D8%AA%D9%87%D8%B1%D8%A7%D9%86-%D9%85%D8%B4%D9%85%D9%88%D9%84-%D9%85%D8%AD%D8%AF%D9%88%D8%AF%DB%8C%D8%AA-%D9%87%D8%A7-%D9%86%DB%8C%D8%B3%D8%AA';
    $source = file_get_contents($destination);
    file_put_contents('src/destination.txt', $source);
    $source = file_get_contents('src/destination.txt');

    if(preg_match("/<title>(.+)<\/title>/i", $source, $matches)) {
        $title = $matches[1];
    } else {
        print "The page doesn't have a title tag.";
    }

    if(preg_match_all('/<img src="([^"]*)"/i' , $source, $matches)) {
        $cover = $matches[1][1];
        copy ($cover, 'src/cover.jpg');
        $temp_image = imagecreatefromjpeg('src/cover.jpg');
        CropByCords($temp_image, 480, 240);
    } else {
        print "The page doesn't have a image tag.";
    }

    if(preg_match_all('/<p>(.+)<\/p>/i', $source, $matches)) {
        $lead = trim(strip_tags($matches[0][0]));
    } else {
        print "The page doesn't have a image tag.";
    }



