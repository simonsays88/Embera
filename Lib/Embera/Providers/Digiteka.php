<?php

namespace Embera\Providers;

/**
 * The Digiteka Provider
 * @link https://www.ultimedia.com
 */
class Digiteka extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://www.ultimedia.com/api/search/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();

        return (preg_match('~ultimedia\.com/(?:[^ ]+)/id/(?:[^ ]+)~i', $this->url));
    }

    /** inline {@inheritdoc}
      * @TODO: This function needs to be removed when Digiteka will change their oembed return
     */
    protected function modifyResponse(array $response = array())
    {
        if (!empty($response['html'])) {
            $response['html'] = preg_replace('/mdtk\/([0-9]+)\/src/', 'mdtk/01357940/src', $response['html']);  
        }
        return $response;
    }
}

?>
