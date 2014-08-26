/**
*	Description: 	This javascript file is related to the pagemanagement page.
*	Author: 		Sven Janssen, stagiair @ Wiwi Websolutions
*	Version: 		0.1
*/

// When button clicked, change background
function makeBtnActive(){
	if(document.getElementById('addPageButton').className == "btn btn-primary"){
		document.getElementById('addPageButton').className = "btn btn-primary active";
		buildUrlPanel();
	}else{
		document.getElementById('addPageButton').className = "btn btn-primary";
		removeBuildUrlPanel();
	}
}

// Build URL creating panel
function buildUrlPanel(){
	var divContainer = document.createElement('div');
	divContainer.id = "container_id";
	divContainer.className = "container";
		
	var divPanelDefault = document.createElement('div');
	divPanelDefault.id = "divPanelDefault";
	divPanelDefault.className = "panel panel-default";
	
	var divPanelHeading = document.createElement('div');
	divPanelHeading.id = "divPanelHeading";
	divPanelHeading.className = "panel-heading";
	divPanelHeading.innerHTML = "URL Configuration";
	
	var divPanelBody = document.createElement('div');
	divPanelBody.id = "divPanelBody";
	divPanelBody.className = "panel-body";
	
	var inputRoute = document.createElement('input');
	inputRoute.id = "inputRoute";
	
	
	// Append div's to body
	document.body.appendChild(divContainer);
	// first div
	divContainer.appendChild(divPanelDefault);
	// second div
	divPanelDefault.appendChild(divPanelHeading);
	// third div
	divPanelDefault.appendChild(divPanelBody);
	// append InputRoute
	divPanelBody.appendChild(inputRoute);
	
}

// Remove created panel
function removeBuildUrlPanel(){
	var getContainer = document.getElementById("container_id");
	var getPanelDefault = document.getElementById("divPanelDefault");
	
	getContainer.removeChild(getPanelDefault);
	document.body.removeChild(getContainer);
}