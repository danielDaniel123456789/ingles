<p id="text">It was a dark and stormy night.</p>

<div id="rate-control">
  <label for="rate">Rate:</label>
  <input type="range" min="0.5" max="2" value="1" step="0.1" id="rate">
</div>

<button id="play">Play</button>

<script>
    const synth = window.speechSynthesis;

const text = document.querySelector('#text');
const play = document.querySelector('#play');
const rate = document.querySelector('#rate');


function speak() {
  if (synth.speaking) {
    synth.cancel();
  }
  const utterThis = new SpeechSynthesisUtterance(text.textContent);
  utterThis.addEventListener('error', () => {
    console.error('SpeechSynthesisUtterance error');
  });
  utterThis.rate = 0.6;
  synth.speak(utterThis);
}

play.addEventListener('click', speak);
</script>