<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'date',
        'star',
        'title',
        'comment'
    ];

    public function User()
    {
        return $this -> belongsTo(User::class);
    }

    public function Restaurant()
    {
        return $this -> belongsTo(Restaurant::class);
    }

    public static function getReviews(Request $request)
    {
        $getReviews = Review::where('restaurant_id',$request -> restaurant_id)->with('user','restaurant')->get();
        if($getReviews->isnotempty()){
            return $getReviews;
        }else{
            return false;
        }
    }

    public static function getReview($users_id,Request $request)
    {
        $getReview = Review::where('user_id',$users_id)->where('restaurant_id',$request -> restaurant_id) -> with('restaurant') ->first();
        if($getReview){
            return $getReview;
        }else{
            return false;
        }
    }

    public static function postReview($users_id,Request $request)
    {
        $userReview = [
            'user_id' => $users_id,
            'restaurant_id' => $request -> restaurant_id,
            'date' => $request -> date,
            'star' => $request -> star,
            'title' => $request -> title,
            'comment' => $request -> comment
        ];
        $isCheckedReview = Review::where('user_id',$users_id) -> where('restaurant_id',$request -> restaurant_id) -> first();
        if($isCheckedReview){
            return false;
        }else{
            $createReview = Review::create($userReview);
            return $createReview;
        }
    }

    public static function putReview($users_id,Request $request)
    {
        $isCheckedReview = Review::find($request -> review_id);
        if($isCheckedReview){
            $newReview = [
                'user_id' => $users_id,
                'restaurant_id' => $request->restaurant_id,
                'date' => $request->date,
                'star' => $request->star,
                'title' => $request->title,
                'comment' => $request->comment
            ];
            $isCheckedReview -> fill($newReview) -> save();
            return $isCheckedReview;
        }else{
            return false;
        }
    }

    public static function deleteReview($users_id,Request $request)
    {
        $deleteReview = Review::where('user_id',$users_id) -> where('restaurant_id',$request -> restaurant_id)-> delete();
        if($deleteReview){
            return true;
        }else{
            return false;
        }
    }

    public static function getSoftDeletedReview($users_id,Request $request)
    {
        $getSoftDeletedReview = Review::where('user_id',$users_id) -> where('restaurant_id',$request-> restaurant_id) -> onlyTrashed() -> get();
        if($getSoftDeletedReview-> isnotempty()){
            return $getSoftDeletedReview;
        }else{
            return false;
        }
    }
}
