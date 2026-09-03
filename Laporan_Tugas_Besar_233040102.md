# Laporan Tugas Besar Praktikum Web - Sisipan 2025/2026

**Identitas Mahasiswa**
*   **Nama:** Athaillah Sulthan Firasyal Ilmi
*   **NPM:** 233040102
*   **Nama Repository:** 233040102_AthaillahSulthanFirasyalIlmi_WebHukum

---

## 1. Penjelasan Singkat Aplikasi
Aplikasi yang dibangun adalah "D'Mahesa Law Firm", sebuah platform profil digital (*Company Profile*) dan sistem manajemen konten (CMS) untuk kantor hukum. Website ini memungkinkan administrator untuk mempublikasikan berita/artikel hukum (Firm News & External Sources) serta mengelola profil para pengacara (Advocates). Selain itu, aplikasi dilengkapi dengan fitur AI Assistant terintegrasi yang berfungsi sebagai asisten konsultasi virtual untuk pengunjung.

Aplikasi ini memenuhi seluruh kriteria Tugas Besar Praktikum Web karena dikembangkan sebagai aplikasi berbasis website secara *full-stack*.

## 2. Pemenuhan Ketentuan Aplikasi (Fitur Minimal)

### A. Teknologi yang Digunakan
*   **Framework:** Laravel 12.x (dengan ekosistem Blade) dan PHP 8.x
*   **Styling:** Natively menggunakan **Tailwind CSS** (Breeze/Filament/Bootstrap tidak digunakan).
*   **Database:** PostgreSQL (Production) / SQLite (Local).

### B. Halaman Depan (Front-end)
Aplikasi memiliki halaman publik (*landing page*) yang elegan untuk pengunjung web.
*   Menampilkan profil kantor hukum, daftar pengacara (Our People), dan berita terkini (News & Insights).
*   Terdapat formulir kontak dan tombol "Ask AI Assistant" untuk berinteraksi langsung.

### C. Halaman Dashboard Admin (Back-end)
Aplikasi memiliki halaman dashboard terproteksi yang khusus dapat diakses oleh administrator (Master Data).
*   Tersedia navigasi pengelolaan data *Advocates*, *News*, dan *Settings*.
*   Admin dapat mengontrol data apa saja yang akan tampil ke halaman depan pengunjung.

### D. Model & Database (Relasi)
Aplikasi menggunakan sistem database relasional. Relasi utama yang diterapkan adalah **One-to-Many**.
*   **Entitas `User` (Admin) dan `News`**: Satu entitas User (Admin) dapat memiliki banyak artikel `News` (`admin_id` pada tabel `news` sebagai foreign key). Hal ini diterapkan pada model `News.php` yang berelasi `belongsTo` dengan model `User.php`.

### E. CRUDS (Create, Read, Update, Delete, Search)
Terdapat fitur CRUD lengkap dan pencarian data:
*   **Entitas Advocates:** Admin dapat menambahkan pengacara baru, mengedit data, menghapus, serta melihat daftarnya.
*   **Entitas News:** Admin dapat menulis berita baru, mengedit, dan menghapus artikel.
*   **Search/Filter:** Fitur pencarian data (Search) tersedia di halaman indeks admin untuk memfilter daftar pengacara dan berita secara mudah berdasarkan kata kunci pencarian.

### F. Mengelola Gambar
*   Fitur unggah gambar (*upload*) tersedia pada pengisian formulir Advocates (Foto Pengacara) dan News (Cover Berita).
*   Terdapat validasi file gambar khusus (format `.jpg` atau `.png` dengan batas ukuran maksimal 2MB).
*   *Catatan Tambahan:* Pada level produksi, unggahan file terintegrasi sempurna dengan arsitektur penyimpanan eksternal (Buckets/S3) untuk memastikan file persisten.

### G. Authentication & Authorization
*   Sistem Auth (Login, Register, Logout) dibangun secara **manual** menggunakan fitur native dari Laravel (tanpa bantuan modul instan terlarang).
*   Middlewares (seperti *auth* dan pengecekan otorisasi) diimplementasikan secara ketat agar hanya pengguna berstatus *admin* yang dapat memodifikasi data.

### H. Web Hosting
*   Aplikasi telah berhasil di-*deploy* secara *online* menggunakan platform **Laravel Cloud**.
*   Domain custom .com yang telah terkoneksi penuh serta database sukses bermigrasi di lingkungan server *production*.

---

## 3. Pemenuhan Bonus Nilai (Eksplorasi Opsional)
Saya juga telah mengeksplorasi tantangan opsional (*advance*) yang disediakan untuk memaksimalkan nilai tambah:

1.  **Terhubung API Publik (Open API):** Terintegrasi langsung dengan ekosistem API dari Google (Gemini AI).
2.  **Integrasi AI Canggih:** Sebagai wujud eksplorasi tingkat lanjut, aplikasi ditanamkan kecerdasan buatan (*Gemini 1.5 Flash Model*) yang hadir dalam bentuk AI Assistant interaktif untuk berdialog layaknya konsultan hukum.
3.  **Menggunakan Login API (Google OAuth):** Fitur *Single Sign-On* (SSO) menggunakan akun Google telah diaktifkan. Administrator dapat masuk secara instan tanpa perlu mengetik kata sandi manual, cukup menggunakan modul Socialite.
4.  **Deploy Integrasi Ke Cloud:** Pengaturan Environment Variables dan API Keys rahasia (seperti OAuth ID, SMTP, `GEMINI_API_KEY`, dan kredensial penyimpanan Bucket S3) berhasil diamankan tanpa diekspos secara sembarangan di repositori publik.

---

## 4. Panduan Penggunaan Web

### 1. Akses Halaman Pengunjung (Public)
*   Buka situs utama [D'Mahesa Law Firm](https://dmahesa-law-firm.com). Anda dapat langsung menjelajahi informasi layanan, susunan tim hukum, dan membaca berita.
*   Klik ikon/tombol berwarna emas bertuliskan **"Ask AI Assistant"** di sudut halaman. Coba tanyakan studi kasus atau definisi istilah hukum padanya.

### 2. Menggunakan Fitur Login
*   Klik menu **LOGIN** di navigasi utama web (pojok kanan atas).
*   Anda bisa langsung mengklik tulisan *Sign In with Google* (Login API) untuk mencoba kemudahannya.

### 3. Eksplorasi Halaman Dashboard Admin
*   Setelah login sukses, menu baru bernama **ADMIN** akan muncul. Klik menu tersebut untuk memasuki Dashboard.
*   **Mengelola Pengacara (Advocates):** Arahkan ke tab *Advocates*, lalu coba cari nama pengacara di kotak **Search**, atau klik **Add New** untuk menambah data beserta foto pengacara.
*   **Mengelola Berita (News):** Arahkan ke tab *News*, Anda bisa memilih membuat berita orisinal (mengisi *title*, *content*, mengunggah *cover*) atau cukup melampirkan tautan berita eksternal dari portal hukum lain.
*   **Pengaturan Umum:** Pada tab *Settings*, Anda bisa menyunting URL atau Nomor WhatsApp utama yang terhubung langsung ke tombol konsultasi pada situs depan.
