<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
    <script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
</head>

<body>
<h1>Scan QR Code</h1>
    <div id="reader" width="600px"></div>

    <script>
        function onScanSuccess(qrCodeMessage) {
            fetch('{{ route('qr.scan') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ qr_code_data: qrCodeMessage })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                // alert(data.success || data.error);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error scanning QR code.');
            });
        }

        function onScanFailure(error) {
            // Handle scan failure, usually better to ignore and keep scanning
            // console.warn(`QR error: ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });

        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</body>

</html>