#!/bin/sh

DIR=$(dirname $0)

date

echo Setting root dir for project
cd $DIR/../

echo Updating from GitHub repo
git checkout ./config/schema.yml
git fetch
git stash
git merge origin/master
git stash pop
git submodule update
./symfony propel:build-model
./symfony cc
chmod 777 ./config/schema.yml