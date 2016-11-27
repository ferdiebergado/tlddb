<script>
	function show_loader() {
		$('#loader').html('<p><img src="{{ URL::to('img/ajax-loader.gif') }}" width="220" height="19" /></p>');
/*		$('#loader').load("/examples/ajax-loaded.html"); */
	}
</script>