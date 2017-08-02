<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Activity;
use App\Http\Requests\ActivityFormRequest;

class ActivityController extends Controller
{
    private $status;
    private $activity;

    public function __construct(Status $status, Activity $activity)
    {
        $this->status = $status;
        $this->activity = $activity;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Activity $activity, Status $status)
    {
        $activities = $activity->all();

        $status = $status->all();

        return view('activities', compact('activities', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Status $status)
    {
        $status = $status->all();
        $title = 'Cadastro de Atividade';

        return view('activitiescreate-edit', compact('status', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityFormRequest $request)
    {
        $dataForm = $request->all();

        $insert = $this->activity->create($dataForm);

        if ($insert) {
            return redirect()->route('activities.index');
        } else {
            return redirect()->back()->withInput();
        }
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
    public function edit(Status $status, $id)
    {
        $activity = $this->activity->find($id);
        $status = $status->all();
        $title = 'Alteração de Atividade';        

        return view('activitiescreate-edit', compact('activity', 'status', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityFormRequest $request, $id)
    {
        $activity = $this->activity->find($id);
        $dataForm = $request->all();
        $update = $activity->update($dataForm);

        if ($update) {
            return redirect()->route('activities.index');
        } else {
            return redirect()->back()->withInput();
        }
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

    public function getstatus($idstatus, Activity $activity)
    {
        $activities = $activity->where('status', $idstatus)->get();

        $status = $this->status->all();

        return view('activities', compact('activities', 'status'));
    }

    public function getsituation($idsituation, Activity $activity)
    {
        $activities = $activity->where('situation', $idsituation)->get();

        $status = $this->status->all();

        return view('activities', compact('activities', 'status'));
    }
}
