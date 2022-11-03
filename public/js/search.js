$(document).ready(function(){
    function addBackDrop(){
        if($('#backdrop').hasClass('hidden')){
            $('#backdrop').removeClass('hidden')

            $('#backdrop').addClass('block')
        } else {
            $('#backdrop').removeClass('block')
            $('#backdrop').addClass('hidden')

        }
    }


    $('#search-button').on('click',function(){
        if($('.search-wrappers').hasClass('hidden')){
            $('.search-wrappers').removeClass('hidden')
            $('.search-wrappers').addClass('block')
            $('body').addClass('overflow-y-hidden')
            addBackDrop()
        } else {
            $('.search-wrappers').removeClass('block')
            $('body').removeClass('overflow-y-hidden')
            $('.search-wrappers').addClass('hidden')
            addBackDrop()

        }
    })
    $('#backdrop').on('click',function(){
        $('#backdrop').removeClass('block')
        $('body').removeClass('overflow-y-hidden')
        $('#backdrop').addClass('hidden')
        $('.search-wrappers').removeClass('block')
        $('.search-wrappers').addClass('hidden')
    })



})



// $(document).ready(function () {
//     $("#search").on('keyup',function(){
//         let searchQuest = $(this).val();
//                  $.ajax({
//                 method: 'POST',
//                 url: "/",
//                 dataType: 'json',
//                 data: {
//                     "searchQuest" : searchQuest,
//                     "_token" : $('#token').val()

//                 },
//                 success: (data) => {
//                     for(let i=0; i<data.length; i++){
//                      console.log(data[i].title);
//                     }
//                     // $.each(data,function(index,value){
//                     //     let article = $(".articlecard").find('h1').text();
//                     //     console.log(article);
//                     //     for(let i=0; i<data.length; i++){
//                     //     if(article[i] != data[i].title ){
//                     //         console.dir(article[i]);
//                     //         $(".articlecard").show();
//                     //     } else {
//                     //         $(".articlecard").hide();
//                     //         console.log('data cocok');
//                     //     }
//                     // }
//                     // })




//                 }
//             });
//     });
// })

