<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserSites;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
  

    public function login()
    {  
        if (Auth::check()) {
           
            // Check if the user is logged in as admin or user
            if (Auth::user()->userType == 'admin') {
                return redirect()->route('admin-dashboard');
               
            } elseif (Auth::user()->userType == 'user') {
              
                return redirect()->route('user-dashboard'); 
            }
        }else{
            return view('admin.admin-auth.login');
        }
        
    }

    public function index()
    {   
        $active_users = User::where('userType', 'user')->where('access_status', 'active')->orderBy('id','DESC')->get();
        $inactive_users = User::where('userType', 'user')->where('access_status', 'inactive')->orderBy('id','DESC')->get();
        $total_users = User::where('userType', 'user')->orderBy('id','DESC')->get();
        $total_links = UserSites::sum('preview_link_count'); 
        $no_active_users = count($active_users);
        $no_inactive_users = count($inactive_users);
        $no_total_users = count($total_users);
        $no_total_links = $total_links;
        
        return view('admin.dashboard', compact('no_active_users', 'no_inactive_users', 'no_total_users', 'no_total_links'));
    }

    // ======================================
    // ====================================



    // users

    public function users()
    {   
    
        $users = User::where('userType', 'user')->orderBy('id','DESC')->get();
        return view('admin.user.index',compact('users'));
    

    }

    public function changeUserStatus(Request $request)

    {  
        $id = $request->user_id;
        $user = User::find($id);

        if($request->status == '1'){
            $data = array(
                "access_status"=>'active', 
            );
        }else{
            $data = array(
                "access_status"=>'inactive', 
            );
        }            
          
        User::where('id',$id)->update($data);  
     
      
        if($user->mail_sent == 0 && $request->status == '1'){
            $sub1 = "Welcome to The Seller's Friend!";

            $email_data = array(
                'name'   =>  $user->name,
                'email'  =>  $user->email,
                'password'   =>  $user->name.'@123',
            );
    
            Mail::send('email.welcome_user', $email_data, function ($message) use ($email_data, $sub1) {
                $message->to($email_data['email'], $email_data['name'])
                    ->subject($sub1)
                    ->from('info@danish.dbtechserver.online', "The Seller's Friend");
            });
            
            $data1 = array(
                "mail_sent"=> '1', 
            );
                 
       
            User::where('id',$id)->update($data1);        
        }
       
       
        return response()->json(['success'=>'Status change successfully.']);

    }

     public function delete_user($id)
    {
        $delete = User::findOrFail($id);
        $image1 = $delete->user_image;
        $image  =  $image1;
        if($delete->delete()){
            if(!empty($image)){
                if(file_exists($image)){
                    unlink($image);
                }
            }
        }
        return redirect()->route('admin-users')->with('success','User Deleted Successfully');
    
    }

    public function setting()
    {
        return view('admin.setting');
    }

    public function storesetting(Request $request)
    {
         $validated = $request->validate([
            'password' => 'required|confirmed',
        ]);

        $data = array(
            "password"=>Hash::make($request->input('password')),
        );
        
        User::where('id',Auth::user()->id)->update($data);
        return redirect()->back()->with('success', 'Password updated Successfully');
    }

    // link list

    public function link_list()
    {   
    
        $links = Usersites::with('userdetails')->orderBy('id','DESC')->get();
        return view('admin.link_list.index',compact('links'));
    

    }
    
}