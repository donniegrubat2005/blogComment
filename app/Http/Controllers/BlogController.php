<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;
use App\Repositories\ReplyRepository;
use Illuminate\Http\Request;
use Validator;

class BlogController extends Controller
{

     protected $blogRepository, $replyRepository;

    public function __construct(BlogRepository $blogRepository, ReplyRepository $replyRepository)
    {
         $this->blogRepository = $blogRepository;
         $this->replyRepository = $replyRepository;
    }
    
    public function index()
    {
        return $this->blogRepository->getReply();
    }

    
        
    public function commentStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'comments' => 'required|min:3',
           
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validate->errors()
            ], 422);
        }

        $blog = $this->blogRepository->store( $request->all());

        $result = [
           'status' => 'success',
           'data'   => $blog
        ];
        return response()->json($result);
    }

    public function replyStore(Request $request) {

        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'comments' => 'required|min:3',
           
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validate->errors()
            ], 422);
        }
        
        $reply = $this->replyRepository->store( $request->all());

        $result = [
           'status' => 'success',
           'data'   => $reply
        ];
        return response()->json($result);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
