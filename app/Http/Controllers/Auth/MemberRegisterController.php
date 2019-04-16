<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Notifications\UserRegisteredNotification;
use Image;
use App\Account;
use Auth;
use URL;
use Hash;
class MemberRegisterController extends Controller
{
    
    public function register(Request $request)  {   
    	$file = $request->file('image');
   		$mask = array("red","yellow");
   		$destinationPath = 'uploads';
   		$filePath = $destinationPath.'/'.$file->getClientOriginalName();
        $masking= array_rand($mask,1);
    	$fileimage = Image::make($file)->greyscale()->resize(1080, 1080)->insert('images/image-masking-'.$mask[$masking].'.png','center')->save($destinationPath.'/'.$file->getClientOriginalName());
	   $s3 = \Storage::disk('s3');
       $s3->put($filePath, $fileimage,'public');
    	$request->request->add(['images' =>$filePath ]);
    	$request->request->add(['dob' => $request->date."/".$request->month.'/'.$request->year]);
        $validation = $this->validator($request->all());
        if ($validation->fails())  {  
            return response()->json(['status'=>'Failed','intended'=>URL::previous(),'errors'=>$validation->errors()->toArray(),'dob'=>$request->dob]);
        }
            $user = $this->create($request->all());
            Auth::guard('account')->login($user);
            if (Auth::guard('account')->user()){
                 $user->notify(new UserRegisteredNotification($user));
                return response()->json(['status'=>'Success','intended'=>URL::previous(),'user'=>Auth::guard('account')->user()]);
            }
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone'=>['required','numeric','phone_number','unique:accounts'],
            'address'=>['required','string'],
            'gender'=>['required'],
            'images'=>['required'],
            'dob'=>['required','date_format:"d/m/Y"'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        
        $acc = new Account();
        $reserve = [25,64,644,887,6564,656564,855976];
        $last_id = $acc->latest('id')->first();
        if(!empty($last_id)){
             if (in_array($last_id->id, $reserve)) 
            { 
                return Account::create([
                'id'=>$last_id->id +2,
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' =>$data['phone'],
                'address'=> $data['address'],
                'gender'=>$data['gender'],
                'dob'=>$data['dob'],
                'images'=>$data['images'],
                'password' => Hash::make($data['password']),
                ]);
             } 
        }
       
        return Account::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' =>$data['phone'],
            'address'=> $data['address'],
            'gender'=>$data['gender'],
            'dob'=>$data['dob'],
            'images'=>$data['images'],
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function registered(Request $request,$user) {
        $user->notify(new UserRegisteredNotification($user));
    }

}
