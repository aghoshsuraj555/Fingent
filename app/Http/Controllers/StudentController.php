<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Repositories\StudentRepository;
use App\Models\Student;
use App\Models\Teacher;

class StudentController extends Controller
{

    protected $repo;
    protected $model;
    protected $response_repo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(StudentRepository $repo, Student $model)
    {
        $this->repo = $repo;
        $this->model = $model;
    }
    public function index()
    {
        $data['students'] = $this->model->with('teacher')->cursor();
        return view('admin.student.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['teachers'] = Teacher::cursor();
        return view('admin.student.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $Model = $this->model;
        $result = $this->repo->create($request, $Model);
        if ($result) {
            return redirect('/student')->with('success', 'Successfully Created');
        } else {
            return redirect('/student')->with('error', 'Not Created');
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
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['teachers'] = Teacher::cursor();
        $data['student'] = $this->model->with('teacher')->find($id);
        return view('admin.student.edit')->with($data);
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
        $Model = $this->model->find($id);
        $result = $this->repo->update($request, $Model);
        if ($result) {
            return redirect('/student')->with('success', 'Successfully Updated');
        } else {
            return redirect('/student')->with('error', 'Not Updated');
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
        $Model = $this->model->find($id);
        $result = $this->repo->delete($Model);
        if ($result) {
            return redirect('/student')->with('success', 'Successfully Deleted');
        } else {
            return redirect('/student')->with('error', 'Not Deleted');
        }
    }
}
