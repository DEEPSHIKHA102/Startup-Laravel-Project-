<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Show home page
    public function home()
    {
        return view('pages.home', [
            'featured_startups' => [
                [
                    'name' => 'Innovative Startup LLC',
                    'industry' => 'FinTech',
                    'description' => 'Blockchain-based payment solutions',
                    'logo' => '/images/startup1.jpg',
                    'stage' => 'Series A'
                ],
                [
                    'name' => 'NextGen AI',
                    'industry' => 'Artificial Intelligence',
                    'description' => 'Enterprise AI automation tools',
                    'logo' => '/images/startup2.jpg',
                    'stage' => 'Seed'
                ]
            ],
            'featured_corporates' => [
                [
                    'name' => 'Tech Giant Inc.',
                    'industry' => 'Technology',
                    'description' => 'Seeking AI and blockchain innovations',
                    'logo' => '/images/corp1.jpg',
                    'focus_areas' => ['AI', 'Cloud', 'Blockchain']
                ],
                [
                    'name' => 'Global Finance Corp',
                    'industry' => 'Financial Services',
                    'description' => 'Investing in FinTech disruption',
                    'logo' => '/images/corp2.jpg',
                    'focus_areas' => ['Payments', 'Blockchain', 'Security']
                ]
            ],
            'success_stories' => [
                [
                    'title' => '$50M Partnership Formed',
                    'description' => 'Tech Giant partnered with AI Startup after connecting on our platform',
                    'date' => '2025-05-02'
                ]
            ]
        ]);
    }

    // Show about page
    public function about()
    {
        return view('pages.about', [
            'team' => [
                [
                    'name' => 'John Doe',
                    'role' => 'CEO',
                    'bio' => 'Serial entrepreneur with 3 successful exits',
                    'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80',
                    'twitter' => '#',
                    'linkedin' => '#'
                ],
                [
                    'name' => 'Jane Smith',
                    'role' => 'CTO',
                    'bio' => 'Former tech lead at Fortune 500 company',
                    'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80',
                    'twitter' => '#',
                    'linkedin' => '#'
                ],
                [
                    'name' => 'Alex Johnson',
                    'role' => 'Head of Partnerships',
                    'bio' => 'Ex-investment banker with VC experience',
                    'image' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80',
                    'twitter' => '#',
                    'linkedin' => '#'
                ]
            ],
            'stats' => [
                [
                    'value' => '250+',
                    'label' => 'Startups',
                    'icon' => 'fas fa-rocket'
                ],
                [
                    'value' => '100+',
                    'label' => 'Corporate Partners',
                    'icon' => 'fas fa-building'
                ],
                [
                    'value' => '$1.2B',
                    'label' => 'Funding Facilitated',
                    'icon' => 'fas fa-hand-holding-usd'
                ]
            ]
        ]);
    }

    // Show contact page
    public function contact()
    {
        return view('pages.contact', [
            'offices' => [
                [
                    'location' => 'kanpur utter pradesh',
                    'email' => 'deepshi123@gmail.com',
                    'phone' => '+919580258759',
                    'address' => 'Sector 34, Sadar bajar Kanpur utter pradesh'
                ],
                [
                    'location' => 'Mumbai Maharastra',
                    'email' => 'anshi123@.com',
                    'phone' => '+917284793489',
                    'address' => 'sector 45, Satara Mumbai'
                ]
            ]
        ]);
    }
}