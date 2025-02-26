jQuery(document).ready(function() {
	$('.bxslider').bxSlider({
		pager: false,
		minSlides: 1,
		maxSlides: 4,
		moveSlides: 4,
		slideWidth: 285,
		nextText: '',
		prevText: '',
		/*
										   nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>'
*/
	});
});

jQuery(function() {
	var jQuerycontainer = jQuery('#portfolio'),
		// object that will keep track of options
		isotopeOptions = {},
		// defaults, used if not explicitly set in hash
		defaultOptions = {
			filter: '*',
			sortBy: 'name',
			sortAscending: true,
			layoutMode: 'fitRows',
		};

	var setupOptions = jQuery.extend({}, defaultOptions, {
		itemSelector: '.portfolio-item',
		masonry: {
			columnWidth: 255,
		},
	});

	// set up Isotope
	jQuerycontainer.isotope(setupOptions);

	var jQueryoptionSets = jQuery('#options').find('.option-set'),
		isOptionLinkClicked = false;

	// switches selected class on buttons
	function changeSelectedLink(jQueryelem) {
		// remove selected class on previous item
		jQueryelem
			.parents('.option-set')
			.find('.selected')
			.removeClass('selected');
		// set selected class on new item
		jQueryelem.addClass('selected');
	}

	jQueryoptionSets.find('a').click(function() {
		var jQuerythis = jQuery(this);
		// don't proceed if already selected
		if (jQuerythis.hasClass('selected')) {
			return;
		}
		changeSelectedLink(jQuerythis);
		// get href attr, remove leading #
		var href = jQuerythis.attr('href').replace(/^#/, ''),
			// convert href into object
			// i.e. 'filter=.inner-transition' -> { filter: '.inner-transition' }
			option = jQuery.deparam(href, true);
		// apply new option to previous
		jQuery.extend(isotopeOptions, option);
		// set hash, triggers hashchange on window
		jQuery.bbq.pushState(isotopeOptions);
		isOptionLinkClicked = true;
		return false;
	});

	jQuery(window)
		.bind('hashchange', function(event) {
			// get options object from hash
			var hashOptions = window.location.hash ? jQuery.deparam.fragment(window.location.hash, true) : {},
				// apply defaults where no option was specified
				options = jQuery.extend({}, defaultOptions, hashOptions);
			// apply options from hash
			jQuerycontainer.isotope(options);
			// save options
			isotopeOptions = hashOptions;

			// if option link was not clicked
			// then we'll need to update selected links
			if (!isOptionLinkClicked) {
				// iterate over options
				var hrefObj, hrefValue, jQueryselectedLink;
				for (var key in options) {
					hrefObj = {};
					hrefObj[key] = options[key];
					// convert object into parameter string
					// i.e. { filter: '.inner-transition' } -> 'filter=.inner-transition'
					hrefValue = jQuery.param(hrefObj);
					// get matching link
					jQueryselectedLink = jQueryoptionSets.find('a[href="#' + hrefValue + '"]');
					changeSelectedLink(jQueryselectedLink);
				}
			}

			isOptionLinkClicked = false;
		})

		// trigger hashchange to capture any hash data on init
		.trigger('hashchange');

	// filter items when filter link is clicked
	var $container = $('#portfolio');
	$('#filters a').click(function() {
		$('#filters a.active').removeClass('active');
		var selector = $(this).attr('data-filter');
		$container.isotope({ filter: selector, animationEngine: 'css' });

		// display message box if no filtered items
		if (!$container.data('isotope').$filteredAtoms.length) {
			$('.no-events').fadeIn();
		} else {
			$('.no-events').fadeOut();
		}

		$(this).addClass('active');
		return false;
	});
});

jQuery(document).foundation();
