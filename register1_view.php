



<main>
           <center>
     
      <div class="section"></div>

      <h5 class="colGreen jobportalHeading">REGISTRATION</h5>
      <div class="section"></div>

      <div class="container ">
        <div class="z-depth-1 white  row formcard" style="display: inline-block; padding: 32px 48px 0px 48px; border-bottom: 3px solid #00D494;border-top: 3px solid #00D494;width:95%;">

          <form class="col s12" method="post">
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
            <option value="" disabled selected>Select Course</option>
            <option value="1">Arsenal</option>
            <option value="2">Chelsea</option>
            <option value="3">Manchester United</option>
            </select>
        </div>
        </div>  
              
              <div class="row">
                <div class="input-field col s12">
            <select style="display: block;border: 1px solid #9e9e9e" id="stream">
            <option value="" disabled selected>Select Stream</option>
            <option value="1">Arsenal</option>
            <option value="2">Chelsea</option>
            <option value="3">Manchester United</option>
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
            $(function() {

                $('#teams').change(function() {

                    var 
                        selectedValue = $('#teams').val(),
                        dataSource,
                        i;

                    if (selectedValue === '1') {

                        dataSource = ['Mikel', 'Obi', 'Mikel'];
                    }
                    else if (selectedValue === '2') {

                        dataSource = ['Test 1', 'Test 2', 'Test 3'];
                    }

                    $('#players').html('');

                    for (i in dataSource) {

                        $('#players').append('<option>' + dataSource[i] +'</option>');
                    }
                });
            });
        </script>