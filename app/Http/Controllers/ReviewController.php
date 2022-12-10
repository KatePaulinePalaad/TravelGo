<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{

    public function index(){

     $review = DB::table('global_review')
               ->leftJoin('users','global_review.userid','=','users.id')
               ->where('confirmed','=',1)
                ->get();
      return view('Review.index')->with([
        'review' => $review
      ]);
    }

    public function storeGlobal(Request $request){
        $request->validate([
            'review' => 'required'
        ]);

        $user = auth()->user();
        if($user == null || $user == ''){
            return back()->with('error',
                'You must login First before making a review');
        }

        DB::table('global_review')
        ->insert([
                'userid' => $user->id,
                'Review' => $request->review,
                'stars' => $request->stars
            ]);

        return redirect()->route('review.index')
                ->with('success','thank you for giving your feedback please wait till
                we review your feedback!');
    }


    public function review(Request $request,$id){
        $request->validate([
            'review' => 'required'
        ]);

        $user = auth()->user();
        if($user == null || $user == ''){
            return back()->with('error',
                'You must login First before making a review');
        }

        $date = Carbon::now('Asia/Manila');
        $formatted = Carbon::parse($date)->format('M-d-y H:i');
        DB::table('review')
        ->updateOrInsert(
            ['Userid' => $user->id,'destination_id' => $id],
            [
                'Review' => $request->review,
                'created_at' => $formatted
            ]
        );

        return redirect()->route('destination.show',$id)
                ->with('success','thank you for giving your feedback!');
    }
}
