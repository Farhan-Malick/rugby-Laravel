<?php

namespace App\Http\Controllers;

use App\Mail\InvitationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailer;
use App\Models\SetPool;

class InviteController extends Controller
{
    public function showInviteForm($random_id)
    {
        // Find the pool based on the random_id
        $pool = SetPool::where('random_id', $random_id)->first();

        if (!$pool) {
            // Handle case where the pool with the given random_id does not exist
            abort(404); // For example, return a 404 error
        }

        return view('invite_friends', compact('pool'));
    }

    public function showInviteFriendsPage($random_id)
    {
        // Find the pool based on the random_id
        $pool = SetPool::where('random_id', $random_id)->first();

        if (!$pool) {
            // Handle case where the pool with the given random_id does not exist
            abort(404); // For example, return a 404 error
        }

        return view('invite_friends', compact('pool'));
    }

    public function sendInvitation(Request $request)
    {
        // Retrieve the email and pool_id from the request
        $email = $request->input('email');
        $pool_id = $request->input('pool_id');
        $pool_name = $request->input('pool_name');
        
        Mail::send('invitation_email', ['pool_id' => $pool_id, 'pool_name' => $pool_name], function($message) use ($email) {
            $message->to($email, 'Recipient Name')
                    ->subject('Subject of the email');
        });
    
        // return response()->json(['message' => 'Invitation email sent successfully'], 200);

        return redirect()->back()->with('success', 'Invitation email sent successfully');

    }
    
}
