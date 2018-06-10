$( document ).ready(function() {
    let json = JSON.parse($('#batch_json').text());
    let batch_function = json.function;
    let batch_file = json.filename;
    let batch_class = json.class;
    let batch_dir = $('#batch_dir').text();
    let processed = 0;
    console.log(batch_dir);
    /*
    * For each of the params, a new ajax call will be created
    * There will be no page error for now, if something fails, the script just moves on
    */
    $.each(json.params, function(index, value){
    	let dir = batch_dir+'BatchProcess.php';
    	$.post('BatchProcess.php', {value, batch_function: batch_function, batch_file: batch_file, batch_class: batch_class}, function(response){
    		processed++;
    		// if(response){
    			$('#processsed').text(processed);
    		// }
    	});
    })
});