<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Restaurant;

class Manager extends Model
{
    use HasFactory;

    protected $fillable=[
        'employee_number',
        'manager_name',
        'restaurant_id',
        'password'
    ];

    public function restaurant()
    {
        return $this -> belongsTo(Restaurant::class);
    }

    public static function postManager(Request $request)
    {
        $isCheckedManager = Manager::where('employee_number',$request ->employee_number)->first();
        if($isCheckedManager){
            return false;
        }else{
            $postItems = [
                'employee_number' => $request->employee_number,
                'manager_name' => $request->manager_name,
                'restaurant_id' => $request->restaurant_id,
                'password' => Hash::make($request -> password)
            ];
            $postManager = Manager::create($postItems);
            return $postManager;
        }
    }

    public static function getManager()
    {
        $getManager = Manager::with('restaurant') -> get();
        return $getManager;
    }

    public static function putManager(Request $request)
    {
        $isCheckedManager = Manager::find($request -> id);
        if($isCheckedManager->isNotEmpty()) {
            $putItem = [
                'restaurant_id' => $request -> restaurant_id,
            ];
            $isCheckedManager -> fill($putItem) -> save();
            return $isCheckedManager;
        }else{
            return false;
        }
    }
}
