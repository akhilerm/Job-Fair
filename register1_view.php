<?php
   session_start();
   require_once('db_connect.php');
   
   $name=cleanup($_POST['full_name'],$con);
   $phone=cleanup($_POST['phone'],$con);
   $email=cleanup($_POST['email'],$con);
   $dob=cleanup($_POST['dob'],$con);
   $password=cleanup($_POST['password'],$con);
   $repassword=cleanup($_POST['re-password'],$con);
   
   if((!empty($name)) && (!empty($phone)) && (!empty($email)) && (!empty($dob)) && (!empty($password)) && (!empty($repassword)) )
   {
       if(strlen($phone)==10)
       {  
         if(strcmp($password,$repassword)==0)
         {
            if(strlen($password)>=8 && strlen($repassword)>=8)
            {
               $_SESSION['NEW_USER']['PASSWORD']=sha1($password);
               $_SESSION['NEW_USER']['REPASSWORD']=sha1($repassword);
               $_SESSION['NEW_USER']['NAME']=$name;
               $_SESSION['NEW_USER']['EMAIL']=$email;
               $_SESSION['NEW_USER']['DOB']=$dob;
               $_SESSION['NEW_USER']['PHONE']=$phone;
               $_SESSION['NEXT']=1;
               $_SESSION['FLAG_COURSE']=1;
               $_SESSION['FLAG_STREAM']=1;
            }
            else
            {
               $_SESSION['MESSAGE']='Password Should Contain Atleast 8 Characters';
               header("location:index.php?switch=register");
               return;
            }
         }
         else
         {
           $_SESSION['MESSAGE']='Password Not Matching With Retype';
           header("location:index.php?switch=register");
           return;
         }
       } 
       else
       {
           $_SESSION['MESSAGE']='Enter a Valid Phone Number';
           header("location:index.php?switch=register");
           return;
       }
   
   }
   else
   {
     $_SESSION['MESSAGE']='All Fields Are Mandatory ';
     header("location:index.php?switch=register");
     return;
   }
   ?>
<?php  
   if($_SESSION['NEXT']==1)
   {
     unset($_SESSION['NEXT']);
   ?>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<main>
   <center>
      <div class="section"></div>
      <h5 class="colGreen jobportalHeading">REGISTRATION</h5>
      <div class="section"></div>
      <div class="container ">
         <div class="z-depth-1 white  row formcard" style="display: inline-block; padding: 32px 48px 0px 48px; border-bottom: 3px solid #00D494;border-top: 3px solid #00D494;width:95%;">
            <form class="col s12" method="post" action="register.php" enctype="multipart/form-data">
               <div class='row'>
                  <div class='col s12'>
                     <h5 class="colGreen loginHead">Registration</h5>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <select style="display: block;border: 1px solid #9e9e9e" id="course" name="course" required>
                     </select>
                  </div>
               </div>
               <div class="row" id="stream_div">
                  <div class="input-field col s12" >
                     <select style="display: block;border: 1px solid #9e9e9e" id="stream" name="stream" required>
                        <option value="" disabled selected>Select Stream</option>
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <label>Year of pass</label>
                     <br>
                     <p style="margin-left:-13px;">
                        <input name="yop" type="radio" id="yop1" value="2016" >
                        <label for="yop1">2016</label>
                        <input name="yop" type="radio" id="yop2" value="2017" >
                        <label for="yop2">2017</label>
                     </p>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <select style="display: block;border: 1px solid #9e9e9e" name="sem" id="sem">
                        <option value="" disabled selected>Select Semester</option>
                        <option value="1" >1st Semester</option>
                        <option value="2" >2nd Semester</option>
                        <option value="3" >3rd Semester</option>
                        <option value="4" >4th Semester</option>
                        <option value="5" >5th Semester</option>
                        <option value="6" >6th Semester</option>
                        <option value="7" >7th Semester</option>
                        <option value="8" >8th Semester</option>
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <input id="college" name="college" type="text" class="validate" required="" aria-required="true">
                     <label for="college" class="">College/School</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <input id="backlog" name="backlog" type="number" class=""  aria-required="true">
                     <label for="backlog">Active_Backlogs</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <label>Mark Scheme</label>
                     <br>
                     <p style="margin-left:-13px;">
                        <input name="mark" value="c" type="radio" id="mark1" required>
                        <label for="mark1">CGPA</label>
                        <input name="mark" value="p" type="radio" id="mark2" required>
                        <label for="mark2" >Percentage</label>
                     </p>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <input id="c_p" name="c_p" type="number" class="" step="any"  aria-required="true" required>
                     <label for="c_p">CGPA/Percentage</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <input id="sslc" name="sslc" type="number" class="" required="" aria-required="true" step="any" required>
                     <label for="sslc">SSLC(in percentage)</label>
                  </div>
               </div>
               <div class="row">
                  <div class="input-field col s12">
                     <input id="hsc" name="hsc" type="number" class=""  aria-required="true" step="any">
                     <label for="hsc">HSC(in percentage)</label>
                  </div>
               </div>
               <div class="row">
                  <div class="file-field input-field col s12">
                     <div class="colGreenbg btn">
                        <span>Resume</span>
                        <input type="file" name="file_up" required>
                         
                     </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" name="resume">
                      </div>
                  </div>
               
                </div>

      <br />
          <center>
              <div class='row'>
              <button type='submit' onclick='return validate()' name='btn_login' class='col s12 btn btn-large waves-effect colGreenbg'>Register</button>
              </div>
          </center>
      <br>
      </form>
      </div>
      </div>
   </center>
</main>
<?php
   }
   else
   {
     $_SESSION['MESSAGE']='REGISTRATION FAILED';
     header("location:index.php?switch=register");
   }
   ?>
<script type="text/javascript">
   $(document).ready(function() {
             //for loading list of courses
             var xmlhttp;
             if (window.XMLHttpRequest) 
                 xmlhttp = new XMLHttpRequest();
             else 
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
             xmlhttp.onreadystatechange = function()
             {
                 if (this.readyState == 4 && this.status == 200) 
                     document.getElementById("course").innerHTML = this.responseText;
             };
             xmlhttp.open("GET", "course_list.php?temp=1", true);
             xmlhttp.send();
             
             // display list of streams in the specified category
             $('#course').change(function() {
               if(document.getElementById("course").value=='108')
               {
                  document.getElementById("sem").disabled=true;
                  document.getElementById("backlog").disabled=true;
                  document.getElementById("mark1").disabled=true;
                  document.getElementById("mark2").disabled=true;
                  document.getElementById("c_p").disabled=true;
                  document.getElementById("hsc").disabled=true;
               }
               else
               {
                  document.getElementById("sem").disabled=false;
                  document.getElementById("backlog").disabled=false;
                  document.getElementById("mark1").disabled=false;
                  document.getElementById("mark2").disabled=false;
                  document.getElementById("c_p").disabled=false;
                  document.getElementById("hsc").disabled=false; 
               }
               var xmlhttp;           
               if (window.XMLHttpRequest) 
                   xmlhttp = new XMLHttpRequest();
               else 
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
               xmlhttp.onreadystatechange = function()
                {
                   if (this.readyState == 4 && this.status == 200) 
                   {
                     /*if(this.responseText=='-1')
                       document.getElementById("stream_div").innerHTML='';
                     else*/
                       document.getElementById("stream").innerHTML = this.responseText;
                   }
                };
               var course1= document.getElementById("course");
               var course= course1[course1.selectedIndex].value;
               xmlhttp.open("GET", "stream_list.php?temp=2&course_id="+course, true);
               xmlhttp.send();
           });
   });
</script>