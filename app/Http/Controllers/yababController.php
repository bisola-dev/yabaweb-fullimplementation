<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\stat;
use App\Models\basikk;
use App\Models\scrollzy;
use App\Models\qwik;
use App\Models\cate;
use App\Models\paymenttype;
use App\Models\manage;
use Session;
use Validator;


class yababController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



  


    public function login(){

        return view('yabab.login');
    } 
    
    public function unauthorized(){

        return view('unauthorized');
    } 
    

    public function adminlogin(Request $request){
        $admail=$request->input('admail');
        $pass=$request->input('pass');

        $dopwd='yabacolea'.$pass;

       $hpazz=md5($dopwd);
//dd($hpazz.$admail);

    $yabab=User::where('admail','=', $admail)->where('hpazz', '=', $hpazz)->get()->first();
    if($yabab){
   Session::put('id', $yabab->id);
   Session::put('admail', $yabab->admail);
   Session::put('fullnzx',$yabab->fullnzx);
   Session::put('categl', $yabab->categl);
   Session::put('hpazz', $yabab->hpazz);
 
 

   return redirect::to('/adminhome')->withsuccess('you have successfully logged in');
   } else{
   return back()->witherrors('wrong email and password,please retry or register');
 
   }
   
}



public function adminhome(){
   
    return view('yabab.adminhome');
} 



public function basikinfo(){ 

    $basikk=basikk::all();
   // return $basikk;

    return view('yabab.basikinfo',compact('basikk'));

} 



public function createbasikinfo(Request $request)
 {$this->validate(request(),[
  'fonyz'=>'required',
  'emalyz'=>'required',
  'welcumyz'=>'required',
  'mapyz'=>'required',
  'posyz'=>'required',
  'utubeyz'=>'required'
  ]); 
  $basikk= basikk::count(); //returns products count
if($basikk == 0){
    //basikk table is empty
    $data = $request->input(); 
    $basikk = new basikk();
    $basikk->fonyz=$data['fonyz'];
    $basikk->emalyz=$data['emalyz'];
    $basikk->welcumyz=$data['welcumyz'];
    $basikk->mapyz=$data['mapyz'];
    $basikk->posyz=$data['posyz'];
    $basikk->utubeyz=$data['utubeyz'];
    $basikk->save(); 
    return back()->withsuccess('you have successfully created your details');
 }
else{
    return back()->witherrors('You can only fill this data once but you can edit below');
}
 }

 public function updatebasikinfo(Request $request,$id)
 {$this->validate(request(),[
  'fonyz'=>'required',
  'emalyz'=>'required',
  'welcumyz'=>'required',
  'mapyz'=>'required',
  'posyz'=>'required',
  'utubeyz'=>'required'
  ]); 

  $basikk= basikk::find($request->get('id'));
  if ($id!="") {

    $data = $request->input(); 
    $basikk->fonyz=$data['fonyz'];
    $basikk->emalyz=$data['emalyz'];
    $basikk->welcumyz=$data['welcumyz'];
    $basikk->mapyz=$data['mapyz'];
    $basikk->posyz=$data['posyz'];
    $basikk->utubeyz=$data['utubeyz'];
    $basikk->update(); 
    return back()->withsuccess('you have successfully updated your basic details');
 }

 }
 

 public function deletebasik(Request $request, $id)
 {
 $basikk = basikk::find($request->get('id'));
if ($id!="") { 
$basikk ->delete();
 return Redirect('basikkinfo')->withsuccess('details deleted successfully');     
 }
else{
return back()->witherrors('details not deleted successfully');

}

}


public function scrollingtext(){
  $scrollzy=scrollzy::all();

return view('yabab.scrollingtext', compact('scrollzy'));

}

public function createscrol(Request $request)
    {$this->validate(request(),[
        'smalyz'=>'required',
        'bigyz'=>'required',
        'linyz'=>'required',
        'lurlyz'=>'required',     
        ]); 
        
          $data = $request->input(); 
          $scrollzy = new scrollzy();
          $scrollzy->smalyz=$data['smalyz'];
          $scrollzy->bigyz=$data['bigyz'];
          $scrollzy->linyz=$data['linyz'];
          $scrollzy->lurlyz=$data['lurlyz'];
          $scrollzy->save(); 
          return back()->withsuccess('you have successfully created your scroll details');
       }
    


public function updatescrol(Request $request,$id)
 {$this->validate(request(),[
  'smalyz3'=>'required',
  'bigyz3'=>'required',
  'linyz3'=>'required',
  'lurlyz3'=>'required'
  ]); 
    
  $scrollzy= scrollzy::find($request->get('id'));
  if ($id!="") {
    $data = $request->input(); 
    $scrollzy->smalyz=$data['smalyz3'];
    $scrollzy->bigyz=$data['bigyz3'];
    $scrollzy->linyz=$data['linyz3'];
    $scrollzy->lurlyz=$data['lurlyz3'];
    $scrollzy->update(); 
    return back()->withsuccess('you have successfully updated your scroll details');
 }

 }

 public function deletescrol(Request $request, $id)
 {
 $scrollzy = scrollzy::find($request->get('id'));
if ($id!="") { 
$scrollzy->delete();
 return back()->withsuccess('details deleted successfully');     
 }
else{
return back()->witherrors('details not deleted successfully');

}

}


public function createpay(){

    $paymenttype = paymenttype::all();
return view('yabab.createpay', compact('paymenttype'));

}

public function stat(){

    $stat = stat::all();
return view('yabab.stat', compact('stat'));

}

public function createpaytype(Request $request)
    {$this->validate(request(),[
        'namkzx'=>'required',

        ]); 

          $data = $request->input(); 
          $paymenttype= new paymenttype();
          $paymenttype->namkzx=$data['namkzx'];
          $paymenttype->save(); 
          return back()->withsuccess('you have successfully created your payment type details');
       }
    

       public function statpro(Request $request)
    {$this->validate(request(),[
        'namkzx'=>'required',

        ]); 

          $data = $request->input(); 
          $stat =new stat();
          $stat->namkzx=$data['namkzx'];
          $stat->save(); 
          return back()->withsuccess('you have successfully created a status type');
       }
    

       public function updatecreatepay(Request $request,$id)
       {$this->validate(request(),[
        'namkzx3'=>'required',
        ]); 
          
        $paymenttype=paymenttype::find($request->get('id'));
        if ($id!="") {
          $data = $request->input(); 
          $paymenttype->namkzx=$data['namkzx3'];
          $paymenttype->update(); 
          return back()->withsuccess('you have successfully updated your Payemnt type details');
       }
      
       }

       public function updatestat(Request $request,$id)
       {$this->validate(request(),[
        'namkzx3'=>'required',
        ]); 
          
        $stat=stat::find($request->get('id'));
        if ($id!="") {
          $data = $request->input(); 
          $stat->namkzx=$data['namkzx3'];
          $stat->update(); 
          return back()->withsuccess('you have successfully updated your status type ');
       }
      
       }
      
       public function deletecreatepay(Request $request, $id)
       {
        $paymenttype = paymenttype::find($request->get('id'));
        if ($id!="") { 
        $paymenttype->delete();
       return back()->withsuccess('payment type  deleted successfully');     
       }
      else{
      return back()->witherrors('payment type not deleted successfully');
      
      }
      
      }

      public function deletestat(Request $request, $id)
      {
       $stat= stat::find($request->get('id'));
       if ($id!="") { 
        $stat->delete();
      return back()->withsuccess('payment type  deleted successfully');     
      }
     else{
     return back()->witherrors('payment type not deleted successfully');
     
     }
     
     }
     
      


public function quicklink(){

    $qwik=qwik::all();
    $paymenttype=paymenttype::all();
    $payment=paymenttype::all();
return view('yabab.quicklink', compact('qwik','paymenttype','payment'));

}

public function createqwik(Request $request)
    {$this->validate(request(),[
        'linqkx'=>'required',
        'linuqkx'=>'required',
        'catekx'=>'required',
       
        ]); 
        
          $data = $request->input(); 
          $qwik = new qwik ();
          $qwik ->linqkx=$data['linqkx'];
          $qwik ->linuqkx=$data['linuqkx'];
          $qwik ->catekx=$data['catekx'];
          $qwik ->save(); 
          return back()->withsuccess('you have successfully created your quicklink  details');
       }
    


public function updateqwik(Request $request,$id)
 {$this->validate(request(),[
    'linqkx3'=>'required',
    'linuqkx3'=>'required',
    'catekx3'=>'required',
   
    ]); 
      
    $qwik = qwik ::find($request->get('id'));
  if ($id!="") {
      $data = $request->input(); 
      $qwik ->linqkx=$data['linqkx3'];
      $qwik ->linuqkx=$data['linuqkx3'];
      $qwik ->catekx=$data['catekx3'];
      $qwik->update(); 

    return back()->withsuccess('you have successfully updated your quicklink details');
 }
 }
 

 public function deleteqwik(Request $request, $id)
 {
 $qwik = qwik::find($request->get('id'));
if ($id!="") { 
$qwik->delete();
 return back()->withsuccess('details deleted successfully');     
 }
else{
return back()->witherrors('details not deleted successfully');

}
 }

public function manage(){
$mgt=manage::all();
return view('yabab.manage',compact('mgt'));

}

public function createman(Request $request)
    {$this->validate(request(),[
        'fullnamzx'=>'required',
        'poszx'=>'required',
       
        ]); 
        
          $data = $request->input(); 
          $mgt= new manage();
          $mgt ->fullnamzx=$data['fullnamzx'];
          $mgt->poszx=$data['poszx'];
          $mgt->save(); 
          return back()->withsuccess('you have successfully created your Management details');
       }
    


public function updateman(Request $request,$id)
       {$this->validate(request(),[
        'fullnamzx3'=>'required',
        'poszx3'=>'required',
         
          ]); 
            
          $mgt = manage::find($request->get('id'));
        if ($id!="") {
          $data = $request->input(); 
          $mgt->fullnamzx=$data['fullnamzx3'];
          $mgt->poszx=$data['poszx3'];
          $mgt->update(); 
      
          return back()->withsuccess('you have successfully updated your management details');
       }
       }
       
       public function deleteman(Request $request, $id)
       {
        $mgt = manage::find($request->get('id'));
      if ($id!="") { 
        $mgt->delete();
       return back()->withsuccess('details deleted successfully');     
       }
      else{
      return back()->witherrors('details not deleted successfully');
      
      }
       }

public function newadmin(){
        $sadmin=User::all();
        return view('yabab.newadmin',compact('sadmin'));
        } 
    
        
 public function createadmin(Request $request)
            {$this->validate(request(),[
                'admail'=>'required',
                'fullnzx'=>'required',
                'pass'=>'required',
                'categl'=>'required',
               
                ]); 

          $pass=$request->input('pass');

           $dopwd='yabacolea'.$pass;

           $hpazz=md5($dopwd);
                
            $data = $request->input(); 
            $sadmin= new User();
            $sadmin->admail=$data['admail'];
            $sadmin->fullnzx=$data['fullnzx'];
            $sadmin->categl=$data['categl'];
            $sadmin->hpazz=$hpazz;
            $sadmin->save(); 
            return back()->withsuccess('you have successfully created your Management details');
               }
               
               
 public function deleteadmin(Request $request, $id){   
         
    $yadmin= User::where('id', '=',$request->get('id'))->pluck('categl')->first();
     if($yadmin==1){
    return back()->witherrors('you cannot delete a super admin account'); }
    else if($yadmin!=1 AND $id!=""){
    $sadmin = User::find($request->get('id'));
    $sadmin->delete();
    return back()->withsuccess('details deleted successfully'); }    
     else{
     return back()->witherrors('details not deleted successfully');  
    }
 }
  
 
 public function changepass(){
 return view('yabab.changepass');
    } 

              
 public function updateadmin(Request $request,$id)
 {$this->validate(request(),[
    //$schidy=\Session::get('schidy');
'id'=>'required',
'oldpassword'=>'required',
'password'=>'required|different:oldpassword',
'newpassword'=>'required|same:password'

]); 

$olpass=$request->input('oldpassword');
$pass=$request->input('password');
$id=$request->input('id');

$dopwdty='yabacolea'.$olpass;
$hpazzty=md5($dopwdty); 

$dopwd='yabacolea'.$pass;
$hpazz=md5($dopwd); 

$yadmin= User::where('id', '=', $id)->pluck('hpazz')->first();

if($yadmin==$hpazzty){
$sadmin= User::where('id', '=', $id)->update([
'hpazz' => $hpazz,
  
  ]);

 return redirect('login')->withsuccess('you have successfully changed your password');
       }
else{
    return back()->witherrors('oldpassword doesnt match , please enter your previous password to be changed');
}
 
}



public function welcome(Request $request)
 {
   return view('welcome');
}



public function cate(Request $request){
    $cate=cate::all();
    return view('yabab.cate', compact('cate'));
 } 
 
 public function createcatetype(Request $request)
  {$this->validate(request(),[
   'caten'=>'required',
   ]); 
   
     $data = $request->input(); 
     $cate= new cate();
     $cate->caten=$data['caten'];
     $cate->save(); 
 
     return back()->withsuccess('you have successfully created a category.');
  }
 
 
 
  public function updatecate(Request $request, $id)
 {$this->validate(request(),[
    'id'=>'required',
    'caten3'=>'required',
 
    ]); 
   
    $cate= cate::find($request->get('id'));
    if ($id!="") {
    
      $data = $request->input(); 
      $cate->caten=$data['caten3'];
      $cate->update();  
 
      return back()->withsuccess('you have successfully updated a category');
   }
 
 
 }
 
 public function deletecate(Request $request, $id)
 {  $cate= cate::find($request->get('id'));
  if ($id!="") { 
    $cate->delete();
 return back()->withsuccess('Category  deleted successfully');     
 }
 else{
 return back()->witherrors('Category not deleted ');
 
 }
 
 }
   

 public function scrolimg(Request $request, $id)

{$request->validate([
    'scrolimg' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

  $scrollzy=scrollzy::find($request->get('id'));
    if($request->file('scrolimg')){
        $file= $request->file('scrolimg');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/scrolimg'), $filename);
        $scrollzy['scrolimg']= $filename;
        $scrollzy ->update();

return back()->withsuccess('scroll  image updated successfully.','');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}

                

public function logout(Request $request)
 {
 $request->Session()->flush();

  
     return redirect('login');
 }







    public function index()
    {
        {
            $User=User::all();
            return $User;
            }
      
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        return new UserResource($User);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
