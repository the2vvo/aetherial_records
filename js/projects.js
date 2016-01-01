/*
Dillon Bastan, 2015.
This is the JavaScript for managing the projects page.
*/


$(document).ready( function() {

	//Render projects on HTML document
	displayProjects(0);

});


//Loads project data from JSON file and renders project on HTML document
var displayProjects = function(pageNumber) {

	$.getJSON("js/json/projects.json", function(data) {

		$(data.projects).each( function() {
	
			var project = new Project();

			project.setAttr(project.tr, "id", this.title);
			project.setAttr(project.aImage, "href", "projects.php?projectName=" + this.title);
			project.setAttr(project.aContinue, "href", "projects.php?projectName=" + this.title);
			project.setAttr(project.imageMain, "src", this.mainImage);
			project.setAttr(project.imageMain, "alt", this.title);

			project.setHTML(project.hTitle, 
				this.artists[0].toUpperCase() + '.' +
				this.title.toUpperCase() + '.' + 
				this.year
			);
			project.setHTML(project.aContinue, "continue reading.");
			project.setHTML(project.pDescription, this.summary);

			//Append together elements in the figure
			project.appendElements();

			$("table").append(project.tr);
		});
	});
};