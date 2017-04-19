@extends('adminpetra.AdminDashboard')
@section('dashboardContent')
<!-- Your Page Content Here -->

<div class="row">
  <div class="col-xs-6 col-md-8">
    <h2 style = "font-family: Arial; color:gray;">PROJECT LIST </h2>
  </div>

  <!-- /.col-lg-6 -->

  <div class="col-xs-6 col-md-4">

    <div class="input-group input-group-lg">
      <input type="text" class="form-control" placeholder="Search">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" id = "btnSearch">
          <i class="glyphicon glyphicon-search"></i>
        </button>
      </div>
    </div>
  </div><!-- /input-group -->
</div><!-- /.col-lg-6 -->


<div class="row">
  <div class="col-xs-6 col-md-8">
    <button type="button" id = "btnViewArchive" class="btn btn-info btn-lg">View Archive</button>
  </div>

  <div class="col-md-2 "> 
    <select class=" form-control btn-lg" id="slcMember" type="name" name="name"
    value="{{ old('name') }}" required style = "height: 40px">
    <option></option>
    <option value="admin">Ronalyn Magbanua</option>
    <option value="Employee">Julie Anne San Jose</option>
  </select>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.combobox').combobox();
    });
  </script>
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
          <form action=""  class = "form-horizontal">


            <div class="form-group">
              <label class="control-label col-sm-2" >ProjectName:</label>
              <div class="col-sm-10">
                <input type = "text" class="form-control" name="newProjName" placeholder="Enter Project Name" >
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">Description:</label>
              <div class="col-sm-10"> 
                <input type="name" class="form-control" id="projDesc" placeholder="Enter Project Description">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">Member:</label>
              <div class="col-sm-10"> 
                <select class=" form-control" id="projMember" type="name" name=projMember
                value="{{ old('name') }}" required>
                <option></option>
                <option value="admin">Julie Anne San Jose</option>
                <option value="Employee">Ronalyn Magbanua</option>
              </select>

              <script type="text/javascript">
                $(document).ready(function(){
                  $('.combobox').combobox();
                });
              </script>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Deadline:</label>
            <div class="col-sm-10"> 
              <input type="password" class="form-control" id="projDeadline" placeholder="Enter Deadline">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Type:</label>
            <div class="col-sm-10"> 
              <select class=" form-control" id=projType type="name" name="projType"
              value="{{ old('name') }}" required>
              <option></option>
              <option value="typeDev">Development</option>
              <option value="typeCreatives">Creatives</option>
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
            <select class=" form-control" id="compLevel" type="name" name="name"
            value="{{ old('name') }}" required>
            <option></option>
            <option value="clOne">1</option>
            <option value="clTwo">2</option>
            <option value="clThree">3</option>
            <option value="clFour">4</option>
            <option value="clFive">5</option>
            <option value="clSix">6</option>
            <option value="clSeven">7</option>
            <option value="clEight">8</option>
            <option value="clNine">9</option>
            <option value="clTen">10</option>
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

<div class="col-xs-12">
  <div class="box">
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
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
         


        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

@endsection