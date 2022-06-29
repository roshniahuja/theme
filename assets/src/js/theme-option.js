jQuery(document).ready(function ($) {
	//upload logo button
	$(document).on('click', '.rosh_standard_img_upload', function (e) {
		e.preventDefault();
		const currentParent = $(this);
		const customUploader = wp
			.media({
				title: 'Select Image',
				button: {
					text: 'Use This Image',
				},
				multiple: false, // Set this to true to allow multiple files to be selected
			})
			.on('select', function () {
				const attachment = customUploader
					.state()
					.get('selection')
					.first()
					.toJSON();
				currentParent
					.siblings('.rosh_standard_img')
					.attr('src', attachment.url);
				currentParent.siblings('.rosh_standard_img').attr('width', '250');
				currentParent.siblings('.rosh_standard_img').attr('height', '140');
				currentParent.siblings('.rosh_standard_img_url').val(attachment.url);
			})
			.open();
	});

	//remove logo button
	$(document).on('click', '.rosh_standard_img_remove', function (e) {
		e.preventDefault();
		const currentParent = $(this);
		currentParent.siblings('.rosh_standard_img').removeAttr('src');
		currentParent.siblings('.rosh_standard_img').removeAttr('width');
		currentParent.siblings('.rosh_standard_img').removeAttr('height');
		currentParent.siblings('.rosh_standard_img_url').removeAttr('value');
	});

	//color picker custom js.
	$('[class="color-picker"]').wpColorPicker({
		hide: false,
	});
});
