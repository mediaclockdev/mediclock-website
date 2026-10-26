<?php
/* ============================================================
   * Visitor confirmation emails — one entry per form_type
   send-contact.php emails the team first, then sends the visitor the entry
   matching the form's form_type (built by includes/mail/confirmation.php).
   A form_type with no entry here gets 'contact'.

   Placeholders, filled at send time (each has a safe fallback, so a missing
   field never shows the raw {token} to a visitor):
     {first_name}  first word of the name                 fallback 'there'
     {position}    careers: role applied for              fallback 'the role'
     {service}     RFP: service picked                    fallback 'your project'
     {in_city}     ' in Melbourne' from lp/csd source     fallback ''
     {from_page}   ' after viewing our portfolio'         fallback ''
                   (quote popup, from $quote_context)

   Keys:
     subject, heading   one line each
     paragraphs         body text, one string per paragraph (plain text, no HTML)
     next_steps         numbered "What happens next" list; [] hides it
     cta                ['label' => ..., 'path' => 'portfolio/'] or null
     show_summary       repeat the visitor's submitted details back to them
   ============================================================ */
return [

    'contact' => [
        'subject'    => 'Thanks for contacting Media Clock',
        'heading'    => "We've received your enquiry",
        'paragraphs' => [
            'Thanks for reaching out. A member of our team is reviewing your message and will get back to you within one business day.',
        ],
        'next_steps' => [
            'We review your requirements',
            'We call or email you to discuss the details',
            'You receive a clear proposal and timeline',
        ],
        'cta'          => ['label' => 'See our work', 'path' => 'portfolio/'],
        'show_summary' => true,
    ],

    'quote' => [
        'subject'    => 'Your quote request is in',
        'heading'    => 'Thanks for your quote request',
        'paragraphs' => [
            "Thanks for telling us about your project{from_page}. We'll put together an estimate and reach out within one business day.",
        ],
        'next_steps' => [
            'A short call to understand your goals',
            'A tailored quote with scope and timeline',
        ],
        'cta'          => ['label' => 'Explore our process', 'path' => 'our-process/'],
        'show_summary' => true,
    ],

    'package' => [
        'subject'    => 'Your free consultation request',
        'heading'    => "Let's talk about your project",
        'paragraphs' => [
            "Thanks for your interest in our packages. We'll contact you to book your free consultation at a time that suits you.",
        ],
        'next_steps'   => [],
        'cta'          => ['label' => 'See our work', 'path' => 'portfolio/'],
        'show_summary' => true,
    ],

    'landing' => [
        'subject'    => 'Thanks for sharing your app idea',
        'heading'    => 'Your app idea is in safe hands',
        'paragraphs' => [
            'Thanks for contacting our mobile app team{in_city}. One of our consultants will call you shortly to talk through your idea.',
            'Everything you share with us stays confidential.',
        ],
        'next_steps' => [
            'Free consultation call',
            'Feature list and cost estimate',
            'Design and development roadmap',
        ],
        'cta'          => ['label' => 'See apps we have built', 'path' => 'portfolio/'],
        'show_summary' => true,
    ],

    'csd' => [
        'subject'    => 'Your custom software enquiry',
        'heading'    => 'Thanks for your software enquiry',
        'paragraphs' => [
            "Thanks for contacting our custom software team{in_city}. We'll review your requirements and get back to you within one business day.",
        ],
        'next_steps' => [
            'We review your requirements',
            'A discovery call with a solutions consultant',
            'A proposal with scope, cost and timeline',
        ],
        'cta'          => ['label' => 'Our process', 'path' => 'our-process/'],
        'show_summary' => true,
    ],

    'rfp' => [
        'subject'    => 'We received your proposal request',
        'heading'    => 'Your proposal request is in',
        'paragraphs' => [
            "Thanks for requesting a proposal for {service}. We'll prepare it and get in touch within one business day.",
        ],
        'next_steps'   => [],
        'cta'          => ['label' => 'See our work', 'path' => 'portfolio/'],
        'show_summary' => true,
    ],

    'career' => [
        'subject'    => 'Application received: {position}',
        'heading'    => 'Thanks for applying',
        'paragraphs' => [
            "Thanks for applying for {position} at Media Clock. We've received your application and our team will review it carefully.",
            "If your profile matches what we're looking for, we'll contact you to arrange the next step.",
        ],
        'next_steps'   => [],
        'cta'          => ['label' => 'Life at Media Clock', 'path' => 'about-us/'],
        'show_summary' => false,
    ],

    'subscribe' => [
        'subject'    => "You're subscribed to Media Clock",
        'heading'    => 'Welcome aboard',
        'paragraphs' => [
            "You're now subscribed. We'll send you practical insights on apps, software and digital growth, and nothing spammy.",
        ],
        'next_steps'   => [],
        'cta'          => ['label' => 'Read the blog', 'path' => 'blog/'],
        'show_summary' => false,
    ],
];
