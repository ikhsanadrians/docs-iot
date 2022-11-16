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

    function ShowModalsSearch(){
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


    window.addEventListener("keydown",(e)=>{
      if(e.ctrlKey && e.key.toLowerCase() === "k"){
          e.preventDefault()
          ShowModalsSearch()
      }
    })




    $('#backdrop').on('click',function(){
        $('#backdrop').removeClass('block')
        $('body').removeClass('overflow-y-hidden')
        $('#backdrop').addClass('hidden')
        $('.search-wrappers').removeClass('block')
        $('.search-wrappers').addClass('hidden')
    })


    $("<p>HELLO</p>").insertBefore('.resultsearch');


})

