<?php

namespace App\Http\Controllers;

use App\Mail\ReceiptMail;
use App\Models\destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DestinationController extends Controller
{
    public function index(){
        $destinationPopular = destination::where('popular','=',1)->paginate(6);
        $destinationComing = destination::where('upcoming','=',1)->paginate(3);
        return view('destination.index')
            ->with([
                'destinationPopular' => $destinationPopular,
                'destinationupcoming' => $destinationComing
            ]);
    }

    public function show($id){
        $destination = destination::findOrFail($id);

        $review = DB::table('review')
                ->leftJoin('users','review.Userid','=','users.id')
                ->where([
                    ['review.destination_id','=',$id],
                    ['review.confirmed','=','1']
                    ])
                ->get();
        return view('destination.show')->with([
            'destination' => $destination,
            'review' => $review
        ]);
    }

    public function book(Request $request,$id){
        $request->validate([
            'to' =>  'required',
            'from' =>  'required',
            'checkin' =>  'required',
            'checkout' => 'required',
            'adult' => 'required',
            'children' => 'required',
        ]);

        if(auth()->user() == null || auth()->user() == ''){
            return back()->with('error','You must login first before booking any places');
        }

        $place = destination::findOrFail($id);
        Mail::to(auth()->user()->email)
        ->send(new ReceiptMail($request->to,
                                $request->checkin,
                                $request->checkout,
                                $place->price,
                                $place->time,
                                $place->location,
                                $request->adult,
                                $request->children));

        return redirect()->route('destination.show',$id)
                    ->with(['EmailSuccess' => 'Email Send Successfully']);
    }
}
