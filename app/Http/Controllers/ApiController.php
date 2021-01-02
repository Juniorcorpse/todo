<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Todo;


class ApiController extends Controller
{
    public function create(Request $request){
        $data = ['error' => ''];
        $roles = [
            'title' =>'required|min:3'
        ];

        $validator = Validator::make($request->all(), $roles);
        if($validator->fails()){
            $data['error']=$validator->messages();
            return $data;
        }

        $title = $request->input('title');
        $todo = new Todo();
        $todo->title = $title;
        $todo->save();        

        return $data;

    }
    public function all(){
        $data = ['error' => ''];
        $todo = Todo::SimplePaginate(2);
        $data['list'] = $todo->items();
        $data['current_page'] = $todo->currentPage();
        return $data;
    }
    public function read($id){
        $data = ['error' => ''];
        $todo = Todo::find($id);
        if($todo){
            $data['todo'] = $todo;
        }else{
            $data['error'] = "A tarefa {$id} não existe";
        }
        
        return $data;
    }
    public function update($id, Request $request){
        $data = ['error' => ''];

        $roles = [
            'title' =>'min:3',
            'done' => 'boolean'
        ];

        $validator = Validator::make($request->all(), $roles);
        if($validator->fails()){
            $data['error']=$validator->messages();
            return $data;
        }

        $title = $request->input('title');
        $done = $request->input('done');
        
        $todo = Todo::find($id);
        if($todo){
           if($title){
            $todo->title = $title;
           }
           if($done != NULL){
            $todo->done = $done;
           }
           $todo->save();
            
        }else{
            $data['error'] = " Você tentou altera uma tarefa que não existe";
        }
        
        return $data;        
    }
    public function delete($id){
        $data = ['error' => ''];
        $todo = Todo::find($id);
        if($todo){
            $todo->delete();
        }else{
            $data['error'] = "A tarefa {$id} não existe";
        }
        return $data;        
    }

}
