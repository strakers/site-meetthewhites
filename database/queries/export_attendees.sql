SELECT
  i.id,
  i.code,
  i.name as invite_name,
  ig.name as guest_name,
  igm1.meta_value as food_option,
  igm2.meta_value as food_restrictions
FROM
  invites i
  INNER JOIN invite_guests ig ON ig.invite_id = i.id
  LEFT JOIN invite_guest_metafields igm1 ON igm1.invite_guest_id = ig.id AND igm1.metafield_id = 1
  LEFT JOIN invite_guest_metafields igm2 ON igm2.invite_guest_id = ig.id AND igm2.metafield_id = 2
WHERE
  i.deleted_at IS NULL
  AND ig.deleted_at IS NULL
  AND ig.has_responded = 1
  AND ig.is_attending = 1
GROUP BY ig.id
ORDER BY i.name, ig.name
-- LIMIT 0,500