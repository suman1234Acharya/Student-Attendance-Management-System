# 🎓 Student Attendance Management System

A modern, web-based **Student Attendance Management System** developed using **PHP, MySQL, HTML, CSS, JavaScript, and Bootstrap**. The system helps schools and colleges manage students, teachers, classes, and attendance records efficiently through secure role-based access.

---

## 📖 Overview

The Student Attendance Management System automates the process of recording and monitoring student attendance. It provides separate dashboards for administrators and teachers, making attendance management simple, secure, and efficient.

---

## ✨ Features

### 👨‍💼 Admin Module
- Secure Admin Login
- Dashboard with Statistics
- Student Management (Add, Edit, Delete)
- Teacher Management
- Class Management
- Attendance Monitoring
- Attendance Reports
- Change Password
- Logout

### 👨‍🏫 Teacher Module
- Secure Teacher Login
- Dashboard
- Take Attendance
- View Attendance History
- Student List
- Attendance Reports
- Update Profile
- Change Password
- Logout

---

## 🛠️ Technologies Used

| Technology | Purpose |
|------------|---------|
| PHP | Backend Development |
| MySQL | Database |
| HTML5 | Structure |
| CSS3 | Styling |
| Bootstrap 5 | Responsive UI |
| JavaScript | Client-side Functionality |
| XAMPP | Local Server |

---

## 📁 Project Structure

```text
Student-Attendance-Management-System/
│
├── Admin/
│   ├── dashboard.php
│   ├── manage_students.php
│   ├── manage_teachers.php
│   ├── manage_classes.php
│   ├── attendance.php
│   └── attendance_report.php
│
├── ClassTeacher/
│   ├── dashboard.php
│   ├── take_attendance.php
│   ├── attendance_history.php
│   ├── reports.php
│   └── profile.php
│
├── css/
├── js/
├── img/
├── Database/
│   └── attendance.sql
│
├── connection.php
├── login.php
├── logout.php
├── index.php
├── README.md
├── LICENSE
└── .gitignore
```

---

## 💾 Database

Create a database named:

```sql
attendance
```

Import the SQL file located in:

```
Database/attendance.sql
```

---

## ⚙️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/Student-Attendance-Management-System.git
```

### 2. Move Project

Copy the project folder into:

```
C:\xampp\htdocs\
```

### 3. Start XAMPP

Start:

- Apache
- MySQL

### 4. Create Database

Open:

```
http://localhost/phpmyadmin
```

Create database:

```
attendance
```

Import:

```
Database/attendance.sql
```

### 5. Run the Project

Open:

```
http://localhost/Student-Attendance-Management-System/
```

---

## 🔐 Default Login

### Admin

```
Username: admin
Password: admin123
```

### Teacher

```
Username: teacher
Password: teacher123
```

> **Note:** Update these credentials according to your database.

---

## 📸 Screenshots

### Login Page

<img src="Screenshots/login.png" width="800">

### Admin Dashboard

<img src="Screenshots/admin_dashboard.png" width="800">

### Teacher Dashboard

<img src="Screenshots/teacher_dashboard.png" width="800">

### Attendance Page

<img src="Screenshots/attendance.png" width="800">

---

## 🚀 Future Improvements

- Email Notifications
- QR Code Attendance
- Face Recognition Attendance
- SMS Alerts
- Export Reports to PDF & Excel
- Cloud Database Support
- Student Portal
- Parent Portal

---

## 🤝 Contributing

Contributions are welcome.

1. Fork the repository.
2. Create a new branch.
3. Commit your changes.
4. Push the branch.
5. Open a Pull Request.

---

## 📄 License

This project is licensed under the MIT License.

---

## 👨‍💻 Author

**Suman Acharya**

- 🎓 MCA Student
- 💻 Software Developer
- 📊 Data Analyst

### Connect with Me

- GitHub: https://github.com/suman1234Acharya
- LinkedIn: https://www.linkedin.com/
- Email: your-email@example.com

---

## ⭐ Support

If you found this project helpful, please consider giving it a ⭐ on GitHub!
