panel.plugin("rwd/question-block", {
  blocks: {
    question: `
      <div class="text question" >
      {{ content.author_initials }}: {{ content.text }}
      </div>
    `
  }
});