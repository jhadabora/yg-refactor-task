<?php

namespace Models;

/**
 * This is a stub file for the refactoring exercise
 * You can modify it as you see fit but the methods
 * are purely to provide a base level of functionality.
 *
 * @package Models
 */
class User
{

    public function __construct($org_id, $user_id)
    {
        // N/A
    }

    /**
     * Attempts to update the names of the user, returns true is successful.
     *
     * @param string[] $names
     * @return bool
     */
    public function updateNames(array $names): bool
    {
        return true;
    }

    /**
     * Checks if the given email address exists in the database.
     *
     * @param string $email
     * @return bool
     */
    public function checkEmailExists(string $email): bool
    {
        return false;
    }

    /**
     * Attempts to update the email address of the user, returns true is successful.
     *
     * @param string $email
     * @return bool
     */
    public function updateEmail(string $email): bool
    {
        return true;
    }

    /**
     * Attempts to update the password of the user, returns true is successful.
     *
     * @param string $email
     * @return bool
     */
    public function updatePassword(string $password): bool
    {
        return true;
    }

}
