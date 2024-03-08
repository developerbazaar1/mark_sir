<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSites;
use App\Models\SiteError;
use App\Models\UsersitesMedia;

class PreviewController extends Controller
{
    

    public function preview_amazon_desktop($id)
    {
        
        $userSite = UserSites::where('unique_id', $id)->first(); 
        $todayDate = date('Y-m-d');
        $valid_days = $userSite->valid_days;
        $start_date = $userSite->start_date;
        $valid_date = date('Y-m-d', strtotime($todayDate . ' +10 days'));
        if($todayDate > $valid_date){
            return view('preview.expire');
        }else{
            $site_data_images = UsersitesMedia::where('usersite_id', $userSite->id)->where('asset_type', 'image')->where('status', 'active')->get();
            $site_data_video = UsersitesMedia::where('usersite_id', $userSite->id)->where('asset_type', 'video')->where('status', 'active')->first();
            return view('preview.preview_amazon_desktop', compact('site_data_images', 'site_data_video'));
        }

        
    }

    public function preview_amazon_mobile($id)
    {
        
        $userSite = UserSites::where('unique_id', $id)->first(); 
        $todayDate = date('Y-m-d');
        $valid_days = $userSite->valid_days;
        $start_date = $userSite->start_date;
        $valid_date = date('Y-m-d', strtotime($todayDate . ' +10 days'));
        if($todayDate > $valid_date){
            return view('preview.expire');
        }else{
            $site_data_images = UsersitesMedia::where('usersite_id', $userSite->id)->where('asset_type', 'image')->where('status', 'active')->get();
            $site_data_video = UsersitesMedia::where('usersite_id', $userSite->id)->where('asset_type', 'video')->where('status', 'active')->first();
            return view('preview.preview_amazon_mobile', compact('site_data_images', 'site_data_video'));
        }
        
    }

    public function preview_insta_desktop($id)
    {
        
        $userSite = UserSites::where('unique_id', $id)->first(); 
        $todayDate = date('Y-m-d');
        $valid_days = $userSite->valid_days;
        $start_date = $userSite->start_date;
        $valid_date = date('Y-m-d', strtotime($todayDate . ' +10 days'));
        if($todayDate > $valid_date){
            return view('preview.expire');
        }else{
            $site_data_images = UsersitesMedia::where('usersite_id', $userSite->id)->where('asset_type', 'image')->where('status', 'active')->get();
            return view('preview.preview_insta_desktop', compact('site_data_images'));
        }

    }

    public function preview_insta_mobile($id)
    {
        
        $userSite = UserSites::where('unique_id', $id)->first(); 
        $todayDate = date('Y-m-d');
        $valid_days = $userSite->valid_days;
        $start_date = $userSite->start_date;
        $valid_date = date('Y-m-d', strtotime($todayDate . ' +10 days'));
        if($todayDate > $valid_date){
            return view('preview.expire');
        }else{
            $site_data_images = UsersitesMedia::where('usersite_id', $userSite->id)->where('asset_type', 'image')->where('status', 'active')->get();
            return view('preview.preview_insta_mobile', compact('site_data_images'));
        }

    }

    public function preview_publisher($id)
    {
        $userSite = UserSites::where('unique_id', $id)->first(); 
        $todayDate = date('Y-m-d');
        $valid_days = $userSite->valid_days;
        $start_date = $userSite->start_date;
        $valid_date = date('Y-m-d', strtotime($todayDate . ' +10 days'));
        if($todayDate > $valid_date){
            return view('preview.expire');
        }else{
            $site_data_images = UsersitesMedia::where('usersite_id', $userSite->id)->where('asset_type', 'image')->where('status', 'active')->get();
            return view('preview.preview_publisher', compact('site_data_images'));
        }

    }

    public function preview_expire()
    {
        return view('preview.expire');
    }

    
}
