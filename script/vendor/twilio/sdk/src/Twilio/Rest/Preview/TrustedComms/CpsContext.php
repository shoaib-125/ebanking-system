<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\TrustedComms;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class CpsContext extends InstanceContext {
    /**
     * Initialize the CpsContext
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [];

        $this->uri = '/CPS';
    }

    /**
     * Fetch the CpsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return CpsInstance Fetched CpsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []): CpsInstance {
        $options = new Values($options);

        $headers = Values::of(['X-Xcnam-Sensitive-Phone-Number' => $options['xXcnamSensitivePhoneNumber'], ]);

        $payload = $this->version->fetch('GET', $this->uri, [], [], $headers);

        return new CpsInstance($this->version, $payload);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.TrustedComms.CpsContext ' . \implode(' ', $context) . ']';
    }
}