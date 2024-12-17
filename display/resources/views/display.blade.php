@extends('layout.main')

@section('content')
<div class="container mx-auto py-8" x-data="scheduleData()">
    <!-- Page Title -->
    <div class="text-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">PEMBELAJARAN AKTI</h2>
        <h3 class="text-xl text-blue-600">TAHUN 2024/2025</h3>
    </div>

    <!-- Date and Time Card -->
    <div class="bg-white shadow-md rounded-lg p-4 mb-8 max-w-md mx-auto">
        <div class="flex justify-center items-center space-x-4">
            <div id="date" class="text-xl font-medium text-gray-700"></div>
            <span class="text-xl font-bold text-red-600">/</span>
            <div id="time" class="text-xl font-medium text-gray-700"></div>
        </div>
    </div>

    <!-- Weekly Schedule Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <template x-for="schedule in schedules" :key="schedule.id">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105">
                <div class="h-40 bg-gray-100">
                    <img :src="schedule.class_photo" alt="Class Photo" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-red-700" x-text="schedule.group_name"></h3>
                    <p class="text-sm text-gray-600" x-text="schedule.course_name"></p>
                    <div class="flex items-center mt-4">
                        <img :src="schedule.lecturer_photo" alt="Lecturer Photo" class="h-10 w-10 rounded-full border border-gray-200 object-cover mr-3">
                        <div>
                            <p class="text-sm font-medium text-gray-700" x-text="schedule.lecturer_name"></p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">DOJO: <span x-text="schedule.class_name"></span></p>
                </div>
            </div>
        </template>
    </div>
</div>

<script>
    function scheduleData() {
        return {
            schedules: @json($schedules), // Passing data from controller to Alpine.js
            async fetchSchedules() {
                try {
                    const response = await fetch('/api/schedules');
                    if (response.ok) {
                        this.schedules = await response.json();
                    } else {
                        console.error('Failed to fetch schedules');
                    }
                } catch (error) {
                    console.error('Error fetching schedules:', error);
                }
            },
            init() {
                this.updateDateTime();
                setInterval(this.updateDateTime, 1000);
            },
            updateDateTime() {
                const now = new Date();
                const optionsDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                const optionsTime = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };

                document.getElementById('date').innerText = now.toLocaleDateString('id-ID', optionsDate);
                document.getElementById('time').innerText = now.toLocaleTimeString('id-ID', optionsTime);
            },
        };
    }
</script>
@endsection
