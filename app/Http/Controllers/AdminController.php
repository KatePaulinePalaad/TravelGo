<?php

namespace App\Http\Controllers;

use App\Models\destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $destination = destination::all();

        return view('Admin.index')->with([
            'destination' => $destination
        ]);
    }

    public function show($id){
        $place = destination::findOrFail($id);

        return view('Admin.show')->with([
            'places' => $place
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'location' => 'required',
            'price' => 'required',
            'time' => 'required',
            'details' => 'required'
        ]);

         //check if the file has an item
         if($request->hasFile('image')){
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = storage_path().'/app/public/images/' ;
            $file->move($destinationPath,$fileName);
            $items_logo = $fileName ;
         }else{
            $items_logo = '';
         }

         if($request->popular){
            $popular = 1;
            $upcoming = 0;
         }

         if($request->upcoming){
            $upcoming = 1;
            $popular = 0;
         }

         destination::create([
            'time' => $request->time,
            'price' => $request->price,
            'detailes' => $request->details,
            'location' => $request->location,
            'image' => $items_logo,
            'popular' => $popular,
            'upcoming' => $upcoming
         ]);

         return redirect()->route('admin.index')
                ->with('success','New Destination Added');
    }

    public function create(){
        return view('Admin.create');
    }


    public function update(Request $request,destination $destination){
        //check if the file has an item
        if($request->hasFile('image')){
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $items_logo = $fileName ;
         }else{
            $items_logo = '';
         }
        $destination->update([
            'time' => $request->time,
            'price' => $request->price,
            'location' => $request->location,
            'detailes' => $request->detailes,
            'image' => $items_logo
        ]);

        return redirect()->route('admin.index')
        ->with(
            'success','destination updated successfully'
        );
    }

    public function destroy($id){
        destination::destroy($id);
        Storage::delete('public/images/'.$id);

        return redirect()->route('admin.index')
        ->with(
            'success','destination deleted successfully'
        );
    }

    public function review(){

        $review =  DB::table('global_review')
             ->leftJoin('users','global_review.userid','=','users.id')
             ->where('confirmed','=',0)
             ->select('global_review.*','users.name as name','users.Lastname as Lastname')
             ->get();

        return view('Admin.review')->with([
            'review' => $review
        ]);
    }


    public function acceptOrDenied(Request $request,$id){
       if($request->accept){
            DB::table('global_review')
            ->where('id',$id)
            ->update(['confirmed' => 1]);

            return redirect()->route('admin.review')->with('success','Review Has been accepted');
       }else{
            DB::table('global_review')
            ->where('id',$id)
            ->delete();

            return redirect()->route('admin.review')->with('error','Review Has been denied');
       }
    }
}
