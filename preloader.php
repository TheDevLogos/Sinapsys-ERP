<style>
  .loader-section {
    width: 100vw;
    height: 100vh;
    max-width: 100%;
    position: fixed;
    top: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #ffffff;
    z-index: 999;
    transition: 0.6s;
    /*transition: all 1s 1s ease-out;*/
    opacity: 1;
  }

  .loaded {
    opacity: 0;
    z-index: -1;
  }

  .loader {
    width: 48px;
    height: 48px;
    border: 5px solid #FF9500;
    border-bottom-color: transparent;
    border-radius: 50%;
    display: inline-block;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
  }

  @keyframes rotation {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
</style>

<div class="loader-section">
  <span class="loader"></span>
</div>

<script>
  function pageLoaded() {
    let loaderSection = document.querySelector('.loader-section');
    loaderSection.classList.add('loaded');
    
    /*/ Simula un retraso para ver el preloader
    setTimeout(() => {
      loaderSection.classList.add('loaded');
    }, 0); // 1000 ms = 1 segundos*/
  }

  // Espera a que la página se cargue completamente antes de ejecutar la función
  window.onload = pageLoaded;
</script>
