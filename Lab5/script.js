let students = [];

function time_now() {
    const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const monthsOfYear = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    
    const now = new Date();
    const dayOfWeek = daysOfWeek[now.getDay()];
    const month = monthsOfYear[now.getMonth()];
    const day = now.getDate();
    const year = now.getFullYear();
    let hour = now.getHours();
    const minute = now.getMinutes();
    const ampm = hour >= 12 ? 'PM' : 'AM';
    hour = hour % 12;
    hour = hour ? hour : 12;

    const dateString = `Today is ${month} ${day}, ${year}, ${dayOfWeek}.`;
    const timeString = `The current time is ${hour}:${minute < 10 ? '0' + minute : minute} ${ampm}.`;

    alert(`${dateString}\n${timeString}`);
}

document.getElementById('showDateBtn').addEventListener('click', time_now);

function addStudent() {
    const form = document.getElementById('studentForm');
    const student = {
        id: generateStudentID(), // Generate student ID
        name: form.name.value,
        age: form.age.value,
        email: form.email.value,
        course: form.course.value
    };
    students.push(student);
    form.reset();

    // Display the generated student ID
    alert(`Student ID: ${student.id}`);
}


function findStudent() {
    const searchID = document.getElementById('searchID').value;
    const foundStudent = students.find(student => student.id == searchID); // Use '==' for loose comparison
    if (foundStudent) {
        alert(`Name: ${foundStudent.name}\nAge: ${foundStudent.age}\nEmail: ${foundStudent.email}\nCourse: ${foundStudent.course}`);
    } else {
        alert('Unable to find the student with the provided ID.');
    }
}

function display_list() {
    // Check if there are no students in the array
    if (students.length === 0) {
        alert("No students to display.");
        return;
    }

    // Construct a string to display all student details
    let studentDetails = "List of Students:\n";
    students.forEach((student, index) => {
        studentDetails += `\nStudent ${index + 1}:\n`;
        studentDetails += `Name: ${student.name}\n`;
        studentDetails += `Age: ${student.age}\n`;
        studentDetails += `Email: ${student.email}\n`;
        studentDetails += `Course: ${student.course}\n`;
    });

    // Display all student details
    alert(studentDetails);
}

document.getElementById('submitBtn').addEventListener('click', addStudent);
document.getElementById('searchBtn').addEventListener('click', findStudent);
document.getElementById('displayAllBtn').addEventListener('click', display_list);

// Function to generate a random student ID with a maximum of 6 digits
function generateStudentID() {
    return Math.floor(Math.random() * 1000000); // Random number between 0 and 999999
}
