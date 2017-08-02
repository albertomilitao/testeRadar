	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/datepicker/js/bootstrap-datepicker.min.js') }}"></script>    
	<script type="text/javascript">
	$('#formactivity .input-group.date').datepicker({
		format: 'yyyy-mm-dd',
	    language: "pt-BR",
	    autoclose: true,
	    todayHighlight: true
	});

	$('select[name=searchstatus]').change(function () {
		var idstatus = $(this).val();

		if (idstatus == 'all') {
			$(location).attr('href', '{{ route("activities.index") }}')
		} else {
			$(location).attr('href', '{{ route("activities.index") }}/getstatus/' + idstatus)
		}
	});
	
	$('select[name=searchsituation]').change(function () {
		var idsituation = $(this).val();

		if (idsituation == 'all') {
			$(location).attr('href', '{{ route("activities.index") }}')
		} else {
			$(location).attr('href', '{{ route("activities.index") }}/getsituation/' + idsituation)
		}
	});	
	</script>  
  </body>
</html>