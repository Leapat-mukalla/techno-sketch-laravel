 // Get access to the user's camera
 navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
 .then(function(stream) {
     // Set the camera stream as the source for the video element
     var video = document.getElementById('camera');
     video.srcObject = stream;
     video.play();
 })
 .catch(function(err) {
     // Display error message to the user
     displayErrorModal('حدث خطأ أثناء الوصول إلى الكاميرا. يرجى التحقق من أذونات الكاميرا والمحاولة مرة أخرى.');

 });

// Initialize variables for video, canvas, and context
var video = document.getElementById('camera');
var canvas = document.createElement('canvas');
canvas.willReadFrequently = true; // Set the willReadFrequently attribute to true
var context = canvas.getContext('2d');

// Listen for the 'loadedmetadata' event on the video element
video.addEventListener('loadedmetadata', function() {
 // Set the canvas dimensions to match the video dimensions
 canvas.width = video.videoWidth;
 canvas.height = video.videoHeight;
});

// Listen for clicks on the "capture" button
document.getElementById('captureButton').addEventListener('click', function() {
 // Start scanning for QR codes when the "capture" button is clicked
 scanQRCode();

});

function scanQRCode() {
 // Draw the current frame from the video onto the canvas
 context.drawImage(video, 0, 0, canvas.width, canvas.height);

 // Get the image data from the canvas
 var imageData = context.getImageData(0, 0, canvas.width, canvas.height);

 // Use jsQR to detect QR codes
 var code = jsQR(imageData.data, imageData.width, imageData.height);

 if (code) {
     // If a QR code is detected, handle it
     handleQRCode(code);
 } else {
     // If no QR code is detected, display a message to the user
     // alert('No QR code detected. Please try again.');
     displayErrorModal('لم يتم اكتشاف رمز الاستجابة السريعة. حاول مرة اخرى.');
     // Stop scanning for QR codes
     return; // Exit the function
 }

 // Call scanQRCode() recursively to continuously scan for QR codes
 requestAnimationFrame(scanQRCode);
}

function handleQRCode(code) {
 // Check if the QR code data is empty or not an integer
 if (!code.data || isNaN(parseInt(code.data))) {
     // Display a message to the user indicating that the QR code data is invalid
     // alert('Invalid QR code data. Please try again.');
     displayErrorModal('بيانات رمز الاستجابة السريعة غير صالحة. حاول مرة اخرى.');
     // Return to the previous state
     return;
 } else {
     // If the QR code data is valid, do whatever you want with it
     var artworkId = parseInt(code.data);
     // Perform an AJAX request to check if the user ID exists in the database
     $.ajax({
         url: '/getArtworkDetails',
         type: 'GET',
         data: {
             artworkId: artworkId
         },
         success: function(response) {
             // Handle successful response
             // Redirect the user to the page with artwork details
             window.location.href = '/artworks/' + response.artwork.id;
         },
         error: function(xhr, status, error) {
             // Handle error
             // console.error('Error fetching artwork details:', error);
             displayErrorModal('حدث خطأ أثناء جلب تفاصيل العمل الفني. حاول مرة اخرى.');
         }
     });

 }
}
