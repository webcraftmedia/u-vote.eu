<?php

class graphs {

    public static function graph_bt_to_uvote_overall_by_time ($timespan = 84600,$returnasjson = true){
        $result = array();
        $res = \DBD\UVOTE_DATA_GRAPH_BT_TO_UVOTE_OVERALL_BY_TIME::QQ(array($timespan));
        while ($row = $res->next()){
            $result[] = array(  0 => $row['day'],
                                'match' => $row['class_match'] > 0 ? round($row['class_match'] / ($row['class_match']+$row['class_mismatch']),2) : 0,
                                'mismatch' => $row['class_match'] > 0 ? round($row['class_mismatch'] / ($row['class_match']+$row['class_mismatch']),2) : 0);
        }
        return $returnasjson ? SYSTEM\LOG\JsonResult::toString($result) : $result;
    }
    
    public static function graph_bt_to_user_overall_by_time ($timespan = 84600,$returnasjson = true){
        $result = array();
        $res = \DBD\UVOTE_DATA_GRAPH_BT_TO_USER_OVERALL_BY_TIME::QQ(array($timespan, \SYSTEM\SECURITY\Security::getUser()->id, \SYSTEM\SECURITY\Security::getUser()->id));
        while ($row = $res->next()){
            $result[] = array(  0 => $row['day'],
                                'class_match' => $row['class_match'] / ($row['class_match']+$row['class_mismatch']+1),
                                'class_mismatch' => $row['class_mismatch'] / ($row['class_match']+$row['class_mismatch']+1));
        }
        return $returnasjson ? SYSTEM\LOG\JsonResult::toString($result) : $result;
    }
    
}
