<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\Dvd;

class DVDController extends Controller
{
  public function listDvds(){
    $dvds = Dvd::orderBy('dvd_id', 'asc')->get();

    return view('dvd_tasks.index', [
      'dvds' => $dvds,
    ]);
  }

  public function addDvd(Request $request){
    $validator = Validator::make($request->all(), [

        'name' => 'required',
        'rating' => 'required',
        'price' => 'required',

    ]);

    if ($validator->fails()){
      return redirect('/dvds')
        ->withInput()
        ->withErrors($validator);
    }

    $Dvd=new Dvd;
    $Dvd->name = $request->name;
    $Dvd->rating = $request->rating;
    $Dvd->price = $request->price;
    $Dvd->save();

    return redirect('/dvds');
  }

  public function deleteDvd(Dvd $Dvd){
    $Dvd->delete();
    return redirect('/dvds');
  }

  public function modifyDvdCreateForm($dvd_id){
    $dvd = DB::table('dvds')->where('dvd_id', $dvd_id)->get();


    return view('/dvd_tasks.modify_dvd', [
      'dvd' => $dvd[0], //get returns a "collection", must specify you want first element
    ]);

  }

  public function modifyDvdPostData(Dvd $dvd, Request $request){
    $validator = Validator::make($request->all(), [
          'name' => 'required',
          'rating' => 'required',
          'price' => 'required',
      ]);



      if ($validator->fails()){

        print_r($validator->errors());
        exit;
        return redirect('/dvds')
          ->withInput()
          ->withErrors($validator);
      }

      $input = $request->all();

      $dvd->fill($input)->save();

      return redirect('/dvds');

  }
}
