<?php

require_once 'common.php';

//Start the session and set current organisation and user.
initSession();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>

    <body>
        <main>
            <div class="container">
                <h1>Profile</h1>
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

                <form method="post" action="process.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="User Name" class="form-control" autocomplete="off">
                    </div>
                    <button type="submit" name="action" value="name" class="btn btn-primary">Save</button>
                    <hr>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" value="email@address.com" class="form-control" autocomplete="off">
                    </div>
                    <button type="submit" name="action" value="email" class="btn btn-primary">Save</button>
                    <hr>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" value="" class="form-control" autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <label for="password-repeat">Repeat Password</label>
                        <input type="password" name="password-repeat" value="" class="form-control" autocomplete="new-password">
                    </div>
                    <button type="submit" name="action" value="password" class="btn btn-primary">Save</button>
                </form>
            </div>
        </main>
    </body>
</html>