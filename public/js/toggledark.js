$(document).ready(function () {
  $('#setlight').on('click',function(){
    if($('#setlight').text().includes('dark_mode')){
        $('#setlight').empty();
        $('#setlight').text('light_mode');
        $('.toggle').removeClass('text-indigo-500')
        $('.toggle').addClass('text-red-500')
    } else {
        $('#setlight').empty()
        $('#setlight').text('dark_mode');
        $('.toggle').removeClass('text-red-500')
        $('.toggle').addClass('text-indigo-500')
    }
  })




})
