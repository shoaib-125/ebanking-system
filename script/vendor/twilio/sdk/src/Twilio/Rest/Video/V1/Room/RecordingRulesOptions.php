<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Video\V1\Room;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class RecordingRulesOptions {
    /**
     * @param array $rules A JSON-encoded array of recording rules
     * @return UpdateRecordingRulesOptions Options builder
     */
    public static function update(array $rules = Values::ARRAY_NONE): UpdateRecordingRulesOptions {
        return new UpdateRecordingRulesOptions($rules);
    }
}

class UpdateRecordingRulesOptions extends Options {
    /**
     * @param array $rules A JSON-encoded array of recording rules
     */
    public function __construct(array $rules = Values::ARRAY_NONE) {
        $this->options['rules'] = $rules;
    }

    /**
     * A JSON-encoded array of recording rules.
     *
     * @param array $rules A JSON-encoded array of recording rules
     * @return $this Fluent Builder
     */
    public function setRules(array $rules): self {
        $this->options['rules'] = $rules;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Video.V1.UpdateRecordingRulesOptions ' . $options . ']';
    }
}