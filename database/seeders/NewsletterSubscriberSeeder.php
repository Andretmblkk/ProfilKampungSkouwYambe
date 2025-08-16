<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsletterSubscriber;

class NewsletterSubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subscribers = [
            [
                'email' => 'test1@example.com',
                'status' => 'active',
                'subscribed_at' => now()->subDays(5),
            ],
            [
                'email' => 'test2@example.com',
                'status' => 'active',
                'subscribed_at' => now()->subDays(3),
            ],
            [
                'email' => 'test3@example.com',
                'status' => 'inactive',
                'subscribed_at' => now()->subDays(10),
                'unsubscribed_at' => now()->subDays(2),
            ],
        ];

        foreach ($subscribers as $subscriber) {
            NewsletterSubscriber::create($subscriber);
        }
    }
}
