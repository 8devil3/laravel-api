@extends('layouts.frontoffice')

@section('title', 'Welcome')

@section('content')
   <div id="appFrontoffice"></div>

   {{-- <div class="container">
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Title</th>
               <th scope="col">Author</th>
               <th scope="col">Category</th>
               <th scope="col">Published on</th>
               <th scope="col">Excerpt</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($posts as $post)
               <tr>
                  <td scope="row">{{ $post->title }}</td>
                  <td scope="row">{{ $post->user->name }}</td>
                  <td scope="row">{{ $post->category->name }}</td>
                  <td><time>{{ date('d/m/Y', strtotime($post->date)) }}</time></td>
                  <td>{{ substr($post->content, 0, 64) }}...</td>
               </tr>
            @endforeach
         </tbody>
      </table>
      {{ $posts->links() }}
   </div> --}}
@endsection








