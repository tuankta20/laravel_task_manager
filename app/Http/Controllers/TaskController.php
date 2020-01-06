<?php

namespace App\Http\Controllers;
use App\Tasks;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session;
class TaskController extends Controller
{
    public function index(){
          $tasks = Tasks::all();
          return view('index',compact('tasks'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $tasks = new Tasks();
        $tasks->title = $request->title;
        $tasks->content = $request->contents;


        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename=$file->getClientOriginalName('images');
            $file->move('images',$filename);
            $tasks->images = $filename;
        }
        $tasks->save();

        return redirect()->route('task');

    }

    public function edit($id){
        $task = Tasks::findOrfail($id);
        return view('edit',compact('task'));
    }

    public function update(Request $request,$id){
        $tasks = Tasks::findOrfail($id);
        $tasks->title = $request->title;
        $tasks->content = $request->contents;


        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename=$file->getClientOriginalName('images');
            $file->move('images',$filename);
            $tasks->images = $filename;
        }
        $tasks->save();
        return redirect()->route('task');
    }

    public function destroy($id){
        $tasks = Tasks::findOrfail($id);
        $tasks->delete();
        return redirect()->route('task');
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        if (!$keyword){
            return redirect()->route('task');
        }
        $tasks = Tasks::where('title','LIKE','%'.$keyword.'%')->get();

        return view('index',compact('tasks'));

    }
}
