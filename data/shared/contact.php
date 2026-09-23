<?php
/* ============================================================
   * Contact numbers — single source of truth
   Every tel: link, every printed number and the WhatsApp link read from here,
   so a number changes in one place rather than the seventeen it used to take.

   'dialer' is the number every call button dials. 'mobile' is shown beside it
   but is not linked from the call buttons.
   ============================================================ */
return [
    /* the landline every call button and CTA dials */
    'dialer' => ['tel' => '0390164442',  'text' => '03 9016 4442'],
    /* shown alongside it; also the WhatsApp number, since WhatsApp is a
       mobile service and will not reach a landline */
    'mobile' => ['tel' => '0410576590',  'text' => '0410 576 590'],
    'email'  => 'info@mediaclock.com.au',
];
