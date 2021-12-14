<?php

namespace App\Repositories;
use DB;

class StudentMarkRepository
{
    public function __construct()
    {
        //
    }
    public function create($request, $Model)
    {
        $subject = $request['subject'];
        $mark = $request['mark'];
        foreach($subject as $key=>$value){
            $data[]=array(
                'subject_id'=>$value,
                'mark'=>$mark[$key]
            );
          }
  
          $result = DB::transaction(function () use ($request,$Model,$data) {
              $create = $Model->create([ 
                  'student_id'=>$request['student'],
                  'term_id'=>$request['term']
                  ]);
  
              $create->mark()->createMany($data);
  
              return $create;
          });
        return $result;
    }

    public function update($request, $Model)
    {
        $subject = $request['subject'];
        $mark = $request['mark'];
        foreach($subject as $key=>$value){
            $data[]=array (
                'subject_id'=>$value,
                'mark'=>$mark[$key]
            );
          }
  
          $result = DB::transaction(function () use ($request,$Model,$data) {
            $Model->mark()->delete();
              $update = $Model->update([ 
                  'student_id'=>$request['student'],
                  'term_id'=>$request['term']
                  ]);
  
              $Model->mark()->createMany($data);
  
              return $update;
          });
        return $result;
    }

    public function delete($Model)
    {
        $Model->mark()->delete();
        return $Model->delete();
    }
}
