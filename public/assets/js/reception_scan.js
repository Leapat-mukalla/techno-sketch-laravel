   // Get access to the user's camera
   navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
   .then(function(stream) {
       // Set the camera stream as the source for the video element
       var video = document.getElementById('camera');
       video.srcObject = stream;
       video.play();
   })
   .catch(function(err) {
       console.error('Error accessing camera:', err);
       // Display error message to the user
       // alert('Error accessing camera. Please check your camera permissions and try again.');
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
       displayErrorModal('بيانات رمز الاستجابة السريعة غير صالحة. حاول مرة اخرى.');
       // Return to the previous state
       return;

   } else {
       // If the QR code data is valid, do whatever you want with it
       var userId = parseInt(code.data);
       // Perform an AJAX request to check if the user ID exists in the database
       $.ajax({
           url: '/checkUserId',
           type: 'POST',
           data: {
               _token: '{{ csrf_token() }}',
               userId: userId
           },
           success: function(response) {
               if (response.exists) {
                   // If the user ID exists, ask for confirmation from the user
                   // var confirmAttendance = confirm('Do you want to confirm visitor attendance?');
                   displayConfirmationModal('هل تريد تأكيد حضور الزائر؟', function() {
                       // If confirmed, create a new entry in the visitors table
                       $.ajax({
                           url: '/createVisitorScan',
                           type: 'POST',
                           data: {
                               _token: '{{ csrf_token() }}',
                               userId: userId
                           },
                           success: function() {
                               // Display success message to the user
                               displaySuccessModal('تم تأكيد حضور الزائر بنجاح.');
                           },

                           error: function(xhr, status, error) {
                               console.error('Error creating visitor scan:', error);
                               alert('An error occurred while confirming visitor attendance. Please try again later.');
                               displayErrorModal('حدث خطأ أثناء تأكيد حضور الزائر. الرجاء معاودة المحاولة في وقت لاحق.');
                           }
                       })
                       });

               } else {
                   // If the user ID does not exist, display an error message to the user
                   alert('User with ID ' + userId + ' not found. Please try again.');
                   displayErrorModal('لم يتم العثور على مستخدم بهذا المعرف . حاول مرة اخرى.');
               }
           },
           error: function(xhr, status, error) {

               displayErrorModal('حدث خطأ أثناء التحقق من معرف المستخدم. حاول مرة اخرى.');
           }
       });

   }
}
// Function to display error message in modal
function displayErrorModal(message) {
               // Set the error message in the modal body
               document.getElementById('errorMessage').innerText = message;
               // Trigger the modal to display
               var modal = new bootstrap.Modal(document.getElementById('errorModal'));
               modal.show();
           }

           // Call this function to open the modal with the specified message
           function openErrorModal(message) {
               // Display the button to trigger the modal
               document.getElementById('openModalButton').click();
               // Display the error message in the modal
               displayErrorModal(message);
           }
// Function to display confirmation modal
function displayConfirmationModal(message, confirmCallback) {
// Set the confirmation message in the modal body
document.getElementById('confirmationMessage').innerText = message;
// Set the confirm callback function for the confirm button click
$('#confirmButton').off('click').on('click', confirmCallback);
// Trigger the confirmation modal to display
var modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
modal.show();
}

// Function to display success modal
function displaySuccessModal(message) {
// Set the success message in the modal body
document.getElementById('successMessage').innerText = message;
// Trigger the success modal to display
var modal = new bootstrap.Modal(document.getElementById('successModal'));
modal.show();
}
