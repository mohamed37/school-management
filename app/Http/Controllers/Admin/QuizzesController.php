<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repository\QuizzeRepositoryInterface;
use App\Http\Controllers\Controller;

class QuizzesController extends Controller
{
    protected $quizze;

    public function __construct(QuizzeRepositoryInterface $quizze)
    {
        return $this->quizze = $quizze;
    }

    public function index()
    {
        return $this->quizze->view();
    }
    
    public function create()
    {
        return $this->quizze->create();
    }
    public function store(Request $request)
    {
        return $this->quizze->store($request);
    }

    public function edit($id)
    {
        return $this->quizze->edit($id);
    }
    public function update(Request $request)
    {
        return $this->quizze->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->quizze->delete($request);
    }
}
