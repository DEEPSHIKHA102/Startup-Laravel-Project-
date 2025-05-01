<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchingController extends Controller
{
    // Combined mock data for matches
    private $data = [
        'corporates' => [
            1 => [
                'id' => 1,
                'name' => 'Tech Giant Inc.',
                'industry' => 'Technology',
                'description' => 'Global technology leader seeking innovative startups.',
                'investment_focus' => ['AI', 'Cloud', 'Blockchain'],
                'contact' => 'corporate.relations@techgiant.com'
            ]
        ],
        'startups' => [
            1 => [
                'id' => 1,
                'name' => 'Innovative Startup LLC',
                'industry' => 'FinTech',
                'description' => 'Revolutionizing payment systems with blockchain technology.',
                'stage' => 'Series A',
                'contact' => 'hello@innovativestartup.com'
            ]
        ],
        'matches' => [
            '1_1' => [ // Corporate 1 and Startup 1
                'score' => 85,
                'compatibility' => [
                    'Industry Alignment' => 80,
                    'Technology Fit' => 90,
                    'Growth Potential' => 85,
                    'Cultural Fit' => 75
                ],
                'messages' => [
                    [
                        'sender' => 'corporate',
                        'text' => 'We are impressed with your technology and would like to explore a potential partnership.',
                        'date' => '2025-05-10'
                    ],
                    [
                        'sender' => 'startup',
                        'text' => 'Thank you for your interest! We would be happy to discuss opportunities.',
                        'date' => '2025-05-11'
                    ]
                ]
            ]
        ]
    ];

    // Show match details
    public function show($id)
    {
        $userType = session('user_type');
        $userId = session('user_id');
        
        if ($userType === 'corporate') {
            $matchKey = $userId . '_' . $id;
            $startup = $this->data['startups'][$id] ?? null;
            $match = $this->data['matches'][$matchKey] ?? null;
            
            if (!$startup || !$match) {
                abort(404);
            }
            
            return view('matching.details', [
                'corporate' => $this->data['corporates'][$userId],
                'startup' => $startup,
                'match' => $match,
                'userType' => $userType
            ]);
        } elseif ($userType === 'startup') {
            $matchKey = $id . '_' . $userId;
            $corporate = $this->data['corporates'][$id] ?? null;
            $match = $this->data['matches'][$matchKey] ?? null;
            
            if (!$corporate || !$match) {
                abort(404);
            }
            
            return view('matching.details', [
                'corporate' => $corporate,
                'startup' => $this->data['startups'][$userId],
                'match' => $match,
                'userType' => $userType
            ]);
        }
        
        abort(403);
    }

    // Handle connection request
    public function connect($id)
    {
        $userType = session('user_type');
        $userId = session('user_id');
        
        // In a real app, this would create a connection record
        // For our mock, we'll just redirect back with a success message
        
        return back()->with('success', 'Connection request sent successfully!');
    }

    // Show all matches (for both corporate and startup)
    public function index()
    {
        $userType = session('user_type');
        $userId = session('user_id');
        
        $matches = [];
        
        if ($userType === 'corporate') {
            $corporate = $this->data['corporates'][$userId] ?? null;
            if ($corporate) {
                foreach ($corporate['matched_startups'] ?? [] as $match) {
                    $startup = $this->data['startups'][$match['id']] ?? null;
                    if ($startup) {
                        $matches[] = array_merge($startup, ['match_score' => $match['match_score']]);
                    }
                }
            }
        } elseif ($userType === 'startup') {
            $startup = $this->data['startups'][$userId] ?? null;
            if ($startup) {
                foreach ($startup['matched_corporates'] ?? [] as $match) {
                    $corporate = $this->data['corporates'][$match['id']] ?? null;
                    if ($corporate) {
                        $matches[] = array_merge($corporate, ['match_score' => $match['match_score']]);
                    }
                }
            }
        }
        
        return view('matching.results', [
            'matches' => $matches,
            'userType' => $userType
        ]);
    }
}