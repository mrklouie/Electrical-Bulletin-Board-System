const menu = document.getElementById("btn-menu");
const sideBar = document.querySelector(".sidebar");
const btnLogoutContainer = document.querySelector(".logout-container");
const inputs = document.querySelectorAll("input");
const btnLogout = document.querySelector(".logout-btn");
const btnEdit = document.getElementById("btn-edit");
const btnSave = document.getElementById("btn-save-changes");
const btnCancel = document.getElementById("btn-cancel");
const listUser = document.getElementById("li-user");
const listChangePass = document.getElementById("li-change-pass");

const openModalBtn = document.querySelectorAll("[data-open-modal]");
const closeModalBtn = document.querySelectorAll("[data-close-modal]");
const overlay = document.getElementById("overlay");


overlay.addEventListener("click", ()=>{
    const modal = document.querySelector(".my-modal.activee");
    closeModal(modal);
})

openModalBtn.forEach(button =>{
    button.addEventListener("click", ()=>{
        const modal = document.querySelector(button.dataset.openModal);
        
        openModal(modal);
    })
})
closeModalBtn.forEach(button =>{
    button.addEventListener("click", ()=>{
        const modal = button.closest(".my-modal");
        closeModal(modal);
    })
})



function openModal(modal){
    modal.classList.add("activee");
    overlay.classList.add("activee");
}

function closeModal(modal){
    modal.classList.remove("activee");
    overlay.classList.remove("activee");
}




// ------ TWO MAIN CONTENTS ------  //
const userInfoContent = document.querySelector(".user-info");
const changePassContent = document.querySelector(".change-pass");


btnEdit.addEventListener("click", ()=>{
    inputs.forEach(input =>{
        input.removeAttribute("readonly");
    })
    btnEdit.style.display = "none";
    btnSave.style.display = "block";
    btnCancel.style.display = "block";
})

btnCancel.addEventListener("click", ()=>{
    location.reload();
})


// listUser.addEventListener("click", ()=>{
//     changePassContent.style.display = "none";
//     userInfoContent.style.display = "block";

//     btnEdit.style.display = "block";
//     btnSave.style.display = "none";
//     btnCancel.style.display = "none";

//     inputs.forEach(input =>{
//         input.readOnly = true;
//     })
    
// })

// listChangePass.addEventListener("click", ()=>{
//     changePassContent.style.display = "block";
//     userInfoContent.style.display = "none";
//     inputs.forEach(input =>{
//         input.value = "";
//     })
// })

btnLogoutContainer.addEventListener("click", ()=>{
    btnLogout.click();
  
})

// menu.addEventListener("click", ()=>{
//     sideBar.classList.toggle("activee");
// })



// menu.addEventListener("click", ()=>{
//     sideBar.classList.add("activee");
//     sideBar.style.transisionDelay = "0.3s";
// })
const linksName = document.querySelectorAll(".links-name");

menu.addEventListener("click", ()=>{
    if(sideBar.classList.contains("activee")){
        sideBar.classList.remove("activee");
        linksName.forEach(link =>{
            link.style.opacity = "0";
            link.style.transition = "none";

        })
        
    }else{
        sideBar.classList.add("activee");
        linksName.forEach(link =>{
            link.style.opacity = "1";
            link.style.transition = "opacity 0.3s ease 0.2s";
        });
   
        
    }
})



userInfoContent.addEventListener("click", ()=>{
    if(sideBar.classList.contains("activee")){
        linksName.forEach(link =>{
            link.style.opacity = "0";
            link.style.transition = "none";

        })
        sideBar.classList.remove("activee");
    }
})
// changePassContent.addEventListener("click", ()=>{
//     if(sideBar.classList.contains("activee")){
//         sideBar.classList.toggle("activee");
//     }
// })