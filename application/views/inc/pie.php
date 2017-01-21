<footer class="footer">
      <div class="container">
        <p class="text-muted">&#169; ebay 2016</p>
        <?php
              $sesion = $this->session->userdata('usuarioLogueado');
              if($sesion!=""){
                $cerrar = "<a href=".site_url('sesion/logout').">aquí</a>";
                echo "<p class=\"text-muted\"> Eres, <mark>".$sesion."</mark> si no es asi pincha ".$cerrar."</p>";
              }
        ?>
      </div>
    </footer>
</body>
</html>
