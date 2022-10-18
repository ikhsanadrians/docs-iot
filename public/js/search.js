$(document).ready(function () {
    $("#search").on('keyup',function(){
        let searchQuest = $(this).val();
                 $.ajax({
                method: 'POST',
                url: "/",
                dataType: 'json',
                data: {
                    "searchQuest" : searchQuest,
                    "_token" : $('#token').val()

                },
                success: (data) => {

                    $.each(data,function(index,value){
                        let article = $(".articlecard").find('h1').text();
                        console.log(article);
                        for(let i=0; i<data.length; i++){
                        if(article[i] != data[i].title ){
                            console.dir(article[i]);
                            // $(".articlecard").show();
                        } else {
                            // $(".articlecard").hide();
                            // console.log('data cocok');
                        }
                    }
                    })




                }
            });
    });
})

