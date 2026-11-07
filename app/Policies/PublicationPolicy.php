<?php

namespace App\Policies;

use App\Models\Publication;
use App\Models\User;

class PublicationPolicy
{
    public function update(User $user, Publication $publication): bool
    {
        return $user->id === $publication->user_id || $user->role === 'admin';
    }

    public function delete(User $user, Publication $publication): bool
    {
        return $this->update($user, $publication);
    }
}