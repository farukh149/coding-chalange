<?php

namespace App\Services;

use App\Models\User;
use App\Models\Connections;

class UserService{

    public function getAllUsers(){
        $currentUser = auth()->user()->id; 
        $ids = [$currentUser];
        $unique = Connections::orWhere('sender_id',$currentUser)->orWhere('reciever_id',$currentUser)->get();
        foreach($unique as $user){
            $ids[] = $user->reciever_id;
            $ids[] = $user->sender_id;
        }
        $users  = User::whereNotIn('id', array_unique($ids))->get();
        return $users;
    }

    public function createConnection($userID,$suggestionID){
        return Connections::create(['sender_id' => $userID,'reciever_id' => $suggestionID]);
    }

    public function sentConnection(){
        return User::with('sentRequests')->find(auth()->user()->id);
    }

    public function recievedConnections(){
        return User::with('recievedRequests')->find(auth()->user()->id);
    }

    public function deleteConnection($sendeID,$recieverId){
        return Connections::where('sender_id',$sendeID)->where('reciever_id',$recieverId)->delete();
    }



}