<?php
    if (empty($_POST['url'])) {
        $has_error = 1;
        $error_message = 'url is not set or empty.';
    } elseif (strpos($_POST['url'], 'https://www.rokna.net/') === false) {
        $has_error = 1;
        $error_message = 'url is not valid or in property.';
    } else {
        require_once('helpers.php');

        $destination = $_POST['url'];
        $source = file_get_contents($destination);
        file_put_contents('src/destination.txt', $source);
        $source = file_get_contents('src/destination.txt');

        if(preg_match("/<title>(.+)<\/title>/i", $source, $matches)) {
            $title = $matches[1];
            $title = SetMaxLength($title, 70, false);
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

        $has_not_error = 1;
        $success_message = 'url pushed done.';
    }
?>