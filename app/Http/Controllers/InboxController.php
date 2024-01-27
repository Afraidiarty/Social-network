<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivateMessages;
use App\Models\Registr;
use Illuminate\Support\Facades\Response;

class InboxController extends Controller
{
    public function send(Request $request,$receiver_id){
        $user_info = $request->session()->get('user_info');
        
        $private_messages = new PrivateMessages();
        $receiver_info = Registr::find($receiver_id);

        $private_messages->sender_id = $user_info['id'];
        $private_messages->receiver_id = $receiver_id;
        $private_messages->receiver_name = $receiver_info['name'];
        $private_messages->receiver_id_image = $receiver_info['id_image'];
        $private_messages->message = $request->input('messagePrivate');
        
        $private_messages->save();

        return redirect()->route('inbox');
    }
    
    public function ShowAllMessages(Request $request){
        $user_info = $request->session()->get('user_info');
        
        $chats = PrivateMessages::select('sender_id', 'receiver_id')
        ->where('sender_id', $user_info['id'])
        ->orWhere('receiver_id', $user_info['id'])
        ->distinct()
        ->get();
        

        $users_show_messages = [];
        $last_messages = [];
        
        foreach ($chats as $chat) {
            $other_user_id = ($chat->sender_id == $user_info['id']) ? $chat->receiver_id : $chat->sender_id;
        
            $existing_user = array_filter($users_show_messages, function ($user) use ($other_user_id) {
                return $user->id == $other_user_id;
            });
        
            if (!empty($existing_user)) {
                continue;
            }
        
            // Получение другого пользователя
            $other_user = Registr::find($other_user_id);
        
            // Получение последнего сообщения в чате
            $last_message = PrivateMessages::whereIn('sender_id', [$user_info['id'], $other_user_id])
                ->whereIn('receiver_id', [$user_info['id'], $other_user_id])
                ->orderBy('created_at', 'desc')
                ->first();
        
            // Сохранение информации о другом пользователе и последнем сообщении
            $users_show_messages[] = $other_user;
            $last_messages[$other_user_id] = $last_message;
        }
        
        
        
        return view('inbox', ['users_show_messages' => $users_show_messages, 'last_messages' => $last_messages]);
    }

    public function getMessages(Request $request, $userId) {
        $user_info = $request->session()->get('user_info');
    
        $messages = PrivateMessages::select('sender_id', 'receiver_id', 'message', 'receiver_name', 'receiver_id_image')
            ->where(function ($query) use ($user_info, $userId) {
                $query->where('sender_id', $user_info['id'])
                    ->where('receiver_id', $userId);
            })
            ->orWhere(function ($query) use ($userId, $user_info) {
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $user_info['id']);
            })
            ->orderBy('created_at', 'asc') // Предполагается, что 'created_at' - это ваш столбец с временем
            ->get();
    
        $other_user = Registr::find($userId);
    
        return Response::json(['messages' => $messages, 'other_user' => $other_user]);
    }
    
    

}
