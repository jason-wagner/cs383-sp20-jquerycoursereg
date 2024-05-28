$(function() {
	$('.add-class').on('click', function() {
		var course = $(this).data('course');
		var crn = $(this).data('crn');
		$('#currentCourses').append('<div id="current-'+crn+'">'+course + '<input type="hidden" name="crns[]" value="' + crn + '"></div>');
		$('#course-'+crn).addClass('bg-success');
		$('#add-button-'+crn).addClass('d-none');
		$('#remove-button-'+crn).removeClass('d-none');
	});
	
	$('.remove-class').on('click', function() {
		var crn = $(this).data('crn');
		$('#current-'+crn).remove();
		$('#course-'+crn).removeClass('bg-success');
		$('#remove-button-'+crn).addClass('d-none');
		$('#add-button-'+crn).removeClass('d-none');
	});
	
	$('#showDelAll').on('change', function() {
		$('.delivery-HYB').show();
		$('.delivery-WEB').show();
		$('.delivery-F2F').show();
		$('.delivery-').show();
	});

	$('#showDelF2F').on('change', function() {
		$('.delivery-F2F').show();
		$('.delivery-WEB').hide();
		$('.delivery-HYB').hide();
		$('.delivery-').hide();
	});

	$('#showDelWEB').on('change', function() {
		$('.delivery-WEB').show();
		$('.delivery-HYB').hide();
		$('.delivery-F2F').hide();
		$('.delivery-').hide();
	});

	$('#showDelHYB').on('change', function() {
		$('.delivery-HYB').show();
		$('.delivery-WEB').hide();
		$('.delivery-F2F').hide();
		$('.delivery-').hide();
	});
});