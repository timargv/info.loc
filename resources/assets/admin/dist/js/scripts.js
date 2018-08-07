$(document).ready(function (){
	$("#example1").DataTable();
	$(".select2").select2();
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yy'
    });
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
});


$(function () {

  //Enable check and uncheck all functionality
  $(".icheckbox_minimal-blue").click(function () {
    var clicks = $(this).data('clicks');
    if (clicks) {
      //Uncheck all checkboxes
      $(".tb-body div[aria-checked='true']").iCheck("false");
      $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
    } else {
      //Check all checkboxes
      $(".tb-body input[type='checkbox']").iCheck("check");
      $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
    }
    $(this).data("clicks", !clicks);
  });


});
