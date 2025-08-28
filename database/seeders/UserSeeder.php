<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Konrix',
        //     'email' => 'konrix@coderthemes.com',
        //     'slug' => Str::slug('Konrix'),
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('password'),
        //     'remember_token' => Str::random(10),
        //     'role' => 'admin'
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'Abdee Putra',
            'email' => 'chestserva@gmail.com',
            'slug' => Str::slug('Abdee Putra'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Abe',
            'email' => 'abestore85@gmail.com',
            'slug' => Str::slug('Abe'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);
        
        \App\Models\User::factory()->create([
            'name' => 'Adinda Ratna Safira',
            'email' => '23arsafira@gmail.com',
            'slug' => Str::slug('Adinda Ratna Safira'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Advertorial FTNews',
            'email' => 'advertorial@forumterkininews.id',
            'slug' => Str::slug('Advertorial FTNews'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);
        
        \App\Models\User::factory()->create([
            'name' => 'A Ramadhan',
            'email' => 'agusrmd@gmail.com',
            'slug' => Str::slug('A Ramadhan'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Muhamad Nur Alfiyan',
            'email' => 'muhamad.n.alfiyan@gmail.com',
            'slug' => Str::slug('Muhamad Nur Alfiyan'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Amalia Maharani Izzati',
            'email' => 'amaliamaharaniizzati@gmail.com',
            'slug' => Str::slug('Amalia Maharani Izzati'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Ari Kayvan',
            'email' => 'arikayvan88@gmail.com',
            'slug' => Str::slug('Ari Kayvan'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Ario Vallentino Syahgatra',
            'email' => 'donvallentino8@gmail.com',
            'slug' => Str::slug('Ario Vallentino Syahgatra'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Ari Supriyanti Rikin',
            'email' => 'aririkin@gmail.com',
            'slug' => Str::slug('Ari Supriyanti Rikin'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Bayu Arkha',
            'email' => 'bawahtanahsaja@gmail.com',
            'slug' => Str::slug('Bayu Arkha'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);


        \App\Models\User::factory()->create([
            'name' => 'SARAH FIBA',
            'email' => 'Diarycala@gmail.com',
            'slug' => Str::slug('SARAH FIBA'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Diana Runtu',
            'email' => 'dianaruntu@yahoo.com',
            'slug' => Str::slug('Diana Runtu'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Yudha Marhaena S',
            'email' => 'dida.chiko@gmail.com',
            'slug' => Str::slug('Yudha Marhaena S'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Eriel Wira Natha',
            'email' => 'erielwiranatha01@gmail.com',
            'slug' => Str::slug('Eriel Wira Natha'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);


        \App\Models\User::factory()->create([
            'name' => 'Fahrul Alfiansyah',
            'email' => 'fahrulalfiansyah13@gmail.com',
            'slug' => Str::slug('Fahrul Alfiansyah'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Fqa Rahma',
            'email' => 'Fq4rahma@gmail.com',
            'slug' => Str::slug('Fqa Rahma'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Adam Erlangga',
            'email' => 'prasg76@gmail.com',
            'slug' => Str::slug('Adam Erlangga'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Hendra Mujiraharja',
            'email' => 'mujiraharjahendra@gmail.com',
            'slug' => Str::slug('Hendra Mujiraharja'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Imam Faishal',
            'email' => 'Imam.faishal@rocketmail.com',
            'slug' => Str::slug('Imam Faishal'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
        ]);


        \App\Models\User::factory()->create([
            'name' => 'Trisnawaty',
            'email' => 'naufalnisya@gmail.com',
            'slug' => Str::slug('Trisnawaty'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            
            \App\Models\User::factory()->create([
            'name' => 'Jabo',
            'email' => 'djalumeysha123@gmail.com',
            'slug' => Str::slug('Jabo'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Jayadi',
            'email' => 'gojay72@gmail.com',
            'slug' => Str::slug('Jayadi'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Ika Kartika',
            'email' => 'Ikamenteng69@gmail.com',
            'slug' => Str::slug('Ika Kartika'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Kesit B Handoyo',
            'email' => 'kesitbhandoyo@gmail.com',
            'slug' => Str::slug('Kesit B Handoyo'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Khalied Malvino',
            'email' => 'kmalvino1@gmail.com',
            'slug' => Str::slug('Khalied Malvino'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Nadya Nuraulia / RM',
            'email' => 'nadyanuraulia.aa@gmail.com',
            'slug' => Str::slug('Nadya Nuraulia / RM'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Agung Nugroho',
            'email' => 'nugroho.ftnews85@gmail.com',
            'slug' => Str::slug('Agung Nugroho'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Raka',
            'email' => 'pangesti85@gmail.com',
            'slug' => Str::slug('Raka'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Gusti Rafly Ramadhani / RM',
            'email' => 'ramadhaniraf04@gmail.com',
            'slug' => Str::slug('Gusti Rafly Ramadhani / RM'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Redaksi Forum Terkini News',
            'email' => 'redaksiforumterkininews@gmail.com',
            'slug' => Str::slug('Redaksi Forum Terkini News'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Ridwansyah Rakhman',
            'email' => 'wongiisip21@gmail.com',
            'slug' => Str::slug('Ridwansyah Rakhman'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Risqi Andriyana',
            'email' => 'risqixy@gmail.com',
            'slug' => Str::slug('Risqi Andriyana'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Roso Daras',
            'email' => 'rosodaras@gmail.com',
            'slug' => Str::slug('Roso Daras'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Rully Ardana / RM',
            'email' => 'rully.ardana@forumterkininews.id',
            'slug' => Str::slug('Rully Ardana / RM'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Salwa Rubia Darussalam / RM',
            'email' => 'salwarubiadarussalam.02@gmail.com',
            'slug' => Str::slug('Salwa Rubia Darussalam / RM'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Silvia Wulandari / RM',
            'email' => 'Silviawulandari531@gmail.com',
            'slug' => Str::slug('Silvia Wulandari / RM'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Siti Fakhriyatussyah Aribah / RM',
            'email' => 'Fakhriyatussyaharibah21@gmail.com',
            'slug' => Str::slug('Siti Fakhriyatussyah Aribah / RM'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            
            \App\Models\User::factory()->create([
            'name' => 'Tanti Sagittarini',
            'email' => 'tanti.sagitta@gmail.com',
            'slug' => Str::slug('Tanti Sagittarini'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'admin'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Budi Warsito',
            'email' => 'warsitobudi85@gmail.com',
            'slug' => Str::slug('Budi Warsito'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Yogi',
            'email' => 'Yogiyuwasta02@gmail.com',
            'slug' => Str::slug('Yogi'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Mad Yono',
            'email' => 'mdyono77@gmail.com',
            'slug' => Str::slug('Mad Yono'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);
            
            \App\Models\User::factory()->create([
            'name' => 'Yudi Permana',
            'email' => 'permanayudi90@yahoo.com',
            'slug' => Str::slug('Yudi Permana'),
            'email_verified_at' => now(),
            'password' => bcrypt('FTnews@@'),
            'remember_token' => Str::random(10),
            'role' => 'author'
            ]);

        
    }
}
