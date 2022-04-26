<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\ProcessingFeeRepositoryInterface;

class ProcessingFeesController extends Controller
{
    protected $process;

    public function __construct(ProcessingFeeRepositoryInterface $process)
    {
        return $this->process = $process;
    }

    public function index()
    {
        return $this->process->view();
    }
    public function show($id)
    {
        return $this->process->show($id);
    }

    public function store(Request $request)
    {
        return $this->process->insert($request);
    }
    public function edit($id)
    {
        return $this->process->edit($id);
    }
    public function update(Request $request)
    {
        return $this->process->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->process->destroy($request);
    }
}
