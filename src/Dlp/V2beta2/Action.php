<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/privacy/dlp/v2beta2/dlp.proto

namespace Google\Cloud\Dlp\V2beta2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A task to execute on the completion of a job.
 *
 * Generated from protobuf message <code>google.privacy.dlp.v2beta2.Action</code>
 */
class Action extends \Google\Protobuf\Internal\Message
{
    protected $action;

    public function __construct() {
        \GPBMetadata\Google\Privacy\Dlp\V2Beta2\Dlp::initOnce();
        parent::__construct();
    }

    /**
     * Save resulting findings in a provided location.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2beta2.Action.SaveFindings save_findings = 1;</code>
     * @return \Google\Cloud\Dlp\V2beta2\Action_SaveFindings
     */
    public function getSaveFindings()
    {
        return $this->readOneof(1);
    }

    /**
     * Save resulting findings in a provided location.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2beta2.Action.SaveFindings save_findings = 1;</code>
     * @param \Google\Cloud\Dlp\V2beta2\Action_SaveFindings $var
     * @return $this
     */
    public function setSaveFindings($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dlp\V2beta2\Action_SaveFindings::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Publish a notification to a pubsub topic.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2beta2.Action.PublishToPubSub pub_sub = 2;</code>
     * @return \Google\Cloud\Dlp\V2beta2\Action_PublishToPubSub
     */
    public function getPubSub()
    {
        return $this->readOneof(2);
    }

    /**
     * Publish a notification to a pubsub topic.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2beta2.Action.PublishToPubSub pub_sub = 2;</code>
     * @param \Google\Cloud\Dlp\V2beta2\Action_PublishToPubSub $var
     * @return $this
     */
    public function setPubSub($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dlp\V2beta2\Action_PublishToPubSub::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->whichOneof("action");
    }

}

