/*
Dillon Bastan, 2015.
This is the JavaScript for managing the individual artist pages.
*/


//Loads artists data from JSON file and renders project on HTML document
var renderArtist = function(artistName) {

	$.getJSON("js/json/artists.json", function(data) {

		$(data.artists).each( function() {

			if (this.name === artistName) {

				$('img.artistPhoto').attr('src', this.photo);
				$('img.artistPhoto').attr('alt', this.name);
				$('#artistName').html(this.name.toUpperCase());
				$('#artistDescription').html(this.description);

				//Add Albums with links
				$(this.albums).each( function() {
					var newA = document.createElement('a'),
						newImg = document.createElement('img'),
						currentAlbum = this;

					$.getJSON("js/json/albums.json", function(data) {

						$(data.albums).each( function() {

							if (this.title == currentAlbum) {

								$(newA).attr('href', this.site);
								$(newImg).attr('src', this.cover);
								$(newImg).attr('alt', this.title);

								return false;
							} else {
								$(newImg).attr('src', "");
								$(newImg).attr('alt', "Not Found");
							}
						});
					});

					$(newA).append(newImg);
					$('#projectLinks').append(newA);
				});

				//Add Projects with links
				$(this.projects).each( function() {
					var newA = document.createElement('a'),
						newImg = document.createElement('img'),
						currentProject = this;

					$.getJSON("js/json/projects.json", function(data) {

						$(data.projects).each( function() {

							if (this.title == currentProject) {

								$(newA).attr('href', "index.php?pageName=projectsIndex&projectName=" + this.title);
								$(newImg).attr('src', this.mainImage);
								$(newImg).attr('alt', this.title);

								return false;
							} else {
								$(newImg).attr('src', "");
								$(newImg).attr('alt', "Not Found");
							}
						});
					});

					$(newA).append(newImg);
					$('#projectLinks').append(newA);
				});

				//Exit $.each loop
				return false;
			}
		});
	});
};