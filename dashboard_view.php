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
              $query="select d.company_id,company_name,backlog_active,cgpa,percent from drives as d, company as c where c.id=d.company_id and d.company_id in (select d.company_id from drives as d, drive_stream as ds where d.company_id=ds.company_id and d.course_id=".$row['course']."  and ds.stream_id=".$row['stream'].") group by company_id";
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
            <!--     <li class="tab col s4 l4"><a  href="#test4">Payment</a></li>-->
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
                            <h6>All applicants should report at 8:30AM on 16-03-2017.</h6>
                            <br>
                          </li>
                          <li>
                            <h6>Online payment is closed. The amount for JobFair can be paid during spot verification.</h6>
                            <br>
                          </li>
                          <li>
                            <h6>Those who want to attend software companies(except Allianz and Toonz animations) should appear for aptitude test on 16-03-2017.</h6>
                            <br>
                          </li>
                          <li>
                            <h6>One candidate can apply for a maximum of 4 companies.</h6>
                            <br>
                          </li>
                          <li>
                            <h6>Candidates should bring 4 passport size photos along with 4 copies of resume.</h6>
                            <br>
                          </li>
                          <li>
                            <h6>Srishti Innovative and Pivot Systems will conduct test on 16-03-2017. Interview will be conducted at Technopark,TVM on other dates.</h6>
                            <br>
                          </li>
                            <li>
                            <h6>Allianz and Toonz Animations will conduct interview on 16-03-2017 at TKMCE</h6>
                            <br>
                          </li>
                          <li>
                            <h6>Perfomatix, Cognub, Fazza, Corporate 360 will conduct interview on 17-03-2017 at TKMCE</h6>
                            <br>
                          </li>
                          <li>
                            <h6>Accommodation is provided in campus hostels. For more details,<a href="http://conjura.in/faq.html">Click Here</a></h6>
                            <br>
                          </li>
                          <li>
                            <h6>For Queries:<br>Rahul N R : 9400326063<br>Rahul S Shibu : 8129413503</h6>
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
                          <h6>All graduates (2016/17 passouts) and non graduates(Plus two/VHSE/Diploma)</h6>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12 l12">
                          <h6 class="colGreen">Eligibility</h6>
                        </div>
                        <div class="col s12 l12">
                          <h6>Fresher's or Experienced with Good Command over English</h6>
                          <br>
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
                          <h6>B.Tech:Computer Science ,Electronics and Communication,Electrical and Electronics Engineering<br>Bsc/Msc:Computer Science <br>MCA/BCA  <br>(2016/17 passouts)</h6>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12 l12">
                          <h6 class="colGreen">Eligibility</h6>
                        </div>
                        <div class="col s12 l12">
                          <h6>above 65 percentage or 6.5<br><br></h6>
                        </div>
                      </div>
                    </div>
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
                          <h6>B.Tech : Computer science <br>Bsc/Msc :computer science<br>BCA and MCA<br>(2016/17 passouts)</h6>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12 l12">
                          <h6 class="colGreen">Eligibility</h6>
                        </div>
                        <div class="col s12 l12">
                          <h6>70 percentage or above 7.0 cgpa</h6>
                          <br>
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
                          <h6>All graduates <br>(2016/17 passouts)</h6>
                        </div>
                      </div>                       
                      <div class="row">
                        <div class="col s12 l12">
                          <h6 class="colGreen">Eligibility</h6>
                        </div>
                        <div class="col s12 l12">
                          <h6>above60 percentage or 6.0 cgpa</h6>
                          <br>
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
                        <h5 class="center-align colGreen">Fazza Information Technology</h5>
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
                        <div class="col s12 l12" >
                          <h6>For B.Tech/M.Tech: Computer Science ,Electronics and Communication <br><span style="font-size:12px;"> Android Developer(2)
                            PHP developers,Asp.Net Developers,Web Designers<br>MCA/BCA -Asp.Net Developers <br>Bsc/Msc/Bcom :Jr. Admin Executive
                            Sales Excutives<br>(2016/17 passouts)</span>
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
                          <h6>B-tech: Computer science,Electronics and Communication<br>M-tech:Computer Science Engineering ,Communication Systems<br> Bsc/Msc : Computer science<br>BCA and MCA <br>(2016/17 passouts)</h6>
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
                        <h5 class="center-align colGreen">COGNUB DECISION SOLUTIONS PVT. LTD. </h5>
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
                          <h6>B.Tech:Computer Science <br>MCA/BCA<br>(2016/17 passouts)</h6>
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
                          <h6>B.Tech/MTech:Computer Science,Electronics and Communication,<br>BSc/MSc:ComputerScience <br>MCA/BCA<br>(2016/17 passouts)</h6>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12 l12">
                          <h6 class="colGreen">Eligibility</h6>
                        </div>
                        <div class="col s12 l12">
                          <h6>Above 55% or 5.5 CGPA</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>                   
                  
                  
                                 
                
              </div>
                
            <!-- Ends here -->
              <div class="row">
                
          



               
                    
                
                
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
	                                <td>".strtoupper($row1['name'])."</td></tr>
	                              <tr>
	                                <td class='colGreen'>Course:</td>
	                                <td>".strtoupper($row1['course_name'])."</td>
	                              </tr>
	                              <tr>
	                                <td class='colGreen'>Stream:</td>
	                                <td>".strtoupper($row1['stream_name'])."</td>
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
	                                <td>".strtoupper($row1['college'])."</td>
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
	            <!--profile end-->
<!--		        <div id="test4" class="col s12">
							<center>
							  <div class="row">
							    <div class="section"></div>
-->                  
<?php
						/*			$query="select trans_id from user where id=".$_SESSION['USER_ID'];
									$result=$con->query($query);
				          if($result->num_rows>0)
				          {
				            $row=$result->fetch_assoc();
				            if(empty($row['trans_id']))
				            {
											echo "<h5 class='colGreen jobportalHeading'>Complete Payment</h5>";	
           */           
?>
			<!--								<div class="section"></div>
									    <div class="container ">
									      <div class="z-depth-1 white  row formcard" style="display: inline-block; padding: 32px 48px 0px 48px; border-bottom: 3px solid #00D494;border-top: 3px solid #00D494;width:95%;">
									        <form name="regform" class="col s12" method="post" action="update_pay.php" >
									          <div class='row'>
									            <div class='col s12'>
									              <h5 class="colGreen loginHead">Instructions</h5>
									            </div>
									  	      </div>
									          <div class="row colGreen" style="font-weight:lighter;text-align:left;padding-left:19px;">
									            <ul>
									              <li>
									                <h6 style="line-height:1.8em">Registrations fee for job fair is <span style="background-color:#00d494;color:white;padding:5px;text-align:center;"> Rs 200.</span></h6>         
									              </li>
									              <li>
									                <h6 style="line-height:1.8em">TRANSFER(Please do not Recharge) the above mentioned amount using your Paytm account to the below mentioned phone number. </h6>          
									              </li>
									              <li> 
									                <h6>Enter the Transaction ID after completing the payment through PAYTM </h6>
									              </li>         
									            </ul>
									          </div>
									          <hr>
									            <center>
									          	  <div class='row'>
									                <label for="btn_pay" class="colGreen"><h6>PAYTM Account Number<br><br><span style="background-color:#00d494;color:white;padding:5px;text-align:center;"> +91 9400326063 </span> <br><br></h6></label>
									                <a  href="https://paytm.com" target="_blank" name='btn_pay' id='btn_pay' class='col s12 btn btn-large waves-effect colGreenbg'>Pay Amount</a>
									              </div>
									            </center>
									            <div class="row">
									              <div class="input-field col s12">
									                <input id="update_id" name="update_id" type="number" class="validate" aria-required="true" required>
									                <label for="update_id" class="">Transaction ID</label>
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
  -->                    
<?php														            	
				/*            }
				            else
				            {
				            	echo "<h5 class='colGreen jobportalHeading'>You Have Already Paid.Your Transaction ID is:".$row['trans_id']."</h5>";
				            }
				          }*/
?>						
							  </div>
					    </center>
		        </div>          
		        <!-- end test4-->
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
          alert(html);
        }
      });
}
</script>