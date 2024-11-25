@extends('teacher.layouts.app')
@section('title', 'Report Card Back')
@section('content')
<style>
    body {
        font-size: 0.85rem;
        background-color: white;
    }

    h1,
    h2,
    h3 {
        font-size: 1rem;
    }

    .p-8 {
        padding: 1rem;
    }

    table {
        font-size: 0.75rem;
    }

    th,
    td {
        padding: 0.5rem;
    }

    .space-y-4>* {
        margin-bottom: 0.5rem;
    }

    @media print {
        #report_card {
            width: 100%;
            height: auto;
            position: absolute;
            background-color: white;
            font-size: 0.75rem;
            top: 0;
            left: 0;
            z-index: 200;
        }

        .border {
            border-color: black !important;
        }
    }
</style>

<div class=" mx-auto p-8 bg-white overflow-auto">
    <div class="flex my-3 gap-3">
        <button onclick="window.print()" class="px-5 py-1 bg-blue-800 text-white rounded">Print Report Card</button>
        |
        <a href="{{ route('teacher.report_card_front', $student->id) }}?id={{request()->query('id')}}" class="px-5 py-1 bg-green-800 text-white rounded">Front page</a>
        <a href="{{ route('teacher.report_card_back', $student->id) }}?id={{request()->query('id')}}" class="px-5 py-1 bg-purple-800 text-white rounded">Back page</a>
    </div>
    <div class="mx-auto p-8 bg-white border" id="report_card">
        <!-- 1ST SEMESTER -->
        <div class="mb-8">
            <h3 class="font-bold mb-4">1ST SEMESTER</h3>
            <table class="w-full border-collapse border border-gray-400 mb-8">
                <thead>
                    <tr>
                        <th rowspan="1" class="border border-gray-400 p-2 w-1/2">Subjects</th>
                        <th colspan="2" class="border border-gray-400 p-2 text-center">Quarter</th>
                        <th rowspan="1" class="border border-gray-400 p-2">Semester Final Grade</th>
                    </tr>
                    <tr>
                        <th class="border border-gray-400 p-2"></th>
                        <th class="border border-gray-400 p-2 w-16 text-center">1</th>
                        <th class="border border-gray-400 p-2 w-16 text-center">2</th>
                        <th class="border border-gray-400 p-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-400 p-2">Oral Communication in Context</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">Contemporary Philippine Arts from the Regions</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">General Mathematics</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">Earth and Life Science</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">Understanding Culture, Society and Politics</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">English for Academic and Professional Purposes</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">Empowerment Technologies (E-Tech)</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">ICT for Professional Tracks</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Core Values Section -->
        <div class="mb-8">
            <div class="grid grid-cols-2 gap-4">
                <!-- Left side: Core Values -->
                <table class="w-full border-collapse border border-gray-400">
                    <thead>
                        <tr>
                            <th class="border border-gray-400 p-2">CORE VALUES</th>
                            <th class="border border-gray-400 p-2">BEHAVIORAL STATEMENT</th>
                            <th colspan="4" class="border border-gray-400 p-2 text-center">Quarter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-400 p-2">1. MAKADIYOS</td>
                            <td class="border border-gray-400 p-2 text-sm">
                                Expresses one's spiritual beliefs while respecting spiritual beliefs of others<br>
                                Shows adherence to ethical principles by upholding truth
                            </td>
                            <td class="border border-gray-400 p-2 w-12"></td>
                            <td class="border border-gray-400 p-2 w-12"></td>
                            <td class="border border-gray-400 p-2 w-12"></td>
                            <td class="border border-gray-400 p-2 w-12"></td>
                        </tr>
                        <tr>
                            <td class="border border-gray-400 p-2">2. MAKATAO</td>
                            <td class="border border-gray-400 p-2 text-sm">
                                Is sensitive to individual, social and cultural differences<br>
                                Demonstrates contributions towards solidarity
                            </td>
                            <td class="border border-gray-400 p-2"></td>
                            <td class="border border-gray-400 p-2"></td>
                            <td class="border border-gray-400 p-2"></td>
                            <td class="border border-gray-400 p-2"></td>
                        </tr>
                        <tr>
                            <td class="border border-gray-400 p-2">3. MAKAKALIKASAN</td>
                            <td class="border border-gray-400 p-2 text-sm">
                                Cares for the environment and utilizes resources wisely, judiciously, and economically
                            </td>
                            <td class="border border-gray-400 p-2"></td>
                            <td class="border border-gray-400 p-2"></td>
                            <td class="border border-gray-400 p-2"></td>
                            <td class="border border-gray-400 p-2"></td>
                        </tr>
                        <tr>
                            <td class="border border-gray-400 p-2">4. MAKABANSA</td>
                            <td class="border border-gray-400 p-2 text-sm">
                                Demonstrates pride in being a Filipino; exercises the rights and responsibilities of a Filipino citizen
                            </td>
                            <td class="border border-gray-400 p-2"></td>
                            <td class="border border-gray-400 p-2"></td>
                            <td class="border border-gray-400 p-2"></td>
                            <td class="border border-gray-400 p-2"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 2ND SEMESTER -->
        <div class="mb-8">
            <h3 class="font-bold mb-4">2ND SEMESTER</h3>
            <table class="w-full border-collapse border border-gray-400 mb-8">
                <thead>
                    <tr>
                        <th rowspan="1" class="border border-gray-400 p-2 w-1/2">Subjects</th>
                        <th colspan="2" class="border border-gray-400 p-2 text-center">Quarter</th>
                        <th rowspan="1" class="border border-gray-400 p-2">Semester Final Grade</th>
                    </tr>
                    <tr>
                        <th class="border border-gray-400 p-2"></th>
                        <th class="border border-gray-400 p-2 w-16 text-center">1</th>
                        <th class="border border-gray-400 p-2 w-16 text-center">2</th>
                        <th class="border border-gray-400 p-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-400 p-2">Reading and Writing Skills</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">Pagsulat ng Pananaliksik (Sa Ibang Talaga Titigi sa Panitikan)</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">21st Century Literature from the Philippines and the World</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">Statistics and Probability</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">Personal Development/Pansariling Kaunlaran</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">Inquiries sa Filipino sa Mling Larangan (Academic)</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">Introduction to World Religions and Belief Systems</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">Disciplines and Ideas in the Social Sciences</td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                        <td class="border border-gray-400 p-2"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer Legends -->
        <div class="grid grid-cols-3 gap-8">
            <!-- Markings -->
            <div>
                <h4 class="font-bold mb-2">Markings</h4>
                <div class="space-y-1 text-sm">
                    <div>AO - Always Observed</div>
                    <div>SO - Sometimes Observed</div>
                    <div>RO - Rarely Observed</div>
                    <div>NO - Not Observed</div>
                </div>
            </div>

            <!-- Observed Values -->
            <div>
                <h4 class="font-bold mb-2">Observed Values</h4>
                <div class="space-y-1 text-sm">
                    <div>Non-Numerical</div>
                    <div>Always Observed</div>
                    <div>Sometimes Observed</div>
                    <div>Rarely Observed</div>
                    <div>Not Observed</div>
                </div>
            </div>

            <!-- Grading Scale -->
            <div>
                <h4 class="font-bold mb-2">Learners Progress and Achievement</h4>
                <div class="grid grid-cols-3 gap-4 text-sm">
                    <div>Descriptors</div>
                    <div>Grading Scale</div>
                    <div>Remarks</div>
                </div>
                <div class="space-y-1 text-sm">
                    <div class="grid grid-cols-3 gap-4">
                        <div></div>
                        <div>85 - 89</div>
                        <div></div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div></div>
                        <div>80 - 84</div>
                        <div></div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div></div>
                        <div>75 - 79</div>
                        <div></div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div></div>
                        <div>Below 75</div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection