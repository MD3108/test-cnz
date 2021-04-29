'use strict';
console.log('hello')
var grid = document.querySelector('.grid');
var msnry = new Masonry( grid, {
  itemSelector: '.grid-item',
  gutter: 20,
});

let elem = document.querySelector('.grid' + '.--notes');
console.log( elem );
let infScroll = new InfiniteScroll( elem, {
  // options
  path: '?note={{#}}',
  append: '.grid-item',
  outlayer: msnry,
  status: '.page-load-status'
  //history: false,
});