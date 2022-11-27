@if($type == 'sent')
  @foreach($sentConnection->sentRequests as $request)
    <div class="my-2 shadow text-white bg-dark p-1" id="">
      <div class="d-flex justify-content-between">
        <table class="ms-1">
          <td class="align-middle">{{$request->reciever->name}}</td>
          <td class="align-middle"> - </td>
          <td class="align-middle">{{$request->reciever->email}}</td>
          <td class="align-middle">
        </table>
        <div>
            <button id="cancel_request_btn_" class="btn btn-danger me-1"
              onclick="deleteRequest('{{auth()->user()->id}}','{{$request->reciever->id}}')">Withdraw Request</button> 
        </div>
      </div>
    </div>
  @endforeach
@else
@foreach($recievedConnections->recievedRequests as $request)
    <div class="my-2 shadow text-white bg-dark p-1" id="">
      <div class="d-flex justify-content-between">
        <table class="ms-1">
          <td class="align-middle">{{$request->sender->name}}</td>
          <td class="align-middle"> - </td>
          <td class="align-middle">{{$request->sender->email}}</td>
          <td class="align-middle">
        </table>
        <div>
            <button id="accept_request_btn_" class="btn btn-primary me-1"
              onclick="">Accept</button>
        </div>
      </div>
    </div>
  @endforeach
@endif
