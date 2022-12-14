const p1Points = document.getElementById("p1-points");
const p2Points = document.getElementById("p2-points");
const p1Btn = document.getElementById("p1-btn");
const p2Btn = document.getElementById("p2-btn");
const winnerContainer = document.getElementById("winner");
let p1Score = 0;
let p2Score = 0;
const gameOver = 5;

p1Btn.addEventListener("click", function (event) {
  addPoint(1);
  if (p1Score >= gameOver) {
    endGame();
  }
});

p2Btn.addEventListener("click", function (event) {
  addPoint(2);
  if (p2Score >= gameOver) {
    endGame();
  }
});

document.getElementById("reset").addEventListener("click", function () {
  p1Score = 0;
  p2Score = 0;
  p1Points.textContent = 0;
  p2Points.textContent = 0;
  p1Btn.disabled = false;
  p2Btn.disabled = false;
  document.getElementById("winner").style.display = "none";
  document.getElementsByTagName("body")[0].style.backgroundColor = "#fff";
  
});

function addPoint(player) {
  if (player == 1) {
    p1Score++;
    if (p2Score > 0) {
      p2Score--;
    }
    p1Points.textContent = p1Score;
    p2Points.textContent = p2Score;
  } else {
    p2Score++;
    if (p1Score > 0) {
      p1Score--;
    }
    p2Points.textContent = p2Score;
    p1Points.textContent = p1Score;
  }
}

function endGame() {
  let winnerPlayerName = null;

  if (p1Score > p2Score) {
    winnerPlayerName = document.getElementById("p1-name").textContent;
  } else {
    winnerPlayerName = document.getElementById("p2-name").textContent;
  }
  document.getElementById("winner-name").textContent = winnerPlayerName;
  winnerContainer.style.display = "block";
  document.getElementsByTagName("body")[0].style.backgroundColor = "green";
  p1Btn.disabled = true;
  p2Btn.disabled = true;

  let colorSwitch = 0;
  setInterval(function () {

    if (colorSwitch == 0) {
      winnerContainer.style.backgroundColor = 'red';
      colorSwitch++;
    } else {
      winnerContainer.style.backgroundColor = 'yellow';
      colorSwitch--;
    }
  }, 500);


}

