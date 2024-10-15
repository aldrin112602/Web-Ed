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
    <link rel="manifest" href="{{ asset('manifest.json') }}">
</head>

<body class="flex items-center justify-center h-screen">
    <div class="w-full lg:w-3/4 xl:w-2/3 flex flex-col lg:flex-row items-center space-y-8 lg:space-y-0 lg:space-x-8 bg-white p-6 shadow-lg rounded-lg">
        <div class="text-center flex flex-col items-center">
            <p class="font-bold text-lg mb-2">LOOK AT THE CAMERA</p>
            <div class="relative w-full max-w-md">
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
                faceapi.nets.faceRecognitionNet.loadFromUri('{{ asset("face_api/models") }}'),
                faceapi.nets.faceLandmark68TinyNet.loadFromUri('{{ asset("face_api/models") }}') // Load the tiny landmark model for faster processing
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
                    results.forEach((result, i) => {
                        const box = resizedDetections[i].detection.box;
                        const drawBox = new faceapi.draw.DrawBox(box, {
                            label: result.toString()
                        });
                        drawBox.draw(overlay);

                        if (result.label !== 'unknown') {
                            updateStudentInfo(result.label);
                        }
                    });

                    requestAnimationFrame(onPlay);
                }

                onPlay();
            });

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
                        id_number,
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
                                student_id: id,
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
                                    console.error('Failed to submit attendance:', response.message);
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


    window.addEventListener('beforeunload', function (e) {
        var confirmationMessage = 'Are you sure to reload this page? this may takes some times to load all models once you reload the page.';

        (e || window.event).returnValue = confirmationMessage;
        return confirmationMessage;
    });

    </script>
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('{{ asset("service-worker.js") }}').then(function(registration) {
                console.log('Service Worker registered with scope:', registration.scope);
            }).catch(function(error) {
                console.log('Service Worker registration failed:', error);
            });
        }
    </script>
</body>

</html>