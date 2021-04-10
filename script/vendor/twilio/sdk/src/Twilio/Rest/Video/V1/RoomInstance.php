<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Video\V1;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Rest\Video\V1\Room\ParticipantList;
use Twilio\Rest\Video\V1\Room\RecordingRulesList;
use Twilio\Rest\Video\V1\Room\RoomRecordingList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $sid
 * @property string $status
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $accountSid
 * @property bool $enableTurn
 * @property string $uniqueName
 * @property string $statusCallback
 * @property string $statusCallbackMethod
 * @property \DateTime $endTime
 * @property int $duration
 * @property string $type
 * @property int $maxParticipants
 * @property int $maxConcurrentPublishedTracks
 * @property bool $recordParticipantsOnConnect
 * @property string[] $videoCodecs
 * @property string $mediaRegion
 * @property string $url
 * @property array $links
 */
class RoomInstance extends InstanceResource {
    protected $_recordings;
    protected $_participants;
    protected $_recordingRules;

    /**
     * Initialize the RoomInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID that identifies the resource to fetch
     */
    public function __construct(Version $version, array $payload, string $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'sid' => Values::array_get($payload, 'sid'),
            'status' => Values::array_get($payload, 'status'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'enableTurn' => Values::array_get($payload, 'enable_turn'),
            'uniqueName' => Values::array_get($payload, 'unique_name'),
            'statusCallback' => Values::array_get($payload, 'status_callback'),
            'statusCallbackMethod' => Values::array_get($payload, 'status_callback_method'),
            'endTime' => Deserialize::dateTime(Values::array_get($payload, 'end_time')),
            'duration' => Values::array_get($payload, 'duration'),
            'type' => Values::array_get($payload, 'type'),
            'maxParticipants' => Values::array_get($payload, 'max_participants'),
            'maxConcurrentPublishedTracks' => Values::array_get($payload, 'max_concurrent_published_tracks'),
            'recordParticipantsOnConnect' => Values::array_get($payload, 'record_participants_on_connect'),
            'videoCodecs' => Values::array_get($payload, 'video_codecs'),
            'mediaRegion' => Values::array_get($payload, 'media_region'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        ];

        $this->solution = ['sid' => $sid ?: $this->properties['sid'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return RoomContext Context for this RoomInstance
     */
    protected function proxy(): RoomContext {
        if (!$this->context) {
            $this->context = new RoomContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch the RoomInstance
     *
     * @return RoomInstance Fetched RoomInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): RoomInstance {
        return $this->proxy()->fetch();
    }

    /**
     * Update the RoomInstance
     *
     * @param string $status The new status of the resource
     * @return RoomInstance Updated RoomInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $status): RoomInstance {
        return $this->proxy()->update($status);
    }

    /**
     * Access the recordings
     */
    protected function getRecordings(): RoomRecordingList {
        return $this->proxy()->recordings;
    }

    /**
     * Access the participants
     */
    protected function getParticipants(): ParticipantList {
        return $this->proxy()->participants;
    }

    /**
     * Access the recordingRules
     */
    protected function getRecordingRules(): RecordingRulesList {
        return $this->proxy()->recordingRules;
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Video.V1.RoomInstance ' . \implode(' ', $context) . ']';
    }
}