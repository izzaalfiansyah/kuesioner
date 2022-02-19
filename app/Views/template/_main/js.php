<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
	<i class="la la-arrow-up"></i>
</div>

<!-- end::Scroll Top -->

<script src="<?= base_url() ?>/cdn/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?= base_url() ?>/cdn/demo/demo11/base/scripts.bundle.js" type="text/javascript"></script>

<!--end::Base Scripts -->

<script>
	var base_url = '<?= base_url() ?>'

	const notif = (message, type, mixin = false) => {
		if (mixin) {
			const Mixin = Swal.mixin({
				timer: 3000,
				position: 'top-end',
				toast: true,
				showConfirmButton: false,
				showCloseButton: true
			});
			return Mixin.fire({
				title: message,
				type: type
			});
		} else  {
			return Swal.fire({
				title: type[0].toUpperCase() + type.slice(1),
				text: message,
				type: type
			});
		}
	}

	const read = (selector, callback) => {
		var reader = new FileReader();
		var file = document.querySelector(selector).files[0];
		reader.readAsDataURL(file);
		reader.onload = () => {
			callback(reader.result);
		}
	}
</script>