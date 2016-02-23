<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string cumulative
 * @property string realtime
 * @property string workspaceSid
 */
class WorkersStatisticsInstance extends InstanceResource {
    /**
     * Initialize the WorkersStatisticsInstance
     * 
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkersStatisticsInstance 
     */
    public function __construct(Version $version, array $payload, $workspaceSid) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'accountSid' => $payload['account_sid'],
            'cumulative' => $payload['cumulative'],
            'realtime' => $payload['realtime'],
            'workspaceSid' => $payload['workspace_sid'],
        );
        
        $this->solution = array(
            'workspaceSid' => $workspaceSid,
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkersStatisticsContext Context for this WorkersStatisticsInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new WorkersStatisticsContext(
                $this->version,
                $this->solution['workspaceSid']
            );
        }
        
        return $this->context;
    }

    /**
     * Fetch a WorkersStatisticsInstance
     * 
     * @param array $options Optional Arguments
     * @return WorkersStatisticsInstance Fetched WorkersStatisticsInstance
     */
    public function fetch(array $options = array()) {
        return $this->proxy()->fetch(
            $options
        );
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        
        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Taskrouter.V1.WorkersStatisticsInstance ' . implode(' ', $context) . ']';
    }
}