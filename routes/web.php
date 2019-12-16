<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Task;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {

        return view('tasks',[
            'tasks' => Task:: orderBy('created_at', 'desc')->get()
            ]);
    });

    /**
     * Add New Task
     */
    Route::post('/task', function (Request $request) {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email'=> 'required|unique:tasks|email|max:100',
           
        ]);
        // dump($validator);die;
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        // dd($request->toArray());die;
        // dump( $request->toArray());die;
        // dump($request->input('name'));die;


        $task = new Task;
   
        $task->name = $request->name;
        $task->email = $request->email;
        $task->phone = $request->phone;
        $task->address = $request->address;
    
        $task->save(); 

        // Một đối tượng Eloquent model mới rồi truyền vào đó các thuộc tính cần thiết:

        return redirect('/');
    });

    
    /**
     * Delete Task
     */
    Route:: delete('/task/{id}', function($id){
        Task:: findOrFail($id)->delete();
        return redirect('/');
    });
  
});
