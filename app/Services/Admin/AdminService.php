<?php

namespace App\Services\Admin;
use Auth;

class AdminService
{
    
   
    public function login($credentials)
   
    {
        if(Auth::guard('admin')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])){
            if(!empty($credentials['remember'])){
              setcookie('email', $credentials['email'], time()+3600);
              setcookie('password', $credentials['password'], time()+3600);  
            }else{
                if(isset($_COOKIE['email'])){
                    setcookie('email', '');
                }
                if(isset($_COOKIE['password'])){
                    setcookie('password', '');
                }
            } 
            
            $loginStatus = 1;
        }else{
            $loginStatus = 0;
        }
        return $loginStatus;

    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return true;
    }
}