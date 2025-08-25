<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting; // <-- ini wajib ada

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        Setting::updateOrCreate(
            ['name' => 'proposal_form'],
            ['value' => 'https://forms.gle/YOUR_FORM_LINK_HERE']
        );
    }
}
