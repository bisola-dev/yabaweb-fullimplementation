<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Image;
use DataTables;
use App\Models\skooldeet;
use App\Models\task;
use App\Models\bur;
use App\Models\cate;
use App\Models\news;
use App\Models\servstaff;
use App\Models\know;
use App\Models\event;
use App\Models\progstat;
use App\Models\stat;
use App\Models\reg;
use App\Models\lib;
use App\Models\serv;
use App\Models\acad;
use App\Models\acadstaff;
use App\Models\libstaff;
use App\Models\burstaff;
use App\Models\deppt;
use App\Models\staff;
use App\Models\addedstaff;
use App\Models\regstaff;
use App\Models\schhis;
use App\Models\alum;
use App\Models\newprog;
class schservController extends Controller
{
    //

    public function managesch(){
        $skooldeet= skooldeet::all();
        return view('schserv.managesch', compact('skooldeet'));
    } 



          

public function createskol(Request $request)
 {$this->validate(request(),[
  'skolssn'=>'required',
  ]); 
  
    $data = $request->input(); 
    $skooldeet = new skooldeet();
    $skooldeet->skolssn=$data['skolssn'];
    $skooldeet->save(); 
    return back()->withsuccess('you have successfully created a school');
 }

 public function editskol(Request $request, $id)
 {$this->validate(request(),[
  'skols3'=>'required',
  ]); 

  $skooldeet =  skooldeet::find($request->get('id'));
  if ($id!="") {
    $data = $request->input(); 
    $skooldeet->skolssn=$data['skols3'];
    $skooldeet->update(); 

    return back()->withsuccess('you have successfully updated a school');
 }
else{
    return back()->witherrors('please retry,school not  updated ');

 }
}

public function deleteskol(Request $request, $id)
{
$skooldeet=skooldeet::find($request->get('id'));
 if ($id!="") { 
$skooldeet->delete();
return back()->withsuccess('school  deleted successfully');     
}
else{
return back()->witherrors('school not deleted ');

}

}

public function skoladd(Request $request, $id){
    $skooldeet=skooldeet::all()->where('id','=', $request['id']);
    $skooldeetm=skooldeet::all()->where('id','=', $request['id']);
   return view('schserv.skoladd', compact('skooldeet','skooldeetm'));
} 



 public function  skoldetupdate(Request $request, $id)
 {$this->validate(request(),[
  'id'=>'required',
  'skolssn'=>'required',
  'skolsh'=>'required',
  'skolsacr'=>'required',
  'skolsfn'=>'required',
  ]); 

  $skooldeet = skooldeet::find($request->get('id'));
  if ($id!="") {
  
    $data = $request->input(); 
    $skooldeet->skolssn=$data['skolssn'];
    $skooldeet->skolsh=$data['skolsh'];
    $skooldeet->skolsacr=$data['skolsacr'];
    $skooldeet->skolsfn=$data['skolsfn'];
    $skooldeet->update();  
    return back()->withsuccess('you have successfully updated a school detail');
 }
 

}


public function skolprofprocess(Request $request, $id)
{$this->validate(request(),[
 'id'=>'required',
 'skolssn'=>'required',
 'skolsh'=>'required',
 'skolsacr'=>'required',
 'skolsfn'=>'required',
 'supoloc'=>'required',
 'supoemal'=>'required',
 'supofon'=>'required',
 'deansprof'=>'required',
 'abtskol'=>'required',
 'hiskol'=>'required',


 ]); 

 $skooldeet = skooldeet::find($request->get('id'));
 if ($id!="") {
 
   $data = $request->input(); 
   $skooldeet->skolssn=$data['skolssn'];
   $skooldeet->skolsh=$data['skolsh'];
   $skooldeet->skolsacr=$data['skolsacr'];
   $skooldeet->skolsfn=$data['skolsfn'];
   $skooldeet->supoloc=$data['supoloc'];
   $skooldeet->supoemal=$data['supoemal'];
   $skooldeet->supofon=$data['supofon'];
   $skooldeet->deansprof=$data['deansprof'];
   $skooldeet->abtskol=$data['abtskol'];
   $skooldeet->hiskol=$data['hiskol'];
   $skooldeet->update();  
   return back()->withsuccess('you have successfully updated a school profile');
}


}


public function editskolprof(Request $request, $id)
{$this->validate(request(),[
 'id'=>'required',
 'skolssn3'=>'required',
 'skolsh3'=>'required',
 'skolsacr3'=>'required',
 'skolsfn3'=>'required',
 'supoloc3'=>'required',
 'supoemal3'=>'required',
 'supofon3'=>'required',
 'deansprof3'=>'required',
 'abtskol3'=>'required',
 'hiskol3'=>'required',


 ]); 

 $skooldeet = skooldeet::find($request->get('id'));
 if ($id!="") {
 
   $data = $request->input(); 
   $skooldeet->skolssn=$data['skolssn3'];
   $skooldeet->skolsh=$data['skolsh3'];
   $skooldeet->skolsacr=$data['skolsacr3'];
   $skooldeet->skolsfn=$data['skolsfn3'];
   $skooldeet->supoloc=$data['supoloc3'];
   $skooldeet->supoemal=$data['supoemal3'];
   $skooldeet->supofon=$data['supofon3'];
   $skooldeet->deansprof=$data['deansprof3'];
   $skooldeet->abtskol=$data['abtskol3'];
   $skooldeet->hiskol=$data['hiskol3'];
   $skooldeet->update();  
   return back()->withsuccess('you have successfully updated a school profile');
}


}

public function skolprofdel(Request $request, $id)
{
$skooldeet=skooldeet::find($request->get('id'));
 if ($id!="") { 
$skooldeet->delete();
return redirect('managesch')->withsuccess('school  deleted successfully');     
}
else{
return back()->witherrors('school not deleted ');

}

}

public function skoldetdel(Request $request, $id)
{
$skooldeet=skooldeet::find($request->get('id'));
 if ($id!="") { 
$skooldeet->delete();

return back()->withsuccess('school  deleted successfully');     
}
else{
return back()->witherrors('school not deleted ');

}

}


public function upskologo(Request $request, $id)

{$request->validate([
    'skologo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

  $skooldeet = skooldeet::find($request->get('id'));
    if($request->file('skoologo')){
        $file= $request->file('skoologo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/skoologo'), $filename);
        $skooldeet ['skoologo']= $filename;
    
        $skooldeet ->update();

return back()->withsuccess('school logo  updated successfuly.');;
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}

}

public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }


public function deanlogo(Request $request, $id)

{$request->validate([
    'deanlogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

  $skooldeet = skooldeet::find($request->get('id'));
    if($request->file('deanlogo')){
        $file= $request->file('deanlogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/deanlogo'), $filename);
        $skooldeet ['deanlogo']= $filename;
    
        $skooldeet ->update();

return back()->withsuccess('Dean logo  updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}

public function skolprofile(Request $request, $id){
   $skooldeet=skooldeet::all()->where('id','=', $request['id']);
   $schhis=schhis::all()->where('skolid','=', $request['id']);
   return view('schserv.skolprofile', compact('skooldeet','schhis'));
} 



public function adddept(Request $request, $id){
   $skooldeet=skooldeet::all()->where('id','=', $request['id']);
   $deppt=deppt::all()->where('skolid','=', $request['id']);
    return view('schserv.adddept', compact('skooldeet','deppt'));
 } 


public function adddeptdpro(Request $request){
   {$this->validate(request(),[
      'skolid'=>'required',
      'deptnam'=>'required',
      ]); 
      
        $data = $request->input(); 
        $deppt= new deppt();
        $deppt->deptnam=$data['deptnam'];
        $deppt->skolid=$data['skolid'];
        $deppt->save(); 
        return back()->withsuccess('Department successfully created.');
     }
 } 
 
 public function deptupdate(Request $request,$id){
   {$this->validate(request(),[
      'id'=>'required',
      'skolid3'=>'required',
      'deptnam3'=>'required',
      ]); 

       $deppt = deppt::find($request->get('id'));
       if($id!=""){
        $data = $request->input(); 
        $deppt->deptnam=$data['deptnam3'];
        $deppt->skolid=$data['skolid3'];
        $deppt->update(); 
        return back()->withsuccess('Department successfully created.');
     }
     else{
      return back()->witherror('update not successful.'); 
     }
 } 
 }


 public function adddeptdel(Request $request, $id)
 {
 $deppt=deppt::find($request->get('id'));
  if ($id!="") { 
 $deppt->delete();

 return back()->withsuccess('department deleted successfully');     
 }
 else{
 return back()->witherrors('department not deleted ');
 
 }
 
 }
 public function devdept(Request $request,$id){
   $skooldeet=skooldeet::all()->where('id','=', $request['id']);
   $deppt=deppt::all()->where('id','=', $request['id']);
   //$staff=staff::select(DB::raw("CONCAT(fname, ' ', oname, ' ', sname) as fullname"))->get();
   $staff=staff::all();
   return view('schserv.devdept', compact('skooldeet','deppt','staff'));
 } 

 public function devdeptproc(Request $request,$id){
   {$this->validate(request(),[
      'id'=>'required',
      'deptnam'=>'required',
      'depatkro'=>'required',
      'depatitl'=>'required',
      'abtdept'=>'required',
      'hisdept'=>'required',
      
      ]); 

       $deppt = deppt::find($request->get('id'));
       if($id!=""){
        $data = $request->input(); 
        $deppt->deptnam=$data['deptnam'];
        $deppt->depatkro=$data['depatkro'];
        $deppt->depatitl=$data['depatitl'];
        $deppt->abtdept=$data['abtdept'];
        $deppt->hisdept=$data['hisdept'];
        $deppt->update(); 
        return back()->withsuccess('Department details  successfully created.');
     }
     else{
      return back()->witherror('update not successful.'); 
     }
 } 
 }
 

 

 public function addstaff(Request $request){
   {$this->validate(request(),[
      'fullnam'=>'required',
      'skolid'=>'required',
      'deptid'=>'required',
      
      ]); 

      $data = $request->input(); 
      $addedstaff= new addedstaff();
      $addedstaff->fullnam=$data['fullnam'];
      $addedstaff->deptid=$data['deptid'];
      $addedstaff->skolid=$data['skolid'];
      $addedstaff->save(); 

      $addedstaff = addedstaff::all()->where('deptid','=', $request['deptid']);
      $skooldeet = skooldeet::all()->where('id','=',$request['skolid']);
      return back()->withsuccess('staff successfully added ');   
      //return view('schserv.addedstaff', compact('addedstaff','skooldeet'));

   }
} 


public function addedstaff($skolid,$id,){ 

   $addedstaff = addedstaff::all()->where('deptid','=', $id);
   $skooldeet = skooldeet::all()->where('id','=', $skolid);
   $deppt = deppt::all()->where('id','=', $skolid);
   return view('schserv.addedstaff', compact('addedstaff','skooldeet','deppt'));
 } 



 public function staffdel(Request $request, $id)
{$addedstaff = addedstaff::find($request->get('id'));
 if ($id!="") { 
 $addedstaff->delete();
return redirect('addstaff')->withsuccess('staff deleted successfully');     
}
else{
return back()->witherrors('staff not deleted ');

}

}
 

public function hodimg(Request $request, $id)

{$request->validate([
    'hodimg' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

  $deppt= deppt::find($request->get('id'));
    if($request->file('hodimg')){
        $file= $request->file('hodimg');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/hodimg'), $filename);
        $deppt['hodimg']= $filename;
        $deppt ->update();

return back()->withsuccess('Hod image updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}

public function unitimg(Request $request, $id)

{$request->validate([
    'unitimg' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, jpeg, bmp and png file types.
    ]);

  $deppt= deppt::find($request->get('id'));
    if($request->file('unitimg')){
        $file= $request->file('unitimg');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/unitimg'), $filename);
        $deppt['unitimg']= $filename;
        $deppt ->update();

return back()->withsuccess('Unit image updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}


public function abtimg(Request $request)
{$request->validate([
   'id'=>'required',
   'imgnam'=>'required',
   'abtimg' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, .bmp and .png file types.
   ]);
   $id=$request->input('id');
   $imgnam=$request->input('imgnam');
   $file = $request->file('abtimg');

 $filename=$file->hashName();
 $file->move(public_path('storage/abtimg'), $filename);

   $data= ['skolid'=>$id,
            'imgnam'=>$imgnam,
        'image'=>$filename,

  ];
   $store= schhis::insert($data);
if($store){
return back()->withsuccess('About school image updated successfully.');
 
}
else {
  return back()->witherrors('please try again , error inserting record.');
  
}
}


public function histimg(Request $request)
{$request->validate([
   'id'=>'required',
   'imgnam'=>'required',
   'hisimg' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, jpeg,bmp and png file types.
   ]);
   $id=$request->input('id');
   $imgnam=$request->input('imgnam');
   $file = $request->file('hisimg');

 $filename=$file->hashName();
 $file->move(public_path('storage/hisimg'), $filename);

   $data= ['skolid'=>$id,
            'imgnam'=>$imgnam,
        'image'=>$filename,

  ];
   $store= schhis::insert($data);
if($store){
return back()->withsuccess('About History image updated successfully.');
 
}
else {
  return back()->witherrors('please try again , error inserting record.');
  
}
}


public function viewimage(Request $request,$id){
   $skooldeet=skooldeet::all()->where('id','=', $request['id']);
   $schhis=schhis::all()->where('skolid','=', $request['id'])->where('imgnam','=','schimg');
   $schhis2=schhis::all()->where('skolid','=', $request['id'])->where('imgnam','=','hisimg');
   return view('schserv.viewimage', compact('schhis','skooldeet','schhis2'));
} 

public function newprog($id,$skolid){
   $skooldeet=skooldeet::all()->where('id','=', $skolid);
   $deppt=deppt::all()->where('id','=', $id);
   $newprog=newprog::all()->where('deptid','=', $id)->where('skolid','=', $skolid);
   return view('schserv.newprog', compact('newprog','skooldeet','deppt'));
} 


public function addprog(Request $request)
 {$this->validate(request(),[
  'skolid'=>'required',
  'deptid'=>'required',
  'prog'=>'required',
  ]); 
  
  
    $data = $request->input(); 
    $newprog = new newprog();
    $newprog->skolid=$data['skolid'];
    $newprog->deptid=$data['deptid'];
    $newprog->prog=$data['prog'];
    $newprog ->save(); 
    return back()->withsuccess('you have successfully created a programme');
 }


 public function progupdate(Request $request,$id){
   {$this->validate(request(),[
      'id'=>'required',
      'prog3'=>'required',
      
      ]); 

       $newprog = newprog::find($request->get('id'));
       if($id!=""){
        $data = $request->input(); 
        $newprog->prog=$data['prog3'];
        $newprog->update(); 
        return back()->withsuccess('programme updated .');
     }
     else{
      return back()->witherror('update not successful.'); 
     }
 } 
 }
 

 public function addprogdel(Request $request, $id)
 {$newprog = newprog::find($request->get('id'));
  if ($id!="") { 
   $newprog->delete();
 return back()->withsuccess('programme deleted successfully');     
 }
 else{
 return back()->witherrors('programmenot deleted ');
 
 }
 
 }

 public function schimgdel(Request $request, $id)
 {$schhis = schhis::find($request->get('id'));
  if ($id!="") { 
   $schhis->delete();
 return back()->withsuccess(' School image deleted successfully');     
 }
 else{
 return back()->witherrors('image not deleted ');
 
 }
 
 }


 public function hisimgdel(Request $request, $id)
 {$schhis = schhis::find($request->get('id'));
  if ($id!="") { 
   $schhis->delete();
 return back()->withsuccess(' History image deleted successfully');     
 }
 else{
 return back()->witherrors('image not deleted ');
 
 }
 
 }




 public function addviewprog($id,$skolid,$deptid)
 { $skooldeet=skooldeet::all()->where('id','=', $skolid);
   $deppt=deppt::all()->where('id','=', $deptid);
   $newprog=newprog::all()->where('id','=', $id);
   $stat=stat::all();
     $progstat= DB::table('progstat')->select('id','statnam','prog','progid')->where('progid', '=', $id)->get(); 
   return view('schserv.addviewprog', compact('newprog','skooldeet','deppt','stat','progstat'));  
 }


 public function addprogstat(Request $request)
 { {$this->validate(request(),[
   'skolid'=>'required',
   'deptid'=>'required',
   'progid'=>'required',
   'prog'=>'required',
   'statnam'=>'required',
   
   ]); 
   
     $data = [ 
    'progid'=>$request['progid'],
    'skolid'=>$request['skolid'],
    'deptid'=>$request['deptid'],
    'prog'=>$request['prog'],
    'statnam'=>$request['statnam'],
     ];
     DB::table('progstat')->insert($data); 
     $skooldeet=skooldeet::all()->where('id','=', $request->skolid);
     $deppt=deppt::all()->where('id','=', $request->deptid);
     $newprog=newprog::all()->where('id','=', $request->progid);
     $stat=stat::all();
     $progstat= DB::table('progstat')->select('id','statnam','prog','progid')->where('progid', '=', $request->progid)->get(); 
     return back()->withsucess('Programme status  added '); 
  }

 }
public function addviewprogdel(Request $request)
{ {$this->validate(request(),[
   'id'=>'required',
   'progid'=>'required',

   ]); 
   $rowData6 = [
      'id' => $request->input('id'),
   ];
   $query6= DB::table('progstat')->where('id', $request->get('id'))->delete($rowData6);

if($query6){
   return back()->withsuccess('Programme status successfully deleted.');

}
else {return back()->witherrors('Programme status not deleted.');

}
}
  


}


public function serv(Request $request)
{
  $serv=serv::all();
  //return $serv;
  return view('schserv.service', compact('serv'));  
}


public function servadd(Request $request,$id)
{
  $serv=serv::all()->where('id','=', $id);
  return view('schserv.servadd', compact('serv'));  
}


public function serveadd(Request $request){
   {$this->validate(request(),[
      'servn'=>'required',
      
      ]); 

      $data = $request->input(); 
      $serv= new serv();
      $serv->servn=$data['servn'];
      $serv->save();  
      return back()->withsuccess('you have successfully created a service unit');

   }
} 

public function servadddel(Request $request, $id)
{$serv = serv::find($request->get('id'));
 if ($id!="") { 
  $serv->delete();
return back()->withsuccess('service deleted successfully');     
}
else{
return back()->witherrors('service not deleted ');

}

}


public function editserv(Request $request,$id){
   {$this->validate(request(),[
      'id'=>'required',

      
      ]); 

       $serv = serv::find($request->get('id'));
       if($id!=""){
        $data = $request->input(); 
        $serv->servn=$data['servn3'];
        $serv->update(); 
        return back()->withsuccess('service  updated .');
     }
     else{
      return back()->witherror('service not successful.'); 
     }
 } 
 }

 public function servfuadd(Request $request, $id)
 {$this->validate(request(),[
  'id'=>'required',
  'servn'=>'required',
  'servacr'=>'required',
  'servh'=>'required',
  'servfn'=>'required',
 
 
  ]); 
 
  $serv = serv::find($request->get('id'));
  if ($id!="") {
  
    $data = $request->input(); 
    $serv->servn=$data['servn'];
    $serv->servacr=$data['servacr'];
    $serv->servh=$data['servh'];
    $serv->servfn=$data['servfn'];
    $serv->update();  
    return back()->withsuccess('you have successfully updated a service profile');
 }
 
 
 }
 


 




public function upserv(Request $request, $id)
{$request->validate([
    'servlogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

  $serv = serv::find($request->get('id'));
    if($request->file('servlogo')){
        $file= $request->file('servlogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/servlogo'), $filename);
        $serv ['servlogo']= $filename;
        $serv->update();
return back()->withsuccess('Service logo  updated successfuly.');;
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}

}


public function dirlogo(Request $request, $id)

{$request->validate([
    'dirlogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

  $serv = serv::find($request->get('id'));
    if($request->file('dirlogo')){
        $file= $request->file('dirlogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/dirlogo'), $filename);
        $serv ['dirlogo']= $filename;
        $serv->update();

return back()->withsuccess('Director image  updated successfuly.');;
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}

}

public function servprofile(Request $request,$id)
{     $staff=staff::all();
  $serv=serv::all()->where('id','=', $id);
  return view('schserv.servprofile', compact('serv','staff'));  
}


public function servprofadd(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'servn'=>'required',
   'servacr'=>'required',
   'servh'=>'required',
   'servfn'=>'required',
   'abtunit'=>'required',
   'headprof'=>'required',
  
  
   ]); 
  
   $serv = serv::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $serv->servn=$data['servn'];
     $serv->servacr=$data['servacr'];
     $serv->servh=$data['servh'];
     $serv->servfn=$data['servfn'];
     $serv->abtunit=$data['abtunit'];
     $serv->headprof=$data['headprof'];
     $serv->update();  
     return back()->withsuccess('you have successfully updated a service profile');
  }
  
  


}



public function profdelserv(Request $request, $id)
{$serv = serv::find($request->get('id'));
 if ($id!="") { 
  $serv->delete();

  //$serv=serv::all();
  
  return redirect('serv')->withsuccess('service profile deleted ');
}
else{
return back()->witherrors('service profile  not deleted ');

}

}


public function servaddstaff(Request $request){
   {$this->validate(request(),[
      'servid'=>'required',
      'fullnam'=>'required',
  
      ]); 

      $data = $request->input(); 
      $servstaff = new servstaff();
      $servstaff->fullnam=$data['fullnam'];
      $servstaff->servid=$data['servid'];
      $servstaff->save(); 

    
      return back()->withsuccess('service staff successfully added ');   
      //return view('schserv.addedstaff', compact('servstaff','serv'));

   }
} 


public function viewstaff(Request $request,$id){
   $servstaff = servstaff::all()->where('servid','=', $id);
   $serv = serv::all()->where('servid','=',$id);
   return view('schserv.viewstaff', compact('servstaff','serv'));
} 


public function servprofdel(Request $request, $id)
{  $servstaff = servstaff::find($request->get('id'));
 if ($id!="") { 
   $servstaff->delete();
return back()->withsuccess('service staff deleted successfully');     
}
else{
return back()->witherrors('service staff not deleted ');

}

}

   public function acad(Request $request){
   $acad = acad::all();
   //return $acad;
   return view('schserv.academic', compact('acad'));
} 

public function acadadd(Request $request)
 {$this->validate(request(),[
  'acadn'=>'required',
  ]); 
  
    $data = $request->input(); 
    $acad = new acad();
    $acad->acadn=$data['acadn'];
    $acad->save(); 
    return back()->withsuccess('you have successfully created an academic unit.');
 }



 public function editacad(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'acadn3'=>'required',

   ]); 
  
   $acad= acad::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $acad->acadn=$data['acadn3'];
     $acad->update();  

     return back()->withsuccess('you have successfully updated an academic unit');
  }


}

public function acaddel(Request $request, $id)
{  $acad = acad::find($request->get('id'));
 if ($id!="") { 
   $acad->delete();
return back()->withsuccess('academic unit deleted successfully');     
}
else{
return back()->witherrors('academic unit  not deleted ');

}

}


public function acaddet(Request $request,$id){
   $acad = acad::all()->where('id', '=', $id);
   return view('schserv.acaddet', compact('acad'));
} 


public function acaddetadd(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'acadn'=>'required',
   'acadacr'=>'required',
   'acadh'=>'required',
   'acadfn'=>'required',
   ]); 
  
   $acad= acad::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $acad->acadn=$data['acadn'];
     $acad->acadacr=$data['acadacr'];
     $acad->acadh=$data['acadh'];
     $acad->acadfn=$data['acadfn'];
     $acad->update();  

     return back()->withsuccess('you have successfully updated an academic unit');
  }


}




public function acadlogo(Request $request, $id)

{$request->validate([
    'acadlogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

  $acad= acad::find($request->get('id'));
    if($request->file('acadlogo')){
        $file= $request->file('acadlogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/acadlogo'), $filename);
        $acad['acadlogo']= $filename;
        $acad->update();

return back()->withsuccess('Academic  logo  updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}

public function dir2logo(Request $request, $id)

{$request->validate([
    'dir2logo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

    $acad= acad::find($request->get('id'));
    if($request->file('dir2logo')){
        $file= $request->file('dir2logo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/dir2logo'), $filename);
        $acad['dir2logo']= $filename;
        $acad->update();

return back()->withsuccess('Academic  Director image updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}

public function acadprofile(Request $request,$id){
   $acad = acad::all()->where('id', '=', $id);
   $staff=staff::all();
   return view('schserv.acadprofile', compact('acad','staff'));
} 

public function acadprofprocess(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'acadn'=>'required',
   'acadacr'=>'required',
   'acadh'=>'required',
   'acadfn'=>'required',
   'abtacad'=>'required',
   'headprof'=>'required',
   ]); 
 
  
   $acad= acad::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $acad->acadn=$data['acadn'];
     $acad->acadacr=$data['acadacr'];
     $acad->acadh=$data['acadh'];
     $acad->acadfn=$data['acadfn'];
     $acad->abtacad=$data['abtacad'];
     $acad->headprof=$data['headprof'];
     $acad->update();  

     return back()->withsuccess('you have successfully updated an academic profile');
  }


}




public function acadstaff(Request $request){
   {$this->validate(request(),[
      'fullnam'=>'required',
      'acadid'=>'required',

      
      ]); 

      $data = $request->input(); 
      $acadstaff= new acadstaff();
      $acadstaff->fullnam=$data['fullnam'];
      $acadstaff->acadid=$data['acadid'];
      $acadstaff->save(); 

      $acadstaff= acadstaff::all()->where('id','=', $request['acadid']);
      return back()->withsuccess('staff successfully added ');   
      //return view('schserv.addedstaff', compact('addedstaff','skooldeet'));

   }
} 

public function viewacadstaff(Request $request, $id){
   $acadstaff= acadstaff::all()->where('acadid','=', $request['id']);
   $acad = acad::all()->where('id', '=', $id);
  return view('schserv.viewacadstaff', compact('acad','acadstaff'));
} 

public function viewacadsdel(Request $request, $id)
{  $acadstaff=acadstaff::find($request->get('id'));
 if ($id!="") { 
   $acadstaff->delete();
return back()->withsuccess('academic unit staff  deleted successfully');     
}
else{
return back()->witherrors('academic unit staff  not deleted ');

}

}


public function reg(Request $request){
   $reg =reg::all();
return view('schserv.reg', compact('reg'));
   //return $reg;
} 

public function regadd(Request $request)
 {$this->validate(request(),[
  'regn'=>'required',
  ]); 
  
    $data = $request->input(); 
    $reg= new reg();
    $reg->regn=$data['regn'];
    $reg->save(); 

    return back()->withsuccess('you have successfully created a registry unit.');
 }



 public function editreg(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'regn3'=>'required',

   ]); 
  
   $reg= reg::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $reg->regn=$data['regn3'];
     $reg->update();  

     return back()->withsuccess('you have successfully updated a registry unit');
  }


}

public function regdel(Request $request, $id)
{  $reg = reg::find($request->get('id'));
 if ($id!="") { 
   $reg->delete();
return back()->withsuccess(' registry unit deleted successfully');     
}
else{
return back()->witherrors(' registry unit  not deleted ');

}

}

public function regdet(Request $request,$id){
   $reg = reg::all()->where('id', '=', $id);
   return view('schserv.regdet', compact('reg'));
} 


public function regdetadd(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'regn'=>'required',
   'regacr'=>'required',
   'regh'=>'required',
   'regfn'=>'required',
   ]); 
  
   $reg= reg::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $reg->regn=$data['regn'];
     $reg->regacr=$data['regacr'];
     $reg->regh=$data['regh'];
     $reg->regfn=$data['regfn'];
     $reg->update();  

     return back()->withsuccess('you have successfully updated a registry unit');
  }


}


public function reglogo(Request $request, $id)

{$request->validate([
    'reglogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

  $reg= reg::find($request->get('id'));
    if($request->file('reglogo')){
        $file= $request->file('reglogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/reglogo'), $filename);
        $reg['reglogo']= $filename;
        $reg->update();

return back()->withsuccess('Registry logo  updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}

public function regdirlogo(Request $request, $id)

{$request->validate([
    'regdirlogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

    $reg= reg::find($request->get('id'));
    if($request->file('regdirlogo')){
        $file= $request->file('regdirlogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/regdirlogo'), $filename);
        $reg['regdirlogo']= $filename;
        $reg->update();

return back()->withsuccess('Registry Director image updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}

public function regprofile(Request $request,$id){
   $reg=reg::all()->where('id', '=', $id);  
    $staff=staff::all();
//return $reg.''.$staff;
   return view('schserv.regprofile', compact('reg','staff'));
} 

public function regprofprocess(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'regn'=>'required',
   'regacr'=>'required',
   'regh'=>'required',
   'regfn'=>'required',
   'abtreg'=>'required',
   'headprof'=>'required',
   ]); 
 
  
   $reg= reg::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $reg->regn=$data['regn'];
     $reg->regacr=$data['regacr'];
     $reg->regh=$data['regh'];
     $reg->regfn=$data['regfn'];
     $reg->abtreg=$data['abtreg'];
     $reg->headprof=$data['headprof'];
     $reg->update();  

     return back()->withsuccess('you have successfully updated a Registry profile');
  }


}





public function regstaff(Request $request){
   {$this->validate(request(),[
      'fullnam'=>'required',
      'regid'=>'required',

      
      ]); 

      $data = $request->input(); 
      $regstaff= new regstaff();
      $regstaff->fullnam=$data['fullnam'];
      $regstaff->regid=$data['regid'];
      $regstaff->save(); 

      $regstaff= regstaff::all()->where('id','=', $request['regid']);
      return back()->withsuccess('staff successfully added ');   
      //return view('schserv.addedstaff', compact('addedstaff','skooldeet'));

   }
} 

public function viewregstaff(Request $request, $id){
   $regstaff= regstaff::all()->where('regid','=', $request['id']);
   $reg = reg::all()->where('id', '=', $id);
  return view('schserv.viewregstaff', compact('reg','regstaff'));
} 

public function viewregsdel(Request $request, $id)
{$regstaff = regstaff::find($request->get('id'));
 if ($id!="") { 
$regstaff->delete();
return back()->withsuccess('Registry unit staff  deleted successfully');     
}
else{
return back()->witherrors('Registry unit staff  not deleted ');

}

}


public function bur(Request $request){
   $bur =bur::all();
   return view('schserv.bur', compact('bur'));
} 

public function buradd(Request $request)
 {$this->validate(request(),[
  'burn'=>'required',
  ]); 
  
    $data = $request->input(); 
    $bur= new bur();
    $bur->burn=$data['burn'];
    $bur->save(); 

    return back()->withsuccess('you have successfully created a bursary unit.');
 }



 public function editbur(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'burn3'=>'required',

   ]); 
  
   $bur= bur::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $bur->burn=$data['burn3'];
     $bur->update();  

     return back()->withsuccess('you have successfully updated a bursary unit');
  }


}

public function burdel(Request $request, $id)
{  $bur = bur::find($request->get('id'));
 if ($id!="") { 
   $bur->delete();
return back()->withsuccess('bursary unit deleted successfully');     
}
else{
return back()->witherrors('bursary unit  not deleted ');

}

}

public function burdet(Request $request,$id){
   $bur = bur::all()->where('id', '=', $id);
   return view('schserv.burdet', compact('bur'));
} 


public function burdetadd(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'burn'=>'required',
   'buracr'=>'required',
   'burh'=>'required',
   'burfn'=>'required',
   ]); 
  
   $bur= bur::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $bur->burn=$data['burn'];
     $bur->buracr=$data['buracr'];
     $bur->burh=$data['burh'];
     $bur->burfn=$data['burfn'];
     $bur->update();  

     return back()->withsuccess('you have successfully updated a Bursary unit');
  }


}




public function burlogo(Request $request, $id)

{$request->validate([
    'burlogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

  $bur= bur::find($request->get('id'));
    if($request->file('burlogo')){
        $file= $request->file('burlogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/burlogo'), $filename);
        $bur['burlogo']= $filename;
        $bur->update();

return back()->withsuccess('Bursary logo  updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}

public function burdirlogo(Request $request, $id)

{$request->validate([
    'burdirlogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

    $bur= bur::find($request->get('id'));
    if($request->file('burdirlogo')){
        $file= $request->file('burdirlogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/burdirlogo'), $filename);
        $bur['burdirlogo']= $filename;
        $bur->update();

return back()->withsuccess('Bursary HOD  image updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}

public function burprofile(Request $request,$id){
   $bur=bur::all()->where('id', '=', $id);
   $staff=staff::all();
   return view('schserv.burprofile', compact('bur','staff'));
} 

public function burprofprocess(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'burn'=>'required',
   'buracr'=>'required',
   'burh'=>'required',
   'burfn'=>'required',
   'abtbur'=>'required',
   'headprof'=>'required',
   ]); 
 
  
   $bur= bur::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $bur->burn=$data['burn'];
     $bur->buracr=$data['buracr'];
     $bur->burh=$data['burh'];
     $bur->burfn=$data['burfn'];
     $bur->abtbur=$data['abtbur'];
     $bur->headprof=$data['headprof'];
     $bur->update();  

     return back()->withsuccess('you have successfully updated a Bursary profile');
  }


}





public function burstaff(Request $request){
   {$this->validate(request(),[
      'fullnam'=>'required',
      'burid'=>'required',

      
      ]); 

      $data = $request->input(); 
      $burstaff= new burstaff();
      $burstaff->fullnam=$data['fullnam'];
      $burstaff->burid=$data['burid'];
      $burstaff->save(); 

      $burstaff= burstaff::all()->where('id','=', $request['burid']);
      return back()->withsuccess('staff successfully added ');   
      //return view('schserv.addedstaff', compact('addedstaff','skooldeet'));

   }
} 

public function viewburstaff(Request $request, $id){
   $burstaff= burstaff::all()->where('burid','=', $request['id']);
   $bur =bur::all()->where('id', '=', $id);
  return view('schserv.viewburstaff', compact('bur','burstaff'));
} 

public function viewbursdel(Request $request, $id)
{$burstaff = burstaff::find($request->get('id'));
 if ($id!="") { 
$burstaff->delete();
return back()->withsuccess('Bursary unit staff  deleted successfully');     
}
else{
return back()->witherrors('Bursary unit staff  not deleted ');

}

}


public function lib(Request $request){
   $lib =lib::all();
   return view('schserv.lib', compact('lib'));
} 

public function libadd(Request $request)
 {$this->validate(request(),[
  'libn'=>'required',
  ]); 
  
    $data = $request->input(); 
    $lib= new lib();
    $lib->libn=$data['libn'];
    $lib->save(); 

    return back()->withsuccess('you have successfully created a Library unit.');
 }



 public function editlib(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'libn3'=>'required',

   ]); 
  
   $lib= lib::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $lib->libn=$data['libn3'];
     $lib->update();  

     return back()->withsuccess('you have successfully updated a library unit');
  }


}

public function libdel(Request $request, $id)
{  $lib= lib::find($request->get('id'));
 if ($id!="") { 
   $lib->delete();
return back()->withsuccess('Library  unit deleted successfully');     
}
else{
return back()->witherrors('Library unit  not deleted ');

}

}

public function libdet(Request $request,$id){
   $lib = lib::all()->where('id', '=', $id);
   return view('schserv.libdet', compact('lib'));
} 


public function libdetadd(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'libn'=>'required',
   'libacr'=>'required',
   'libh'=>'required',
   'libfn'=>'required',
   ]); 
  
   $lib= lib::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $lib->libn=$data['libn'];
     $lib->libacr=$data['libacr'];
     $lib->libh=$data['libh'];
     $lib->libfn=$data['libfn'];
     $lib->update();  

     return back()->withsuccess('you have successfully updated a Bursary unit');
  }


}

public function liblogo(Request $request, $id)

{$request->validate([
    'liblogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

    $lib= lib::find($request->get('id'));
    if($request->file('liblogo')){
        $file= $request->file('liblogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/liblogo'), $filename);
        $lib['liblogo']= $filename;
        $lib->update();

return back()->withsuccess('Library logo  updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}

public function libdirlogo(Request $request, $id)

{$request->validate([
    'libdirlogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

    $lib= lib::find($request->get('id'));
    if($request->file('libdirlogo')){
        $file= $request->file('libdirlogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/libdirlogo'), $filename);
        $lib['libdirlogo']= $filename;
        $lib ->update();

return back()->withsuccess('Library HOD  image updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}

public function libprofile(Request $request,$id){
   $lib=lib::all()->where('id', '=', $id);
   $staff=staff::all();
   return view('schserv.libprofile', compact('lib','staff'));
} 

public function libprofprocess(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'libn'=>'required',
   'libacr'=>'required',
   'libh'=>'required',
   'libfn'=>'required',
   'abtlib'=>'required',
   'headprof'=>'required',
   ]); 
 
  
   $lib= lib::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input();
     $lib->libn=$data['libn'];
     $lib->libacr=$data['libacr'];
     $lib->libh=$data['libh'];
     $lib->libfn=$data['libfn']; 
     $lib->abtlib=$data['abtlib'];
     $lib->headprof=$data['headprof'];
     $lib->update();  

     return back()->withsuccess('you have successfully updated a Library profile');
  }


}


public function libstaff(Request $request){
   {$this->validate(request(),[
      'fullnam'=>'required',
      'libid'=>'required',

      
      ]); 

      $data = $request->input(); 
      $libstaff= new libstaff();
      $libstaff->fullnam=$data['fullnam'];
      $libstaff->libid=$data['libid'];
      $libstaff->save(); 

      $libstaff= libstaff::all()->where('id','=', $request['libid']);
      return back()->withsuccess('staff successfully added ');   
      //return view('schserv.addedstaff', compact('addedstaff','skooldeet'));

   }
} 

public function viewlibstaff(Request $request, $id){
   $libstaff= libstaff::all()->where('libid','=', $request['id']);
   $lib =lib::all()->where('id', '=', $id);
  return view('schserv.viewlibstaff', compact('lib','libstaff'));
} 

public function viewlibsdel(Request $request, $id)
{$libstaff = libstaff::find($request->get('id'));
 if ($id!="") { 
$libstaff->delete();
return back()->withsuccess('Library  unit staff  deleted successfully');     
}
else{
return back()->witherrors('Library unit staff  not deleted ');

}

}

public function staffpro(Request $request)
{     $staff=staff::paginate(50);
   //$users = User::paginate();

  return view('schserv.staffprofile', compact('staff'));  
}

public function look(Request $request)
{$this->validate(request(),[
   'search'=>'required',
   ]); 
   
 
         $search = $request->get('search');
         if($search != ''){
         $staff = staff::where('fulln', 'like', '%' .$search. '%')->paginate(20);
         $staff->appends(array('search'=>$request->get('search')));
         if(count($staff)>0){
            return view('schserv.staffprofile',['staff'=>$staff]);
         }
         else{
         return back()->witherrors('No results Found');
     }
 }
    }


    public function know(Request $request){
      $know =know::all();
      return view('schserv.know', compact('know'));
   } 
   
   public function knowadd(Request $request)
    {$this->validate(request(),[
     'known'=>'required',
     ]); 
     
       $data = $request->input(); 
       $know= new know();
       $know->known=$data['known'];
       $know->save(); 
   
       return back()->withsuccess('you have successfully created a knowledge.');
    }
   
   
   
    public function editknow(Request $request, $id)
   {$this->validate(request(),[
      'id'=>'required',
      'known3'=>'required',
   
      ]); 
     
      $know= know::find($request->get('id'));
      if ($id!="") {
      
        $data = $request->input(); 
        $know->known=$data['known3'];
        $know->update();  
   
        return back()->withsuccess('you have successfully updated a Knowledge');
     }
   
   
   }
   
   public function knowdel(Request $request, $id)
   {  $know= know::find($request->get('id'));
    if ($id!="") { 
      $know->delete();
   return back()->withsuccess('Knowledge  deleted successfully');     
   }
   else{
   return back()->witherrors('knowledge  not deleted ');
   
   }
   
   }
   
   public function knowdet(Request $request,$id){
      $know = know::all()->where('id', '=', $id);
      $cate = cate::all();
      return view('schserv.knowdet', compact('know','cate'));
   } 
   
   
   public function knowdetadd(Request $request, $id)
   {$this->validate(request(),[
      'id'=>'required',
      'known'=>'required',
      'knowabt'=>'required',
      'knowcat'=>'required',
      ]); 
     
      $know= know::find($request->get('id'));
      if ($id!="") {
      
        $data = $request->input(); 
        $know->known=$data['known'];
        $know->knowabt=$data['knowabt'];
        $know->knowcat=$data['knowcat'];
        $know->update();  
   
        return back()->withsuccess('you have successfully updated a Knowledge');
     }
   
   
   }
  
   
   
   public function knowlogo(Request $request, $id)

{$request->validate([
    'knowlogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

    $know= know::find($request->get('id'));
    if($request->file('knowlogo')){
        $file= $request->file('knowlogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/knowlogo'), $filename);
        $know['knowlogo']= $filename;
        $know->update();

return back()->withsuccess('Knowledge image  updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}

public function addnews(Request $request){
   $news=news::orderBy('id','DESC')->get();
   return view('schserv.addnews', compact('news'));
} 

public function createnews(Request $request)
 {$this->validate(request(),[
  'newsn'=>'required',
  ]); 
  
    $data = $request->input(); 
    $news= new news();
    $news->newsn=$data['newsn'];
    $news->save(); 

    return back()->withsuccess('you have successfully created a news.');
 }



 public function updatenews(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'newsn3'=>'required',

   ]); 
  
   $news= news::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $news->newsn=$data['newsn3'];
     $news->update();  

     return back()->withsuccess('you have successfully updated a news');
  }


}

public function deletenews(Request $request, $id)
{  $news= news::find($request->get('id'));
 if ($id!="") { 
   $news->delete();
return Redirect('addnews')->withsuccess('News deleted successfully');     
}
else{
return back()->witherrors('News not deleted ');

}

}
  
public function newsdet(Request $request,$id){
   $news = news::all()->where('id', '=', $id);
   return view('schserv.newsdet', compact('news'));
} 


public function newsdetadd(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'newsn'=>'required',
   'newsabt'=>'required',
  'hpage'=>'required',
   'breaknews'=>'required',
   ]); 
  
   $news= news::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $news->newsn=$data['newsn'];
     $news->newsabt=$data['newsabt'];
     $news->hpage=$data['hpage'];
     $news->breaknews=$data['breaknews'];
     $news->update();  

     return back()->withsuccess('you have successfully updated a news');
  }


}





public function newslogo(Request $request, $id)

{$request->validate([
    'newslogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

    $news= news::find($request->get('id'));
    if($request->file('newslogo')){
        $file= $request->file('newslogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/newslogo'), $filename);
        $news['newslogo']= $filename;
        $news->update();

return back()->withsuccess('News image  updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}
  
public function viewnews(Request $request){
   $news=news::orderBy('id','DESC')->get();
   return view('schserv.viewnews', compact('news'));
} 

  
public function newsview(Request $request,$id){
   $news = news::all()->where('id', '=', $id);
   return view('schserv.newsview', compact('news'));
} 

  
public function addevent(Request $request){
   $event = event::orderBy('id','DESC')->get();
   return view('schserv.addevent', compact('event'));
} 


public function createevent(Request $request)
 {$this->validate(request(),[
  'eventn'=>'required',
  ]); 
  
    $data = $request->input(); 
    $event= new  event();
    $event->eventn=$data['eventn'];
    $event->save(); 

    return back()->withsuccess('you have successfully created an event.');
 }


 public function updateevent(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'eventn3'=>'required',

   ]); 
  
   $event= event::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $event->eventn=$data['eventn3'];
     $event->update();  

     return back()->withsuccess('you have successfully updated an event title');
  }


}

public function deleteevent(Request $request, $id)
{  $event= event::find($request->get('id'));
 if ($id!="") { 
   $event->delete();
return Redirect('addevent')->withsuccess('event deleted successfully');     
}
else{
return back()->witherrors('event not deleted ');

}

}

  
public function eventdet(Request $request,$id){
   $event= event::all()->where('id', '=', $id);
   return view('schserv.eventdet', compact('event'));
} 


public function eventdetadd(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'eventn'=>'required',
   'eventdt'=>'required',
  'eventv'=>'required',
   'eventabt'=>'required',
   ]); 
  
   $event= event::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $event->eventn=$data['eventn'];
     $event->eventdt=$data['eventdt'];
     $event->eventv=$data['eventv'];
     $event->eventabt=$data['eventabt'];
     $event->update();  

     return back()->withsuccess('you have successfully updated a news');
  }


}



public function eventlogo(Request $request, $id)

{$request->validate([
    'eventlogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

    $event= event::find($request->get('id'));
    if($request->file('eventlogo')){
        $file= $request->file('eventlogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/eventlogo'), $filename);
        $event['eventlogo']= $filename;
        $event->update();

return back()->withsuccess('Event image  updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}

public function addalum(Request $request){
   $alum = alum::all();
   return view('schserv.addalum', compact('alum'));
} 


public function createalum(Request $request)
 {$this->validate(request(),[
  'alumn'=>'required',
  ]); 
  
    $data = $request->input(); 
    $alum= new  alum();
    $alum->alumn=$data['alumn'];
    $alum->save(); 

    return back()->withsuccess('you have successfully created an Alumni news.');
 }


 public function updatealum(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'alumn3'=>'required',

   ]); 
  
   $alum= alum::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $alum->alumn=$data['alumn3'];
     $alum->update();  

     return back()->withsuccess('you have successfully updated an Alumni title News');
  }


}

public function deletealum(Request $request, $id)
{  $alum= alum::find($request->get('id'));
 if ($id!="") { 
   $alum->delete();
return Redirect('addalum')->withsuccess('alumni news deleted successfully');     
}
else{
return back()->witherrors('alumni news not deleted ');

}

}
public function alumdet(Request $request,$id){
   $alum= alum::all()->where('id', '=', $id);
   return view('schserv.alumdet', compact('alum'));
} 


public function alumdetadd(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'alumn'=>'required',
   'alumabt'=>'required',
   ]); 
  
   $alum= alum::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $alum->alumn=$data['alumn'];
     $alum->alumabt=$data['alumabt'];
     $alum->update();  

     return back()->withsuccess('you have successfully updated an alumni  news');
  }


}

public function alumupdate(Request $request, $id)
{$this->validate(request(),[
   'id'=>'required',
   'alumn3'=>'required',
   'alumabt3'=>'required',
   ]); 
  
   $alum=alum::find($request->get('id'));
   if ($id!="") {
   
     $data = $request->input(); 
     $alum->alumn=$data['alumn3'];
     $alum->alumabt=$data['alumabt3'];
     $alum->update();  

     return back()->withsuccess('you have successfully updated an Alumni detail');
  }


}

public function delalum(Request $request, $id)
{  $alum= alum::find($request->get('id'));
 if ($id!="") { 
   $alum->delete();
   return redirect('addalum')->withsuccess('Alumni news deleted successfully');     
}
else{
return back()->witherrors('event not deleted ');

}

}

public function alumlogo(Request $request, $id)

{$request->validate([
    'alumlogo' => 'mimes:jpeg,bmp,png,' // Only allow .jpg, .bmp and .png file types.
    ]);

    $alum= alum::find($request->get('id'));
    if($request->file('alumlogo')){
        $file= $request->file('alumlogo');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('storage/alumlogo'), $filename);
        $alum['alumlogo']= $filename;
        $alum->update();

return back()->withsuccess('Alumni image  updated successfully.');
  
}
else {
   return back()->witherrors('please try again , error inserting record.');
   
}
}
  
public function viewalum(Request $request){
   $alum=alum::orderBy('id','DESC')->get();
   return view('schserv.viewalum', compact('alum'));
} 

}


 






