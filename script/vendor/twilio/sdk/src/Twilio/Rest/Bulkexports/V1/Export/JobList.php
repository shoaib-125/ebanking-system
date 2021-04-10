<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Bulkexports\V1\Export;

use Twilio\ListResource;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class JobList extends ListResource {
    /**
     * Construct the JobList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [];
    }

    /**
     * Constructs a JobContext
     *
     * @param string $jobSid The unique string that that we created to identify the
     *                       Bulk Export job
     */
    public function getContext(string $jobSid): JobContext {
        return new JobContext($this->version, $jobSid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Bulkexports.V1.JobList]';
    }
}