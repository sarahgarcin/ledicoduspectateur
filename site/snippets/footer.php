
  <!-- scripts -->
  <?php if ( c::get('environment') == 'local' ) : ?>

  <?= js('assets/js/plugins.js') ?>
  <?= js('assets/js/main.js') ?>

  <?php else: ?>

  <?= js('assets/production/all.min.js') ?>

  <?php endif ?>

</body>
</html>
