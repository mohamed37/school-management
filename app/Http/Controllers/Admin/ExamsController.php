<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamsRequests;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Repository\ExamRepositoryInterface;

class ExamsController extends Controller
{
    protected $exam;

    public function __construct(ExamRepositoryInterface $exam)
    {
        return $this->exam = $exam;
    }

    public function index()
    {
        return $this->exam->view();
    }
    
    public function create()
    {
        return $this->exam->create();
    }
    public function store(Request $request)
    {
        return $this->exam->store($request);
    }

    public function edit($request)
    {
        return $this->exam->edit($request);
    }
    public function update(Request $request)
    {
        return $this->exam->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->exam->destroy($request);
    }

   
}
