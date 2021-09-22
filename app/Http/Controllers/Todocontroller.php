<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;

class Todocontroller extends Controller
{
    public function index(){
        $items = DB::table('todoes')->orderBy('updated_at','DESC')->get();

        return view('app',['items' => $items]);
    }

    public function create(Request $request){
        $posts = ['content' => $request->content,];
        DB::table('todoes')->insert($posts);
        return redirect('/');
    }

    public function update(Request $request){
        $param = [
            'id' => $request->id,
            'content' =>$request->content,
        ];
        DB::table('todoes')->where('id',$request->id)->update($param);
        return redirect('/');
    }

    public function delete(Request $request){
        $param = ['id' => $request -> id];
        DB::table('todoes')->where('id',$request->id)->delete();
        return redirect('/');
    }
}
