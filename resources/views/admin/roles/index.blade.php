@extends('admin.layouts.master')

@section('content')
  <div class="col grid-margin stretch-card" id="roles-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Posts</h4>
                    <p class="card-description"> 
                        <button type="button" class="btn btn-gradient-success btn-rounded btn-fw"><a href="{{route('roles.create')}}">Create Role</a></button>
                    </p>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>name</th>

                       
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      @if(count($roles))
                       @foreach ($roles as $key => $role)
                           
                     
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$role->name}}</td>
                           
                          
                        
                          <td>
                              <form action="{{route('roles.destroy',['role'=>$role->id])}}" method="post">
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

@push('script')
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
     console.log('hy');
    function showPermissions(el){
      let id = $(el).data('id');
      const = data = {id : id};
      let url = '/view.permissions';
      fetch(url,{
        body: JSON.stringify(data),
      }).then( (data) => data.html();)
        .then( (html) => {
                     console.log(html);
                }).catch( (error) => console.log(error));
    }
     
</script>
    
@endpush