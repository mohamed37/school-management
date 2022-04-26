<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repository\QuestionRepositoryInterface;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    protected $question;

    public function __construct(QuestionRepositoryInterface $question)
    {
        return $this->question = $question;
    }

    public function index()
    {
        return $this->question->view();
    }
    
    public function create()
    {
        return $this->question->create();
    }
    public function store(Request $request)
    {
        return $this->question->store($request);
    }

    public function edit($id)
    {
        return $this->question->edit($id);
    }
    public function update(Request $request)
    {
        return $this->question->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->question->delete($request);
    }
}
