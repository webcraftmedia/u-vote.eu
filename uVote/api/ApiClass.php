<?php

class ApiClass extends \SYSTEM\API\apiloginclass {
    public static function call_vote_action_vote($poll_ID, $vote) {
        return votes::write_vote($poll_ID, $vote);
    }
}