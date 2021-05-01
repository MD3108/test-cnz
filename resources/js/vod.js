'use strict';
const closeBtn = document.querySelector('.--vod > .btn-close');
const vodBtn = document.querySelector('.cb-combo__btn.--vod');
const vod = document.querySelector('.card.--vod');
console.log(vod);

closeBtn.addEventListener('click', (e)=>{
    vod.classList.add('hide');
});
vodBtn.addEventListener('click', (e)=>{
    vod.classList.remove('hide');
});