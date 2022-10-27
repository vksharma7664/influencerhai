<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Storage, Session, Str;

class LoginController extends Controller
{
    //

    public function loginShow()
    {
        // code...
        return view('brand.auth.login');
    }

    public function registerShow()
    {
        // code...
        return view('brand.auth.register');
    }

    public function registerSubmit(RegisterRequest $request)
    {
        // code...
        // $request->dd();
        if(makeUrl($request->company_url) != explode('@', $request->email)[1]){
            $request->session()->flash('error','Your email ID does not match with your company.');
            return redirect()->back()->withInput();
        }

       $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'designation' => $request->designation,
            'company_name' => $request->company_name,
            'company_url' => makeUrl($request->company_url),
            'industry' => $request->industry,
            'dashboard' => 'brand',
            'password' => $request->password,
        ]);
        // dd($user->id);
        $token = md5( Str::random(64));
        //send verification mail to users
        $user = User::find($user->id);
        $user->remember_token = $token;
        $user->save();
        // ->update(['remember_token'=>$token]);
        // dd($user);
         $data = array('name'=>ucfirst($request->name), "verify_url" => route('brand.verify.email', $token));
          \Mail::send('mail.email_verify', $data, function($message) use($user) {
             $message->to($user->email, $user->name)->subject
                ('Verify Email - InfluencerHai');
             $message->from('contact@influencerhai.com','Influencer Hai');
          });
        //redirect to registration success page
        $request->session()->flash('success','Your query has been submitted.');
        return redirect()->route('brand.register.success');
    }


    public function registerSuccess()
    {
        if(Session::has('success')){
            return view('brand.auth.registration_success', ['title' => 'Register Successful']);
        }
        return redirect()->route('brand.register');
        
    }

    

    public function verifyEmail(Request $request, $token)
    {
        // code...
        $user = User::where('remember_token', $token);
        if($user->count() == 1){
            $user->update([
                'email_verified_at' => date('Y-m-d H:i:s')
            ]);
            $request->session()->flash('success','Your email verification has Successful.');
        }else{
            $request->session()->flash('error','Your email verification link has been expired.');
        }
        
        return redirect()->route('brand.verify.email.success');
    }

     public function verifyEmailSuccess()
    {
        // code...
        // $request->session()->flash('success','Your email verification has Successful.');
       if(Session::has('success')){
            Session::flash('success','Your email verification has Successful.');
            return view('brand.auth.email_verify', ['title' => 'Email Verification Successful']);

        }else{
            Session::flash('error','Your email verification link has been expired.');
            return view('brand.auth.email_verify', ['title' => 'Email Verification Successful']);

        }
        return redirect()->route('home');



    }

    public function testMail()
    {
        $data = array('name'=>"Vikesh", "verify_url" => "influencerhai.com");
      \Mail::send('mail.email_verify', $data, function($message) {
         $message->to('fantasy.vikesh@gmail.com', '')->subject
            ('Verify Email - InfluencerHai');
         $message->from('contact@influencerhai.com','Influencer Hai');
      });
      echo "HTML Email Sent. Check your inbox.";
    }
}
