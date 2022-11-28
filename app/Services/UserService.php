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
        return Connections::create(['sender_id' => $userID,'reciever_id' => $suggestionID,'status' => 'pending']);
    }

    public function acceptConnection($userID,$suggestionID){
        return Connections::where('id',$suggestionID)->update(['status' =>'accepted']);
    }

    public function sentConnection(){
        return User::with('sentRequests')->find(auth()->user()->id);
    }

    public function recievedConnections(){
        return Connections::with('sender:id,name,email')->where('reciever_id',auth()->user()->id)->where('status','pending')->get();
    }

    public function deleteConnection($sendeID,$recieverId){
        return Connections::where('sender_id',$sendeID)->where('reciever_id',$recieverId)->delete();
    }

    public function getacceptedConnection(){
        $acceptedConnections = Connections::with('sender:id,name,email','reciever:id,name,email')->where('status','accepted')
        ->where(function ($query) {
            $query->where('reciever_id',auth()->user()->id)
                  ->orWhere('sender_id',auth()->user()->id);
        })->get();
        return $acceptedConnections;
    }



}