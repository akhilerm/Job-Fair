<?php
include("header.php");
require_once("admin_query.php");
require_once("db_connect.php");
  session_create();
  if (session_check()==true)
  { 
    if (isset($_SESSION['LoggedINAdmin']))
    {
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <main>
       <a class="logout btn-flat waves-effect waves-light" href = "logout.php" style="border:1px solid #00d494;color:#00d494" window.location="logout.php">Logout
                
</a> 

      <div class="row" style="margin-top:5px;">
        <div class="col s12">
          <ul class="tabs tabs-fixed-width" style="overflow-x:hidden">
            <li class="tab col s4 l4"><a class="active" href="#test1">Company</a></li>
            <li class="tab col s4 l4"><a  href="#test2">Add Drive</a></li>
            <li class="tab col s4 l4"><a  href="#test3">Add Stream</a></li>
            <li class="tab col s4 l4"><a  href="#test4">Search</a></li>
            <li class="tab col s4 l4"><a  href="#test5">Edit</a></li>
            <li class="tab col s4 l4"><a  href="#test6">Display</a></li>
              
            
          </ul>
        </div>
        <div id="test1" class="col s12">   
          
                    <table class="driveTable striped centered">
                    <thead>
                      <tr >
                          <th data-field="id">Company Name</th>
                          

                      </tr>
                    </thead>

                    <tbody class="colGreen">
                      <!-- <tr >
                        <td>Alvin</td>
                        
                  </tr>
                  <tr>
                    <td>Jonathan</td>
                    
                   
                  </tr> -->
                  <?php
                    $result=get_all_company($con);
                    while($row = $result->fetch_assoc()){
                      echo "<tr><td>".$row['company_name']."</td></tr>";
                    }
                  ?>
                    
                   <tr>
                    <td>
                      <form action="add_company.php" method="POST">
                        <div class="row">
                            <div class="input-field col s8">
                                <input  id="full_name" name="full_name" type="text" class="validate" required="" aria-required="true">
                                <label for="first_name">Company Name</label>
                            </div>
                            <div class="col s4">
                                  <button class="btn-flat waves-effect waves-light" style="margin-top:22px;border:1px solid #00d494;color:#00d494" id="add_c" type="submit">Add
                                    <i class="material-icons right">send</i>
                                  </button> 
                            </div>
                        </div></form>
                    </td>
                  </tr>
                </tbody>
              </table>
      
    </div>     
          
          
          
        <div id="test2" class="col s12">
            <div class="profileCard" style="margin:0 auto;">
            <div class="card-panel">
                
                <form action="add_drive.php" method="POST">
                
                     <div class="row">
                      <div class="input-field col s12">
                         <select style="display: block;border: 1px solid #9e9e9e" name="company2" id="company2">
                            <?php
                                $result = get_all_company($con);
                                $string="";
                                while($row=$result->fetch_assoc()){
                                  $string=$string."<option value='".$row['id']."'>".$row['company_name']."</option>";
                                }
                                echo $string;
                            ?>
                                                       
                         </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                         <select style="display: block;border: 1px solid #9e9e9e" name="course2" id="course2">
                            <?php
                              $courses=get_all_courses($con); 
                              while ($row2=$courses->fetch_assoc()) {
                                echo '<option value = '.$row2['id'].'>'.$row2['course_name'].'</option>';
                              }
                            ?>
                           
                         </select>
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
                         <input id="cgpa" name="cgpa" type="number" class=""  aria-required="true">
                         <label for="cgpa">CGPA</label>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="input-field col s12">
                         <input id="perc" name="perc" type="number" class=""  aria-required="true">
                         <label for="perc">percentage</label>
                      </div>
                    </div>
                    
                    <div class="row">
                         <div class="col s12">
                                      <button class="btn-flat waves-effect waves-light" style="margin-top:22px;border:1px solid #00d494;color:#00d494" type="submit" name="sub_button2  ">Add
                                        <i class="material-icons right">send</i>
                                      </button> 
                        </div>
                    
                    </div>
                
                
                </form>
          
            </div>
          </div>  

        </div>
        <?php
        $_SESSION['FLAG_STREAM']=2;
        ?>
         <script> 
         $(document).ready(function(){
          $('#company3').on('change',function(){
            var cmID = $(this).val();
            if(cmID){
              $.ajax({
                type:'POST',
                url:'drive_course_list.php',
                data:'cmpid='+cmID,
                success:function(html){
                  $('#course3').html(html);
                }
              }); 
            }
          });
          $('#course3').on('change',function(){
            var crID = $(this).val();
            if(crID){
              $.ajax({
                type:'POST',
                url:'stream_list.php',
                data:'crID='+crID,
                success:function(html){
                  $('#stream3').html(html);
                }
              }); 
            }
          });
                  
        });
        function get_applied(){
              var company4_id=$('#company4').val();
              $.ajax({
              type:'POST',
              url:'all_companies.php',
              data:'cmpID='+company4_id,
              success:function(html){
                $('#fill_table').html(html);
              }
              }); 
          } 
        </script>
        <div id="test3" class="col s12">
          
                      <div class="profileCard" style="margin:0 auto;">
                    <div class="card-panel">

                        <form action="add_drive_stream.php" method="POST">

                             <div class="row">
                              <div class="input-field col s12">
                                 <select style="display: block;border: 1px solid #9e9e9e" name="company3" id="company3">
                                    <?php
                                      $result = get_all_company($con);
                                      while($row=$result->fetch_assoc()){
                                        ?>
                                        <option value='<?php echo $row['id']; ?>'><?php echo $row['company_name']; ?></option>;
                                        <?php
                                      }
                                    ?>
                                 </select>
                              </div>
                            </div>
                            <div class="row">
                              <div class="input-field col s12">
                                 <select style="display: block;border: 1px solid #9e9e9e" name="course3" id="course3">
                                    <option value="0" disableselected>Select Course</option>
                                 </select>
                              </div>
                            </div>
                            <div class="row">
                              <div class="input-field col s12">
                                 <select style="display: block;border: 1px solid #9e9e9e" name="stream3" id="stream3">
                                    <option value="0" disabledselected>Select Stream</option>

                                 </select>
                              </div>
                            </div>
                        
                            <div class="row">
                                 <div class="col s12">
                                              <button class="btn-flat waves-effect waves-light" style="margin-top:22px;border:1px solid #00d494;color:#00d494" type="submit" name="action">Add
                                                <i class="material-icons right">send</i>
                                              </button> 
                                </div>

                            </div>


                        </form>

                    </div>
                  </div> 
      
         </div>
      
         <div id="test4" class="col s12">
                  <div class="profileCard" style="margin:0 auto;">
                    <div class="card-panel">

                        <!-- <form> -->

                             <div class="row">
                              <div class="input-field col s12">
                                 <select style="display: block;border: 1px solid #9e9e9e" name="company4" id="company4">
                                    <?php
                                      $result = get_all_company($con);
                                      while($row=$result->fetch_assoc()){
                                        ?>
                                        <option value='<?php echo $row['id']; ?>'><?php echo $row['company_name']; ?></option>;
                                        <?php
                                      }
                                    ?>

                                 </select>
                              </div>
                            </div>
                            
                        
                            <div class="row">
                                 <div class="col s12">
                                              <button class="btn-flat waves-effect waves-light" style="margin-top:22px;border:1px solid #00d494;color:#00d494" name="search_button" id="search_button" onclick="get_applied()">Search
                                                <i class="material-icons right">send</i>
                                              </button> 
                                </div>

                            </div>


                        <!-- </form> -->
                         <table class=" striped centered">

                        <!-- from here --> 
                    <div id="fill_table">
                    
                    </div>
                    <!-- to here  -->
                  </table>
                        
                        

                    </div>
                  </div> 
          
        
         </div>   
            
          <div id="test5" class="col s12">
          
                      <div class="profileCard" style="margin:0 auto;">
                    <div class="card-panel">

                        <form>

                             <div class="row">
                                  <div class="input-field col s12">
                                     <input id="id" name="id" type="number" class=""  aria-required="true">
                                     <label for="id">ID</label>
                                  </div>
                               </div>
                            
                              <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='email' name='email' id='email' required="" aria-required="true"/>
                                <label for='email'>Enter your email</label>
                            </div>
                        </div>
                            <div class="row">
                                 <div class="col s12">
                                              <button class="btn-flat waves-effect waves-light" style="margin-top:22px;border:1px solid #00d494;color:#00d494" type="submit" name="action">Search
                                                <i class="material-icons right">send</i>
                                              </button> 
                                </div>

                            </div>


                        </form>
                        <form>
                        
                            <div class="row">
                            <div class="input-field col s12">
                                <input  id="full_name" name="full_name" type="text" class="validate" required="" aria-required="true">
                                <label for="first_name">Full Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="icon_telephone" name="phone" id="phone" type="tel" class="validate" required="" aria-required="true">
                                <label for="icon_telephone">Mobile Number</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='email' name='email' id='email' required="" aria-required="true"/>
                                <label for='email'>Enter your email</label>
                            </div>
                        </div>
                        
                           <div class="row">
                            
                              <div class="input-field col s12">
                                 <label>Mark Scheme</label>
                                 <br>
                                 <p style="margin-left:-13px;">
                                    <input name="group2" type="radio" id="cgpa1">
                                    <label for="cgpa1">CGPA</label>
                                    <input name="group2" type="radio" id="perc1">
                                    <label for="perc1">Percentage</label>
                                 </p>
                              </div>
                   
                           </div>
                           <div class="row">
                              <div class="input-field col s12">
                                 <input id="cgpa" name="cgpa" type="number" class=""  aria-required="true">
                                 <label for="cgpa">CGPA/Percentage</label>
                              </div>
                           </div>    

                        </form>

                    </div>
                  </div> 
        
         </div>  
          
          <div id="test6" class="col s12">
          
                <div class="row">
                  <div class="col s12 l3">
                    <div class="card-panel">
                       <h5 style="text-align:center">Company Name</h5>
                        <hr>
                        <table>
                            <tr>
                                <td>Btech</td>
                                <td>Civil</td>
                            </tr>
                             <tr>
                                <td>Btech</td>
                                <td>EEE</td>
                            </tr>
                             <tr>
                                <td>Btech</td>
                                <td>CS</td>
                            </tr>
                            
                        </table>
                    </div>
                  </div>
                </div>
        
         </div> 
            
        </div>
      

    </main>

    <?php
    include("footer.php");
    ?>

    
    <?php
    }
    else
      header("location:index.php");
}
else
  header("location:index.php");
?>