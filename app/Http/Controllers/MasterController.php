<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sitetypes;
use App\Models\Sites;
use App\Models\SiteError;

class MasterController extends Controller
{


    // master setting
    public function site_types()
    {   
        $sitetypes = Sitetypes::orderBy('id','DESC')->get();
        return view('admin.master.site_types', compact('sitetypes'));
    }

    public function site_type_store(Request $request)
    {   

        $validated = $request->validate([
            'name' => 'required',
        ]);

        $data = array(
            "name"=>$request->input('name'),
        );
        
        $id = Sitetypes::create($data)->id;
        return redirect()->route('admin-site-types')->with('success_add', 'Site type Added Successfully');
    
    }

    public function site_type_edit($id)
    {   
        $sitetype = Sitetypes::where('id',$id)->first();
        if(!empty($sitetype)){
            return view('admin.master.sitetypes_edit',compact('sitetype'));
        }else{
            return redirect()->back()->with('error', 'sitetype not added, please try again. ');
           
        }
    }

    
    public function site_type_update(Request $request)
    { 
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $id = $request->sitetype_id;
        
        $data = array(
            "name"=>$request->name, 
        );
                    
        Sitetypes::where('id',$id)->update($data);
        return redirect()->back()->with('success_add', 'Site type updated Successfully');

    }

     public function delete_sitetype($id)
    {
        $delete = Sitetypes::findOrFail($id);
        if($delete->delete()){
           return redirect()->back()->with('success','Site type Deleted Successfully');
        }
        return redirect()->back()->with('success','Site type Deleted Successfully');
    
    }
// ==============================================================
    public function sites()
    {   
        $sitetypes = Sitetypes::orderBy('id','DESC')->get();
        $sites = Sites::orderBy('id','DESC')->get();
        return view('admin.master.site', compact('sites', 'sitetypes'));
    }

    public function site_store(Request $request)
    {   

        $validated = $request->validate([
            'name' => 'required',
            'sitetype' => 'required',
        ]);

        $data = array(
            "name"=>$request->input('name'),
            "type"=>$request->input('sitetype'),
        );
        
        $id = Sites::create($data)->id;
        return redirect()->route('admin-sites')->with('success_add', 'Site Added Successfully');
    
    }

    public function site_edit($id)
    {   
        $sitetypes = Sitetypes::orderBy('id','DESC')->get();
        $site = Sites::where('id',$id)->first();
        if(!empty($site)){
            return view('admin.master.site_edit',compact('site', 'sitetypes'));
        }else{
            return redirect()->back()->with('error', 'site not added, please try again. ');
           
        }
    }

    
    public function site_update(Request $request)
    { 
        $validated = $request->validate([
            'name' => 'required',
            'sitetype' => 'required',
        ]);

        $id = $request->site_id;
        
        $data = array(
            "name"=>$request->name, 
            "type"=>$request->sitetype,
        );
                    
        Sites::where('id',$id)->update($data);
        return redirect()->back()->with('success_add', 'Site updated Successfully');

    }


     public function delete_site($id)
    {
        $delete = Sites::findOrFail($id);
        if($delete->delete()){
           return redirect()->back()->with('success','Site Deleted Successfully');
        }
        return redirect()->back()->with('success','Site Deleted Successfully');
    
    }


     public function site_upload_errors($id)
    {   
        $site = SiteError::where('id',$id)->first();
        if(!empty($site)){
            return view('admin.master.site_error_edit',compact('site'));
        }else{
            return redirect()->back()->with('error', 'site error not added, please try again. ');   
        }
    }

     public function site_upload_errors_submit($id)
    {   
        $site = Sites::where('id',$id)->first();
        if(!empty($site)){

            $data = array(
                "file_formate"=>$request->file_formate,
                "min_size"=>$request->min_size,
                "max_size"=>$request->max_size,
                "dim_width_height"=>$request->dim_width_height,
                "ratio"=>$request->ratio,
                "dimentions"=>$request->dimentions,
                "asset_type"=>$request->asset_type,
            );
            Sites::where('id',$id)->update($data);
            return redirect()->back()->with('success_add', 'Site errors updated Successfully');
        }else{
            return redirect()->back()->with('error', 'site not added, please try again. ');
           
        }
    }

    public function error_list()
    {   
        $siteerrors = SiteError::orderBy('id','ASC')->get();
        return view('admin.master.error', compact('siteerrors'));
    }
    
    public function site_error_update(Request $request)
    { 
       
        $rules = [
            'dimentions' => 'required',
            'ratio' => 'required',
            'max_size' => 'required',
            'max_no' => 'required',
            'min_no' => 'required',
            'file_formate' => 'required',
        ];
        
        if ($request->input('asset_type') == 'image') {
            $rules['max_width'] = 'required';
            $rules['max_height'] = 'required';
            $rules['width'] = 'required';
            $rules['height'] = 'required';
        }
           
           
        $request->validate($rules);
 
       

        $id = $request->site_id;
        
        $data = array(
            "max_width"=>$request->max_width, 
            "max_height"=>$request->max_height,
            "width"=>$request->width,
            "height"=>$request->height,
            "dimentions"=>$request->dimentions,
            "ratio"=>$request->ratio,
            "max_size"=>$request->max_size,
            "max_no"=>$request->max_no,
            "min_no"=>$request->min_no,
            "file_formate"=>$request->file_formate,
        );
                    
        SiteError::where('id',$id)->update($data);
        return redirect()->back()->with('success', 'Site errors updated Successfully');

    }

    
    
}