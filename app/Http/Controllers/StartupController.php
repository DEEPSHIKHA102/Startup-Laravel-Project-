<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartupController extends Controller
{
    // Mock data for startup dashboard
    private $startupData = [
        1 => [
            'name' => 'Innovative Startup LLC',
            'industry' => 'FinTech',
            'description' => 'Revolutionizing payment systems with blockchain technology.',
            'stage' => 'Series A',
            'founders' => ['Jane Smith', 'John Doe'],
            'founded_year' => 2025,
            'problem_statement' => 'Current payment systems are slow, expensive, and insecure',
            'solution_description' => 'Our blockchain technology enables instant, low-cost, secure transactions',
            'matched_corporates' => [
                ['id' => 1, 'name' => 'Tech Giant Inc.', 'match_score' => 85],
                ['id' => 2, 'name' => 'Global Finance Corp', 'match_score' => 72]
            ],
            'recent_activity' => [
                ['date' => '2025-05-12', 'action' => 'Pitch viewed by Tech Giant Inc.'],
                ['date' => '2025-05-08', 'action' => 'Connected with Global Finance Corp']
            ],
            'pitch_deck' => 'https://example.com/pitch_decks/1.pdf'
        ]
    ];

    // Mock corporate data
    private $corporates = [
        1 => [
            'id' => 1,
            'name' => 'Tech Giant Inc.',
            'industry' => 'Technology',
            'description' => 'Global technology leader seeking innovative startups.',
            'investment_focus' => ['AI', 'Cloud', 'Blockchain'],
            'match_score' => 85
        ],
        2 => [
            'id' => 2,
            'name' => 'Global Finance Corp',
            'industry' => 'Financial Services',
            'description' => 'Leading financial institution investing in FinTech innovations.',
            'investment_focus' => ['Payments', 'Blockchain', 'Security'],
            'match_score' => 72
        ],
        3 => [
            'id' => 3,
            'name' => 'Green Energy Partners',
            'industry' => 'Energy',
            'description' => 'Investing in sustainable energy solutions.',
            'investment_focus' => ['Solar', 'Battery', 'Smart Grid'],
            'match_score' => 45
        ]
    ];

    // Startup dashboard
    public function dashboard()
    {
        $startupId = session('user_id');
        $data = $this->startupData[$startupId] ?? [];
        
        return view('startup.dashboard', [
            'startup' => $data,
            'corporates' => array_slice($this->corporates, 0, 3) // Show top 3 recommended
        ]);
    }

    // Startup profile
    public function profile()
    {
        $startupId = session('user_id');
        $data = $this->startupData[$startupId] ?? [];
        
        return view('startup.profile', ['startup' => $data]);
    }

    // View pitch deck
    public function pitch()
    {
        $startupId = session('user_id');
        $data = $this->startupData[$startupId] ?? [];
        
        return view('startup.pitch', [
            'startup' => $data,
            'pitch_deck' => $data['pitch_deck'] ?? '#'
        ]);
    }

    // View matched corporates
    public function matches()
    {
        $startupId = session('user_id');
        $data = $this->startupData[$startupId] ?? [];
        
        return view('startup.matches', [
            'matched_corporates' => $data['matched_corporates'] ?? []
        ]);
    }
}