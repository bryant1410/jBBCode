<?php

namespace JBBCode;

require_once 'CodeDefinition.php';
require_once 'CodeDefinitionBuilder.php';
require_once 'CodeDefinitionSet.php';

/**
 * Provides a default set of common bbcode definitions.
 *
 * @author jbowens
 */
class DefaultCodeDefinitionSet implements CodeDefinitionSet {

    /* The default code definitions in this set. */
    protected $definitions = array();

    /**
     * Constructs the default code definitions.
     */
    public function __construct() {
        /* [b] bold tag */
        $builder = new CodeDefinitionBuilder('b', '<strong>{param}</strong>');
        array_push($this->definitions, $builder->build());

        /* [i] italics tag */
        $builder->setTagName('i');
        $builder->setReplacementText('<em>{param}</em>');
        array_push($this->definitions, $builder->build());

        /* [u] italics tag */
        $builder->setTagName('u');
        $builder->setReplacementText('<u>{param}</u>');
        array_push($this->definitions, $builder->build());

        /* [url] link tag */
        $builder->setTagName('url');
        $builder->setReplacementText('<a href="{param}">{param}</a>');
        array_push($this->definitions, $builder->build());

        /* [url=http://example.com] link tag */
        $builder->setUseOption(true);
        $builder->setReplacementText('<a href="{option}">{param}</a>');
        array_push($this->definitions, $builder->build());

        /* [img] image tag */
        $builder->setTagName('img');
        $builder->setUseOption(false);
        $builder->setReplacementText('<img src="{param}" />');
        array_push($this->definitions, $builder->build());

        /* [img=alt text] image tag */
        $builder->setUseOption(true);
        $builder->setReplacementText('<img src="{param}" alt="{option}" />');
        array_push($this->definitions, $builder->build());

        /* [color] color tag */
        $builder->setTagName('color');
        $builder->setReplacementText('<span style="color: {option}">{param}</span>');
        array_push($this->definitions, $builder->build());
    }

    /**
     * Returns an array of the default code definitions.
     */
    public function getCodeDefinitions() {
        return $this->definitions;
    }

}
