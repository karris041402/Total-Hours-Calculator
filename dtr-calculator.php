<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced DTR Total Hours Calculator</title>
    <style>

        input {
            text-transform: uppercase;
        }

        input::placeholder {
            text-transform: none; /* o lowercase kung gusto mo */
        }

        body {
            margin: 0;
            box-sizing: border-box;
            background: linear-gradient(185deg, #ffcdd2, #fff);
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #333;
        }
        
        .header-name {
            text-align: center;
            padding: 20px;
            background: linear-gradient(185deg, white, #ffcdd2);
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            color: #333;
        }
        
        h1 {
            font-size: 2.5rem;
            margin: 10px 0;
        }
        
        h2 {
            font-size: 1.5rem;
            margin: 5px 0;
            font-weight: normal;
        }
        
        .header-nav {
            background: #ffcdd2;
            padding: 10px 0;
        }
        
        .header-nav nav ul {
            display: flex;
            justify-content: center;
            gap: 15px;
            list-style-type: none;
            margin: 0;
            padding: 0;
            flex-wrap: wrap;
        }
        
        nav a {
            text-decoration: none;
            color: #333;
            background: whitesmoke;
            padding: 10px 20px;
            border-radius: 10px;
            text-transform: uppercase;
            font-size: 14px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        nav a:hover {
            box-shadow: 0 3px 8px rgba(0,0,0,0.3);
            transform: translateY(-2px);
        }
        
        .nav-active {
            background: #f48fb1;
            color: white;
        }
        
        .container {
            flex: 1;
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .schedule-section {
            margin-bottom: 20px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 8px;
        }
        
        .schedule-form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            min-width: 150px;
        }
        
        label {
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 14px;
        }
        
        input, select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .dtr-entries {
            margin-top: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        
        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .controls {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }
        
        button {
            padding: 10px 15px;
            background: #f48fb1;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s;
        }
        
        #addDayScheduleBtn{
            margin-top: 20px;
        }

        button:hover {
            background: #f06292;
        }
        
        .secondary-btn {
            background: #9e9e9e;
        }
        
        .secondary-btn:hover {
            background: #757575;
        }
        
        .results {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
        
        .results p {
            margin: 10px 0;
            font-size: 16px;
        }
        
        .total-hours {
            font-size: 18px;
            font-weight: bold;
            color: #e91e63;
        }
        
        .info-text {
            font-size: 14px;
            color: #757575;
            font-style: italic;
        }
        
        /* Toggle content */
        #scheduleContent, #calculatorContent, #viewSAContent, #calendarContent {
            display: none;
        }
        
        .active-content {
            display: block !important;
        }
        
        /* Day Schedule */
        .day-schedule {
            background: #f0f0f0;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }
        
        .day-schedule-controls {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }
        
        /* Search */
        .search-container {
            margin-bottom: 20px;
        }
        
        .search-container input {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        
        /* Calendar */
        .calendar {
            width: 100%;
            margin: 0 auto;
        }
        
        .month-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            background: #f48fb1;
            color: white;
            border-radius: 5px 5px 0 0;
        }
        
        .month-header h3 {
            margin: 0;
            text-align: center;
            flex-grow: 1;
        }
        
        .month-nav {
            padding: 5px 10px;
            cursor: pointer;
            background: none;
            border: none;
            color: white;
            font-size: 16px;
        }
        
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 2px;
            border: 1px solid #ddd;
            border-radius: 0 0 5px 5px;
        }
        
        .calendar-day-header {
            text-align: center;
            padding: 10px;
            background: #f5f5f5;
            font-weight: bold;
        }
        
        .calendar-day {
            min-height: 80px;
            padding: 5px;
            border: 1px solid #eee;
            text-align: right;
            position: relative;
        }
        
        .calendar-day.other-month {
            background: #f9f9f9;
            color: #aaa;
        }
        
        .calendar-day.today {
            background: #e8f5e9;
        }
        
        .calendar-day .date {
            margin-bottom: 5px;
        }
        
        .event {
            font-size: 12px;
            padding: 2px 5px;
            margin-bottom: 2px;
            background: #f48fb1;
            color: white;
            border-radius: 3px;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        @media (max-width: 768px) {
            .header-nav nav ul {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }
            
            .schedule-form {
                flex-direction: column;
            }
            
            .form-group {
                width: 100%;
            }
            
            .container {
                margin: 10px;
                padding: 15px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .calendar-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .calendar-day-header:nth-child(n+4) {
                display: none;
            }
            
            .calendar-day:nth-child(n+22) {
                display: none;
            }
        }

        .sa-select-container {
            position: relative;
            margin-bottom: 15px;
        }
        
        #saSearchInput {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        #saDropdown {
            position: absolute;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            background: white;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 4px 4px;
            z-index: 1000;
            display: none;
        }
        
        .sa-option {
            padding: 8px 10px;
            cursor: pointer;
        }
        
        .sa-option:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
   <div class="header-name">
        <h1>HUMAN RESOURCES MANAGEMENT</h1>
        <h2>DTR Total Hours Calculator</h2>
    </div>
    
    <div class="header-nav">
        <nav>
            <ul>
                <li><a href="#" id="scheduleBtn" class="nav-active">SA Schedule</a></li>
                <li><a href="#" id="calculatorBtn">Total Hours Calculator</a></li>
                <li><a href="#" id="viewSABtn">View SA Information</a></li>
                <li><a href="#" id="calendarBtn">Calendar</a></li>
            </ul>
        </nav>
    </div>
    
    <div class="container">
        <div id="scheduleContent" class="active-content">
            <h3>Student Assistant Schedule Setup</h3>
            <div class="schedule-section">
                <form id="scheduleForm" class="schedule-form">
                    <div class="form-group">
                        <label for="saFirstName">First Name:</label>
                        <input type="text" id="saFirstName" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label for="saLastName">Last Name:</label>
                        <input type="text" id="saLastName" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label for="saID">ID Number:</label>
                        <input type="text" id="saID" placeholder="Enter ID">
                    </div>
                </form>
            </div>
            
            <div class="schedule-section">
                <h4>Weekly Schedule</h4>
                <p class="info-text">Add your work schedule for each day of the week</p>
                
                <div class="day-schedule">
                    <div class="form-group">
                        <label for="scheduleDay">Day:</label>
                        <select id="scheduleDay">
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="scheduleStartTime">Start Time:</label>
                        <input type="time" id="scheduleStartTime" value="08:00">
                    </div>
                    <div class="form-group">
                        <label for="scheduleEndTime">End Time:</label>
                        <input type="time" id="scheduleEndTime" value="17:00">
                    </div>
                    <div class="form-group">
                        <button type="button" id="addDayScheduleBtn">Add Day Schedule</button>
                    </div>
                </div>
                
                <div id="weeklySummary">
                    <h4>Current Weekly Schedule</h4>
                    <table id="scheduleTable">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Hours</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="scheduleTableBody">
                            <tr><td colspan="5" class="info-text">No schedule saved yet. Please add days above.</td></tr>
                        </tbody>
                    </table>
                    <div class="day-schedule-controls">
                        <button type="button" id="saveSAInfoBtn">Save SA Information</button>
                        <button type="button" id="goToCalculatorBtn" class="secondary-btn">Go to Calculator</button>
                   </div>
                </div>
            </div>
        </div>
        
        <div id="calculatorContent">
            <h3>Daily Time Record Calculator</h3>
            
            <div class="schedule-section">
                <h4>Select Student Assistant</h4>
                <div class="sa-select-container">
                    <input type="text" id="saSearchInput" placeholder="Search by last name...">
                    <div id="saDropdown"></div>
                </div>
                <div id="selectedSAInfo"></div>
            </div>
            
            <div class="dtr-entry-form">
                <h4>Add Time Record</h4>
                <form id="dtrForm" class="schedule-form">
                    <div class="form-group">
                        <label for="dtrDate">Date:</label>
                        <input type="date" id="dtrDate" required>
                    </div>
                    <div class="form-group">
                        <label for="timeIn">Time In:</label>
                        <input type="time" id="timeIn" required>
                    </div>
                    <div class="form-group">
                        <label for="timeOut">Time Out:</label>
                        <input type="time" id="timeOut" required>
                    </div>
                    <div class="form-group">
                        <button type="button" id="addEntryBtn">Add Entry</button>
                    </div>
                </form>
            </div>
            
            <div class="dtr-entries">
                <h4>Time Records</h4>
                <table id="entriesTable">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Hours Worked</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="entriesBody">
                        <!-- Entries will be inserted here by JavaScript -->
                    </tbody>
                </table>
            </div>
            
            <div class="controls">
                <button type="button" id="calculateBtn">Calculate Total Hours</button>
                <button type="button" id="resetBtn" class="secondary-btn">Reset All</button>
            </div>
            
            <div class="results" id="resultsSection">
                <h4>Results</h4>
                <p>Working days: <span id="workingDays">0</span></p>
                <p>Raw total hours: <span id="rawHours">0</span></p>
                <p>Break time deductions: <span id="breakDeductions">0</span> hours</p>
                <p class="total-hours">Final total hours: <span id="totalHours">0</span></p>
                <p class="info-text">Note: 1 hour break is deducted for days with 7+ hours worked. Maximum of 100 hours per month.</p>
            </div>
        </div>
        
        <!-- View SA Information Content -->
        <div id="viewSAContent">
            <h3>Student Assistant Information</h3>
            
            <div class="search-container">
                <input type="text" id="saSearch" placeholder="Search by last name...">
                <button type="button" id="searchBtn">Search</button>
            </div>
            
            <div id="saSearchResults">
                <table id="saTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Weekly Schedule</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="saTableBody">
                        <!-- SA data will be inserted here by JavaScript -->
                    </tbody>
                </table>
            </div>
            
            <div id="saDetails" class="results">
                <h4>Student Assistant Details</h4>
                <div id="saDetailsContent">
                    <p class="info-text">Select a student assistant to view details.</p>
                </div>
            </div>
        </div>
        
        <!-- Calendar Content -->
        <div id="calendarContent">
            <h3>Schedule Calendar</h3>
            
            <div class="calendar">
                <div class="month-header">
                    <button class="month-nav" id="prevMonth">&lt;</button>
                    <h3 id="currentMonth">May 2025</h3>
                    <button class="month-nav" id="nextMonth">&gt;</button>
                </div>
                
                <div class="calendar-grid" id="calendarGrid">
                    <!-- Calendar will be generated by JS -->
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // DOM Elements - Navigation
const scheduleBtn = document.getElementById('scheduleBtn');
const calculatorBtn = document.getElementById('calculatorBtn');
const viewSABtn = document.getElementById('viewSABtn');
const calendarBtn = document.getElementById('calendarBtn');
const scheduleContent = document.getElementById('scheduleContent');
const calculatorContent = document.getElementById('calculatorContent');
const viewSAContent = document.getElementById('viewSAContent');
const calendarContent = document.getElementById('calendarContent');
const goToCalculatorBtn = document.getElementById('goToCalculatorBtn');

// Schedule Form Elements
const saFirstName = document.getElementById('saFirstName');
const saLastName = document.getElementById('saLastName');
const saID = document.getElementById('saID');
const scheduleDay = document.getElementById('scheduleDay');
const scheduleStartTime = document.getElementById('scheduleStartTime');
const scheduleEndTime = document.getElementById('scheduleEndTime');
const addDayScheduleBtn = document.getElementById('addDayScheduleBtn');
const scheduleTableBody = document.getElementById('scheduleTableBody');
const saveSAInfoBtn = document.getElementById('saveSAInfoBtn');

// DTR Form Elements
const dtrForm = document.getElementById('dtrForm');
const dtrDate = document.getElementById('dtrDate');
const timeIn = document.getElementById('timeIn');
const timeOut = document.getElementById('timeOut');
const addEntryBtn = document.getElementById('addEntryBtn');
const entriesBody = document.getElementById('entriesBody');
const calculateBtn = document.getElementById('calculateBtn');
const resetBtn = document.getElementById('resetBtn');
const saSearchInput = document.getElementById('saSearchInput');
const saDropdown = document.getElementById('saDropdown');
const selectedSAInfo = document.getElementById('selectedSAInfo');

// Results Elements
const workingDaysEl = document.getElementById('workingDays');
const rawHoursEl = document.getElementById('rawHours');
const breakDeductionsEl = document.getElementById('breakDeductions');
const totalHoursEl = document.getElementById('totalHours');

// SA View Elements
const saSearch = document.getElementById('saSearch');
const searchBtn = document.getElementById('searchBtn');
const saTableBody = document.getElementById('saTableBody');
const saDetailsContent = document.getElementById('saDetailsContent');

// Calendar Elements
const prevMonth = document.getElementById('prevMonth');
const nextMonth = document.getElementById('nextMonth');
const currentMonth = document.getElementById('currentMonth');
const calendarGrid = document.getElementById('calendarGrid');

// Application State
let currentSA = {
    firstName: '',
    lastName: '',
    id: '',
    weeklySchedule: []
};

let entries = [];
let allSAs = [];
let currentDate = new Date();
let selectedSAForCalculator = null;

// Initialize the app
function initApp() {
    // Set today's date as default
    const today = new Date().toISOString().split('T')[0];
    dtrDate.value = today;
    
    // Load saved data from localStorage if available
    loadFromLocalStorage();
    
    // Update UI based on loaded data
    updateScheduleTable();
    updateEntriesTable();
    updateResultsDisplay();
    updateSATable();
    generateCalendar();
    
    // Set up SA search functionality
    saSearchInput.addEventListener('input', function() {
        updateSADropdown(this.value.trim().toLowerCase());
    });
    
    saSearchInput.addEventListener('focus', function() {
        updateSADropdown(this.value.trim().toLowerCase());
    });
    
    document.addEventListener('click', function(e) {
        if (!saSearchInput.contains(e.target)) {
            saDropdown.style.display = 'none';
        }
    });
}

// Tab Navigation
scheduleBtn.addEventListener('click', function(e) {
    e.preventDefault();
    setActiveTab(scheduleBtn, scheduleContent);
});

calculatorBtn.addEventListener('click', function(e) {
    e.preventDefault();
    setActiveTab(calculatorBtn, calculatorContent);
});

viewSABtn.addEventListener('click', function(e) {
    e.preventDefault();
    setActiveTab(viewSABtn, viewSAContent);
    updateSATable();
});

calendarBtn.addEventListener('click', function(e) {
    e.preventDefault();
    setActiveTab(calendarBtn, calendarContent);
    generateCalendar();
});

function setActiveTab(button, content) {
    // Remove active class from all buttons and contents
    [scheduleBtn, calculatorBtn, viewSABtn, calendarBtn].forEach(btn => {
        btn.classList.remove('nav-active');
    });
    
    [scheduleContent, calculatorContent, viewSAContent, calendarContent].forEach(cont => {
        cont.classList.remove('active-content');
    });
    
    // Add active class to selected button and content
    button.classList.add('nav-active');
    content.classList.add('active-content');
}

goToCalculatorBtn.addEventListener('click', function() {
    calculatorBtn.click();
});

// Add Day Schedule
addDayScheduleBtn.addEventListener('click', function() {
    const day = scheduleDay.value;
    const startTime = scheduleStartTime.value;
    const endTime = scheduleEndTime.value;
    
    // Validate inputs
    if (!day || !startTime || !endTime) {
        alert("Please select day and time.");
        return;
    }
    
    // Check if timeOut is after timeIn
    if (startTime >= endTime) {
        alert("End time must be after start time.");
        return;
    }
    
    // Calculate hours
    const hours = calculateHoursWorked(startTime, endTime);
    
    // Check if day already exists in schedule
    const existingDayIndex = currentSA.weeklySchedule.findIndex(s => s.day === day);
    
    if (existingDayIndex !== -1) {
        if (confirm(`Schedule for ${capitalizeFirstLetter(day)} already exists. Do you want to replace it?`)) {
            currentSA.weeklySchedule[existingDayIndex] = { day, startTime, endTime, hours };
        }
    } else {
        currentSA.weeklySchedule.push({ day, startTime, endTime, hours });
    }
    
    // Sort schedule by day order
    sortWeeklySchedule();
    
    // Update UI
    updateScheduleTable();
});

// Save SA Information
saveSAInfoBtn.addEventListener('click', function() {
    // Create a new SA object instead of modifying currentSA directly
    const newSA = {
        firstName: saFirstName.value.trim(),
        lastName: saLastName.value.trim(),
        id: saID.value.trim(),
        weeklySchedule: [...currentSA.weeklySchedule] // Copy the schedule
    };
    
    // Validate inputs
    if (!newSA.firstName || !newSA.lastName || !newSA.id) {
        alert("Please fill in all personal information fields.");
        return;
    }
    
    if (newSA.weeklySchedule.length === 0) {
        alert("Please add at least one day to the schedule.");
        return;
    }
    
    // Check if SA already exists in allSAs
    const existingSAIndex = allSAs.findIndex(sa => sa.id === newSA.id);
    
    if (existingSAIndex !== -1) {
        // Update existing SA
        allSAs[existingSAIndex] = newSA;
    } else {
        // Add new SA
        allSAs.push(newSA);
    }
    
    saveToLocalStorage();
    updateSATable();
    updateSADropdown();
    
    // Reset form and currentSA
    saFirstName.value = '';
    saLastName.value = '';
    saID.value = '';
    currentSA = {
        firstName: '',
        lastName: '',
        id: '',
        weeklySchedule: []
    };
    updateScheduleTable();
    
    alert("SA information saved successfully!");
});

// Delete schedule day
function deleteScheduleDay(index) {
    if (confirm("Are you sure you want to delete this day from the schedule?")) {
        currentSA.weeklySchedule.splice(index, 1);
        updateScheduleTable();
    }
}

// Add DTR Entry with schedule validation
addEntryBtn.addEventListener('click', function() {
    // Validate SA is selected
    if (!selectedSAForCalculator) {
        alert("Please select a Student Assistant first.");
        return;
    }
    
    // Validate entry inputs
    if (!dtrDate.value || !timeIn.value || !timeOut.value) {
        alert("Please fill in all entry fields.");
        return;
    }
    
    // Check if timeOut is after timeIn
    if (timeIn.value >= timeOut.value) {
        alert("Time Out must be after Time In.");
        return;
    }
    
    // Get day of week for the entry date
    const date = new Date(dtrDate.value);
    const dayOfWeek = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'][date.getDay()];
    
    // Check if SA has schedule for this day
    const daySchedule = selectedSAForCalculator.weeklySchedule.find(s => s.day === dayOfWeek);
    
    if (!daySchedule) {
        alert(`The selected SA doesn't have a schedule for ${capitalizeFirstLetter(dayOfWeek)}. Entry will be counted as 0 hours.`);
        
        // Add entry with 0 hours
        const entry = {
            date: dtrDate.value,
            timeIn: timeIn.value,
            timeOut: timeOut.value,
            hoursWorked: 0,
            saId: selectedSAForCalculator.id,
            day: dayOfWeek,
            status: "No schedule"
        };
        
        addOrUpdateEntry(entry);
        return;
    }
    
    // Adjust time in/out based on schedule
    let effectiveTimeIn = timeIn.value;
    let effectiveTimeOut = timeOut.value;
    
    // If time in is before scheduled start, use scheduled start time
    if (effectiveTimeIn < daySchedule.startTime) {
        effectiveTimeIn = daySchedule.startTime;
    }
    
    // If time out is after scheduled end, use scheduled end time
    if (effectiveTimeOut > daySchedule.endTime) {
        effectiveTimeOut = daySchedule.endTime;
    }
    
    // If time in is after scheduled end or time out is before scheduled start, 0 hours
    if (effectiveTimeIn >= daySchedule.endTime || effectiveTimeOut <= daySchedule.startTime) {
        alert(`Time entry doesn't overlap with scheduled work hours (${daySchedule.startTime}-${daySchedule.endTime}). Entry will be counted as 0 hours.`);
        
        const entry = {
            date: dtrDate.value,
            timeIn: timeIn.value,
            timeOut: timeOut.value,
            hoursWorked: 0,
            saId: selectedSAForCalculator.id,
            day: dayOfWeek,
            status: "Outside scheduled hours"
        };
        
        addOrUpdateEntry(entry);
        return;
    }
    
    // Calculate hours worked based on adjusted times
    const hoursWorked = calculateHoursWorked(effectiveTimeIn, effectiveTimeOut);
    
    // Add entry
    const entry = {
        date: dtrDate.value,
        timeIn: timeIn.value,
        timeOut: timeOut.value,
        hoursWorked: hoursWorked,
        saId: selectedSAForCalculator.id,
        day: dayOfWeek,
        status: "Valid",
        effectiveTimeIn: effectiveTimeIn,
        effectiveTimeOut: effectiveTimeOut
    };
    
    addOrUpdateEntry(entry);
});

function addOrUpdateEntry(entry) {
    // Check for duplicate date
    const existingEntryIndex = entries.findIndex(e => e.date === entry.date && e.saId === entry.saId);
    if (existingEntryIndex !== -1) {
        if (confirm("An entry for this date already exists. Do you want to replace it?")) {
            entries[existingEntryIndex] = entry;
        } else {
            return;
        }
    } else {
        entries.push(entry);
    }
    
    // Sort entries by date
    entries.sort((a, b) => new Date(a.date) - new Date(b.date));
    
    // Update UI and save
    updateEntriesTable();
    saveToLocalStorage();
    generateCalendar();
    
    // Reset form for next entry
    timeIn.value = "";
    timeOut.value = "";
}

// Calculate button
calculateBtn.addEventListener('click', function() {
    if (!selectedSAForCalculator) {
        alert("Please select a Student Assistant first.");
        return;
    }
    
    const saEntries = entries.filter(e => e.saId === selectedSAForCalculator.id);
    
    if (saEntries.length === 0) {
        alert("Please add at least one time record entry.");
        return;
    }
    
    calculateTotalHours();
});

// Reset button
resetBtn.addEventListener('click', function() {
    if (confirm("Are you sure you want to reset all entries? This cannot be undone.")) {
        entries = entries.filter(e => e.saId !== selectedSAForCalculator.id);
        updateEntriesTable();
        updateResultsDisplay();
        generateCalendar();
        saveToLocalStorage();
    }
});

// Search SA
searchBtn.addEventListener('click', function() {
    const searchTerm = saSearch.value.trim().toLowerCase();
    
    if (!searchTerm) {
        updateSATable();
        return;
    }
    
    const filteredSAs = allSAs.filter(sa => 
        sa.lastName.toLowerCase().includes(searchTerm)
    );
    
    updateSATable(filteredSAs);
});

// Clear search when input is cleared
saSearch.addEventListener('input', function() {
    if (!this.value) {
        updateSATable();
    }
});

// Calendar navigation
prevMonth.addEventListener('click', function() {
    currentDate.setMonth(currentDate.getMonth() - 1);
    generateCalendar();
});

nextMonth.addEventListener('click', function() {
    currentDate.setMonth(currentDate.getMonth() + 1);
    generateCalendar();
});

// Helper Functions
function calculateHoursWorked(startTime, endTime) {
    const [startHours, startMinutes] = startTime.split(':').map(Number);
    const [endHours, endMinutes] = endTime.split(':').map(Number);
    
    let hours = endHours - startHours;
    let minutes = endMinutes - startMinutes;
    
    if (minutes < 0) {
        hours--;
        minutes += 60;
    }
    
    // Return in "Xhrs and Ymins" format
    return formatHoursMinutes(hours, minutes);
}

function formatHoursMinutes(hours, minutes) {
    let result = '';
    if (hours > 0) {
        result += `${hours}hr${hours !== 1 ? 's' : ''}`;
    }
    if (minutes > 0) {
        if (hours > 0) {
            result += ' and ';
        }
        result += `${minutes}min${minutes !== 1 ? 's' : ''}`;
    }
    return result || '0hrs';
}

function calculateTotalHours() {
    if (!selectedSAForCalculator) return;
    
    const saEntries = entries.filter(e => e.saId === selectedSAForCalculator.id);
    
    let workingDays = 0;
    let totalMinutes = 0;
    let breakDeductionMinutes = 0;
    
    saEntries.forEach(entry => {
        if (entry.hoursWorked !== '0hrs') {
            workingDays++;
            
            // Parse the hours and minutes from the display format
            const timeParts = entry.hoursWorked.split(' and ');
            let hours = 0, minutes = 0;
            
            timeParts.forEach(part => {
                if (part.includes('hr')) {
                    hours = parseInt(part.replace('hrs', '').replace('hr', ''));
                } else if (part.includes('min')) {
                    minutes = parseInt(part.replace('mins', '').replace('min', ''));
                }
            });
            
            totalMinutes += (hours * 60) + minutes;
            
            // Deduct 1 hour break for shifts 7+ hours
            if ((hours * 60 + minutes) >= 420) { // 7 hours = 420 minutes
                breakDeductionMinutes += 60;
            }
        }
    });
    
    // Apply break deductions
    totalMinutes = Math.max(0, totalMinutes - breakDeductionMinutes);
    
    // Cap at 100 hours (6000 minutes)
    totalMinutes = Math.min(totalMinutes, 6000);
    
    // Convert back to hours and minutes
    const totalHours = Math.floor(totalMinutes / 60);
    const remainingMinutes = totalMinutes % 60;
    
    const breakHours = Math.floor(breakDeductionMinutes / 60);
    const breakMins = breakDeductionMinutes % 60;
    
    // Update UI with formatted hours
    workingDaysEl.textContent = workingDays;
    rawHoursEl.textContent = formatHoursMinutes(Math.floor((totalMinutes + breakDeductionMinutes) / 60), (totalMinutes + breakDeductionMinutes) % 60);
    breakDeductionsEl.textContent = formatHoursMinutes(breakHours, breakMins);
    totalHoursEl.textContent = formatHoursMinutes(totalHours, remainingMinutes);
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function sortWeeklySchedule() {
    const dayOrder = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
    currentSA.weeklySchedule.sort((a, b) => {
        return dayOrder.indexOf(a.day) - dayOrder.indexOf(b.day);
    });
}

// Update UI Functions
function updateScheduleTable() {
    if (currentSA.weeklySchedule.length === 0) {
        scheduleTableBody.innerHTML = `<tr><td colspan="5" class="info-text">No schedule saved yet. Please add days above.</td></tr>`;
        return;
    }
    
    scheduleTableBody.innerHTML = '';
    
    currentSA.weeklySchedule.forEach((schedule, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${capitalizeFirstLetter(schedule.day)}</td>
            <td>${schedule.startTime}</td>
            <td>${schedule.endTime}</td>
            <td>${schedule.hours}</td>
            <td><button type="button" onclick="deleteScheduleDay(${index})">Delete</button></td>
        `;
        scheduleTableBody.appendChild(row);
    });
}

function updateEntriesTable() {
    if (!selectedSAForCalculator) {
        entriesBody.innerHTML = `<tr><td colspan="6" class="info-text">No SA selected.</td></tr>`;
        return;
    }
    
    const saEntries = entries.filter(e => e.saId === selectedSAForCalculator.id);
    
    if (saEntries.length === 0) {
        entriesBody.innerHTML = `<tr><td colspan="6" class="info-text">No entries yet. Add your first entry above.</td></tr>`;
        return;
    }
    
    entriesBody.innerHTML = '';
    
    saEntries.forEach((entry, index) => {
        const row = document.createElement('tr');
        
        let statusClass = '';
        if (entry.hoursWorked === '0hrs') {
            statusClass = 'style="color: red;"';
        }
        
        row.innerHTML = `
            <td>${formatDate(entry.date)}</td>
            <td>${entry.timeIn}</td>
            <td>${entry.timeOut}</td>
            <td ${statusClass}>${entry.hoursWorked}</td>
            <td>${entry.status || ''}</td>
            <td><button type="button" onclick="deleteEntry(${index})">Delete</button></td>
        `;
        entriesBody.appendChild(row);
    });
}

function updateResultsDisplay() {
    workingDaysEl.textContent = '0';
    rawHoursEl.textContent = '0';
    breakDeductionsEl.textContent = '0';
    totalHoursEl.textContent = '0';
}

function updateSATable(sas = allSAs) {
    saTableBody.innerHTML = '';
    
    if (sas.length === 0) {
        saTableBody.innerHTML = `<tr><td colspan="5" class="info-text">No student assistants found.</td></tr>`;
        return;
    }
    
    sas.forEach(sa => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${sa.id}</td>
            <td>${sa.firstName}</td>
            <td>${sa.lastName}</td>
            <td>${sa.weeklySchedule.length} days</td>
            <td><button type="button" onclick="viewSADetails('${sa.id}')">View</button></td>
        `;
        saTableBody.appendChild(row);
    });
}

function updateSADropdown(searchTerm = '') {
    saDropdown.innerHTML = '';
    
    if (allSAs.length === 0) {
        saDropdown.style.display = 'none';
        return;
    }
    
    const filteredSAs = searchTerm 
        ? allSAs.filter(sa => 
            sa.lastName.toLowerCase().includes(searchTerm) || 
            sa.firstName.toLowerCase().includes(searchTerm) || 
            sa.id.toLowerCase().includes(searchTerm))
        : allSAs;
    
    if (filteredSAs.length === 0) {
        const noResult = document.createElement('div');
        noResult.className = 'sa-option';
        noResult.textContent = 'No matching SAs found';
        saDropdown.appendChild(noResult);
    } else {
        filteredSAs.forEach(sa => {
            const option = document.createElement('div');
            option.className = 'sa-option';
            option.textContent = `${sa.lastName}, ${sa.firstName} (${sa.id})`;
            option.addEventListener('click', function() {
                selectSA(sa);
                saDropdown.style.display = 'none';
            });
            saDropdown.appendChild(option);
        });
    }
    
    saDropdown.style.display = filteredSAs.length > 0 ? 'block' : 'none';
}

function selectSA(sa) {
    selectedSAForCalculator = sa;
    saSearchInput.value = `${sa.lastName}, ${sa.firstName} (${sa.id})`;
    
    selectedSAInfo.innerHTML = `
        <p><strong>Student Assistant:</strong> ${sa.firstName} ${sa.lastName}</p>
        <p><strong>ID:</strong> ${sa.id}</p>
        <h5>Weekly Schedule</h5>
        <ul>
            ${sa.weeklySchedule.map(s => 
                `<li>${capitalizeFirstLetter(s.day)}: ${s.startTime} - ${s.endTime} (${s.hours})</li>`
            ).join('') || '<li>No schedule</li>'}
        </ul>
    `;
    
    // Filter entries for this SA
    updateEntriesTable();
}

function generateCalendar() {
    // Clear previous calendar
    calendarGrid.innerHTML = '';
    
    // Set month header
    const monthNames = ["January", "February", "March", "April", "May", "June",
                       "July", "August", "September", "October", "November", "December"];
    currentMonth.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
    
    // Add day headers
    const dayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    dayNames.forEach(day => {
        const dayHeader = document.createElement('div');
        dayHeader.className = 'calendar-day-header';
        dayHeader.textContent = day;
        calendarGrid.appendChild(dayHeader);
    });
    
    // Get first day of month and total days in month
    const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay();
    const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();
    
    // Get previous month's days to show
    const prevMonthDays = new Date(currentDate.getFullYear(), currentDate.getMonth(), 0).getDate();
    
    // Add days from previous month
    for (let i = firstDay - 1; i >= 0; i--) {
        const dayElement = createDayElement(prevMonthDays - i, true);
        calendarGrid.appendChild(dayElement);
    }
    
    // Add current month's days
    const today = new Date();
    for (let i = 1; i <= daysInMonth; i++) {
        const dayDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), i);
        const isToday = dayDate.getDate() === today.getDate() && 
                       dayDate.getMonth() === today.getMonth() && 
                       dayDate.getFullYear() === today.getFullYear();
        
        const dayElement = createDayElement(i, false, isToday);
        
        // Add entries for this day if they exist
        const formattedDate = formatDateForCalendar(dayDate);
        const dayEntries = entries.filter(entry => entry.date === formattedDate);
        
        if (dayEntries.length > 0) {
            const eventsDiv = document.createElement('div');
            eventsDiv.className = 'events';
            
            dayEntries.forEach(entry => {
                const sa = allSAs.find(s => s.id === entry.saId);
                const saName = sa ? `${sa.firstName} ${sa.lastName}` : 'Unknown SA';
                
                const eventDiv = document.createElement('div');
                eventDiv.className = 'event';
                eventDiv.textContent = `${saName}: ${entry.timeIn}-${entry.timeOut}`;
                eventsDiv.appendChild(eventDiv);
            });
            
            dayElement.appendChild(eventsDiv);
        }
        
        calendarGrid.appendChild(dayElement);
    }
    
    // Add days from next month to fill the grid
    const totalCells = Math.ceil((firstDay + daysInMonth) / 7) * 7;
    const nextMonthDays = totalCells - (firstDay + daysInMonth);
    
    for (let i = 1; i <= nextMonthDays; i++) {
        const dayElement = createDayElement(i, true);
        calendarGrid.appendChild(dayElement);
    }
}

function createDayElement(day, isOtherMonth, isToday = false) {
    const dayElement = document.createElement('div');
    dayElement.className = 'calendar-day';
    
    if (isOtherMonth) {
        dayElement.classList.add('other-month');
    }
    
    if (isToday) {
        dayElement.classList.add('today');
    }
    
    const dateSpan = document.createElement('div');
    dateSpan.className = 'date';
    dateSpan.textContent = day;
    dayElement.appendChild(dateSpan);
    
    return dayElement;
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
}

function formatDateForCalendar(date) {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}

// View SA details with delete button
function viewSADetails(id) {
    const sa = allSAs.find(sa => sa.id === id);
    
    if (!sa) {
        saDetailsContent.innerHTML = `<p class="info-text">Student assistant not found.</p>`;
        return;
    }
    
    let scheduleHTML = '<table><thead><tr><th>Day</th><th>Start Time</th><th>End Time</th><th>Hours</th><th>Action</th></tr></thead><tbody>';
    
    if (sa.weeklySchedule.length === 0) {
        scheduleHTML += `<tr><td colspan="5" class="info-text">No schedule available.</td></tr>`;
    } else {
        sa.weeklySchedule.forEach((schedule, index) => {
            scheduleHTML += `
                <tr>
                    <td>${capitalizeFirstLetter(schedule.day)}</td>
                    <td>${schedule.startTime}</td>
                    <td>${schedule.endTime}</td>
                    <td>${schedule.hours}</td>
                    <td><button type="button" onclick="deleteSASchedule('${sa.id}', ${index})">Delete</button></td>
                </tr>
            `;
        });
    }
    
    scheduleHTML += '</tbody></table>';
    
    saDetailsContent.innerHTML = `
        <p><strong>ID:</strong> ${sa.id}</p>
        <p><strong>Name:</strong> ${sa.firstName} ${sa.lastName}</p>
        <h5>Weekly Schedule</h5>
        ${scheduleHTML}
        <div class="controls">
            <button type="button" onclick="loadSA('${sa.id}')">Load This SA</button>
            <button type="button" onclick="deleteSA('${sa.id}')" class="secondary-btn">Delete SA</button>
        </div>
    `;
}

function deleteSASchedule(saId, scheduleIndex) {
    if (confirm("Are you sure you want to delete this schedule entry?")) {
        const saIndex = allSAs.findIndex(sa => sa.id === saId);
        if (saIndex !== -1) {
            allSAs[saIndex].weeklySchedule.splice(scheduleIndex, 1);
            saveToLocalStorage();
            viewSADetails(saId); // Refresh the view
            
            // If this is the currently loaded SA, update the schedule table
            if (currentSA.id === saId) {
                currentSA.weeklySchedule = [...allSAs[saIndex].weeklySchedule];
                updateScheduleTable();
            }
        }
    }
}

function deleteSA(id) {
    if (confirm("Are you sure you want to delete this SA? This will also delete all their time entries.")) {
        // Remove from allSAs
        allSAs = allSAs.filter(sa => sa.id !== id);
        
        // Remove associated entries
        entries = entries.filter(entry => entry.saId !== id);
        
        // Update currentSA if it's the one being deleted
        if (currentSA.id === id) {
            currentSA = {
                firstName: '',
                lastName: '',
                id: '',
                weeklySchedule: []
            };
            saFirstName.value = '';
            saLastName.value = '';
            saID.value = '';
            updateScheduleTable();
        }
        
        // Update selected SA if it's the one being deleted
        if (selectedSAForCalculator && selectedSAForCalculator.id === id) {
            selectedSAForCalculator = null;
            saSearchInput.value = '';
            selectedSAInfo.innerHTML = '<p class="info-text">No SA selected</p>';
            updateEntriesTable();
        }
        
        saveToLocalStorage();
        updateSATable();
        updateSADropdown();
        generateCalendar();
        
        alert("SA and all associated entries have been deleted.");
    }
}

// Load SA data
function loadSA(id) {
    const sa = allSAs.find(sa => sa.id === id);
    
    if (sa) {
        // Update currentSA with a deep copy
        currentSA = {
            firstName: sa.firstName,
            lastName: sa.lastName,
            id: sa.id,
            weeklySchedule: sa.weeklySchedule.map(sched => ({...sched}))
        };
        
        // Update form fields
        saFirstName.value = currentSA.firstName;
        saLastName.value = currentSA.lastName;
        saID.value = currentSA.id;
        
        // Update UI
        updateScheduleTable();
        saveToLocalStorage();
        
        // Switch to schedule tab
        scheduleBtn.click();
        
        alert(`${currentSA.firstName} ${currentSA.lastName}'s data loaded successfully!`);
    }
}

// Delete entry
function deleteEntry(index) {
    if (confirm("Are you sure you want to delete this entry?")) {
        entries.splice(index, 1);
        updateEntriesTable();
        updateResultsDisplay();
        generateCalendar();
        saveToLocalStorage();
    }
}

// Local Storage Functions
function saveToLocalStorage() {
    localStorage.setItem('currentSA', JSON.stringify(currentSA));
    localStorage.setItem('entries', JSON.stringify(entries));
    localStorage.setItem('allSAs', JSON.stringify(allSAs));
}

function loadFromLocalStorage() {
    const savedSA = localStorage.getItem('currentSA');
    const savedEntries = localStorage.getItem('entries');
    const savedAllSAs = localStorage.getItem('allSAs');
    
    if (savedSA) {
        currentSA = JSON.parse(savedSA);
        
        // Update form fields
        saFirstName.value = currentSA.firstName;
        saLastName.value = currentSA.lastName;
        saID.value = currentSA.id;
    }
    
    if (savedEntries) {
        entries = JSON.parse(savedEntries);
    }
    
    if (savedAllSAs) {
        allSAs = JSON.parse(savedAllSAs);
    }
}

// Initialize the app when the page loads
window.addEventListener('DOMContentLoaded', initApp);
    </script>
</body>
</html>