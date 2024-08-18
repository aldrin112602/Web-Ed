@extends('student.layouts.app')

@section('title', 'Scan Qr')

@section('content')
<div class="p-5 bg-white">
    <div id="reader"></div>
</div>

<script>
    const client_teacher_id = @json(request()->query('teacher_id'));
    const client_subject_id = @json(request()->query('subject_id'));

    function onScanSuccess(qrCodeMessage) {
        // Combine the QR code data with the additional data
        qrCodeMessage = JSON.stringify({
            ...JSON.parse(qrCodeMessage),
            client_teacher_id,
            client_subject_id
        });


        fetch('{{ route('qr.scan') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: qrCodeMessage
                })
            .then(response => response.json())
            .then(data => {

                if(data?.error) {
                    Swal.fire({
                    title: "Error",
                    text: data.error,
                    icon: "error"
                });
                } else {
                    Swal.fire({
                    title: "Success",
                    text: data.success,
                    icon: "success"
                });
                }
                
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function onScanFailure(error) {
        // Handle scan failure (optional)
        // console.warn(`QR code scan error: ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: 300
        });

    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
@endsection
@section('scripts')
<script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
@endsection