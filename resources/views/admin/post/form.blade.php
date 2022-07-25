@extends('admin.layouts.app')
@section('title', 'Post')
@section('contents')

@if ($errors->any())
<div class="text-center">
    @foreach ($errors->all() as $error)
        <span class="text-danger"> {{ $error }} </span><br>
    @endforeach
</div>
@endif

<div class="card p-3">
    <form action="{{ isset($post) ? route('post.update', $post) : route('post.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      @if(isset($post)) @method('put') @endif
      
      <div class="row gy-2">

        <div class="col-md-12">
          <input type="text" name="title" class="form-control" placeholder="Post title" value={{isset($post) ? $post->title : old('title')}}>
        </div>

        <div class="col-md-6">
            <select name="category" id="" class="form-control">
                <option>Select category..</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if(isset($post)) @if($category->id === $post->category->id) @selected(true) @endif @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
          <input type="file" class="form-control" name="photo" placeholder="Photo">
        </div>

        <div class="col-md-12">
          <textarea class="tinymce-editor" id="mce_0" name="description" rows="2" placeholder="Message" >{{isset($post) ? $post->description : old('description')}}</textarea>
        </div>
         <div class="col-md-12">
          <select multiple="multiple" name="tag[]" id="" class="form-control">
              @foreach ($tags as $tag)
                  <option value="{{$tag->id}}"
                    @if(isset($post)) 
                      @foreach ($selected_tags as $selected)
                          {{$selected === $tag->id ? 'selected' : ''}}
                      @endforeach
                    @endif
                  >{{$tag->name }}</option>
              @endforeach
          </select>
      </div>

        <div class="col-md-12 text-center">
          <button type="submit"  class="col-md-2 btn {{isset($post) ? 'btn-info' : 'btn-primary' }} w-100"> {{isset($post) ? 'Update' : 'Save' }}</button>
        </div>

      </div>
    </form>
  </div>

@endsection