{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam Capture</title>
    <style>
        #canvas {
            display: none;
        }

        #photo {
            width: 320px;
            height: 240px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <h1>Take a Photo with Webcam</h1>
    <video id="video" width="320" height="240" autoplay></video>
    <button id="snap">Capture Photo</button>
    <canvas id="canvas" width="320" height="240"></canvas>
    <img id="photo" src="" alt="Captured photo">
    <form id="form-id">
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script></script>
    <script>
        // Get elements
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');
        const photo = document.getElementById('photo');
        const snapButton = document.getElementById('snap');
        var blob;
        // Access webcam
        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(function(stream) {
                video.srcObject = stream; // Display webcam feed in the video element
            })
            .catch(function(err) {
                console.log("Error accessing the camera: " + err);
            });

        // Capture photo
        snapButton.addEventListener('click', function() {
            // Draw the current frame from the video onto the canvas
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Convert canvas to image and display it
            const dataUrl = canvas.toDataURL('image/png');
            photo.src = dataUrl;
            blob=base64ToBlob(dataUrl);


        });
        $(document).on('submit', '#form-id', function(e) {
            e.preventDefault();
            var form_data = new FormData($('#form-id')[0]);
            form_data.append('file', blob, 'photo.png')
            URL.revokeObjectURL(blob);
            $.ajax({
                type: "post",
                url: '/take-photo',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        })

        function base64ToBlob(base64, type = 'image/png') {
            const byteCharacters = atob(base64.split(',')[1]); // Decode Base64
            const byteNumbers = new Uint8Array(byteCharacters.length);

            for (let i = 0; i < byteCharacters.length; i++) {
                byteNumbers[i] = byteCharacters.charCodeAt(i);
            }

            return new Blob([byteNumbers], {
                type: type
            });
        }
    </script>

</body>

</html> --}}





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download HTML as PDF</title>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        >
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head>
<body>
    <div id="content" style="padding: 20px; border: 1px solid black;">
        <h1>Hello, World!</h1>
        <img src="./images/main-logo.png" alt="main logo" class="download-card-logo">
        <img src="./images/qr.png" alt="QR" class="download-card-qr">
        <img src="{{asset('images/img.png')}}" alt="">
        <p>This content will be captured and downloaded as a PDF.</p>
        <i class="fa-solid fa-download"></i>
        <div class="container-xxl d-flex col-12 justify-content-center p-0">
            <div class="d-flex flex-wrap col-md-5 col-12 main-body-div responsive-card">
                <header class="d-flex  header-div col-12">
                    <img src="./images/logo.png" alt="no logo" class="header-logo">
                    <h3>United People's Party Liberal (UPPL)</h3>
                </header>
                <div class="d-flex flex-wrap col-12 main-content">
                    <hr class="col-12" style="border: 1px solid black;">
                    <div class="d-flex flex-wrap col-12 download-head">
                        <h1 class="col-12">UPPL Membership Card</h1>
                        <p class="col-12">Membership Number: 7026255000</p>
                        <p class="col-12">Date of Joining: 13 Sep, 2024</p>
                    </div>
                    <div class="d-flex flex-wrap col-12 main-download-card" id="main-download-card-id">
                        <div class="d-flex col-12 download-card">
                            <img src="./images/main-logo.png" alt="main logo" class="download-card-logo">
                            <div class="d-flex download-card-text-div">
                                <div class="d-flex flex-wrap flex-column">
                                    <h1 class="download-card-h1">
                                        United People's
                                        <br>
                                        Party Liberal
                                        <br>
                                        (UPPL)
                                    </h1>
                                    <p class="download-card-para">
                                        HQ & P.O. Kokrajhar,
                                        <br>
                                        BTR (Assam), Pin- 783370
                                    </p>
                                </div>
                                <div class="d-flex flex-wrap download-card-profile">
                                    <img src="./images/qr.png" alt="QR" class="download-card-qr">
                                    <div class="download-card-profile-img"></div>
                                </div>
                            </div>
                        </div>
                        <div class="download-card-info col-9">
                            <p class="download-card-info-para col-12">Name :</p>
                            <p class="download-card-info-para col-12">District :</p>
                            <p class="download-card-info-para col-12">Membership ID :</p>
                        </div>
                        <div class="d-flex flex-wrap col-12 justify-content-center">
                            <button type="button" class="doanload-card-btn" id="downloadPDF">
                                <i class="fa-solid fa-download"></i>
                            </button>
                        </div>
                    </div>
                    <hr class="col-12" style="border: 1px solid black;">
                    <div class="d-flex flex-wrap col-9 extra-dwnload-card">
                        <h1 class="extra-download-head">Your Unique Referral Link</h1>
                        <div class="d-flex extra-copy-div">
                            <input type="text" class="extra-copy-input">
                            <button class="extra-copy-btn">Copy</button>
                        </div>
                        <p class="extra-download-para">Your Referral Code: UUIXXQ</p>
                        <button class="extra-download-btn">Share</button>
                        <button class="extra-download-btn">Update your details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="download">Download as PDF</button>

    <script>
        document.getElementById('download').onclick = function() {
            const { jsPDF } = window.jspdf;

            html2canvas(document.getElementById('content')).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF();

                // Calculate image dimensions
                const imgWidth = 190; // PDF width
                const pageHeight = pdf.internal.pageSize.height;
                const imgHeight = (canvas.height * imgWidth) / canvas.width;
                let heightLeft = imgHeight;

                let position = 0;

                // Add the first page with the image
                pdf.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                // Add subsequent pages if needed
                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    pdf.addPage();
                    pdf.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                // Save the PDF
                pdf.save('example.pdf');
            }).catch(error => {
                console.error('Error generating PDF:', error);
            });
        };
    </script>
</body>
</html>
