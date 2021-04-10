<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle;

use Twilio\Http\Response;
use Twilio\Page;
use Twilio\Version;

class EvaluationPage extends Page {
    /**
     * @param Version $version Version that contains the resource
     * @param Response $response Response from the API
     * @param array $solution The context solution
     */
    public function __construct(Version $version, Response $response, array $solution) {
        parent::__construct($version, $response);

        // Path Solution
        $this->solution = $solution;
    }

    /**
     * @param array $payload Payload response from the API
     * @return EvaluationInstance \Twilio\Rest\Numbers\V2\RegulatoryCompliance\Bundle\EvaluationInstance
     */
    public function buildInstance(array $payload): EvaluationInstance {
        return new EvaluationInstance($this->version, $payload, $this->solution['bundleSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Numbers.V2.EvaluationPage]';
    }
}