$('#addnewcategory').on('click',()=>{

     let clone = $('#inputcategory').clone(true);
     $('.category-input ').after(clone)

     document.addEventListener('DOMContentLoaded', function(){
        let categoryall = document.querySelectorAll(".category-input-wrapper");
        let selectcategory = document.querySelector(".add-newcategory");
        for (const container of categoryall) {
            if (selectcategory.length > 1) {
              alert("LEBIH DARI 2 NIH")
            }
          }

    }, true);



});
