@extends('layouts.app')
<?
//예약된 시간 삭제하는건 테이블로 따로 만들어서 삭제만들기. 추후에
?>
@section('content')
<div class="container mx-auto mt-8">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('admin.index') }}" method="GET">
        <div class="flex justify-end space-x-2">
            <input type="text" name="email" placeholder="Email 검색" value="{{ request('email') }}" class="border-gray-300 border-2 px-3 py-2">
            <button type="submit" class="bg-gray-500 text-white font-bold uppercase text-sm px-6 py-2 rounded shadow hover:bg-gray-700 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                검색
            </button>
        </div>
    </form>


    <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr>
                <td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">예약번호</th>
                <td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                <td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">예약일</th>
                <td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">예약시간</th>
                <td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">예약상태</th>
                <td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">처리</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <form id="status-update-{{ $reservation->no }}" action="{{ route('reservations.updateStatus', $reservation->no) }}" method="POST">
                        @csrf
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $reservation->no }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $reservation->email }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $reservation->request_date }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $reservation->request_time }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <select name="status">
                                <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="denied" {{ $reservation->status == 'denied' ? 'selected' : '' }}>Denied</option>
                            </select>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <button type="submit" class="bg-yellow-500 text-white font-bold uppercase text-sm px-6 py-2 rounded shadow hover:bg-yellow-700 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                                수정
                            </button>
                        </td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $reservations->links() }}
    </div>
</div>
<div class="container mx-auto mt-8">
    <div class="calendar-container">
        <button class="prev"><</button> <!-- Left arrow -->
        <span class="current-month-year"></span>
        <button class="next">></button> <!-- Right arrow -->
        <table class="calendar">
            <thead>
                <tr>
                    <th>S</th>
                    <th>M</th>
                    <th>T</th>
                    <th>W</th>
                    <th>T</th>
                    <th>F</th>
                    <th>S</th>
                </tr>
            </thead>
            <tbody>
                <!-- Calendar dates will be filled here -->
            </tbody>
        </table>
    </div>
    <form action="{{ route('reservations.adminStore') }}" method="POST">
        @csrf
        <input type="hidden" name="request_date"/>
        <input type="hidden" name="request_times" />
        <div id="time-slots" class="grid grid-cols-3 gap-4 mt-4">
            <!-- Time slots will be dynamically generated here -->
        </div>
        <button type="submit" class="w-full py-3 px-4 bg-yellow-400 text-white font-bold rounded hover:bg-yellow-500">등록하기</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarBody = document.querySelector('.calendar tbody');
    const currentMonthYear = document.querySelector('.current-month-year');
    let currentDate = new Date();
    let lastSelected = null;  // 마지막으로 선택된 날짜 셀을 추적하기 위한 변수
    const timeSlotsContainer = document.getElementById('time-slots');
    const selectedTimesInput = document.createElement('input');
    selectedTimesInput.type = 'hidden';
    selectedTimesInput.name = 'selected_times';
    document.forms[0].appendChild(selectedTimesInput);
    const months = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"];

    function generateCalendar(date) {
        calendarBody.innerHTML = '';
        currentMonthYear.textContent = `${months[date.getMonth()]} ${date.getFullYear()}`;

        const firstDay = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
        const daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

        let row = calendarBody.insertRow();
        let count = 0;

        for (let i = 0; i < firstDay; i++) {
            row.insertCell();
            count++;
        }

        for (let day = 1; day <= daysInMonth; day++) {
            if (count % 7 === 0) {
                row = calendarBody.insertRow();
            }
            let cell = row.insertCell();
            cell.textContent = day;
            cell.classList.add('day');
            if (count % 7 !== 1) {
                cell.addEventListener('click', function() {
                    if (lastSelected) {
                        lastSelected.style.backgroundColor = '#fff'; // 이전 선택된 셀의 배경색을 초기화
                        lastSelected.style.color = 'black'; // 이전 선택된 셀의 텍스트 색상을 초기화
                    }
                    this.style.backgroundColor = '#007bff'; // 선택된 셀의 배경색 변경
                    this.style.color = 'white'; // 선택된 셀의 텍스트 색상 변경
                    cell.classList.add('selected');
                    lastSelected = cell;
                    let selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), Number(event.target.textContent)+1);
                    document.querySelector('input[name="request_date"]').value = selectedDate.toISOString().split('T')[0]; // 날짜 선택
                    showTimeSlots(date.getFullYear(), date.getMonth(), day);
                });
            } else {
                cell.classList.add('disabled');
                cell.style.backgroundColor = '#e0e0e0';
                cell.style.color = '#666666';
            }
            count++;
        }
    }

    function showTimeSlots(year, month, day) {
        const times = ['11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30'];
        timeSlotsContainer.innerHTML = ''; // Clear previous slots

        // Fetch reserved times from backend
        fetch(`/get-reserved-times?date=${year}-${month + 1}-${day}`)
        .then(response => response.json())
        .then(reservedTimes => {
            times.forEach(time => {
                let timeButton = document.createElement('button');
                timeButton.textContent = time;
                timeButton.className = 'time-slot-button';

                // Disable button if the time is reserved
                if (reservedTimes.includes(time + ":00")) {
                    timeButton.disabled = true;
                    timeButton.classList.add('disabled');
                } else {
                    // Add event listener for time selection
                    timeButton.addEventListener('click', function(event) {
                        event.preventDefault(); // submit 방지

                        if (this.classList.contains('selected')) {
                            this.classList.remove('selected');
                            this.style.backgroundColor = ''; // Reset color
                            this.style.color = '';
                        } else {
                            this.classList.add('selected');
                            this.style.backgroundColor = '#007bff'; // Set selected color
                            this.style.color = 'white';
                        }
                        updateSelectedTimes();
                    });
                }
                timeSlotsContainer.appendChild(timeButton); // Append button to container
            });
        });
    }

    function updateSelectedTimes() {
        const selectedButtons = document.querySelectorAll('.time-slot-button.selected');
        const selectedTimes = Array.from(selectedButtons).map(btn => btn.innerText);
        selectedTimesInput.value = selectedTimes.join(', ');
        document.querySelector('input[name="request_times"]').value = selectedTimesInput.value
    }

    document.querySelector('.prev').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        generateCalendar(currentDate);
    });

    document.querySelector('.next').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        generateCalendar(currentDate);
    });

    generateCalendar(currentDate);
});

</script>

<style>
.calendar-container {
    text-align: center;
    font-family: 'Arial', sans-serif;
    margin: auto;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    padding: 20px;
}

.calendar {
    width: 100%;
    border-collapse: collapse; /* Ensures the table cells are tightly packed */
}

.calendar th, .calendar td {
    padding: 10px;
    border-radius: 4px; /* Rounded corners for each cell */
}

.calendar th {
    color: black;
    border: 1px solid #ccc; /* Light border for each cell */
}

.calendar td {
    cursor: pointer;
    border: 1px solid #ccc; /* Light border for each cell */
}

.calendar td:hover {
    background-color: #e8e8e8; /* Light grey background on hover */
}

.calendar td.active:hover {
    background-color: #007bff; /* Blue background for active (selected) cells */
    color: white; /* White text for readability */
}

.prev, .next {
    font-size: 20px;
    cursor: pointer;
    padding: 20px;
}

.current-month-year {
    font-size: 18px;
    margin: 10px 0;
    color: #333;
}

.time-slot-button {
    padding: 8px 16px;
    margin: 5px;
    background-color: #f8f8f8; /* Light grey background for buttons */
    border: 1px solid #ccc;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.time-slot-button:hover {
    background-color: #e0e0e0; /* Darker grey on hover */
}

.time-slot-button.disabled {
    background-color: #ccc; /* Greyed out for disabled buttons */
    color: #666;
    cursor: not-allowed; /* Indicates the button is not clickable */
}

</style>
@endsection
