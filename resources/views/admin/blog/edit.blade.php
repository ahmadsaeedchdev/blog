@extends('admin.layouts.master')

@section('content')
    
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create Post</h4>
                   
                    <form class="forms-sample" action="{{route('post.update',['post'=>$post->id])}}" method="Post" enctype="multipart/form-data">
                      @csrf
                      @method('patch')

                      <div class
                      ="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$post->title}}">
                      </div>
                       <div class="form-group">
                        <label for="author_name">Author Name</label>
                        <input type="text" class="form-control" id="author_name" placeholder="Name" name="author_name" value="{{$post->author_name}}">
                      </div>
                   
                  
                    
                      <div class="form-group">
                        <label>Image upload</label>
                        <input type="file" name="image" class="file-upload-browse">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleTextarea1">Content</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="body">{{$post->body}}</textarea>
                      </div>
                        <div class="form-group">
                        <label for="exampleTextarea1">Summary</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="summary">
                            {{$post->summary??'nothing'}}
                        </textarea>
                      </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                    
                    </form>
                  </div>
                </div>
              </div>

@endsection