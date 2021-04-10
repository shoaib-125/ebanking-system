<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Conversations\V1\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class RoleContext extends InstanceContext {
    /**
     * Initialize the RoleContext
     *
     * @param Version $version Version that contains the resource
     * @param string $chatServiceSid The SID of the Conversation Service to fetch
     *                               the resource from
     * @param string $sid The SID of the Role resource to fetch
     */
    public function __construct(Version $version, $chatServiceSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['chatServiceSid' => $chatServiceSid, 'sid' => $sid, ];

        $this->uri = '/Services/' . \rawurlencode($chatServiceSid) . '/Roles/' . \rawurlencode($sid) . '';
    }

    /**
     * Update the RoleInstance
     *
     * @param string[] $permission A permission the role should have
     * @return RoleInstance Updated RoleInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $permission): RoleInstance {
        $data = Values::of(['Permission' => Serialize::map($permission, function($e) { return $e; }), ]);

        $payload = $this->version->update('POST', $this->uri, [], $data);

        return new RoleInstance(
            $this->version,
            $payload,
            $this->solution['chatServiceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Delete the RoleInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->version->delete('DELETE', $this->uri);
    }

    /**
     * Fetch the RoleInstance
     *
     * @return RoleInstance Fetched RoleInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): RoleInstance {
        $payload = $this->version->fetch('GET', $this->uri);

        return new RoleInstance(
            $this->version,
            $payload,
            $this->solution['chatServiceSid'],
            $this->solution['sid']
        );
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
        return '[Twilio.Conversations.V1.RoleContext ' . \implode(' ', $context) . ']';
    }
}