document.addEventListener("DOMContentLoaded", function () {
    const _formSelectors = document.querySelectorAll(".selector-input");
    const _formSelectorOptions = document.querySelectorAll(".selector-options>.option");

    document.querySelectorAll("input.readonly").forEach(input => {
        input.addEventListener("keydown", event => {
            if (event.key !== "Tab") {
                event.preventDefault();
            }
        });
    
        input.addEventListener("paste", event => {
            event.preventDefault();
        });
    
        input.addEventListener("focus", event => {
            event.preventDefault();
        });
    
        input.addEventListener("mousedown", event => {
            event.preventDefault();
        });
    });
    
    _formSelectors.forEach(selector => {
        selector.addEventListener("click", event => {
            let name = selector.getAttribute("name");
            let options = document.querySelector('.selector-options[for="' + name + '"]');
            
            if (options.style.display === "block") {
                closeSelectors();
                return;
            }

            selector.classList.add("active");
            options.style.display = "block"; 
            options.style.top = `${selector.offsetTop + selector.offsetHeight}px`;
            options.style.left = `${selector.offsetLeft}px`;

            setTimeout(() => {
                document.addEventListener("click", closeSelectors);
            }, 0);
            
        });
    });

    _formSelectorOptions.forEach(option => {
        option.addEventListener("click", event => {
            let options = option.parentElement;
            let name = options.getAttribute("for");
            let selector = document.querySelector('.selector-input[name="' + name + '"]')
            selector.value = option.innerText;
            closeSelectors(event);
        });
    });

    const closeSelectors = event => {
        if (event && (event.target.classList.contains('selector-input') || event.target.classList.contains(''))) return;
        document.querySelectorAll(".selector-options").forEach(options => {
            options.style.display = "none";
        });
        _formSelectors.forEach(selector => {
            selector.classList.remove("active");
        });
        document.removeEventListener("click", closeSelectors);
    }

    // Calendar

    const _calendarInput = document.querySelector(".calendar-input");
    const _calendarContainer = document.querySelector('.calendar-container');
    const _monthYear = document.querySelector('.month-year');
    const _daysContainer = document.querySelector('.days');
    const _prevMonthBtn = document.querySelector('.prev-month');
    const _nextMonthBtn = document.querySelector('.next-month');
    const _applyBtn = document.querySelector('.apply-btn');
    let selectedDate = new Date();
    let selectedTime;

    _calendarInput.addEventListener('click', () => {
        if (_calendarContainer.style.display === "flex") {
            _calendarContainer.style.display = "none";
            _calendarInput.classList.remove("active");
            return;
        }
        _calendarInput.classList.add("active");
        _calendarContainer.style.display = 'flex';
        _calendarContainer.style.top = `${_calendarInput.offsetTop + _calendarInput.offsetHeight}px`;
        _calendarContainer.style.left = `${_calendarInput.offsetLeft}px`;
        renderCalendar(selectedDate);
    });


    const renderCalendar = (date) => {
        console.log(date);
        let currentMonth = date.getMonth();
        let currentYear = date.getFullYear();
        _monthYear.textContent = `${date.toLocaleString('default', { month: 'long' })} ${currentYear}`;

        let firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
        firstDayOfMonth = (firstDayOfMonth + 7 - 1) % 7;
        let lastDateOfMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        _daysContainer.innerHTML = '';
        for (let i = 0; i < firstDayOfMonth; i++) {
            const emptyCell = document.createElement('span');
            _daysContainer.appendChild(emptyCell);
        }

        for (let i = 1; i <= lastDateOfMonth; i++) {
            let dayCell = document.createElement('span');
            dayCell.textContent = i;
            if (currentMonth === new Date().getMonth() && i === selectedDate.getDate()) dayCell.classList.add("active");
            dayCell.addEventListener('click', () => {
                document.querySelectorAll(".calendar-body>.days>span.active").forEach(elem => elem.classList.remove("active"));
                dayCell.classList.add("active");
                selectedDate = new Date(currentYear, currentMonth, i);
                updateInput();
            });
            _daysContainer.appendChild(dayCell);
        }
    };

    const updateInput = () => {
        if (selectedDate && selectedTime) {
            _calendarInput.value = `${selectedDate.toLocaleDateString()} ${selectedTime}`;
        }
    };

    _prevMonthBtn.addEventListener('click', () => {
        selectedDate.setMonth(selectedDate.getMonth() - 1);
        renderCalendar(selectedDate);
    });

    _nextMonthBtn.addEventListener('click', () => {
        selectedDate.setMonth(selectedDate.getMonth() + 1);
        renderCalendar(selectedDate);
    });

    document.querySelectorAll('.time-options input').forEach(radio => {
        radio.addEventListener('change', (e) => {
            selectedTime = e.target.value;
            updateInput();
        });
    });

    _applyBtn.addEventListener('click', () => {
        _calendarContainer.style.display = 'none';
        _calendarInput.classList.remove("active");
    });
});
