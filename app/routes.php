<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('task/clientsprojects', function(){
    $input = Input::get('option');
    $client = Client::find($input);
    $projects =  $projects = Project::where('client_id', $client->id) 
                            ->orderBy('project_name') 
                            ->get(array('id','project_name') 

                            );
$response = array(); 

foreach($projects as $project){ 
$response[$project->id] = $project->project_name; 
} 

return Response::json($response);
});


Route::get('/', function()
{
	return View::make('users/login');
});

Route::get('/createroles', function()
{
$owner = new Role;
$owner->name = 'Owner';
$owner->save();

$admin = new Role;
$admin->name = 'Admin';
$admin->save();

$developer = new Role;
$developer->name = 'Developer';
$developer->save();

$client = new Role;
$client->name = 'Client';
$client->save();

});

Route::get('/createrole', function()
{

$user = User::where('username','=','gutig')->first();

/* role attach alias */

/* OR the eloquent's original: */
$user->roles()->attach($admin->id); // id only

});


Route::get('/createthis', function()
{
    $subscriber = new Role();
    $subscriber->name = 'Subscriber';
    $subscriber->save();
 
    $author = new Role();
    $author->name = 'Author';
    $author->save();
 
    $read = new Permissiocn();
    $read->name = 'can_read';
    $read->display_name = 'Can Read Posts';
    $read->save();
 
    $edit = new Permission();
    $edit->name = 'can_edit';
    $edit->display_name = 'Can Edit Posts';
    $edit->save();
 
    $subscriber->attachPermission($read);
    $author->attachPermission($read);
    $author->attachPermission($edit);
 
    $user1 = User::find(1);
    $user2 = User::find(2);
 
    $user1->attachRole($subscriber);
    $user2->attachRole($author);
 
    return 'Woohoo!';
});








// Confide routes
Route::get( 'user/create',                 'UserController@create');
Route::get( 'user/login',                  'UserController@login');
Route::post('user',                        'UserController@store');
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');


Route::group(["before" => "guest"], function()
{
    Route::any("/", [
        "as"   => "user/login",
        "uses" => "UserController@login"
    ]);
    Route::any("/request", [
        "as"   => "user/request",
        "uses" => "UserController@requestAction"
    ]);
    Route::any("/reset", [
        "as"   => "user/reset",
        "uses" => "UserController@resetAction"
    ]);

});

Route::group(["before" => "auth"], function()
{
    Route::any("user/profile", [
        "as"   => "user/profile",
        "uses" => "UserController@profile"
    ]);
  
    Route::any("user/openprojects", [
        "as"   => "user/openprojects",
        "uses" => "UserController@openprojects"
    ]);
});

Route::group(["before" => "auth"], function()
{
    Route::any("task/create", [ 
        "as"   => "task/create",
        "uses" => "TaskController@create"
    ]);
	    Route::any("task/{resource}/edit", [
        "as"   => "task/edit",
        "uses" => "TaskController@edit"
    ]);
	    Route::any("task/store", [
        "as"   => "task/store",
        "uses" => "TaskController@store"
    ]);
        Route::any("task/viewall", [
        "as"   => "task/viewall",
        "uses" => "TaskController@viewall"
    ]);
        
        Route::any("task/{resource}/show", [
        "as"   => "task/show",
        "uses" => "TaskController@show"
    ]);
   Route::any("status/index", [
        "as"   => "status/index",
        "uses" => "StatusController@index"
    ]);
       
   Route::any("priority/index", [
        "as"   => "priority/index",
        "uses" => "PriorityController@index"
    ]);
       Route::any("types/index", [
        "as"   => "types/index",
        "uses" => "TaskTypesController@index"
    ]);
});



//Route::get('task/clientsprojects/', function(){
 //$input = Input::get('client');
   //         $client_id = Client::find($input);
     //       $projects = DB::table('projects')->where('client_id', $client_id->id)
       //                                        ->orderBy('project_name')
         //                                      ->lists('id','project_name');
                        
           // return Response::json($projects);

//});




Route::group(["before" => "auth"], function()
{
    Route::any("project/create", [
        "as"   => "project/create",
        "uses" => "ProjectController@create"
    ]);
	 Route::any("project/{resource}/edit", [
        "as"   => "project/edit",
        "uses" => "ProjectController@edit"
    ]);
	Route::any("project/{resource}/update", [
        "as"   => "project/update",
        "uses" => "ProjectController@update"
    ]);
	Route::any("project/index", [
        "as"   => "project/index",
        "uses" => "ProjectController@index"
    ]);
	    Route::any("project/store", [
        "as"   => "project/store",
        "uses" => "ProjectController@store"
    ]);
    Route::any("project/{resource}/show", [
        "as"   => "project/show",
        "uses" => "ProjectController@show"
    ]);
	    Route::any("project/{resource}/update", [
        "as"   => "project/update",
        "uses" => "ProjectController@update"
    ]);
		Route::any("project/{resource}/edit", [
        "as"   => "project/edit",
        "uses" => "ProjectController@edit"
    ]);
			Route::any("project/clientsprojects/{resource}", [
        "as"   => "project/clientsprojects",
        "uses" => "ProjectController@clientsprojects"
    ]);
			Route::any("project/viewall", [
        "as"   => "project/viewall",
        "uses" => "ProjectController@viewall"
    ]);
	Route::any("project/viewallgantt", [
        "as"   => "project/viewallgantt",
        "uses" => "ProjectController@viewallgantt"
    ]);
	
});

Route::group(["before" => "auth"], function()
{
    Route::any("client/create", [
        "as"   => "client/create",
        "uses" => "ClientController@create"
    ]);
    Route::any("client/{resource}/show", [
        "as"   => "client/show",
        "uses" => "ClientController@show"
    ]);
	Route::any("client/{resource}/edit", [
        "as"   => "client/edit",
        "uses" => "ClientController@edit"
    ]);
		Route::any("client/index", [
        "as"   => "client/index",
        "uses" => "ClientController@index"
    ]);
	    Route::any("client/store", [
        "as"   => "client/store",
        "uses" => "ClientController@store"
    ]);
});

Route::group(["before" => "auth"], function()
{
    Route::any("team/create", [
        "as"   => "team/create",
        "uses" => "TeamController@create"
    ]);
    Route::any("team/show", [
        "as"   => "team/show",
        "uses" => "TeamController@show"
    ]);
	 Route::any("team/store", [
        "as"   => "team/store",
        "uses" => "TeamController@store"
    ]);
	Route::any("team/index", [
        "as"   => "team/index",
        "uses" => "TeamController@index"
    ]);
	
});






// Set Role Based permissions 

// Entrust::routeNeedsPermission( 'user/create*', 'manage_posts' );
