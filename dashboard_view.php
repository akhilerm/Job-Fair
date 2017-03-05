<?php
include("header.php");
?>

<main>
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
        <div class="col s12 l3">
          <div class="card">
            <div class="card-image">
              <img src="images/atm.png" style="border-bottom:1px solid #00d494">
            
            </div>
            <div class="card-content">
               <div class="row">
                   <h5 class="center-align colGreen">Atletico</h5>
                   <hr class="style1">
                   <div class="col s6 l6">
                        <h6 class="colGreen">CTC</h6>
                   </div>
                   
                   <div class="col s6 l6">
                        <h6>3LPA</h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s6 l6">
                        <h6 class="colGreen">Who can apply</h6>
                   </div>
                   
                   <div class="col s6 l6">
                        <h6>B-tech,B-com</h6>
                   </div>         
                </div>
                
                <div class="row">
                   <div class="col s6 l6">
                        <h6 class="colGreen">Eligibility</h6>
                   </div>
                   
                   <div class="col s6 l6">
                        <h6>60% mark or 6% gpa</h6>
                   </div>         
                </div>
            </div>

          </div>
        </div>
      </div>
      
      
      
      
      
      
      
      
      
      
      
    </div>
      
      
      
      
    <div id="test2" class="col s12">
      
      
      
        <table class="driveTable striped centered">
        <thead>
          <tr >
              <th data-field="id">Company Name</th>
              <th data-field="name">Eligibility</th>
              
          </tr>
        </thead>

        <tbody class="colGreen">
          <tr >
            <td>Alvin</td>
            <td>Eclair</td>
            <td> <button class="btn-flat waves-effect waves-light" style="border:1px solid #00d494;color:#00d494" type="submit" name="action">Apply
    <i class="material-icons right">send</i>
  </button> </td>
            
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
          
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
          
          </tr>
        </tbody>
      </table>
      
      
      
      
      </div>

    <div id="test3" class="col s12">
      
      
      <div class="row">
      <div class="" style="margin:0 auto; width:80%;">
        <div class="card-panel">
          <span class="white-text">I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
          </span>
        </div>
      </div>
    </div>
     </div>
  </div>
    </div>

</main>
<?php
include("footer.php");
?>