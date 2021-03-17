<style>
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px; 
}

.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 60px;
  line-height: 60px; /* Vertically center the text there */
  background-color: #f5f5f5;
}

@media screen and (max-width: 800px) {
  .footer{
    height: auto;
  }
}
</style>

<footer class="footer" style="background-color: #1B396A;">
  <div class="container text-center">
    <span style="color: #d9d9d9; opacity: 0.5;">
      Tecnológico Nacional de México. Todos los Derechos reservados © 2020.
      Desarrollado por el Instituto Tecnológico de Morelia.    

    </span>

  </div>
</footer>