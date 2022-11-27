<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\UserService;

class UserConnectionsController extends Controller
{

    protected $userservice;

     public function __construct(UserService $userservice){
            $this->userservice = $userservice;
     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        if($request->type == 'sentConnections'){
            $type = 'sent';
            $sentConnection = $this->userservice->sentConnection();
            return view('blades.request',compact('sentConnection','type'))->render();
        }
        else if($request->type == 'recievedConnections'){
            $type = 'recieved';
            $recievedConnections = $this->userservice->recievedConnections();
            return view('blades.request',compact('recievedConnections','type'))->render();
        }
        else {
            $users = $this->userservice->getAllUsers();
            return view('home',compact('users'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->userservice->createConnection($request->userId,$request->suggestionId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->userservice->deleteConnection($request->userId,$request->requestId);
    }
}
