(function($) {
	'use strict';

$("#home a:contains('Home')").parent().addClass('active');
$("#home a:contains('Home')").parent().addClass('active');
$("#home a:contains('Home')").parent().addClass('active');
$("#home a:contains('Home')").parent().addClass('active');
$("#home a:contains('Home')").parent().addClass('active');

$(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
      $(".dropdown-menu li a").click(function(){
  var selText = $(this).text();
  $(this).parents('.form-group').find('button[data-toggle="dropdown"]').html(selText+' <span class="caret"></span>');
});
    })(jQuery);

 $(document).ready(function () {
          
          $('#example1').datepicker({
              format: "dd/mm/yyyy"
          });  
      });
});