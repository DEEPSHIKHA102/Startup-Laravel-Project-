<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorporateController extends Controller
{
    // Mock data for corporate dashboard
    private $corporateData = [
        1 => [
            'name' => 'Tech Giant Inc.',
            'industry' => 'Technology',
            'description' => 'Global technology leader seeking innovative startups for partnership and acquisition.',
            'focus_areas' => ['AI', 'Cloud Computing', 'IoT'],
            'matched_startups' => [
                ['id' => 1, 'name' => 'Innovative Startup LLC', 'match_score' => 85],
                ['id' => 2, 'name' => 'NextGen AI', 'match_score' => 78]
            ],
            'recent_activity' => [
                ['date' => '2025-05-15', 'action' => 'Viewed NextGen AI profile'],
                ['date' => '2025-05-10', 'action' => 'Connected with Innovative Startup LLC']
            ]
        ]
    ];

    // Mock startup data for search
    private $startups = [
        1 => [
            'id' => 1,
            'name' => 'Innovative Startup LLC',
            'industry' => 'FinTech',
            'description' => 'Revolutionizing payment systems with blockchain technology.',
            'stage' => 'Series A',
            'match_score' => 85,
            'pitch_deck' => 'https://example.com/pitch1.pdf',
            'tags' => ['Blockchain', 'Payments', 'Security']
        ],
        2 => [
            'id' => 2,
            'name' => 'NextGen AI',
            'industry' => 'Artificial Intelligence',
            'description' => 'Advanced AI solutions for enterprise automation.',
            'stage' => 'Seed',
            'match_score' => 78,
            'pitch_deck' => 'https://example.com/pitch2.pdf',
            'tags' => ['Machine Learning', 'Automation']
        ],
        3 => [
            'id' => 3,
            'name' => 'GreenTech Solutions',
            'industry' => 'Clean Energy',
            'description' => 'Sustainable energy solutions for urban environments.',
            'stage' => 'Series B',
            'match_score' => 65,
            'pitch_deck' => 'https://example.com/pitch3.pdf',
            'tags' => ['Sustainability', 'Energy', 'Smart Cities']
        ]
    ];

    // Corporate dashboard
    public function dashboard()
    {
        $corporateId = session('user_id');
        $data = $this->corporateData[$corporateId] ?? [];
        
        return view('corporate.dashboard', [
            'corporate' => $data,
            'startups' => array_slice($this->startups, 0, 3) // Show top 3 recommended
        ]);
    }

    // Corporate profile
    public function profile()
    {
        $corporateId = session('user_id');
        $data = $this->corporateData[$corporateId] ?? [];
        
        return view('corporate.profile', ['corporate' => $data]);
    }

    // Search startups
    public function search(Request $request)
    {
        $query = $request->input('q', '');
        $industry = $request->input('industry', '');
        $stage = $request->input('stage', '');
        
        $results = array_filter($this->startups, function($startup) use ($query, $industry, $stage) {
            $matchesQuery = empty($query) || 
                           stripos($startup['name'], $query) !== false || 
                           stripos($startup['description'], $query) !== false;
            
            $matchesIndustry = empty($industry) || 
                              stripos($startup['industry'], $industry) !== false;
            
            $matchesStage = empty($stage) || 
                           stripos($startup['stage'], $stage) !== false;
            
            return $matchesQuery && $matchesIndustry && $matchesStage;
        });
        
        return view('corporate.search', [
            'startups' => $results,
            'searchParams' => $request->all()
        ]);
    }

    // View matched startups
    public function matches()
    {
        $corporateId = session('user_id');
        $data = $this->corporateData[$corporateId] ?? [];
        
        return view('corporate.matches', [
            'matched_startups' => $data['matched_startups'] ?? []
        ]);
    }
}