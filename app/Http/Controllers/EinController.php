<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Ein;
use DB;

class EinController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'license_no' => 'required',
            'license_name' => 'required',
            'cid' => 'required',
            'violation_date' => 'required',
            'image' => 'required',
        ]);
       // Upload the image
       if ($request->hasFile('image')) {
        $image = $request->image;
        $image->move('uploads/ein', $image->getClientOriginalName());
        }
        //Save the products
       ein::create([
        'license_no' => $request->license_no,
        'license_name' => $request->license_name,
        'cid' => $request->cid,
        'violation_date' => $request->violation_date,
        'image' => $request->image->getClientOriginalName()
            
        ]);
        $request->session()->flash('msg', 'EIN Issued successfully');
        // Redirect to
        return view('front/ein');
    }

    public function search()
    {
        $q = Input::get('q');
        if($q != "")
        {
            $issuers = Ein::where('license_no', 'LIKE', '%'.$q.'%')
                           ->get();
        if(count($issuers) > 0)                    
            return view('admin.searchEin',compact('issuers'));
        }
        return redirect('/admin/viewein')->with('msg','No results found');

    }

    public function viewein()
    {
        $issuer=Ein::paginate(10);     
          return view('admin.viewein',['issuers'=>$issuer]);
    }
    
}
