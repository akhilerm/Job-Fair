<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<main>
    <center>
        <div class="section"></div>
        <h5 class="colGreen jobportalHeading">REGISTRATION</h5>
        <div class="section"></div>
        <div class="container ">
            <div class="z-depth-1 white  row formcard" style="display: inline-block; padding: 32px 48px 0px 48px; border-bottom: 3px solid #00D494;border-top: 3px solid #00D494;width:95%;">
                <form class="col s12" method="post" action="register.php">
                    <div class='row'>
                        <div class='col s12'>
                            <h5 class="colGreen loginHead">Registration</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input  id="full_name" type="text" class="validate">
                            <label for="first_name">Full Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="icon_telephone" type="tel" class="validate">
                            <label for="icon_telephone">Mobile Number</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select style="display: block;border: 1px solid #9e9e9e" id="course">
                                 <option value="" disabled selected>Select Stream</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select style="display: block;border: 1px solid #9e9e9e" id="stream">
                                <option value="" disabled selected>Select Stream</option>
                            </select>
                        </div>
                    </div>
                    <br />
                    <center>
                        <div class='row'>
                            <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect colGreenbg'>Register</button>
                        </div>
                    </center>
                    <br>
                </form>
            </div>
        </div>
    </center>
</main>
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
              
              // for initially loading list of btech streams
              var xmlhttp;
              if (window.XMLHttpRequest) 
                  xmlhttp = new XMLHttpRequest();
              else 
                 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              xmlhttp.onreadystatechange = function()
              {
                  if (this.readyState == 4 && this.status == 200) 
                    document.getElementById("stream").innerHTML = this.responseText;
              };
              xmlhttp.open("GET", "stream_list.php?temp=2&course_id=101", true);
              xmlhttp.send();
              
              // display list of streams in the specified category
              $('#course').change(function() {
                var xmlhttp;           
                if (window.XMLHttpRequest) 
                    xmlhttp = new XMLHttpRequest();
                else 
                   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                xmlhttp.onreadystatechange = function()
                 {
                    if (this.readyState == 4 && this.status == 200) 
                      document.getElementById("stream").innerHTML = this.responseText;
                 };
                var course1= document.getElementById("course");
                var course= course1[course1.selectedIndex].value;
                xmlhttp.open("GET", "stream_list.php?temp=2&course_id="+course, true);
                xmlhttp.send();
            });
    });
</script>