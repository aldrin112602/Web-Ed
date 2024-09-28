@extends('teacher.layouts.app')
@section('title', 'QR Code Generated | Ready to Scan')
@section('content')
<div class="w-full mb-6">
    <!-- Main container with two columns -->
    <div class="flex flex-wrap justify-between w-full">
        <!-- First column: QR Code and Details -->
        <div class="bg-white shadow-md rounded-lg p-6 w-full">
            <div class="flex flex-col items-center justify-center">
                <div id="qr_generate" class="border-dashed border-2 border-gray-300 p-4 rounded-lg mb-6 pointer-events-none"></div>
                <button onclick="location.reload()" class="mb-6 px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded">
                    Generate new QR code
                </button>
                <div class="w-full">
                    <h2 class="border-b-2 border-yellow-600 py-2">
                        {{ $subject->subject }} - {{ $subject->time }}
                    </h2>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="px-2 py-1"></th>
                                <th class="px-2 py-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-2 py-1 border">Total Students:</td>
                                <td class="px-2 py-1 border">{{ $allStudentsCount }}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-1 border">Total Present:</td>
                                <td class="px-2 py-1 border">{{ $presentCount }}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-1 border">Total Absent:</td>
                                <td class="px-2 py-1 border">{{ $absentCount }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Second column: Table of Students -->
        <div class="bg-white shadow-md rounded-lg p-6 w-full mt-6 lg:mt-0">
            <h2 class="border-b-2 border-yellow-600 py-2">List of Students</h2>
            <table class="w-full mt-4">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left border">ID NO.</th>
                        <th class="px-4 py-2 text-left border">STUDENT NAME</th>
                        <th class="px-4 py-2 text-left border">TIME IN</th>
                        <th class="px-4 py-2 text-left border">STATUS</th>
                        <th class="px-4 py-2 text-left border">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td class="px-4 py-2 border">{{ $student->id_number }}</td>
                        <td class="px-4 py-2 border">{{ $student->name }}</td>
                        <td class="px-4 py-2 border">
                            @if($student->status == 'Present')
                            {{ \Carbon\Carbon::parse($student->time_in)->format('h:i A') }}
                            @else
                            N/A
                            @endif
                        </td>
                        <td class="px-4 py-2 border">
                            @if($student->status == 'Present')
                            <span class="text-green-600 font-semibold">Present</span>
                            @else
                            <span class="text-red-600 font-semibold">Absent</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border">
                            @if($student->status == 'Absent')
                            <!-- Show action button to manually set attendance -->
                            <button
                                class="px-4 py-2 bg-blue-500 text-white rounded mark-present-btn"
                                data-student-id="{{ $student->id }}"
                                data-subject-id="{{ $subject->id }}">
                                Set present
                            </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/qrcode.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const qrcode = new QRCode(document.querySelector('#qr_generate'), {
            width: 400,
            height: 400,
        });

        // Retrieve the QR code data from the server or from localStorage if it exists
        let qrData = localStorage.getItem('qrData');

        if (!qrData) {
            // If no QR data is stored, get it from the server
            qrData = @json($data);
            localStorage.setItem('qrData', qrData);
            Swal.fire({
                title: 'Success',
                text: 'QR Code generated successfully!',
                icon: 'success',
            });
        } else {
            // If QR data exists in localStorage, parse it
            console.log('QR data loaded from localStorage');
        }

        const parsedData = JSON.parse(qrData);
        const {
            subject_id,
            teacher_id,
            grade_handle_id
        } = parsedData;
        const expirationTime = parsedData.expiration;

        // Generate QR code
        qrcode.makeCode(window.btoa(qrData));

        // Update present and absent count
        setInterval(() => {
            fetch('{{ route("getPresentCount") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        subject_id,
                        teacher_id,
                        grade_handle_id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('present').textContent = data.count;
                })
                .catch(err => console.error(err));

            fetch('{{ route("getAbsentCount") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        teacher_id,
                        grade_handle_id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('absent').textContent = data.count;
                })
                .catch(err => console.error(err));
        }, 5000);

        // Countdown Timer
        const countdownElement = document.createElement('div');
        countdownElement.classList.add('text-green-600', 'p-2', 'text-center');
        document.querySelector('#qr_generate').appendChild(countdownElement);

        function updateCountdown() {
            const now = Math.floor(Date.now() / 1000);
            const timeLeft = expirationTime - now;

            if (timeLeft <= 0) {
                countdownElement.textContent = 'QR Code has expired!';
                countdownElement.classList.replace('text-green-600', 'text-rose-600');
                Swal.fire({
                    title: 'Expired',
                    text: 'The QR code has expired.',
                    icon: 'error',
                });
                clearInterval(interval);
                localStorage.removeItem('qrData'); // Clear localStorage when expired
                return;
            }

            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            countdownElement.textContent = `Expires in: ${minutes} minute(s) and ${seconds < 10 ? '0' : ''}${seconds} second(s)`;
        }

        updateCountdown();
        const interval = setInterval(updateCountdown, 1000);

        // Mark Present button action
        document.querySelectorAll('.mark-present-btn').forEach(button => {
            button.addEventListener('click', function() {
                const studentId = this.getAttribute('data-student-id');
                const subjectId = this.getAttribute('data-subject-id');

                Swal.fire({
                    title: 'Set as Present?',
                    text: "Are you sure you want to mark this student as present?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, set as present!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('{{ route("markAttendanceManually") }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    student_id: studentId,
                                    subject_id: subjectId
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire('Success!', data.message, 'success').then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error!', data.message || 'There was an issue marking attendance.', 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire('Error!', 'There was an issue marking attendance.', 'error');
                            });
                    }
                });
            });
        });
    });
</script>
@endsection