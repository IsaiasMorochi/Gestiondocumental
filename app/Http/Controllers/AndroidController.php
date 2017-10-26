<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AndroidController extends Controller{

    protected $user = null;
    public function __construct(User $user){
         $this->user = $user;
    }

    public function login($datos){
        return $this->user->login($datos);
    }

    public function regToken($datos){
        return $this->user->regToken($datos);
    }

    public function getWorkflow($id){
         return $this->user->getWorkflow($id);
    }

}