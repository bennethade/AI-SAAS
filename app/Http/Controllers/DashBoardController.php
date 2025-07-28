<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;


class DashBoardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }   


    public function blogGenerator(Request $request)
    {
        $topic = $request->blog_post;
        $prompt = "Write a blog post about $topic";

        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'prompt' => $prompt,
            'max_tokens' => 2000,
            // 'messages' => [
            //     ['role' => 'user', 'content' => 'Hello!'],
            // ],
        ]);

        return view('dashboard', ['result'=> $result['choices'][0]['text']]);
        // echo $result->choices[0]->message->content; 

    }


    public function imageGenerator(Request $request)
    {
        $topic = $request->blog_image;
        $prompt = "Write an image about $topic";

        $response = OpenAI::images()->create([
            'model' => 'dall-e-3',
            'prompt' => $prompt,
            'n' => 1,
            'size' => '1024x1024',
            'response_format' => 'url',
        ]);

        return view('dashboard', ['response'=> $response['data'][0]['url']]);
        // echo $result->choices[0]->message->content; 

    }


}
