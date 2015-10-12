<?php
namespace SQL;

class UVOTE_DATA_EDIT_PARTYDATA extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'INSERT INTO uvote_votes_per_party (
    `poll_ID`, 
    `party`, 
    `votes_pro`, 
    `votes_contra`, 
    `nr_attending`, 
    `total`, 
    `choice`, 
    `bt_choice`) 
VALUES (?, ?, ?, ?, ?, ?, ?, 0) 
ON DUPLICATE KEY UPDATE 
    votes_pro = ?, 
    votes_contra = ?, 
    nr_attending = ?, 
    total = ?, 
    choice = ?;
'
;}}