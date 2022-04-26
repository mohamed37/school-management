<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\PaymentStudentRepositoryInterface;

class PaymentStudentController extends Controller
{
    protected $payment;

    public function __construct(PaymentStudentRepositoryInterface $payment)
    {
        return $this->payment = $payment;
    }

    public function index()
    {
        return $this->payment->view();
    }
    public function show($id)
    {
        return $this->payment->show($id);
    }

    public function store(Request $request)
    {
        return $this->payment->insert($request);
    }
    public function edit($id)
    {
        return $this->payment->edit($id);
    }
    public function update(Request $request)
    {
        return $this->payment->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->payment->destroy($request);
    }
}
