<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Function to store a new comment
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        // Create a new comment with the authenticated user's ID and the comment text from the request
        Comment::create([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Comment posted successfully.');
    }

    // Function to show the edit form for a specific comment
    public function edit(Comment $comment)
    {
        // Authorize the user to ensure they have permission to update the comment
        $this->authorize('update', $comment);

        // Return the edit view with the comment data
        return view('comments.edit', compact('comment'));
    }

    // Function to update a specific comment
    public function update(Request $request, Comment $comment)
    {
        // Authorize the user to ensure they have permission to update the comment
        $this->authorize('update', $comment);

        // Validate the incoming request data
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        // Update the comment with the new comment text from the request
        $comment->update([
            'comment' => $request->comment,
        ]);

        // Redirect to the home page with a success message
        return redirect('/')->with('success', 'Comment updated successfully.');
    }

    // Function to delete a specific comment
    public function destroy(Comment $comment)
    {
        // Authorize the user to ensure they have permission to delete the comment
        $this->authorize('delete', $comment);

        // Delete the comment
        $comment->delete();

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
