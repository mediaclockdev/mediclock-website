<?php
/* * Landing v2 : small brand marks for the pillar cards, drawn inline so they
   are crisp at any size and need no request. Simplified, in each brand's own
   colours, on a 32×32 grid. Decorative — the name is always printed beside
   the mark, so every one is aria-hidden.
   Keyed by the name shown on the card ('v2_pillar_build_tech' and
   'v2_pillar_launch' in data/landing-v2/common.php). */
return [
    'Swift' => '<svg viewBox="0 0 32 32" aria-hidden="true"><rect width="32" height="32" rx="7" fill="#F05138"/><path fill="#fff" d="M18.6 6.6c3.9 2.6 6.3 7.3 5.2 11.5 1.3 1.7 1.9 3.6 1.5 4.6-.6-1.1-2-1.5-3-1.1-3.4 2-8.2 2-12.5-.4A16 16 0 0 1 5 16.8c3.2 2.1 7.3 3.1 10.2 1.6-3.4-2.4-6.4-5.6-8.4-8.4 2.1 1.9 5.3 4.2 7.5 5.6-1.6-1.8-3.3-4.1-4.4-6 3.3 2.9 7.2 5.7 9.6 6.9 1.2-3 .5-6.6-.9-9.9z"/></svg>',
    'Kotlin' => '<svg viewBox="0 0 32 32" aria-hidden="true"><defs><linearGradient id="lp2-kt" x1="0" y1="32" x2="32" y2="0" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#E44857"/><stop offset=".47" stop-color="#C711E1"/><stop offset="1" stop-color="#7F52FF"/></linearGradient></defs><path fill="url(#lp2-kt)" d="M3 3h26L16 16l13 13H3z"/></svg>',
    'Flutter' => '<svg viewBox="0 0 32 32" aria-hidden="true"><path fill="#54C5F8" d="M19.4 2h7.4L9.2 19.6l-3.7-3.7z"/><path fill="#54C5F8" d="M19.4 16.8h7.4l-6.5 6.5-3.7-3.7z"/><path fill="#01579B" d="M16.6 26.3 20.3 30h7.4l-7.4-6.7z"/><path fill="#29B6F6" d="m12.9 23.3 3.7-3.7 3.7 3.7-3.7 3.7z"/></svg>',
    'React' => '<svg viewBox="0 0 32 32" aria-hidden="true" fill="none" stroke="#149ECA" stroke-width="1.6"><circle cx="16" cy="16" r="2.6" fill="#149ECA" stroke="none"/><ellipse cx="16" cy="16" rx="13" ry="5"/><ellipse cx="16" cy="16" rx="13" ry="5" transform="rotate(60 16 16)"/><ellipse cx="16" cy="16" rx="13" ry="5" transform="rotate(120 16 16)"/></svg>',
    'Node.js' => '<svg viewBox="0 0 32 32" aria-hidden="true"><path fill="#5FA04E" d="M16 2.5 27.7 9.2v13.6L16 29.5 4.3 22.8V9.2z"/><text x="16" y="20.6" fill="#fff" font-family="Arial, sans-serif" font-size="11" font-weight="700" text-anchor="middle">JS</text></svg>',
    'Firebase' => '<svg viewBox="0 0 32 32" aria-hidden="true"><path fill="#FFA000" d="M6 25.5 9.4 4.2c.1-.7 1-.8 1.3-.2l3.6 6.7z"/><path fill="#F57C00" d="m17.5 13.6-3.2-6.2c-.3-.6-1.1-.6-1.4 0L6 25.5z"/><path fill="#FFCA28" d="M6 25.5 22.6 8.7c.4-.4 1.1-.2 1.2.4L26 25.5l-8.6 4.8a2.6 2.6 0 0 1-2.5 0z"/></svg>',

    'App Store' => '<svg viewBox="0 0 32 32" aria-hidden="true"><defs><linearGradient id="lp2-as" x1="16" y1="0" x2="16" y2="32" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#18BFFB"/><stop offset="1" stop-color="#2072F3"/></linearGradient></defs><rect width="32" height="32" rx="7" fill="url(#lp2-as)"/><g fill="none" stroke="#fff" stroke-width="2.4" stroke-linecap="round"><path d="M18.4 7.2 10 22.6M13.6 7.2 22 22.6M8.2 18.6h15.6"/></g></svg>',
    'Google Play' => '<svg viewBox="0 0 32 32" aria-hidden="true"><path fill="#00D7FE" d="M5.6 3.2c-.4.4-.6 1-.6 1.8v22c0 .8.2 1.4.6 1.8L17.9 16z"/><path fill="#FFCE00" d="m22 20.1-4.1-4.1L22 11.9l5 2.8c1.4.8 1.4 2.1 0 2.9z"/><path fill="#FF3A44" d="M22 20.1 17.9 16 5.6 28.8c.5.5 1.2.5 2.1.1z"/><path fill="#00F076" d="M22 11.9 7.7 3.1c-.9-.5-1.6-.4-2.1.1L17.9 16z"/></svg>',
    'Ongoing Support' => '<svg viewBox="0 0 32 32" aria-hidden="true"><rect width="32" height="32" rx="7" fill="#F15A26"/><g fill="none" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M23 13.5a7.5 7.5 0 0 0-13.6-2.8M9 18.5a7.5 7.5 0 0 0 13.6 2.8"/><path d="M9 6.5v4.5h4.5M23 25.5V21h-4.5"/></g></svg>',
];
