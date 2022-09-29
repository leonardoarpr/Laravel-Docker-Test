#!/bin/bash

COMMAND=$1

sudo docker-compose exec php sh -c "$COMMAND"
