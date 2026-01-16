# KulliyyahQuiz 

## Group Information 
**Group Name**: Group 5
**Section**: 6

**Group Members** :
- AIZATUL MAZNI BINTI MAZLAN - 2316248
- ILHAM NADHIRAH BINTI SHAHRAN - 2316542
- YASMIN NURADILAH BINTI MOHD ZAINI - 2318356

## Project Overview

Introduction: 
KulliyyahQuiz is a web-based assessment platform designed for IIUM students and lecturers. The system modernizes the traditional paper-based quiz process by offering a digital, efficient, and user friendly solution. It provides secure login for all users, with different access levels for students, teachers, and administrators.

## Project Objectives

- To enable Teachers to easily create, manage, and publish quizzes, including the addition of various question types (MCQ and True/False) and setting key parameters like start/end times and attempt limits.
- To provide Students with a structured online interface for attempting quizzes, complete with a timer and randomized question order to ensure a standardized testing environment.
- To implement an automatic grading system that instantly calculates and records student scores upon quiz submission, thereby providing immediate feedback to students and reducing the manual workload for instructors.
- To develop a dedicated Teacher dashboard that displays analytics, including quiz attempts, average scores, and class performance, to enable effective monitoring of student progress.
- To design and implement a clear database structure utilizing the specified tables with well-defined Eloquent relationships for efficient data storage and retrieval.

## Target Users
- Students: Users who can view available quizzes, attempt quizzes, and track their performance history
- Teachers: Users who create, manage quizzes and monitor class performance
- Administrators: System managers who oversee the platform

## Features & Functionalities  

**Student Features**
- User Registration & Login: Secure account creation and authentication for IIUM students.
- Quiz Attempt: Take quizzes online with countdown timers, randomized questions, and auto-submit when time expires.
- Instant Results: Receive immediate grading feedback after submission.
- Profile Management: Update personal details and track academic progress
- Result History: Access past quiz scores and performance records.
- Quiz Browsing: View available, upcoming, and completed quizzes linked to subjects.

**Teacher Features**
- Quiz Creation & Management: Create, edit, delete quizzes with MCQ and True/False formats.
- Quiz Configuration: Set timers, attempt limits, schedules, and randomize question order.
- Publishing Quizzes: Assign quizzes to specific subjects and student groups.
- Automated Grading: System checks answers instantly and calculates scores.
- Performance Dashboard: View analytics such as average scores, attempts, and class performance trends.

**Admin Features**
- User Management: Add, edit, and delete student/teacher accounts securely.
- Subject Management: Organize subjects and ensure proper categorization for quizzes.
- System Data Management: Maintain consistency of records and enforce access rights.
- Monitoring & Control: Oversee overall system activity and ensure smooth operations.

## Technical Implementation  
**Technology Stack**

- Backend Framework: Laravel 10.x
- Frontend: Blade Templates with Bootstrap 5
- Database: MySQL 
- Authentication: Laravel 
- Image Storage: Laravel File Storage
- Development Environment: XAMPP

**Database Design**

Database Schema Overview: Our database consists of 7 main tables designed to handle users, subjects, quizzes, questions, attempts, and related data.

Core Tables:
- Users – Accounts for students, teachers, and admins with role-based access.
- Subjects – Information about kulliyyah subjects linked to quizzes.
- Quizzes – Quiz metadata (title, description, schedule, timer, attempt limits).
- Questions – Individual quiz questions (MCQ, True/False).
- Options – Possible answer choices for each question.
- Attempts – Records of student quiz attempts (linked to users and quizzes).
- Answers – Student-submitted answers for each attempt. 

### Entity Relationship Diagram (ERD)

[View ERD Document](https://docs.google.com/document/d/1M6yclEerBu4T9z1hcOYAC3hyxTxXBisTfYfN3EObr-4/edit?usp=sharing)

Key Relationships:
- Users → Quizzes (One-to-Many)
  One teacher can create many quizzes and each quiz belongs to one teacher.

- Subjects → Quizzes (One-to-Many)
One subject can have multiple quizzes and each quiz is tied to a single subject.

- Quizzes → Questions (One-to-Many)
A quiz contains multiple questions and each question belongs to one quiz.

- Questions → Options (One-to-Many)
A question can have multiple answer options and each option belongs to one question.

- Users ↔ Attempts ↔ Quizzes (Many-to-Many via Attempts)
A student can attempt a quiz multiple times and a quiz can be attempted by many students.

- Attempts → Answers (One-to-Many)
One attempt generates multiple answers and each answer belongs to one attempt.

- Questions → Answers (One-to-Many)
A question can have many submitted answers and ach answer is tied to one question.

**Laravel Components Implementation**

- Routes 
  
- Controllers
  
- Models & Relationships
  
- Views
- User Interface
  
  *Blade Templates Structure:*
  - file names

  *Design Features:*
  - Responsive Design: 
  - Color Scheme: 
  - Navigation: 
  - Interactive Elements: 

## User Authentication System 
### **Authentication Features**
- **Registration System**: Email validation, password confirmation, role selection
- **Login System**: Secure authentication with "Remember Me" option
- **Password Reset**: Email-based password recovery system
- **Role-Based Access**: Different dashboards for students and teachers as admin
- **Profile Management**: Users can update their information

### **Security Measures**
- Password encryption using Laravel's built-in hashing
- CSRF protection on all forms
- Input validation and sanitization
- Middleware protection for authenticated routes

## Installation and Setup Instructions 
### Prerequisites 
- PHP >= 8.1
- Composer
- Node.js and NPM
- MySQL 8.0
- XAMPP 

### Step-by-Step Installation

1. Clone the Repository

```bash
git clone https://github.com/[your-username]/KulliyyahQuiz.git/n
cd KulliyyahQuiz
```

2. Install Dependencies

```bash
composer install
npm install
```

3. Environment Configuration

```bash
cp .env.example .env
php artisan key:generate
```

4. Database Setup

```bash
# Configure database in .env file
php artisan migrate
php artisan db:seed
```

5. Start Development Server

```bash
php artisan serve
npm run dev 
```

## Testing and Quality Assurance 

### Functionality Testing

- User Registration & Login – Secure accounts with role-based dashboards.
- Quiz Browsing – Students view upcoming, active, and completed quizzes.
- Quiz Attempt – Timed quizzes, randomized questions, auto-submit.
- Grading & Results – Instant scoring, result history, performance analytics.
- Teacher Management – Create, edit, publish quizzes; view class reports.
- Admin Control – Manage users, subjects, and system data.
- Responsive Design – Works smoothly across desktop, tablet, and mobile.

### Browser Compatibility

-  Google Chrome (Latest)
-  Mozilla Firefox (Latest)
-  Safari (Latest)
-  Microsoft Edge (Latest)

### Performance Testing

- Page load times under 3 seconds
- Database queries optimized
- Image compression implemented
- Responsive design tested on multiple screen sizes

## Challenges Faced and Solutions 
### Challenge 1: Database Relationship
- Problem: Designing relationships between users, quizzes, questions, attempts, and answers was complex.
- Solution: Implemented clear ERD with proper one-to-many and many-to-many relationships using pivot tables.

### Challenge 2: Role-based Authentication
- Problem: Different access levels required for students, teachers, and admins.
- Solution: Applied middleware to check user roles and redirect to appropriate dashboards.
  
### Challenge 3: Timed Quiz & Auto-Submission
- Problem: Ensure that quizzes auto-submit shen the timer expires without errors.
- Solution: Used JavaScript countdown timers with backend validation to enforce submission rules.

### Challenge 4: Responsive Design
- Problem: Ensure usability across desktop, tablet and mobile devices.
- Solution: Designed with Bootstrap and Figma mockups to achieve mobile-friendly layouts. 

## Future Enhancements
### Phase 2 Features (Potential Improvements)
- **Real-time Notifications**: Push notifications for order updates
- **Advanced Analytics**: Detailed teacher reports using data visualization for specific question difficulty levels
- **Mobile App**: Native mobile application for iOS and Android
- **Monitoring Integration**: AI-based monitoring to ensure academic integrity during remote attempts

### Scalability Considerations

- Database optimization for larger datasets
- Caching implementation for improved performance
- API development for mobile app integration
- Load balancing for high traffic scenarios

## Learning Outcomes
### Technical Skills Gained

- Laravel Framework: Understanding of MVC architecture and Eloquent ORM
- Database Design: Creating efficient database schemas and relationships
- Authentication: Implementing secure user authentication systems
- Frontend Development: Building responsive interfaces with Bootstrap
- Version Control: Using Git and GitHub for project management

### Soft Skills Developed

- **Team Collaboration** : Working effectively in a group environment
- **Project Management** : Planning and executing a complex web application
- **Problem Solving** : Debugging and resolving technical challenges
- **Documentation** : Creating comprehensive project documentation
 
## Conclusion
  The KulliyyahQuiz project modernizes paper-based assessments by offering a secure, efficient, and user-friendly web platform for IIUM students and lecturers. With modules for authentication, quiz management, attempts, automated grading, results analysis, and admin control, it ensures fairness and streamlined workflows. Students gain instant feedback, teachers access powerful analytics, and admins maintain system integrity. Overall, the project enhances teaching and learning while equipping the team with valuable technical and soft skills, marking a key step toward digital transformation in academic assessment at IIUM.

### Key Achievements

- Developed a Complete Web-Based Quiz Platform: Successfully transformed paper-based assessments into a secure, efficient, and user-friendly digital system.
- Implemented Role-Based Authentication: Ensured separate dashboards and access levels for students, teachers, and admins.
- Automated Grading System: Built instant scoring and feedback features to reduce manual workload and improve fairness.
- Teacher Analytics Dashboard: Enabled performance tracking with class averages, attempt statistics, and learning trend reports.
- Responsive User Interface: Designed mobile-friendly layouts using Figma mockups and Bootstrap for accessibility across devices.

### Project Impact
This project provides practical experience in building real-world web applications and demonstrates the ability to work collaboratively in a team environment. The skills gained through this project are directly applicable to professional web development scenarios.

## References 
1. Welling, L., & Thomson, L. (2003). *PHP and MySQL Web Development*. Sams Publishing.  
2. Best Bootstrap Admin Templates and Themes 2026 | BootstrapMade. (2026).  
   [BootstrapMade.com](https://bootstrapmade.com/bootstrap-admin-templates/)

- Project Completion Date: 16/1/2025
- Course: INFO 3305 Web Application Development
