<?php

namespace Models;

/**
 * This is a stub file for the refactoring exercise
 * You can modify it as you see fit but the methods
 * are purely to provide a base level of functionality.
 *
 * @package Models
 */
class Activity
{

    /**
     * @var int USER_ACTION Activity undertaken by the user.
     */
    public const USER_ACTION = 1;

    /**
     * Activity constructor.
     * @param int $org_id Organisation ID
     */
    public function __construct(int $org_id)
    {
        // N/A
    }

    /**
     * Record an activity and insert it into the database.
     *
     * @param int $user_id User ID
     * @param int $activity_id Activity ID
     * @param string $description Brief description of the activity.
     * @return void
     */
    public function insert(int $user_id, int $activity_id, string $description): void
    {
        return;
    }

}
