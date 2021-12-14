<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentMarkRequest;
use App\Repositories\StudentMarkRepository;
use App\Models\StudentMark;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Term;

class StudentMarkController extends Controller
{

    protected $repo;
    protected $model;
    protected $response_repo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(StudentMarkRepository $repo, StudentMark $model)
    {
        $this->repo = $repo;
        $this->model = $model;
    }
    public function index()
    {
        $data['marks'] = $this->model->with('student')->with('term')->cursor();
        $data['subjects'] = Subject::cursor();
        return view('admin.mark.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['students'] = Student::cursor();
        $data['subjects'] = Subject::cursor();
        $data['terms'] = Term::cursor();
        return view('admin.mark.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentMarkRequest $request)
    {
        $Model = $this->model;
        $result = $this->repo->create($request, $Model);
        if ($result) {
            return redirect('/studentMark')->with('success', 'Successfully Created');
        } else {
            return redirect('/studentMark')->with('error', 'Not Created');
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
        $data['mark'] = $this->model->with('student')->with('student')->with('term')->find($id);
        $data['students'] = Student::cursor();
        $data['subjects'] = Subject::cursor();
        $data['terms'] = Term::cursor();
        return view('admin.mark.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentMarkRequest $request, $id)
    {
        $Model = $this->model->find($id);
        $result = $this->repo->update($request, $Model);
        if ($result) {
            return redirect('/studentMark')->with('success', 'Successfully Updated');
        } else {
            return redirect('/studentMark')->with('error', 'Not Updated');
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
            return redirect('/studentMark')->with('success', 'Successfully Deleted');
        } else {
            return redirect('/studentMark')->with('error', 'Not Deleted');
        }
    }
}
