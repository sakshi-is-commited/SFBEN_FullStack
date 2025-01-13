document.addEventListener("DOMContentLoaded", () => {
    const toggleMenu = document.querySelector(".toggle-menu");
    const nav = document.querySelector(".nav");
  
    toggleMenu.addEventListener("click", () => {
      nav.classList.toggle("active");
    });
  
    const playButton = document.querySelector(".play-button");
    playButton.addEventListener("click", () => {
      alert("Play button clicked! Implement your video player logic here.");
    });
  });
  

 