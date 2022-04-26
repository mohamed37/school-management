<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\LibraryRepositoryInterface;

class LibraryController extends Controller
{
    protected $library;

    public function __construct(LibraryRepositoryInterface $library)
    {
        return $this->library = $library;
    }

    public function index()
    {
        return $this->library->view();
    }

    public function create()
    {
        return $this->library->create();
    }
    
    public function store(Request $request)
    {
        return $this->library->store($request);
    }
    
    public function destroy(Request $request)
    {
        return $this->library->delete($request);
    }

    public function download($name, $filename)
    {
        return $this->library->download_attachment($name, $filename);
    }


}
