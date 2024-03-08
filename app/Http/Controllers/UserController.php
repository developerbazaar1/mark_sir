<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserSites;
use App\Models\SiteError;
use Illuminate\Support\Facades\Validator;
use App\Models\UsersitesMedia;
use Illuminate\Support\Facades\Mail;
// use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class UserController extends Controller
{
   

    public function setting()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('user.setting', compact('user'));
    }


   public function updateProfile(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];

        // Add conditional validation for new_password
        if ($request->has('new_password')) {
            $rules['current_password'] = 'required_with:new_password';
        }

        if($request->has('new_password')){
            if(!$request->has('confirm_password')){
                return redirect()->back()->withErrors(['confirm_password' => 'The confirm password is required.'])->withInput();
            }else{

                if($request->input('confirm_password') != $request->input('new_password')){
                    return redirect()->back()->withErrors(['confirm_password' => 'The new password and confirm password must match.'])->withInput();
                }

            }
        }

        $request->validate($rules);

        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the current password matches the authenticated user's password
        if ($request->has('current_password') && !empty($request->input('current_password'))) {
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'The current password does not match our records.'])->withInput();
            } else { 
                // Update the user's password if provided
                if ($request->has('new_password') && !empty($request->input('new_password'))) {
                    $user->password = Hash::make($request->input('new_password'));
                    $user->save();
                }
            }
        }

        // Update the user's name and email if provided
        if ($request->has('name')) {
            $user->name = $request->input('name');
        }
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }
        $user->save();

        // Show success message or redirect back with errors
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function store_user_selected_site(Request $request)
    {   

        $validated = $request->validate([
            'site' => 'required',
            'sitetype' => 'required',
        ]);
        $unique_id = uniqid();
        $data = array(
            "unique_id"=>$unique_id,
            "site"=>$request->input('site'),
            "sitetype"=>$request->input('sitetype'),
            "user_id"=>Auth::user()->id,
        );
        
        $id = UserSites::create($data)->id;
        return redirect()->route('upload-site-images', $unique_id)->with('success_add', 'Added Successfully');
    
    }

    public function upload_site_images($id)
    {
        
        $userSite = UserSites::where('unique_id', $id)->first(); 
        $SiteError = SiteError::where('site_type', $userSite->sitetype)->get(); 
        return view('user.uploadsiteimages', compact('userSite', 'SiteError'));
    }
    
  
    public function store_site_images(Request $request){

        $storedImages = [];
        $errorImages = [];

        $SiteError = SiteError::where('site_type',$request->input('site_type'))->get(); 

        foreach($SiteError as $se){

            if ($request->hasFile('document')) {
                foreach ($request->file('document') as $image) {

                    
                    if ($image->isValid()) {
                        $extension = $image->getClientOriginalExtension(); 
                    }else{
                        $extension ='';
                    } 


                    $allowedFormats = explode(" ", strtolower($se->file_formate));
                    if (in_array($extension, $allowedFormats)) {
                            
                            $max_size = intval($se->max_size);

                            $max_width = intval($se->max_width);
                            $min_width = intval($se->width);
                            $max_height = intval($se->max_height);
                            $min_height = intval($se->height);

                            // Create the validator instance with dynamic validation rules
                            $videoExtensions = ['mp4', 'avi', 'mov', 'wmv', 'mkv', 'flv', 'webm', 'mpeg', 'mpg', 'm4v', '3gp', 'vob', 'ogv', 'rm', 'rmvb', 'asf', 'mts', 'm2ts'];

                            if (in_array($extension, $videoExtensions)) {
                                $validator = Validator::make(['document' => $image], [
                                    'document' => "required|max:$max_size",
                                ]);

                                $asset_err = 'max size:'.$max_size;
                            }else{
                                $validator = Validator::make(['document' => $image], [
                                    'document' => "required|dimensions:min_width=$min_width,min_height=$min_height,max_width=$max_width,max_height=$max_height",
                                ]);
                                $asset_err = 'dimensions: min_width='.$min_width.', min_height='.$min_height.', max_width='.$max_width.', max_height='.$max_height;
                            }
                           

                            if ($validator->fails()) {
                                $errorImages[] = [
                                    'name' =>  $image->getClientOriginalName(),
                                    'error' => $validator->errors()->first('document'),
                                    'asset_err' => $asset_err
                                ];

                               
                            } else {


                                if (in_array($extension, $videoExtensions)) {
                                    
                                    $asset_type = 'video';
                                }else{
                                    $asset_type = 'image';
                                }


                                $imageName = time() . '_' . $image->getClientOriginalName();
                                $image->move(public_path('images/'), $imageName);
                                $formInput['document'] = 'images/'.$imageName;
                                $storedImages[] = $image->getClientOriginalName();

                                $data = array(
                                      "usersite_id" => $request->input('usersite_id'),
                                      "file" => $formInput['document'],
                                      "sitetype" => $request->input('site_type'),     
                                      "status" => 'inactive',   
                                      "asset_type" => $asset_type           
                                );
                                
                                $id = UsersitesMedia::create($data)->id;


                                // if ($data['asset_type'] === 'video') {
                                //     // Generate a thumbnail if the uploaded file is a video
                                //     $thumbnailName = time() . '_' . $image->getClientOriginalName() . '.jpg';
                                //     $thumbnailPath = public_path('thumbnails/') . $thumbnailName;

                                //     // Extract a frame from the video at 10 seconds
                                //     FFMpeg::fromDisk('public')
                                //         ->open($formInput['document'])
                                //         ->getFrameFromSeconds(10)
                                //         ->export()
                                //         ->toDisk('public')
                                //         ->save('thumbnails/' . $thumbnailName);

                                //     // Update the database record with the path to the thumbnail
                                //     UsersitesMedia::where('id', $id)
                                //         ->update(['thumbnail' => 'thumbnails/' . $thumbnailName]);
                                // }
                               


                                
                                
                            }


                    } 

                    
                }
            }
      

        }

        if(count($errorImages) > 0){

            

            $listmedia = UsersitesMedia::where('usersite_id', $request->input('usersite_id'))->where('status', 'inactive')->get();

            foreach ($listmedia as $media) {
                $image = $media->file;
                // $image = public_path($image1);
                // Delete the media record
                if ($media->delete()) {
                    // Check if the image file exists and delete it
                    if (!empty($image) && file_exists($image)) {
                        unlink($image);

                    }
                }
            }

 

            $imagelist = array(
                'error_list' => $errorImages,
                'success_list' => $storedImages,
            );
            return redirect()->back()->with('error', $imagelist);

        }else{

            
            $listmedia = UsersitesMedia::where('usersite_id', $request->input('usersite_id'))->get();

            // Prepare the data array for update
            $data = array(
                "status" => 'active',   
            );

            // Extract the IDs from the collection
            $mediaIds = $listmedia->pluck('id')->toArray();

            // Perform the update in a single query
            UsersitesMedia::whereIn('id', $mediaIds)->update($data);
            $baseUrl = url('/');
            $uni_id = $request->input('unique_id');
            if( $request->input('site_type')== 'Publisher'){
                $preview_link_count = 1;
                
                $preview_link1 = $baseUrl.'/preview/publisher/'.$uni_id;  
                
                $preview_link = $preview_link1;
                
            }else if($request->input('site_type')== 'Retailer'){
                $preview_link_count = 2;
                if($request->input('site') == 'amazon'){
                    $preview_link1 = $baseUrl.'/preview/amazon-desktop/'.$uni_id;
                    $preview_link2 = $baseUrl.'/preview/amazon-mobile/'.$uni_id;
                }else{
                    $preview_link1 = $baseUrl.'/preview/amazon-desktop/'.$uni_id;
                    $preview_link2 = $baseUrl.'/preview/amazon-mobile/'.$uni_id;
                }

                $preview_link = $preview_link1.'---'.$preview_link2;

            }else{
                // Social Media
                $preview_link_count = 2;
                if($request->input('site') == 'instagram'){
                    $preview_link1 = $baseUrl.'/preview/insta-desktop/'.$uni_id;
                    $preview_link2 = $baseUrl.'/preview/insta-mobile/'.$uni_id;
                }else{
                    $preview_link1 = $baseUrl.'/preview/insta-desktop/'.$uni_id;
                    $preview_link2 = $baseUrl.'/preview/insta-mobile/'.$uni_id;
                }

                $preview_link = $preview_link1.'---'.$preview_link2;
            }


            
            
            $todaydate = date('Y-m-d');
            $data1 = array(
                "status" => 'active', 
                "preview_link" => $preview_link, 
                "preview_link_count" => $preview_link_count,  
                "valid_days" => 30,
                "start_date" => $todaydate
            );

            Usersites::where('id', $request->input('usersite_id'))->update($data1);

            // return redirect()->route('preview-email-confirmation')->with('success', 'success');   
            return redirect()->route('preview-email-confirmation', ['id' => $uni_id])->with('success', 'success');


        }


        


       
    }


    public function preview_email_confirmation($id)
    {

        return view('user.preview_email', compact('id'));
    }
 
    public function email_to_sent_link(Request $request)
    {
        
        $rules = [
            'showHide' => 'required', // Ensure that either auth_email or other_email is selected
        ];


        // Add conditional validation based on a certain condition
        if (($request->input('showHide') == 'hide')) {
            $rules['email'] = 'required';  
        }

        if (($request->input('showHide') == 'show')) {
            $rules['other_email'] = 'required';  
        }

        $request->validate($rules);


        if (($request->input('showHide') == 'hide')) {
            $email = $request->email;  
        }else{
            $email = $request->other_email;  
        }

       
        $auth_uniq_id = $request->auth_uniq_id;
        $usersitedata = UserSites::where('unique_id', $auth_uniq_id)->first();
        
        if($usersitedata->sitetype == 'Publisher'){

            $message1 = "Desktop View: ".$usersitedata->preview_link." && Mobile View:" .$usersitedata->preview_link;      

        }else{

            $links = $usersitedata->preview_link;
            // Split the string into an array using '---' as the delimiter
            $urlArray = explode('---', $links);

            // Trim each URL in the array to remove any leading/trailing spaces
            $urlArray = array_map('trim', $urlArray);

            $message1 = "Desktop View: ".$urlArray[0]." && Mobile View:" .$urlArray[1];   

        }
                       
                       
        $sub1 = "Preview links for ".$usersitedata->sitetype;
        $email_data = array(
            'name'   =>  Auth::user()->name,
            'sitetype' => $usersitedata->sitetype,
            'email'  =>  $email,
            'subject1'=>  $sub1,
            'message1'   =>  $message1,

        );

        print_r($email_data); die;

        // Mail::send('preview_email_template', $email_data, function ($message) use ($email_data, $sub1) {
        //     $message->to('pragyakushwah2017@gmail.com', 'Team')
        //         ->subject($sub1)
        //         ->from('reply@dbtechserver.online', 'The sellers friend');
        // });
    }

}
