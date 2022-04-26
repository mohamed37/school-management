<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\FeesRequests;
use App\Http\Controllers\Controller;
use App\Repository\FeesRepositoryInterface;

class FeesController extends Controller
{
    protected $fees;
    
    public function __construct(FeesRepositoryInterface $fees)
    {
        return $this->fees = $fees;
    }

    public function index()
    {
        return $this->fees->view();

    }
    public function create()
    {
        return $this->fees->add();
    }
    public function store(FeesRequests $request)
    {
        return $this->fees->insert($request);
    }

    public function edit($id)
    {
        return $this->fees->edit($id);
    }
    public function update(FeesRequests $request)
    {
        return $this->fees->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->fees->destroy($request);
    }

}
