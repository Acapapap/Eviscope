<?php

namespace Database\Seeders;

use App\Models\DetectionRule;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Users
        $admin = User::create([
            'name' => 'System Admin',
            'username' => 'admin',
            'email' => 'admin@eviscope.my',
            'password' => Hash::make('password'),
            'role' => 'administrator',
            'account_status' => 'active',
        ]);

        User::create([
            'name' => 'Ahmad Rahman',
            'username' => 'a.rahman',
            'email' => 'a.rahman@eviscope.my',
            'password' => Hash::make('password'),
            'role' => 'investigator',
            'account_status' => 'active',
        ]);

        User::create([
            'name' => 'Nur Aisyah',
            'username' => 'n.aisyah',
            'email' => 'n.aisyah@eviscope.my',
            'password' => Hash::make('password'),
            'role' => 'investigator',
            'account_status' => 'active',
        ]);

        // Detection rules (name, description, type, severity, indicators)
        $rules = [
            ['Suspicious URL patterns', 'Flags odd TLDs, long or encoded links', 'URL', 'High', '.xyz,.top,%2F,login-secure,verify-account'],
            ['Domain spoofing', 'Lookalike domains of known brands', 'Domain', 'High', 'maybank2u-secure,cimbclicks-,bnm-gov,pbebank-'],
            ['Urgency keywords', '"Verify now", "account suspended"', 'Email content', 'Medium', 'verify now,account suspended,within 24 hours,urgent action'],
            ['Impersonation keywords', 'Bank, agency or executive names', 'Impersonation', 'Medium', 'maybank security team,bank negara,police,ceo'],
            ['Shortened links', 'bit.ly and similar redirectors', 'URL', 'Low', 'bit.ly,tinyurl.com,t.co,shorturl.at'],
        ];

        foreach ($rules as [$name, $desc, $type, $severity, $indicators]) {
            DetectionRule::create([
                'rule_name' => $name,
                'description' => $desc,
                'indicator_type' => $type,
                'severity' => $severity,
                'indicator' => $indicators,
                'rule_status' => 'enabled',
                'user_id' => $admin->id,
            ]);
        }
    }
}