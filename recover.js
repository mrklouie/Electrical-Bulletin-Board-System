const timer = document.getElementById("timer");
const startingMinute = 5;
const delay = 1000;
let time = startingMinute * 60;
var myInterval;


const countDown = () =>{
    const minutes = Math.floor(time / 60);
    let seconds = time % 60;

    if(seconds < 10){
       seconds = "0" + seconds
    }else{
        seconds = seconds;
    }

    timer.innerHTML = `${minutes}:${seconds}`;
    time--;

    if(minutes === -1){
        clearInterval(myInterval);
        timer.innerHTML = `Code Expired`;

        setTimeout(()=>{
            timer.innerHTML = ``;
        }, 5000)
    }
}
countDown();
myInterval = setInterval(countDown, delay);
