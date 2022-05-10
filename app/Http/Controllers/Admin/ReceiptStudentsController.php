<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReceiptRequest;
use App\Repository\ReceiptStudentsRepositoryInterface;

class ReceiptStudentsController extends Controller
{
    protected $receipt;
    public function __construct(ReceiptStudentsRepositoryInterface $receipt)
    {
        return $this->receipt = $receipt;
    }

    public function index()
    {
        return $this->receipt->view();
    }
    public function show($id)
    {
        return $this->receipt->show($id);
    }

    public function store(ReceiptRequest $request)
    {
        return $this->receipt->insert($request);
    }

    public function edit($id)
    {
        return $this->receipt->edit($id);
    }

    public function update(Request $request)
    {
        return $this->receipt->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->receipt->destroy($request);
    }
}
