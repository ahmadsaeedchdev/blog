<div class="col grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Permission</h4>
                    <p class="card-description"> 
                      Assign permission to thes {{$role->name}}
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

                          <td>
                             <div class="custom-control custom-switch">
                             <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                            <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                            </div>

                          </td>
                         
                        
                      
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>