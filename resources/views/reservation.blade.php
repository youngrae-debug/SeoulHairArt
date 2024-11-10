@extends('layouts.app')

@section('title', 'Reservation')

@section('content')

<section id="reservation-info" class="py-20 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">MEUD</h2>
        <div class="location-info mb-8">
            <p class="text-lg font-semibold">Room 301, How Building, 22 Gangnam-daero 162-gil, Gangnam-gu, Seoul</p>
        </div>
        <div class="contact-info">
            <p class="text-xl">TEL : <span class="font-bold">02-545-3655</span></p>
        </div>
    </div>
    <div class="designer-info text-center mt-8 mb-8">
        <img src="https://images.pexels.com/photos/27913669/pexels-photo-27913669.jpeg?auto=compress&cs=tinysrgb&w=300&lazy=load" alt="Designer" style="display: block; margin: auto; max-width: 100%; height: auto;">
        <h3 class="text-xl font-bold mt-4">Designer Taeyull</h3>
    </div>
    
    <div class="container mx-auto max-w-xl mt-10">
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
                </tbody>
            </table>
        </div>
        <form action="{{ route('reservations.store') }}" method="POST" class="space-y-4">
        <input type="hidden" name="request_date" />
        <input type="hidden" name="request_time" />
            @csrf
            <div>
                <input type="text" name="email" id="email" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="e-mail" required>
            </div>
            <div>
                <select name="service" id="service" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select</option>
                    <option value="cut">Cut</option>
                    <option value="color">Color</option>
                    <option value="perm">Perm</option>
                </select>
            </div>
            <div id="time-slots" class="grid grid-cols-3 gap-4 mt-4"></div>
            <button type="submit" class="w-full py-3 px-4 bg-yellow-400 text-white font-bold rounded hover:bg-yellow-500">예약하기</button>
        </form>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarBody = document.querySelector('.calendar tbody');
    const currentMonthYear = document.querySelector('.current-month-year');
    let currentDate = new Date();
    let lastSelected = null;  // 마지막으로 선택된 날짜 셀을 추적하기 위한 변수
    const timeSlotsContainer = document.getElementById('time-slots');
    const months = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"];

    function generateCalendar(date) {
        calendarBody.innerHTML = '';
        currentMonthYear.textContent = `${months[date.getMonth()]} ${date.getFullYear()}`;

        const firstDay = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
        const daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

        let row = calendarBody.insertRow();
        let count = 0;

        // 첫 주 시작 전 빈 칸 채우기
        for (let i = 0; i < firstDay; i++) {
            row.insertCell();
            count++;
        }

        // 날짜 채우기
        for (let day = 1; day <= daysInMonth; day++) {
            if (count % 7 === 0) {
                row = calendarBody.insertRow();
            }
            let cell = row.insertCell();
            cell.textContent = day;
            if ((count % 7) === 1) {  // 월요일 처리
                cell.classList.add('disabled'); // 'disabled' 클래스 추가
                cell.style.backgroundColor = '#e0e0e0'; // 회색 배경
                cell.style.color = '#666666'; // 짙은 회색 텍스트
            } else {
                cell.classList.add('active');
                cell.addEventListener('click', function() {
                    if (lastSelected) {
                        lastSelected.style.backgroundColor = '#fff'; // 이전 선택된 셀의 배경색을 초기화
                        lastSelected.style.color = 'black'; // 이전 선택된 셀의 텍스트 색상을 초기화
                    }
                    this.style.backgroundColor = '#007bff'; // 선택된 셀의 배경색 변경
                    this.style.color = 'white'; // 선택된 셀의 텍스트 색상 변경
                    lastSelected = this; // 마지막으로 선택된 셀을 업데이트
                    // 선택한 날짜에 대한 시간 슬롯을 표시
                    showTimeSlots(date.getFullYear(), date.getMonth(), day);
                });
            }
            count++;
        }
        
        // 마지막 주 빈 칸 채우기
        while (count % 7 !== 0) {
            row.insertCell();
            count++;
        }
    }

    document.querySelector('.prev').addEventListener('click', function() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        generateCalendar(currentDate);
    });

    document.querySelector('.next').addEventListener('click', function() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        generateCalendar(currentDate);
    });

    calendarBody.addEventListener('click', function(event) {
        if (event.target.classList.contains('active')) {
            let selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), Number(event.target.textContent)+1);
            document.querySelector('input[name="request_date"]').value = selectedDate.toISOString().split('T')[0]; // 날짜 선택
        }
    });
    generateCalendar(currentDate);
});

function showTimeSlots(year, month, day) {
    const times = ['11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30'];
    const timeSlotsContainer = document.getElementById('time-slots');
    let lastSelectedTime = null;  // 마지막으로 선택한 시간 버튼 추적
    timeSlotsContainer.innerHTML = ''; // 이전 시간 슬롯 제거

    // 해당 날짜의 예약된 시간을 서버에서 조회
    fetch(`/get-reserved-times?date=${year}-${month + 1}-${day}`)
        .then(response => response.json())
        .then(reservedTimes => {
            times.forEach(time => {
                let timeButton = document.createElement('button');
                timeButton.textContent = time;
                timeButton.className = 'time-slot-button';
                // 예약된 시간이면 버튼 비활성화
                if (reservedTimes.includes(time+":00")) {
                    timeButton.disabled = true;
                    timeButton.classList.add('disabled');
                } else {
                    timeButton.addEventListener('click', function(event) {
                        event.preventDefault(); // submit 방지
                        if (lastSelectedTime) {
                            lastSelectedTime.style.backgroundColor = ''; // 이전 선택한 버튼 초기화
                            lastSelectedTime.style.color = '';
                        }
                        this.style.backgroundColor = '#007bff'; // 선택된 버튼 색상 변경
                        this.style.color = 'white';
                        lastSelectedTime = this; // 마지막으로 선택한 시간 업데이트
                        document.querySelector('input[name="request_time"]').value = `${time}`; // 시간 선택
                    });
                }
                timeSlotsContainer.appendChild(timeButton);
            });
        });
}



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
