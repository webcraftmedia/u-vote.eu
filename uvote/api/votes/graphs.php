<?php

class graphs {

    public static function graph_bt_to_uvote_overall_by_time ($timespan = 84600,$returnasjson = true){
        $result = array();
        $res = \SQL\UVOTE_DATA_GRAPH_BT_TO_UVOTE_OVERALL_BY_TIME::QQ(array($timespan));
        while ($row = $res->next()){
            $result[] = array(  0 => $row['day'],
                                'match' => $row['class_match'] > 0 ? round($row['class_match'] / ($row['class_match']+$row['class_mismatch']),2) : 0,
                                'mismatch' => $row['class_match'] > 0 ? round($row['class_mismatch'] / ($row['class_match']+$row['class_mismatch']),2) : 0);
        }
        return $returnasjson ? SYSTEM\LOG\JsonResult::toString($result) : $result;
    }
    
    public static function graph_bt_to_user_overall_by_time ($timespan = 84600,$returnasjson = true){
        $result = array();
        $res = \SQL\UVOTE_DATA_GRAPH_BT_TO_USER_OVERALL_BY_TIME::QQ(array($timespan, \SYSTEM\SECURITY\Security::getUser()->id, \SYSTEM\SECURITY\Security::getUser()->id));
        while ($row = $res->next()){
            $result[] = array(  0 => $row['day'],
                                'class_match' => $row['class_match'] / ($row['class_match']+$row['class_mismatch']+1),
                                'class_mismatch' => $row['class_mismatch'] / ($row['class_match']+$row['class_mismatch']+1));
        }
        return $returnasjson ? SYSTEM\LOG\JsonResult::toString($result) : $result;
    }
    
    public static function graph_party_to_user_overall_by_time ($party, $timespan, $returnasjson = true){
        $result = array();
        $res = \SQL\UVOTE_DATA_GRAPH_PARTY_TO_USER_OVERALL_BY_TIME::QQ(array($timespan, \SYSTEM\SECURITY\Security::getUser()->id, $party, \SYSTEM\SECURITY\Security::getUser()->id));
        $total = \SQL\UVOTE_DATA_GRAPH_PARTY_TO_USER_OVERALL_BY_TIME_OVERMATCH::Q1(array($party, \SYSTEM\SECURITY\Security::getUser()->id));
        $matchhandler = 0;
        $missmatchhandler = 0;
        while ($row = $res->next()){
            $match = $row['class_match']+$matchhandler;
            $missmatch = $row['class_mismatch']+$missmatchhandler;
            $result[] = array(  0 => $row['day'],
                                'class_match' => ($match) / ($match+$missmatch)*100);
            $matchhandler = $match;
            $missmatchhandler = $missmatch;
        }
        return $returnasjson ? SYSTEM\LOG\JsonResult::toString($result) : $result;
    }
    
    public static function donut_party_to_user_overall ($returnasjson = true){
        $result = array();
        $res = \SQL\UVOTE_DATA_USER_TO_PARTIES_OVERALL::QQ(array(\SYSTEM\SECURITY\Security::getUser()->id));
        while ($row = $res->next()){
            $result[] = array(  0 => $row['party'],
                                'class_match' => $row['class_MATCH']);
        }
        return $returnasjson ? SYSTEM\LOG\JsonResult::toString($result) : $result;
    }
    
}
