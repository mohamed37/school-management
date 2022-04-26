<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repository\PromotionRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionRequest;

class PromotionController extends Controller
{
    protected $promotion;

    public function __construct(PromotionRepositoryInterface $promotion)
    {
        return $this->promotion = $promotion;
    }


    public function create()
    {
        return $this->promotion->create_promotion();
    }

    public function store(Request $request)
    {
         return $this->promotion->store_promotion($request); 
    }

    public function index()
    {
        return $this->promotion->manage_promotion();
    }

    public function destroy(Request $request)
    {
        return $this->promotion->destroy_promotion($request);
    }
}
