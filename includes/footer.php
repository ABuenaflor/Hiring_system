  <!-- Optional JavaScript; choose one of the two! -->
  <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
 
<!-- alertify JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
<script>

  <?php 
      if(isset($_SESSION['message'])){ ?>
        alertify.set('notifier','position', 'top-right');
        alertify.success("<?=$_SESSION['message']; ?>");
  <?php 
    unset($_SESSION['message']);
  } 
  ?>

</script>
  </body>
</html>