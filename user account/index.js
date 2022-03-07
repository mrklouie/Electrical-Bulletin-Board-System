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

menu.addEventListener("click", ()=>{
    sideBar.classList.toggle("activee");
})


userInfoContent.addEventListener("click", ()=>{
    if(sideBar.classList.contains("activee")){
        sideBar.classList.toggle("activee");
    }
})
changePassContent.addEventListener("click", ()=>{
    if(sideBar.classList.contains("activee")){
        sideBar.classList.toggle("activee");
    }
})