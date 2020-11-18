<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once('application_handler.php');
    }
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanjagh QuickPush</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .btn-text {
            border: none;
            background: none;
            color: darkgray;
            transition: 0.5s color;
        }
        .btn-text:hover {
            color: red;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-5">
                <?php if(isset($has_error) && $has_error): ?>
                <div class="alert alert-danger" role="alert">
                    <span><?php echo $error_message; ?></span>
                </div>
                <?php endif; ?>
                <?php if(isset($has_not_error) && $has_not_error): ?>
                <div class="alert alert-success" role="alert">
                    <span><?php echo $success_message; ?></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <form class="mt-5" method="POST">
                    <div class="form-group">
                        <label for="url">Destination URL</label>
                        <input type="text" class="form-control" name="url" id="url" aria-describedby="urlHelp" placeholder="https://www.rokna.net/fa/...">
                        <small id="urlHelp" class="form-text text-muted">The page you want to quick push.</small>
                    </div>
                    <div class="form-group">
                        <label for="src">Custom image Address</label>
                        <input type="password" name="src" id="src" class="form-control" id="exampleInputPassword1" placeholder="*/image.jpg">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="image_auto_crop" id="image_auto_crop" checked>
                        <label class="form-check-label" for="image_auto_crop">Image auto crop</label>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Handle job!</button>
                        <input type="reset" class="btn-text ml-3" value="reset">
                    </div>
                </form>
            </div>
            <div class="col-5">
            <img src="https://www.appice.io/wp-content/uploads/2020/05/people-get-chat-messages-notification-mobile-phone-people-turn-notification-social-media-up-date-can-use-landing-page-template-ui-web-homepage-poster-banner-flyer_78434-32.jpg" alt="push-notif">
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>