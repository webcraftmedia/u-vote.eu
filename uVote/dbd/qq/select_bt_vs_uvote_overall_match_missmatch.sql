SELECT
	SUM(CASE WHEN  a.choice = c.bt_choice THEN 1 ELSE 0 END) class_match,
	SUM(CASE WHEN  a.choice = c.bt_choice THEN 0 ELSE 1 END) class_mismatch
FROM uvote_data as a
LEFT JOIN (Select choice, poll_ID FROM uvote_data GROUP BY choice LIMIT 1) b ON a.poll_ID = b.poll_ID
LEFT JOIN uvote_votes as c ON a.poll_ID = c.ID
WHERE bt_choice