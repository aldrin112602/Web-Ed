<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    <script src="{{ asset('build/assets/app.js') }}" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Face Recognition</title>
    <script src="{{ asset('face_api/face-api.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/face-scan.css') }}">
    <style>
        .instruction {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: bold;
            z-index: 10;
        }

        .progress-container {
            width: 100%;
            height: 20px;
            background-color: #f0f0f0;
            border-radius: 10px;
            margin-top: 20px;
        }

        .progress-bar {
            width: 0%;
            height: 100%;
            background-color: #4CAF50;
            border-radius: 10px;
            transition: width 0.3s ease-in-out;
        }
    </style>
</head>

<body class="flex items-center justify-center h-screen">
    <div class="w-full lg:w-3/4 xl:w-2/3 flex flex-col lg:flex-row items-center space-y-8 lg:space-y-0 lg:space-x-8 bg-white p-6 shadow-lg rounded-lg">
        <div class="text-center flex flex-col items-center">
            <p class="font-bold text-lg mb-2">FACE VERIFICATION</p>
            <div class="relative w-full max-w-md">
                <div id="instruction" class="instruction">Please look at the camera</div>
                <video id="video" class="w-full h-auto bg-blue-100" autoplay muted></video>
                <canvas id="overlay" class="absolute top-0 left-0 w-full h-full"></canvas>
            </div>
            <div class="progress-container">
                <div class="progress-bar" id="progress-bar"></div>
            </div>
            <button id="resetButton" class="mt-4 bg-black text-white py-2 px-6 rounded cursor-pointer">Reset</button>
        </div>
        <div class="w-full lg:w-1/2 p-4 border rounded-lg bg-gray-100 flex flex-col space-y-2 h-full mb-60">
            <div class="flex justify-between items-center">
                <span class="font-bold">Student's Name:</span>
                <span id="student-name" class="ml-2">N/A</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-bold">Strand:</span>
                <span id="student-strand" class="ml-2">N/A</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-bold">ID No.:</span>
                <span id="student-id" class="ml-2">N/A</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-bold">Time In:</span>
                <span id="time-in" class="ml-2">N/A</span>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            let hasSubmitted = false;
            let currentStep = 0;
            const verificationSteps = [{
                    instruction: 'Please look at the camera',
                    action: 'center',
                    progress: 25
                },
                {
                    instruction: 'Turn your head to the left',
                    action: 'left',
                    progress: 50
                },
                {
                    instruction: 'Turn your head to the right',
                    action: 'right',
                    progress: 75
                },
                {
                    instruction: 'Verification complete!',
                    action: 'complete',
                    progress: 100
                }
            ];

            const video = $('#video')[0];
            const studentName = $('#student-name');
            const studentStrand = $('#student-strand');
            const studentId = $('#student-id');
            const timeIn = $('#time-in');
            const resetButton = $('#resetButton');
            const overlay = $('#overlay')[0];
            const progressBar = $('#progress-bar');

            Promise.all([
                faceapi.nets.tinyFaceDetector.loadFromUri('{{ asset("face_api/models") }}'),
                faceapi.nets.faceLandmark68Net.loadFromUri('{{ asset("face_api/models") }}'),
                faceapi.nets.faceRecognitionNet.loadFromUri('{{ asset("face_api/models") }}')
            ]).then(startVideo).catch(err => console.error('Error loading models:', err));

            function startVideo() {
                navigator.mediaDevices.getUserMedia({
                    video: {}
                }).then(stream => {
                    video.srcObject = stream;
                    video.onloadedmetadata = () => {
                        overlay.width = video.videoWidth;
                        overlay.height = video.videoHeight;
                    };
                }).catch(err => console.error('Error accessing webcam:', err));
            }

            $(video).on('play', async () => {
                const displaySize = {
                    width: video.videoWidth,
                    height: video.videoHeight
                };
                faceapi.matchDimensions(overlay, displaySize);

                async function onPlay() {
                    const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
                        .withFaceLandmarks()
                        .withFaceDescriptors();

                    if (detections.length === 0) {
                        return requestAnimationFrame(onPlay);
                    }
                    const landmarks = detections[0].landmarks;
                    const jawOutline = landmarks.getJawOutline();
                    const nose = landmarks.getNose();

                    // Check head position based on current step
                    switch (verificationSteps[currentStep].action) {
                        case 'center':
                            if (isLookingCenter(jawOutline, nose)) {
                                moveToNextStep();
                            }
                            break;
                        case 'left':
                            if (isLookingLeft(jawOutline, nose)) {
                                moveToNextStep();
                            }
                            break;
                        case 'right':
                            if (isLookingRight(jawOutline, nose)) {
                                moveToNextStep();
                            }
                            break;
                        case 'complete':
                            if (!hasSubmitted) {
                                startFaceMatching(detections[0].descriptor);
                            }
                            break;
                    }

                    const resizedDetections = faceapi.resizeResults(detections, displaySize);
                    const ctx = overlay.getContext('2d');
                    ctx.clearRect(0, 0, overlay.width, overlay.height);
                    faceapi.draw.drawDetections(overlay, resizedDetections);
                    // afceapi.draw.drawFaceLandmarks(overlay, resizedDetections);

                    requestAnimationFrame(onPlay);
                }

                onPlay();
            });

            function moveToNextStep() {
                currentStep++;
                if (currentStep < verificationSteps.length) {
                    $('#instruction').text(verificationSteps[currentStep].instruction);
                    $('#progress-bar').css('width', verificationSteps[currentStep].progress + '%');
                }
            }

            function isLookingLeft(jawOutline, nose) {
                const jawCenter = getCenter(jawOutline);
                const nosePosition = getCenter(nose);
                return (nosePosition.x - jawCenter.x) < -10;
            }

            function isLookingRight(jawOutline, nose) {
                const jawCenter = getCenter(jawOutline);
                const nosePosition = getCenter(nose);
                return (nosePosition.x - jawCenter.x) > 10;
            }

            function isLookingCenter(jawOutline, nose) {
                const jawCenter = getCenter(jawOutline);
                const nosePosition = getCenter(nose);
                return Math.abs(nosePosition.x - jawCenter.x) < 5;
            }

            function getCenter(points) {
                const center = points.reduce((acc, pt) => ({
                    x: acc.x + pt.x,
                    y: acc.y + pt.y
                }), {
                    x: 0,
                    y: 0
                });
                return {
                    x: center.x / points.length,
                    y: center.y / points.length
                };
            }

            async function startFaceMatching(faceDescriptor) {
                const labeledFaceDescriptors = await loadLabeledImages();
                const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.4);
                const result = faceMatcher.findBestMatch(faceDescriptor);

                if (result.label !== 'unknown') {
                    $('#instruction').text(result.label);
                    updateStudentInfo(result.label);
                } else {
                    $('#instruction').text('Unknown');
                }
            }

            resetButton.on('click', () => {
                hasSubmitted = false;
                studentName.text('N/A');
                studentStrand.text('N/A');
                studentId.text('N/A');
                timeIn.text('N/A');

                Swal.fire({
                    title: 'Face Scan Reset successfully',
                    icon: 'success'
                });
            });

            async function loadLabeledImages() {
                const labels = await $.get('{{ route("fetch_labels") }}');
                console.log('Labels:', labels);

                return Promise.all(
                    labels.map(async label => {
                        const descriptions = [];
                        for (let i = 0; i < 3; i++) {
                            const img = await faceapi.fetchImage(`{{ asset('storage/face_images/') }}/${label}/${i}.jpg`);
                            const detections = await faceapi.detectSingleFace(img, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceDescriptor();
                            if (detections) {
                                descriptions.push(detections.descriptor);
                            } else {
                                console.warn(`No detections for ${label} image ${i}`);
                            }
                        }
                        return new faceapi.LabeledFaceDescriptors(label, descriptions);
                    })
                );
            }



            function getTimeIn() {
                const date = new Date();
                const hours = date.getHours() > 12? date.getHours() - 12 : date.getHours();
                const minutes = String(date.getMinutes()).padStart(2, '0');
                return `${hours}:${minutes}${date.getHours() >= 12? ' PM' : ' AM'}`;
            }

            function getDate() {
                const date = new Date();
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const year = date.getFullYear();
                return `${day}-${month}-${year}`;
            }

            function updateStudentInfo(label) {
                $.get(`/face_recognition/student-info/${label}`, data => {
                    const {
                        id,
                        name,
                        strand,
                        id_number
                    } = data;

                    studentName.text(name);
                    studentStrand.text(strand);
                    studentId.text(id_number);
                    timeIn.text(getDate() + ' ' + getTimeIn());

                    if (!hasSubmitted) {
                        $.ajax({
                            url: '{{ route("face.attendance") }}',
                            type: 'POST',
                            data: {
                                student_id: id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Face Successfully Scanned!',
                                        text: 'Your attendance has been recorded. Please proceed to your respective room',
                                        icon: 'success'
                                    });
                                } else {
                                    hasSubmitted = true;
                                    Swal.fire({
                                        title: 'Your attendance has been recorded for today!',
                                        icon: 'info'
                                    });
                                }
                            },
                            error: function(err) {
                                console.error('Error submitting attendance:', err);
                            }
                        });
                    }
                }).fail(err => console.error('Error fetching student info:', err));
            }
        });
    </script>


    <script>
        window.addEventListener('beforeunload', function(e) {
            var confirmationMessage = 'Are you sure to reload this page? this may takes some times to load all models once you reload the page.';

            (e || window.event).returnValue = confirmationMessage;
            return confirmationMessage;
        });
    </script>

</body>

</html>