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
    // 'meta_title'  => 'SHELYNX case study | Media Clock',
    'meta_title'  => 'SHELYNX Case Study | Media Clock',
    // 'description' => 'How Media Clock designed and built SHELYNX, a platform for shopping SHEIN through trusted local agents, with guided ordering, private chat and an agent portal.',
    'description' => 'How Media Clock built SHELYNX, a platform for shopping SHEIN through trusted local agents, with guided ordering, private chat and an agent portal.', /* under 155 characters */

    'problem' => [
        // 'title'  => 'The challenge',
        'title'  => 'The Challenge',
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
        // 'title'    => 'The approach',
        'title'    => 'The Approach',
        // 'subtitle' => 'The platform combines Agent Marketplace and Guided Shopping Experience. Users can browse agents, place requests, and communicate privately.',
        'subtitle' => 'The platform combines an agent marketplace with a guided shopping experience. Users can browse agents, place requests, and communicate privately.',
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
        // 'title'  => 'Key features',
        'title'  => 'Key Features',
        'items'  => [
            ['Trusted Agent Network', 'Discover verified agents, compare ratings, and place orders with confidence.'],
            // ['Separated Communication', 'Keep shopper-agent chats separate from internal agent tools.'],
            ['Separate Communication Channels', 'Keep shopper-agent chats separate from internal agent tools.'], /* tester's bug list #15 */
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
        // 'title'    => 'Platform experience',
        'title'    => 'Platform Experience',
        'subtitle' => 'Trusted agent shopping, private communication, and seamless SHEIN ordering in one platform.',
        'images'   => [
            // [$csImg . 'agent-products.webp', 'SHELYNX agent and products screen'],
            /* tester's bug list #16: the first screen repeated "The challenge" one. How It Works
               is from the app screenshots on the SHELYNX website (shienapp-project/sheinapp-html),
               cut out of its phone frame; it reads as the start of the flow the next two finish. */
            [$csImg . 'how-it-works.webp', 'SHELYNX How It Works screen listing the ordering steps'],
            [$csImg . 'place-order.webp', 'SHELYNX place order screen'],
            [$csImg . 'order-confirmed.webp', 'SHELYNX order confirmation screen'],
        ],
    ],

    'cta' => [
        // 'title'  => 'Build your next digital product with Media Clock',
        'title'  => 'Build Your Next Digital Product with Media Clock',
        'button' => 'Talk to Media Clock',
    ],
];
