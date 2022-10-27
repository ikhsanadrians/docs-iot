$('#addnewcategory').on('click',()=>{

     let clone = $('#inputcategory').clone(true);
     $('.category-input ').after(clone)
     let categoryevery =  $('.category-every')
     if(categoryevery.length > 2){
        $("#addnewcategory").hide()
     }

});
