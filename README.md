# 🦁 Natures-Legacy – Animal National Park Website

An interactive, wildlife-themed website designed to showcase animal species, manage safari bookings, and provide a seamless visitor experience.  
Built with **HTML**, **CSS**, **Bootstrap**, **PHP**, and **MySQL**.

---

## 🌟 Features

- **Wildlife Showcase** – Beautiful image galleries and detailed species information.
- **Safari Booking System** – Online booking with secure processing.
- **Visitor Interaction** – Contact forms, reviews, FAQs, and feedback submissions.
- **Role-Based Access** – Admin, Registered User, Visitor roles for better management.
- **Responsive UI** – Optimized for mobile, tablet, and desktop devices.
- **Secure Access Control** – Authentication and authorization for different user types.

---

## 🛠️ Technologies Used

| Category       | Technologies |
|----------------|--------------|
| Frontend       | HTML, CSS, Bootstrap |
| Backend        | PHP |
| Database       | MySQL |
| Version Control| Git, GitHub |
| Hosting (Local)| XAMPP / WAMP |

---

## 📂 Project Structure

Natures-Legacy/
│
├── assets/ # Images, CSS, JS files
├── pages/ # All main PHP pages
├── includes/ # Header, footer, reusable components
├── database/ # DB connection and SQL scripts
├── natures_legacy.sql # Database export file
└── README.md # Project documentation

yaml
Copy
Edit

---

## 🚀 Getting Started

Follow these steps to run the project locally.

### 1️⃣ Clone the Repository

git clone https://github.com/your-username/natures-legacy.git
2️⃣ Setup the Database
Open phpMyAdmin.

Create a new database named natures_legacy.

Import the provided natures_legacy.sql file.

3️⃣ Configure the Database Connection
Go to database/config.php and update with your MySQL credentials:

php

<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "natures_legacy";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
4️⃣ Run the Project
Place the project folder inside htdocs (for XAMPP) or www (for WAMP).

Start Apache and MySQL from your server control panel.

Open in your browser:

arduino

http://localhost/natures-legacy
👥 User Roles
Admin

Manage wildlife species data.

Approve/decline safari bookings.

Manage user reviews and feedback.

Registered User

Book safaris.

Submit reviews and feedback.

Access member-exclusive features.

Visitor

Browse wildlife showcase.

View public content.

Example:


📜 License
This project is licensed for educational purposes only.
You may use and modify it for personal or institutional use.

🤝 Contributing
Fork the repository.

Create your feature branch:

git checkout -b feature/YourFeature
Commit your changes:


git commit -m "Add YourFeature"
Push to the branch:


git push origin feature/YourFeature
Open a Pull Request.

💡 Author
Your Name
📧 Email: jainamsaraiya9@gmail.com
💼 LinkedIn: [https://www.linkedin.com/in/jainam-bharvad]



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
