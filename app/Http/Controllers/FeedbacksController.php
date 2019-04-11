<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'feedback' => 'required|string'
        ]);
        $input = $request->all();
        $feedback = New Feedback();
        $feedback->product_id = $input['product_id'];
        $feedback->user_id = $input['user_id'];
        $feedback->text = $input['feedback'];
        if($feedback->save())
            return redirect()->back()->with("successMsg", "Feedback sent successfully!");
        else
            return redirect()->back()->withErrors("Fedback ould not be sent.");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $Feedback = Feedback::find($id);
        if($Feedback)
        {
            $Feedback->delete();
            return redirect()->back()->with("successMsg", "Feedback Deleted Successfully!");            
        }
        else
            return redirect()->back()->withErrors("Could not delete Feedback.");
    }
}
