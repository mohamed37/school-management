<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repository\GraduateRepositoryInterface;
use App\Http\Controllers\Controller;

class GraduateController extends Controller
{
    protected $graduated;
    
    public function __construct(GraduateRepositoryInterface $graduated)
    {
        return $this->graduated = $graduated;
    }

    public function index()
    {
        return $this->graduated->view_graduate();

    }
    public function create()
    {
        return $this->graduated->create_graduate();
    }
    public function store(Request $request)
    {
        return $this->graduated->softDelete($request);
    }
}
