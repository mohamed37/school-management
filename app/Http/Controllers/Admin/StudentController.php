<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    protected $student;
    
    public function __construct(StudentRepositoryInterface $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        return $this->student->view_students();
    }

    public function create()
    {
        try{
           return  $this->student->create_student();

        }catch(\Exception $ex){

            return $ex;
        }
    }

    public function Get_classes($id)
    {
        return $this->student->Get_classrooms($id);
    }

    public function Get_sections($id)
    {
        return $this->student->Get_sections($id);
    }

    public function store(StudentRequest $request)
    {
        return $this->student->store_student($request);
    }

    public function edit($request)
    {
        return $this->student->edit_student($request);
    }

    public function update(StudentRequest $request)
    {
        return $this->student->update_student($request);
    }

    public function destroy(Request $request)
    {
        return $this->student->delete_student($request);
    }

    public function show($request)
    {
        return $this->student->show_student($request);
    }
    public function uploadAttachments(Request $request)
    {
        return $this->student->upload_attachment($request);
    }

    public function downloadAttachment($studentname, $filename)
    {
        
        return $this->student->download_attachment($studentname, $filename);
    }

    public function deleteAttachment(Request $request)
    {
        
        return $this->student->delete_attachment($request);
    }
}
