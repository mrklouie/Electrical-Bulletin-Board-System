const slider = document.querySelector(".slider");
const active = document.querySelector(".active");
const nextSlide = document.getElementById("next-slide");
const prevSlide = document.getElementById("prev-slide");
const popModal = document.querySelector(".pop-modal");
const updateComment = document.querySelectorAll(".update-comment");
var whichComment;
updateComment.forEach((comment, index) =>{
    comment.addEventListener("click", ()=>{
        whichComment = index;
        console.log("You cliked: " + whichComment);
    })
})



let images = document.querySelectorAll("img");
let slides = document.querySelectorAll(".controls p");
let controls = document.querySelector(".slides");
let details = document.querySelectorAll(".details");
let detailsSection = document.querySelector(".details-section");
let slidesNumber = document.querySelectorAll(".slides-number");


//Variables
var autoPlayInterval;
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


//------POP UP MODAL-------//
// setTimeout(()=>{
//     popModal.classList.add("activee");
//     overlay.classList.add("activee");
// }, 5000);


overlay.addEventListener("click", ()=>{
    overlay.classList.remove("activee");
    popModal.classList.remove("activee");
})


console.log("Images length: " + images.length + "\nDetails Length: " + details.length + "\nModals Length: " + modals.length);
if(openModalBtn.length == 1 && closeModalBtn.length == 1){  
    
    overlay.addEventListener("click", ()=>{
        const modals = document.querySelectorAll(".my-modal.activee");
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
            const modal = buttons.closest(".my-modal");
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
var LastCloneImages;
var extraCloneImages1;

function recalling(){
    details = document.querySelectorAll(".details");
    images = document.querySelectorAll("img");
    openModalBtn = document.querySelectorAll("[data-open-modal]");
    modals = document.querySelectorAll(".my-modal");
    closeModalBtn = document.querySelectorAll("[data-close-modal]");
}




    if(images.length == 2){
        counterImages = 2;
        index = 2;
        //CLONING MODALS
        let firstCloneModal = modals[0].cloneNode(true);
        let lastCloneModal = modals[modals.length -1].cloneNode(true);
        let extraCloneModal = modals[1].cloneNode(true);
        let extraCloneModal1 = modals[0].cloneNode(true);


        //CLONING IMAGES
        let firstCloneImages = images[0].cloneNode(true);
        let lastCloneImages = images[images.length -1].cloneNode(true);
        let extraCloneImages  = images[1].cloneNode(true);
        let extraCloneImages1 = images[0].cloneNode(true);
    


        //CLONING DETAILS
        let firstCloneDetails = details[0].cloneNode(true);
        let lastCloneDetails = details[details.length -1].cloneNode(true);
        let extraCloneDetails = details[1].cloneNode(true);
        let extraCloneDetails1 = details[0].cloneNode(true);



        //GIVING CLONE'S ID
        firstCloneImages.id = "first-clone-imaegs";
        lastCloneImages.id = "last-clone-images";
        firstCloneDetails.id = "first-clone-details";
        lastCloneDetails.id = "last-clone-details";

        //APPEND AND PREPEND
        slider.append(firstCloneImages);
        slider.prepend(lastCloneImages);
        slider.append(extraCloneImages);
        slider.prepend(extraCloneImages1);
        detailsSection.append(firstCloneDetails);
        detailsSection.prepend(lastCloneDetails);
        detailsSection.append(extraCloneDetails);
        detailsSection.prepend(extraCloneDetails1);
        modalContainer.append(firstCloneModal);
        modalContainer.prepend(lastCloneModal);
        modalContainer.append(extraCloneModal);
        modalContainer.prepend(extraCloneModal1);

        recalling();
        console.log("Images length: " + images.length + "\nDetails Length: " + details.length);
        console.log("Modals length: " + modals.length + "\nOpen Buttons length: " + openModalBtn.length + "\nClose Buttons length: " + closeModalBtn.length);

        overlay.addEventListener("click", ()=>{
            modals[whichModal].classList.remove("activee");
            overlay.classList.remove("activee");
           
           
        })

        openModalBtn.forEach((buttons, index)=>{
            buttons.addEventListener("click", ()=>{
                whichModal = index;
                modals[whichModal].classList.add("activee");
                overlay.classList.add("activee");
           
            })
        })

        closeModalBtn.forEach((buttons, index)=>{
            buttons.addEventListener("click", ()=>{
                whichModal = index;
                modals[whichModal].classList.remove("activee");
                overlay.classList.remove("activee");
        
            })
        })

        slider.style.transform = `translateY(${-size * counterImages}px)`;
        active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;
        details[index].style.opacity = "1";

        images.forEach((image, index)=>{
            image.addEventListener("click", ()=>{
                console.log("Image Clicked: " + index);
            })
        })

        const next=()=>{
            details[index].style.opacity = "0";
            if(images[counterImages].id === firstCloneImages.id){
                slider.style.transition = "none";
                counterImages = 2;
                index = 2;
                slider.style.transform = `translateY(${-size * counterImages}px)`;
                details[index].style.opacity = "1";
            }else{
                if(counterSlides === slides.length){
                    //ACTIVE SLIDES
                    counterSlides = 0;
                }
                counterImages++;
                index++;
                counterSlides++;
                slider.style.transform = `translateY(${-size * counterImages}px)`;
                details[index].style.opacity = "1";
                slider.style.transition = "0.7s";

                
                //ACTIVE SLIDES
                active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;
                active.style.transition = `0.7s`;
            }
        }

        const prev=()=>{
            details[index].style.opacity = "0";
            if(images[counterImages].id === lastCloneImages.id){
              console.log("Dead end");
              counterImages = images.length -3;
              index = details.length -3;
              details[index].style.opacity = "1";
              slider.style.transition = `none`;
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
                index--;
                details[index].style.opacity = "1";
                slider.style.transform = `translateY(${-size * counterImages}px)`;
                slider.style.transition = `0.7s`;

                 active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;
                active.style.transition = `0.7s`;

            }
        }

        nextSlide.addEventListener("click", ()=>{
            next();
        })
        prevSlide.addEventListener("click", ()=>{
            prev();
        })

        nextSlide.addEventListener("mouseenter", ()=>{
            clearInterval(autoPlayInterval);
        })

        nextSlide.addEventListener("mouseleave", ()=>{
            autoPlay();
        })

        const autoPlay=()=>{
            autoPlayInterval = setInterval(()=>{
                next();
            }, interval)
        }

        autoPlay();

        slider.addEventListener("mouseenter", ()=>{
            clearInterval(autoPlayInterval);
        })

        overlay.addEventListener("click", ()=>{
            autoPlay();
        })

        slider.addEventListener("mouseleave", ()=>{
            if(!modals[counterImages].classList.contains("activee")){
                autoPlay();
            }
        })
       

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
        counterImages = 2; //COUNTER PARA SA IMAGE
        index = 2;          //COUNTER PARA SA TEXTS

        //CLONING MODALS
        let firstCloneModal = modals[0].cloneNode(true);
        let lastCloneModal = modals[modals.length -1].cloneNode(true);
        let extraCloneModal = modals[1].cloneNode(true);
        let extraCloneModal1 = modals[modals.length -2].cloneNode(true);
      
        //CLONING IMAGES
        let firstCloneImages = images[0].cloneNode(true);
        let lastCloneImages = images[images.length -1].cloneNode(true);
        let extraCloneImages = images[1].cloneNode(true);
        let extraCloneImages1 = images[images.length -2].cloneNode(true);
        
        //CLONING DETAILS
        let firstCloneDetails = details[0].cloneNode(true);
        let lastCloneDetails = details[details.length -1].cloneNode(true);
        let extraCloneDetails = details[1].cloneNode(true);
        let extraCloneDetails1 = details[details.length -2].cloneNode(true);


        //GIVING ID'S
        firstCloneImages.id = "first-clone-image";
        lastCloneImages.id = "last-clone-image";
        firstCloneDetails.id = "first-clone-details";
        lastCloneDetails.id = "last-clone-details";

        //APPEND AND PREPEND
        slider.append(firstCloneImages);
        slider.prepend(lastCloneImages);
        slider.append(extraCloneImages);
        slider.prepend(extraCloneImages1);

        modalContainer.append(firstCloneModal);
        modalContainer.prepend(lastCloneModal);
        modalContainer.append(extraCloneModal);
        modalContainer.prepend(extraCloneModal1);
        

        detailsSection.append(firstCloneDetails);
        detailsSection.prepend(lastCloneDetails);
        detailsSection.append(extraCloneDetails);
        detailsSection.prepend(extraCloneDetails1);

        recalling();
        images.forEach((image, index)=>{
            image.addEventListener("click", ()=>{
                console.log("Image Clicked: " + index);
            })
        })

        overlay.addEventListener("click", ()=>{
            modals[whichModal].classList.remove("activee");
            overlay.classList.remove("activee");
           
           
        })

        openModalBtn.forEach((buttons, index)=>{
            buttons.addEventListener("click", ()=>{
                whichModal = index;
                modals[whichModal].classList.add("activee");
                overlay.classList.add("activee");
 
           
            })
        })

        closeModalBtn.forEach((buttons, index)=>{
            buttons.addEventListener("click", ()=>{
                whichModal = index;
                modals[whichModal].classList.remove("activee");
                overlay.classList.remove("activee");
       
        
            })
        })

        console.log("Images length: " + images.length + "\nDetails Length: " + details.length);
        console.log("Modals length: " + modals.length + "\nOpen Buttons length: " + openModalBtn.length + "\nClose Buttons length: " + closeModalBtn.length);
        
        slider.style.transform = `translateY(${-size * counterImages}px)`;
        active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;
        details[index].style.opacity = "1";

        function next(){
            details[index].style.opacity = "0";
            if(images[counterImages].id === firstCloneImages.id){
                console.log("Dead end");
                counterImages = 2;
                index = 2;
        
                slider.style.transition = `none`;
                slider.style.transform = `translateY(${-size * counterImages}px)`;
                details[index].style.opacity = "1";
            }else{
                if(counterSlides === slides.length){
                    //ACTIVE SLIDES
                    counterSlides = 0;
      
                }
                counterImages++;
                index++;
              
                counterSlides++;
                console.log("Image Slide: " + counterImages);
                slider.style.transform = `translateY(${-size * counterImages}px)`;
                details[index].style.opacity = "1";
                slider.style.transition = `0.7s`;

                //ACTIVE SLIDES
                active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;
                active.style.transition = `0.7s`;
            }
        }

        function prev(){
            details[index].style.opacity = "0";
            if(images[counterImages].id === lastCloneImages.id){
              console.log("Dead end");
              counterImages = images.length -3;
              index = details.length -3;
              details[index].style.opacity = "1";
              slider.style.transition = `none`;
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
                index--;
                details[index].style.opacity = "1";
                slider.style.transform = `translateY(${-size * counterImages}px)`;
                slider.style.transition = `0.7s`;

                 active.style.transform = `translate(50%, ${sizeActive * counterSlides}px)`;
                active.style.transition = `0.7s`;

            }
        }

        function autoPlay(){
            autoPlayInterval =  setInterval(()=>{
                next();
            }, interval)
        
        }


        nextSlide.addEventListener("click", ()=>{
            next();
        })

        prevSlide.addEventListener("click", ()=>{
           prev();
        })

      
        nextSlide.addEventListener("mouseenter", ()=>{
            clearInterval(autoPlayInterval);
        })

        nextSlide.addEventListener("mouseleave", ()=>{
            autoPlay();
        })

        slider.addEventListener("mouseenter", ()=>{
            clearInterval(autoPlayInterval);
        })
        
        overlay.addEventListener("click", ()=>{
            autoPlay();
        })

        slider.addEventListener("mouseleave", ()=>{
        if(!modals[counterImages].classList.contains("activee")){
            autoPlay();
        }
    })

        
        autoPlay();

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
    







