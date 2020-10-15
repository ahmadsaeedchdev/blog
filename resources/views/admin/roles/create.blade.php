@extends('admin.layouts.master')

@section('content')
    
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create Role</h4>
                   
                    <form class="forms-sample" action="{{route('roles.store')}}" method="Post" >
                      @csrf

                      
                       <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                      </div>
                   
                  
                    
                  
                      
                   
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    
                    </form>
                  </div>
                </div>
              </div>

@endsection