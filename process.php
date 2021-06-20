<?php

require_once 'Models\User.php';
require_once 'Models\Activity.php';
require_once 'common.php';

use Models\Activity;
use Models\User;

//Load the organisation ID and user ID from the session data.
loadSession($org_id, $user_id);

//Create a new user object.
$user = new User($org_id, $user_id);

//Nothing was posted, the script does nothing else.
if (empty($_POST)) {
    exit();
}

switch (getInput('action')) {
    case 'name':
        //Get the names from the POST data.
        $names = trim(getInput('name'));

        //Check for only characters, spaces or dots.
        if (!preg_match('/^[\p{L}. ]+$/u', $names)) {
            $error[] = 'Your name must only contain characters, spaces or dots.';
        }

        //Ensure that there are only 2 names, error if less, truncate if more.
        $names = explode(' ', $names, 2);
        if (count($names) < 2) {
            $error[] = 'Please provide a first and last name.';
        }

        //Don't update the database if there are any errors.
        if (!empty($error)) {
            break;
        }

        //Attempt to update the names, true on success, false on failure.
        if ($user->updateNames($names)) {
            $activity = new Activity($org_id);
            $activity->insert($user_id, Activity::USER_ACTION, 'Updated Names');

            $success[] = 'Your profile was successfully updated';
        } else {
            $error[] = 'It was not possible to update your profile at present time.';
        }

        break;

    case 'email':
        $email = trim(getInput('email'));

        //These errors are not combined in script, use elseif and break to avoid database processing.
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = 'Please provide a valid email!';
            break;
        } elseif ($user->checkEmailExists($email)) {
            $error[] = 'Email already in use. Please enter a different email and try again.';
            break;
        }

        //Attempt to update the email address, true on success, false on failure.
        if ($user->updateEmail($email)) {
            $activity = new Activity($org_id);
            $activity->insert($user_id, Activity::USER_ACTION, 'Updated email address');

            $success[] = 'Your profile was successfully updated';
        } else {
            $error[] = 'It was not possible to update your profile at present time.';
        }

        break;

    case 'password':
        $password = trim(getInput('password'));
        $passwordRepeat = trim(getInput('password-repeat'));

        //Passwords must match.
        if ($password !== $passwordRepeat) {
            $error[] = "Provided passwords do not match.";
            break;
        }

        //Attempt to update the password, true on success, false on failure.
        if ($user->updatePassword($password)) {
            $activity = new Activity($org_id);
            $activity->insert($user_id, Activity::USER_ACTION, 'Updated password');

            $success[] = 'Your profile was successfully updated';
        } else {
            $error[] = 'It was not possible to update your profile at present time.';
        }
        break;

    default:
        //Script does nothing else after this point.
        exit();
}

//Check errors first.
if (!empty($error)) {
    setFlash('error', implode('<br>', $error));
    redirect('profile');
    exit();
}

//If something was updated, update the session and view vars.
$action = getInput('action');
if (!empty($success) && $action !== null) {
    $message = implode('<br>', $success);
    switch ($action) {
        case 'name':
            $_SESSION['forename'] = $names[0];
            $_SESSION['surname'] = $names[1];
            $_SESSION['realname'] = $names[0] . ' ' . $names[1];
            setFlash('success', $message);
            redirect('profile');
            break;

        case 'email':
            $_SESSION['email'] = $email;
            setFlash('success', $message);
            redirect('profile');
            break;

        default:
            setFlash('success', $message);
            redirect('index');
            break;
    }
}