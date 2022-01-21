<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Http\Requests\FeedbackRequest;
use App\Repositories\FeedbackRepository;
use App\Services\FeedbackService;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(FeedbackRequest $request)
    {
        $result = (new FeedbackService())->saveFeedbackData($request);
        return response()->json($result);
    }
}
