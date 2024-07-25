<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Face Recognition</title>
    <script src="{{ asset('face_api/face-api.min.js') }}"></script>
    <style>
        body {
            padding: 0;
            margin: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #2d3748;
            color: #cbd5e0;
        }
        canvas {
            position: absolute;
        }
    </style>
</head>
<body>
    <video id="video" width="720" height="560" autoplay muted></video>
    <script>
        const video = document.getElementById("video");
        Promise.all([
            faceapi.nets.tinyFaceDetector.loadFromUri('{{ asset("face_api/models") }}'),
            faceapi.nets.faceLandmark68Net.loadFromUri('{{ asset("face_api/models") }}'),
            faceapi.nets.faceRecognitionNet.loadFromUri('{{ asset("face_api/models") }}')
        ]).then(startVideo).catch(err => console.error('Error loading models:', err));

        function startVideo() {
            navigator.getUserMedia(
                { video: {} },
                stream => video.srcObject = stream,
                err => console.error('Error accessing webcam:', err)
            );
        }

        video.addEventListener('play', async () => {
            console.log('Video started');
            const canvas = faceapi.createCanvasFromMedia(video);
            document.body.append(canvas);
            const displaySize = { width: video.width, height: video.height };
            faceapi.matchDimensions(canvas, displaySize);

            const labeledFaceDescriptors = await loadLabeledImages();
            const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6);

            async function onPlay() {
                const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceDescriptors();
                const resizedDetections = faceapi.resizeResults(detections, displaySize);
                canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);

                const results = resizedDetections.map(d => faceMatcher.findBestMatch(d.descriptor));
                results.forEach((result, i) => {
                    const box = resizedDetections[i].detection.box;
                    const drawBox = new faceapi.draw.DrawBox(box, { label: result.toString() });
                    drawBox.draw(canvas);
                });

                setTimeout(onPlay, 200);
            }

            onPlay();
        });

        async function loadLabeledImages() {
            const labels = await fetch('{{ route("fetch_labels") }}').then(res => res.json());
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
    </script>
</body>
</html>
