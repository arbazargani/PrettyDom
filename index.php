<?php
    require_once('helpers.php');

    $destination = 'https://www.rokna.net/%D8%A8%D8%AE%D8%B4-%D8%B3%DB%8C%D8%A7%D8%B3%DB%8C-74/628937-%D8%B1%D9%88%D8%AD%D8%A7%D9%86%DB%8C-%D9%81%D8%B9%D9%84%D8%A7-%D8%A8%D9%87-%D8%AF%D9%86%D8%A8%D8%A7%D9%84-%D8%AA%D8%B3%D9%88%DB%8C%D9%87-%D8%AD%D8%B3%D8%A7%D8%A8-%D8%B3%DB%8C%D8%A7%D8%B3%DB%8C-%D8%AC%D9%86%D8%A7%D8%AD%DB%8C-%D9%86%D8%A8%D8%A7%D8%B4%DB%8C%D8%AF-%D8%B4%D9%87%D8%B1%D9%87%D8%A7%DB%8C%DB%8C-%DA%A9%D9%87-%D9%88%D8%B6%D8%B9%DB%8C%D8%AA-%D9%82%D8%B1%D9%85%D8%B2-%D8%AF%D8%A7%D8%B1%D9%86%D8%AF-%D8%AA%D8%B9%D8%B7%DB%8C%D9%84-%D9%85%DB%8C-%D8%B4%D9%88%D9%86%D8%AF';
    $source = file_get_contents($destination);
    file_put_contents('src/destination.txt', $source);
    $source = file_get_contents('src/destination.txt');

    if(preg_match("/<title>(.+)<\/title>/i", $source, $matches)) {
        $title = $matches[1];
        $title = SetMaxLength($lead, 70, false);
    } else {
        print "The page doesn't have a title tag.";
        die();
    }

    if(preg_match_all('/<img src="([^"]*)"/i' , $source, $matches)) {
        $cover = $matches[1][1];
        copy ($cover, 'src/cover.jpg');
        $temp_image = imagecreatefromjpeg('src/cover.jpg');
        CentrizedCrop($temp_image, 480, 240);
    } else {
        print "The page doesn't have a image tag.";
        die();
    }

    if(preg_match_all('/<p>(.+)<\/p>/i', $source, $matches)) {
        $lead = trim(strip_tags($matches[0][0]));
        $lead = SetMaxLength($lead, 150, true);
    } else {
        print "The page doesn't have laed.";
        die();
    }



