<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<!-- Title -->
		<title><?php echo e(lang('Forbidden')); ?></title>

		<?php
			use App\Models\Apptitle;

			$title = Apptitle::first();
		?>

		<?php if($title->image4 == null): ?>

		<!--Favicon -->
		<link rel="icon" href="<?php echo e(asset('uploads/logo/favicons/favicon.ico')); ?>" type="image/x-icon"/>
		<?php else: ?>

		<!--Favicon -->
		<link rel="icon" href="<?php echo e(asset('uploads/logo/favicons/'.$title->image4)); ?>" type="image/x-icon"/>
		<?php endif; ?>

		<?php if(str_replace('_', '-', app()->getLocale()) == 'عربى'): ?>

		<!-- Bootstrap css -->
		<link href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.rtl.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />
		<?php else: ?>

		<!-- Bootstrap css -->
		<link href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />
		<?php endif; ?>

		<!-- Style css -->
		<link href="<?php echo e(asset('assets/css/style.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />
		<link href="<?php echo e(asset('assets/css/dark.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />
		<link href="<?php echo e(asset('assets/css/updatestyles.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

		<!-- Animate css -->
		<link href="<?php echo e(asset('assets/css/animated.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

		<!---Icons css-->
		<link href="<?php echo e(asset('assets/css/icons.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

		<!-- Select2 css -->
		<link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

		<!-- P-scroll bar css-->
		<link href="<?php echo e(asset('assets/plugins/p-scrollbar/p-scrollbar.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

		<?php if(setting('GOOGLEFONT_DISABLE') == 'off'): ?>
		<style>
			@import  url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
		</style>
		<?php endif; ?>

	</head>

	<body class="<?php if(str_replace('_', '-', app()->getLocale()) == 'عربى'): ?>
		rtl
	<?php endif; ?>
<?php if(setting('DARK_MODE') == 1): ?> dark-mode <?php endif; ?>">

		<!--Row-->
		<div class="page error-bg">
			<div class="page-content m-0">
				<div class="container text-center">
					<div class="display-1 text-danger mb-5 font-weight-bold"><i class="fa fa-ban" aria-hidden="true"></i></div>
					<h1 class="h3  mb-3 font-weight-semibold"><?php echo e(lang('Access Denied', 'errorpages')); ?></h1>
					<p class="h5 font-weight-normal mb-7 leading-normal"><?php echo e(lang('It Seems Like You Are Not Authorized To Access This Page', 'errorpages')); ?></p>
				</div>
			</div>
		</div>
		<!--Row-->

		<!-- Jquery js-->
		<script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>?v=<?php echo time(); ?>"></script>

		<!-- Bootstrap4 js-->
		<script src="<?php echo e(asset('assets/plugins/bootstrap/popper.min.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>?v=<?php echo time(); ?>"></script>

		<!-- Select2 js -->
		<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>?v=<?php echo time(); ?>"></script>

		<!-- P-scroll js-->
		<script src="<?php echo e(asset('assets/plugins/p-scrollbar/p-scrollbar.js')); ?>?v=<?php echo time(); ?>"></script>

		<!-- Custom js-->
		<script src="<?php echo e(asset('assets/js/custom.js')); ?>?v=<?php echo time(); ?>"></script>

	</body>
</html>
<?php /**PATH D:\xampp\htdocs\complaint-ticketing-system\resources\views/errors/403.blade.php ENDPATH**/ ?>