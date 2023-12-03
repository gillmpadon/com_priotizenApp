// script.js file 

function domReady(fn) { 
	if ( 
		document.readyState === "complete" || 
		document.readyState === "interactive"
	) { 
		setTimeout(fn, 1000); 
	} else { 
		document.addEventListener("DOMContentLoaded", fn); 
	} 
} 

// const result  = document.getElementById("result")
domReady(function () { 
	const html5QrCode = new Html5Qrcode("reader");
	const config = { fps: 60, qrbox: { width: 250, height: 250 } };

	function checkUser(app_id, valid_id){
		fetch(`../backend/scanner.php?app_id=${app_id}&valid_id=${valid_id}`,{
			method: "GET"
		})
		.then(response=> response.json())
		.then(result =>{
			console.log(result)
		})
	}
	function onScanSuccess(decodedText, decodedResult) {
		if(decodedText == 'hey'){
			alert("Correct")
			html5QrCode.stop().then((ignore) => {
				// QR Code scanning is stopped.
			  }).catch((err) => {
				// Stop failed, handle it.
			  });
		}else{
			alert("Wrong")
		}
	}
	
	function onScanError(errorMessage) {
		alert(`Scan error: ${errorMessage}`, error)
	}
	
	html5QrCode.start( { facingMode: "environment" }, config, onScanSuccess, onScanError);
});
