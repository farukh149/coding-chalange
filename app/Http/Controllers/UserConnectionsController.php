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
        try { 
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
                else if($request->type == 'acceptedConnections'){
                    $type = 'acceptedConnections';
                    $acceptedConnections = $this->userservice->getacceptedConnection();
                    return view('blades.connection',compact('acceptedConnections','type'))->render();
                }
                else {
                    $users = $this->userservice->getAllUsers();
                    return view('home',compact('users'))->render();
                }
        } catch (\Exception $e) {
            return $e->getMessage();
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
        //try {
             if($request->mode == 'accepted'){
                 return $this->userservice->acceptConnection($request->userId,$request->requestId,$request->mode);
             }
             return $this->userservice->createConnection($request->userId,$request->suggestionId,$request->mode);
        // } catch (\Exception$e) {
        //     return $e->getMessage();
        // }     
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
        try {
             return $this->userservice->deleteConnection($request->userId,$request->requestId);
        } catch (\Exception$e) {
            return $e->getMessage();
        } 
    }
}
