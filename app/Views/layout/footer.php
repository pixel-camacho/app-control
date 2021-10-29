
<script src="<?= base_url('assets/js/alert.js')?>"></script>

<?php  if(session()->get('role') === 'admin' && service('uri')->getSegment(1) === 'dashboard'): ?>
<script src="<?= base_url('assets/js/modals.js')?>"></script>
<?php  endif; ?>

<script src="<?= base_url('assets/js/editar.js')?>"></script>

</body>
</html>