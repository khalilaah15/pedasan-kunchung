# 🌶️ Pedasan Kunchung

Website resmi **Pedasan Kunchung** - destinasi utama bagi pecinta kuliner pedas di Indonesia. 

![Pedasan Kunchung](https://via.placeholder.com/1200x400/DC2626/FFFFFF?text=Pedasan+Kunchung+-+Development+Phase)

## 🚀 Status Project

🛠 **Early Development Phase** - Project baru dimulai dengan setup dasar Laravel 11.

## 📋 Current State

### 🏗️ Struktur Saat Ini (Default Laravel 11)
```
resources/
├── css/
│   ├── app.css      # Stylesheet utama
│   └── main.css     # Stylesheet tambahan
├── js/
│   ├── app.js       # JavaScript utama
│   ├── bootstrap.js # Bootstrap JavaScript
│   └── main.js      # JavaScript tambahan
└── views/
    ├── layouts/
    │   └── app.blade.php    # Layout utama
    ├── home.blade.php       # Halaman home
    └── welcome.blade.php    # Halaman welcome default
```

### 🌐 Routes yang Tersedia
- `GET /` - Welcome page (default Laravel)
- `GET /home` - Home page

## 🛠️ Tech Stack

### Current Setup
- **Laravel 11** - PHP framework
- **Vite** - Asset bundler
- **Blade** - Templating engine
- **Bootstrap** - CSS framework (default)

### Planning Phase
- Database MySQL (akan diintegrasikan)
- Authentication system
- Product management
- E-commerce features

## 🚀 Instalasi dan Development

### Prasyarat
- PHP 8.2+
- Composer
- Node.js 16+

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/khalilaah15/pedasan-kunchung.git
   cd pedasan-kunchung
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Jalankan Development Server**

   **Terminal 1** (Laravel):
   ```bash
   php artisan serve
   ```

   **Terminal 2** (Vite):
   ```bash
   npm run dev
   ```

5. **Akses Website**
   Buka http://localhost:8000

### Production Build
```bash
npm run build
```

## 🎯 Roadmap Development

### Phase 1: Setup Foundation ✅
- [x] Install Laravel 11
- [x] Configure Vite
- [x] Basic file structure

### Phase 2: Design System 🚧
- [ ] Custom color scheme (merah pedas)
- [ ] Brand typography
- [ ] Component library
- [ ] Responsive layout

### Phase 3: Content & Pages
- [ ] Homepage redesign
- [ ] About page
- [ ] Products page
- [ ] Contact page

### Phase 4: Functionality
- [ ] Database integration
- [ ] Product management
- [ ] Shopping cart
- [ ] User authentication

## 🔧 Development Workflow

### Mengembangkan Views
Edit file di `resources/views/`:
- `layouts/app.blade.php` - Layout utama
- `home.blade.php` - Halaman home
- `welcome.blade.php` - Halaman welcome

### Styling dengan Vite
- Edit `resources/css/app.css` untuk styles utama
- Gunakan `npm run dev` untuk real-time changes
- Import CSS/JS di `resources/js/app.js`

### Menambah Routes
Edit `routes/web.php`:
```php
Route::get('/about', function () {
    return view('about');
});
```

## 🎨 Customization Plan

### Brand Colors (Proposed)
```css
:root {
    --primary-red: #DC2626;    /* Merah pedas */
    --secondary-orange: #EA580C; /* Oranye */
    --accent-yellow: #F59E0B;   /* Kuning */
    --dark-red: #991B1B;        /* Merah tua */
}
```

### Typography Plan
- **Headings**: 'Poppins', sans-serif
- **Body**: 'Inter', sans-serif

## 📝 Catatan untuk Developer

### File yang Perlu Diubah Pertama:
1. `resources/views/layouts/app.blade.php` - Layout utama
2. `resources/views/welcome.blade.php` - Homepage
3. `resources/css/app.css` - Styling custom
4. `routes/web.php` - Routing aplikasi

### Langkah Selanjutnya yang Disarankan:
1. Setup database connection di `.env`
2. Buat Model Product
3. Buat migration untuk products table
4. Develop Blade components
5. Implement product catalog

## 🤝 Kontribusi

Project ini baru dimulai! Kontribusi sangat diterima:

1. Fork repository
2. Buat branch fitur (`git checkout -b feature/nama-fitur`)
3. Commit changes (`git commit -m 'Tambahkan fitur'`)
4. Push ke branch (`git push origin feature/nama-fitur`)
5. Buat Pull Request

## 🐛 Troubleshooting

### Vite Issues
```bash
npm run build
php artisan cache:clear
```

### Asset Not Loading
```bash
php artisan storage:link
npm install
npm run dev
```

## 📞 Kontak

**Developer**: khalilaah15
**Repository**: https://github.com/khalilaah15/pedasan-kunchung

---

## ⚠️ Important Notes

- **Database**: Belum diintegrasikan
- **Authentication**: Belum ada
- **Production Ready**: Tidak, masih development
- **Testing**: Belum diimplementasi

**🚧 Project dalam tahap awal pengembangan!**

---

**"Level Pedasmu, Kebanggaan Kami!"** 🌶️

© 2025 Pedasan Kunchung. All rights reserved.