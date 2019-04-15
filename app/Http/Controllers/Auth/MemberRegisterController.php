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
   		
   		$destinationPath = 'uploads';
   		$filePath = $destinationPath.'/'.$file->getClientOriginalName();
    	
        $imageFile=Image::make($file)->greyscale()->resize(1080, 1080)->insert('images/mask-strip.png','center')->stream();

       \Storage::disk('s3')->put($filePath, $imageFile->__toString(), 'public');
    	
        $request->request->add(['images' =>$destinationPath.'/'.$file->getClientOriginalName() ]);
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
