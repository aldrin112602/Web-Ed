@extends('teacher.layouts.app')

@section('title', 'Grading')

@section('content')
<div class="p-4 overflow-x-auto">
    <div class="flex gap-3 items-center justify-start">
        <div class="flex items-center justify-start gap-2">
            <span>Region: </span>
            <p class="border p-1 bg-white border-slate-500">
                {{ $gradingHeaders->region ?? 'IV - A' }}
            </p>
        </div>
        <div>
            <div class="flex items-center justify-start gap-2">
                <span>Division: </span>
                <p class="border p-1 bg-white border-slate-500">
                    {{ $gradingHeaders->division ?? '2nd' }}
                </p>
            </div>
        </div>
    </div>

    <div class="flex gap-3 items-center justify-between mt-2">
        <div class="flex items-center justify-start gap-2">
            <span>School name: </span>
            <p class="border p-1 bg-white border-slate-500">
                {{ $gradingHeaders->school_name ?? 'Ark Technological Institute Education System Inc' }}
            </p>
        </div>
        <div class="flex items-center justify-start gap-2">
            <span>School ID: </span>
            <p class="border p-1 bg-white border-slate-500">
                {{ $gradingHeaders->school_id ?? '405210' }}
            </p>
        </div>

        <div class="flex items-center justify-start gap-2">
            <span>School Year: </span>
            <select name="school_year p-1" id="school_year">
                <option value="{{ $gradingHeaders->year ?? '2023-2024' }}">{{ $gradingHeaders->year ?? '2023-2024' }}</option>
            </select>
        </div>
    </div>

    <!-- table -->
    <table class="w-full bg-white mt-4">
        <tr class="border">
            <td class="border p-2" rowspan="3">
                <select name="quarter" id="quarter" class="border-0 p-0 px-10">
                    <option value="First Quarter">First Quarter</option>
                    <option value="Second Quarter">Second Quarter</option>
                </select>
            </td>
            <td class="border p-2" colspan="13">
                Grade, Strand & Section:
                <div class="inline">
                    <div class="flex items-center justify-start">
                        <select class="py-1 text-sm" name="grade" id="grade">
                            <option value="" disabled class="hidden" selected>-- Grade --</option>
                            @foreach($grades as $grade)
                            <option value="{{ $grade }}" {{ request('grade') == $grade ? 'selected' : '' }}>
                                Grade {{ $grade }}
                            </option>
                            @endforeach
                        </select>


                        <select class="py-1 text-sm" name="strand" id="strand">
                            <option value="" disabled class="hidden" selected>-- Strand --</option>
                            @foreach($strands as $strand)
                            <option value="{{ $strand }}" {{ request('strand') == $strand ? 'selected' : '' }}>
                                {{ $strand }}
                            </option>
                            @endforeach
                        </select>

                        <select class="py-1 text-sm" name="section" id="section">
                            <option value="" disabled class="hidden" selected>-- Section --</option>
                            @foreach($sections as $section)
                            <option value="{{ $section }}" {{ request('section') == $section ? 'selected' : '' }}>
                                {{ $section }}
                            </option>
                            @endforeach
                        </select>

                    </div>

                </div>

                <script>
                    $(document).ready(function() {
                        function updateQueryString(param, value, resetSection = false) {
                            var currentUrl = new URL(window.location.href);
                            if (resetSection) {
                                currentUrl.searchParams.delete('section');
                            }
                            if (value) {
                                currentUrl.searchParams.set(param, value);
                            } else {
                                currentUrl.searchParams.delete(param);
                            }
                            window.location.href = currentUrl.href;
                        }

                        $('#grade').on('change', function() {
                            var gradeValue = $(this).val();
                            updateQueryString('grade', gradeValue);
                        });

                        $('#strand').on('change', function() {
                            var strandValue = $(this).val();
                            updateQueryString('strand', strandValue, true);
                        });

                        $('#section').on('change', function() {
                            var sectionValue = $(this).val();
                            updateQueryString('section', sectionValue);
                        });
                    });
                </script>

            </td>
            <td class="border p-2" colspan="13">
                Teacher: <p class="border p-1 bg-white border-slate-500 inline">
                    {{ $user->name }}
                </p>
            </td>
            <td class="border p-2" colspan="3" rowspan="3">
                Quarterly Assessment
            </td>
            <td class="border p-2" rowspan="4">
                Initial Grade
            </td>
            <td class="border p-2" rowspan="4">
                Quarterly Grade
            </td>
        </tr>

        <tr class="border">
            <td class="border p-2" colspan="13">WRITTEN WORK</td>
            <td class="border p-2" colspan="13">PERFORMANCE TASK</td>
        </tr>

        <tr class="border">
            <td class="border p-2" colspan="26"></td>
        </tr>

        <tr class="border">
            <td class="border p-2">Learner's Name</td>
            @for ($i = 1; $i <= 10; $i++)
                <td class="border p-2">{{ $i }}</td>
                @endfor
                <td class="border p-2">Total</td>
                <td class="border p-2">PS</td>
                <td class="border p-2">WS</td>

                @for ($i = 1; $i <= 10; $i++)
                    <td class="border p-2">{{ $i }}</td>
                    @endfor
                    <td class="border p-2">Total</td>
                    <td class="border p-2">PS</td>
                    <td class="border p-2">WS</td>
                    <td class="border p-2">1</td>
                    <td class="border p-2">PS</td>
                    <td class="border p-2">WS</td>
        </tr>

        <tr class="border">
            <td class="border p-2 bg-slate-50 text-sm">Highest Possible Score</td>
            @for ($i = 1; $i <= 10; $i++)
                <!-- Min: 5, highest: 10 -->
                <td data-id_written="{{ $i }}" id="highest_possible_score" data-cell-number="{{ $i }}" class="border p-1 cursor-pointer" contenteditable="true">
                    {{ $highestPossibleScores['highest_possible_written_' . $i] ?? '' }}
                </td>
                @endfor
                <td class="border p-2"></td>
                <td class="border p-1 cursor-pointer" contenteditable="true">100.00</td>
                <td class="border p-1 cursor-pointer" contenteditable="true">25%</td>

                @for ($i = 1; $i <= 10; $i++)
                    <!-- Min: 5, highest: 10 -->
                    <td data-id_task="{{ $i }}" id="performance_task_highest_possible_score" data-cell-number="{{ $i }}" class="border p-1 cursor-pointer" contenteditable="true">
                        {{ $highestPossibleScores['highest_possible_task_' . $i] ?? '' }}
                    </td>
                    @endfor


                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-1 cursor-pointer" contenteditable="true">
                    </td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
        </tr>


        <tr class="border">
            <td class="border p-2 bg-slate-100">Male</td>
            @for ($j=0; $j < 31; $j++)
                <td class="border p-2 py-4">
                </td>
                @endfor
        </tr>
        @foreach ($allMaleStudents as $student)
        <tr>
            <td class="border p-2">
                {{ $student->account->name }}
            </td>

            @for ($i = 1; $i <= 10; $i++)
                <td data-for="written_work" data-cell="{{ $i }}" data-user-id="{{ $student->account->id }}" class="border p-1 cursor-pointer" contenteditable="true">
                </td>
                @endfor

                <td class="border p-2" data-for="written_work_total"></td>
                <td class="border p-2" data-for="written_work_ps"></td>
                <td class="border p-2" data-for="written_work_ws"></td>


                @for ($i = 1; $i <= 10; $i++)


                    <td data-for="performance_task" data-cell="{{ $i }}" data-user-id="{{ $student->account->id }}" class="border p-1 cursor-pointer" contenteditable="true">
                    </td>
                    @endfor

                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>

                    <td class="border p-1 cursor-pointer" contenteditable="true">
                    </td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
        </tr>
        @endforeach
        <!-- per row -->
        @for ($i = 0; $i < 3; $i++)
            <!-- per cell -->
            <tr>
                @for ($j=0; $j < 32; $j++)
                    <td class="border p-2 py-4">
                    </td>
                    @endfor
            </tr>
            @endfor




            <!-- female -->
            <tr class="border">
                <td class="border p-2 bg-slate-100">Female</td>
                @for ($j=0; $j < 31; $j++)
                    <td class="border p-2 py-4">
                    </td>
                    @endfor
            </tr>
            @foreach ($allFemaleStudents as $student)
            <tr>
                <td class="border p-2">
                    {{ $student->account->name }}
                </td>

                @for ($i = 1; $i <= 10; $i++)
                    <td data-for="written_work" data-cell="{{ $i }}" data-user-id="{{ $student->account->id }}" class="border p-1 cursor-pointer" contenteditable="true">
                    </td>
                    @endfor

                    <td class="border p-2" data-for="written_work_total"></td>
                    <td class="border p-2" data-for="written_work_ps"></td>
                    <td class="border p-2" data-for="written_work_ws"></td>
                    @for ($i = 1; $i <= 10; $i++)


                        <td data-for="performance_task" data-cell="{{ $i }}" data-user-id="{{ $student->account->id }}" class="border p-1 cursor-pointer" contenteditable="true">
                        </td>
                        @endfor

                        <td class="border p-2"></td>
                        <td class="border p-2"></td>
                        <td class="border p-2"></td>

                        <td class="border p-1 cursor-pointer" contenteditable="true">
                        </td>
                        <td class="border p-2"></td>
                        <td class="border p-2"></td>
                        <td class="border p-2"></td>
                        <td class="border p-2"></td>
            </tr>
            @endforeach
            <!-- per row -->
            @for ($i = 0; $i < 3; $i++)
                <!-- per cell -->
                <tr>
                    @for ($j=0; $j < 32; $j++)
                        <td class="border p-2 py-4">
                        </td>
                        @endfor
                </tr>
                @endfor

    </table>
    <!-- table -->
</div>

<div class="flex items-center justify-end p-5 gap-3">

    <button id="submitBtn" type="submit" class="px-5 py-3 bg-blue-800 text-white rounded">Save changes</button>
</div>

<!-- submit function -->
<script>
    $(document).ready(function() {

    // Handle input event on the student's score cells
    $('[data-for="written_work"], [data-for="performance_task"]').on('input', function() {
            // Get the data-cell attribute to find the corresponding highest possible score
            var cellNumber = $(this).data('cell');
            
            // Get the highest possible score for this column
            var highestPossibleScore = parseFloat($('#highest_possible_score[data-cell-number="' + cellNumber + '"]').text());

            // Get the current input value
            var currentScore = parseFloat($(this).text());

            // Validate if the score exceeds the highest possible score
            if (currentScore > highestPossibleScore) {
                alert('Score cannot be higher than the highest possible score (' + highestPossibleScore + ')');
                // Reset the value if it's greater than the allowed maximum
                $(this).text('');
            }
        });
        
        $('#submitBtn').click(function() {
            let formData = {};
            let allFilled = true;
            let allNumbers = true;

            for (let i = 1; i <= 10; i++) {
                let writtenScore = $(`td[data-id_written="${i}"]`).text().trim();
                formData['highest_possible_written_' + i] = writtenScore;

                if (writtenScore === "" || isNaN(writtenScore)) {
                    allFilled = false;
                    allNumbers = false;
                }
            }
            for (let i = 1; i <= 10; i++) {
                let taskScore = $(`td[data-id_task="${i}"]`).text().trim();
                formData['highest_possible_task_' + i] = taskScore;
                if (taskScore === "" || isNaN(taskScore)) {
                    allFilled = false;
                    allNumbers = false;
                }
            }

            if (!allFilled) {
                alert("All fields in highest possible scores are required.");
                return;
            }

            if (!allNumbers) {
                alert("Please enter valid numbers in all fields.");
                return;
            }

            $.ajax({
                url: '{{ route("teacher.addHighestPossibleScore") }}',
                type: 'POST',
                data: JSON.stringify(formData),
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Changes saved successfully!',
                    })
                    console.log('Success:', response);
                },
                error: function(error) {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'There was a problem saving the changes. Please try again.',
                    });
                }
            });
        });

    });
</script>
<!-- end submit function -->



<script>
    $(() => {
        // Select all contenteditable cells for highest possible score
        let highestScoreCells = $('td#highest_possible_score, td#performance_task_highest_possible_score');

        // Add input event listeners to each cell for validation
        highestScoreCells.each(function() {
            $(this).on('blur', function(e) {
                validateHighestScore(this);
            });
        });

        // Validate input for highest possible score (Min: 5, Max: 10)
        function validateHighestScore(cell) {
            let inputValue = $(cell).text().trim();
            let value = parseInt(inputValue);


            if (!inputValue) return;



            // Check if the value is a valid number between 5 and 10
            if (isNaN(value) || value < 5 || value > 10) {
                alert('The highest possible score must be between 5 and 10.');
                $(cell).text('').addClass('border border-red-500').focus()
            } else {
                // Remove the border if the input is valid
                $(cell).removeClass('border-red-500');
            }


        }

        // The rest of your code for handling calculations
        let inputCells = [];
        $('td[contenteditable="true"]').each((i, td) => {
            if (td.hasAttribute('data-user-id')) inputCells.push(td);
        });

        inputCells.forEach(td => {
            td.addEventListener('input', function(e) {
                calculateTotalsAndScores(this);
            });
        });

        function calculateTotalsAndScores(cell) {
            const userId = cell.getAttribute('data-user-id');
            const scoreType = cell.getAttribute('data-for');

            let total = 0;
            let highestScore = 0;

            $(`td[data-user-id="${userId}"][data-for="${scoreType}"]`).each((i, td) => {
                const cellValue = parseInt(td.textContent) || 0;
                total += cellValue;
            });

            const totalCell = $(cell).closest('tr').find(`td[data-for="${scoreType}_total"]`);
            totalCell.text(total);

            const highestScoreCell = $(`tr:contains('Highest Possible Score') td[data-for="${scoreType}"]`).eq(0);
            highestScore = parseInt(highestScoreCell.text()) || 0;

            let percentageScore = "";
            let weightedScore = "";

            if (total !== 0 && highestScore !== 0) {
                percentageScore = (total / highestScore * 100).toFixed(2);
                weightedScore = (percentageScore * 0.25).toFixed(2);
            }

            const psCell = $(cell).closest('tr').find(`td[data-for="${scoreType}_ps"]`);
            psCell.text(percentageScore);

            const wsCell = $(cell).closest('tr').find(`td[data-for="${scoreType}_ws"]`);
            wsCell.text(weightedScore);
        }



        // window.addEventListener('beforeunload', function(event) {
        //     // Display a confirmation dialog
        //     event.preventDefault(); 
        //     event.returnValue = 'Are you sure to leave the page?';
        // });

    });
</script>




@endsection