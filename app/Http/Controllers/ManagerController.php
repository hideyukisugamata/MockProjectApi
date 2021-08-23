<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;

class ManagerController extends Controller
{
    public function postManager (Request $request)
    {
        $postManager = Manager::postManager($request);
        if($postManager === false){
            return response() -> json([
                'message' => 'ManagerData already existed',
                'isCheckedManager' => true
            ],404);
        }else{
            return response() -> json([
                'message' => 'ManagerData successfully created',
                'ManagerData' => $postManager
            ],201);
        }
    }

    public function getManager ()
    {
        $getManager = Manager::getManager();
        return response() -> json([
            'message' => 'ManagerData got successfully',
            'ManagerData' => $getManager
        ],200);
    }

    public function putManager(Request $request)
    {
        $putManager = Manager::putManager($request);
        if($putManager === false){
            return response() -> json([
                'message' => 'ManagerData not found'
            ],404);
        }else{
            return response() -> json([
                'message' => 'ManagerData successfully changed',
                'ManagerData' => $putManager
            ],200);
        }
    }
}
