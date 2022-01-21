<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;
use App\Models\Feedback;
use Throwable;
class FeedbackRepository
{
    public function saveDB($data)
    {
        try {
            $feedback = new Feedback();
            $feedback->name = $data['name'];
            $feedback->phone = $data['phone'];
            $feedback->description = $data['description'];
            $feedback->save();

            return 'ok';
        }catch (Throwable $exception){
            return "false";
        }

    }

    public function saveFile($data)
    {
        try {
            $currentData = [
                'name'=> $data['name'],
                'phone'=> $data['phone'],
                'description'=> $data['description'],
            ];
            $exists = Storage::disk('local')->has('feedback.json');
            if($exists){
                $content = json_decode(Storage::disk('local')->get('feedback.json'));
                array_push($content,$currentData);
                Storage::disk('local')->put('feedback.json', json_encode($content));

            }else{
                $content = [$currentData];
                Storage::disk('local')->put('feedback.json', json_encode($content));
            }

            return "ok";
        }catch (Throwable $exception){
            return "false";
        }

    }
}
