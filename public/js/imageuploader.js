$(document).ready(function () {
$("#dropimagehere").on('dragover',function(event){
    event.preventDefault();
     $("#borderdropimage").removeClass("border-dashed");
})

$("#dropimagehere").on('dragleave',function(event){
    event.preventDefault()
    $("#borderdropimage").addClass("border-dashed");
})

$("#dropimagehere").on('drop',function(event){
    event.preventDefault();
   console.log(event.originalEvent.dataTransfer);
})

});
