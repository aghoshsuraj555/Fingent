<?php

namespace App\Repositories;

class StudentRepository
{
    public function __construct()
    {
        //
    }
    public function create($request, $Model)
    {
        $create = $Model->create([
            'name' => $request['name'],
            'age' => $request['age'],
            'gender' => $request['gender'],
            'teacher_id' => $request['teacher']
        ]);
        return $create;
    }

    public function update($request, $Model)
    {
        $update = $Model->update([
            'name' => $request['name'],
            'age' => $request['age'],
            'gender' => $request['gender'],
            'teacher_id' => $request['teacher']
        ]);
       return $update;
    }

    public function delete($Model)
    {
        return $Model->delete();
    }
}
