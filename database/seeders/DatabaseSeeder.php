<?php

namespace Database\Seeders;

use App\Models\Advocate;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Default admin user
        $admin = User::create([
            'name' => 'Admin D\'Mahesa',
            'email' => 'admin@dmahesa.com',
            'password' => Hash::make('password'),
        ]);

        // Advocates from the UI
        $advocates = [
            ['name' => 'Adam Hasan', 'role' => 'Advocate', 'short_story' => 'Adam Hasan SH, S.Pt, MH, ME, CLA, CIL — Senior Partner dengan keahlian dalam litigasi perusahaan, audit hukum, dan hukum perdagangan internasional. Beliau memimpin divisi restrukturisasi perusahaan dan sengketa perdagangan internasional di D\'Mahesa.'],
            ['name' => 'Herman Subekti', 'role' => 'Advocate', 'short_story' => 'Herman Subekti SH — Partner yang berpengalaman dalam bidang hukum perdata dan hukum bisnis. Telah menangani berbagai kasus kompleks selama lebih dari satu dekade.'],
            ['name' => 'AR Enggang Simpathy', 'role' => 'Advocate', 'short_story' => 'AR Enggang Simpathy SH, C.Me, CIL — Associate yang berfokus pada mediasi dan hukum internasional. Memiliki sertifikasi mediator dan pengalaman dalam penyelesaian sengketa alternatif.'],
            ['name' => 'Dedi Junaedi', 'role' => 'Advocate', 'short_story' => 'Dedi Junaedi SH — Associate yang menangani kasus-kasus hukum perdata dan kriminal dengan dedikasi tinggi.'],
            ['name' => 'Muhammad', 'role' => 'Advocate', 'short_story' => 'Muhammad SH — Associate muda yang bersemangat dengan keahlian dalam hukum ketenagakerjaan dan hukum perusahaan.'],
            ['name' => 'Sarlin Wagola', 'role' => 'Advocate', 'short_story' => 'Sarlin Wagola SH — Associate perempuan yang berpengalaman dalam hukum keluarga dan perlindungan konsumen.'],
            ['name' => 'Moch Amiruddin', 'role' => 'Paralegal', 'short_story' => 'Moch Amiruddin — Paralegal profesional yang mendukung tim advokat dalam riset hukum dan administrasi kasus.'],
        ];

        foreach ($advocates as $advocate) {
            Advocate::create($advocate);
        }

        // Sample news articles
        $news = [
            [
                'title' => 'D\'Mahesa Wins Landmark Arbitration Case',
                'content' => "In a watershed moment for international commercial law, D'Mahesa Legal Group has successfully secured a decisive victory in a complex cross-border arbitration case held in Singapore.\n\nThe ruling not only vindicates our client, a prominent multinational infrastructure conglomerate, but also establishes a significant precedent regarding the interpretation of force majeure clauses in long-term supply contracts amidst geopolitical instability.\n\nThe Core of the Dispute\n\nAt the heart of the matter was a sophisticated supply agreement involving entities across three different jurisdictions. The opposing counsel argued that unforeseen regulatory shifts in a transit country constituted a valid force majeure event, thereby excusing their failure to deliver critical components.\n\nThrough meticulous discovery and the presentation of compelling expert testimony, D'Mahesa successfully demonstrated that the alleged regulatory changes were entirely foreseeable and could have been mitigated through commercially reasonable alternative routing.",
                'type' => 'internal',
                'external_url' => null,
                'admin_id' => $admin->id,
            ],
            [
                'title' => 'Global Economic Shifts in 2024: Impact on Indonesian Law',
                'content' => 'An analysis of changing regulatory environments and their impact on international trade agreements affecting Indonesian businesses.',
                'type' => 'external',
                'external_url' => 'https://www.hukumonline.com',
                'admin_id' => $admin->id,
            ],
            [
                'title' => 'Navigating Digital Asset Regulations in Indonesia',
                'content' => 'Understanding the evolving legal landscape surrounding cryptocurrencies and decentralized finance platforms in the Indonesian regulatory framework.',
                'type' => 'external',
                'external_url' => 'https://www.ojk.go.id',
                'admin_id' => $admin->id,
            ],
            [
                'title' => 'Update Regulasi Hukum Perusahaan 2024',
                'content' => "Perkembangan terbaru dalam hukum perusahaan Indonesia memberikan implikasi signifikan bagi para pelaku bisnis.\n\nPerubahan dalam Undang-Undang Perseroan Terbatas memberikan fleksibilitas lebih bagi perusahaan dalam mengelola struktur modal mereka.\n\nImplikasi Praktis\n\nPerusahaan perlu memperhatikan beberapa aspek kritis dalam implementasi regulasi baru ini, termasuk persyaratan pelaporan yang diperbarui dan mekanisme perlindungan pemegang saham yang diperkuat.",
                'type' => 'internal',
                'external_url' => null,
                'admin_id' => $admin->id,
            ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}
