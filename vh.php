<?php
/* vh - version header
 * usage: include this file in every script
 * that uses vd.
 * Usage Example: <?php include('vd/vh.php'); ?> url('<?=$ldr?>images/1.jpg');
 */
$cv = 'vd/1.0/'; // cv - current version
$dt = 'New/'; // dt - default theme
$ldr = $cv.$dt; // ldr = loader
?>
<!-- Add CSS library -->
<link rel="stylesheet" type="text/css" href="<?=base_url().$ldr?>reg-userdash.php" />
<script src="http://code.jquery.com/jquery-latest.js"></script>