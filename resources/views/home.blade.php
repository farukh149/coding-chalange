@extends('layouts.app')

@section('content')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/helper.js') }}?v={{ time() }}" defer></script>
  <script src="{{ asset('js/main.js') }}?v={{ time() }}" defer></script>

  <div class="container">
    <x-dashboard />
    <div class="row justify-content-center mt-5">
  <div class="col-12">
    <div class="card shadow  text-white bg-dark">
      <div class="card-header">Coding Challenge - Network connections</div>
      <div class="card-body">
        <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
          <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
          <label class="btn btn-outline-primary" for="btnradio1" id="get_suggestions_btn" onclick="getSuggestions('all')">Suggestions ({{count($users)}})</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio2" id="get_sent_requests_btn" onclick="sentRequests('sentConnections')">Sent Requests ()</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio3" id="get_received_requests_btn" onclick="getRequests('recievedConnections')">Received
            Requests()</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio4" id="get_connections_btn" onclick="getConnections('acceptedConnections')">Connections ()</label>
        </div>
        <hr>
        <div id="content" class="d-none">
          {{-- Display data here --}}
        </div>
        <div id="all_users">
          @include('blades.suggestion')
        </div>
        <div class="d-flex align-items-center  mb-2  text-white bg-dark p-1 shadow loader d-none" style="height: 45px">
          <strong class="ms-1 text-primary">Loading...</strong>
          <div class="spinner-border ms-auto text-primary me-4" role="status" aria-hidden="true"></div>
        </div>
        <div id="recieved"></div>
      </div>
    </div>
  </div>
</div>
  </div>
@endsection