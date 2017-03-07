<?php
  include("header.php");
  require_once("db_connect.php");
  if(session_check()==true)
  {
    if($_SESSION['LoggedINUser']==1)
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
                          <tbody class="colGreen">';
                $count=0;
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
                      <td> <button class="btn-flat waves-effect waves-light" value="'.$_SESSION["COMPANY_ID"].'" onclick="apply('.$_SESSION["COMPANY_ID"].','.$count.')"  style="border:1px solid #00d494;color:#00d494" type="submit" name="action" id="action">Apply
                      <i class="material-icons right">send</i>
                      </button> </td> ';
                    }
                    else 
                    {
                      $string.='<td>Not Eligible</td> ';
                    } 
        
                    $string.='</tr>';
                }
                $string.='</tbody> </table>';
              }
              else
                $string.='<div class="card-panel colGreen driveTable"><h6 style="text-align:center">Currently There are No drives</h6></div>';
            }
            else
              $string.='<div class="card-panel colGreen driveTable"><h6 style="text-align:center">Currently There are No drives</h6></div>';
          }
          else
            $string.='<div class="card-panel colGreen driveTable"><h6 style="text-align:center">Currently There are No drives</h6></div>';
?>
      <main>
        <a href="logout.php" class="logout btn-flat waves-effect waves-light" style="border:1px solid #00d494;color:#00d494" name="action1" >Logout
        </a> 
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
                            <h6>orem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elit</h6>
                            <br>
                          </li>
                          <li>
                            <h6>Lorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elit.</h6>
                            <br>
                          </li>
                          <li>
                            <h6>Aliquam tincidunt mauris eu risus.</h6>
                            <br>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col s12 l3">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/ali.jpg" style="border-bottom:1px solid #00d494">
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
                      <img src="images/sri.jpg" style="border-bottom:1px solid #00d494">
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
                    </div>Duplicate entry '1234512345' for key 'phone'
                  </div>
                </div>
                <div class="col s12 l3">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/piv.jpg" style="border-bottom:1px solid #00d494">
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
                      <img src="images/too.jpg" style="border-bottom:1px solid #00d494">
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
                      <img src="images/faz.jpg" style="border-bottom:1px solid #00d494">
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
                      <img src="images/per.jpg" style="border-bottom:1px solid #00d494">
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
                      <img src="images/cog.jpg" style="border-bottom:1px solid #00d494">
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
                  
                  
                  
                <div class="col s12 l3">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/cor.jpg" style="border-bottom:1px solid #00d494">
                    </div>
                    <div class="card-content">
                      <div class="row">
                        <h5 class="center-align colGreen">Corporate360 </h5>
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
                  
                
              </div>
                
            <!-- Ends here -->
              <div class="row">
                
                  <div class="col s12 l3">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/mut.jpg" style="border-bottom:1px solid #00d494">
                    </div>
                    <div class="card-content">
                      <div class="row">
                        <h5 class="center-align colGreen">Muthoot Pappachan Technologies LTD. </h5>
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
                    
                
                
              </div>
                
                
                  
            <!-- Ends here -->  
            </div>

            <div id="test2" class="col s12">
                <?php  echo $string;  ?>

            </div>
         
          <div id="test3" class="col s12">
            <div class="row">
              <div class="driveTable" style="margin:15px auto; ">
                  <table class="striped centered">
                    <thead>
                      
                          
                          <h5 class="center-align colGreen" > Personal Profile</h5>
                        <hr class="style1">
                      
                    </thead>
                    <tbody>
                      <?php
                          $query_user="select * from user as u,course as c, stream as s where u.course=c.id and u.stream=s.id and u.id=".$_SESSION['USER_ID'];
                          $result_user=$con->query($query_user);
                          if($result_user)
                          {
                            $row1=$result_user->fetch_assoc();
                            echo 
                             "<tr>
                                <td class='colGreen'>Conjura ID:</td>
                                <td>".$_SESSION['USER_ID']."</td>
                              </tr>
                              <tr>
                                <td class='colGreen'>Name:</td>
                                <td>".$row1['name']."</td></tr>
                              <tr>
                                <td class='colGreen'>Course:</td>
                                <td>".$row1['course_name']."</td>
                              </tr>
                              <tr>
                                <td class='colGreen'>Stream:</td>
                                <td>".$row1['stream_name']."</td>
                              </tr>
                              <tr>
                                <td class='colGreen'>Year Of Pass:</td>
                                <td>".$row1['yop']."</td></tr>
                              <tr>
                                <td class='colGreen'>Email:</td>
                                <td>".$row1['email']."</td>
                              </tr>
                              <tr>
                                <td class='colGreen'>College:</td>
                                <td>".$row1['college']."</td>
                              </tr>
                              <tr>
                                <td class='colGreen'>Phone:</td>
                                <td>".$row1['phone']."</td>
                              </tr>";

                          }
                          else
                          {
                            echo "Welcome";
                          }
                      ?>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      </main>
<?php
    }
    else
      header("location:logout.php");
  }    
  else
  {
    header("location:index.php");
  }

  include("footer.php");
?>

<script>
function apply(company_id,count)
{
      $.ajax({
        type:'POST',
        url:'apply.php',
        data:'C_ID='+company_id,
        success:function(html){
          $(this).attr('disabled', 'disabled');                           //check
          alert(html);
        }
      });
}
</script>