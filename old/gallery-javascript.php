<!-- Javascript to rearange the images! -->
	<script src="/wp-content/themes/vesalius/javascript/jquery-3.3.1.min.js"></script>
	<script src="/wp-content/themes/vesalius/javascript/jquery.masonry.min.js"></script>
	<script>
		// delay until images are loaded
		$(window).on('load',
			function(){
				$('.gallery').masonry({
					// options
					itemSelector:'.gallery-item',
					isAnimated:true,
					resize:true
				});
			}
		);

	</script>
