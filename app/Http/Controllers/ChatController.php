<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  
use App\Events\MessageSent; 
use App\Models\Conversation;
use App\Models\User;
use App\Models\Message;

class ChatController extends Controller
{
    
    public function startOrShowChat(Request $request, User $user, Message $message)
    {
        $commonConversation = $this->getCommonConversation($user);

        if ($commonConversation) {
            return redirect()->route('chat.show', ['conversation' => $commonConversation->id])->with(['messages' => $message->getMessage()]);
        } else {
           
            $conversation = new Conversation();
            $conversation->save();

            auth()->user()->conversations()->attach($conversation->id);
            $user->conversations()->attach($conversation->id);

            return redirect()->route('chat.show', ['conversation' => $conversation->id]);
        }
    }

    public function showChat(Conversation $conversation, Message $message)
    {
        return view('chat.show', ['conversation' => $conversation])->with(['messages' => $message->getMessage()]);;
    }

    private function getCommonConversation(User $user)
    {
        $loggedInUser = auth()->user();

        $commonConversations = $loggedInUser->conversations()->whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->get();

        return $commonConversations->first();
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendMessage(Request $request, Conversation $conversation)
    {
        $message = new Message();
        $message->user_id = auth()->user()->id;
        $message->conversation_id = $conversation->id;
        $message->content = $request->input('message');
        $message->save();
    
       
        broadcast(new MessageSent($message));
    
        return response()->json(['status' => 'Message Sent!', 'message' => $message]);
    }

}