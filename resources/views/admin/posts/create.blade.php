@extends('layouts.backoffice')

@section('title', 'Add new post')


@section('content')
<form method="POST" action="{{ route('admin.posts.store') }}" id="input-form" enctype="multipart/form-data">
   @csrf

   <h1 class="mb-4">Add new post</h1>

   <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="input-title" name="title" aria-describedby="title" placeholder="Title">

      @error('title')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="mb-3">
      <label for="category_id" class="form-label">Category</label>
      <select name="category_id" id="select-category" class="form-control @error('category') is-invalid @enderror">
         <option value="" default>Select a category</option>
         @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
         @endforeach
      </select>

      @error('category')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="mb-3">
      <label for="img" class="form-label">Image</label>
      <input name="img" class="form-control @error('img') is-invalid @enderror" type="file" id="formFile" accept="image/*">

      @error('img')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

   <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="input-slug" name="slug" aria-describedby="slug" placeholder="Slug">

      @error('slug')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="mb-3 d-flex flex-column">
      <label for="content" class="form-label">Content</label>
      <textarea name="content" cols="30" rows="10" class="form-control" aria-describedby="content" placeholder="Content" style="min-height: 200px"></textarea>
   </div>

   <div class="mb-3">
      <label for="date" class="form-label">Date</label>
      <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" aria-describedby="post date" value="{{ date('Y-m-d') }}">

      @error('date')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="mb-3">
      <label for="tags" class="form-label">Tags</label>
      {{-- source: https://www.cssscript.com/tags-input-bootstrap-5/ --}}
      <select class="form-select" id="input-tags" name="tags" aria-describedby="tags" multiple>
         <option selected disabled hidden value="">Tags</option>
         @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" data-badge-style="success">{{ $tag->name }}</option>
         @endforeach
      </select>

      <div class="alert alert-danger invalid-feedback">Select valid tags</div>
   </div>




   <button type="submit" class="btn btn-primary">Add</button>

   <div class="btn btn-secondary" id="btn-reset">Clear fields</div>

   <a href="{{ route('admin.posts.index') }}" class="btn btn-link" id="btn-back">Back to all</a>

</form>
@endsection
