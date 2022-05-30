@extends('layouts.backoffice')

@section('title', $post->slug)


@section('content')
<form method="POST" action="{{ route('admin.posts.update', $post->slug) }}" id="input-form" enctype="multipart/form-data">
   @csrf
   @method('PUT')

   <h1 class="mb-4">Edit post</h1>

   <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="input-title" name="title" aria-describedby="title" value="{{ old('title', $post->title) }}">

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
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="input-slug" name="slug" aria-describedby="slug" value="{{ old('slug', $post->slug) }}">

      @error('slug')
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

   <div class="mb-3 d-flex flex-column">
      <label for="content" class="form-label">Content</label>
      <textarea name="content" cols="30" rows="10" class="form-control" aria-describedby="content">{{ old('content', $post->content) }}</textarea>
   </div>

   <div class="mb-3">
      <label for="date" class="form-label">Post date</label>
      <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" aria-describedby="post date" value="{{ old('date', date('Y-m-d', strtotime($post->date))) }}">

      @error('date')
         <div class="alert alert-danger">{{ $message }}</div>
      @enderror
   </div>

   <div class="mb-3">
      {{-- source: https://www.cssscript.com/tags-input-bootstrap-5/ --}}
      <select class="form-select" id="input-tags" name="tags[]" aria-describedby="tags" multiple>
         <option selected disabled hidden value="">Tags</option>
         @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" data-badge-style="success" @if (in_array($tag->id, old('tags', $post->tags->pluck('id')->all()))) selected @endif>{{ $tag->name }}</option>
         @endforeach
      </select>

      <div class="alert alert-danger invalid-feedback">Select valid tags</div>
   </div>


   <button type="submit" class="btn btn-success">Save</button>

   <div class="btn btn-secondary" id="btn-reset">Clear fields</div>

   <a href="{{ route('admin.posts.index') }}" class="btn btn-link" id="btn-back">Back to all</a>

</form>
@endsection
