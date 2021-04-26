<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Issuer;
use DB;
use Redirect;

class IssuerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.issuers.create');

    }
   
    public function provide(Request $request){
    
        $request->validate([
            'provider_name' => 'required',
            'cid' => 'required',
            'designation' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);
        // Save the data
        $issuer = Issuer::create([
            'provider_name' => $request->get('provider_name'),
            'cid' => $request->get('cid'),
            'designation' => $request->get('designation'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'confirm_password' => $request->get('confirm_password'),
        ]);

          // Redirect to
          return redirect('/admin/issuers/create')->with('msg', 'BIN/EIN Providers has been created');
      }
     

      public function viewIssuer()
      {
          $issuer=Issuer::paginate(3);     
          return view('admin.issuers.viewIssuer',['issuers'=>$issuer]);
      }

      public function find()
      {
          $q = Input::get('q');
          if($q != "")
          {
              $issuers = Issuer::where('provider_name', 'LIKE', '%'.$q.'%')
                              ->orWhere('cid', 'LIKE', '%'.$q.'%')
                             ->get();
          if(count($issuers) > 0)                    
              return view('admin.issuers.searchIssuer',compact('issuers'));
          }
          return redirect('/admin/viewIssuer')->with('msg','No results found');
  
      }
      public function editIssuer($id)    
      {
          $issuer = Issuer::find($id);
         // return view('admin.issuers.issuer-edit',compact('issuer'));
         return view('admin.issuers.issuer-edit')->with('issuer',$issuer);
      }

      public function update(Request $request, $id)
      {
        $issuer = Issuer::find($id);

            $issuer->provider_name=$request->input('provider_name');
            $issuer->cid=$request->input('cid');
            $issuer->designation=$request->input('designation');
            $issuer->phone=$request->input('phone');
            $issuer->email=$request->input('email');
            $issuer->password=$request->input('password');
            $issuer->confirm_password=$request->input('confirm_password');

        $issuer->save();
         
        return redirect('admin/viewIssuer')->with('issuer',$issuer);
      }

      public function  deleteIssuer($id){
        $issuers = Issuer::findOrFail($id);  
        $issuers->delete();
        return redirect('/admin/viewIssuer');
    }
}
