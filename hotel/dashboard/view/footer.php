</main>
</div>
</div>
<!--<script src="<?php /*echo SITEURL; */?>assets/admin/js/jquery.min.js"></script>-->
<script src="<?php echo SITEURL; ?>assets/admin/js/jquery3.4.1.js"></script>
<script src="<?php echo SITEURL; ?>assets/admin/plugins/bootstrap/js/bootstrap.js"></script>

<?php
$url_params = ue_url_params();
if($url_params['controller'] == 'room' && $url_params['action'] == 'edit'){
?>
    <script src="<?php ue_assets('admin/js/moment.min.js'); ?>"></script>
    <script src="<?php ue_assets('admin/plugins/fullcalendar/fullcalendar.min.js'); ?>"></script>

    <script type="text/javascript" src="<?php ue_assets('plugins/daterangepicker/daterangepicker.js') ?>"></script>
    <script src="<?php ue_assets('admin/js/availability-init.js'); ?>"></script>
<?php } ?>

<script src="<?php echo SITEURL; ?>assets/admin/js/custom.js"></script>
</body>
</html>