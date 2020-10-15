@extends('admin.layouts.master')

@section('content')
  <div class="col grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Permission</h4>
                    <p class="card-description"> 
                      See all permission you have in you system.
                    </p>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>name</th>
                       
                      
                        </tr>
                      </thead>
                      <tbody>
                      @if(count($permissions))
                       @foreach ($permissions as $key => $permission)
                           
                     
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$permission->name}}</td>
                         
                        
                      
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
    
@endsection