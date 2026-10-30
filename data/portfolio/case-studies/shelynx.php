<?php
/* ============================================================
   * Case study — SHELYNX
   Read by case-study.php for /portfolio-new/shelynx/.
   Same shape as total-inspections.php (see the notes at the top of that
   file). Copy from the SHELYNX case study design; the screens are
   screenshots of the app and the agent portal.
   ============================================================ */
$csImg = 'pages/portfolio/case-studies/shelynx/';

return [
    'title'       => 'SHELYNX',
    'subtitle'    => 'Shop SHEIN through trusted local agents with secure ordering, faster delivery, and guided support.',
    'meta_title'  => 'SHELYNX case study | Media Clock',
    'description' => 'How Media Clock designed and built SHELYNX, a platform for shopping SHEIN through trusted local agents, with guided ordering, private chat and an agent portal.',

    'problem' => [
        'title'  => 'The challenge',
        'body'   => [
            'SHELYNX needed a structured way for shoppers to access SHEIN products through trusted agents while maintaining transparency, security, and ease of use.',
            'Agent coordination, order tracking, and customer communication also needed to stay simple, reliable, and fully manageable.',
        ],
        'visual' => [
            'device' => 'phone',
            'image'  => [$csImg . 'agent-products.webp', 'SHELYNX agent and products screen'],
            'label'  => 'SHELYNX agent and products screen',
        ],
    ],

    'approach' => [
        'title'    => 'The approach',
        'subtitle' => 'The platform combines Agent Marketplace and Guided Shopping Experience. Users can browse agents, place requests, and communicate privately.',
        'body'     => [
            'A guided ordering flow supports product links, size preferences, payment options, real-time updates, status previews, and secure confirmations.',
        ],
        'visual'   => [
            'device' => 'phone',
            'image'  => [$csImg . 'home.webp', 'SHELYNX home screen'],
            'label'  => 'SHELYNX home screen',
        ],
    ],

    'features' => [
        'title'  => 'Key features',
        'items'  => [
            ['Trusted Agent Network', 'Discover verified agents, compare ratings, and place orders with confidence.'],
            ['Separated Communication', 'Keep shopper-agent chats separate from internal agent tools.'],
            /* the design's "personalized", in Australian spelling */
            ['Custom Order Flow', 'Create and manage personalised SHEIN shopping experiences with clear tracking.'],
            ['Order & Agent Management', 'Preview, track, share status updates, and manage every request in one place.'],
        ],
        'visual' => [
            'device' => 'laptop',
            'image'  => [$csImg . 'agent-portal.webp', 'SHELYNX agent portal dashboard'],
            'label'  => 'SHELYNX agent portal desktop dashboard',
        ],
    ],

    'screens' => [
        'title'    => 'Platform experience',
        'subtitle' => 'Trusted agent shopping, private communication, and seamless SHEIN ordering in one platform.',
        'images'   => [
            [$csImg . 'agent-products.webp', 'SHELYNX agent and products screen'],
            [$csImg . 'place-order.webp', 'SHELYNX place order screen'],
            [$csImg . 'order-confirmed.webp', 'SHELYNX order confirmation screen'],
        ],
    ],

    'cta' => [
        'title'  => 'Build your next digital product with Media Clock',
        'button' => 'Talk to Media Clock',
    ],
];
