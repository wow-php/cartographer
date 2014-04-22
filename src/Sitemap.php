<?php

namespace Tackk\Cartographer;

use DOMElement;

class Sitemap extends AbstractSitemap
{
    protected function getRootNodeName()
    {
        return 'urlset';
    }

    /**
     * Adds a URL to the urlset.
     * @param  string $url
     * @param  string $lastModified
     * @param  string $changeFrequency
     * @param  float  $priority
     * @return $this
     */
    public function add($url, $lastModified, $changeFrequency, $priority)
    {
        $node = $this->document->createElement('url');
        $node->appendChild(new DOMElement('loc', $this->escapeString($url)));
        $node->appendChild(new DOMElement('lastmod', $lastModified));
        $node->appendChild(new DOMElement('changefreq', $changeFrequency));
        $node->appendChild(new DOMElement('priority', $priority));
        $this->rootNode->appendChild($node);

        return $this;
    }
}
