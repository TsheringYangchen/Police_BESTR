<?php

namespace App\Http\Controllers\Front;

use App\User;
use Redirect;
use App\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;


class RegistrationController extends Controller
{

    public function index()
    {
        return view('front.registration.index');
    }

    public function license(Request $request){
    
        $request->validate([
            'license_no' => 'required|max:9',
            'license_name' => 'required',
            'cid' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'license_type' => 'required',
            'image' => 'required',
        ]);
       // Upload the image
       if ($request->hasFile('image')) {
        $image = $request->image;
        $image->move('uploads', $image->getClientOriginalName());
        }
        //Save the products
       License::create([
            'license_no' => $request->license_no,
            'license_name' => $request->license_name,
            'cid' => $request->cid,
            'phone' => $request->phone,
            'location' => $request->location,
            'license_type' => $request->license_type,
            'image' => $request->image->getClientOriginalName(),
            
        ]);


        // Sign the user in
        $request->session()->flash('msg', 'License Holders has been added successfully');

        // Redirect to
        return redirect('/admin/products/create');
    }

    public function store(Request $request)
    {

        // Validate the user
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        // Save the data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Sign the user in
        auth()->login($user);

        $request->session()->flash('msg', 'Your user has been added');

        // Redirect to
        return redirect('/admin/products/create');
    }
   public function viewLicense()
   {
        $license=License::paginate(3);     
        return view('admin.products.viewLicense',['licenses'=>$license]);
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $licenses = License::where('license_name', 'LIKE', '%'.$q.'%')
                            ->orWhere('license_no', 'LIKE', '%'.$q.'%')
                            ->get();
        if(count($licenses) > 0)                    
            return view('admin.products.search',compact('licenses'));
        }
        return redirect('/admin/viewLicense')->with('msg','No results found');

    }
    
    public function editLicense($id)    
    {
        $license = License::find($id);
        return view('admin.products.license-edit',compact('license'));
    }
    public function update(Request $request, $id)
    {
        $license = License::find($id);

        $license->license_name=$request->input('license_name');
        $license->license_no=$request->input('license_no');
        $license->cid=$request->input('cid');
        $license->phone=$request->input('phone');
        $license->location=$request->input('location');
        $license->license_type=$request->input('license_type'); 
       
        if ($request->hasfile('image'))
         {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads', $filename);
            $license->image = $filename;
            }

        $license->save();
        return redirect('admin/viewLicense')->with('license',$license);
    }

    public function  deleteLicense($id){
        $licenses = License::findOrFail($id);  
        $licenses->delete();
        return redirect('/admin/viewLicense');
    }

    public function Holder(Request $request){

        $request -> validate([
            
            'no'=>'required'
        ]);   

    if ($holder = License::where('license_no','=', Input::get('no'))->first())
    {
        return redirect::route('status');
    }
    
    else
    {
         // Session message
        return back()->with('msg','You have entered wrong License No');
    }
    }
    
}
