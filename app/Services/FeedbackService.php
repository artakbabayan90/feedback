<?php

namespace App\Services;

use App\Repositories\FeedbackRepository;

class FeedbackService
{
    public function saveFeedbackData($data)
    {
        $result = ['status'=>"ok"];
        $result['db'] = (new FeedbackRepository())->saveDB($data);
        $result['file'] =(new FeedbackRepository())->saveFile($data);
        return $result;
    }
}
