@extends('teacher.layouts.app')

@section('title', 'Grading')

@section('content')
<div class="p-4 overflow-x-auto">
    <div class="flex gap-3 items-center justify-start">
        <div class="flex items-center justify-start gap-2">
            <span>Region: </span>
            <p class="border p-1 bg-white border-slate-500">
                IV - A
            </p>
        </div>
        <div>
            <div class="flex items-center justify-start gap-2">
                <span>Division: </span>
                <p class="border p-1 bg-white border-slate-500">
                    2nd
                </p>
            </div>
        </div>
    </div>

    <div class="flex gap-3 items-center justify-between mt-2">
        <div class="flex items-center justify-start gap-2">
            <span>School name: </span>
            <p class="border p-1 bg-white border-slate-500">
                Ark Technological Institute Education System Inc
            </p>
        </div>
        <div class="flex items-center justify-start gap-2">
            <span>School ID: </span>
            <p class="border p-1 bg-white border-slate-500">
                405210
            </p>
        </div>

        <div class="flex items-center justify-start gap-2">
            <span>School Year: </span>
            <select name="school_year p-1" id="school_year">
                <option value="2023-2024">2023-2024</option>
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
                Grade & Section:
            </td>
            <td class="border p-2" colspan="13">
                Teacher:
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
                <td id="highest_possible_score" data-cell-number="{{ $i }}" class="border p-1 cursor-pointer" contenteditable="true"></td>
                @endfor
                <td class="border p-2"></td>
                <td class="border p-1 cursor-pointer" contenteditable="true">100.00</td>
                <td class="border p-1 cursor-pointer" contenteditable="true">25%</td>

                @for ($i = 1; $i <= 10; $i++)
                    <td class="border p-1 cursor-pointer" contenteditable="true">
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
    <button type="button" class="px-5 py-3 bg-slate-200 text-black rounded border">Cancel</button>

    <button type="submit" class="px-5 py-3 bg-fuchsia-800 text-white rounded">Save changes</button>
</div>



<script>
    $(() => {
        // Select all contenteditable cells for highest possible score
        let highestScoreCells = $('td#highest_possible_score');

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



        window.addEventListener('beforeunload', function(event) {
            // Display a confirmation dialog
            event.preventDefault(); 
            event.returnValue = 'Are you sure to leave the page?';
        });

    });
</script>




@endsection