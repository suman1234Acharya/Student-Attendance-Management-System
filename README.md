# 🎓 Student Attendance Management System

<p align="center">
  <img src="https://img.shields.io/badge/Python-3.x-blue?style=for-the-badge&logo=python" />
  <img src="https://img.shields.io/badge/Streamlit-Web%20Application-FF4B4B?style=for-the-badge&logo=streamlit" />
  <img src="https://img.shields.io/badge/OpenCV-Face%20Recognition-5C3EE8?style=for-the-badge&logo=opencv" />
  <img src="https://img.shields.io/badge/Machine%20Learning-Attendance%20Automation-success?style=for-the-badge" />
  <img src="https://img.shields.io/badge/Status-Completed-brightgreen?style=for-the-badge" />
</p>

---

# 📖 Overview

**Student Attendance Management System** is an AI-powered attendance solution that automates student attendance using **Face Recognition**, **Computer Vision**, and **Machine Learning**. The system identifies students through a webcam, records attendance automatically, and stores attendance records efficiently.

This project reduces manual attendance errors, saves time, and provides an easy-to-use interface for educational institutions.

---

# 🎯 Objectives

- Automate student attendance using facial recognition.
- Eliminate manual attendance processes.
- Improve attendance accuracy.
- Store attendance records securely.
- Generate attendance reports.
- Provide a user-friendly interface for teachers and administrators.

---

# ✨ Features

- 🎥 Real-Time Face Detection
- 😊 Face Recognition-Based Attendance
- 👨‍🎓 Student Registration
- 📅 Automatic Attendance Logging
- 📊 Attendance Reports
- 📂 Student Database Management
- 📈 Dashboard for Attendance Analysis
- 🔒 Secure Data Storage
- ⚡ Fast and Accurate Recognition

---

# 🛠️ Technologies Used

- Python
- Streamlit
- OpenCV
- NumPy
- Pandas
- Scikit-learn
- Face Recognition
- SQLite / CSV (depending on implementation)

---

# 🧠 System Workflow

```
Student Registration
         │
         ▼
 Capture Face Images
         │
         ▼
 Face Encoding
         │
         ▼
 Store Face Data
         │
         ▼
 Live Webcam Detection
         │
         ▼
 Face Recognition
         │
         ▼
 Mark Attendance
         │
         ▼
 Save Attendance Record
```

---

# 📂 Project Structure

```
Student-Attendance-Management-System/
│
├── app.py
├── train_model.py
├── attendance.csv
├── students/
├── dataset/
├── models/
├── images/
├── requirements.txt
├── README.md
└── LICENSE
```

---

# 📋 Modules

### 👨‍🎓 Student Registration
- Add new students
- Capture face images
- Generate face encodings

### 🎥 Face Recognition
- Detect faces in real time
- Match with registered students
- Display recognized student details

### 📅 Attendance Management
- Automatically mark attendance
- Record date and time
- Prevent duplicate attendance entries

### 📊 Reports
- Daily attendance reports
- Student-wise attendance history
- Export attendance records

---

# 🤖 Machine Learning Workflow

1. Data Collection
2. Face Image Preprocessing
3. Face Encoding
4. Model Training
5. Face Detection
6. Face Recognition
7. Attendance Recording
8. Report Generation

---

# 📊 Key Features

- ✅ Face Detection
- ✅ Face Recognition
- ✅ Real-Time Attendance
- ✅ Attendance Analytics
- ✅ Student Management
- ✅ CSV/Database Storage
- ✅ Dashboard
- ✅ Report Export

---

# 🚀 Installation

## Clone the Repository

```bash
git clone https://github.com/suman1234Acharya/Student-Attendance-Management-System.git
```

## Navigate to the Project

```bash
cd Student-Attendance-Management-System
```

## Install Required Packages

```bash
pip install -r requirements.txt
```

---

# ▶️ Run the Application

```bash
streamlit run app.py
```

or

```bash
python app.py
```

(depending on your project setup)

---

# 💻 Example Output

```
✔ Face Detected

Student:
John Doe

Attendance:
Marked Successfully

Date:
2026-07-23

Time:
09:15 AM
```

---

# 📊 Visualizations

The project may include:

- 📈 Attendance Dashboard
- 👨‍🎓 Student List
- 📅 Attendance Calendar
- 📊 Attendance Statistics
- 🎥 Live Webcam Recognition
- 📉 Attendance Trends

---

# 📷 Screenshots

Add screenshots for:

- Home Dashboard
- Student Registration
- Face Recognition
- Attendance Report
- Live Camera Detection

Example:

```
images/dashboard.png
```

---

# 📚 Future Enhancements

- 🌐 Web-Based Admin Panel
- ☁️ Cloud Database Integration
- 📱 Mobile Attendance App
- 📧 Email Notifications
- 📥 Excel/PDF Report Export
- 🧠 Deep Learning Face Recognition
- 🌍 Multi-Camera Support
- 🔐 Role-Based Authentication

---

# 🤝 Contributing

Contributions are welcome!

1. Fork this repository.

2. Create a new feature branch.

```bash
git checkout -b feature/NewFeature
```

3. Commit your changes.

```bash
git commit -m "Add new feature"
```

4. Push the branch.

```bash
git push origin feature/NewFeature
```

5. Open a Pull Request.

---

# 👨‍💻 Author

**Shibnath Rana**

💻 GitHub  
https://github.com/shibnath31

🌐 Portfolio  
https://github.com/shibnath31/myportfolio

📧 Email  
your-email@example.com

---

# ⭐ Show Your Support

If you found this project useful, please consider giving it a **⭐ Star** on GitHub. Your support helps encourage further development and future open-source projects.

---

# 📄 License

This project is licensed under the **MIT License**.

---

<p align="center">
  <strong>Made with ❤️ using Python, Streamlit, OpenCV, and Machine Learning</strong><br><br>
  ⭐ <strong>If you like this project, don't forget to star the repository!</strong> ⭐
</p>
