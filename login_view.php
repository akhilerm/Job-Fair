<main>
    <center>
        <div class="section"></div>
        <div class="section">
            <?php 
                if(isset($_SESSION['MESSAGE']))
                {
                  echo  $_SESSION['MESSAGE'];
                  unset($_SESSION['MESSAGE']);
                }
            ?>
        </div>
        <div class="container">
            <div class="formcard z-depth-1 white  row" style="display: inline-block; padding: 32px 48px 0px 48px; border-bottom: 3px solid #00D494;border-top: 3px solid #00D494;">
                <form class="col s12" method="post" action="login.php">
                    <div class='row'>
                        <div class='col s12'>
                            <h5 class="colGreen loginHead">Login</h5>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='email' name='email' id='email' />
                            <label for='email'>Enter your email</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='password' name='password' id='password' />
                            <label for='password'>Enter your password</label>
                        </div>
                    </div>
                    <br />
                    <center>
                        <div class='row'>
                            <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect colGreenbg'>Login</button>
                        </div>
                    </center>
                    <a class='colGreen' href="index.php?switch=register" >Create account</a>
                    <br>
                </form>
            </div>
        </div>
    </center>
</main>