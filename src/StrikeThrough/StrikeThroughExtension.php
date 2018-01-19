<?php

namespace League\CommonMark\Extras\StrikeThrough;

use League\CommonMark\Extension\Extension;

class StrikeThroughExtension extends Extension {

    /**
     * {@inheritdoc}
     */
    public function getInlineParsers()
    {
        return [
            new StrikeThroughParser()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInlineRenderers()
    {
        return [
            'League\\CommonMark\\Extras\\StrikeThrough\\StrikeThroughElement' => new StrikeThroughRenderer()
        ];
    }
}