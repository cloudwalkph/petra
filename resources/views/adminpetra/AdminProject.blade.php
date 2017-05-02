@extends('adminpetra.AdminDashboard')
@section('dashboardContent')
<!-- Your Page Content Here -->
<link href="table.css" rel="stylesheet">
<div class="row">
  <div class="col-xs-6 col-md-8">
    <h2 style = "font-family: Arial; color:gray;">PROJECT LIST </h2>
  </div>
  <!-- /.col-lg-6 -->
  <div class="col-xs-6 col-md-4">
    <div class="input-group input-group-lg">
      <div class="input-group ">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >Add Project</button>
      </div>
    </div>
  </div><!-- /input-group -->
</div><!-- /.col-lg-6 -->

<div class="row">
  <div class="col-xs-6 col-md-8">
    <button type="button" id = "btnViewArchive" class="btn btn-info btn-lg">View Archive</button>
  </div>
  <!-- /.col-lg-6 -->

  <div class="col-md-2">

    <div class="input-group ">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >Add Project</button>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Project</h4>
          </div>
          <div class="modal-body">
            <form action="/project"  class="form-horizontal" method="POST">
              {{ csrf_field() }}

              <div class="form-group">
                <label class="control-label col-sm-2" for="description" >Project Name:</label>
                <div class="col-sm-10">
                  <input type = "text" class="form-control" name="name" placeholder="Enter Project Name" >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="description" >Client Name:</label>
                <div class="col-sm-10">
                  <input type = "text" class="form-control" name="clientname" placeholder="Enter Client Name" >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="description">Description:</label>
                <div class="col-sm-10"> 
                  <input type="description" name="description" class="form-control" id="description" placeholder="Enter Project Description">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="member">Member:</label>
                <div class="col-sm-10"> 
                <select class="form-control" id="member" name="member" multiple="multiple" required>
                    @foreach($userprofiles as $userprofile)
                    <option value="{{ $userprofile->last_name }}">
                      {{ $userprofile->first_name }}
                      {{ $userprofile->last_name }}</option>
                      @endforeach
                    </select>
                    <!-- select2 -->
                    <script type="text/javascript">
                     $(document).ready(function(){
                       $("#member").select2();
                     });
                   </script>
                 </div>
               </div>

               <div class="form-group">
                <label class="control-label col-sm-2" for="datetimepicker4">Deadline</label>
                <div id="datetimepicker4" class="col-sm-10"> 
                  <input data-format="yyyy-MM-dd" type="deadline" name="deadline" placeholder="yyyy-mm-dd"></input> 
                  <span class="add-on"> 
                    <i class="fa fa-calendar"></i>
                  </span> 
                </div> 
              </div> 

              <div class="form-group">
                <label class="control-label col-sm-2" for="type">Type:</label>
                <div class="col-sm-10"> 
                  <select class=" form-control" id="type" type="text" name="type" required>
                    <option></option>
                    <option value="Development">Development</option>
                    <option value="Creatives">Creatives</option>
                  </select>

                  <script type="text/javascript">
                    $(document).ready(function(){
                      $('.combobox').combobox();
                    });
                  </script>
                </div>
              </div>  


              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Complexity Level:</label>
                <div class="col-sm-10"> 
                  <select class=" form-control" id="complexity" type="text" name="complexity"
                  value="{{ old('complexity') }}" required>
                  <option></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>

                <script type="text/javascript">
                  $(document).ready(function(){
                    $('.combobox').combobox();
                  });
                </script>
              </div>

            </div>  


            <div class="form-group">
              <label class="control-label col-sm-2" for="type">Status</label>
              <div class="col-sm-10"> 
                <select class=" form-control" id="status" type="text" name="status"
                value="{{ old('status') }}" required>
                <option></option>
                <option value="Ongoing">Ongoing</option>
                <option value="Done">Done</option>
              </select>

              <script type="text/javascript">
                $(document).ready(function(){
                  $('.combobox').combobox();
                });
              </script>
            </div>
          </div>  


          <div class = "form-group">
            <div class ="row">
              <div class = "col-md-10">


              </div>

              <div class = "col-md-2">
                <button type="submit" class="btn btn-info btn-md " >Save</button>
              </div>

            </div>
          </div>

        </div>
      </form>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><!-- /input-group -->
</div>

<!-- Main content -->
<div class="box">
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example2" class="table table-bordered table-hover">
     <thead>
      <tr>
        <th>Project Name</th>
        <th>Member</th>
        <th>DeadLine</th>
        <th>Type</th>
        <th>Complexity Level</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($projects as $project)
      <tr>
        <td class="tdstyle">{{ $project->name }}</td>
        <td class="tdstyle"><img src="{{ $project->profile_picture }}" class="img-responsive img-circle img-upload imgsize" alt="User Image"></td>
        <td class="tdstyle">{{ $project->estimated_deadline }}</td>
        <td class="tdstyle">{{ $project->type }}</td>
        <td class="tdstyle">{{ $project->complexity }}</td> 
        <td class="tdstyle">{{ $project->status }}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>Project Name</th>
        <th>Member</th>
        <th>DeadLine</th>
        <th>Type</th>
        <th>Complexity Level</th>
        <th>Status</th>
      </tr>
    </tfoot>
  </table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->

<!-- ... -->
@endsection