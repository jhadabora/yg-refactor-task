<?php

/**
 * Initialises a test session, logging in as user ID 2 on organisation ID 1.
 *
 * @return void
 */
function initSession(): void
{
    session_start();
    $_SESSION['org_id'] = 1;
    $_SESSION['user_id'] = 2;
}

/**
 * Loads the current organisation and user from the session.
 *
 * @param int|null $org_id Output variable that will be set to the organisation ID from the session.
 * @param int|null $user_id Output variable that will be set to the user ID from the session.
 *
 * @return void
 */
function loadSession(&$org_id = null, &$user_id = null)
{
    session_start();
    $org_id = $_SESSION['org_id'];
    $user_id = $_SESSION['user_id'];
}

/**
 * Retrieves a field from POST data, or null if there's no field with the given name.
 *
 * @param string $field POST field to retrieve data from.
 * @return mixed|null
 */
function getInput(string $field)
{
    return $_POST[$field] ?? null;
}

/**
 * Redirects the viewer to the specified page.
 *
 * @param string $page The PHP page to be redirected to, without the extension.
 */
function redirect(string $page): void
{
    $project = dirname($_SERVER['SCRIPT_NAME']);
    header("Location: $project" . DIRECTORY_SEPARATOR . "$page.php");
}

/**
 * Sets a flash that can later be popped to remove from the session.
 *
 * @param string $type Key to save this flash in.
 * @param string $message Message that the flash will contain.
 */
function setFlash(string $type, string $message): void
{
    $_SESSION["flash-$type"] = $message;
}

/**
 * Gets and removes a flash saved to the session.
 *
 * @param string $type Key that contains the desired flash.
 * @return string|null Message that the flash contained, or null if no flash was saved here.
 */
function popFlash(string $type): ?string
{
    if (!isset($_SESSION["flash-$type"])) {
        return null;
    }
    $message = $_SESSION["flash-$type"];
    unset($_SESSION["flash-$type"]);
    return $message;
}