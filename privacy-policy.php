<?php
$page_title       = 'Privacy Policy – Media Clock';
$page_description = 'How Media Clock Pty Ltd collects, uses, stores and discloses your personal information, under the Australian Privacy Principles and the GDPR.';
$page_canonical   = 'https://mediaclock.com.au/privacy-policy/';
$page_css         = ['service', 'privacy-policy'];
$page_js          = 'privacy-policy';
include 'includes/layout/header.php';

/* Reviewed date shown under the title. Update it whenever the wording below changes. */

/* * The policy itself.
   Each section becomes an <h2> with an id, and the contents list is built from
   the same array, so a new section never needs adding in two places.
   Block types:  ['p', '…']   paragraph
                 ['h3', '…']  sub-heading
                 ['ul', […]]  bullet list */
$policy_email = 'info@mediaclock.com.au';
$policy_sections = [
    [
        'id'    => 'introduction',
        'title' => 'Introduction',
        'blocks' => [
            ['p', 'This website (www.mediaclock.com.au), the application and website development products and services and the digital marketing and content marketing products or services (collectively, products and services) are created, operated and controlled by Media Clock Pty Ltd (ABN 65 617 380 006) (Media Clock, we, us or our).'],
            ['p', 'We are committed to ensuring your personal information is protected. We manage your personal information in accordance with the Australian Privacy Principles set out in the Privacy Act 1988 (Cth) (Privacy Act) and the General Data Protection Regulation (EU 2016/679) (GDPR), which applies across the European Union (collectively, Privacy Laws).'],
            ['p', 'By accessing, using and continuing to use our website, products or services you agree to this Privacy Policy.'],
            ['p', 'This Privacy Policy outlines how and when we collect, process, use, share, store, disclose, retrieve, alter and destroy your personal information or personal data (as defined in the Privacy Laws) (collectively, Personal Information) and how you may make a privacy complaint.'],
        ],
    ],
    [
        'id'    => 'information-we-collect',
        'title' => 'The information we collect about you',
        'blocks' => [
            ['h3', 'Personal information'],
            ['p', 'We will only collect and hold Personal Information about you that is reasonably necessary to undertake our business activities and functions, make our website available to you, deliver our products and services to you, or as otherwise permitted by law.'],
            ['p', 'The type of Personal Information that we collect and use depends on the type of dealings that you have with us and includes the following:'],
            ['ul', [
                'contact details (for example, full name, address, mobile and telephone numbers and email address);',
                'business details (for example, business name, business address, work mobile and office telephone numbers and work email address);',
                'information relating to your dealings, or enquiries you have made, with us, including information about the products or services you have ordered;',
                'payment and billing information;',
                'information regarding your access and use of our website, including location information, IP address, unique device identifier, browser characteristics, device characteristics, operating system, language preferences, referring URLs, information on actions taken on our website, dates and times of visits to our website and other usage statistics;',
                'other information that you provide to us or that we may collect in the course of our relationship with you; and',
                'information provided by or on behalf of applicants for employment.',
            ]],
            ['h3', 'Sensitive information'],
            ['p', 'We do not collect your sensitive information or sensitive personal data (as defined by the Privacy Laws) (collectively, Sensitive Information). However, some of our services are automated and we may not recognise that you have accidentally provided us with Sensitive Information. If you have accidentally sent us Sensitive Information, please contact us using the details in Contact us below.'],
        ],
    ],
    [
        'id'    => 'how-we-collect',
        'title' => 'How we collect Personal Information',
        'blocks' => [
            ['h3', 'Direct collection from you'],
            ['p', 'We will collect Personal Information about you in a number of different ways. We may collect Personal Information directly from you or in the course of our dealings with you. For example, when you:'],
            ['ul', [
                'contact and correspond with us (for example, when you participate in a promotion, competition, or survey, or when you complete online forms for our products or services or subscribe to our publications, alerts and newsletters, or information you provide to us when you send us an email);',
                'use or order our products or services;',
                'visit our website (including via cookies), contact us online or via telephone with a query or request or make a comment on our social media sites;',
                'provide your Personal Information to third parties (including to our related bodies corporate, business partners and service providers, credit reporting bodies, credit providers, government agencies, public registries, search agencies, regulatory and licensing bodies, parties to whom you refer us (for example, previous employers and referees), recruitment agencies and from publicly available sources of information (for example, online databases and social media));',
                'apply for a position of employment with us.',
            ]],
            ['p', 'We may also collect your Personal Information where we are otherwise legally authorised or required to do so.'],
            ['p', 'When we collect Personal Information directly from you, we will take reasonable steps to notify you (using a collection notice) at, before, or as soon as practicable after, the time of collection. As a collection notice is specific to a particular collection of Personal Information, it will provide more specific information about our information-handling practices than this Privacy Policy.'],
            ['h3', 'Collection from third parties'],
            ['p', 'We may also collect Personal Information about you from publicly available sources and third parties, including:'],
            ['ul', [
                'from third parties (including our related bodies corporate, business partners and service providers, credit reporting bodies and credit providers, government agencies);',
                'if you use our social media sites or applications, pages or plugins; or',
                'if you use third party products or services that interact with our products, services or website.',
            ]],
            ['p', 'If you provide us with Personal Information about another individual (as their authorised representative), we rely on you to inform them that you are providing their Personal Information to us, and to advise them that they can contact us for further information.'],
            ['p', 'You must take reasonable steps to ensure the individual is aware of, and consents to, the matters outlined in this policy, including that their Personal Information is being collected, the purposes for which that information is being collected, the intended recipients of that information, the individual’s right to access that information, and who we are and how to contact us.'],
            ['p', 'Upon our request, you must also assist us with any requests by the individual to access or update the Personal Information you have collected from them and provided to us.'],
        ],
    ],
    [
        'id'    => 'legal-basis',
        'title' => 'Legal basis for processing Personal Information (EU only)',
        'blocks' => [
            ['p', 'For the purposes of the GDPR, you appoint us as your Processor (as defined in the GDPR), and/or to the extent that we are a Controller (as defined in the GDPR), to collect, process, use, share, store, disclose, retrieve, alter and destroy your Personal Information in accordance with this Privacy Policy.'],
            ['p', 'We must establish a lawful basis for collecting, processing, storing, using and disclosing the Personal Information of individuals residing in the European Union (EU). The legal basis for which we collect your Personal Information depends on the data that we collect and how we use it, such as:'],
            ['ul', [
                'where you have freely and expressly consented to the collection, use, storage, processing and disclosure of your Personal Information for a specific purpose. The provision of Personal Information to us is voluntary. However, if you do not provide your Personal Information to us, we may not be able to provide you with access to, and use of, our products, services or the website. You may withdraw your consent at any time by contacting us using the details below;',
                'where the collection, use, storage, processing and disclosure of your Personal Information is necessary for the performance of a contract to which you are a party. For example, when collection and use is necessary to fulfil our obligations to provide you with access to, and use of, our products, services or the website;',
                'for our legitimate business interests, including providing, operating and improving our products, services or website; marketing new promotions, deals, competitions, products, services or features of the website provided by us or our Authorised Affiliates that we consider may interest or benefit you; managing, analysing, understanding and developing our relationship with you; and responding to your queries or complaints (such as when you submit a question via email); and',
                'where there is a legal obligation to collect, use, store, process or disclose your Personal Information. For example, we may be obliged to disclose your Personal Information by reason of any applicable law, regulation or court order and/or to protect our interests and legal rights, or the public interest.',
            ]],
        ],
    ],
    [
        'id'    => 'how-we-use',
        'title' => 'How we use your Personal Information',
        'blocks' => [
            ['h3', 'Purposes of use and disclosure'],
            ['p', 'We only use, process and disclose your Personal Information for the purposes for which it is collected. In particular, we use, process and disclose your Personal Information to:'],
            ['ul', [
                'provide or deliver our products and services to you, including, without limitation, to provide you with access to our website;',
                'assist with, or respond to, your queries;',
                'inform you about our website, products and services, offers, competitions, promotions, events, sweepstakes, surveys, questionnaires, or other matters which we believe are of interest to you (such as recruitment or job opportunities);',
                'share with our Authorised Affiliates;',
                'administer, improve and manage our website, products and services (including customising the advertising and content on our website), inform you about scheduled maintenance or outages and manage our relationship with you;',
                'charge and bill you for the use of our products and services;',
                'verify your identity;',
                'keep internal records;',
                'carry out direct marketing (see Direct marketing below); and',
                'comply with our legal and regulatory obligations.',
            ]],
            ['p', 'In the event of a merger, acquisition or sale of the whole or part of our business or assets, we reserve the right to transfer your Personal Information as part of the transaction, without your consent or notice to you.'],
            ['h3', 'Disclosure to Authorised Affiliates'],
            ['p', 'In order to make our website available to you, and/or provide or deliver our products and services to you, we may disclose your Personal Information to:'],
            ['ul', [
                'our related bodies corporate, business partners, service providers, third party contractors, agents or suppliers;',
                'authorised external service providers who perform functions on our behalf, such as third party payment processors in order to process any payments, internet and technology services providers, hosting companies, marketing and advertising agencies, IT security service providers, fulfilment companies, credit reporting agents, debt collection agents, market research and recruitment service providers; and',
                'external business advisors, such as auditors, lawyers, insurers and financiers,',
            ]],
            ['p', '(collectively, Authorised Affiliates).'],
            ['h3', 'Overseas disclosure'],
            ['p', 'Our Authorised Affiliates may be located in or outside Australia, the European Union, the Philippines and other countries from time to time, whose laws are not recognised by the European Commission as providing an adequate level of protection to Personal Information.'],
            ['p', 'Where we do transfer your Personal Information to an overseas Authorised Affiliate, we take steps reasonably necessary to ensure that there is a legal basis for the transfer, and that your Personal Information is treated securely (including using reasonable endeavours to ensure that each overseas Authorised Affiliate receiving your Personal Information is bound by Standard Contractual Clauses approved by the European Commission).'],
            ['p', 'By accessing or using our website and/or products and services, or providing your Personal Information to us, you explicitly and freely consent to the transfer of your Personal Information to our overseas Authorised Affiliates. If you do not wish to receive information from any of our Authorised Affiliates, please let us know using the details below.'],
            ['h3', 'Disclaimer'],
            ['p', 'We will not disclose your Personal Information to any third party (other than our Authorised Affiliates) without your written consent, unless:'],
            ['ul', [
                'we are otherwise required by the relevant Privacy Laws;',
                'we are permitted to under this policy; or',
                'such disclosure is, in our opinion, reasonably necessary to protect our rights or property, avoid injury to any person or ensure the proper functioning of the website.',
            ]],
            ['p', 'This policy only covers the use and disclosure of information we collect from you. The use of your Personal Information by any third party is governed by their privacy policies and is not within our control.'],
        ],
    ],
    [
        'id'    => 'direct-marketing',
        'title' => 'Direct marketing',
        'blocks' => [
            ['h3', 'Your consent'],
            ['p', 'At the time of accessing, or using, our website and/or products and services, or from time to time, we may seek your express consent (whether such consent was obtained through our website, landing pages, social media sites or otherwise) for us to send you marketing, advertising or promotional materials and other information relating to our products, services, content or events (including those of third party organisations or partners that we collaborate with) that we (including our affiliates and related bodies corporate) or such third party organisations or partners may be selling, marketing, offering, organising, involved in or promoting, whether such products, services, content and/or events exist now or are created in the future.'],
            ['p', 'Where we have obtained your prior consent or are otherwise permitted under the GDPR, we may, from time to time:'],
            ['ul', [
                'use your Personal Information to send you information about the promotions, deals, competitions, products or services we offer, and any other information that we consider may be relevant to you; and',
                'disclose or sell your Personal Information to third party organisations or partners that we collaborate with for the purpose of selling, marketing or offering such products, services, content and/or events to you. For example, our promotional, lead generation and advertising partner, Webhype Pty Ltd, may send you information about special deals, products or services they offer and other information that may interest you.',
            ]],
            ['p', 'These communications may continue, even after you stop using our products and services.'],
            ['h3', 'Communication channels'],
            ['p', 'We may send this information to you via the communication channels specified at the time you provide your consent. These communication channels may include mail, email, SMS, telephone, social media or by customising online content and displaying advertising on our website.'],
            ['h3', 'Opting out'],
            ['p', 'You can opt out of receiving these communications by contacting us using the details below, or by using the unsubscribe function in the email or SMS. You may re-subscribe at any time by re-registering via the website.'],
        ],
    ],
    [
        'id'    => 'data-breaches',
        'title' => 'Notifiable data breaches',
        'blocks' => [
            ['p', 'In the event of any loss, or unauthorised access or disclosure of your Personal Information that is likely to result in serious harm to you, we will investigate, prevent and mitigate the breach, and notify you as soon as practicable, along with:'],
            ['ul', [
                '(Australia) the Office of the Australian Information Commissioner, in accordance with the notifiable data breaches scheme contained in Part IIIC of the Privacy Act; or',
                '(EU only) the supervisory authority in the country in which you reside which has responsibility for privacy and data protection.',
            ]],
        ],
    ],
    [
        'id'    => 'storage-and-security',
        'title' => 'Storage and security',
        'blocks' => [
            ['h3', 'Protecting your Personal Information'],
            ['p', 'We take reasonable steps in the circumstances to keep your Personal Information safe. We use a combination of technical, administrative and physical controls to protect and maintain the security of your Personal Information.'],
            ['p', 'Our officers, employees, agents and third-party contractors are expected to observe the confidentiality of your Personal Information.'],
            ['p', 'Wherever possible, we procure that Authorised Affiliates who have access to your Personal Information take reasonable steps to protect and maintain the security of your Personal Information, and to comply with the Australian Privacy Principles, and where required the GDPR, when accessing and using your Personal Information.'],
            ['h3', 'No guarantee'],
            ['p', 'The transmission of information via the internet is not completely secure. While we do our best to protect your Personal Information, we cannot guarantee the security of any Personal Information transmitted on, or via, the website or by email to us. You provide your Personal Information to us at your own risk and we are not responsible for any unauthorised access to, and disclosure of, your Personal Information.'],
            ['h3', 'Destruction of Personal Information'],
            ['p', 'We will destroy or de-identify Personal Information in circumstances where it is no longer required, unless we are required or authorised by law to retain the information.'],
        ],
    ],
    [
        'id'    => 'other-sites',
        'title' => 'Links to other sites',
        'blocks' => [
            ['p', 'The website may contain hyperlinks or banner advertising to or from third-party websites. We do not endorse any of these third parties, their products or services, or the content on these websites.'],
            ['p', 'These websites are not subject to our privacy standards, policies and procedures. We therefore recommend that you make your own enquiries about their privacy practices. We are in no way responsible for the privacy practices or content of these third-party websites.'],
        ],
    ],
    [
        'id'    => 'cookies',
        'title' => 'Cookies policy',
        'blocks' => [
            ['p', 'We may collect information when you access and use the website by utilising features and technologies of your internet browser, including cookies, pixel tags, web beacons, embedded web links and similar technologies. A cookie is a piece of data that enables us to track and target your preferences.'],
            ['p', 'The type of information we collect may include statistical information, details of your operating system, location, your internet protocol (IP) address, the date and time of your visit, the pages that you have accessed, the links which you have clicked and the type of browser that you were using.'],
            ['p', 'We may use cookies and similar technologies to:'],
            ['ul', [
                'identify you as a return user and personalise and enhance your experience and use of the website; and',
                'help us improve our service to you when you access the website and ensure that the website remains easy to use and navigate.',
            ]],
            ['p', 'Most browsers are initially set up to accept cookies. However, you can reset your browser to refuse all cookies or warn you before accepting cookies. If you reject our cookies or similar technologies, you may still use the website but may only have limited functionality.'],
            ['p', 'We may also use your IP address to analyse trends, administer the website and other websites we operate, track traffic patterns and gather demographic information. Your IP address and other Personal Information may be used for credit fraud protection and risk reduction.'],
        ],
    ],
    [
        'id'    => 'your-rights',
        'title' => 'Your rights in relation to privacy',
        'blocks' => [
            ['h3', 'Privacy rights (EU only)'],
            ['p', 'Under the GDPR, you have a number of important rights. Subject to certain exceptions, you have the right to:'],
            ['ul', [
                'fair and transparent processing of your Personal Information and processing in accordance with the GDPR;',
                'require us to rectify or correct any Personal Information we hold about you that is inaccurate or incomplete;',
                'require us to erase your Personal Information in certain situations;',
                'obtain a copy of your Personal Information in a commonly used electronic format so that you can manage and move it, or request we send it to a third party;',
                'object or withdraw your consent at any time to the collection, use, processing or disclosure of your Personal Information (including for direct marketing purposes). In such a situation we will cease processing your Personal Information unless there is a legal basis for us to continue. In this scenario, you must also immediately cease using the website, and delete all copies of the website;',
                'object to decisions being made by automated means which produce legal effects concerning you or significantly affecting you; or',
                'otherwise restrict our collection, use, processing or disclosure of your Personal Information in certain circumstances.',
            ]],
            ['p', 'Where you exercise your right to impose a restriction on the use, disclosure or processing of your Personal Information in accordance with this clause, your Personal Information will only be used, processed and disclosed with your consent. You can exercise any of these rights by contacting us using the details below.'],
            ['h3', 'Access rights'],
            ['p', 'We will use our reasonable endeavours to keep your Personal Information accurate, up-to-date and complete. You have the right to access any Personal Information we hold about you, subject to some exceptions provided by the relevant Privacy Laws.'],
            ['p', 'You can access, or request that we correct, your Personal Information by writing to us using the details below. We may require proof of identity. If we do not allow you to access any part of your Personal Information, we will tell you why in writing.'],
            ['p', 'We will not charge you for requesting access to your Personal Information but may charge you for our reasonable costs in supplying you with access to this information. We will endeavour to respond to your request for access or correction within 1 month from your request. Personal Information will be given to you in a structured, commonly used, machine readable format.'],
        ],
    ],
    [
        'id'    => 'children',
        'title' => 'Children’s policy',
        'blocks' => [
            ['p', 'We do not knowingly seek, collect or process personal information from or about persons under 16 years of age (Children) without the consent of a parent or guardian.'],
            ['p', 'If we become aware that any personal information relating to a Child has been provided without the consent of a parent or guardian, we will use reasonable endeavours to:'],
            ['ul', [
                'delete the personal information from all relevant files as soon as possible; or',
                'ensure, where deletion is not possible, that the personal information is not used further for any purpose or disclosed further to any Authorised Affiliate.',
            ]],
            ['p', 'Any parent or guardian with queries regarding our collection, use, processing or disclosure of personal information relating to their Child should contact us using the details below.'],
        ],
    ],
    [
        'id'    => 'complaints',
        'title' => 'Privacy complaints',
        'blocks' => [
            ['p', 'If you have any complaints or issues you wish to raise with us regarding the way we have handled your Personal Information, or would like to discuss any issues about our Privacy Policy, please contact us directly by email. Please provide us with full details of your complaint and any supporting documentation.'],
            ['p', 'We will review your complaint, respond to you within a reasonable period of time to acknowledge it, and inform you of the next steps we will take in resolving it. At all times, we will treat your privacy complaint seriously and in a confidential manner.'],
            ['p', 'If you are unhappy with a response that you have received from us, you may direct your complaint to the Office of the Australian Information Commissioner. If, however, you reside in the European Union, you may make a complaint to the supervisory authority in the country in which you reside which has responsibility for privacy and data protection.'],
        ],
    ],
    [
        'id'    => 'changes',
        'title' => 'Changes to this Privacy Policy',
        'blocks' => [
            ['p', 'From time to time it may be necessary for us to review and revise our Privacy Policy. We may notify you about changes to this Privacy Policy by posting an updated version on our website. We encourage you to check our website from time to time to ensure you are familiar with our latest Privacy Policy.'],
        ],
    ],
];
?>
<!-- * Privacy Policy : header band -->
<section class="legal-hero band-dark">
    <div class="container">
        <div class="eyebrow">Media Clock Pty Ltd</div>
        <h1>Privacy Policy</h1>
        <p class="legal-hero-lead">How we collect, use, store and disclose your personal information, under the Australian Privacy Principles and the GDPR.</p>
    </div>
</section>

<!-- * Privacy Policy : contents + the policy itself -->
<section class="section legal band-light" aria-label="Privacy Policy">
    <div class="container">
        <div class="legal-layout">

            <!-- * Privacy Policy : contents rail — the same "On this page" list the
                 blog article uses (.post-toc, styled in service.css);
                 privacy-policy.js folds it shut on phones -->
            <details class="post-toc" open>
                <summary>On this page</summary>
                <ol class="list-unstyled">
                    <?php foreach ($policy_sections as $ppSection): ?>
                    <li><a href="#<?= $e($ppSection['id']) ?>"><?= $e($ppSection['title']) ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="#contact-us">Contact us</a></li>
                </ol>
            </details>

            <div class="legal-body">
                <?php foreach ($policy_sections as $ppSection): ?>
                <section class="legal-section" id="<?= $e($ppSection['id']) ?>" aria-labelledby="<?= $e($ppSection['id']) ?>-title">
                    <h2 id="<?= $e($ppSection['id']) ?>-title"><?= $e($ppSection['title']) ?></h2>
                    <?php foreach ($ppSection['blocks'] as $ppBlock):
                        [$ppType, $ppValue] = $ppBlock;
                        if ($ppType === 'h3'): ?>
                    <h3><?= $e($ppValue) ?></h3>
                    <?php elseif ($ppType === 'ul'): ?>
                    <ul>
                        <?php foreach ($ppValue as $ppItem): ?>
                        <li><?= $e($ppItem) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php else: ?>
                    <p><?= $e($ppValue) ?></p>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </section>
                <?php endforeach; ?>

                <!-- * Privacy Policy : contact card (the "details below" every section points at) -->
                <section class="legal-section" id="contact-us" aria-labelledby="contact-us-title">
                    <h2 id="contact-us-title">Contact us</h2>
                    <p>For any questions about this Privacy Policy, to access or correct your Personal Information, or to make a privacy complaint, please get in touch.</p>
                    <div class="legal-contact">
                        <p class="legal-contact-name">Media Clock Pty Ltd<span>ABN 65 617 380 006</span></p>
                        <ul class="legal-contact-list">
                            <li><a href="mailto:<?= $e($policy_email) ?>"><?= $e($policy_email) ?></a></li>
                            <li><a href="<?= $e(mc_tel()) ?>"><?= $e(mc_tel_text()) ?></a></li>
                            <li><a href="<?= $e(mc_tel('mobile')) ?>"><?= $e(mc_tel_text('mobile')) ?></a></li>
                            <li><a href="https://maps.google.com/maps?q=<?= $e(rawurlencode('Media Clock, 392 A St Kilda Rd, St Kilda VIC 3182')) ?>" target="_blank" rel="noopener">392 A St Kilda Rd, St Kilda VIC 3182</a></li>
                        </ul>
                    </div>
                </section>
            </div>

        </div>
    </div>
</section>
<?php
unset($policy_sections, $ppSection, $ppBlock, $ppType, $ppValue, $ppItem, $policy_email);

// * Contact panel (hidden until a .contactBtn opens it; the header and footer buttons need it)
include 'includes/components/contact.php';

include 'includes/layout/footer.php';
