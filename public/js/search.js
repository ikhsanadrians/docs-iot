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

    // let searchbutton = document.querySelector("#search-button")
    // let searchwrappers = document.querySelector(".search-wrappers")
    // let body = document.querySelector('body')

    // searchbutton.addEventListener("click",()=>{
    //     if(searchwrappers.classList.contains('hidden')){
    //         searchwrappers.classList.remove('hidden')
    //         searchwrappers.classList.add('block')
    //         body.classList.add('overflow-y-hidden')
    //     } else {
    //         searchwrappers.classList.remove('block')
    //         searchwrappers.classList.add('hidden')
    //         body.classList.remove('overflow-y-hidden')
    //     }
    // })



    $('#backdrop').on('click',function(){
        $('#backdrop').removeClass('block')
        $('body').removeClass('overflow-y-hidden')
        $('#backdrop').addClass('hidden')
        $('.search-wrappers').removeClass('block')
        $('.search-wrappers').addClass('hidden')
    })



})

