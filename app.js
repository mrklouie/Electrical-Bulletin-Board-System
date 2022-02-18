function resetModal(){
    $(".modal").on('hidden.bs.modal', function (e){
        $(this)
        .find("input,textarea")
        .val('')
        .end()
    })
}

function triggerClick(){
    document.querySelector('#show-modal').click();
}

function upload(){
    document.querySelector('#file').click();
}


function displayImage(e){
    if (e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#imageDisplay').setAttribute('src',e.target.result);

        }
        reader.readAsDataURL(e.files[0]);
    }
}