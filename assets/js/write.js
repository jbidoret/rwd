
      var canvas = document.getElementById('rwdcanvas');
      var context = canvas.getContext('2d');
      var w = window.innerWidth;
      var h = window.innerHeight;
      // margins
      const m = 50;
      const ms = [150, 150, 50, 50];
      
      // random function helper
      function r(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
      }

      // average function helper
      let average = (array) => array.reduce((a, b) => a + b) / array.length;
      
      var string = "rWD";

      function blocks(){
        var page_width = w - ms[0] - ms[2];
        var page_height = h - ms[1] - ms[3];

        var percents = 0, letters_widths = 0;
        var letters = string.split("");
        letters.forEach(function(letter,i){
          var factor = (Math.random() * .4  + .8) ;
          
          var percent = 100 / letters.length * factor;
          if(i == letters.length - 1) percent = 100 - percents;
          percents += percent;
          
          let letter_width = Math.floor(page_width * percent / 100);

          context.lineWidth = .2;
          context.strokeStyle = 'black';

          context.beginPath();
          context.rect(letters_widths + ms[0], ms[1], letter_width, page_height);
          // context.stroke();

          block = [letters_widths + ms[0], ms[3], letter_width, page_height + ms[1]]

          drawLetter(letter, block);
          
          letters_widths += letter_width;
        }) 
        
      }

      function drawLetter(letter, block){
        var letter_x = block[0],
            letter_y = block[1],
            letter_x2 = block[0] + block[2],
            letter_y2 = block[1] + block[3] - m,
            letter_w = block[2],
            letter_h = block[3];
          
        context.beginPath();
        context.lineWidth = 2;
        context.strokeStyle = 'red';
        // context.lineCap = 'round';
        // context.lineJoin = 'round';

        var gradient = context.createLinearGradient(letter_x,letter_x2,letter_y, letter_y2);
        gradient.addColorStop(0, 'deeppink');
        gradient.addColorStop(1, 'forestgreen');

        context.strokeStyle = gradient;

        switch (letter) {
          case "W":
            const w1 = [r(letter_x * .9, letter_x * 1.1), letter_y];
            const w2 = [r(letter_x, letter_x + (letter_x2 - letter_x) / 3), letter_y2];
            const w3 = [r(Math.max(w2[0] + 20, w1[0] + 20), letter_x + (letter_x2 - letter_x) / 2), r(letter_y, letter_y + letter_h/3)];
            const w4 = [r(letter_x + letter_w/3, letter_x2), letter_y2];
            const w5 = [r(Math.max(w3[0] + 20, letter_x2 * .8), letter_x2), letter_y];
            context.moveTo(w1[0],w1[1]);  
            context.lineTo(w2[0], w2[1]); 
            context.lineTo(w3[0], w3[1]);
            context.lineTo(w4[0], w4[1]);
            context.lineTo(w5[0], w5[1]);
            break;
            
          case "D" :
            const d1 = [r(letter_x, letter_x + letter_w / 3),  letter_h];
            const d2 = [r(letter_x, letter_x + letter_w / 3), letter_y];
            const d121 = [letter_x + letter_w * 2, letter_h/2];
            const d3 = [r(d1[0] - d1[0] / 40, d1[0] + d1[0] / 40),r(d1[1] - d1[1] / 40, d1[1] + d1[1] / 20) ];
            context.moveTo(d1[0], d1[1]);  
            context.lineTo(d2[0], d2[1]);
            context.bezierCurveTo(d2[0], d2[1], d121[0], d121[1], d3[0], d3[1]);
            context.stroke();
            break;
        
          default:
            const r1 = [letter_x,  letter_h];
            const r2 = [r(letter_x, letter_x + letter_w / 3), letter_y];
            const r3 = [r(letter_x + letter_w, (letter_x + letter_w) * 1.2), r(letter_h/4, letter_h/4*3)];
            const r4 = [r(letter_x, (letter_x + letter_w/ 3) ), r(r3[1], letter_h/4*3)];
            const r5 = [r(r4[0] + 20, letter_x + letter_w), r(letter_h * 0.9, letter_h)];
            context.moveTo(r1[0],r1[1]);
            context.lineTo(r2[0], r2[1]);
            context.quadraticCurveTo(r3[0], r3[1], r4[0], r4[1]);
            context.lineTo(r5[0], r5[1]);
            break;
        }
        context.stroke();        
      }

      function rwd(){
        w = window.innerWidth;
        h = window.innerHeight;
        canvas.setAttribute("width",w);
        canvas.setAttribute("height",h);
        blocks();
      }
      rwd();

      window.addEventListener("resize", function(){
        rwd();
      })
            
           