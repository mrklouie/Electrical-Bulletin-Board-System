let cards = document.querySelectorAll(".card");
const slider = document.querySelector(".slider");
const next = document. querySelector(".next");
const prev = document. querySelector(".prev");
const items = document.querySelectorAll(".item");
const menu = document.querySelector(".menu");
const navLinks = document.querySelector(".navbar-links");




menu.addEventListener("click", ()=>{
    navLinks.classList.toggle("activee");
    console.log("fired");
})
let currentDropDown;


document.addEventListener("click", e=>{
   const isClicked = e.target.matches("[data-dropdown-button]");
   if(!isClicked && e.target.closest("[data-dropdown]") == null) {
       document.querySelectorAll("[data-dropdown].activee").forEach(dropdown =>{
           dropdown.classList.remove("activee");
       })
   }else if(isClicked){
    currentDropDown = e.target.closest("[data-dropdown]");
    currentDropDown.classList.toggle("activee");
   }


   document.querySelectorAll("[data-dropdown].activee").forEach(dropdown =>{
    if(dropdown === currentDropDown) return
    dropdown.classList.remove("activee");
   })
})




var counter;
var query;
const size = cards[0].clientWidth + 15; 
var myInternval;
const interval = 3000;
document.querySelector("body");

//Recall Function
const recall=()=>{
    cards = document.querySelectorAll(".card");
}




function mediaQuery(){
    recall();
    if(query = window.matchMedia("(min-width: 360px) and (max-width: 1408px)").matches){
        slider.style.transform = `translateX(${-size * counter}px)`;
    }else{
        slider.style.transform = `translateX(${-size * counter}px)`;
       
    }
}

mediaQuery();
console.log("Line 64: " + query);



if(cards.length == 0){
    console.log("No archives");
}
else if(cards.length == 1 && !query){
    // document.querySelector(".carousel-container").style.transform = `translateX(-50%)`;
    console.log("trued");
}else if(cards.length <= 3 && query && cards.length !== 1){
    console.log("true");
    counter = 2;
   
    //Cloning
    let firstClone = cards[0].cloneNode(true);
    let lastClone = cards[cards.length -1].cloneNode(true);
    let extraClone = cards[1].cloneNode(true);
    let extraClone1 = cards[1].cloneNode(true);


    //Giving ID's
    firstClone.id = "first-clone";
    lastClone.id = "last-clone";


    //Appending
    slider.append(firstClone);
    slider.prepend(lastClone);
    slider.append(extraClone);
    slider.prepend(extraClone1);

    recall();
    console.log("Cards length: " + cards.length);
    slider.style.transform = `translateX(${-size * counter}px)`;

    mediaQuery();

    const nextSlide=()=>{
        console.log(counter);
        if(cards[counter].id == firstClone.id){
            console.log("hopya");
            counter = 2;
            slider.style.transition = "none";
            slider.style.transform = `translateX(${-size * counter}px)`;
        }else{
            counter++;
            slider.style.transform = `translateX(${-size * counter}px)`;
            slider.style.transition = "transform 0.5s ease";
        }
    
    }
    
    const prevSlide =()=>{
        console.log(counter);
        if(cards[counter].id == lastClone.id){
            counter = cards.length -3;
            slider.style.transition = "none";
            slider.style.transform = `translateX(${-size * counter}px)`;
        }else{
            counter--;
            slider.style.transform = `translateX(${-size * counter}px)`;
            slider.style.transition = "transform 0.5s ease";
        }    
    }

    next.addEventListener("click", ()=>{
        nextSlide();
    })
          
    
    prev.addEventListener("click", ()=>{
        prevSlide();
    })
    
}else if(cards.length < 3 && !query){
    document.querySelector(".carousel-container").style.transform = `translateX(-50%)`;
    
}else if(cards.length == 3 && !query){
    document.querySelector(".carousel-container").style.transform = `translateX(-104%)`;
}else if(cards.length > 3){

    console.log("true");


//Cloning
let firstClone = cards[0].cloneNode(true);
let lastClone = cards[cards.length -1].cloneNode(true);
let extraClone = cards[1].cloneNode(true);
let extraClone1 = cards[cards.length -2].cloneNode(true);
let extraClone2 = cards[2].cloneNode(true);
let extraClone3 = cards[cards.length -3].cloneNode(true);




//Giving ID's
firstClone.id = "first-clone";
lastClone.id = "last-clone";

//Appending
slider.append(firstClone);
slider.prepend(lastClone);
slider.append(extraClone);
slider.prepend(extraClone1);
slider.append(extraClone2);
slider.prepend(extraClone3);


recall();
counter = 3;
mediaQuery();

    // ---- Next Slide ---- //


const nextSlide=()=>{
    console.log(counter);
    if(cards[counter].id == firstClone.id){
        console.log("hopya");
        counter = 3;
        slider.style.transition = "none";
        slider.style.transform = `translateX(${-size * counter}px)`;
    }else{
        counter++;
        slider.style.transform = `translateX(${-size * counter}px)`;
        slider.style.transition = "transform 0.5s ease";
    }

}

const prevSlide =()=>{
    console.log(counter);
    if(cards[counter].id == lastClone.id){
        counter = cards.length -4;
        slider.style.transition = "none";
        slider.style.transform = `translateX(${-size * counter}px)`;
    }else{
        counter--;
        slider.style.transform = `translateX(${-size * counter}px)`;
        slider.style.transition = "transform 0.5s ease";
    }    
}

next.addEventListener("click", ()=>{
    nextSlide();
})
      

prev.addEventListener("click", ()=>{
    prevSlide();
})

// myInternval = setInterval(nextSlide, interval);
}
        




  
    








