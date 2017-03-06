<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<?php
include("header.php");
require_once("db_connect.php");
require_once("query.php");
if($_SESSION['LOGIN']==1 && $_SESSION['PASSWORD']==$verify)
{
  $query="select * from user where id=".$_SESSION['USER_ID'];
  $result=$con->query($query);
  if($result->num_rows>0)
  {
    $row=$result->fetch_assoc();
    $string='';
    if($result)
    {
      $query="select d.company_id,company_name,backlog_active,cgpa,percent from drives as d, company as c where c.id=d.company_id and d.company_id in (select d.company_id from drives as d, drive_stream as ds where d.company_id=ds.company_id and d.course_id=".$row['course']."  and ds.stream_id=".$row['stream'].")";
      $result=$con->query($query);
      if($result->num_rows>0)
      {
        $count=0;
        $string.='<table class="driveTable striped centered">
                  <thead>
                    <tr >
                        <th data-field="id">Company Name</th>
                        <th data-field="name">Eligibility</th>
                        <th data-field="name">Apply</th>       
                    </tr>
                  </thead>
                  <div id="test2" class="col s12">
                  <tbody class="colGreen">';
        while($row_comp=$result->fetch_assoc())
        {
          $count++;
          $string.='<tr >
              <td>'.$row_comp['company_name'].'</td>';
          if($row['backlog']<=$row_comp['backlog_active'] && ($row['cgpa']>=$row_comp['cgpa'] || $row['percent']>=$row_comp['percent'])) 
            {
              $_SESSION['APPLY_FLAG']=1;
              $_SESSION['COMPANY_ID']=$row_comp['company_id'];
              $string.='<td>Eligible</td>  
              <td> <button id="btn'.$count.'" class="btn-flat waves-effect waves-light" onclick="apply('.$_SESSION['COMPANY_ID'].','.$count.')" style="border:1px solid #00d494;color:#00d494" type="submit" name="action">Apply
              <i class="material-icons right">send</i>
              </button> </td> ';
            }
            else 
            {
              $string.='<td>Not Eligible</td> <td></td>';
            } 

            $string.='</tr>';
        }
        $string.='</tbody> </table>';
      }
      else
        $string.='Currently There are No drives';
    }
    else
      $string.='Currently There are No drives';
  }
  
  else
    $string.='Currently There are No drives';
  
?>

<main>
    
 <button class="logout btn-flat waves-effect waves-light" style="border:1px solid #00d494;color:#00d494" type="submit" name="action">Logout
                
</button> 
 <div class="container-fluid">

  <div class="row" style="margin-top:5px;">
    <div class="col s12">
      <ul class="tabs tabs-fixed-width" style="overflow-x:hidden">
        <li class="tab col s4 l4"><a class="active" href="#test1">Messages</a></li>
        <li class="tab col s4 l4"><a  href="#test2">Drive</a></li>
        <li class="tab col s4 l4"><a  href="#test3">Profile</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">
        
         <div class="row">
        <!-- Starts here -->
                  <div class="col s12 l12">
              <div class="card">
                
                <div class="card-content">
                   <div class="row">
                       <h5 class="center-align colGreen" style="text-weight:bold;">General Notifications</h5>
                       <hr class="style1">       
                    </div>
                    
                    <div class="row colGreen" style="font-weight:bold;">
                       <ul style="padding-left:24px;">
                            <li>
                                   <h6>orem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elit</h6><br>
                            </li>
                          
                           <li>
                                    <h6>Lorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elit.</h6><br>
                            </li>
                          
                           <li>
                                    <h6>Aliquam tincidunt mauris eu risus.</h6> <br>
                            </li>
                           
                        </ul>        
                    </div>
                    
                   
                </div>

              </div>
            </div>

      
    <div class="col s12 l3">
          <div class="card">
            <div class="card-image">
              <img src="images/atm.png" style="border-bottom:1px solid #00d494">
            
            </div>
            <div class="card-content">
               <div class="row">
                   <h5 class="center-align colGreen">ALLIANZ CORNHILL INFORMATION SERVICES PVT</h5>
                   <hr class="style1">
                   <div class="col s12 l12">
                        <h6 class="colGreen">CTC</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>2.5-3.5LPA</h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Who can apply</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>All graduates and non graduates(Plus two/VHSE/Diploma)</h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Eligibility</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>Fresher's or Experienced with Good Command over English</h6>
                   </div>         
                </div>
            </div>

          </div>
        </div>

             
             
     <div class="col s12 l3">
          <div class="card">
            <div class="card-image">
              <img src="images/atm.png" style="border-bottom:1px solid #00d494">
            
            </div>
            <div class="card-content">
               <div class="row">
                   <h5 class="center-align colGreen">SRISHTI INNOVATIVE</h5>
                   <hr class="style1">
                   <div class="col s12 l12">
                        <h6 class="colGreen">CTC</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>To be decided</h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Who can apply</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>B.tech:Computer scince ,Electronics and communication and Electrical and electronics enginnering<br>Bsc/Msc:Computer scince <br>MCA/BCA</h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Eligibility</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>above 65 percentage or 6.5</h6>
                       
                   </div>         
                </div>
            </div>

          </div>
        </div>            
             
             
             
             
             
    <div class="col s12 l3">
          <div class="card">
            <div class="card-image">
              <img src="images/atm.png" style="border-bottom:1px solid #00d494">
            
            </div>
            <div class="card-content">
               <div class="row">
                   <h5 class="center-align colGreen">PIVOT <br/> SYSTEMS</h5>
                   <hr class="style1">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Salary</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>24000/month</h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Who can apply</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>B.tech : Computer sceince <br>Bsc/Msc :computer scince<br>BCA and MCA</h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Eligibility</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>70 percentage or above 7.0 cgpa</h6>
                       <br>
                   </div>         
                </div>
            </div>

          </div>
        </div>
 <div class="col s12 l3">
          <div class="card">
            <div class="card-image">
              <img src="images/atm.png" style="border-bottom:1px solid #00d494">
            
            </div>
            <div class="card-content">
               <div class="row">
                   <h5 class="center-align colGreen">TOONZ ANIMATIONS INDIA PVT Ltd</h5>
                   <hr class="style1">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Salary</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>10000 -20000 per month</h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Who can apply</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>All graduates </h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Eligibility</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>above60 percentage or 6.0 cgpa</h6>
                       <br>
                   </div>         
                </div>
            </div>

          </div>
        </div>
             
        </div>
        <div class="row">
<div class="col s12 l3">
          <div class="card">
            <div class="card-image">
              <img src="images/atm.png" style="border-bottom:1px solid #00d494">
            
            </div>
            <div class="card-content">
               <div class="row">
                   <h5 class="center-align colGreen">FAZZA Information Technology</h5>
                   <hr class="style1">
                   <div class="col s12 l12">
                        <h6 class="colGreen">CTC</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>To be decided later</h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Who can apply</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>For B.tech/M.tech: computer scince ,electronics and communication - Android Developer(2)
Php developers,Asp.Net Developers,Web designers<br>MCA/BCA -Asp.Net Developers <br>Bsc/Msc/Bcom :Jr. Admin Executive
Sales Excutives

 </h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Eligibility</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>Candidates with backlogs can apply</h6>
                   </div>         
                </div>
            </div>

          </div>
        </div>
            

 <div class="col s12 l3">
          <div class="card">
            <div class="card-image">
              <img src="images/atm.png" style="border-bottom:1px solid #00d494">
            
            </div>
            <div class="card-content">
               <div class="row">
                   <h5 class="center-align colGreen">PERFOMATIX SOLUTIONS PVT LTD</h5>
                   <hr class="style1">
                   <div class="col s12 l12">
                        <h6 class="colGreen">CTC</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>To be decided later</h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Who can apply</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>B-tech: Computer science,Electronics and Communication<br>M-tech:Computer Science Engineering ,Communication Systems<br> Bsc/Msc : Computer science<br>BCA and MCA </h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Eligibility</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>65 percentage or 6.5 And Above </h6>
                   </div>         
                </div>
            </div>

          </div>
        </div>   

            

 <div class="col s12 l3">
          <div class="card">
            <div class="card-image">
              <img src="images/atm.png" style="border-bottom:1px solid #00d494">
            
            </div>
            <div class="card-content">
               <div class="row">
                   <h5 class="center-align colGreen">Cognub Decision Solutions Pvt. Ltd. </h5>
                   <hr class="style1">
                   <div class="col s12 l12">
                        <h6 class="colGreen">CTC</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>To be decided </h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Who can apply</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>B.tech:Computer scince <br>MCA/BCA</h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s12 l12">
                        <h6 class="colGreen">Eligibility</h6>
                   </div>
                   
                   <div class="col s12 l12">
                        <h6>Above 70 or 7.0 cgpa</h6>
                   </div>         
                </div>
            </div>

          </div>
        </div> 
                          
<!-- Ends here -->
      </div>
      
      
      
      
      
      
      
      
      
      
      
    </div>
      
      
         <?php echo $string;  ?> 
          


      
      
      
      
      </div>

    <div id="test3" class="col s12">
      
      
      <div class="row">
      <div class="" style="margin:0 auto; width:80%;">
        <div class="card-panel">
          <span class="white-text">
          </span>
        </div>
      </div>
    </div>
     </div>
  </div>
    </div>

</main>
<?php
}
include("footer.php");
?>

<script type="text/javascript">
  function apply(company, count)
  {
     var xmlhttp;
     if (window.XMLHttpRequest) 
         xmlhttp = new XMLHttpRequest();
     else 
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
     xmlhttp.onreadystatechange = function()
     {
         if (this.readyState == 4 && this.status == 200) 
         {
            if(this.responseText ==-2)
            {
              alert("Already Applied");
              document.getElementById('btn'+count).disabled=true;
            }
            else  if(this.responseText ==-1 || this.responseText ==-3)
                alert("Something Went Wrong..Try Again");
            else  if(this.responseText ==0 )
            {
              alert("Applied Successfully");
              document.getElementById('btn'+count).disabled=true;
            }


         }
     };
     xmlhttp.open("GET", "apply.php?company="+company, true);
     xmlhttp.send();
     


  }


   /*$(document).ready(function() {
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
             $('#course').click(function() {
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

}*/
</script>             