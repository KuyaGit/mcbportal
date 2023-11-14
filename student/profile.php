<?php  
 if (!isset($_SESSION['IDNO'])){
      redirect("index.php");
     }


    $student = New Student();
    $res = $student->single_student($_SESSION['IDNO']);

    $course = New Course();
    $resCourse = $course->single_course($res->COURSE_ID);
	?>
  
  <style type="text/css">
  #img_profile{
    width: 100%;
    height:auto;
  }
    #img_profile >  a > img {
    width: 100%;
    height:auto;
}


  </style>
  		<div class="col-sm-3">
 
          <div class="panel">            
            <div id="img_profile" class="panel-body">
            <a href="" data-target="#myModal" data-toggle="modal" >
            <img title="profile image" class="img-hover"   src="<?php echo web_root. 'student/'.  $res->STUDPHOTO; ?>">
            </a>
             </div>
          <ul class="list-group  ">
               <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> <?php echo $res->FNAME .' '.$res->LNAME; ?> </li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Course</strong></span> <?php echo $resCourse->COURSE_NAME .'-'.$resCourse->COURSE_LEVEL; ?> </li>
              <li class="list-group-item text-right">
    <span class="pull-left"><strong>Tuition Status</strong></span> 
    <?php 
        if (!isset($res->enrollment_status) || empty($res->enrollment_status)) {
            echo '<span style="color: red;">Not Paid</span>';
        } else {
            if ($res->enrollment_status == 'Paid') {
                echo '<span style="color: green;">' . $res->enrollment_status . '</span>';
            } else {
                echo '<span style="color: red;">' . $res->enrollment_status . '</span>';
            }
        }
    ?> 
</li>
               <li class="list-group-item text-right"><span class="pull-left"><strong>Account</strong></span>
              
               <ul class="navbar-nav p navbar-right ">

<?php if (isset($_SESSION['IDNO']) ){  

  $student = New Student();
  $singlestudent = $student->single_student($_SESSION['IDNO']);

  if ($singlestudent->student_status=='Irregular') {
    # code...

  }
?> 
<li class="dropdown  dropdown-toggle">
   <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      <i class="fa fa-user fa-fw"></i>
        <?php echo $singlestudent->FNAME. ' ' . $singlestudent->LNAME ; ?>
      <i class="caret"> </i> 
   </a>

      <ul class="dropdown-menu dropdown-acnt"> 
        <li><a title="Edit" href="<?php echo web_root; ?>index.php?q=profile"  >My Profile</a></li> 
        <li> <a  href="logout.php">Logout</a></li>  
      </ul> 
</li>  

<?php  } else{?>
<li  class="tooltip-demo"><a data-toggle="tooltip" data-placement="left" title="Enrol Now" href="<?php echo web_root.'index.php?q=enrol'; ?>">Enroll Now!</a></li>
<?php } ?>

</ul>

              </li>
               
            
          </ul> 
                
        </div>
    </div>
         
        <!--/col-3-->
<div class="col-sm-9"> 

<div class="panel">            
  <div class="panel-body">
   <?php
       check_message();   
       ?>
  <ul class="nav nav-tabs" id="myTab">
  <li><a href="#classroom" data-toggle="tab">Classroom</a></li>
  
    <li><a href="#grades" data-toggle="tab">Grades</a></li>
    <?php 
    if ($res->student_status=='Irregular' || $res->student_status=='Transferee' && $res->NewEnrollees==0) {
      # code... 
    ?>
    <li><a href="#adddrop" data-toggle="tab">Adding and Dropping</a></li>
    <?php 
    }
    ?>
    <li><a href="#settings" data-toggle="tab">Update Account</a></li>
  
  </ul>
              
  <div class="tab-content">
   

            <div class="tab-pane" id="grades">
         
              <?php require_once  ("studentgrades.php"); ?>
          
       
            </div>
             <div class="tab-pane" id="adddrop">
         
              
              <?php //require_once  ("changingdropping.php"); ?>
          
       
            </div>
             <div class="tab-pane" id="settings">
    		 
              <?php require_once  ("updateyearlevel.php"); ?>
          
       
            </div><!--/tab-pane-->

            <div class="tab-pane" id="classroom">
    		 
         <?php require_once  ("classroom.php"); ?>
     
  
       </div><!--/tab-pane-->
  </div><!--/tab-content-->
</div><!--/col-9--> 

<!-- Modal structure -->

<div class="modal" tabindex="-1" role="dialog" id="notificationModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin-left: 100px; margin-top: 100px;">
            <div class="modal-header">
                <h5 class="modal-title"><img style="width: 100px; margin-left: 170px;" src="img/mcblogo.webp" alt=""></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <p>Hi !  <?php echo $res->FNAME .' '.$res->LNAME; ?> </p>
                <p>Your tuition payment is still pending.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- JavaScript code for the modal -->
<script>
    <?php if (!isset($res->enrollment_status) || $res->enrollment_status != 'Paid') { ?>
        $(document).ready(function () {
            $('#notificationModal').modal('show');
        });
    <?php } ?>
</script>


	  <!-- Modal photo -->
          <div class="modal fade" id="myModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal" type=
                  "button">×</button>

                  <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
                </div>

                <form action="student/controller.php?action=photos" enctype="multipart/form-data" method=
                "post">
                  <div class="modal-body">
                    <div class="form-group">
                      <div class="rows">
                        <div class="col-md-12">
                          <div class="rows">
                            <div class="col-md-8">
                              <input name="MAX_FILE_SIZE" type=
                              "hidden" value="1000000"> <input id=
                              "photo" name="photo" type=
                              "file">
                            </div>

                            <div class="col-md-4"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type=
                    "button">Close</button> <button class="btn btn-primary"
                    name="savephoto" type="submit">Upload Photo</button>
                  </div>
                </form>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
   