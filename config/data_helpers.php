<?php

return [

    /**
     * #######################################################################
     *
     * DEFAULT APP STATUSES
     *
     * #######################################################################
     *
     */
    'environments' => [
        'demonstration' => 'Demonstration',
        'development'   => 'Development',
        'maintenance'   => 'Maintenance',
        'debugging'     => 'Debugging',
        'beta'          => 'Beta',
        'live'          => 'Live',
    ],

    /**
     * #######################################################################
     *
     * DEFAULT USER GROUPS
     *
     * #######################################################################
     *
     */
    'user_groups' => [
        'root_admin'    => 'Root Admin',
        'super_admin'   => 'Super Admin',
        'manager'       => 'Manager',
        'admin'         => 'Admin',
        'moderator'     => 'Moderator',
        'reviewer'      => 'Reviewer',
        'blogger'       => 'Blogger',
        'writer'        => 'Writer',
        'editor'        => 'Editor',
        'developer'     => 'Developer',
        'beta_tester'   => 'Beta Tester',
        'creative'      => 'Creative',
        'vendor'        => 'Vendor',
        'client'        => 'Client',
        'regular'       => 'Regular',
        'guest'         => 'Guest',
    ],

    /**
     * #######################################################################
     *
     * DEFAULT ACCESS GROUPS
     *
     * #######################################################################
     *
     */
    'access_groups' => [
        'registered' => 'Registered',
        'public'     => 'Public',
        'guest'      => 'Guest',
        'admin'      => 'Admin',
        'none'       => 'None',
        'all'        => 'All',
    ],

    /**
     * #######################################################################
     *
     * DEFAULT SECURITY STATUSES
     *
     * #######################################################################
     *
     */
    'security_statuses'         => [
        'approved'           => 'Approved',
        'blocked'            => 'Blocked',
        'flagged'            => 'Flagged',
        'suspended'          => 'Suspended',
        'banned'             => 'Banned',
        'blacklisted'        => 'Blacklisted',
        'temporary'          => 'Temporary',
        'pending'            => 'Pending',
    ],

    /**
     * #######################################################################
     *
     * DEFAULT AGE LIMITS
     *
     * #######################################################################
     *
     */
    'age_limits' => [
        18 =>  '18 Years',
        21 =>  '21 Years',
    ],

    /**
     * #######################################################################
     *
     * DEFAULT TRIGGER FREQUENCIES
     *
     * #######################################################################
     *
     */
    'trigger_frequencies'                  => [
        'random'  => 'Random',
        'hourly'  => 'Hourly',
        'daily'   => 'Daily',
        'weekly'  => 'Weekly',
        'monthly' => 'Monthly',
    ],

    /**
     * #######################################################################
     *
     * DEFAULT TIME & CLOCK SETTINGS
     *
     * #######################################################################
     *
     */
    'time' => [
        'clock' => [
            12 => '12 Hour',
            24 => '24 Hour',
        ],
        'unit' => [
            'seconds' => 'Seconds',
            'minutes' => 'Minutes',
            'hours'   => 'Hours',
        ],
    ],

    /**
     * #######################################################################
     *
     * DEFAULT CALENDAR SETTINGS
     *
     * #######################################################################
     *
     */
    'calendar' => [
        'week' => [
            'sunday'    => 'Sunday',
            'monday'    => 'Monday',
            'tuesday'   => 'Tuesday',
            'wednesday' => 'Wednesday',
            'thursday'  => 'Thursday',
            'friday'    => 'Friday',
            'saturday'  => 'Saturday',
        ],
        'months' => [
            'january'   => 'January',
            'february'  => 'February',
            'march'     => 'March',
            'april'     => 'April',
            'may'       => 'May',
            'june'      => 'June',
            'july'      => 'July',
            'august'    => 'August',
            'september' => 'September',
            'october'   => 'October',
            'november'  => 'November',
            'december'  => 'December',
        ],
    ],

    /**
     * #######################################################################
     *
     * DEFAULT DATETIME FORMAT SETTINGS
     *
     * #######################################################################
     *
     */
    'datetime_formats' => [
        'long' => [
            '%A %d %B, %Y %H:%M' => 'Monday 20 March 2014 07:00',
            '%B %d, %Y %I:%M %p' => 'March 20, 2014 10:00 am',
            '%d %B %Y %H:%M'     => '20 March 2014 05:00',
            '%A %d %B, %Y'       => 'Tuesday 20 March, 2014',
            '%B %d, %Y'          => 'March 20, 2014',
            '%a %d, %B'          => 'Tue. 20, March'
        ],
        'short' => [
            '%m-%d-%Y' => '03-20-2014 (MM-DD-YYYY)',
            '%e-%m-%Y' => '20-03-2014 (D-MM-YYYY)',
            '%m-%e-%y' => '20-20-09 (MM-D-YY)',
            '%e-%m-%y' => '20-03-09 (D-MM-YY)',
            '%b %d %Y' => 'Mar 20 2014'
        ],
    ],
    'formats' => [
        'time' => [
            'short' => [
                1 => [
                    'human' => '03-20-2014 (MM-DD-YYYY)',
                    'blog'  => 'm-d-Y',
                    'sql'   => '%m-%d-%Y',
                ],
                2 => [
                    'human' => '20-03-2014 (D-MM-YYYY)',
                    'blog'  => 'e-m-Y',
                    'sql'   => '%e-%m-%Y',
                ],
                3 => [
                    'human' => '20-20-09 (MM-D-YY)',
                    'blog'  => 'm-e-y',
                    'sql'   => '%m-%e-%y',
                ],
                4 => [
                    'human' => '20-03-09 (D-MM-YY)',
                    'blog'  => 'e-m-y',
                    'sql'   => '%e-%m-%y',
                ],
                5 => [
                    'human' => 'Mar 20 2014',
                    'blog'  => 'b d Y',
                    'sql'   => '%b %d %Y',
                ],
            ],
            'long'  => [
                1 => [
                    'human' => 'Monday 20 March 2014 07:00',
                    'blog'  => 'A d B, Y H:M',
                    'sql'   => '%A %d %B, %Y %H:%M',
                ],
                2 => [
                    'human' => 'March 20, 2014 10:00 am',
                    'blog'  => 'B d, Y I:M p',
                    'sql'   => '%B %d, %Y %I:%M %p',
                ],
                3 => [
                    'human' => '20 March 2014 05:00',
                    'blog'  => 'd B Y H:M',
                    'sql'   => '%d %B %Y %H:%M',
                ],
                4 => [
                    'human' => 'Tuesday 20 March, 2014',
                    'blog'  => 'A d B, Y',
                    'sql'   => '%A %d %B, %Y',
                ],
                5 => [
                    'human' => 'March 20, 2014',
                    'blog'  => 'B d, Y',
                    'sql'   => '%B %d, %Y',
                ],
                6 => [
                    'human' => 'Tue. 20, March',
                    'blog'  => 'a d, B',
                    'sql'   => '%a %d, %B',
                ],
            ],
        ],
        'date' => [
            'short' => [
                1 => [
                    'human' => '03-20-2014 (MM-DD-YYYY)',
                    'blog'  => 'm-d-Y',
                    'sql'   => '%m-%d-%Y',
                ],
                2 => [
                    'human' => '20-03-2014 (D-MM-YYYY)',
                    'blog'  => 'e-m-Y',
                    'sql'   => '%e-%m-%Y',
                ],
                3 => [
                    'human' => '20-20-09 (MM-D-YY)',
                    'blog'  => 'm-e-y',
                    'sql'   => '%m-%e-%y',
                ],
                4 => [
                    'human' => '20-03-09 (D-MM-YY)',
                    'blog'  => 'e-m-y',
                    'sql'   => '%e-%m-%y',
                ],
                5 => [
                    'human' => 'Mar 20 2014',
                    'blog'  => 'b d Y',
                    'sql'   => '%b %d %Y',
                ],
            ],
            'long'  => [
                1 => [
                    'human' => 'Monday 20 March 2014 07:00',
                    'blog'  => 'A d B, Y H:M',
                    'sql'   => '%A %d %B, %Y %H:%M',
                ],
                2 => [
                    'human' => 'March 20, 2014 10:00 am',
                    'blog'  => 'B d, Y I:M p',
                    'sql'   => '%B %d, %Y %I:%M %p',
                ],
                3 => [
                    'human' => '20 March 2014 05:00',
                    'blog'  => 'd B Y H:M',
                    'sql'   => '%d %B %Y %H:%M',
                ],
                4 => [
                    'human' => 'Tuesday 20 March, 2014',
                    'blog'  => 'A d B, Y',
                    'sql'   => '%A %d %B, %Y',
                ],
                5 => [
                    'human' => 'March 20, 2014',
                    'blog'  => 'B d, Y',
                    'sql'   => '%B %d, %Y',
                ],
                6 => [
                    'human' => 'Tue. 20, March',
                    'blog'  => 'a d, B',
                    'sql'   => '%a %d, %B',
                ],
            ],
        ],
        'datetime' => [
            'short' => [
                1 => [
                    'human' => '03-20-2014 (MM-DD-YYYY)',
                    'blog'  => 'm-d-Y',
                    'sql'   => '%m-%d-%Y',
                ],
                2 => [
                    'human' => '20-03-2014 (D-MM-YYYY)',
                    'blog'  => 'e-m-Y',
                    'sql'   => '%e-%m-%Y',
                ],
                3 => [
                    'human' => '20-20-09 (MM-D-YY)',
                    'blog'  => 'm-e-y',
                    'sql'   => '%m-%e-%y',
                ],
                4 => [
                    'human' => '20-03-09 (D-MM-YY)',
                    'blog'  => 'e-m-y',
                    'sql'   => '%e-%m-%y',
                ],
                5 => [
                    'human' => 'Mar 20 2014',
                    'blog'  => 'b d Y',
                    'sql'   => '%b %d %Y',
                ],
            ],
            'long'  => [
                1 => [
                    'human' => 'Monday 20 March 2014 07:00',
                    'blog'  => 'A d B, Y H:M',
                    'sql'   => '%A %d %B, %Y %H:%M',
                ],
                2 => [
                    'human' => 'March 20, 2014 10:00 am',
                    'blog'  => 'B d, Y I:M p',
                    'sql'   => '%B %d, %Y %I:%M %p',
                ],
                3 => [
                    'human' => '20 March 2014 05:00',
                    'blog'  => 'd B Y H:M',
                    'sql'   => '%d %B %Y %H:%M',
                ],
                4 => [
                    'human' => 'Tuesday 20 March, 2014',
                    'blog'  => 'A d B, Y',
                    'sql'   => '%A %d %B, %Y',
                ],
                5 => [
                    'human' => 'March 20, 2014',
                    'blog'  => 'B d, Y',
                    'sql'   => '%B %d, %Y',
                ],
                6 => [
                    'human' => 'Tue. 20, March',
                    'blog'  => 'a d, B',
                    'sql'   => '%a %d, %B',
                ],
                7 => [
                    'human' => 'Tue. 20, March',
                    'blog'  => 'Y-m-d H:i',
                    'sql'   => '%Y-%m-%d %H:%i:%s',
                ],
            ],
        ],
        'js' => [
            'datetime' => [
                'YYYY-MM-DD HH:mm',
                'yyyy-mm-dd H:i:s',
            ],
            'date'     => [
                'YYYY-MM-DD',
                'yyyy-mm-dd',
            ],
        ],
    ],

    /**
     * #######################################################################
     *
     * DEFAULT LANGUAGE SETTINGS
     *
     * #######################################################################
     *
     */
    'language' => [
        'default' => 'en_US',
        'direction' => [
            'ltr' => 'Left to Right',
            'rtl' => 'Right to Left'
        ],
    ],

    /**
     * #######################################################################
     *
     * DEFAULT GENERIC SETTINGS
     *
     * #######################################################################
     *
     */
    'link_target' => [
        '_blank'  =>   'Blank',
        '_parent' =>   'Parent',
        '_self'   =>   'Self',
        '_top' =>   'Top',
    ],

    'priority' => [
        'very_urgent' => 'Very Urgent',
        'medium'      => 'Medium',
        'normal'      => 'Normal',
        'urgent'      => 'Urgent',
        'high'        => 'High',
        'low'         => 'Low',
    ],

    'content_status' => [
        'published' => 'Published',
        'archived'  => 'Archived',
        'review' => 'Review',
        'draft'     => 'Draft',
    ],

    'progress_status' => [
        'long_overdue' => 'Long overdue',
        'completed'    => 'Completed',
        'starting'     => 'Starting',
        'started'      => 'Started',
        'stalled'      => 'Stalled!',
        'overdue'      => 'Overdue',
        'almost'       => 'Almost',
        'wip'          => 'Work In Progress',
    ],

    // Common industry media aspect ratios
    // http:// www.rtings.com/info/what-is-the-aspect-ratio-4-3-16-9-21-9
    'aspect_ratio' => [
        '4:3'  => '4:3  - Standard Definition',
        '16:9' => '16:9 - High Definition',
        '21:9' => '21:9 - Most Movies',
    ],

    'avatar_types' => [
        'uploaded' => 'Uploaded',
        'gravatar' => 'Gravatar',
    ],

    'upload_method' => [
        'file' => 'File',
        'link' => 'Link',
    ],

    'gender' => [
        'male'   => 'Male',
        'female' => 'Female',
        'other'  => 'Other',
    ],

    'availability' => [
        'not_available' => 'Not Available',
        'available'     => 'Available',
        'maybe'         => 'Maybe',
    ],

    'work_status'              => [
        'freelancer' => 'Freelancer',
        'employed'   => 'Employed',
        'student' => 'Student',
        'other'      => 'Other',
    ],

    'socialmedia'             => [
        'twitter'    => 'https://wwww.twitter.com/',
        'facebook'   => 'https://wwww.facebook.com/',
        'linkedin'   => 'https://wwww.linkedin.com/',
        'github'     => 'https://wwww.github.com/',
        'bitbucket'  => 'https://wwww.bitbucket.com/',
        'behance'    => 'https://wwww.behance.com/',
        'dribbble'   => 'https://wwww.dribbble.com/',
        'vimeo'      => 'https://wwww.vimeo.com/',
        'medium'     => 'https://wwww.medium.com/',
        'dunked'     => 'https://wwww.dunked.com/',
        'envato'     => 'https://wwww.envato.com/',
        'youtube'    => 'https://wwww.youtube.com/',
        'instagram'  => 'https://wwww.instagram.com/',
        'add_custom' => 'Add Custom',
    ],

    'salutations' => [
        'mr'           => 'Mr',
        'mrs'          => 'Mrs',
        'miss'         => 'Miss',
        'dr'           => 'Dr',
        'ms'           => 'Ms',
        'prof'         => 'Prof',
        'rev'          => 'Rev',
        'lady'         => 'Lady',
        'sir'          => 'Sir',
        'capt'         => 'Capt',
        'major'        => 'Major',
        'lt_col'       => 'Lt.-Col',
        'col'          => 'Col',
        'lt_cmdr'      => 'Lt.-Cmdr',
        'the_hon'      => 'The Hon',
        'cmdr'         => 'Cmdr',
        'flt_lt'       => 'Flt. Lt',
        'brgdr'        => 'Brgdr',
        'judge'        => 'Judge',
        'lord'         => 'Lord',
        'the_hon_mrs'  => 'The Hon. Mrs',
        'wng_cmdr'     => 'Wng. Cmdr',
        'group_capt'   => 'Group Capt',
        'rt_hon_lord'  => 'Rt. Hon. Lord',
        'revd_father'  => 'Revd. Father',
        'revd_canon'   => 'Revd Canon',
        'pastor'       => 'Pastor',
        'sister'       => 'Sister',
        'eng'          => 'Engineer',
        'brother'      => 'Brother',
        'maj_gen'      => 'Maj.-Gen',
        'air_cdre'     => 'Air Cdre',
        'viscount'     => 'Viscount',
        'dame'         => 'Dame',
        'rear_dmrl'    => 'Rear Admrl',
        'other'        => 'Other',
    ],

    'media_types' => [
        'video'  =>  'Video',
        'image'  =>  'Image',
    ],

    'article_formats' => [
        'gallery' => 'Gallery Post',
        'slider'  => 'Slider Post',
        'mixed'   => 'Mixed Content',
        'video'   => 'Video',
        'audio'   => 'Audio',
        'link' => 'Link',
        'code' => 'Code',
        'text' => 'Text',
    ],

    'article_types' => [
        'case_study' => "Case Study",
        'project' => "Project",
        'article' => "Article",
        'journal' => "Journal",
        'gallery' => "Gallery",
        'company' => "Company",
        'blog'    => "Blog",
        'news'    => "News",
        'vlog'    => "Video Blog (Vlog)",
        'faq'     => "FAQ",
        'add_custom' => 'Add Custom', // this allows us to create custom types
    ],

    'mailing_protocol' => [
        'smtp' => 'SMTP',
        'mail' => 'Mail',
    ],

    'signout' => [
        'term' =>  'exit',
        'reasons' => [
            'session_error' => 'Session Error',
            'user_request'  => 'User Request',
            'signin_error'  => 'Signin Error',
            'session_idle'  => 'Session Idle',
        ],
    ],

    'security' =>  [
        'lockdown' =>  [
            1 => [
                'type' => 'captcha', // status type
                'message' => 'security_breach_captcha', // status message
            ],
            2 => [
                'type' => 'flagged', // status type
                'message' => 'security_breach_flagged', // status message
            ],
            3 => [
                'type' => 'banned', // status type
                'message' => 'security_breach_banned', // status message
            ],
            4 => [
                'type' => 'blocked', // status type
                'message' => 'security_breach_blocked', // status message
            ],
            5 => [
                'type' => 'wait', // status type
                'message' => 'security_breach_waiting', // status message
            ],
            6 => [
                'type' => 'attempt', // status type
                'message' => 'security_breach_attempt', // status message
            ],
        ],
    ],

    'professions' => [
        'public_service' => 'Public Service',
        'transport'      => 'Transport',
        'academia'       => 'Academia',
        'cultural'       => 'Cultural',
        'industry'       => 'Industry',
        'nursing'        => 'Nursing',
        'science'        => 'Science',
        'other'          => 'Other',
        'none'           => 'None',
    ],

    'company_reg_types' => [
        'LLC' => 'Limited liability company',
        'LLP' => 'Limited Liability Partnership',
        'PMC' => 'Property management company',
        'CLG' => 'Companies Limited by Guarantee',
        'CIC' => 'Community Interest Company',
        'CIO' => 'Charitable Incorporated Organisation',
        'RTM' => 'Right to manage company',
        'LTD' => 'Public company (Ltd)',
        'INC' => 'Incorporated',
        'SOC' => 'State-owned company (SOC)',
        'EC'  => 'External company ',
        'NPC' => 'Non-profit company (NPC) ',
        'PLC' => 'Public Limited Companies (PLC)',
        'PTY' => 'Private company (Pty) Ltd',
        'UC'  => 'Unlimited company',
    ],

    # https://www.recruiter.com/careers/
    'occupation_types' => [
        'agriculture_food_and_natural_resources'    => 'Agriculture, Food and Natural Resources',
        'architecture_and_construction'             => 'Architecture and Construction',
        'arts_video_tech_and_communication'         => 'Arts, Audio/Video Technology and Communications',
        'business_management_and_administration'    => 'Business Management and Administration',
        'education_and_training'                    => 'Education and Training',
        'finance'                                   => 'Finance',
        'government_and_public_administration'      => 'Government and Public Administration',
        'health_science'                            => 'Health Science',
        'hospitality_and_tourism'                   => 'Hospitality and Tourism',
        'human_services'                            => 'Human Services',
        'information_technology'                    => 'Information Technology',
        'law_public_safety_correction_and_security' => 'Law, Public Safety, Corrections and Security',
        'manufacturing'                             => 'Manufacturing',
        'marketing_sales_and_service'               => 'Marketing, Sales and Service',
        'science_tech_engineering_and_mathematics'  => 'Science, Technology, Engineering and Mathematics',
        'transportation_distribution_and_logistics' => 'Transportation, Distribution and Logistics',
    ],

    # http:// hbswk.hbs.edu/industries/
    'industry_types' => [
        'agriculture'                           => 'Agriculture',
        'accounting'                            => 'Accounting',
        'advertising'                           => 'Advertising',
        'aerospace'                             => 'Aerospace',
        'aircraft'                              => 'Aircraft',
        'airline'                               => 'Airline',
        'apparel_accessories'                   => 'Apparel & Accessories',
        'automotive'                            => 'Automotive',
        'banking'                               => 'Banking',
        'broadcasting'                          => 'Broadcasting',
        'brokerage'                             => 'Brokerage',
        'biotechnology'                         => 'Biotechnology',
        'call_centers'                          => 'Call Centers',
        'cargo_handling'                        => 'Cargo Handling',
        'chemical'                              => 'Chemical',
        'computer'                              => 'Computer',
        'consulting'                            => 'Consulting',
        'consumer_products'                     => 'Consumer Products',
        'cosmetics'                             => 'Cosmetics',
        'defense'                               => 'Defense',
        'department_stores'                     => 'Department Stores',
        'education'                             => 'Education',
        'electronics'                           => 'Electronics',
        'energy'                                => 'Energy',
        'entertainment_and_leisure'             => 'Entertainment & Leisure',
        'executive_search'                      => 'Executive Search',
        'financial_services'                    => 'Financial Services',
        'food_beverage_and_tobacco'             => 'Food, Beverage & Tobacco',
        'grocery'                               => 'Grocery',
        'health_care'                           => 'Health Care',
        'internet_publishing'                   => 'Internet Publishing',
        'investment_banking'                    => 'Investment Banking',
        'legal'                                 => 'Legal',
        'manufacturing'                         => 'Manufacturing',
        'motion_picture_video'                  => 'Motion Picture & Video',
        'music'                                 => 'Music',
        'newspaper_publishers'                  => 'Newspaper Publishers',
        'online_auctions'                       => 'Online Auctions',
        'pension_funds'                         => 'Pension Funds',
        'pharmaceuticals'                       => 'Pharmaceuticals',
        'private_equity'                        => 'Private Equity',
        'publishing'                            => 'Publishing',
        'real_estate'                           => 'Real Estate',
        'retail_and_Wholesale'                  => 'Retail & Wholesale',
        'securities_and_commodity_exchanges'    => 'Securities & Commodity Exchanges',
        'service'                               => 'Service',
        'soap_and_detergent'                    => 'Soap & Detergent',
        'software'                              => 'Software',
        'sports'                                => 'Sports',
        'technology'                            => 'Technology',
        'telecommunications'                    => 'Telecommunications',
        'television'                            => 'Television',
        'transportation'                        => 'Transportation',
        'trucking'                              => 'Trucking',
        'venture_capital'                       => 'Venture Capital',
        'other'                                 => 'Other',
        'none'                                  => 'None',
    ],

    'careers' => [
        'accountant'                        =>  'Accountant',
        'actuarie'                          =>  'Actuarie',
        'advocate'                          =>  'Advocate',
        'agriculturist'                     =>  'Agriculturist',
        'air_traffic_controller'            =>  'Air Traffic Controller',
        'aircraft_pilot'                    =>  'Aircraft Pilot',
        'archaeologist'                     =>  'Archaeologist',
        'architect'                         =>  'Architect',
        'artist'                            =>  'Artist',
        'astronomer'                        =>  'Astronomer',
        'audiologist'                       =>  'Audiologist',
        'biologist'                         =>  'Biologist',
        'botanist'                          =>  'Botanist',
        'chemist'                           =>  'Chemist',
        'clergy'                            =>  'Clergy',
        'dentist'                           =>  'Dentist',
        'designer'                          =>  'Designer',
        'ecologist'                         =>  'Ecologist',
        'economist'                         =>  'Economist',
        'engineer'                          =>  'Engineer',
        'english'                           =>  'English',
        'firefighter'                       =>  'Firefighter',
        'geneticist'                        =>  'Geneticist',
        'geologist'                         =>  'Geologist',
        'historian'                         =>  'Historian',
        'immunologist'                      =>  'Immunologist',
        'interpreter'                       =>  'Interpreter',
        'journalist'                        =>  'Journalist',
        'judge'                             =>  'Judge',
        'language_professional'             =>  'Language Professional',
        'lawyer'                            =>  'Lawyer',
        'librarian'                         =>  'Librarian',
        'mathematician'                     =>  'Mathematician',
        'meteorologist'                     =>  'Meteorologist',
        'midwife'                           =>  'Midwife',
        'military_officer'                  =>  'Military Officer',
        'none'                              =>  'None',
        'nurse'                             =>  'Nurse',
        'oceanographer'                     =>  'Oceanographer',
        'optometrist'                       =>  'Optometrist',
        'other'                             =>  'Other',
        'paramedic'                         =>  'Paramedic',
        'pathologist'                       =>  'Pathologist',
        'pharmacist'                        =>  'Pharmacist',
        'pharmacologist'                    =>  'Pharmacologist',
        'philosopher'                       =>  'Philosopher',
        'physician_public_service'          =>  'Physician (Public Service)',
        'physicist'                         =>  'Physicist',
        'physiotherapist'                   =>  'Physiotherapist',
        'police_officer'                    =>  'Police Officer',
        'property_appraiser_and_valuer'     =>  'Property Appraiser And Valuer',
        'psychologist'                      =>  'Psychologist',
        'scientist'                         =>  'Scientist',
        'sea_captain'                       =>  'Sea Captain',
        'search_and_rescuer'                =>  'Search And Rescuer',
        'social_worker'                     =>  'Social Worker',
        'solicitor'                         =>  'Solicitor',
        'speech_language_pathologist'       =>  'Speech-language Pathologist',
        'statistician'                      =>  'Statistician',
        'surgeon'                           =>  'Surgeon',
        'surveyor'                          =>  'Surveyor',
        'teacher'                           =>  'Teacher',
        'urban_planner'                     =>  'Urban Planner',
        'veterinarian'                      =>  'Veterinarian',
        'virologist'                        =>  'Virologist',
        'zoologist'                         =>  'Zoologist',
    ],

    'copyrights' => [
        'declaration' => "All brands, logos and trademarks are products and &copy; to their respective owners.",
        'made_in'     => "Made in Nairobi, Kenya",
        'rights'      => "All Rights Reserved",
        'pride'       => "Carefully, Beautifully handcrafted with lot's of LOVE & PRIDE in Nairobi, KENYA",
    ],

    /**
     * #######################################################################
     *
     * TEMPLATE SETTINGS
     *
     * #######################################################################
     *
     */
    'template_zones' => [
        'frontend',
        'backend',
        'generic',
        'email',
        'auth',
    ],

    /**
     * #######################################################################
     *
     * MENU SETTINGS
     *
     * #######################################################################
     *
     */

    'menu_locations' => [
        'secondary' => 'Secondary',
        'primary'   => 'Primary',
        'inline'    => 'Inline',
        'mini'      => 'Mini',
        'main'      => 'Main',
        'side'      => 'Side',
    ],

    // link types
    'link_types' => [
        'internal' => 'Internal Link',
        'external' => 'External Link',
    ],

    // anchor types
    'anchor_types' => [
        'parent' => 'Parent Link',
        'article'=> 'Article Link',
    ],

    // possible link to types
    // in the order of location to page
    'link_to'     => [
        'home'       => 'Home',
        'users'      => 'Users',
        'blog'       => 'Blog',
        'articles'   => 'Article',
        'companies'  => 'Companies',
        'about'      => 'About',
        'contact'    => 'Contact',
        'api'        => 'API',
        'add_custom' => 'Add Custom', // this allows us to create custom types
    ],

    /**
     * #######################################################################
     *
     * DEFAULT FILE ASSETS
     *
     * #######################################################################
     *
     */

    'default_assets' => [
        'users' => [
            'avatar' => 'avatar.png',
            'cover'  => 'profile_cover.png',
        ],
        'companies' => [
            'cover' => 'profile_cover.png',
            'logo'  => 'logo.png',
        ],
        'templates' => [
            'preview' => 'template_preview.png',
        ],
        'content' => [
            'mugshot' => 'mugshot.png',
        ],
        'general' => [

        ],
    ],

    /**
     * #######################################################################
     *
     * SEARCH
     *
     * #######################################################################
     *
     */
    'search' => [
        'term' => 'Search',
        'key'  => 'q',
    ],

    /**
     * #######################################################################
     *
     * SUPPORT & TICKETING
     *
     * #######################################################################
     *
     */
    'ticketing' => [
        'departments' => [
            'billing'   => 'Billing',
            'sales'     => 'Sales',
            'technical' => 'Technical',
            'support'   => 'Support',
        ],
        'statuses' => [
            'new'                  => [
                'name'  => 'New',
                'color' => '#F472B6',
            ],
            'open'                 => [
                'name'  => 'Open',
                'color' => '#1E40AF',
            ],
            'pending'              => [
                'name'  => 'Pending',
                'color' => '#D97706',
            ],
            'on_hold'              => [
                'name'  => 'On-hold',
                'color' => '#FBBF24',
            ],
            'closed'               => [
                'name'  => 'Closed',
                'color' => '#A78BFA',
            ],
            'waiting_on_customer'  => [
                'name'  => 'Waiting on customer',
                'color' => '#374151',
            ],
            'waiting_on_support'   => [
                'name'  => 'Waiting on support',
                'color' => '#9CA3AF',
            ],
            'under_review'         => [
                'name'  => 'Under review',
                'color' => '#60A5FA',
            ],
            'locked'               => [
                'name'  => 'Locked',
                'color' => '#111827',
            ],
            'solved'               => [
                'name'  => 'Solved',
                'color' => '#10B981',
            ],
        ],
        'priorities' => [
            'low'       => [
                'name'  => 'Low',
                'color' => '#FEF2F2',
            ],
            'normal'    => [
                'name'  => 'Normal',
                'color' => '#FEE2E2',
            ],
            'medium'    => [
                'name'  => 'Medium',
                'color' => '#FECACA',
            ],
            'high'      => [
                'name'  => 'High',
                'color' => '#F87171',
            ],
            'urgent'    => [
                'name'  => 'Urgent',
                'color' => '#DC2626',
            ],
            'critical'  => [
                'name'  => 'Critical',
                'color' => '#991B1B',
            ],
        ],

    ],

];
