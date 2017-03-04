(function($){
  $(function(){

    $('.button-collapse').sideNav();
  
    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 25 // Creates a dropdown of 15 years to control year
  });
      

  }); // end of document ready
})(jQuery); // end of jQuery name space

  $(document).ready(function() {
    $('select').material_select();
  });