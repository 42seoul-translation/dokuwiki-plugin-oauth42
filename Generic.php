<?php

namespace dokuwiki\plugin\oauthgeneric;

use dokuwiki\plugin\oauth\Service\AbstractOAuth2Base;
use OAuth\Common\Http\Uri\Uri;

/**
 * Custom Service for Generic oAuth
 */
class Generic extends AbstractOAuth2Base
{
    /** @inheritdoc */
    public function needsStateParameterInAuthUrl() {
        $plugin = plugin_load('helper', 'oauthgeneric');
        return 0 !== $plugin->getConf('needs-state');
    }

    /** @inheritdoc */
    public function getAuthorizationEndpoint()
    {
        $plugin = plugin_load('helper', 'oauthgeneric');
        return new Uri($plugin->getConf('authurl'));
    }

    /** @inheritdoc */
    public function getAccessTokenEndpoint()
    {
        $plugin = plugin_load('helper', 'oauthgeneric');
        return new Uri($plugin->getConf('tokenurl'));
    }

    /**
     * @inheritdoc
     */
    protected function getAuthorizationMethod()
    {
        $plugin = plugin_load('helper', 'oauthgeneric');

        return (int) $plugin->getConf('authmethod');
    }
}
