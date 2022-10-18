$(document).ready(function () {
    $("#submits").attr("disabled",true);
    $("#password").on('keyup',function(){
    let valuepassword =  $(this).val()
    $("#confirmpassword").on('keyup',function(){
    let confirmvalue =  $(this).val()

   if(valuepassword != confirmvalue){
       $("#submits").attr("disabled",true);
       $("#message").text("Password Tidak Cocok!")
    } else {
    $("#submits").removeAttr("disabled");
    $("#message").text("")
    }

  if(valuepassword.length < 8 && confirmvalue.length < 8){
    $("#submits").attr("disabled",true);
    $("#message2").text("Minimal Character 8");
  } else {
    $("#submits").removeAttr("disabled");
    $("#message").text("")
  }

   });
   });



});
