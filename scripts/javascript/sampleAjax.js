if(document.readyState !== 'loading'){
	// console.warn( 'document is already ready, just execute code here' );
    addAjaxCode();
}else{
	document.addEventListener('DOMContentLoaded', function () {
        // console.warn( 'document was not ready, place code here' );
        addAjaxCode();
    });
}

function addAjaxCode(){
	
	let timeButton = document.getElementById("currentTimeTrigger");
	
	timeButton.classList.remove("noScreen"); // show element now that page is loaded and JS is ready

	timeButton.addEventListener("click", getCurrentTimeAJAX);



	function getCurrentTimeAJAX(event){
		let loader = document.getElementById("loadingTimeDisplay");
		loader.classList.remove('hidden');
		
		let jobApplicationForm = document.getElementById('basic-project-form');
		const formData = new FormData(jobApplicationForm);
		// const formData = new FormData();
		
		formData.append('day', 'Monday');
		formData.append('meal', 'Lunch');

		// output formData to console
		let viewFormData = "FORMDATA:\n";
		for(var pair of formData.entries()){
			viewFormData = viewFormData + "\t" + pair[0]+ ': ' + pair[1] + "\n";
		}
		console.log(viewFormData);
		
		fetch('process-ajaxJSON.php', {
			method: 'POST',
			body: formData
		})
		.then(response => response.json().then(data => ({status: response.status, json: data}))) // .status
		.catch(error => console.error("error: " + error))
		.then(data => {
			console.log(Object.keys(data).length + " node" + (Object.keys(data).length != 1 ? "s" : "") + "\n" + JSON.stringify(data))
			
			// process a single result:
			// processOneResult(data);
			
			// process multiple results:
			processMultipleResults(data);

			loader.classList.add('hidden');
		});
	}



	function processOneResult(data){
		// process one result:
		let responseStatus = data.status;
		let jsonData = data.json;

		let answer = "[response: " + responseStatus + "] " + jsonData.name + " likes to eat "
		+ jsonData.meal + " on "
		+ jsonData.day + " in "
		+ jsonData.address.state + ". (" + jsonData.current_time + ")";
			
		let placeholder = document.getElementById("currentTimeDisplay");
		placeholder.innerHTML = answer;
	}

	function processMultipleResults(data){
		// process multiple results:
		let responseStatus = data.status;
		let jsonData = data.json;

		let answer = "[responseStatus: " + responseStatus + "]<br />";
		for(let index in jsonData){
			var item = jsonData[index];
			answer = answer + item.id + ": " + item.title + " (" + item.year + ")<br />";
		}
		
		let placeholder = document.getElementById("currentTimeDisplay");
		placeholder.innerHTML = answer;
	}

}