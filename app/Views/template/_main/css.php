<!--begin::Web font -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
	WebFont.load({
		google: {
			"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
		},
		active: function() {
			sessionStorage.fonts = true;
		}
	});
</script>

<link href="<?= base_url() ?>/cdn/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/cdn/demo/demo11/base/style.bundle.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="<?= base_url() ?>/cdn/img/favicon.png" />
<!-- <script>
	(function(i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function() {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
	ga('create', 'UA-37564768-1', 'auto');
	ga('send', 'pageview');
</script> -->