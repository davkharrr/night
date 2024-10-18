#!/bin/bash


echo "---Compose down..."

sudo docker-compose down

echo "----Removing image"

sudo docker image rm phpsqli
