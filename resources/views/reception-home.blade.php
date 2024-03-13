<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
</head>
<body>
    <!-- Placeholder for camera feed -->
    <video id="camera" width="640" height="480" autoplay></video>
    <button id="captureButton">Capture</button>

    <script src="https://cdn.jsdelivr.net/npm/jsqr@latest/dist/jsQR.js"></script>

    <script>
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
            });

        // Initialize variables for video, canvas, and context
        var video = document.getElementById('camera');
        var canvas = document.createElement('canvas');
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
            }

            // Call scanQRCode() recursively to continuously scan for QR codes
            requestAnimationFrame(scanQRCode);
        }

        function handleQRCode(code) {
            // Do whatever you want with the detected QR code
            console.log('Detected QR code:', code.data);
            // For example, you can redirect to a URL or perform an action based on the QR code data
        }
    </script>
</body>
</html>
