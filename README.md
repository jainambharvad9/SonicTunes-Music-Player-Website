# 🎵 SonicTunes – Laravel Music Player Website

A modern, dynamic **online music streaming platform** built with **Laravel** and **MySQL**, designed for smooth audio playback and robust content management.  
Features a **custom-designed user interface** and a powerful **admin panel** for managing songs, albums, artists, and playlists.

---

## 🌟 Features

- **🎶 Music Playback** – Seamless play, pause, next, and previous controls.
- **📂 Song Management** – Admin can add, edit, and delete songs.
- **🎤 Artist & Album Management** – Organize songs by artist, genre, and album.
- **📱 Responsive UI** – Fully optimized for desktop, tablet, and mobile devices.
- **🎨 Custom Design** – Unique, hand-crafted interface for both user and admin sides.
- **🔍 Advanced Search** – Find songs by title, artist, genre, or album.
- **🎧 Playlist Support** – Users can browse songs grouped in playlists.

---

## 🛠️ Technologies Used

| Category       | Technologies |
|----------------|--------------|
| Framework      | Laravel 10+ |
| Backend        | PHP 8+ |
| Database       | MySQL |
| Frontend       | HTML, CSS, Bootstrap, JavaScript |
| Audio Playback | HTML5 Audio API |
| Version Control| Git, GitHub |
| Hosting (Local)| XAMPP / Laravel Valet / Artisan Serve |

---
---

## 🚀 Getting Started

Follow these steps to set up the project locally:

### 1️⃣ Clone the Repository

git clone https://github.com/your-username/sonictunes.git

2️⃣ Install Dependencies

cd sonictunes

composer install

npm install && npm run dev

3️⃣ Configure the Environment

Copy .env.example to .env:


cp .env.example .env

Update .env with your database credentials:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=sonictunes_db

DB_USERNAME=root

DB_PASSWORD=


4️⃣ Run Migrations & Seed Data

php artisan migrate --seed

5️⃣ Serve the Application


php artisan serve
Open in browser:

http://127.0.0.1:8000

👥 User Roles
Admin
Add, edit, and delete songs.

Manage artists, albums, and genres.

Organize playlists.

View all uploaded tracks.

User
Browse and stream songs.

Search by title, artist, genre, or album.

Play songs with smooth navigation.


📜 License
This project is licensed for educational and personal use only.
For commercial use, please contact the author.

🤝 Contributing
Fork the repository.

Create a new branch:

git checkout -b feature/YourFeature
Commit your changes:

git commit -m "Add YourFeature"
Push the branch:

git push origin feature/YourFeature
Open a Pull Request.

💡 Author Jainam Saraiya

📧 Email: jainamsaraiya9@gmail.com

🌐 Portfolio: [https://www.linkedin.com/in/jainam-bharvad]

💼 LinkedIn: [your-linkedin-link]


---

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
