<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;
use Symfony\Component\Console\Input\Input;
use App\Http\Requests\Todorequest;

class Todocontroller extends Controller
{
    public function index(){
        $items = Todo::orderBy('updated_at','DESC')->get();

        return view('app',['items' => $items]);
    }

    public function create(TodoRequest $request){
        $posts = ['content' => $request->content,];
        Todo::insert($posts);
        return redirect('/');
    }

    public function update(TodoRequest $request){
        $param = [
            'id' => $request->id,
            'content' =>$request->content,
        ];
        Todo::where('id',$request->id)->update($param);
    }

    public function delete(Request $request){
        $param = ['id' => $request -> id];
        Todo::where('id',$request->id)->delete();
    }
    public function branch(TodoRequest $request){
        if(!empty($_POST['update'])){
            $this->update($request);
            return redirect('/');
        }elseif(!empty($_POST['delete'])){
            $this->delete($request);
            return redirect('/');
        }
    }

}
