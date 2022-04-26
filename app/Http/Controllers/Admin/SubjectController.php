<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Repository\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $subject;

    public function __construct(SubjectRepositoryInterface $subject)
    {
        return $this->subject = $subject;
    }

    public function index()
    {
        return $this->subject->view();
    }
    
    public function create()
    {
        return $this->subject->create();
    }
    public function store(Request $request)
    {
        return $this->subject->store($request);
    }

    public function edit($id)
    {
        return $this->subject->edit($id);
    }
    public function update(Request $request)
    {
        return $this->subject->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->subject->delete($request);
    }
}
