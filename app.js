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


    const tx = document.getElementsByTagName("textarea");
    for (let i = 0; i < tx.length; i++) {
      tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
      tx[i].addEventListener("input", OnInput, false);
    }

    function OnInput() {
      this.style.height = "auto";
      this.style.height = (this.scrollHeight) + "px";
    }


const menu = document.getElementById("menu");
const navBarLinks = document.querySelector(".navbar-links");
const nav = document.querySelector(".navbar");



menu.addEventListener("click", ()=>{
    navBarLinks.classList.toggle("activee");
    nav.style.padding = "0";
  
})
