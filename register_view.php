<main>
    <center>
        <div class="section"></div>
        <h5 class="colGreen jobportalHeading">REGISTRATION</h5>
		<div class="section">
            <?php 
                session_start();  
                if(isset($_SESSION['MESSAGE']))
                {
                  echo  $_SESSION['MESSAGE'];
                  unset($_SESSION['MESSAGE']);
                }
            ?>
        </div>        <div class="container ">
            <div class="z-depth-1 white  row formcard" style="display: inline-block; padding: 32px 48px 0px 48px; border-bottom: 3px solid #00D494;border-top: 3px solid #00D494;width:95%;">
                <form class="col s12" method="post" action="index.php?switch=next">
                    <div class='row'>
                        <div class='col s12'>
                            <h5 class="colGreen loginHead">Registration</h5>
                        </div>
                    </div>
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
                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='password' name='password' id='password' required="" aria-required="true" />
                            <label for='password'>Enter password</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='password' name='re-password' id='re-password'  required="" aria-required="true"/>
                            <label for='password'>Retype password</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <label style="margin-bottom:10px;">DOB</label>   
                            <br>
                            <input type="date" class="datepicker" name="dob" id="dob" required> 
                        </div>
                    </div>
                    <br />
                    <center>
                        <div class='row'>
                            <button type='submit'  name='btn_login'   class='col s12 btn btn-large waves-effect colGreenbg'>Next</button>
                        </div>
                    </center>
                    <br>
                </form>
            </div>
        </div>
    </center>
</main>