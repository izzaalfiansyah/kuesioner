<?= $this->extend('template/auth') ?>

<?php $this->setVar('title', 'Login') ?>

<?= $this->section('content') ?>
<div class="m-login__head">
	<span>Login Sebagai</span>
	<a href="<?= base_url() ?>/auth/responden" class="m-link m--font-danger">Responden</a>
</div>
<div class="m-login__body">
	<div class="m-login__signin">
		<div class="m-login__title">
			<h3>Login</h3>
		</div>
		<form class="m-login__form m-form" id="login">
			<div class="form-group m-form__group">
				<input class="form-control m-input" type="text" placeholder="Username" name="username" autocomplete="off">
			</div>
			<div class="form-group m-form__group">
				<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
			</div>
		<div class="m-login__action">
			<a href="javascript:;" class="m-link">
				<span>Forgot Password ?</span>
			</a>
			<button id="m_login_signin_submit" type="submit" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Sign In</button>
		</div>
		</form>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
	$(document).ready(function() {
		
		$(document).on('submit', 'form#login', function(e) {
			e.preventDefault();
			$.post(base_url + '/api/auth/login', $(this).serialize()).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					$('form#login [name]').val('');
					notif(res.message, 'success').then(() => {
						window.location = base_url + '/auth/cek/' + res.data.id + '/1';
					})
				}
			})
		});

	})
</script>
<?= $this->endSection() ?>