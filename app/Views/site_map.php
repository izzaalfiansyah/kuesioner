<?= $this->extend('template/responden') ?>

<?php $this->setVar('title', 'Site Map') ?>

<?= $this->section('content') ?>
<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Site Map
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<style>
			#map{
				display: block;
				width: 100%;
				height: 400px;
				margin: 0 auto;
				box-shadow: 0px 5px 20px #ccc;
			}
		</style>
		<div id="map"></div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?= base_url('/cdn/vendors/custom/gmaps/gmaps.min.js') ?>"></script>
<script type="text/javascript">
    var map;
    $(document).ready(function(){
      map = new GMaps({
        el: '#map',
        lat: 5.570225990424622,
        lng: 95.36985371201257,
        zoomControl : true,
        zoomControlOpt: {
            style : 'SMALL',
            position: 'TOP_LEFT'
        },
        panControl : false,
        streetViewControl : false,
        mapTypeControl: false,
        overviewMapControl: false
      });
    });
</script>
<?= $this->endSection() ?>