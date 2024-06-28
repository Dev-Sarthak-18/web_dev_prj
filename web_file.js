document.addEventListener('DOMContentLoaded', function () {
    // Dummy data for events
    const events = [
        { title: 'BCA-2nd Semester Examination', date: '2024-5-31', time: '2:00 PM', location: 'MCA Hall-1' },
    ];

    const eventsSection = document.getElementById('events');

    // Function to render events
    function renderEvents() {
        eventsSection.innerHTML = '';
        events.forEach(event => {
            const eventElement = document.createElement('div');
            eventElement.classList.add('event');
            eventElement.innerHTML = `
                <h6>${event.title}</h6>
                <h5>Date: ${event.date}</h5>
                <h5>Time: ${event.time}</h5>
                <h5>Location: ${event.location}</h5>
            
            `;
            eventsSection.appendChild(eventElement);
        });
    }

    // Initial render
    renderEvents();
});
