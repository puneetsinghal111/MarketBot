<?php

/**
 * MarketBot
 *
 * @author Jon Ursenbach <jon@gdgt.com>
 * @link http://github.com/pastfuture/MarketBot
 * @license Modified BSD
 * @version 0.1
 *
 * Copyright (c) 2012, PastFuture, Inc.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *  * Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *  * Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *  * Neither the name of PastFuture, Inc., gdgt, nor the names of its
 *    contributors may be used to endorse or promote products derived from this
 *    software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 */

namespace PastFuture\MarketBot;

/**
 * MarketBot
 *
 * @package MarketBot
 * @author Jon Ursenbach <jon@gdgt.com>
 * @since 0.1
 */
class MarketBot
{
    /**
     * Version
     *
     * @var string
     */
    protected $version = '0.1';

    /**
     * Default language
     *
     * @var string
     */
    protected $language = 'en';

    /**
     * Initialize the phpQuery scraper for use.
     *
     * @param string $url
     *
     * @return void
     */
    protected function initScraper($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        $response = curl_exec($ch);
        curl_close($ch);

        \phpQuery::newDocument($response);
    }

    /**
     * Sets the language we want to deal with.
     *
     * @param string $language
     *
     * @return null
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * Gets the language we're dealing with.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
