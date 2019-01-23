<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class usersregistraionmsg extends Controller
{
    //
    public function registeruser(Request $request){
        $email = $request['email'];
        $name=$request['name'];
        $newUser=  DB::table('users')->insert(
            ['email' => $email,'name'=>$name,'password'=>'password']
        );  
        if($newUser){
            return response()->json(array('success' => true, 'user_created' => 1), 200);      
        }
    }
}
