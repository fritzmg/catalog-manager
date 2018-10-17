<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['catalogCatalogEntity'] = '{type_legend},type,headline;{entity_legend},catalogTablename,catalogEntityId,catalogEntityTemplate;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['catalogFilterForm'] = '{type_legend},type,headline;{include_legend},catalogForm;{template_legend:hide},customCatalogElementTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['catalogSocialSharingButtons'] = '{type_legend},type,headline;{social_sharing_legend},catalogSocialSharingButtons,catalogSocialSharingTable,catalogSocialSharingTitle,catalogSocialSharingDescription,catalogSocialSharingTemplate,catalogDisableSocialSharingCSS;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['palettes']['catalogVisibilityPanelStop'] = '{type_legend},type;{protected_legend:hide},protected;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['catalogVisibilityPanelStart'] = '{type_legend},type;{panel_settings},catalogNegateVisibility;{protected_legend:hide},protected;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['catalogNegateVisibility'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_content']['catalogNegateVisibility'],
    'inputType' => 'checkbox',

    'eval' => [

        'tl_class' => 'clr'
    ],

    'exclude' => true,
    'sql' => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['catalogForm'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_content']['catalogForm'],
    'inputType' => 'select',

    'eval' => [

        'chosen' => true,
        'mandatory' => true,
        'submitOnChange' => true,
        'blankOptionLabel' => '-',
        'tl_class' => 'w50 wizard',
        'includeBlankOption' => true,
    ],

    'wizard' => [

        [
            'CatalogManager\tl_content', 'editCatalogForm'
        ]
    ],

    'options_callback' => [ 'CatalogManager\tl_content', 'getCatalogForms' ],

    'exclude' => true,
    'sql' => "int(10) unsigned NOT NULL default '0'"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['catalogSocialSharingTable'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_content']['catalogSocialSharingTable'],
    'inputType' => 'select',

    'eval' => [

        'chosen' => true,
        'maxlength' => 128,
        'mandatory' => true,
        'tl_class' => 'w50',
        'submitOnChange' => true,
        'includeBlankOption' => true
    ],

    'options_callback' => [ 'CatalogManager\tl_content', 'getCatalogTables' ],

    'exclude' => true,
    'sql' => "varchar(128) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['catalogSocialSharingTitle'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_content']['catalogSocialSharingTitle'],
    'inputType' => 'select',

    'eval' => [

        'chosen' => true,
        'maxlength' => 128,
        'tl_class' => 'w50',
        'includeBlankOption' => true
    ],

    'options_callback' => [ 'CatalogManager\tl_content', 'getCatalogFields' ],
    
    'exclude' => true,
    'sql' => "varchar(128) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['catalogSocialSharingDescription'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_content']['catalogSocialSharingDescription'],
    'inputType' => 'select',

    'eval' => [

        'chosen' => true,
        'maxlength' => 128,
        'tl_class' => 'w50',
        'includeBlankOption' => true
    ],

    'options_callback' => [ 'CatalogManager\tl_content', 'getCatalogFields' ],

    'exclude' => true,
    'sql' => "varchar(128) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['catalogSocialSharingButtons'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_content']['catalogSocialSharingButtons'],
    'inputType' => 'checkboxWizard',

    'eval' => [

        'multiple' => true,
        'tl_class' => 'clr',
    ],

    'reference' => &$GLOBALS['TL_LANG']['MSC']['sharingButtons'],
    'options_callback' => [ 'CatalogManager\tl_content', 'getSocialSharingButtons' ],

    'exclude' => true,
    'sql' => "blob NULL"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['catalogSocialSharingTemplate'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_content']['catalogSocialSharingTemplate'],
    'inputType' => 'select',

    'eval' => [

        'chosen' => true,
        'maxlength' => 128,
        'tl_class' => 'w50'
    ],

    'options_callback' => [ 'CatalogManager\tl_content', 'getSocialSharingTemplates' ],

    'exclude' => true,
    'sql' => "varchar(128) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['catalogDisableSocialSharingCSS'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_content']['catalogDisableSocialSharingCSS'],
    'inputType' => 'checkbox',

    'eval' => [

        'tl_class' => 'clr'
    ],

    'exclude' => true,
    'sql' => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['customCatalogElementTpl'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_content']['customTpl'],
    'inputType' => 'select',

    'eval' => [

        'includeBlankOption' => true,
        'tl_class' => 'w50',
        'chosen' => true,
    ],

    'options_callback' => [ 'CatalogManager\tl_content', 'getFilterFormTemplates'  ],

    'exclude'  => true,
    'sql' => "varchar(64) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['catalogTablename'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_content']['catalogTablename'],
    'inputType' => 'select',

    'eval' => [

        'includeBlankOption' => true,
        'submitOnChange' => true,
        'mandatory' => true,
        'tl_class' => 'w50',
        'chosen' => true,
    ],

    'options_callback' => [ 'CatalogManager\tl_content', 'getTablenames'  ],
    'exclude'  => true,
    'sql' => "varchar(128) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['catalogEntityId'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_content']['catalogEntityId'],
    'inputType' => 'select',

    'eval' => [

        'includeBlankOption' => true,
        'mandatory' => true,
        'tl_class' => 'w50',
        'chosen' => true,
    ],

    'options_callback' => [ 'CatalogManager\tl_content', 'getCatalogEntities'  ],
    'exclude'  => true,
    'sql' => "int(10) unsigned NOT NULL default '0'"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['catalogEntityTemplate'] = [

    'label' => &$GLOBALS['TL_LANG']['tl_content']['catalogEntityTemplate'],
    'inputType' => 'select',

    'eval' => [

        'tl_class' => 'w50',
        'chosen' => true
    ],

    'options_callback' => [ 'CatalogManager\tl_content', 'getEntityTemplates'  ],
    'exclude'  => true,
    'sql' => "varchar(128) NOT NULL default ''"
];

if ( !isset( $GLOBALS['TL_DCA']['tl_content']['edit'] ) ) $GLOBALS['TL_DCA']['tl_content']['edit'] = [];
if ( !isset( $GLOBALS['TL_DCA']['tl_content']['edit']['buttons_callback'] ) ) $GLOBALS['TL_DCA']['tl_content']['edit']['buttons_callback'] = [];

$GLOBALS['TL_DCA']['tl_content']['edit']['buttons_callback'][] = [ 'CatalogManager\DcCallbacks', 'removeDcFormOperations' ];

if ( \Input::get('do') && \Input::get('ctlg_table') ) {
    
    $arrCatalog = $GLOBALS['TL_CATALOG_MANAGER']['CATALOG_EXTENSIONS'][ \Input::get('ctlg_table') ];

    if ( is_array( $arrCatalog ) && !empty( $arrCatalog ) ) {

        if ( $arrCatalog['addContentElements'] ) $GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = $arrCatalog['tablename'];
    }
}