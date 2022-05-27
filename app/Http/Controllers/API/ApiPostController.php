<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class ApiPostController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $apiPosts = Post::join('users', 'posts.user_id', 'users.id')
                        ->join('categories', 'posts.category_id', 'categories.id')
                        ->select('posts.*', 'users.name as author', 'categories.name as category')
                        ->paginate(20);

      return response()->json([
         'success' => true,
         'response' => $apiPosts
      ]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($slug)
   {
      $apiPost = Post::join('users', 'posts.user_id', 'users.id')
      ->join('categories', 'posts.category_id', 'categories.id')
      ->select('posts.*', 'users.name as author', 'categories.name as category')
      ->where('posts.slug', $slug)
      ->first();

      return response()->json([
         'success' => true,
         'response' => $apiPost
      ]);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      //
   }
}
