<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    // contact admin from user
    public function contactAdmin()
    {
        return view('user.contact.contactadmin');
    }

    // send message from user (post method)
    public function sendMessage(Request $request)
    {
        $this->messageValidationCheck($request);
        $mesgdata = $this->getMessageData($request);
        Contact::create($mesgdata);
        return redirect()->route('user#home')->with(['sendmessage' => 'Your message has been sent to admin successfully.']);
    }

    // show noti from admin panel
    public function ajaxshownoti()
    {

        $unreadMessages = Contact::where('status', 'unread')->get();
        $unreadMessageCount = $unreadMessages->count();

        return response()->json([
            'unreadMessageCount' => $unreadMessageCount,
            'unreadMessages' => $unreadMessages
        ]);

    }

    // view message inbox from admin
    public function contactInbox()
    {
        $mesgdata = Contact::select('contacts.*', 'users.name as username', 'users.email as useremail', 'users.phone as userphone', 'users.address as useraddress')
            ->leftJoin('users', 'users.id', 'contacts.user_id')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.contact_inbox.inbox', compact('mesgdata'));
    }

    // view message readmore from admin
    public function readmore($id)
    {
        $messages = Contact::select('contacts.*', 'users.name as username', 'users.email as useremail', 'users.phone as userphone', 'users.address as useraddress')
            ->leftJoin('users', 'users.id', 'contacts.user_id')
            ->where('contacts.id', $id)
            ->get();
        // dd($message->toArray());
        return view('admin.contact_inbox.message_detail', compact('messages'));
    }

    // change message status read and unread
    public function ajaxChangeStatus(Request $request)
    {
        // logger($request->all());
        Contact::where('id', $request->message_id)->update(['status' => $request->updatestatus]);
    }


    public function showNotifications()
    {
        // Retrieve the count of unread messages
        $unreadMessageCount = Contact::where('read', false)->count();

        // Retrieve the unread messages
        $unreadMessages = Contact::where('read', false)->get();

        return view('admin.layouts.master', compact('unreadMessageCount', 'unreadMessages'));
    }




    //--------------------- the following are private functions ------------------------
    private function messageValidationCheck($request)
    {
        Validator::make($request->all(), [
            'mesgsubject' => 'required',
            'usermesg' => 'required',
        ])->validate();
    }

    private function getMessageData($request)
    {
        return [
            'user_id' => $request->userId,
            'subject' => $request->mesgsubject,
            'message' => $request->usermesg
        ];
    }
}
