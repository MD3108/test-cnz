'use strict';
const closeBtn = document.querySelector('.--vod > .btn-close');
const vod = document.querySelector('.card.--vod');
console.log(vod);

closeBtn.addEventListener('click', (e)=>{
    vod.classList.add('hide');
});