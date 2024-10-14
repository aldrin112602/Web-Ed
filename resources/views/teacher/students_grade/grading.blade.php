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
<script>
    $(document).ready(function() {
        var t = new URLSearchParams(location.search);
        $('[data-for="written_work"], [data-for="performance_task"]').on("input", function() {
            var t = $(this).data("cell"),
                e = parseFloat($('#highest_possible_score[data-cell-number="' + t + '"]').text());
            parseFloat($(this).text()) > e && (alert("Score cannot be higher than the highest possible score (" + e + ")"), $(this).text(""))
        }), $("#submitBtn").click(function() {
            let e = {},
                s = !0,
                r = !0;
            for (let a = 1; a <= 10; a++) {
                let i = $(`td[data-id_written="${a}"]`).text().trim();
                e["highest_possible_written_" + a] = i, ("" === i || isNaN(i)) && (s = !1, r = !1)
            }
            for (let n = 1; n <= 10; n++) {
                let o = $(`td[data-id_task="${n}"]`).text().trim();
                e["highest_possible_task_" + n] = o, ("" === o || isNaN(o)) && (s = !1, r = !1)
            }
            if (!s) {
                alert("All fields in highest possible scores are required.");
                return
            }
            if (!r) {
                alert("Please enter valid numbers in all fields.");
                return
            }
            var d = [];
            $("tr").each(function() {
                var e = $(this).find("td[data-user-id]").data("user-id");
                if (e) {
                    var s = {
                        student_id: e,
                        grade: t.get("grade") || null,
                        strand: t.get("strand") || null,
                        section: t.get("section") || null,
                        written_scores: {},
                        task_scores: {}
                    };
                    $(this).find('td[data-for="written_work"]').each(function() {
                        var t = $(this).data("cell");
                        s.written_scores["written_" + t] = parseFloat($(this).text()) || null
                    }), $(this).find('td[data-for="performance_task"]').each(function() {
                        var t = $(this).data("cell");
                        s.task_scores["task_" + t] = parseFloat($(this).text()) || null
                    }), d.push(s)
                }
            }), $.ajax({
                url: '{{ route("teacher.addHighestPossibleScore") }}',
                type: "POST",
                data: JSON.stringify({
                    ...e,
                    studentScores: d
                }),
                contentType: "application/json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                success: function(t) {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: "Changes saved successfully!"
                    }), console.log("Success:", t)
                },
                error: function(t) {
                    console.error("Error:", t), Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: "There was a problem saving the changes. Please try again."
                    })
                }
            })
        }), $("td#highest_possible_score, td#performance_task_highest_possible_score").each(function() {
            $(this).on("blur", function(t) {
                var e;
                let s, r;
                e = this, r = parseInt(s = $(e).text().trim()), s && (isNaN(r) || r < 5 || r > 10 ? (alert("The highest possible score must be between 5 and 10."), $(e).text("").addClass("border border-red-500").focus()) : $(e).removeClass("border-red-500"))
            })
        });
        let e = [];
        $('td[contenteditable="true"]').each((t, s) => {
            s.hasAttribute("data-user-id") && e.push(s)
        }), e.forEach(t => {
            t.addEventListener("input", function(t) {
                (function t(e) {
                    let s = e.getAttribute("data-user-id"),
                        r = e.getAttribute("data-for"),
                        a = 0,
                        i = 0;
                    $(`td[data-user-id="${s}"][data-for="${r}"]`).each((t, e) => {
                        a += parseInt(e.textContent) || 0
                    });
                    $(e).closest("tr").find(`td[data-for="${r}_total"]`).text(a);
                    i = parseInt($(`tr:contains('Highest Possible Score') td[data-for="${r}"]`).eq(0).text()) || 0;
                    let n = "",
                        o = "";
                    0 !== a && 0 !== i && (o = (.25 * (n = (a / i * 100).toFixed(2))).toFixed(2));
                    $(e).closest("tr").find(`td[data-for="${r}_ps"]`).text(n);
                    $(e).closest("tr").find(`td[data-for="${r}_ws"]`).text(o)
                })(this)
            })
        }), window.addEventListener("beforeunload", function(t) {})
    });
</script>




@endsection