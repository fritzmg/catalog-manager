<?php

$GLOBALS['TL_DCA']['tl_catalog_form_fields'] = [

    'config' => [

        'dataContainer' => 'Table',
        'enableVersioning' => true,
        'ptable' => 'tl_catalog_form',

        'onload_callback' => [

            [ 'CatalogManager\tl_catalog_form_fields', 'checkPermission' ]
        ],

        'sql' => [

            'keys' => [

                'id' => 'primary',
                'pid' => 'index'
            ]
        ]
    ],

    'list' => [

        'sorting' => [

            'mode' => 4,
            'fields' => [ 'sorting' ],
            'headerFields' => [ 'id' ],

            'child_record_callback' => [

                'CatalogManager\tl_catalog_form_fields',
                'setBackendRow'
            ]
        ],

        'operations' => [

            'edit' => [

                'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['edit'],
                'href' => 'act=edit',
                'icon' => 'header.gif'
            ],

            'copy' => [

                'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif'
            ],

            'delete' => [

                'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ],

            'toggle' => [

                'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['toggle'],
                'icon' => 'visible.gif',
                'href' => sprintf( 'catalogTable=%s', 'tl_catalog_form_fields' ),
                'attributes' => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s, '. sprintf( "'%s'", 'tl_catalog_form_fields' ) .' )"',
                'button_callback' => [ 'CatalogManager\DcCallbacks', 'toggleIcon' ]
            ],

            'show' => [

                'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            ]
        ],

        'global_operations' => [

            'all' => [

                'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            ]
        ]
    ],

    'palettes' => [

        '__selector__' => [ 'type', 'optionsType' ],

        'default' => '{field_type_legend},type,name,title;',
        'text' => '{field_type_legend},type,name,title;{general_legend},label,placeholder,description,defaultValue,mandatory,tabindex,cssID;{dependency_legend},dependOnField;{template_legend:hide},template;{invisible_legend},invisible;',
        'hidden' => '{field_type_legend},type,name,title,defaultValue;{invisible_legend},invisible;',
        'radio' => '{field_type_legend},type,name,title;{general_legend},label,description,defaultValue,submitOnChange,includeBlankOption,blankOptionLabel,mandatory,cssID;{option_legend},optionsType;{date_legend},dbParseDate,dbDateFormat;{dependency_legend},dependOnField;{template_legend:hide},template;{invisible_legend},invisible;',
        'select' => '{field_type_legend},type,name,title;{general_legend},label,description,defaultValue,submitOnChange,multiple,includeBlankOption,blankOptionLabel,mandatory,tabindex,cssID;{option_legend},optionsType;{date_legend},dbParseDate,dbDateFormat;{dependency_legend},dependOnField;{template_legend:hide},template;{invisible_legend},invisible;',
        'range' => '{field_type_legend},type,name,title;{general_legend},rangeLowLabel,rangeGreatLabel,description,mandatory,cssID;{option_legend},optionsType;{date_legend},dbParseDate,dbDateFormat;{dependency_legend},dependOnField;{template_legend:hide},template;{invisible_legend},invisible;',
    ],

    'subpalettes' => [

        'optionsType_useOptions' => 'options',
        'optionsType_useActiveDbOptions' => 'dbTable,dbColumn,dbTaxonomy,dbOrderBy,dbIgnoreEmptyValues',
        'optionsType_useDbOptions' => 'dbTable,dbTableKey,dbTableValue,dbTaxonomy,dbOrderBy,dbIgnoreEmptyValues',
    ],

    'fields' => [

        'id' => [

            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],

        'pid' => [

            'foreignKey' => 'tl_catalog_form.id',

            'relation' => [

                'type' => 'belongsTo',
                'load' => 'eager'
            ],

            'sql' => "int(10) unsigned NOT NULL default '0'",
        ],

        'sorting' => [

            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],

        'tstamp' => [

            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],

        'type' => [

            'label' =>  &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['type'],
            'inputType' => 'select',
            'default' => 'text',

            'eval' => [

                'chosen' => true,
                'mandatory' => true,
                'tl_class' => 'w50',
                'submitOnChange' => true
            ],

            'options_callback' => [

                'CatalogManager\tl_catalog_form_fields',
                'getFilterFormFields'
            ],

            'reference' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['reference']['type'],

            'exclude' => true,
            'sql' => "varchar(64) NOT NULL default ''"
        ],

        'name' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['name'],
            'inputType' => 'text',

            'eval' => [

                'rgxp' => 'extnd',
                'maxlength' => 64,
                'tl_class' => 'w50',
                'mandatory' => true,
                'doNotCopy' => true,
                'spaceToUnderscore' => true,
            ],

            'exclude' => true,
            'sql' => "varchar(64) NOT NULL default ''"
        ],

        'title' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['title'],
            'inputType' => 'text',

            'eval' => [

                'mandatory' => true,
                'tl_class' => 'w50',
                'maxlength' => 255
            ],

            'exclude' => true,
            'sql' => "varchar(255) NOT NULL default ''"
        ],

        'label' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['label'],
            'inputType' => 'text',

            'eval' => [

                'tl_class' => 'w50',
                'maxlength' => 255
            ],

            'exclude' => true,
            'sql' => "varchar(255) NOT NULL default ''"
        ],

        'description' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['description'],
            'inputType' => 'text',

            'eval' => [

                'tl_class' => 'clr long',
                'maxlength' => 512
            ],

            'exclude' => true,
            'sql' => "varchar(512) NOT NULL default ''"
        ],

        'placeholder' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['placeholder'],
            'inputType' => 'text',

            'eval' => [

                'tl_class' => 'w50',
                'maxlength' => 255
            ],

            'exclude' => true,
            'sql' => "varchar(255) NOT NULL default ''"
        ],

        'multiple' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['multiple'],
            'inputType' => 'checkbox',

            'eval' => [

                'tl_class' => 'w50 m12'
            ],

            'exclude' => true,
            'sql' => "char(1) NOT NULL default ''"
        ],

        'submitOnChange' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['submitOnChange'],
            'inputType' => 'checkbox',

            'eval' => [

                'tl_class' => 'w50 m12',
            ],

            'exclude' => true,
            'sql' => "char(1) NOT NULL default ''"
        ],

        'includeBlankOption' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['includeBlankOption'],
            'inputType' => 'checkbox',

            'eval' => [

                'tl_class' => 'w50 m12',
            ],

            'exclude' => true,
            'sql' => "char(1) NOT NULL default ''"
        ],

        'blankOptionLabel' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['blankOptionLabel'],
            'inputType' => 'text',

            'eval' => [

                'maxlength' => 64,
                'tl_class' => 'w50',
            ],

            'exclude' => true,
            'sql' => "varchar(64) NOT NULL default ''"
        ],

        'rangeGreatLabel' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['rangeGreatLabel'],
            'inputType' => 'text',

            'eval' => [

                'tl_class' => 'w50',
                'maxlength' => 255
            ],

            'exclude' => true,
            'sql' => "varchar(255) NOT NULL default ''"
        ],

        'rangeLowLabel' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['rangeLowLabel'],
            'inputType' => 'text',

            'eval' => [

                'tl_class' => 'w50',
                'maxlength' => 255
            ],

            'exclude' => true,
            'sql' => "varchar(255) NOT NULL default ''"
        ],
        
        'dependOnField' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['dependOnField'],
            'inputType' => 'select',

            'eval' => [

                'chosen' => true,
                'maxlength' => 128,
                'tl_class' => 'w50',
                'blankOptionLabel' => '-',
                'includeBlankOption'=>true
            ],

            'options_callback' => [ 'CatalogManager\tl_catalog_form_fields', 'getFormFields' ],

            'exclude' => true,
            'sql' => "varchar(128) NOT NULL default ''"
        ],

        'optionsType' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['optionsType'],
            'inputType' => 'radio',
            'default' => 'useColumn',

            'eval' => [

                'maxlength' => 18,
                'mandatory' => true,
                'tl_class' => 'clr',
                'submitOnChange' => true
            ],

            'options' => [ 'useOptions', 'useDbOptions', 'useActiveDbOptions' ],
            'reference' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['reference']['optionsType'],

            'exclude' => true,
            'sql' => "varchar(18) NOT NULL default ''"
        ],

        'options' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['options'],
            'inputType' => 'keyValueWizard',
            'exclude' => true,

            'eval' => [

                'mandatory' => true
            ],

            'sql' => "blob NULL"
        ],

        'dbColumn' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['dbColumn'],
            'inputType' => 'select',

            'eval' => [

                'chosen' => true,
                'maxlength' => 128,
                'mandatory' => true,
                'tl_class' => 'w50'
            ],

            'options_callback' => [ 'CatalogManager\tl_catalog_form_fields', 'getTableColumns' ],

            'exclude' => true,
            'sql' => "varchar(128) NOT NULL default ''"
        ],

        'dbTable' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['dbTable'],
            'inputType' => 'select',

            'eval' => [

                'chosen' => true,
                'maxlength' => 128,
                'tl_class' => 'w50',
                'mandatory' => true,
                'submitOnChange' => true,
                'blankOptionLabel' => '-',
                'includeBlankOption'=>true,
            ],

            'options_callback' => [ 'CatalogManager\tl_catalog_form_fields', 'getTables' ],

            'exclude' => true,
            'sql' => "varchar(128) NOT NULL default ''"
        ],

        'dbTableKey' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['dbTableKey'],
            'inputType' => 'select',

            'eval' => [

                'chosen' => true,
                'maxlength' => 128,
                'tl_class' => 'w50',
                'mandatory' => true,
            ],

            'options_callback' => [ 'CatalogManager\tl_catalog_form_fields', 'getColumnsByDbTable' ],

            'exclude' => true,
            'sql' => "varchar(128) NOT NULL default ''"
        ],

        'dbTableValue' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['dbTableValue'],
            'inputType' => 'select',

            'eval' => [

                'chosen' => true,
                'maxlength' => 128,
                'tl_class' => 'w50',
                'mandatory' => true,
            ],

            'options_callback' => [ 'CatalogManager\tl_catalog_form_fields', 'getColumnsByDbTable' ],

            'exclude' => true,
            'sql' => "varchar(128) NOT NULL default ''"
        ],

        'dbTaxonomy' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['dbTaxonomy'],
            'inputType' => 'catalogTaxonomyWizard',

            'eval' => [

                'tl_class' => 'clr',
                'dcTable' => 'tl_catalog_form_fields',
                'taxonomyTable' => [ 'CatalogManager\tl_catalog_form_fields', 'getTaxonomyTable' ],
                'taxonomyEntities' => [ 'CatalogManager\tl_catalog_form_fields', 'getTaxonomyFields' ]
            ],

            'exclude' => true,
            'sql' => "blob NULL"
        ],

        'dbIgnoreEmptyValues' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['dbIgnoreEmptyValues'],
            'inputType' => 'checkbox',

            'eval' => [

                'tl_class' => 'w50 m12',
            ],

            'exclude' => true,
            'sql' => "char(1) NOT NULL default ''"
        ],

        'dbParseDate' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['dbParseDate'],
            'inputType' => 'checkbox',

            'eval' => [

                'tl_class' => 'w50 m12',
            ],

            'exclude' => true,
            'sql' => "char(1) NOT NULL default ''"
        ],

        'dbDateFormat' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['dbDateFormat'],
            'inputType' => 'radio',
            'default' => 'monthBegin',

            'eval' => [

                'tl_class' => 'w50',
            ],

            'options' => [ 'monthBegin', 'yearBegin' ],
            'reference' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['reference']['dbDateFormat'],
            'exclude' => true,
            'sql' => "varchar(255) NOT NULL default ''"
        ],

        'dbOrderBy' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['dbOrderBy'],
            'inputType' => 'catalogDuplexSelectWizard',

            'eval' => [

                'chosen' => true,
                'blankOptionLabel' => '-',
                'includeBlankOption' => true,
                'mainLabel' => 'catalogManagerFields',
                'dependedLabel' => 'catalogManagerOrder',
                'mainOptions' => [ 'CatalogManager\OrderByHelper', 'getSortableFields' ],
                'dependedOptions' => [ 'CatalogManager\OrderByHelper', 'getOrderByItems' ]
            ],

            'exclude' => true,
            'sql' => "blob NULL"
        ],

        'defaultValue' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['defaultValue'],
            'inputType' => 'text',

            'eval' => [

                'tl_class' => 'w50',
                'maxlength' => 255
            ],

            'exclude' => true,
            'sql' => "varchar(255) NOT NULL default ''"
        ],

        'cssID' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['cssID'],
            'inputType' => 'text',

            'eval' => [

                'size' => 2,
                'multiple' => true,
                'tl_class' => 'w50',
                'maxlength' => 255
            ],

            'exclude' => true,
            'sql' => "varchar(255) NOT NULL default ''"
        ],

        'tabindex' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['tabindex'],
            'inputType' => 'text',

            'eval' => [

                'rgxp' => 'natural',
                'tl_class' => 'w50'
            ],

            'exclude' => true,
            'sql' => "smallint(5) unsigned NOT NULL default '0'"
        ],

        'template' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['template'],
            'inputType' => 'select',

            'eval' => [

                'chosen'=> true,
                'tl_class'=> 'w50',
                'maxlength' => 64,
                'includeBlankOption'=> true
            ],

            'options_callback' => [ 'CatalogManager\tl_catalog_form_fields', 'getFieldTemplates' ],

            'exclude' => true,
            'sql' => "varchar(64) NOT NULL default ''"
        ],

        'invisible' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['invisible'],
            'inputType' => 'checkbox',
            'exclude' => true,
            'sql' => "char(1) NOT NULL default ''"
        ],

        'mandatory' => [

            'label' => &$GLOBALS['TL_LANG']['tl_catalog_form_fields']['mandatory'],
            'inputType' => 'checkbox',

            'eval' => [

                'tl_class' => 'm12 w50'
            ],

            'exclude' => true,
            'sql' => "char(1) NOT NULL default ''"
        ]
    ]
];