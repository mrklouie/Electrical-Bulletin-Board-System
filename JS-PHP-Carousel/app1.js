const slider = document.querySelector(".slider");
const active = document.querySelector(".active");
const nextSlide = document.getElementById("next-slide");
const prevSlide = document.getElementById("prev-slide")

let images = document.querySelectorAll("img");
let slides = document.querySelectorAll(".controls p");
let controls = document.querySelector(".slides");
let details = document.querySelectorAll(".details");
let detailsSection = document.querySelector(".details-section");



//Variables
var textInterval;
var imagesInterval;
let yungnagawa = 0;
let counterImages = 2;
let index = 2;
let counterSlides = 1;
let sizeActive = active.clientHeight + 5;
let counterDetails = 1;
const size = images[0].clientHeight + 96;
let interval = 2000;
var firstCloneDetails;

    if(images.length == 2){
        var firstCloneImages;
        counterImages = 1;
        
        if(images.length == 2 && details.length == 2){
    
        
            //CLONE IMAGES
            firstCloneImages = images[0].cloneNode(true);
            let extraCloneImages = images[images.length -1].cloneNode(true);
            let LastCloneImages = images[images.length -1].cloneNode(true);
            LastCloneImages.id = "last-clone";
            firstCloneImages.id = "first-clone";
    
    
            slider.append(firstCloneImages);
            slider.prepend(LastCloneImages);
            slider.append(extraCloneImages);
    
    
            //CLONE DETAILS
            firstCloneDetails = details[0].cloneNode(true);
            let extraCloneDetails = details[details.length -1].cloneNode(true);
            let lastCloneDetails = details[details.length -1].cloneNode(true);
    
            lastCloneDetails.id = "last-clone-details";
            firstCloneDetails.id = "first-clone-details";
            detailsSection.append(firstCloneDetails);
            detailsSection.prepend(lastCloneDetails);
            detailsSection.append(extraCloneDetails);
    
     
        }
        //RECALL
        details = document.querySelectorAll(".details");
        images = document.querySelectorAll("img");
       
    
        slider.style.transform = `translateY(${-size * counterImages}px)`;
    
        active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;

        const nextSlideFunction=()=>{
            if(images[counterImages].id === "first-clone"){
                slider.style.transition = `none`;
                counterImages = 1;
               
                slider.style.transform = `translateY(${-size * counterImages}px)`;
        }else{
               
               
              
            if(counterSlides === 2){
                //ACTIVE SLIDES
                counterSlides = 0;
  
            }
         
            counterImages++;
            counterSlides++;
           
            slider.style.transform = `translateY(${-size * counterImages}px)`;
            slider.style.transition = `0.7s`;
    

            //ACTIVE SLIDES
            active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;
            active.style.transition = `0.7s`;
        }


            details[index].style.opacity = `0`;
                if(details[index].id === firstCloneDetails.id){
                    index = 1;
                    details[index].style.opacity = "1";
                }else{
                    index++;
                    details[index].style.opacity = "1";
                }
        }

        const autoPlayImage=()=>{
          
            
            imagesInterval = setInterval(()=>{ 
                if(images[counterImages].id === "first-clone"){
                        slider.style.transition = `none`;
                        counterImages = 1;
                       
                        slider.style.transform = `translateY(${-size * counterImages}px)`;
                }else{
                       
                       
                      
                    if(counterSlides === 2){
                        //ACTIVE SLIDES
                        counterSlides = 0;
          
                    }
                 
                    counterImages++;
                    counterSlides++;
                   
                    slider.style.transform = `translateY(${-size * counterImages}px)`;
                    slider.style.transition = `0.7s`;
            
    
                    //ACTIVE SLIDES
                    active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;
                    active.style.transition = `0.7s`;
                }
                
            }, interval)
        }
       
        //-------DETAILS-------//

        let index = 1;
        details[index].style.opacity = "1";

        const autoPlayText=()=>{
            textInterval = setInterval(()=>{
                details[index].style.opacity = `0`;
                if(details[index].id === firstCloneDetails.id){
                    index = 1;
                    details[index].style.opacity = "1";
                }else{
                    index++;
                    details[index].style.opacity = "1";
                }
            }, interval)
        }

        //-------CALLING FUNCTIONS-------//

        autoPlayText();
        autoPlayImage();

        //-------LISTENERS-------//

        nextSlide.addEventListener("mouseenter", ()=>{
            clearInterval(imagesInterval);
            clearInterval(textInterval);
            
        })
            
        
        nextSlide.addEventListener("mouseleave", ()=>{
            autoPlayText();
            autoPlayImage();
        })

        //-------NEXT BUTTON-------//
        nextSlide.addEventListener("click", nextSlideFunction);
            
    }else if(images.length  > 2){
        //CLONING IMAGES
        let firstClone = images[0].cloneNode(true);
        let lastClone = images[images.length -1].cloneNode(true);
        let extraClone = images[1].cloneNode(true);
        let extraClone1 = images[1].cloneNode(true);
      


        //CLONING DETAILS
        let firstCloneDetails = details[0].cloneNode(true);
        let lastCloneDetails = details[details.length -1].cloneNode(true);
        let extraCloneDetails = details[1].cloneNode(true);
        let extraCloneDetails1 = details[1].cloneNode(true);

        //APPEND AND APPENDIX
        slider.append(firstClone);
        slider.prepend(lastClone);
        slider.append(extraClone);
        slider.prepend(extraClone1);

        detailsSection.append(firstCloneDetails);
        detailsSection.prepend(lastCloneDetails);
        detailsSection.append(extraCloneDetails);
        detailsSection.prepend(extraCloneDetails1);

        //GIVING THEM ID'S
        extraClone1.id = "extra-clone-1";
        firstClone.id = "first-clone";
        lastClone.id = "last-clone";
        firstCloneDetails.id = "first-clone-details";
        lastCloneDetails.id = "last-clone-details";
        

        //RECALLING
        images = document.querySelectorAll("img");
        details = document.querySelectorAll(".details");


        slider.style.transform = `translateY(${-size * counterImages}px)`;
        active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;
        console.log("Image length: " + images.length + "\n" + "Details length: " + details.length);
        const nextSlideFunction2=()=>{
            trylang();
            trylang2();
        }

        
        const autoPlayImage2=()=>{
            imagesInterval = setInterval(trylang, interval)
        }

        const trylang=()=>{
            if(images[counterImages].id === firstClone.id){
                console.log("Hopya!: " + counterSlides);
                slider.style.transition = `none`;
                counterImages = 2;
                slider.style.transform = `translateY(${-size * counterImages}px)`;
        }else{   
            if(counterSlides === slides.length){
                //ACTIVE SLIDES
                counterSlides = 0;
  
            }
          
           
            counterImages++;
            counterSlides++;
            slider.style.transform = `translateY(${-size * counterImages}px)`;
            slider.style.transition = `0.7s`;

            //ACTIVE SLIDES
            active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;
            active.style.transition = `0.7s`;
        }
        }

        const prevImage=()=>{
            if(images[counterImages].id === lastClone.id){
                slider.style.transition = `none`;
                counterImages = images.length-3;
                slider.style.transform = `translateY(${-size * counterImages}px)`;
        }else{   
            if(slides[counterSlides] === slides[1]){
                //ACTIVE SLIDES
                counterSlides = slides.length;
                counterSlides++;

                active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;
                active.style.transition = `0.7s`;
            }
            counterImages--;
            counterSlides--;
            slider.style.transform = `translateY(${-size * counterImages}px)`;
            slider.style.transition = `0.7s`;

            //ACTIVE SLIDES
            active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;
            active.style.transition = `0.7s`;

            details[index].style.opacity = "0";
            if(details[index].id === lastCloneDetails.id){
                index = details.length -1;
                details[index].style.opacity = "1";
            }else{
                index--;
                details[index].style.opacity = "1";
            }
        }
        }

        details[index].style.opacity = "1";
        const autoPlayText2=()=>{
            textInterval = setInterval(trylang2, interval);
        }
        const trylang2=()=>{
            details[index].style.opacity = `0`;
            if(details[index].id === firstCloneDetails.id){
                index = 2;
                details[index].style.opacity = "1";
            }else{
                index++;
                details[index].style.opacity = "1";
            }
        }
        autoPlayImage2();
        autoPlayText2();


        nextSlide.addEventListener("mouseenter", ()=>{
            clearInterval(imagesInterval);
            clearInterval(textInterval);
        })
        nextSlide.addEventListener("mouseleave", ()=>{
            autoPlayImage2();
            autoPlayText2();
           
        })
        prevSlide.addEventListener("mouseenter", ()=>{
            clearInterval(imagesInterval);
            clearInterval(textInterval);
        })
        prevSlide.addEventListener("mouseleave", ()=>{
            autoPlayImage2();
            autoPlayText2();
           
        })
        
        nextSlide.addEventListener("click", nextSlideFunction2);
        prevSlide.addEventListener("click", prevImage);

    }else{
        active.style.display = "none";
        details[0].style.opacity = "1";
        nextSlide.style.display = "none";
        prevSlide.style.display = "none";
    }
    







