/*
Dillon Bastan, 2015.
This is the JavaScript for managing the individual project pages.
*/


var slideshowLength, 
	renderedIndex = 0;


$(document).ready( function() {

	//Initiate slideshow for project when elements are added
	$('ul.slideshow').bind("DOMNodeInserted", function() {

		renderedIndex++;

		//Upon completion of appending elements, evaluate slideshow function
		if (renderedIndex - 1 === slideshowLength) {
			slideshow();
		}
	});
});



//Slideshow function
var slideshow = function() {
	var target,
		$moveImages = $('ul.slideshow li'),
		lastImage = $moveImages.length - 1,
		$slideshowMask = $('div.slideshow ul.slideshow'),
		imageWidth = $moveImages.width();

	//Active class to show current image
	$moveImages.addClass('active');
	$slideshowMask.css('width', imageWidth * (lastImage + 1) + 'px');

	//Function to slide the image
	var slideImage = function(target) {

		$slideshowMask.stop(true, false).animate(
			{'left': '-' + imageWidth * target + 'px'}, 300
		);
		$moveImages.removeClass('active').eq(target).addClass('active');
	};

	//Previous Image
	$('.prevImage').on('click', function() {

		target = $('ul.slideshow li.active').index();
		target === 0 ? target = lastImage : target --;
		slideImage(target);
		//resetTiming();
	});

	//Next Image
	$('.nextImage').on('click', function() {

		target = $('ul.slideshow li.active').index();
		target === lastImage ? target = 0 : target ++;
		slideImage(target);
		//resetTiming();
	});

/*
	//Function for sliding the image via timer
	var slideIndex = function() {

		target = $('ul.slideshow li.active').index();
		target === lastImage ? target = 0 : target++;
		slideImage(target);
	};

	//Create interval
	var timing = setInterval( function() {
			slideIndex();
	}, transitionSpeed);

	//Function for resetting the timer
	var resetTiming = function() {

		clearInterval(timing);

		timing = setInterval( function() {
				slideIndex();
		}, transitionSpeed);
	};
*/
};


//Loads projects data from JSON file and renders project on HTML document
var renderProject = function(projectName) {
	$.getJSON("js/json/projects.json", function(data) {

		$(data.projects).each( function() {

			if (this.title === projectName) {

				slideshowLength = $(this.slideshow).length - 1;

				//Add Images for slideshow
				$(this.slideshow).each( function() {
					var newLi = document.createElement('li'),
						newSpan = document.createElement('span'),
						newImg = document.createElement('img');

					$(newSpan).addClass('center');
					$(newImg).attr('src', this);
					$(newImg).attr('alt', this);
					$(newLi).append(newSpan, newImg);
					$('ul.slideshow').append(newLi);
				});

				$('#projectTitle').html(
					this.artists[0].toUpperCase() + "." + 
					this.title.toUpperCase() + "." +
					this.year
				);

				$('p.projectInfo').html(this.description);

				//Exit $.each loop
				return false;
			}
		});
	});
};