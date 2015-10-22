<?php

namespace App\Http\Controllers;

use App\Default_day;
use App\Default_setting;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Queue;
use Response;
use App\Current_setting;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $queueModel = new Queue();
        $queue = $queueModel->where('date', '=', $today)->get();
        $cur_settings = Current_setting::where('day_date', '=', $today)->get();
        $default_settings_name_list = Default_day::all();
        $check_count = array();
        $periods = array();
        foreach ($cur_settings as $c){

            $check = Queue::where('start_time', '=', $c['period_start_time'])
                ->where('date', '=',$c['day_date'] )->get();
            $period['period_start_time'] =  $c['period_start_time'];
            $period['period_end_time'] =  $c['period_end_time'];
            $period['queue'] =  $check;
            $period['count'] =  $check->count();
            if($check->count() < 4){
                array_push($check_count,1);}
            else{
                array_push($check_count, 0);
            }
            array_push($periods, $period);
        }
        return view('admin.index', ['cur_settings' => $cur_settings, 'queue' => $queue, 'periods' => $periods, 'def_set_name' => $default_settings_name_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function set_default_setting(Request $request)
    {
        $date = $request->input('date');
        $day_id = $request->input('id');
        $settings = Default_setting::where('day_id', '=', $day_id)->orderBy('start_time', 'asc')->get(array('start_time as period_start_time', 'end_time as period_end_time', 'workers_number as workers_number', 'period_time as period_time'));
        $settings = $settings->toArray();
       // dd($settings);
        foreach($settings as $key => $val){
            Current_setting::updateOrCreate(
                ['day_date' => $date, 'period_start_time' => $val['period_start_time'], 'period_end_time' => $val['period_end_time'], 'workers_number' => $val['workers_number'],'period_time' => $val['period_time']],
                ['day_date' => $date, 'period_start_time' => $val['period_start_time'], 'period_end_time' => $val['period_end_time'], 'workers_number' => $val['workers_number'],'period_time' => $val['period_time']]
            );
        }

    }

    /**��������� ������ ������ � ����� ����� �� ����
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDay(Request $request)
    {
        $date = $request->input('date');
        $queueModel = new Queue();
        $queue = $queueModel->where('date', '=', $date)->get();
        $cur_settings = Current_setting::where('day_date', '=', $date)->get();
        $periods = array();
        foreach ($cur_settings as $c){

            $check = Queue::where('start_time', '=', $c['period_start_time'])
                ->where('date', '=',$c['day_date'] )->get();
            $period['period_start_time'] =  $c['period_start_time'];
            $period['period_end_time'] =  $c['period_end_time'];
            $period['queue'] =  $check;
            $period['count'] =  $check->count();
            array_push($periods, $period);
        }
        return Response::json($periods);

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
        $checked = false;
        while(!$checked){
            $rand = rand(0,9999);
            $check_date = $cur_date.$rand;
            if($queueModel->where('register_key', '=', $check_date)->get()->count() == 0){
                $cur_date .= $rand;
                $checked = true;
            }else{
                $checked = false;
            }

        }
        $data = $request->all();
        unset($data['_token']);
        $data['register_key'] = $cur_date;
        $data['is_real_queue'] = true;
        $data['is_admin_record'] = true;
        $queueModel->create($data);
        $data['register_key'] = substr($cur_date, -4);
        return Response::json($data);
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
    public function update(Request $request, Queue $queueModel)
    {
        $data = $request->all();
        $id = $data['id'];
        $queue = Queue::find($id);
        $queue ->is_present = true;
        $queue->save();
        dd($queue);
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
