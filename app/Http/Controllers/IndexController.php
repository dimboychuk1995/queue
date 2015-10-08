<?php

namespace App\Http\Controllers;

use App\Queue;
use Illuminate\Http\Request;
//use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Current_setting;
use Carbon\Carbon;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queueModel = new Queue();
        $queue = $queueModel->all();
        foreach($queue as $q){

        }
        $cur_settings = Current_setting::all();
        //dd($queue);

        return view('index.index', ['queue' => $queue, 'cur_settings' => $cur_settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Queue $queueModel, Current_setting $cur_setting, Request $request)
    {
        $cur_date = Carbon::today()->toDateString();
        $cur_date = str_replace('-', '', $cur_date);
        $rand = rand(0,9999);
        $cur_date .= $rand;
        $data = $request->all();
        unset($data['_token']);
        $data['register_key'] = $cur_date;
        $queueModel->create($data);
        var_dump($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDay(Queue $queueModel, Current_setting $cur_setting, Request $request)
    {

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

    /**********************************AJAX section********************************************************/

}
