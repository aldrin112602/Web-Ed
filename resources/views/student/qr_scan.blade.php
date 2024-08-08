<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
<h1>Scan QR Code</h1>
    <div id="reader" width="600px"></div>

    <script>
        function onScanSuccess(qrCodeMessage) {
            // console.log(qrCodeMessage)
            // Send the QR code data to the server
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