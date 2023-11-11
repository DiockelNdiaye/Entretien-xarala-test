const body = document.body;
const sidebar = document.querySelector('.main-sidebar');
const openSidebar = document.querySelector('#openSidebar');
const closeSidebar = document.querySelector('#closeSidebar');
const toggleTheme = document.querySelector('.toggle-theme');
const light = toggleTheme.children[0];
const dark = toggleTheme.children[1];
const inputFields = document.querySelectorAll('.percentage p');

openSidebar.addEventListener('click', openSidebarFunction);
closeSidebar.addEventListener('click', closeSidebarFunction);
toggleTheme.addEventListener('click', changeTheme);

function openSidebarFunction() {
    sidebar.style.left = '0%';
}

function closeSidebarFunction() {
    sidebar.style.left = '-100%';
}

function changeTheme() {
    if (body.classList.contains('dark-mode')) {
        lightMode();
    } else if (!body.classList.contains('dark-mode')) {
        darkMode();
    }
}

inputFields.forEach((e, i) => {
    let val = parseInt(e.textContent);
    console.log(val);
    let circle = document.getElementById(`circle${i + 1}`);
    let r = circle.getAttribute('r');
    let circ = Math.PI * 2 * r;
    let counter = 0;
    let fillValue = (circ * (100 - val)) / 100;
    setInterval(() => {
        if (counter === val) {
            clearInterval();
        } else {
            counter += 1;
            e.innerText = counter + '%';
            circle.style.strokeDashoffset = fillValue;
        }
    }, 1000 / val);
});

if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
    darkMode();
}

function darkMode() {
    body.classList.add('dark-mode');
    light.classList.remove('active');
    dark.classList.add('active');
}

function lightMode() {
    body.classList.remove('dark-mode');
    dark.classList.remove('active');
    light.classList.add('active');
}


//emploi du temps
// Exemple d'emploi du temps avec heure
const schedule = {
    Monday: [
        { course: "HTML/CSS", professor: "Mr. Smith", time: "9:00 AM - 10:30 AM" },
        { course: "PHP/LARAVEL", professor: "Ms. Johnson", time: "11:00 AM - 12:30 PM" }
    ],
    Tuesday: [
        { course: "JS/REACT", professor: "Mr. Brown", time: "10:00 AM - 11:30 AM" }
    ],
    Wednesday: [
        { course: "PYTHON/DJANGO", professor: "Mr. Wilson", time: "9:30 AM - 11:00 AM" },
        { course: "C#", professor: "Ms. Davis", time: "1:00 PM - 2:30 PM" }
    ],
    Thursday: [
        { course: "ANGULAR", professor: "Mr. White", time: "2:00 PM - 3:30 PM" }
    ],
    Friday: [
        { course: "C++", professor: "Ms. Lee", time: "11:30 AM - 1:00 PM" },
        { course: "Vuejs", professor: "Mrs.Delza", time: "11:30 AM - 1:00 PM" }
    ]
};

// Fonction pour afficher l'emploi du temps d'un jour donné
function displaySchedule(day) {
    const dayDiv = document.getElementById(day.toLowerCase());
    const courses = schedule[day];
    if (courses) {
        dayDiv.innerHTML = "";
        courses.forEach(course => {
            const courseDiv = document.createElement("div");
            courseDiv.innerHTML = `<strong>${course.course}</strong><br>${course.time}<br>${course.professor}`;
            dayDiv.appendChild(courseDiv);
        });
    }
}

// Afficher l'emploi du temps pour chaque jour de la semaine
const daysOfWeek = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
daysOfWeek.forEach(day => {
    displaySchedule(day);
});
