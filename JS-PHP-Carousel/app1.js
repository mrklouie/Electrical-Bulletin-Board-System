const slider = document.querySelector(".slider");
const active = document.querySelector(".active");
const nextSlide = document.getElementById("next-slide");
const prevSlide = document.getElementById("prev-slide");




let images = document.querySelectorAll("img");
let slides = document.querySelectorAll(".controls p");
let controls = document.querySelector(".slides");
let details = document.querySelectorAll(".details");
let detailsSection = document.querySelector(".details-section");
let slidesNumber = document.querySelectorAll(".slides-number");



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

// DATA ATTRIBUTES
let openModalBtn = document.querySelectorAll("[data-open-modal]");
let closeModalBtn = document.querySelectorAll("[data-close-modal]");
const modalContainer = document.querySelector(".modal-container");
const overlay = document.getElementById("overlay");
let modals = document.querySelectorAll(".my-modal");
var whichModal;



if(openModalBtn.length == 1 && closeModalBtn.length == 1){
    
    overlay.addEventListener("click", ()=>{
        const modals = document.querySelectorAll(".modal.activee");
        modals.forEach(modal =>{
            closeModal(modal);
        })
    })
    
    openModalBtn.forEach(buttons =>{
        buttons.addEventListener("click", ()=>{
            const modal = document.querySelector(buttons.dataset.openModal);
            openModal(modal);
        })
    })
    
    closeModalBtn.forEach(buttons =>{
        buttons.addEventListener("click", ()=>{
            const modal = buttons.closest(".modal");
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
    

    
}

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

            //CLONING MODALS
            let firstCloneModal = modals[0].cloneNode(true);
            let lastCloneModal = modals[modals.length -1].cloneNode(true);
            let extraCloneModal = modals[modals.length -1].cloneNode(true);

            //SET ID
            firstCloneModal.id = "first-clone-modal";
            lastCloneModal.id = "last-clone-modal";

            //APPENDING AND PREPENDING
            modalContainer.append(firstCloneModal);
            modalContainer.prepend(lastCloneModal);
            modalContainer.append(extraCloneModal);


            //RECALLING
           

          
        }
        //RECALL

        details = document.querySelectorAll(".details");
        images = document.querySelectorAll("img");
        openModalBtn = document.querySelectorAll("[data-open-modal]");
        modals = document.querySelectorAll(".my-modal");
        closeModalBtn = document.querySelectorAll("[data-close-modal]");



        overlay.addEventListener("click", ()=>{
            modals[whichModal].classList.remove("activee");
            overlay.classList.remove("activee");
            autoPlayImage();
            autoPlayText();
           
        })
        
        openModalBtn.forEach((buttons, index)=>{
            buttons.addEventListener("click", ()=>{
            console.log(index);
               whichModal = index;
               modals[whichModal].classList.add("activee");
               overlay.classList.add("activee");
               clearInterval(imagesInterval);
               clearInterval(textInterval);
            })
        })
    
        closeModalBtn.forEach((buttons, index)=>{
            buttons.addEventListener("click", ()=>{
               whichModal = index;
               modals[whichModal].classList.remove("activee");
               overlay.classList.remove("activee");
               autoPlayImage();
               autoPlayText();
            })
        })
    

 
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

        slider.addEventListener("mouseenter", ()=>{
            clearInterval(imagesInterval);
            clearInterval(textInterval);
        })
       

        slider.addEventListener("mouseleave" ,()=>{
            if(!overlay.classList.contains("activee")){
                autoPlayText();
                autoPlayImage();
            }
        })
       
        

        //-------NEXT BUTTON-------//
        nextSlide.addEventListener("click", nextSlideFunction);
            
    }else if(images.length  === 3){
        //CLONING IMAGES
        let firstClone = images[0].cloneNode(true);
        let lastClone = images[images.length -1].cloneNode(true);
        let extraClone = images[1].cloneNode(true);
        let extraClone1 = images[1].cloneNode(true);


        //CLONING MODALS
        let firstCloneModal = modals[0].cloneNode(true);
        let lastCloneModal = modals[modals.length -1].cloneNode(true);
        let extraCloneModal = modals[1].cloneNode(true);
        let extraCloneModal1 = modals[1].cloneNode(true);


        //CLONING DETAILS
        let firstCloneDetails = details[0].cloneNode(true);
        let lastCloneDetails = details[details.length -1].cloneNode(true);
        let extraCloneDetails = details[1].cloneNode(true);
        let extraCloneDetails1 = details[1].cloneNode(true);

    
      
        //GIVING THEM ID'S
        extraClone1.id = "extra-clone-1";
        firstClone.id = "first-clone";
        lastClone.id = "last-clone";
        firstCloneDetails.id = "first-clone-details";
        lastCloneDetails.id = "last-clone-details";


        //GIVING MODAL CLONES AN ID
        firstCloneModal.id = "first-clone-modal";
        lastCloneModal.id = "last-clone-modal";
        extraCloneModal1.id = "extra-clone-modal1";

        //APPEND AND APPENDIX
        slider.append(firstClone);
        slider.prepend(lastClone);
        slider.append(extraClone);
        slider.prepend(extraClone1);


        //APPENDING AND APPENDIX DETAILS
        detailsSection.append(firstCloneDetails);
        detailsSection.prepend(lastCloneDetails);
        detailsSection.append(extraCloneDetails);
        detailsSection.prepend(extraCloneDetails1);


        //APPENDING MODAL CLONES
        modalContainer.append(firstCloneModal);
        modalContainer.prepend(lastCloneModal);
        modalContainer.append(extraCloneModal);
        modalContainer.prepend(extraCloneModal1);

        

        //RECALLING

        //RECALLING MODALS
        details = document.querySelectorAll(".details");
        images = document.querySelectorAll("img");
        openModalBtn = document.querySelectorAll("[data-open-modal]");
        modals = document.querySelectorAll(".my-modal");
        closeModalBtn = document.querySelectorAll("[data-close-modal]");

        //FUNCTIONS SA MODALS


        overlay.addEventListener("click", ()=>{
            modals[whichModal].classList.remove("activee");
            overlay.classList.remove("activee");
            autoPlayImage2();
            autoPlayText2();
           
        })

        openModalBtn.forEach((buttons, index)=>{
            buttons.addEventListener("click", ()=>{
                whichModal = index;
                modals[whichModal].classList.add("activee");
                overlay.classList.add("activee");
                clearInterval(imagesInterval);
                clearInterval(textInterval);
            })
        })

        closeModalBtn.forEach((buttons, index)=>{
            buttons.addEventListener("click", ()=>{
                whichModal = index;
                modals[whichModal].classList.remove("activee");
                overlay.classList.remove("activee");
                autoPlayImage2();
               autoPlayText2();
            })
        })





        images = document.querySelectorAll("img");
        details = document.querySelectorAll(".details");

        openModalBtn = document.querySelectorAll("[data-open-modal]");
        console.log("[Buttons mo para sa mga modal][pareho sa size ng mga naclone mong images]: " + openModalBtn.length);


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

    }
    else if(images.length > 3){
        index = 1;
        counterImages = 2;
        
        console.log("Images length: " + images.length + "\nDetails length: " + details.length);


        
        //CLONING - IMAGES
        let firstCloneImages = images[0].cloneNode(true);
        let lastCloneImages = images[images.length -1].cloneNode(true);
        let extraCloneImages = images[1].cloneNode(true);
        

        
        //CLONING - DETAILS
        let firstCloneDetails = details[0].cloneNode(true);
        let lastCloneDetails = details[details.length -1].cloneNode(true);
        let extraCloneDetails = details[1].cloneNode(true);
        
        
        //IMAGES - ID
        firstCloneImages.id = "first-clone";
        lastCloneImages.id = "last-clone";


        //DETAILS - ID
        firstCloneDetails.id = "first-clone-details";
        lastCloneDetails.id = "last-clone-details";

        //IMAGES APPEND
        slider.append(firstCloneImages);
        slider.prepend(lastCloneImages);
        slider.append(extraCloneImages);
        

        //DETAILS APPEND
        detailsSection.append(firstCloneDetails);
        detailsSection.prepend(lastCloneDetails);
        detailsSection.append(extraCloneDetails);
       

        slider.style.transform = `translateY(${-size * counterImages}px)`;
        active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;

        details = document.querySelectorAll(".details");
        images = document.querySelectorAll("img");



        let extraCloneDetails1 = details[3].cloneNode(true);
        let extraCloneImages1 = images[3].cloneNode(true);

        slider.prepend(extraCloneImages1);
        detailsSection.prepend(extraCloneDetails1);

         //RECALLING MODALS
       
         openModalBtn = document.querySelectorAll("[data-open-modal]");
         modals = document.querySelectorAll(".my-modal");
         closeModalBtn = document.querySelectorAll("[data-close-modal]");

        images.forEach((image, index) =>{
            image.addEventListener("click", ()=>{
                console.log("You clicked image: " + index);
            })
        })
        details.forEach((detail, index) =>{
            detail.addEventListener("click", ()=>{
                console.log("You clicked detail: " + index);
            })
        })

        const nextSlideFunction3=()=>{
            trylang();
            trylang2();
        }

        const autoPlayImage3=()=>{
            imagesInterval = setInterval(trylang, interval)
        }

        const trylang=()=>{
            if(images[counterImages].id === firstCloneImages.id){
                console.log("Hopya!: " + counterSlides);
                slider.style.transition = `none`;
                counterImages = 1;
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
        console.log("Images length: " + images.length);
        const prevImage=()=>{
            if(images[counterImages] == images[1]){
                console.log("hopua");
                slider.style.transition = `none`;
                counterImages = images.length-2;
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
            if(details[index] == details[1]){
                console.log("hoypa");
                index = details.length-2;
                details[index].style.opacity = "1";
            }else{
                index--;
                details[index].style.opacity = "1";
            }
        }
        }
        console.log("Images length: " + images.length + "\nDetails length: " + details.length);
        details[index].style.opacity = "1";
        

        const autoPlayText3=()=>{
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

        // autoPlayImage3();
        // autoPlayText3();

        // nextSlide.addEventListener("mouseenter", ()=>{
        //     clearInterval(imagesInterval);
        //     clearInterval(textInterval);
        // })
        // nextSlide.addEventListener("mouseleave", ()=>{
        //     autoPlayImage3();
        //     autoPlayText3();
           
        // })
        // prevSlide.addEventListener("mouseenter", ()=>{
        //     clearInterval(imagesInterval);
        //     clearInterval(textInterval);
        // })
        // prevSlide.addEventListener("mouseleave", ()=>{
        //     autoPlayImage3();
        //     autoPlayText3();
           
        // })
      
        nextSlide.addEventListener("click", nextSlideFunction3);
        prevSlide.addEventListener("click", prevImage);


        console.log(counterSlides);
    }else if(images.length == 1){
        active.style.display = "none";
        details[0].style.opacity = "1";
        nextSlide.style.display = "none";
        prevSlide.style.display = "none";
        
        
    }else if(images.length == 0){
        active.style.display = "none";
        nextSlide.style.display = "none";
        prevSlide.style.display = "none";
    }
    







