# Laporan Tugas Besar Praktikum Web - Sisipan 2025/2026

**Identitas Mahasiswa**
*   **Nama:** Athaillah Sulthan Firasyal Ilmi
*   **NPM:** 233040102
*   **Link GitHub:** [https://github.com/AsfiCorp/233040102_AthaillahSulthanFirasyalIlmi_WebHukum.git](https://github.com/AsfiCorp/233040102_AthaillahSulthanFirasyalIlmi_WebHukum.git)

---

## 1. Penjelasan Singkat Aplikasi
Aplikasi yang dibangun adalah **"D'Mahesa Law Firm"**, sebuah platform profil digital (*Company Profile*) sekaligus *Content Management System* (CMS) dinamis yang didesain khusus untuk firma hukum profesional. Website ini memungkinkan administrator mengelola publikasi berita hukum, profil tim advokat, serta mengontrol tampilan antarmuka (UI) secara langsung melalui *dashboard*. Nilai tambah terbesar dari aplikasi ini adalah hadirnya **AI Virtual Legal Assistant** yang cerdas dan terintegrasi penuh dengan data dinamis website untuk melayani konsultasi pengunjung 24/7.

Aplikasi ini dikembangkan sebagai sistem berbasis web *full-stack* modern yang memenuhi dan bahkan melampaui standar kriteria Tugas Besar Praktikum Web.

## 2. Pemenuhan Ketentuan Aplikasi (Fitur Minimal)

### A. Teknologi yang Digunakan
*   **Framework:** Laravel 11.x / 12.x (dengan ekosistem Blade) dan PHP 8.x
*   **Styling:** Natively menggunakan **Tailwind CSS** dipadukan dengan *Vanilla CSS* kustom untuk menghasilkan antarmuka premium (warna gelap dan emas) bernuansa font *Playfair Display*.
*   **Database:** PostgreSQL (Production) / SQLite (Local).

### B. Halaman Depan (Front-end)
*   **Dynamic Landing Page:** Menampilkan *Hero Section* dengan latar belakang dan teks yang dinamis, daftar layanan/keahlian hukum, profil advokat unggulan, serta berita terkini.
*   **Bento Grid Contact Page:** Halaman kontak interaktif yang terhubung langsung ke kotak masuk (*inbox*) *database* admin beserta tautan instan ke WhatsApp.
*   **AI Chatbot Widget:** Fitur asisten virtual (*floating widget*) yang selalu siaga merespons pertanyaan pengunjung di seluruh halaman web.

### C. Halaman Dashboard Admin (Back-end)
Aplikasi memiliki *dashboard* terproteksi eksklusif untuk administrator dengan fitur:
*   **Dashboard Analytics:** Statistik ringkas jumlah advokat, publikasi berita, dan pesan/pertanyaan masuk dari klien.
*   **Advocate & News Management:** Kontrol CRUD penuh atas direktori pengacara dan publikasi artikel/berita firma.
*   **Web Settings System (CMS Lanjutan):** Panel kontrol tingkat lanjut di mana admin dapat mengubah Logo, *Background Hero*, judul halaman, teks kontak, tautan sosial media, hingga pengaturan Global SEO (Meta Deskripsi & Keywords) tanpa menyentuh kode pemrograman.

### D. Model & Database (Relasi)
Sistem menggunakan arsitektur *Relational Database*. Relasi utama yang diterapkan adalah **One-to-Many**.
*   **Entitas `User` (Admin) dan `News`**: Satu entitas Admin dapat mempublikasikan banyak artikel `News` (`admin_id` pada tabel `news` bertindak sebagai *foreign key*). Relasi `belongsTo` diterapkan pada model `News`.

### E. Fitur CRUDS (Create, Read, Update, Delete, Search)
*   **Entitas Advocates:** Admin dapat menambahkan pengacara baru (lengkap dengan nama, jabatan spesifik, dan foto resmi berjas), mengedit, menghapus, serta melihat direktori tim.
*   **Entitas News:** Admin dapat merilis berita firma orisinal (mendukung *Rich Text*) atau sekadar melampirkan referensi tautan berita eksternal (*External Source*).
*   **Search/Filter:** Fitur pencarian data *real-time* di halaman indeks admin untuk menemukan nama advokat atau judul berita secara efisien.

### F. Manajemen File & Gambar
*   **Upload Dinamis:** Tersedia fitur unggah (*upload*) untuk foto pengacara, *cover* berita, Logo Website, dan *Background Hero*.
*   **Validasi Aman:** File yang diunggah divalidasi secara ketat (harus berekstensi gambar yang valid dengan batasan maksimal ukuran *file* untuk menghemat beban server).
*   **Auto-Cleanup Storage:** Sistem secara otomatis menghapus gambar/file lama dari *storage* lokal/cloud ketika admin mengunggah gambar pengganti yang baru, guna mencegah penumpukan sampah data.

### G. Authentication & Authorization
*   Sistem autentikasi (*Login/Logout*) dibangun secara tangguh. Perlindungan rute menggunakan *middleware* (`auth`) memastikan hanya pengguna yang telah masuk yang dapat mengakses *dashboard* dan memanipulasi data.
*   Semua kata sandi dan token dilingkupi dengan sistem keamanan bawaan Laravel (CSRF protection & Hash Bcrypt) guna menjaga kerahasiaan (*confidentiality*) dan mencegah peretasan.

### H. Web Hosting & Deployment
*   Aplikasi sukses di-*deploy* pada lingkungan server *production* berbasis **Laravel Cloud**.
*   Praktik keamanan infrastruktur diterapkan dengan menyembunyikan variabel-variabel sensitif (seperti API Keys AI, kredensial Database, dan konfigurasi SMTP) ke dalam *Environment Variables* rahasia, sehingga sama sekali tidak bocor pada repositori *source code*.

---

## 3. Pemenuhan Bonus Nilai (Eksplorasi Tingkat Lanjut)

Untuk memaksimalkan nilai tambah Tugas Besar ini, saya telah berhasil mengeksplorasi sejumlah tantangan opsional (*advance*):

1.  **Integrasi Kecerdasan Buatan (Google Gemini AI API):** Menanamkan model AI canggih (*Gemini Flash*) sebagai "Virtual Legal Assistant". AI ini didesain responsif, profesional, dan interaktif.
2.  **Sistem Fallback Model AI (Anti-Down):** Untuk mencegah matinya layanan asisten virtual, sistem dibekali fitur *Auto-Fallback*. Jika API model utama (*Flash*) kelebihan beban (*Rate-limit/Overload*), aplikasi akan otomatis mengalihkan *request* ke model alternatif yang lebih ringan (`gemini-3.5-flash-lite` atau `gemini-2.5-flash-lite`).
3.  **Prompt Engineering Dinamis (Context-Aware):** Asisten AI tidak sekadar menggunakan instruksi statis. AI ini secara cerdas *"di-inject"* pengaturan *real-time* website dari *database*. Jika admin mengganti nomor WhatsApp atau alamat kantor di menu *Settings*, AI akan segera beradaptasi dan memberikan data kontak terbaru kepada pengunjung yang bertanya.
4.  **Ekspansi Menjadi CMS (Content Management System):** Transformasi sistem menjadi CMS seutuhnya, di mana kontrol visual (*Logo & Background*) dan SEO global website dapat diedit langsung oleh klien melalui *Dashboard Admin*.

---

## 4. Panduan Penggunaan Web Singkat

### 1. Eksplorasi Pengunjung Publik
*   Kunjungi situs utama. Jelajahi *Hero Section*, direktori keahlian, dan *News Insights*.
*   Buka widget **"Ask AI Assistant"** (ikon AI di sudut bawah). Ketik pertanyaan simulasi seperti: *"Siapa saja pengacara di firma ini?"* atau *"Bagaimana cara menjadwalkan konsultasi via WhatsApp?"*. AI akan memandu dengan memberikan nomor WhatsApp resmi kantor.

### 2. Memasuki Dashboard Admin
*   Akses halaman `/login`. Silakan masuk menggunakan kredensial *(Email & Password)* administratif yang telah disediakan terpisah demi menjaga kerahasiaan. 
*   Apabila kredensial lolos, Anda akan seketika masuk ke panel kontrol utama.

### 3. Mengelola Konten dan Pengaturan Web
*   Arahkan kursor ke menu navigasi **Advocates** atau **News** untuk menguji sistem manipulasi data (Menambah berita, menghapus data, dan mengunggah gambar).
*   Arahkan kursor ke menu **Settings**. Cobalah mengubah *Logo Website*, *Background Hero*, atau URL LinkedIn pada bagian bawah (Sosial Media). Tekan Simpan (*Save Settings*), lalu *refresh* halaman beranda utama, maka pembaruan akan seketika terjadi tanpa sentuhan *coding*.

---
*Laporan ini disusun dengan sebenar-benarnya untuk merepresentasikan fitur akhir dari pengembangan aplikasi D'Mahesa Law Firm.*
