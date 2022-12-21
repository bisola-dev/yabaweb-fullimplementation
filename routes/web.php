<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\http\Controllers\schservController;
use App\http\Controllers\yababController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [App\Http\Controllers\yababController::class, 'login'])->name('login');
Route::post('/adminlogin', [App\Http\Controllers\yababController::class, 'adminlogin'])->name('adminlogin');
Route::get('/unauthorized', [App\Http\Controllers\yababController::class, 'unauthorized'])->name('unauthorized');
Route::get('/adminhome', [App\Http\Controllers\yababController::class, 'adminhome'])->name('adminhome')->middleware('checklogin');
Route::middleware(['checklogin','categl'])->group(function(){
Route::get('/basikinfo', [App\Http\Controllers\yababController::class, 'basikinfo'])->name('basikinfo');
Route::post('/createbasikinfo', [App\Http\Controllers\yababController::class, 'createbasikinfo'])->name('createbasikinfo');
Route::post('/updatebasikinfo/{id}', [App\Http\Controllers\yababController::class, 'updatebasikinfo'])->name('updatebasikinfo');
Route::get('/deletebasik/{id}', [App\Http\Controllers\yababController::class, 'deletebasik'])->name('deletebasik');
Route::get('/scrollingtext', [App\Http\Controllers\yababController::class, 'scrollingtext'])->name('scrollingtext');

Route::post('/scrolimg/{id}', [App\Http\Controllers\yababController::class, 'scrolimg'])->name('scrolimg');
Route::post('/createscrol', [App\Http\Controllers\yababController::class, 'createscrol'])->name('createscrol');
Route::post('/updatescrol/{id}', [App\Http\Controllers\yababController::class, 'updatescrol'])->name('updatescrol');
Route::get('/deletescrol/{id}', [App\Http\Controllers\yababController::class, 'deletescrol'])->name('deletescrol');
Route::get('/quicklink', [App\Http\Controllers\yababController::class, 'quicklink'])->name('quicklink');
Route::post('/createqwik', [App\Http\Controllers\yababController::class, 'createqwik'])->name('createqwik');
Route::post('/updateqwik/{id}', [App\Http\Controllers\yababController::class, 'updateqwik'])->name('updateqwik');
Route::get('/deleteqwik/{id}', [App\Http\Controllers\yababController::class, 'deleteqwik'])->name('deleteqwik');
Route::get('/createpay', [App\Http\Controllers\yababController::class, 'createpay'])->name('createpay');
Route::post('/createpaytype', [App\Http\Controllers\yababController::class, 'createpaytype'])->name('createpaytype');
Route::post('/updatecreatepay/{id}', [App\Http\Controllers\yababController::class, 'updatecreatepay'])->name('updatecreatepay');
Route::get('/deletecreatepay/{id}', [App\Http\Controllers\yababController::class, 'deletecreatepay'])->name('deletecreatepay');
Route::get('/manage', [App\Http\Controllers\yababController::class, 'manage'])->name('manage');
Route::post('/updatestat/{id}', [App\Http\Controllers\yababController::class, 'updatestat'])->name('updatestat');
Route::get('/stat', [App\Http\Controllers\yababController::class, 'stat'])->name('stat');
Route::get('/deletestat/{id}', [App\Http\Controllers\yababController::class, 'deletestat'])->name('deletestat');
Route::post('/statpro', [App\Http\Controllers\yababController::class, 'statpro'])->name('statpro');
Route::post('/createman', [App\Http\Controllers\yababController::class, 'createman'])->name('createman');
Route::post('/updateman/{id}', [App\Http\Controllers\yababController::class, 'updateman'])->name('updateman');
Route::get('/newadmin', [App\Http\Controllers\yababController::class, 'newadmin'])->name('newadmin');
Route::get ('/deleteman/{id}', [App\Http\Controllers\yababController::class, 'deleteman'])->name('deleteman');
Route::post('/createadmin', [App\Http\Controllers\yababController::class, 'createadmin'])->name('createadmin');
Route::get('/changepass', [App\Http\Controllers\yababController::class, 'changepass'])->name('changepass');
Route::post('/updateadmin/{id}', [App\Http\Controllers\yababController::class, 'updateadmin'])->name('updateadmin');
Route::get('/deleteadmin/{id}', [App\Http\Controllers\yababController::class, 'deleteadmin'])->name('deleteadmin');
Route::get('/managesch', [App\Http\Controllers\schservController::class, 'managesch']);
Route::post('/createskol', [App\Http\Controllers\schservController::class, 'createskol']);
Route::post('/editskol/{id}', [App\Http\Controllers\schservController::class, 'editskol']);
Route::get('/deleteskol/{id}', [App\Http\Controllers\schservController::class, 'deleteskol']);
Route::get('/skoladd/{id}', [App\Http\Controllers\schservController::class, 'skoladd']);
Route::post('/upskologo/{id}', [App\Http\Controllers\schservController::class, 'upskologo']);
Route::post('/deanlogo/{id}', [App\Http\Controllers\schservController::class, 'deanlogo']);
Route::get('/skolprofile/{id}', [App\Http\Controllers\schservController::class, 'skolprofile']);
Route::post('imageupload', [schservController::class, 'imageupload'])->name('imageupload');
Route::post('/upload', [schservController::class, 'upload'])->name('upload');
Route::post('/skolprofprocess/{id}', [App\Http\Controllers\schservController::class,'skolprofprocess']);
Route::get('/adddept/{id}', [App\Http\Controllers\schservController::class,'adddept']);
Route::post('/adddeptdpro', [App\Http\Controllers\schservController::class,'adddeptdpro']);
Route::post('/deptupdate/{id}', [App\Http\Controllers\schservController::class,'deptupdate']);
Route::get('/adddeptdel/{id}', [App\Http\Controllers\schservController::class,'adddeptdel']);
Route::get('/devdept/{id}', [App\Http\Controllers\schservController::class,'devdept']);
Route::post('/devdeptproc/{id}', [App\Http\Controllers\schservController::class,'devdeptproc']);
Route::post('/addstaff', [App\Http\Controllers\schservController::class,'addstaff']);
Route::post('/histimg', [App\Http\Controllers\schservController::class,'histimg']);
Route::post('/abtimg', [App\Http\Controllers\schservController::class,'abtimg']);
Route::get('/viewimage/{id}', [App\Http\Controllers\schservController::class,'viewimage']);
Route::get('/addedstaff/{id}/{skolid}', [App\Http\Controllers\schservController::class,'addedstaff']);
Route::get('/staffdel/{id}', [App\Http\Controllers\schservController::class,'staffdel']);
Route::post('/unitimg/{id}', [App\Http\Controllers\schservController::class,'unitimg']);
Route::post('/hodimg/{id}', [App\Http\Controllers\schservController::class,'hodimg']);
Route::get('/newprog/{id}/{skolid}', [App\Http\Controllers\schservController::class,'newprog']);
Route::post('/addprog', [App\Http\Controllers\schservController::class,'addprog']);
Route::get('/addprogdel/{id}', [App\Http\Controllers\schservController::class,'addprogdel']);
Route::get('/schimgdel/{id}', [App\Http\Controllers\schservController::class,'schimgdel']);
Route::get('/hisimgdel/{id}', [App\Http\Controllers\schservController::class,'hisimgdel']);
Route::post('/progupdate/{id}', [App\Http\Controllers\schservController::class,'progupdate']);
Route::post('/addprogstat', [App\Http\Controllers\schservController::class,'addprogstat']);
Route::get('/serv', [App\Http\Controllers\schservController::class,'serv']);
Route::post('/serveadd', [App\Http\Controllers\schservController::class,'serveadd']);
Route::get('/servadddel/{id}', [App\Http\Controllers\schservController::class,'servadddel']);
Route::get('/addviewprogdel', [App\Http\Controllers\schservController::class,'addviewprogdel']);
Route::post('/editserv/{id}', [App\Http\Controllers\schservController::class,'editserv']);
Route::get('/addviewprog/{id}/{skolid}/{deptid}', [App\Http\Controllers\schservController::class,'addviewprog']);
Route::post('/servfuadd/{id}', [App\Http\Controllers\schservController::class,'servfuadd']);

Route::post('/dirlogo/{id}', [App\Http\Controllers\schservController::class,'dirlogo']);
Route::post('/upserv/{id}', [App\Http\Controllers\schservController::class,'upserv']);
Route::get('/servadd/{id}', [App\Http\Controllers\schservController::class,'servadd']);
Route::get('/servprofile/{id}', [App\Http\Controllers\schservController::class,'servprofile']);

Route::post('/servprofadd/{id}', [App\Http\Controllers\schservController::class,'servprofadd']);
Route::post('/servaddstaff', [App\Http\Controllers\schservController::class,'servaddstaff']);
Route::get('/servprofdel/{id}', [App\Http\Controllers\schservController::class,'servprofdel']);
Route::get('/viewstaff/{id}', [App\Http\Controllers\schservController::class,'viewstaff']);
Route::get('/acad', [App\Http\Controllers\schservController::class,'acad']);
Route::post('/acadadd', [App\Http\Controllers\schservController::class,'acadadd']);
Route::get('/acaddel/{id}', [App\Http\Controllers\schservController::class,'acaddel']);
Route::post('/editacad/{id}', [App\Http\Controllers\schservController::class,'editacad']);
Route::get('/acaddet/{id}', [App\Http\Controllers\schservController::class,'acaddet']);
Route::post('/acaddetadd/{id}', [App\Http\Controllers\schservController::class,'acaddetadd']);
Route::post('/acadlogo/{id}', [App\Http\Controllers\schservController::class,'acadlogo']);
Route::post('/dir2logo/{id}', [App\Http\Controllers\schservController::class,'dir2logo']);
Route::get('/acadprofile/{id}', [App\Http\Controllers\schservController::class,'acadprofile']);
Route::post('/acadprofprocess/{id}', [App\Http\Controllers\schservController::class,'acadprofprocess']);
Route::post('/acadstaff', [App\Http\Controllers\schservController::class,'acadstaff']);
Route::get('/viewacadstaff/{id}', [App\Http\Controllers\schservController::class,'viewacadstaff']);
Route::get('/viewacadsdel/{id}', [App\Http\Controllers\schservController::class,'viewacadsdel']);
Route::get('/reg', [App\Http\Controllers\schservController::class,'reg']);
Route::post('/regadd', [App\Http\Controllers\schservController::class,'regadd']);
Route::post('/editreg/{id}', [App\Http\Controllers\schservController::class,'editreg']);

Route::get('/regdet/{id}', [App\Http\Controllers\schservController::class,'regdet']);
Route::post('/regdetadd/{id}', [App\Http\Controllers\schservController::class,'regdetadd']);
Route::post('/regdirlogo/{id}', [App\Http\Controllers\schservController::class,'regdirlogo']);
Route::post('/reglogo/{id}', [App\Http\Controllers\schservController::class,'reglogo']);
Route::get('/regprofile/{id}', [App\Http\Controllers\schservController::class,'regprofile']);

Route::post('/regprofprocess/{id}', [App\Http\Controllers\schservController::class,'regprofprocess']);
Route::post('/regstaff', [App\Http\Controllers\schservController::class,'regstaff']);
Route::get('/viewregstaff/{id}', [App\Http\Controllers\schservController::class,'viewregstaff']);
Route::get('/viewregsdel/{id}', [App\Http\Controllers\schservController::class,'viewregsdel']);

Route::get('/bur', [App\Http\Controllers\schservController::class,'bur']);
Route::post('/buradd', [App\Http\Controllers\schservController::class,'buradd']);
Route::post('/editbur/{id}', [App\Http\Controllers\schservController::class,'editbur']);
Route::get('/burdel/{id}', [App\Http\Controllers\schservController::class,'burdel']);
Route::get('/burdet/{id}', [App\Http\Controllers\schservController::class,'burdet']);


Route::post('/burdetadd/{id}', [App\Http\Controllers\schservController::class,'burdetadd']);
Route::post('/burdirlogo/{id}', [App\Http\Controllers\schservController::class,'burdirlogo']);
Route::post('/burlogo/{id}', [App\Http\Controllers\schservController::class,'burlogo']);
Route::get('/burprofile/{id}', [App\Http\Controllers\schservController::class,'burprofile']);

Route::post('/burprofprocess/{id}', [App\Http\Controllers\schservController::class,'burprofprocess']);
Route::post('/burstaff', [App\Http\Controllers\schservController::class,'burstaff']);
Route::get('/viewburstaff/{id}', [App\Http\Controllers\schservController::class,'viewburstaff']);
Route::get('/viewbursdel/{id}', [App\Http\Controllers\schservController::class,'viewbursdel']);

Route::get('/lib', [App\Http\Controllers\schservController::class,'lib']);
Route::post('/libadd', [App\Http\Controllers\schservController::class,'libadd']);
Route::post('/editlib/{id}', [App\Http\Controllers\schservController::class,'editlib']);
Route::get('/libdel/{id}', [App\Http\Controllers\schservController::class,'libdel']);
Route::get('/libdet/{id}', [App\Http\Controllers\schservController::class,'libdet']);


Route::post('/libdetadd/{id}', [App\Http\Controllers\schservController::class,'libdetadd']);
Route::post('/libdirlogo/{id}', [App\Http\Controllers\schservController::class,'libdirlogo']);
Route::post('/liblogo/{id}', [App\Http\Controllers\schservController::class,'liblogo']);
Route::get('/libprofile/{id}', [App\Http\Controllers\schservController::class,'libprofile']);

Route::post('/libprofprocess/{id}', [App\Http\Controllers\schservController::class,'libprofprocess']);
Route::post('/libstaff', [App\Http\Controllers\schservController::class,'libstaff']);
Route::get('/viewlibstaff/{id}', [App\Http\Controllers\schservController::class,'viewlibstaff']);
Route::get('/viewlibsdel/{id}', [App\Http\Controllers\schservController::class,'viewlibsdel']);
Route::get('/staffpro', [App\Http\Controllers\schservController::class,'staffpro'])->name('staffpro');
Route::get('/look',[App\Http\Controllers\schservController::class,'look']);

Route::get('/know', [App\Http\Controllers\schservController::class,'know']);
Route::post('/knowadd', [App\Http\Controllers\schservController::class,'knowadd']);
Route::post('/editknow/{id}', [App\Http\Controllers\schservController::class,'editknow']);
Route::get('/knowdel/{id}', [App\Http\Controllers\schservController::class,'knowdel']);
Route::get('/knowdet/{id}', [App\Http\Controllers\schservController::class,'knowdet']);
Route::post('/knowdetadd/{id}', [App\Http\Controllers\schservController::class,'knowdetadd']);
Route::post('/knowlogo/{id}', [App\Http\Controllers\schservController::class,'knowlogo']);

Route::get('/cate', [App\Http\Controllers\yababController::class,'cate']);
Route::post('/createcatetype', [App\Http\Controllers\yababController::class,'createcatetype']);
Route::get('/deletecate/{id}', [App\Http\Controllers\yababController::class,'deletecate']);
Route::post('/updatecate/{id}', [App\Http\Controllers\yababController::class,'updatecate']);


Route::get('/addnews', [App\Http\Controllers\schservController::class,'addnews']);
Route::post('/createnews', [App\Http\Controllers\schservController::class,'createnews']);
Route::get('/deletenews/{id}', [App\Http\Controllers\schservController::class,'deletenews']);
Route::post('/updatenews/{id}', [App\Http\Controllers\schservController::class,'updatenews']);
Route::post('/newslogo/{id}', [App\Http\Controllers\schservController::class,'newslogo']);
Route::get('/newsdet/{id}',[App\Http\Controllers\schservController::class,'newsdet']);
Route::post('/newsdetadd/{id}',[App\Http\Controllers\schservController::class,'newsdetadd']);
Route::post('/newslogo/{id}', [App\Http\Controllers\schservController::class,'newslogo']);
Route::get('/viewnews', [App\Http\Controllers\schservController::class,'viewnews']);
Route::post('/newsview/{id}', [App\Http\Controllers\schservController::class,'newsview']);

Route::get('/addevent', [App\Http\Controllers\schservController::class,'addevent']);
Route::post('/createevent', [App\Http\Controllers\schservController::class,'createevent']);
Route::get('/deleteevent/{id}', [App\Http\Controllers\schservController::class,'deleteevent']);
Route::post('/updateevent/{id}', [App\Http\Controllers\schservController::class,'updateevent']);

Route::get('/eventdet/{id}',[App\Http\Controllers\schservController::class,'eventdet']);
Route::post('/eventdetadd/{id}',[App\Http\Controllers\schservController::class,'eventdetadd']);
Route::post('/eventlogo/{id}',[App\Http\Controllers\schservController::class,'eventlogo']);

Route::get('/addalum', [App\Http\Controllers\schservController::class,'addalum']);
Route::post('/createalum', [App\Http\Controllers\schservController::class,'createalum']);
Route::get('/deletealum/{id}', [App\Http\Controllers\schservController::class,'deletealum']);
Route::post('/updatealum/{id}', [App\Http\Controllers\schservController::class,'updatealum']);

Route::get('/alumdet/{id}',[App\Http\Controllers\schservController::class,'alumdet']);
Route::get('/delalum/{id}',[App\Http\Controllers\schservController::class,'delalum']);
Route::post('/alumdetadd/{id}',[App\Http\Controllers\schservController::class,'alumdetadd']);
Route::post('/alumupdate/{id}',[App\Http\Controllers\schservController::class,'alumupdate']);
Route::post('/alumlogo/{id}',[App\Http\Controllers\schservController::class,'alumlogo']);
Route::get('/viewalum', [App\Http\Controllers\schservController::class,'viewalum']);



});


Route::get('/logout', [App\Http\Controllers\yababController::class, 'logout'])->name('logout');

