import * as functions from './functions.js';
const refresh = 60000;

document.addEventListener("DOMContentLoaded", ()=>{
    setTimeout(()=>{
        location.reload();
    }, refresh)
    functions.doStuff();
})
