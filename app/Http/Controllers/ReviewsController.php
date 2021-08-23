<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewsController extends Controller
{
    public function getReviews (Request $request)
    {
        $getReviews = Review::getReviews($request);
        if($getReviews === false){
            return response() ->json([
                'message' => 'Reviews not found',
                'isChecked' => false
            ],404);
        }else{
            return response() -> json([
                'message' => 'Reviews got successfully',
                'Reviews' => $getReviews
            ],200);
        }
    }

    public function getReview($users_id,Request $request)
    {
        $getReview = Review::getReview($users_id,$request);
        if($getReview === false){
            return response() -> json([
                'message' => 'Review not found',
                'isCheckedReview' => false
            ],404);
        }else{
            return response() -> json([
                'message' => 'Review got successfully',
                'Reviews' => $getReview
            ],200);
        }
    }

    public function postReview($users_id,Request $request)
    {
        $postReview = Review::postReview($users_id,$request);
        if($postReview === false){
            return response() -> json([
                'message' => 'You have already Review',
                'isCheckedReview' => false
            ],404);
        }else{
            return response() -> json([
                'message' => 'Review successfully created',
                'createdReview' => $postReview
            ],201);
        }
    }

    public function putReview($users_id,Request $request)
    {
        $putReview = Review::putReview($users_id,$request);
        if($putReview === false){
            return response() -> json([
                'message' => 'not found Review',
                'isCheckedReview' => false
            ],404);
        }else{
            return response() -> json([
                'message' => 'Review successfully updated',
                'updatedReview' => $putReview
            ],200);
        }
    }

    public function deleteReview($users_id,Request $request)
    {
        $deleteReview = Review::deleteReview($users_id,$request);
        if($deleteReview === true){
            return response() -> json([
                'message' => 'Review delete successfully',
                'isCheckedDelete' => true
            ],200);
        }else{
            return response() -> json([
                'message' => 'Not found Review',
                'isCheckedReview' => false
            ],404);
        }

    }

    public function getSoftDeletedReview($users_id,Request $request)
    {
        $getSoftDeletedReview = Review::getSoftDeletedReview($users_id,$request);
        if($getSoftDeletedReview === false){
            return response() -> json([
                'message' => 'not found SoftdeleteReview',
                'isCheckedSoftDeleteReview' => false
            ],404);
        }else{
            return response() -> json([
                'message' => 'SoftdeleteReview successfully got',
                'SoftdeleteReview' => $getSoftDeletedReview
            ],200);
        }
    }
}
