#!/usr/bin/env bash

docker-compose -f ./docker/infrastructures/api/docker-compose.yml up -d

./bin/behat -f html -o ./reports

docker-compose -f ./docker/infrastructures/api/docker-compose.yml stop
docker-compose -f ./docker/infrastructures/api/docker-compose.yml rm --force