import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


let buttonForm = document.querySelector('#buttonForm');
let cardForm = document.querySelector('#cardForm');
let status = true

buttonForm.addEventListener('click', ()=>{
    if (status) {
        cardForm.classList.remove('hidden')
        status = false
    } else {
        cardForm.classList.add('hidden')
        status = true
        
    }
});

let btnEdite = document.querySelectorAll('.btnEdite');
let cancelButtonsEd = document.querySelectorAll('.cancelButtonEd');

btnEdite.forEach((btnEd) => {
    btnEd.addEventListener('click', () => {
        let postId = btnEd.closest('[data-post-id]').getAttribute('data-post-id');
        let divEdite = document.querySelector(`.divEdite[data-post-id="${postId}"]`);
        if (divEdite) {
            divEdite.classList.remove('hidden');
        }
    });
});

cancelButtonsEd.forEach((cancelBtn) => {
    cancelBtn.addEventListener('click', (e) => {
        e.preventDefault();
        let divEdite = cancelBtn.closest('.divEdite');
        divEdite.classList.add('hidden');
    });
});


// Stripe
document.addEventListener("DOMContentLoaded", async function () {
    let response = await axios.get("/get-events");
    let events = response.data.events;

    var calendarEl = document.getElementById("calendar");
    let nowDate = new Date();

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: "prev,next",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay",
        },
        views: {
            listDay: {
                buttonText: "Day",
            },
            listWeek: {
                buttonText: "Week",
            },
            listMonth: {
                buttonText: "Month",
            },
        },
        initialView: "timeGridWeek",
        slotMinTime: "08:00:00",
        slotMaxTime: "20:00:00",
        nowIndicator: true,
        selectable: true,
        selectMirror: true,
        selectOverlap: false,
        weekends: true,
        events: events,
        selectAllow: (info) => {
            return info.start >= nowDate;
        },
        select: (info) => {
            console.log("now date is " + nowDate);
            console.log("start date is " + info.start);
            let startTime = info.startStr.slice(0, info.startStr.length - 6);
            let endTime = info.endStr.slice(0, info.startStr.length - 6);

            start.value = startTime;
            end.value = endTime;
            submitBtn.click();
        },
    });

    calendar.render();

    function validateEventOwner(info) {
        let ownerId = info.event._def.extendedProps.owner;
        let authUser = authId.value;

        return ownerId == authUser;
    }

});