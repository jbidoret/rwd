/*jshint esversion: 6 */

(function() {
    
  // Work in progress clickable / dublickable pastilla
  const wip = document.querySelector('.under');
  if(wip) positionWip(wip);

  // set wip pastilla random position
  function positionWip(w){
    var left = Math.round( Math.random() * (window.innerWidth  - w.getBoundingClientRect().width  ));
    var tp  = Math.round( Math.random() * (window.innerHeight - w.getBoundingClientRect().height ));
    w.style.left = left + "px";
    w.style.top = tp + "px";
  }
  // attach onclick
  document.body.onclick = (event) => {
    if(event.target.classList.contains('under')){
      var w = event.target.cloneNode(true);
      w.classList.remove('open');
      document.body.appendChild(w);
      positionWip(w);
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
})();