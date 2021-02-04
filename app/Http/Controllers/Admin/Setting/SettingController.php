<?php

namespace App\Http\Controllers\Admin\Setting;

use App\model\admin\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Setting;

class SettingController extends Controller
{
    //Site Setting
    public function siteSetting()
    {
        $siteSetting = Setting::first();
        return view('admin.settings.site_setting', compact('siteSetting'));
    }

    //Site Setting Update
    public function siteSettingUpdate(Request $request){
        // validation
        $validation = $request->validate([
            'shop_name'    => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
            'address'    => 'required'
        ]);
        $id = $request->setting_id;

        $siteUpdate   = Setting::find($id);
        $siteUpdate->shop_name = $request->shop_name;
        $siteUpdate->email = $request->email;
        $siteUpdate->phone = $request->phone;
        $siteUpdate->vat = $request->vat;
        $siteUpdate->shipping_charge = $request->shipping_charge;
        $siteUpdate->facebook_url = $request->facebook_url;
        $siteUpdate->twitter_url = $request->twitter_url;
        $siteUpdate->youtube_url = $request->youtube_url;
        $siteUpdate->vimeo_url = $request->vimeo_url;
        $siteUpdate->address = $request->address;
        $siteUpdate->copyright = $request->copyright;
        $siteUpdate->save();
        // Notification...
        $notification=array(
            'messege'=>'Site Setting Update successfuly',
            'alert-type'=>'success'
        );
        // Redirect
        return redirect()->back()->with($notification);
    }

    //Seo Edit
    public function seoEdit()
    {
        $seo = Seo::first();
        return view('admin.settings.seo', compact('seo'));
    }
    
    public function seoUpdate(Request $request)
    {
        // validatin
        $validation = $request->validate([
            'meta_title'  => 'required',
            'meta_author' => 'required',
            'meta_tag'    => 'required',
        ]);

        $id = $request->seo_id;

        $seo      = Seo::find($id);
        $seo->meta_title = $request->meta_title;
        $seo->meta_author = $request->meta_author;
        $seo->meta_tag = $request->meta_tag;
        $seo->meta_description = $request->meta_description;
        $seo->google_analytics = $request->google_analytics;
        $seo->bring_analytics = $request->bring_analytics;
        $seo->save();
        // Notification...
        $notification=array(
            'messege'=>'Seo setting successfuly',
            'alert-type'=>'success'
        );
        // Redirect
        return redirect()->route('admin.settings.index')->with($notification);
    }
}
