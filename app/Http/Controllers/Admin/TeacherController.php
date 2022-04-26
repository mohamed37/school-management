<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
     protected $Teacher;

     public function __construct(TeacherRepositoryInterface $Teacher)
     {
         $this->Teacher = $Teacher;
     }

     public function index()
     {
        $teachers = $this->Teacher->getAllTeachers();
        return view('dashboard.Teachers.index', compact('teachers'));
     }

     public function create()
     {
         $specializations = $this->Teacher->getSpecializations();
         $genders = $this->Teacher->getGenders();

         return view('dashboard.Teachers.create', compact('specializations','genders'));
     }

     public function store(TeacherRequest $request)
     {
         return $this->Teacher->storeTeachers($request);
     }

     public function edit($request)
     {
         return $this->Teacher->editTeacher($request);
     }

     public function update(TeacherRequest $request)
     {
        return $this->Teacher->updateTeacher($request);

     }

     public function destroy(Request $request)
     {
        return $this->Teacher->deleteTeacher($request);

     }
}
