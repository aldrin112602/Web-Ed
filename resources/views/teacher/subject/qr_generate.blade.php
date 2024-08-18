@extends('teacher.layouts.app')
@section('title', 'QR Code Generated | Ready to Scan')
@section('content')
<div class="flex flex-col items-center justify-center w-full my-6">
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-md">
        <div class="flex flex-col items-center justify-center">
            <div id="qr_generate" class="border-dashed border-2 border-gray-300 p-4 rounded-lg mb-6 pointer-events-none"></div>
            <button onclick="location.reload()" class="mb-6 px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded">
                Generate new QR code
            </button>
            <div class="w-full">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="px-2 py-1"></th>
                            <th class="px-2 py-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-2 py-1 border">
                                Total Student:
                            </td>
                            <td class="px-2 py-1 border">
                                {{ $allStudentsCount }}
                            </td>
                        </tr>

                        <tr>
                            <td class="px-2 py-1 border">
                                Total Present:
                            </td>
                            <td class="px-2 py-1 border">
                                0
                            </td>
                        </tr>

                        <tr>
                            <td class="p-3 border">
                                Total Absent:
                            </td>
                            <td class="p-3 border">
                                9
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/qrcode.min.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const qrcode = new QRCode(document.querySelector('#qr_generate'), {
            width: 400,
            height: 400,
        });

        const qrData = @json($data);
        qrcode.makeCode(qrData);

        Swal.fire({
            title: 'Success',
            text: 'QR Code generated successfully!',
            icon: 'success',
        });
    });
    

    window.addEventListener('beforeunload', function (e) {
        var confirmationMessage = 'Are you sure to leave this page?';

        (e || window.event).returnValue = confirmationMessage;
        return confirmationMessage;
    });
</script>
@endsection
