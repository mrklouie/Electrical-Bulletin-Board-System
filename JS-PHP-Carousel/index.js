const container = document.querySelector(".container");
const rightSection = document.querySelector(".right-section");
const leftSection = document.querySelector(".left-section");
const slider = document.querySelector(".slider");
let images = document.querySelectorAll("img");
let details = document.querySelectorAll(".details");
let detailsSection = document.querySelector(".details-section");
const nextSlide = document.getElementById("next-slide");
let slideNumber = document.querySelectorAll(".slide-number");
let active = document.querySelector(".active");
const prevSlide = document.getElementById("prev-slide");


console.log("Details Length: " + details.length + "\n" + "Images Length: " + images.length); 


let slideSize = slideNumber[0].clientHeight;
slideSize = slideSize;


const interval = 2000;
let counter = 2;
const size = images[0].clientHeight;
let sizeTotal = size + 96;
var imagesInterval;
var detailsInterval;
var myTimeout;




//CLONING - IMAGES
let firstClone = images[0].cloneNode(true);
let lastClone = images[images.length -1].cloneNode(true);
let extraClone = images[1].cloneNode(true);
let extraClone1 = images[4].cloneNode(true);



//CLONING - DETAILS
let firstCloneDetails = details[0].cloneNode(true);
let lastCloneDetails = details[details.length -1].cloneNode(true);
let extraCloneDetails = details[1].cloneNode(true);
let extraCloneDetails1 = details[4].cloneNode(true);


//IMAGES - ID
firstClone.id = "first-clone";
lastClone.id = "last-clone";





//DETAILS - ID
firstCloneDetails.id = "first-clone-details";
lastCloneDetails.id = "last-clone-details";


//APPENDIX AND PREPENDIX
slider.append(firstClone);
slider.prepend(lastClone);
slider.append(extraClone);
slider.prepend(extraClone1);



//DETAILS APPEND
detailsSection.append(firstCloneDetails);
detailsSection.prepend(lastCloneDetails);
detailsSection.append(extraCloneDetails);
detailsSection.prepend(extraCloneDetails1);
let counterSlide = 1;


slider.style.transform = `translateY(${-sizeTotal * counter}px)`;

images = document.querySelectorAll("img");
details = document.querySelectorAll(".details");


active.style.transform = `translateY(${slideSize * counterSlide}px)`;






//---------ACTIVE SLIDER FUNCTION---------//
const activeSlider=()=>{
    if(counterSlide > slideNumber.length){
        counterSlide = 1;
        active.style.transform = `translateY(${slideSize * counterSlide}px)`;
     active.style.transition =  `0.7s`;
    }else{
        active.style.transform = `translateY(${slideSize * counterSlide}px)`;
        active.style.transition =  `0.7s`;
    }
    
}




//---------AUTO PLAY THE IMAGES---------//

const autoPlayImg =()=>{
    imagesInterval = setInterval(()=>{
       
        if(images[counter].id === firstClone.id){
            slider.style.transition = `none`;
            counter = 2;
            slider.style.transform = `translateY(${-sizeTotal * counter}px)`;
        }else{
            counter++;
            slider.style.transform = `translateY(${-sizeTotal * counter}px)`;
            slider.style.transition = `0.7s`;
            counterSlide++;
        }
        activeSlider();
    }, interval)
    
}





//---------AUTO PLAY THE DETAILS---------//

const autoPlayText = () =>{
    detailsInterval = setInterval(()=>{
        details[index].style.opacity = `0`;
        if(details[index].id === firstCloneDetails.id){
            index = 2;
            details[index].style.opacity = `1`;
        }else{
            index++;
            details[index].style.opacity = `1`;
        }
    }, interval)
    
    
}

//---------NEXT BUTTON FUNCTION---------//
const nextSlideFunction = () => {
 
    if(images[counter].id === firstClone.id){
        console.log("Last clone ")
        slider.style.transition = `none`;
        counter = 2;
        slider.style.transform = `translateY(${-sizeTotal * counter}px)`;
    }else{
        counter++;
        slider.style.transform = `translateY(${-sizeTotal * counter}px)`;
        slider.style.transition = `0.7s`;
        counterSlide++;
        activeSlider(); 
    }
   
}


//---------PREV BUTTON IMAGES---------//

const prevSlideFunction =()=>{
    if(images[counter].id === lastClone.id){
        slider.style.transition = `none`;
        counter = images.length -3;
        slider.style.transform = `translateY(${-sizeTotal * counter}px)`;
    }else{
        counter--;
        slider.style.transform = `translateY(${-sizeTotal * counter}px)`;
        slider.style.transition = `0.7s`;
    }

    details[index].style.opacity = `0`;
    if(details[index].id === lastCloneDetails.id){
        index = details.length -3;
        details[index].style.opacity = `1`;
    }else{
        index--;
        details[index].style.opacity = `1`;
    }

    if(slideNumber[counterSlide] === slideNumber[1]){
        console.log("hopya12");
        counterSlide = slideNumber.length;
        counterSlide++;
        
        active.style.transform = `translateY(${slideSize * slideNumber.length}px)`;
        active.style.transition =  `0.7s`;
    }else{
        console.log(details[index]);
        console.log("index is: " + index);  
        counterSlide--;
        active.style.transform = `translateY(${slideSize * counterSlide}px)`;
        active.style.transition =  `0.7s`;
    }

    
}

prevSlide.addEventListener("click", prevSlideFunction);



//---------NEXT BUTTON LISTENER---------//

let index = 2;
details[index].style.opacity = `1`;

nextSlide.addEventListener("click", nextSlideFunction);


nextSlide.addEventListener("click", ()=>{
    details[index].style.opacity = `0`;
    if(details[index].id === firstCloneDetails.id){
        console.log("hopya");
        index = 2;
        details[index].style.opacity = `1`;
    }else{
        index++;
        details[index].style.opacity = `1`;
    }
});


//---------ON MOUSE HOVER---------//


prevSlide.addEventListener("mouseenter", ()=>{
    clearInterval(imagesInterval);
    clearInterval(detailsInterval);
})
prevSlide.addEventListener("mouseleave", ()=>{
    autoPlayImg();
    autoPlayText();
})

nextSlide.addEventListener("mouseenter", ()=>{
    clearInterval(imagesInterval);
    clearInterval(detailsInterval);
    
})

nextSlide.addEventListener("mouseleave", ()=>{
    autoPlayImg();
    autoPlayText();
})

slider.addEventListener("mouseenter", ()=>{
    clearInterval(imagesInterval);
    clearInterval(detailsInterval);
})
slider.addEventListener("mouseleave", ()=>{
    autoPlayImg();
    autoPlayText();

})

autoPlayImg();
autoPlayText();




