<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LoginRequest;
use App\Services\Admin\AdminService;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
      
        $credentials = $request->all();

        $service = new AdminService();
        $loginStatus = $service->login($credentials);
        if($loginStatus == 1){
            return redirect('admin/dashboard');
        }
        return redirect()->back()->with('error_message' , 'Invalid Credentials');   

    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        $service = new AdminService();
        $logout = $service->logout();
        if($logout== 'true'){
            return redirect('admin/login');
        }
       
    }
}
