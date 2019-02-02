<?php

namespace App\Http\Controllers;
use DB;
use Mail;
use Redirect;
use App\Mail\SendMailable;

use App\Http\Requests;
use Illuminate\Http\Request;

class usersregistraionmsg extends Controller
{
    //
    public function registeruser(Request $request){
        $email = $request['email'];
        $name=$request['name'];
        $phone=$request['phone'];
        $gender=$request['gender'];
        $newUser=  DB::table('users')->insert(
            ['email' => $email,'name'=>$name,'password'=>'password','phone'=>$phone,'gender'=>$gender]
        );  
        if($newUser){


            // public function basic_email() {
                // $data = array('name'=>"Virat Gandhi");
             
                // Mail::send(['text'=>'mail'], $data, function($message) {
                //    $message->to('ashok.ng786@gmail.com', 'Tutorials Point')->subject
                //       ('Laravel Basic Testing Mail');
                //    $message->from('ashok.ng786@gmail.com','Virat Gandhi');
                // });
                // echo "Basic Email Sent. Check your inbox.";
            //  }

            $name = 'ASHOK';
            Mail::to('ashok.ng786@gmail.com')->send(new SendMailable($name));
            
            // return 'Email was sent';
            return Redirect::to('http://minmapadmin.herokuapp.com');

            // return response()->json(array('success' => true, 'user_created' => 1), 200); 
            
            
        }
    }

    // public function mail()
    // {
    //    $name = 'Krunal';
    //    Mail::to('krunal@appdividend.com')->send(new SendMailable($name));
       
    //    return 'Email was sent';
    // }
    


}
