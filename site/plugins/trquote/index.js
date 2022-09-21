panel.plugin("rwd/trquote", {
  blocks: {
    answer: `
      <blockquote class="text trquote" >
      {{ content.en }}
      <cite>{{ content.source }}</cite>  
      </blockquote>
    `
  }
});