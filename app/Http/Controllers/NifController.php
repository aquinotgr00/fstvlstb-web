<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Account;

class NifController extends Controller
{

    public function __construct(Account $account)
    {
        $this->middleware('auth:account');
        $this->account = $account;
    }

    public function index()
    {

        return view('frontend-page.nif');
    }

    public function gantiPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|max:12',
            'new_password' => 'confirmed|max:12|different:password',
            'new_password_confirmation' => 'required'
        ]);
        $user = \App\Account::findOrFail(Auth::user()->id);
        if (Hash::check($request->password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->new_password),
            ])->save();
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'Success',
                ]);
            }
            $request->session()->flash('success', 'Password changed');
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'Error',
                ]);
            }
            $request->session()->flash('error', 'Password does not match');
        }
        return redirect()->route('member.nif');
    }

    public function changeImage(Request $request){
        Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,png',
        ])->validate();
        $file = $request->file('image');
        $unique = uniqid();
        $mask = array("red","yellow");
        $destinationPath = 'uploads';
        $filePath = $destinationPath.'/'.$unique.'-'.$file->getClientOriginalName();
        $masking= array_rand($mask,1);
        $fileimage = Image::make($file)->greyscale()->resize(1080, 1080)->insert('images/image-masking-'.$mask[$masking].'.png','center')->save($destinationPath.'/'.$file->getClientOriginalName());
        $s3 = \Storage::disk('s3');
        $s3->put($filePath, $fileimage,'public');
        $request->request->add(['images' =>$filePath ]);

        $this->account->where('id',Auth::user()->id)->update( $request->only('images') );

        return redirect()->back();
    }

    public function changeData(Request $request){
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone'=>['required','numeric','phone_number'],
            'address'=>['required'],
            'gender'=>['required'],
            'dob'=>['required','date_format:"d/m/Y"'],
        ])->validate();

        $this->account->where('id',Auth::user()->id)->update($request->except('_token'));
        return redirect()->back();
    }
}
