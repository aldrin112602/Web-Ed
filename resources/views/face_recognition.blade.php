<!DOCTYPE html>
<html lang="en">
<head>
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

    <style>
        html::-webkit-scrollbar {
            display: none;
        }

        html {
            scroll-behavior: smooth;
        }
        body {
            background-color: #f8fafc;
        }
        canvas {
            position: absolute;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen">
    <div class="w-full lg:w-3/4 xl:w-2/3 flex flex-col lg:flex-row items-center space-y-8 lg:space-y-0 lg:space-x-8 bg-white p-6 shadow-lg rounded-lg">
        <div class="text-center flex flex-col items-center">
            <p class="font-bold text-lg mb-2">LOOK AT THE CAMERA</p>
            <div class="relative w-full max-w-md">
                <video id="video" class="w-full h-auto bg-blue-100 rounded-lg" autoplay muted></video>
                <canvas id="overlay" class="absolute top-0 left-0 w-full h-full"></canvas>
                <div id="instructions" class="absolute bottom-0 left-0 w-full text-center bg-gray-800 bg-opacity-75 text-white py-2">Please blink your eyes and move your head left and right</div>
            </div>
            <button id="stopButton" class="mt-4 bg-black text-white py-2 px-6 rounded">Stop</button>
        </div>
        <div class="w-full lg:w-1/2 p-4 border rounded-lg bg-gray-100 flex flex-col space-y-2 h-full">
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
                <span class="font-bold">Guardian No.:</span>
                <span id="guardian-no" class="ml-2">N/A</span>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const video = $('#video')[0];
            const studentName = $('#student-name');
            const studentStrand = $('#student-strand');
            const studentId = $('#student-id');
            const guardianNo = $('#guardian-no');
            const stopButton = $('#stopButton');
            const overlay = $('#overlay')[0];
            const instructions = $('#instructions');

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

                const labeledFaceDescriptors = await loadLabeledImages();
                const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6);

                async function onPlay() {
                    const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceDescriptors();
                    const resizedDetections = faceapi.resizeResults(detections, displaySize);
                    overlay.getContext('2d').clearRect(0, 0, overlay.width, overlay.height);

                    const results = resizedDetections.map(d => faceMatcher.findBestMatch(d.descriptor));
                    results.forEach(async (result, i) => {
                        const box = resizedDetections[i].detection.box;
                        const drawBox = new faceapi.draw.DrawBox(box, {
                            label: result.toString()
                        });
                        drawBox.draw(overlay);

                        if (result.label !== 'unknown') {
                            if (await performLivenessChecks(resizedDetections[i])) {
                                updateStudentInfo(result.label);
                            } else {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Spoofing Attempt Detected',
                                    text: 'Please ensure you are using a real face.'
                                });
                            }
                        }
                    });

                    if (!stopButton.hasClass('stopped')) {
                        setTimeout(onPlay, 200);
                    }
                }

                onPlay();
            });

            stopButton.on('click', () => {
                const stream = video.srcObject;
                const tracks = stream.getTracks();

                tracks.forEach(track => track.stop());
                video.srcObject = null;
                stopButton.addClass('stopped');
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

            async function performLivenessChecks(detection) {
                const landmarks = detection.landmarks.positions;
                const leftEye = landmarks.slice(36, 42);
                const rightEye = landmarks.slice(42, 48);
                const nose = landmarks[30];
                const chin = landmarks[8];

                const leftEyeOpen = faceapi.euclideanDistance(leftEye[0], leftEye[3]) < 0.2;
                const rightEyeOpen = faceapi.euclideanDistance(rightEye[0], rightEye[3]) < 0.2;
                const headMovement = faceapi.euclideanDistance(nose, chin) > 0.2;

                return leftEyeOpen && rightEyeOpen && headMovement;
            }

            function updateStudentInfo(label) {
                $.get(`/face_recognition/student-info/${label}`, data => {
                    studentName.text(data.name);
                    studentStrand.text(data.strand);
                    studentId.text(data.id_number);
                    guardianNo.text(data.parents_contact_number);
                }).fail(err => console.error('Error fetching student info:', err));
            }
        });
    </script>
</body>
</html>
