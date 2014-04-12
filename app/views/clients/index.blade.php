@extends("layout")
@section("content")

 <div class="container">
 <h3>Your Clients</h3>
    @section("sidebar")
    @stop
  
 @if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<?php $clients = Auth::user()->clients; ?>

 	@if (Auth::check())
        
       @foreach ($clients as $client)
<div class="two-thirds column">

       <div class="clients">
       	<ul class="data">
        <li><label>Client Name: </label>{{ $client->client_name }}</li>
        <li><label>Client Code: </label> {{ $client->client_code }}</li>
          <li><label class="titletoggle">Client Brief <p>(click to toggle)</p></label><p class="brief">{{ $client->client_brief }}</p></li>
       
        <li><label>Client Website: </label><a href="http://{{$client->client_website}}" target="_blank"> {{ $client->client_website }}</a></li>
        </ul>
            </div>
           
            <ul class='buttonslist'>
            <li><button><a href="{{ URL::to('client/' . $client->id . '/edit') }}">Edit client</a></button></li>
			<li><button><a href="{{ URL::to('client/' . $client->id . '/show') }}">View Projects</a></button></li>
			<li><button><a href="/task/view/">View Tasks</a></button></li>
            </ul>
            </div>

       @endforeach 
       
    @endif
	
    </div>
    @stop
    
