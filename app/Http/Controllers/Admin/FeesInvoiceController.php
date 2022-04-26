<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\FeesInvoicesRepositoryInterface;

class FeesInvoiceController extends Controller
{
    protected $fees;
    
    public function __construct(FeesInvoicesRepositoryInterface $fees)
    {
        return $this->fees = $fees;
    }

    public function index()
    {
        return $this->fees->view();

    }
    public function show($id)
    {
        return $this->fees->show($id);

    }

    
    public function store(Request $request)
    {
        return $this->fees->insert($request);

    }

    public function edit($id)
    {
        return $this->fees->edit($id);

    }
    public function update(Request $request)
    {
        return $this->fees->update($request);

    }
    public function destroy(Request $request)
    {
        return $this->fees->destroy($request);

    }




}
