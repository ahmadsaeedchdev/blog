@extends('admin.layouts.master')

@section('content')
  <div class="col grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Posts</h4>
                    <p class="card-description"> 
                        <button type="button" class="btn btn-gradient-success btn-rounded btn-fw"><a href="{{route('post.create')}}">Create Post</a></button>
                    </p>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Slug</th>
                          <th>Authur Name</th>
                          <th>Image</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      @if(count($posts))
                       @foreach ($posts as $post)
                           
                     
                        <tr>
                          <td>{{$post->title}}</td>
                          <td>{{$post->slug}}</td>
                          <td >{{$post->author_name}}</td>
                          <td><img src="{{url($post->image)}}" class="nav-profile-image" alt="image"></td>
                          <td>
                              <button type="button" class="btn btn-gradient-secondary btn-rounded btn-fw">
                                  <a href="{{route('post.edit',['post'=>$post->id])}}" style="text-decoration: none"> Edit</a>
                                </button>
                              
                          </td>
                          <td>
                              <form action="{{route('post.destroy',['post'=>$post->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button  class="btn btn-gradient-danger btn-rounded btn-fw">Delete</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
    
@endsection