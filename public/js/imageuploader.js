$(document).ready(function () {
    let fileInput = document.querySelector('#input');
    let dropArea = document.querySelector('#dropimagehere')
    let thumbnail = document.querySelector("#dropimagethumbnail");
    let file;
    $("#dropimagehere").on('dragover',function(event){
    event.preventDefault();
     $("#borderdropimage").removeClass("border-dashed");
})

$("#dropimagehere").on('dragleave',function(event){
    event.preventDefault()
    $("#borderdropimage").addClass("border-dashed");
})

fileInput.addEventListener("change",(event) => {
    event.preventDefault();
    file = event.dataTransfer.files[0];
    dropArea.classList.remove("border-dashed");
    showFile();
})

dropArea.addEventListener("drop",(event) => {
    event.preventDefault();
    file = event.dataTransfer.files[0];
    showFile();
})


function showFile(){
    let fileType = file.type;
    let validExtensions = ["image/jpeg","image/jpg","image/png"];
    if(validExtensions.includes(fileType)){
        let fileReader = new FileReader();
        fileReader.onload = ()=> {
            let fileURL = fileReader.result;
            let imgTag = `<img src="${fileURL}" alt="image" class="object-cover">`
            thumbnail.innerHTML = imgTag;
        }
        fileReader.readAsDataURL(file);
    } else {
        file = ""
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'File Bukan Gambar',
          })

       $("#borderdropimage").addClass("border-dashed");

    }
}

});
