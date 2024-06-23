<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    public function update(User $user, Comment $comment)
    {
        // Hanya pemilik komentar yang bisa mengedit
        return $user->id === $comment->user_id;
    }

    public function delete(User $user, Comment $comment)
    {
        // Admin bisa menghapus komentar siapa saja, pengguna biasa hanya bisa menghapus komentarnya sendiri
        return $user->is_admin || $user->id === $comment->user_id;
    }
}
