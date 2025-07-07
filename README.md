# Ruang Belajar - Platform Pembelajaran Digital

<p align="center">
    <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
    <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
    <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
    <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
    <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5">
    <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
    <img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
</p>

<p align="center">
    <img src="https://img.shields.io/badge/Education-Platform-blue?style=for-the-badge" alt="Education">
    <img src="https://img.shields.io/badge/Internship-Project-orange?style=for-the-badge" alt="Internship">
</p>

## Tentang Ruang Belajar

**Ruang Belajar** adalah platform pembelajaran digital yang dikembangkan selama masa magang di **Dinas Pendidikan & Kebudayaan Pasuruan**. Website ini dirancang untuk mendukung proses pembelajaran digital dengan menyediakan akses mudah terhadap materi pendidikan di berbagai tingkat.

Platform ini memungkinkan guru untuk mengunggah materi pembelajaran dan siswa untuk mengakses materi tersebut secara online, menciptakan lingkungan pembelajaran yang lebih fleksibel dan terjangkau.

### 🎯 Tujuan Proyek

- Mendukung transformasi digital pendidikan di Kabupaten Pasuruan
- Menyediakan akses mudah terhadap materi pembelajaran
- Memfasilitasi pembelajaran jarak jauh
- Meningkatkan efektivitas proses belajar mengajar

### ✨ Fitur Utama

#### 📚 Manajemen Materi
- **Upload Materi**: Guru dapat mengunggah berbagai jenis materi pembelajaran
- **Kategori Mata Pelajaran**: Pengorganisasian materi berdasarkan mata pelajaran
- **Tingkat Kelas**: Klasifikasi materi sesuai dengan tingkat pendidikan
- **Format Beragam**: Mendukung dokumen PDF, video, gambar, dan presentasi

#### 👥 Manajemen Pengguna
- **Multi-Role System**: Pembagian peran (Admin, Guru, Siswa)
- **Autentikasi Aman**: Sistem login yang aman dengan validasi
- **Profile Management**: Pengelolaan profil pengguna

#### 🔍 Pencarian & Navigasi
- **Pencarian Cerdas**: Pencarian materi berdasarkan judul, mata pelajaran, atau tingkat
- **Filter Kategori**: Filter berdasarkan mata pelajaran dan tingkat kelas
- **Navigasi Intuitif**: Antarmuka yang mudah dipahami dan digunakan


### 🛠️ Teknologi yang Digunakan

**Backend:**
- Laravel 10.x (PHP Framework)
- MySQL (Database)
- Laravel Sanctum (Authentication)
- Laravel Storage (File Management)

**Frontend:**
- HTML5 & CSS
- JavaScript (ES6+)
- Bootstrap 5
- Font Awesome Icons

**Tools & Services:**
- Composer (PHP Package Manager)
- NPM (Node Package Manager)
- Git (Version Control)

## 🚀 Instalasi

### Persyaratan Sistem

- PHP >= 8.1
- Composer
- MySQL >= 8.0
- Node.js & NPM
- Git
- Apache/Nginx Web Server

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/RuangBelajar.git
   cd RuangBelajar
   ```

2. **Install Dependencies**
   ```bash
   # Install PHP dependencies
   composer install
   
   # Install JavaScript dependencies
   npm install
   ```

3. **Environment Setup**
   ```bash
   # Copy environment file
   cp .env.example .env
   
   # Generate application key
   php artisan key:generate
   ```

4. **Database Configuration**
   
   Edit file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=rb
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Database Setup**
   ```bash
   # Create database
   mysql -u root -p -e "CREATE DATABASE ruang_belajar;"
   
   # Run migrations
   php artisan migrate
   
   # Seed database with sample data
   php artisan db:seed
   ```

6. **Storage Setup**
   ```bash
   # Create storage symlink
   php artisan storage:link
   
   # Set permissions (Linux/Mac)
   chmod -R 775 storage bootstrap/cache
   ```

7. **Build Assets**
   ```bash
   # Build assets for production
   npm run build
   
   # Or for development
   npm run dev
   ```

8. **Run Application**
   ```bash
   # Start development server
   php artisan serve
   ```

   Akses aplikasi di `http://localhost:8000`

## 📋 Penggunaan

### Untuk Admin
1. **Dashboard Admin**: Kelola seluruh sistem dan pengguna
2. **Manajemen Mata Pelajaran**: Tambah, edit, hapus mata pelajaran
3. **Manajemen Tingkat Kelas**: Atur tingkat kelas yang tersedia
4. **Monitoring**: Pantau aktivitas dan statistik penggunaan

### Untuk Guru
1. **Upload Materi**: Unggah materi pembelajaran dengan mudah
2. **Kelola Materi**: Edit, hapus, atau update materi yang sudah ada
3. **Kategorisasi**: Atur materi berdasarkan mata pelajaran dan tingkat

### Untuk Siswa
1. **Jelajahi Materi**: Cari dan akses materi berdasarkan mata pelajaran
2. **Filter Konten**: Filter materi berdasarkan tingkat kelas

## 📁 Struktur Proyek

```
RuangBelajar/
├── app/
│   ├── Http/Controllers/       # Controllers
│   ├── Models/                # Eloquent Models
│   ├── Policies/              # Authorization Policies
│   └── Services/              # Business Logic Services
├── database/
│   ├── migrations/            # Database Migrations
│   ├── seeders/              # Database Seeders
│   └── factories/            # Model Factories
├── public/
│   ├── akun/                 # User account related assets
│   ├── assets/               # Static assets (CSS, JS, images)
│   ├── css/                  # Stylesheets
│   ├── dist/                 # Distribution files
│   ├── FotoProfile/          # Profile photos storage
│   ├── img/                  # Images and graphics
│   ├── js/                   # JavaScript files
│   ├── laraview/             # Laravel view assets
│   ├── login/                # Login page assets
│   ├── materi/               # Learning materials storage
│   ├── scss/                 # SCSS source files
│   ├── thumbnail/            # Thumbnail images
│   ├── vendor/               # Third-party libraries
│   ├── .htaccess             # Apache configuration
│   ├── abc.jpg               # Sample image
│   ├── avatar.png            # Default avatar
│   ├── favicon.ico           # Website favicon
│   ├── index.php             # Entry point
│   ├── materi.css            # Material-specific styles
│   ├── robots.txt            # Search engine instructions
│   └── tes.jpg               # Test image
├── resources/
│   ├── views/                # Blade Templates
├── routes/
│   ├── web.php               # Web Routes
└── storage/
    └── app/public/           # File Storage
```

## 🔧 Konfigurasi

### File Upload Configuration

Edit `config/filesystems.php` untuk mengatur penyimpanan file:

```php
'disks' => [
    'public' => [
        'driver' => 'local',
        'root' => storage_path('app/public'),
        'url' => env('APP_URL').'/storage',
        'visibility' => 'public',
    ],
],
```


## 🧪 Testing

```bash
# Run all tests
php artisan test

```

## Note

Proyek ini dikembangkan sebagai bagian dari program magang di Dinas Pendidikan & Kebudayaan Pasuruan. Kontribusi dan saran untuk pengembangan lebih lanjut sangat diterima.



## 🙏 Acknowledgments

- **Laravel Framework** - Framework PHP yang powerful
- **Bootstrap** - Framework CSS untuk UI yang responsif
- **Font Awesome** - Icon library yang komprehensif
- **MySQL** - Database management system

## 📞 Kontak

Untuk pertanyaan atau saran terkait proyek ini:

- **Email**: [egawijaya355@gmail.com]

---

⭐ **Jika proyek ini bermanfaat, jangan lupa berikan star pada repository ini!**
