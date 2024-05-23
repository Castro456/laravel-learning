<?php

namespace App\Policies;

use App\Models\TwitterCloneModel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TweetPolicy
{

    // php artisan make:policy TweetPolicy --model=TwitterCloneModel - command used for creating this policy
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TwitterCloneModel $twitterCloneModel): bool
    {
        return ($user->is_admin || $user->id === $twitterCloneModel->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TwitterCloneModel $twitterCloneModel): bool
    {
        return ($user->is_admin || $user->id === $twitterCloneModel->user_id);
    }
}
