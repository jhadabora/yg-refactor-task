<?php

require_once 'common.php';

//Start the session and set current organisation and user.
initSession();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <main>
            <div class="container">
                <h1>Index</h1>
                <?php if ($flash = popFlash('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= $flash ?>
                    </div>
                <?php endif ?>
                <?php if ($flash = popFlash('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $flash ?>
                    </div>
                <?php endif ?>
                <p>
                    <a href="profile.php">Edit Profile</a>
                </p>
            </div>
        </main>
    </body>
</html>