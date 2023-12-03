// script.js file 

function goPage(str){
    window.location.href = `${str}.php`
}

const notifications = document.querySelector(".notifications"),
buttons = document.querySelectorAll(".buttons .btn");

// Object containing details for different types of toasts
const toastDetails = {
    timer: 5000,
    success: {
        icon: 'fa-circle-check',
    },
    error: {
        icon: 'fa-circle-xmark',
    },
    warning: {
        icon: 'fa-triangle-exclamation',
    },
    info: {
        icon: 'fa-circle-info',
    }
}

const removeToast = (toast) => {
    toast.classList.add("hide");
    if(toast.timeoutId) clearTimeout(toast.timeoutId); // Clearing the timeout for the toast
    setTimeout(() => toast.remove(), 500); // Removing the toast after 500ms
}

const createToast = (id, message) => {
    // Getting the icon and text for the toast based on the id passed
    const { icon } = toastDetails[id];
    const toast = document.createElement("li"); // Creating a new 'li' element for the toast
    toast.className = `toast ${id}`; // Setting the classes for the toast
    // Setting the inner HTML for the toast
    toast.innerHTML = `<div class="column">
                         <i class="fa-solid ${icon}"></i>
                         <span style="color:black">${message}</span>
                      </div>
                      <i class="fa-solid fa-xmark" onclick="removeToast(this.parentElement)"></i>`;
    notifications.appendChild(toast); // Append the toast to the notification ul
    // Setting a timeout to remove the toast after the specified duration
    toast.timeoutId = setTimeout(() => removeToast(toast), toastDetails.timer);
}


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
	
	 function onScanSuccess(decodedText, decodedResult) {
		if(decodedText.length>10){
			alert({valid_id, app_id})
			// html5QrCode.stop().then((ignore) => {
			// 	const newa = (decodedText.substring(decodedText.indexOf('?')+1)).split('&')
			// 	const valid_id = newa[0].split("=")[1]
			// 	const app_id = newa[1].split("=")[1]
			// 	fetch(`../backend/scanner.php?app_id=${app_id}&valid_id=${valid_id}`,{
			// 		method: "GET"
			// 	})
			// 	.then(response=> response.json())
			// 	.then(result =>{
			// 		// console.log(result)
			// 		alert(result)
			// 	})
		
			//   }).catch((err) => {
			// 	alert("Wrong")
			//   });
		}else{
			alert("Wrong")
		}
		
	}
	
	function onScanError(errorMessage) {
		alert(`Scan error: ${errorMessage}`, error)
	}
	
	html5QrCode.start( { facingMode: "environment" }, config, onScanSuccess, onScanError);
});
