/*jshint esversion: 6 */


// Work in progress clickable / dublickable pastilla
const wip = document.querySelector('.under');
if(wip) setRandomPosition(wip);

// set element random position
function setRandomPosition(e){
  var left = Math.round( Math.random() * (window.innerWidth  - e.getBoundingClientRect().width  ));
  var tp  = Math.round( Math.random() * (window.innerHeight - e.getBoundingClientRect().height ));
  e.style.left = left + "px";
  e.style.top = tp + "px";
}

// attach onclick
document.body.onclick = (event) => {
  if(event.target.classList.contains('under')){
    var w = event.target.cloneNode(true);
    w.classList.remove('open');
    document.body.appendChild(w);
    setRandomPosition(w);
    event.target.classList.add('open');
  }
};


// comments expander
const headings = document.querySelectorAll('.expander');

Array.prototype.forEach.call(headings, heading => {
  let btn = heading.querySelector('button');
  let target = heading.nextElementSibling;

  if(document.location.hash == '#contribute'){
    btn.setAttribute('aria-expanded', true);
    target.hidden = false;
  }

  btn.onclick = () => {
    let expanded = btn.getAttribute('aria-expanded') === 'true' || false;
    btn.setAttribute('aria-expanded', !expanded);
    target.hidden = expanded;
  };
});




// media link in article text

const article = document.querySelector('#main');


if(article){


  initializeFootnotes();
  
  article.onclick = (event) => {
    console.log("ici");
    const link = event.target;
    if(link.classList.contains('media-link') ){
      event.preventDefault();

      if(link.classList.contains('opened')) {
        var fig = document.querySelector('#figure-'+link.dataset.id);
        fig.parentElement.removeChild(fig);
        link.classList.remove("opened");
        return;
      }

      // create figure
      const figure = document.createElement('figure');
      figure.className = "media-container";
      figure.id = 'figure-'+link.dataset.id;

      if(link.dataset.type == "image"){
        const image = document.createElement('img');
        image.classname = 'media';
        figure.appendChild(image);
        // append on load
        image.onload = () => {
          var parent = link.parentNode;
          parent.parentNode.insertBefore(figure, parent.nextElementSibling);
          link.classList.add('opened');
        };
        // load image
        const src = link.getAttribute('href');
        image.src = src;
        // alt
        var alt = link.dataset.alt;
        if (alt){
          image.setAttribute('alt', alt);
        }
      }        

      if(link.dataset.type == "video"){
        const video = document.createElement('video');
        video.classname = 'media';
        figure.appendChild(video);
        // load video
        const src = link.getAttribute('href');
        video.src = src;
        video.setAttribute('controls', 'true');
        var parent = link.parentNode;
        parent.parentNode.insertBefore(figure, parent.nextElementSibling);
        link.classList.add('opened');
       
      }        

      // caption
      var caption = link.nextElementSibling;
      var source = link.dataset.source;
      if (caption || source){
        const figcaption = document.createElement('figcaption');
        if(caption.matches('.media-caption')){
          figcaption.innerHTML = '<p>' + caption.innerHTML + '</p>';
          figure.appendChild(figcaption);
        }
        if(source){
          figcaption.innerHTML = figcaption.innerHTML + '<a href="' + source + '">source</a>';
        }
      }
      
      // buttons
      var close = document.createElement('button');
      close.textContent = "×";
      close.className= "close";
      figure.appendChild(close);
      close.onclick = () => {
        figure.parentNode.removeChild(figure);
        link.classList.remove('opened');
      };
    }
  };
}





// a little dust under the carpet

// media link in article text

// const article = document.querySelector('#main');
// var thatlink = null, thatfigure = null, thatdirection = null;

// var lightbox_html = "<figure class='media-container'></figure>"
// if(article){
//   article.onclick = (event) => {
//     const link = event.target;
//     if(link.classList.contains('media-link') ){
//       event.preventDefault();
//       if(link.classList.contains('opened')) return false;
//       // create figure
//       const figure = document.createElement('figure');
//       figure.className = "media-container";

//       if(link.dataset.type == "image"){
//         const image = document.createElement('img');
//         image.classname = 'media';
//         figure.appendChild(image);
//         image.onload = () => {
//           article.appendChild(figure);
//           setRandomPosition(figure);
//           thatlink = link;
//           thatfigure = figure;
//           link.classList.add('opened');
//           thatdirection = Math.random() > .5 ? 'left' : 'right';
//           drawConnector();
//         }
//         const src = link.getAttribute('href');
//         image.src = src;
//       }        

//       // caption
//       var caption = link.nextElementSibling;
//       if (caption){
//         if(caption.matches('.media-caption')){
//           const figcaption = document.createElement('figcaption');
//           figcaption.innerHTML = caption.innerHTML;
//           figure.appendChild(figcaption);
//         }
//       }

//       // buttons
//       var close = document.createElement('button');
//       close.textContent = "×";
//       figure.appendChild(close);
//       var expand = document.createElement('button');
//       expand.textContent = "⤢";
//       figure.appendChild(expand);
      

//       // drag

//     }
    
//     // if(link.closest('figure') !== null){
//     //   if(link.closest('figure').classList.contains('media-container')){

//     //     const arrowLeft  = document.querySelector("#arrowLeft");
//     //     const arrowRight = document.querySelector("#arrowRight");
//     //     arrowLeft.removeAttribute('d');
//     //     arrowRight.removeAttribute('d');
//     //     thatlink.classList.remove('opened');
//     //     thatfigure.parentNode.removeChild(thatfigure);
//     //     thatlink = null; 
//     //     thatfigure = null; 
//     //     thatdirection = null;
//     //   }
//     // }
//   };
//   window.onscroll = () => {
//     drawConnector();
//   }
// }




// function drawConnector() {
//   if(thatlink === null || thatfigure === null || thatdirection === null) {
//     return false;
//   }
  

//   const arrowLeft  = document.querySelector("#arrowLeft");
//   const arrowRight = document.querySelector("#arrowRight");
//   var posnALeft = {
//     x: thatlink.offsetLeft - 8,
//     y: thatlink.offsetTop - document.documentElement.scrollTop  + thatlink.offsetHeight / 2
//   };
//   var posnARight = {
//     x: thatlink.offsetLeft + thatlink.offsetWidth + 8,
//     y: thatlink.offsetTop - document.documentElement.scrollTop  + thatlink.offsetHeight / 2    
//   };
//   var posnBLeft = {
//     x: thatfigure.offsetLeft - 8,
//     y: thatfigure.offsetTop  - document.documentElement.scrollTop  + thatfigure.offsetHeight / 2
//   };
//   var posnBRight = {
//     x: thatfigure.offsetLeft + thatfigure.offsetWidth + 8,
//     y: thatfigure.offsetTop  - document.documentElement.scrollTop  + thatfigure.offsetHeight / 2
//   };
//   var bend = 100 + Math.abs(posnBRight.x - posnARight.x) / 3;
//   var dStrLeft =
//       "M" +
//       (posnALeft.x        ) + "," + (posnALeft.y) + " " +
//       "C" +
//       (posnALeft.x - bend ) + "," + (posnALeft.y) + " " +
//       (posnBLeft.x - bend ) + "," + (posnBLeft.y) + " " +
//       (posnBLeft.x        ) + "," + (posnBLeft.y);
//   var dStrRight = 
//       "M" +
//       (posnARight.x       ) + "," + (posnARight.y) + " " +
//       "C" +
//       (posnARight.x + bend) + "," + (posnARight.y) + " " +
//       (posnBRight.x + bend) + "," + (posnBRight.y) + " " +
//       (posnBRight.x       ) + "," + (posnBRight.y);

//   if(thatdirection == 'left') {
//     arrowLeft.setAttribute("d", dStrLeft);
//   } else {
//     arrowRight.setAttribute("d", dStrRight);
//   }
// };



// var drg = {
//   element: null,
//   active: false,
//   currentX: null,
//   currentY: null,
//   initialX: 0,
//   initialY: 0,
//   xOffset: 0,
//   yOffset: 0,
//   setTranslate: function(xPos, yPos, el) {
//     el.style.transform = "translate3d(" + xPos + "px, " + yPos + "px, 0)";
//     drawConnector();
//   },
//   dragStart: function(e){
//     if (e.type === "touchstart") {
//       drg.initialX = e.touches[0].clientX - drg.xOffset;
//       drg.initialY = e.touches[0].clientY - drg.yOffset;
//     } else {
//       drg.initialX = e.clientX - drg.xOffset;
//       drg.initialY = e.clientY - drg.yOffset;
//     }
//     if (e.target.matches('.media-container')) {
//       drg.element = e.target;
//       drg.active = true;
//     }
//   },
//   dragEnd: function(){    
//       drg.initialX = drg.currentX;
//       drg.initialY = drg.currentY;
//       drg.active = false;    
//   },
//   drag: function(e){
//     if (drg.active) {
//       e.preventDefault();  
//       if (e.type === "touchmove") {
//         drg.currentX = e.touches[0].clientX - drg.initialX;
//         drg.currentY = e.touches[0].clientY - drg.initialY;
//       } else {
//         drg.currentX = e.clientX - drg.initialX;
//         drg.currentY = e.clientY - drg.initialY;
//       }
//       drg.xOffset = drg.currentX;
//       drg.yOffset = drg.currentY;
//       drg.setTranslate(drg.currentX, drg.currentY, drg.element);
//     }
//   }
// }


// article.addEventListener("touchstart", drg.dragStart, false);
// article.addEventListener("touchend", drg.dragEnd, false);
// article.addEventListener("touchmove", drg.drag, false);
// article.addEventListener("mousedown", drg.dragStart, false);
// article.addEventListener("mouseup", drg.dragEnd, false);
// article.addEventListener("mousemove", drg.drag, false);


